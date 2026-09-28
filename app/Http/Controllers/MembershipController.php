<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\MembershipTier;
use App\Payments\PaymentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MembershipController extends Controller
{
    public function __construct(private readonly PaymentManager $payments) {}

    /**
     * Display membership pricing page.
     */
    public function pricing(): View
    {
        $tiers = MembershipTier::orderBy('price')->get();

        return view('membership.pricing', compact('tiers'));
    }

    /**
     * Start a subscription.
     *
     * The free tier still activates immediately — there is nothing to
     * pay for. Every paid tier creates an INACTIVE membership and a
     * pending Payment; the row is only activated when the payment
     * settles. Previously this called Membership::updateOrCreate() with
     * is_active=true and a month of access for anyone who pressed the
     * button, which made the entire paid tier a lie.
     */
    public function subscribe(Request $request, MembershipTier $tier): RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('error', 'Login terlebih dahulu untuk berlangganan.');
        }

        if ($tier->slug === 'free') {
            return $this->downgradeToFree();
        }

        $membership = Membership::create([
            'user_id' => Auth::id(),
            'membership_tier_id' => $tier->id,
            'starts_at' => null,
            'expires_at' => null,
            'is_active' => false,
        ]);

        $payment = $this->payments->chargeMembership(
            membership: $membership,
            method: 'qris',
            email: $request->user()?->email,
            name: $request->user()?->name,
        );

        return redirect()->route('payments.show', $payment->reference)
            ->with('success', 'Selesaikan pembayaran untuk mengaktifkan membership '.$tier->name.'.');
    }

    /**
     * Cancel the current user's membership.
     */
    public function cancel(): RedirectResponse
    {
        $membership = Auth::user()->membership;

        if ($membership) {
            $membership->update(['is_active' => false]);
        }

        return redirect()->route('membership.pricing')->with('success', 'Membership dibatalkan.');
    }

    /**
     * Display the current user's membership status.
     */
    public function status(): View
    {
        $user = Auth::user();

        return view('membership.status', compact('user'));
    }

    private function downgradeToFree(): RedirectResponse
    {
        $free = MembershipTier::where('slug', 'free')->first();

        if (Auth::user()->membership) {
            Auth::user()->membership->update(['is_active' => false]);
        }

        Membership::create([
            'user_id' => Auth::id(),
            'membership_tier_id' => $free->id,
            'starts_at' => now(),
            'expires_at' => null,
            'is_active' => true,
        ]);

        return redirect()->route('membership.pricing')->with('success', 'Anda kini member Free.');
    }
}
