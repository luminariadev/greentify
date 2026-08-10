<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterEmail;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    /**
     * Show the newsletter unsubscribe page.
     */
    public function showUnsubscribeForm(Request $request): View
    {
        $email = $request->query('email');

        return view('newsletter.unsubscribe', compact('email'));
    }

    /**
     * Process unsubscribe request.
     */
    public function unsubscribe(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $subscriber = Subscriber::where('email', $validated['email'])->first();

        if ($subscriber) {
            $subscriber->update(['is_active' => false]);
        }

        return redirect()->route('newsletter.unsubscribe.page')
            ->with('success', 'Anda berhasil berhenti berlangganan.');
    }

    /**
     * Subscribe an email address.
     */
    public function subscribe(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $subscriber = Subscriber::firstOrCreate(
            ['email' => $validated['email']],
            ['is_active' => true]
        );

        if ($subscriber->wasRecentlyCreated) {
            return back()->with('success', 'Terima kasih! Anda berhasil berlangganan newsletter.');
        }

        return back()->with('success', 'Email Anda sudah terdaftar.');
    }

    /**
     * Send a newsletter (admin action - simplified for demo).
     */
    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $activeSubscribers = Subscriber::where('is_active', true)->get();

        foreach ($activeSubscribers as $subscriber) {
            $unsubUrl = route('newsletter.unsubscribe.page', ['email' => $subscriber->email]);
            Mail::to($subscriber->email)->queue(new NewsletterEmail(
                $validated['subject'],
                $validated['content'],
                $unsubUrl
            ));
        }

        return back()->with('success', "Newsletter dikirim ke {$activeSubscribers->count()} subscriber!");
    }
}
