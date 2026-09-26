<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class AdController extends Controller
{
    /**
     * Get active ads for a specific position.
     *
     * @return Collection<int, Ad>
     */
    public static function getActiveAds(string $position): Collection
    {
        return Ad::active()->where('position', $position)->get();
    }

    /**
     * Track ad click.
     */
    public function trackClick(Ad $ad): RedirectResponse
    {
        $ad->increment('clicks');

        return redirect($ad->link_url);
    }
}
