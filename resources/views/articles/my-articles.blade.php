@extends('layouts.app')

@section('title', 'Artikel Saya')

@section('content')
<div class="max-w-4xl mx-auto px-gutter py-16">
    <header class="flex items-center justify-between mb-12">
        <div>
            <h1 class="font-headline-md text-headline-md text-primary mb-2">Artikel Saya</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">{{ $articles->total() }} artikel terdaftar</p>
        </div>
        <a href="{{ route('articles.create') }}" class="px-6 py-3 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">add</span> Tulis Baru
        </a>
    </header>

    @if(session('success'))
        <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
    @endif

    @forelse($articles as $article)
        <div class="bg-white rounded-xl nature-shadow border border-outline-variant/10 p-6 mb-4 flex items-center gap-6">
            <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0 bg-surface-container">
                @if($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover"/>
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl text-outline">article</span>
                    </div>
                @endif
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="font-headline-sm text-headline-sm text-primary truncate">
                    <a href="{{ route('articles.show', $article) }}" class="hover:text-secondary transition-colors">{{ $article->title }}</a>
                </h3>
                <div class="flex items-center gap-3 mt-1">
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                        {{ $article->status === 'published' ? 'bg-secondary/10 text-secondary' : ($article->status === 'draft' ? 'bg-tertiary-fixed/20 text-tertiary' : 'bg-surface-container text-on-surface-variant') }}">
                        {{ $article->status === 'published' ? 'Published' : ($article->status === 'draft' ? 'Draft' : 'Archived') }}
                    </span>
                    <span class="font-label-sm text-label-sm text-on-surface-variant">{{ $article->category->name }}</span>
                    <span class="font-label-sm text-label-sm text-on-surface-variant/60">{{ $article->updated_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('articles.edit', $article) }}" class="p-2 rounded-lg text-primary hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined text-lg">edit</span>
                </a>
                <form method="POST" action="{{ route('articles.destroy', $article) }}" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 rounded-lg text-error hover:bg-error-container/30 transition-colors">
                        <span class="material-symbols-outlined text-lg">delete</span>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="text-center py-20">
            <span class="material-symbols-outlined text-6xl text-outline mb-4 block">article</span>
            <h2 class="font-headline-sm text-headline-sm text-primary mb-2">Belum Ada Artikel</h2>
            <p class="font-body-md text-body-md text-on-surface-variant mb-6">Mulai tulis artikel pertama Anda untuk komunitas Greentify.</p>
            <a href="{{ route('articles.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all">
                <span class="material-symbols-outlined text-sm">edit</span> Tulis Sekarang
            </a>
        </div>
    @endforelse

    {{ $articles->links() }}
</div>
@endsection