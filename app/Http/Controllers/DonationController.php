<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DonationController extends Controller
{
    /**
     * Display the donation page.
     */
    public function index(): View
    {
        $totalRaised = Donation::completed()->sum('amount');
        $donationCount = Donation::completed()->count();

        return view('donation.index', compact('totalRaised', 'donationCount'));
    }

    /**
     * Process a donation (mock payment).
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'message' => ['nullable', 'string', 'max:500'],
            'payment_method' => ['required', 'in:qris,bank_transfer,ewallet'],
        ]);

        $donation = Donation::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'message' => $validated['message'] ?? null,
            'payment_method' => $validated['payment_method'],
            'status' => 'completed', // Mock: langsung sukses (integrasi payment gateway = task masa depan)
            'reference' => 'DON-' . strtoupper(Str::random(10)),
        ]);

        return redirect()->route('donation.index')
            ->with('success', "Terima kasih atas donasi Anda sebesar Rp " . number_format((float) $donation->amount, 0, ',', '.') . "! 🌱");
    }
}
