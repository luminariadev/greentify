<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMembershipAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $minTier = 'green'): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Login diperlukan untuk akses konten premium.');
        }

        $user = auth()->user();

        if (!$user->membership || !$user->membership->is_active || $user->membership->isExpired()) {
            return redirect()->route('membership.pricing')->with('error', 'Anda tidak memiliki membership aktif untuk akses fitur ini.');
        }

        $minTierId = \App\Models\MembershipTier::where('slug', $minTier)->first()->id ?? 0;
        $userTierId = $user->membership->tier->id ?? 0;

        if ($userTierId < $minTierId) {
            return redirect()->route('membership.pricing')->with('error', 'Membership Anda tidak cukup tinggi untuk akses fitur ini.');
        }

        return $next($request);
    }
}
