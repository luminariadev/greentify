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

        return view('profile.show', compact('user', 'articles'));
    }
}