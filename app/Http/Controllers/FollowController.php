<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserFollowed;
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

        // Notify user when a new follow happens
        if ($following) {
            $user->notify(new UserFollowed($authUser->id, $authUser->name));
        }

        return response()->json([
            'following' => $following,
            'followersCount' => $followersCount,
        ]);
    }
}