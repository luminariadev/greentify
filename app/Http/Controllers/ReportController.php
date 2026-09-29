<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use App\Notifications\ReportSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function create(Request $request): View
    {
        $type = $request->query('type');
        $id = (int) $request->query('id');

        $validTypes = [Article::class, Comment::class];
        abort_unless(in_array($type, $validTypes) && $id > 0, 404);

        $reportableType = $type;
        $reportableId = $id;

        return view('reports.create', compact('reportableType', 'reportableId'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'reportable_type' => 'required|string',
            'reportable_id' => 'required|integer',
            'reason' => 'required|in:spam,inappropriate,hate_speech,misinformation,copyright,other',
            'description' => 'nullable|string|max:2000',
        ]);

        // Resolve reportable model based on type
        $type = $validated['reportable_type'];
        $model = in_array($type, [Article::class, Comment::class]) ? $type : null;
        abort_unless($model, 422);

        $reportable = $model::findOrFail($validated['reportable_id']);

        // Prevent reporting your own content
        if (auth()->id() === $reportable->user_id) {
            return back()->with('error', 'Anda tidak bisa melaporkan konten Anda sendiri.');
        }

        $report = Report::create([
            'reporter_id' => auth()->id(),
            'reportable_type' => $model,
            'reportable_id' => $reportable->id,
            'reason' => $validated['reason'],
            'description' => $validated['description'] ?? null,
        ]);

        // Notify staff. Was User::where('email', 'admin@greentify.id')->first(),
        // which delivered the notification to whoever happened to hold that
        // address -- an address ArticleSeeder provisions for a content
        // author, and which /register can therefore be claimed on a fresh
        // install. Now it follows the role column, so a promoted moderator
        // is notified too.
        User::query()
            ->where('role', '!=', User::ROLE_USER)
            ->each(fn (User $staff) => $staff->notify(
                new ReportSubmitted($report->id, $model, $reportable->id)
            ));

        return back()->with('success', 'Laporan berhasil dikirim. Terima kasih atas kontribusi Anda menjaga komunitas!');
    }

    // Admin: list all reports
    public function index(): View
    {
        $this->authorizeStaff();

        $reports = Report::with(['reporter', 'reportable'])
            ->latest()
            ->paginate(20);

        return view('reports.index', compact('reports'));
    }

    // Admin: update report status
    public function review(Request $request, Report $report): RedirectResponse
    {
        $this->authorizeStaff();

        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,dismissed,action_taken',
        ]);

        $report->update([
            'status' => $validated['status'],
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return back()->with('success', 'Status laporan diperbarui.');
    }

    /**
     * Staff gate for the report surfaces.
     *
     * This used to be a hardcoded comparison against 'admin@greentify.id'.
     * The role column has existed since 2026-08-10 and the `admin` middleware
     * alias checks it properly, so the role system was already in place and
     * this controller was the one place ignoring it. Two bugs came out of
     * that: a genuine admin on any other address got 403, and whoever held
     * the admin@greentify.id address got in regardless of role -- an address
     * ArticleSeeder provisions for a *content author* with no role at all.
     *
     * isStaff() rather than isAdmin() because moderators reach staff-only
     * surfaces everywhere else in the app (see CheckAdminRole's sibling
     * surfaces and Api\ArticleController's use of isStaff()); locking them
     * out of the report queue was an inconsistency, not a decision.
     */
    private function authorizeStaff(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->isStaff(),
            403,
            'Akses ditolak. Hanya staff yang dapat mengelola laporan.',
        );
    }
}
