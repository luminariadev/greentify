<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Notifications\NewComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $user = auth()->user();

        Comment::create([
            'user_id' => $user->id,
            'article_id' => $article->id,
            'body' => $validated['body'],
        ]);

        // Notify article owner when a new comment is added (skip own comment)
        if ($article->user_id !== $user->id) {
            $article->user->notify(new NewComment(
                $article->id,
                $article->title,
                $user->id,
                $user->name,
                $validated['body'],
            ));
        }

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function reply(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        $user = auth()->user();

        Comment::create([
            'user_id' => $user->id,
            'article_id' => $comment->article_id,
            'parent_id' => $comment->id,
            'body' => $validated['body'],
        ]);

        // Notify original commenter when someone replies
        if ($comment->user_id !== $user->id) {
            $article = $comment->article;
            $comment->user->notify(new NewComment(
                $article->id,
                $article->title,
                $user->id,
                $user->name,
                $validated['body'],
            ));
        }

        return back()->with('success', 'Balasan berhasil ditambahkan!');
    }
}