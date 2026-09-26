<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Only categories that actually have a published article — an empty
     * category is dead weight in a mobile client.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            Category::query()
                ->whereHas('articles', fn ($q) => $q->where('status', 'published'))
                ->withCount(['articles' => fn ($q) => $q->where('status', 'published')])
                ->orderBy('name')
                ->get()
        );
    }

    /**
     * Single category by primary key — the documented contract is
     * /api/categories/{id} while the model binds by slug, so resolve it
     * explicitly rather than through implicit binding.
     */
    public function show(int|string $category): JsonResponse
    {
        return response()->json(
            Category::withCount(['articles' => fn ($q) => $q->where('status', 'published')])
                ->findOrFail($category)
        );
    }
}
