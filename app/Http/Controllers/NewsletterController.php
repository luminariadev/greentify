<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
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
}