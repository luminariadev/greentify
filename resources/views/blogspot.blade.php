@extends('layouts.app')

@section('title', 'Semua Artikel - Greentify')

@section('content')
<div class="max-w-container-max-width mx-auto px-gutter pt-24 pb-24 min-h-screen">
    <!-- Page Header -->
    <section class="pt-8 pb-12">
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full font-label-sm text-label-sm">Eksplorasi</span>
                <div class="h-px flex-grow bg-outline-variant/30"></div>
            </div>
            <h1 class="font-headline-md text-headline-md text-primary">Semua Artikel</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
                Jelajahi wawasan, penelitian, dan cerita dari komunitas Greentify tentang pelestarian lingkungan.
            </p>
        </div>
    </section>

    <!-- Filter Bar -->
    <section class="mb-12 flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
        <!-- Category Filter -->
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('blogspot') }}"
               class="px-4 py-2 rounded-full font-label-sm text-label-sm transition-colors {{ !request('category') ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant hover:bg-secondary-container hover:text-on-secondary-container' }}">
                Semua
            </a>
            @foreach($categories as $category)
                <a href="{{ route('blogspot', ['category' => $category->slug]) }}"
                   class="px-4 py-2 rounded-full font-label-sm text-label-sm transition-colors {{ request('category') === $category->slug ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant hover:bg-secondary-container hover:text-on-secondary-container' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('blogspot') }}" class="w-full md:w-auto flex gap-2">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}"/>
            @endif
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..."
                   class="flex-1 md:w-64 px-4 py-2.5 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface"/>
            <button type="submit" class="px-4 py-2.5 bg-primary text-on-primary rounded-lg hover:opacity-90 transition-opacity">
                <span class="material-symbols-outlined text-lg">search</span>
            </button>
        </form>
    </section>

    @if(session('success'))
        <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
    @endif

    <!-- Articles Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($articles as $article)
            <a href="{{ route('articles.show', $article) }}" class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
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
        @empty
            <div class="col-span-full text-center py-20">
                <span class="material-symbols-outlined text-6xl text-outline mb-4 block">search_off</span>
                <h2 class="font-headline-sm text-headline-sm text-primary mb-2">Tidak Ada Artikel</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Coba ubah filter atau kata kunci pencarian Anda.</p>
            </div>
        @endforelse
    </section>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $articles->links() }}
    </div>
</div>
@endsection