<?php

namespace App\Http\Controllers;

use App\Models\SponsoredPost;
use Illuminate\View\View;

class SponsoredPostController extends Controller
{
    /**
     * Display a listing of sponsored posts.
     */
    public function index(): View
    {
        $sponsoredPosts = SponsoredPost::published()->latest()->paginate(10);

        return view('sponsored.index', compact('sponsoredPosts'));
    }

    /**
     * Display the specified sponsored post.
     */
    public function show(SponsoredPost $sponsoredPost): View
    {
        if (!$sponsoredPost->is_published || ($sponsoredPost->published_at && $sponsoredPost->published_at->isFuture())) {
            abort(404);
        }

        return view('sponsored.show', compact('sponsoredPost'));
    }
}
