<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\MembershipTier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MembershipController extends Controller
{
    /**
     * Display membership pricing page.
     */
    public function pricing(): View
    {
        $tiers = MembershipTier::orderBy('price')->get();

        return view('membership.pricing', compact('tiers'));
    }

    /**
     * Subscribe the current user to a membership tier.
     */
    public function subscribe(Request $request, MembershipTier $tier): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Login terlebih dahulu untuk berlangganan.');
        }

        if ($tier->slug === 'free') {
            return $this->downgradeToFree();
        }

        // For now: free activation (payment gateway integration is a future task).
        $membership = Membership::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'membership_tier_id' => $tier->id,
            ],
            [
                'starts_at' => now(),
                'expires_at' => now()->addMonth(),
                'is_active' => true,
            ]
        );

        return redirect()->route('membership.pricing')->with('success', "Selamat! Anda kini member {$tier->name}.");
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
