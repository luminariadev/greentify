@extends('layouts.app')

@section('title', 'Bookmark Saya - Greentify')

@section('content')
<div class="max-w-container-max-width mx-auto px-gutter pt-24 pb-24 min-h-screen">
    <!-- Page Header -->
    <section class="pt-8 pb-12">
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-sm align-middle">bookmarks</span> Disimpan
                </span>
                <div class="h-px flex-grow bg-outline-variant/30"></div>
            </div>
            <h1 class="font-headline-md text-headline-md text-primary">Bookmark Saya</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
                Artikel yang Anda simpan untuk dibaca nanti.
            </p>
        </div>
    </section>

    @if(session('success'))
        <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
    @endif

    <!-- Bookmarks Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <div class="bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <a href="{{ route('articles.show', $article) }}" class="group flex flex-col flex-1">
                    <div class="h-48 overflow-hidden">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"/>
                        @else
                            <div class="w-full h-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-6xl text-outline/40">{{ $article->category->icon }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex gap-2 mb-3">
                            <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">{{ $article->category->name }}</span>
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-primary mb-3 line-clamp-2">{{ $article->title }}</h3>
                        <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">{{ $article->excerpt ?: Str::limit(strip_tags($article->content), 120) }}</p>
                        <div class="mt-auto flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-primary-fixed text-primary flex items-center justify-center text-xs font-bold">
                                    {{ strtoupper(substr($article->user->name, 0, 1)) }}
                                </div>
                                <span class="text-[12px] text-on-surface-variant">{{ $article->user->name }}</span>
                            </div>
                            <span class="text-[12px] text-on-surface-variant">{{ $article->published_at ? $article->published_at->format('d M Y') : '' }}</span>
                        </div>
                    </div>
                </a>

                <!-- Interaction Bar -->
                <div class="px-6 pb-4 pt-3 border-t border-outline-variant/10 flex items-center gap-4">
                    <button
                        class="flex items-center gap-1 text-primary font-label-sm text-label-sm hover:text-secondary transition-colors"
                        data-action="like"
                        data-article-id="{{ $article->id }}"
                        aria-pressed="{{ auth()->check() && $article->liked_by->isNotEmpty() ? 'true' : 'false' }}"
                    >
                        <span class="material-symbols-outlined">{{ auth()->check() && $article->liked_by->isNotEmpty() ? 'favorite' : 'favorite_border' }}</span>
                        <span class="like-count">{{ $article->likes_count }}</span>
                    </button>
                    <button
                        class="flex items-center gap-1 text-primary font-label-sm text-label-sm hover:text-secondary transition-colors"
                        data-action="bookmark"
                        data-article-id="{{ $article->id }}"
                        aria-pressed="{{ auth()->check() && $article->bookmarked_by->isNotEmpty() ? 'true' : 'false' }}"
                    >
                        <span class="material-symbols-outlined">{{ auth()->check() && $article->bookmarked_by->isNotEmpty() ? 'bookmark' : 'bookmark_border' }}</span>
                        <span class="bookmark-count">{{ $article->bookmarks_count }}</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20">
                <span class="material-symbols-outlined text-6xl text-outline mb-4 block">bookmarks</span>
                <h2 class="font-headline-sm text-headline-sm text-primary mb-2">Belum Ada Bookmark</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    Klik ikon <span class="material-symbols-outlined text-sm align-middle">bookmark_border</span> pada artikel untuk menyimpannya di sini.
                </p>
            </div>
        @endforelse
    </section>

    <!-- Pagination -->
    @if($articles->hasPages())
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection
