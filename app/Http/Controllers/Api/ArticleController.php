<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $articles = Article::with('user:id,name', 'category:id,name', 'tags:id,name')->paginate(10);
        return response()->json($articles);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): JsonResponse
    {
        $article->load('user:id,name', 'category:id,name', 'tags:id,name');
        return response()->json($article);
    }
}
