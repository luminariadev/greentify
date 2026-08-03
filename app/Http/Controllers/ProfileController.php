<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user = null)
    {
        $user = $user ?? auth()->user();

        $articles = $user->articles()
            ->where('status', 'published')
            ->with('category')
            ->latest('published_at')
            ->paginate(10);

        // Follow state + counts for current user
        $isFollowing = auth()->check() && auth()->id() !== $user->id
            ? auth()->user()->following()->where('following_id', $user->id)->exists()
            : false;

        $followersCount = $user->followers()->count();
        $followingCount = $user->following()->count();

        return view('profile.show', compact('user', 'articles', 'isFollowing', 'followersCount', 'followingCount'));
    }
}