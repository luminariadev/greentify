<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $query = Article::with(['user', 'category'])
            ->where('status', 'published')
            ->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('content', 'like', "%{$request->search}%")
                  ->orWhere('excerpt', 'like', "%{$request->search}%");
            });
        }

        $articles = $query->paginate(9)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('blogspot', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('articles', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(6);

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Article::create($validated);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dibuat!');
    }

    public function show(Article $article)
    {
        if ($article->status !== 'published' && (!auth()->check() || auth()->id() !== $article->user_id)) {
            abort(404);
        }

        $article->load(['user', 'category', 'comments.user']);
        $relatedArticles = Article::with('category')
            ->where('status', 'published')
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function edit(Article $article)
    {
        abort_unless(auth()->id() === $article->user_id, 403);
        $categories = Category::orderBy('name')->get();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        abort_unless(auth()->id() === $article->user_id, 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store('articles', 'public');
        }

        $wasDraft = $article->status === 'draft';
        $isNowPublished = $validated['status'] === 'published';

        if ($wasDraft && $isNowPublished) {
            $validated['published_at'] = now();
        }

        if ($validated['status'] !== 'published') {
            $validated['published_at'] = null;
        }

        $article->update($validated);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        abort_unless(auth()->id() === $article->user_id, 403);

        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    public function myArticles()
    {
        $articles = Article::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('articles.my-articles', compact('articles'));
    }
}