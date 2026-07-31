<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => $article->id,
            'body' => $validated['body'],
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function reply(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:2000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'article_id' => $comment->article_id,
            'parent_id' => $comment->id,
            'body' => $validated['body'],
        ]);

        return back()->with('success', 'Balasan berhasil ditambahkan!');
    }
}