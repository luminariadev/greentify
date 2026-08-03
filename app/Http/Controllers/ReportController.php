<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Report;
use App\Models\User;
use App\Notifications\ReportSubmitted;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $type = $request->query('type');
        $id = (int) $request->query('id');

        $validTypes = [Article::class, Comment::class];
        abort_unless(in_array($type, $validTypes) && $id > 0, 404);

        $reportableType = $type;
        $reportableId = $id;

        return view('reports.create', compact('reportableType', 'reportableId'));
    }

    public function store(Request $request)
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

        // Notify admin
        $admin = User::where('email', 'admin@greentify.id')->first();
        if ($admin) {
            $admin->notify(new ReportSubmitted($report->id, $model, $reportable->id));
        }

        return back()->with('success', 'Laporan berhasil dikirim. Terima kasih atas kontribusi Anda menjaga komunitas!');
    }

    // Admin: list all reports
    public function index()
    {
        $this->authorizeAdmin();

        $reports = Report::with(['reporter', 'reportable'])
            ->latest()
            ->paginate(20);

        return view('reports.index', compact('reports'));
    }

    // Admin: update report status
    public function review(Request $request, Report $report)
    {
        $this->authorizeAdmin();

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

    private function authorizeAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->email === 'admin@greentify.id', 403);
    }
}