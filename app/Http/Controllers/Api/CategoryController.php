<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Only categories that actually have a published article — an empty
     * category is dead weight in a mobile client.
     */
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(
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
    public function show(int|string $category): CategoryResource
    {
        return new CategoryResource(
            Category::withCount(['articles' => fn ($q) => $q->where('status', 'published')])
                ->findOrFail($category)
        );
    }
}
