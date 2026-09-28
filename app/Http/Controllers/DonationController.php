<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Payments\PaymentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function __construct(private readonly PaymentManager $payments) {}

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
     * Start a donation.
     *
     * The Donation is created as pending and a Payment is raised against
     * it. It is NOT marked completed here — that happens on settlement
     * (payment confirmation or webhook). Previously this wrote
     * status=completed on submit, so every donation was counted as
     * revenue before any money arrived, and the "total terkumpul" figure
     * on the page was fiction.
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
            'status' => 'pending',
            'reference' => 'DON-'.strtoupper(Str::random(10)),
        ]);

        $payment = $this->payments->chargeDonation(
            donation: $donation,
            method: $validated['payment_method'],
            email: $request->user()?->email,
            name: $request->user()?->name,
        );

        // A guest donation has no account, so the payer gets a temporary
        // signed link instead of a redirect they cannot authorize.
        if ($request->user() === null) {
            return redirect()->to(URL::temporarySignedRoute(
                'payment.guest.receipt',
                now()->addHours(6),
                ['reference' => $payment->reference],
            ));
        }

        return redirect()->route('payments.show', $payment->reference)
            ->with('success', 'Donasi dicatat. Selesaikan pembayaran sesuai instruksi.');
    }
}
