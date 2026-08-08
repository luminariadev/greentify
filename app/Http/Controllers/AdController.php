<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\SponsoredPost;
use Illuminate\View\View;

class AdController extends Controller
{
    /**
     * Get active ads for a specific position.
     */
    public static function getActiveAds(string $position)
    {
        return Ad::active()->where('position', $position)->get();
    }

    /**
     * Track ad click.
     */
    public function trackClick(Ad $ad)
    {
        $ad->increment('clicks');

        return redirect($ad->link_url);
    }
}
