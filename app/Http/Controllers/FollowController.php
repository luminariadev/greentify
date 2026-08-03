<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggleFollow(User $user): JsonResponse
    {
        $authUser = auth()->user();

        if ($authUser->id === $user->id) {
            return response()->json(['error' => 'Cannot follow yourself'], 422);
        }

        $authUser->following()->toggle($user->id);

        $following = $authUser->following()->where('following_id', $user->id)->exists();
        $followersCount = $user->followers()->count();

        return response()->json([
            'following' => $following,
            'followersCount' => $followersCount,
        ]);
    }
}