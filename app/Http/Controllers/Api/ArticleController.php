<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Public listing: published articles only, newest first.
     *
     * 'tags' used to be eager-loaded here, but no such relation exists on
     * the model — every request died with RelationNotFoundException.
     */
    public function index(Request $request): JsonResponse
    {
        $articles = Article::query()
            ->with(['user:id,name', 'category:id,name,slug'])
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate($this->perPage($request));

        return response()->json($articles);
    }

    /**
     * Single article, addressed by primary key — the documented API
     * contract is /api/articles/{id}, and the model binds by slug, so we
     * resolve explicitly instead of relying on implicit binding.
     */
    public function show(int|string $article): JsonResponse
    {
        $article = Article::with(['user:id,name', 'category:id,name,slug'])
            ->findOrFail($article);

        abort_if($article->status !== 'published' && ! $this->maySeeUnpublished($article), 404);

        return response()->json($article);
    }

    /**
     * @return int<1,50>
     */
    private function perPage(Request $request): int
    {
        return min(max($request->integer('per_page', 10), 1), 50);
    }

    /**
     * The author — or any staff member — may read their own unpublished
     * article; everyone else gets a 404 so drafts stay invisible.
     */
    private function maySeeUnpublished(Article $article): bool
    {
        $user = request()->user();

        return $user !== null && (
            (int) $user->id === (int) $article->user_id || $user->isStaff()
        );
    }
}
