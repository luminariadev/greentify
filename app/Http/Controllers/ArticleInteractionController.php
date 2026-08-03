<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Notifications\ArticleBookmarked;
use App\Notifications\ArticleLiked;
use Illuminate\Http\JsonResponse;

class ArticleInteractionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggleLike(Article $article): JsonResponse
    {
        $user = auth()->user();
        $user->likes()->toggle($article->id);

        $liked = $user->likes()->where('article_id', $article->id)->exists();
        $likesCount = $article->likedBy()->count();

        // Notify article owner when a new like happens (skip self-like)
        if ($liked && $article->user_id !== $user->id) {
            $article->user->notify(new ArticleLiked(
                $article->id,
                $article->title,
                $user->id,
                $user->name,
            ));
        }

        return response()->json([
            'liked' => $liked,
            'likesCount' => $likesCount,
        ]);
    }

    public function toggleBookmark(Article $article): JsonResponse
    {
        $user = auth()->user();
        $user->bookmarks()->toggle($article->id);

        $bookmarked = $user->bookmarks()->where('article_id', $article->id)->exists();
        $bookmarksCount = $article->bookmarkedBy()->count();

        // Notify article owner on new bookmark (skip self-bookmark)
        if ($bookmarked && $article->user_id !== $user->id) {
            $article->user->notify(new ArticleBookmarked(
                $article->id,
                $article->title,
                $user->id,
                $user->name,
            ));
        }

        return response()->json([
            'bookmarked' => $bookmarked,
            'bookmarksCount' => $bookmarksCount,
        ]);
    }

    public function indexBookmarks()
    {
        $user = auth()->user();

        $articles = Article::whereHas('bookmarkedBy', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->with(['category', 'user'])
        ->withCount([
            'likedBy as likes_count',
            'bookmarkedBy as bookmarks_count',
        ])
        ->latest('published_at')
        ->paginate(12);

        return view('bookmarks.index', compact('articles'));
    }
}
