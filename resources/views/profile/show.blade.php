@extends('layouts.app')

@section('title', $user->name . ' Profil')

@section('content')
<div class="max-w-3xl mx-auto px-gutter py-16">
    <!-- Profile Header -->
    <div class="bg-white rounded-2xl nature-shadow border border-outline-variant/10 p-8 mb-12">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
            <div class="w-32 h-32 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-4xl shrink-0 border-2 border-primary-container">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="flex-1 text-center md:text-left">
                <h1 class="font-headline-md text-headline-md text-primary mb-2">{{ $user->name }}</h1>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">{{ $user->email }}</p>
                <div class="flex items-center justify-center md:justify-start gap-6">
                    <div class="bg-surface-container-low rounded-xl p-4 min-w-[100px]">
                        <p class="font-headline-sm text-headline-sm text-primary">{{ $articles->total() }}</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Artikel</p>
                    </div>
                    <div class="bg-surface-container-low rounded-xl p-4 min-w-[100px]">
                        <p class="font-headline-sm text-headline-sm text-primary">{{ $followersCount }}</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Followers</p>
                    </div>
                    <div class="bg-surface-container-low rounded-xl p-4 min-w-[100px]">
                        <p class="font-headline-sm text-headline-sm text-primary">{{ $followingCount }}</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Following</p>
                    </div>
                </div>

                @auth
                    @if(auth()->id() !== $user->id)
                        <div class="mt-6">
                            <button
                                class="flex items-center gap-2 px-6 py-2.5 rounded-lg font-label-md text-label-md transition-all active:scale-95 {{ $isFollowing ? 'border border-outline-variant text-primary hover:bg-surface-container' : 'bg-primary text-on-primary hover:bg-primary-container' }}"
                                data-action="follow"
                                data-user-id="{{ $user->id }}"
                                aria-pressed="{{ $isFollowing ? 'true' : 'false' }}"
                            >
                                <span class="material-symbols-outlined text-sm">{{ $isFollowing ? 'person_remove' : 'person_add' }}</span>
                                <span class="follow-label">{{ $isFollowing ? 'Mengikuti' : 'Ikuti' }}</span>
                            </button>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <!-- Articles -->
    <section>
        <header class="flex items-center justify-between mb-8">
            <h2 class="font-headline-md text-headline-md text-primary">Artikel oleh {{ $user->name }}</h2>
        </header>

        @forelse($articles as $article)
            <a href="{{ route('articles.show', $article) }}" class="group bg-white rounded-xl nature-shadow border border-outline-variant/10 p-6 mb-4 flex items-center gap-6 transition-all hover:scale-[1.01]">
                <div class="w-20 h-20 rounded-lg overflow-hidden shrink-0 bg-surface-container">
                    @if($article->featured_image)
                        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover"/>
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl text-outline">article</span>
                        </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-secondary transition-colors truncate">{{ $article->title }}</h3>
                    <div class="flex items-center gap-3 mt-1">
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                            {{ $article->status === 'published' ? 'bg-secondary/10 text-secondary' : ($article->status === 'draft' ? 'bg-tertiary-fixed/20 text-tertiary' : 'bg-surface-container text-on-surface-variant') }}">
                            {{ $article->status === 'published' ? 'Published' : ($article->status === 'draft' ? 'Draft' : 'Archived') }}
                        </span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant">{{ $article->category->name }}</span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant/60">{{ $article->published_at ? $article->published_at->format('d M Y') : $article->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center py-16">
                <span class="material-symbols-outlined text-4xl text-outline mb-4 block">article</span>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ $user->name }} belum mempublikasikan artikel.</p>
            </div>
        @endforelse

        {{ $articles->links() }}
    </section>
</div>
@endsection