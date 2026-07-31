@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="max-w-4xl mx-auto px-gutter py-16">
    <!-- Article Header -->
    <header class="mb-12">
        <div class="flex items-center gap-2 mb-6">
            <span class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full font-label-sm text-label-sm">
                <span class="material-symbols-outlined text-sm">{{ $article->category->icon }}</span>
                {{ $article->category->name }}
            </span>
        </div>
        <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6 leading-tight">{{ $article->title }}</h1>

        <div class="flex items-center gap-4 pb-8 border-b border-outline-variant/30">
            <a href="{{ route('profile.user', $article->user) }}" class="w-12 h-12 rounded-full overflow-hidden border-2 border-primary-fixed flex items-center justify-center bg-primary-fixed text-primary font-bold text-lg">
                {{ strtoupper(substr($article->user->name, 0, 1)) }}
            </a>
            <div>
                <p class="font-label-md text-label-md text-primary">{{ $article->user->name }}</p>
                <p class="font-label-sm text-label-sm text-on-surface-variant">
                    {{ $article->published_at ? $article->published_at->format('d M Y') : 'Draft' }}
                </p>
            </div>
            @auth
                @if(auth()->id() === $article->user_id)
                    <div class="ml-auto flex gap-2">
                        <a href="{{ route('articles.edit', $article) }}" class="flex items-center gap-1 px-4 py-2 border border-outline-variant rounded-lg text-primary font-label-md text-label-md hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-sm">edit</span> Edit
                        </a>
                        <form method="POST" action="{{ route('articles.destroy', $article) }}" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center gap-1 px-4 py-2 border border-error/30 text-error rounded-lg font-label-md text-label-md hover:bg-error-container/30 transition-colors">
                                <span class="material-symbols-outlined text-sm">delete</span> Hapus
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </header>

    <!-- Featured Image -->
    @if($article->featured_image)
        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full max-h-96 object-cover rounded-xl nature-shadow mb-12"/>
    @endif

    <!-- Excerpt -->
    @if($article->excerpt)
        <p class="font-body-lg text-body-lg text-on-surface-variant italic mb-8 border-l-4 border-primary-fixed pl-6">{{ $article->excerpt }}</p>
    @endif

    <!-- Content -->
    <div class="prose prose-lg max-w-none font-body-lg text-body-lg text-on-surface leading-relaxed mb-16 whitespace-pre-line">
        {{ $article->content }}
    </div>

    <!-- Related Articles -->
    @if($relatedArticles->isNotEmpty())
        <section class="mb-16">
            <h2 class="font-headline-md text-headline-md text-primary mb-8">Artikel Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                    <a href="{{ route('articles.show', $related) }}" class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 hover:scale-[1.02] transition-transform duration-300">
                        <div class="h-32 overflow-hidden">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                            @else
                                <div class="w-full h-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-4xl text-outline">{{ $related->category->icon }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-secondary transition-colors line-clamp-2">{{ $related->title }}</h3>
                            <p class="font-label-sm text-label-sm text-on-surface-variant mt-2">{{ $related->category->name }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Comments -->
    <section class="border-t border-outline-variant/30 pt-12">
        <h2 class="font-headline-md text-headline-md text-primary mb-8">Komentar ({{ $article->comments->count() }})</h2>

        @if(session('success'))
            <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
        @endif

        @auth
            <form method="POST" action="{{ route('comments.store', $article) }}" class="mb-12 bg-surface-container-low rounded-xl p-6">
                @csrf
                <label class="font-label-md text-label-md text-primary block mb-3" for="comment-body">Tulis komentar Anda</label>
                <textarea id="comment-body" name="body" rows="3" class="w-full px-4 py-3 bg-surface-container-lowest border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface mb-4" placeholder="Bagikan pemikiran Anda..." required></textarea>
                <button type="submit" class="px-6 py-3 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">send</span> Kirim Komentar
                </button>
            </form>
        @else
            <p class="font-body-md text-body-md text-on-surface-variant mb-12">
                <a href="{{ route('login') }}" class="text-secondary hover:underline">Masuk</a> untuk berkomentar.
            </p>
        @endauth

        @forelse($article->comments->whereNull('parent_id') as $comment)
            <div class="mb-8">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-bold shrink-0">
                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <p class="font-label-md text-label-md text-primary">{{ $comment->user->name }}</p>
                            <span class="font-label-sm text-label-sm text-on-surface-variant/60">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface mb-2 whitespace-pre-line">{{ $comment->body }}</p>

                        @auth
                            <button class="font-label-sm text-label-sm text-secondary hover:underline" onclick="toggleReply({{ $comment->id }})">Balas</button>
                        @endauth

                        <!-- Reply Form -->
                        <form method="POST" action="{{ route('comments.reply', $comment) }}" id="reply-form-{{ $comment->id }}" class="hidden mt-4 mb-6">
                            @csrf
                            <textarea name="body" rows="2" class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary font-body-md text-body-md text-on-surface mb-2" placeholder="Tulis balasan..." required></textarea>
                            <button type="submit" class="px-4 py-2 bg-secondary text-on-secondary rounded-lg font-label-sm text-label-sm hover:opacity-90 transition-opacity">Kirim Balasan</button>
                        </form>

                        <!-- Replies -->
                        @foreach($comment->replies as $reply)
                            <div class="flex items-start gap-4 mt-4 ml-8">
                                <div class="w-8 h-8 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-1">
                                        <p class="font-label-md text-label-md text-primary">{{ $reply->user->name }}</p>
                                        <span class="font-label-sm text-label-sm text-on-surface-variant/60">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="font-body-md text-body-md text-on-surface whitespace-pre-line">{{ $reply->body }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <p class="font-body-md text-body-md text-on-surface-variant text-center py-8">Belum ada komentar. Jadilah yang pertama!</p>
        @endforelse
    </section>
</div>
@endsection

@push('scripts')
<script>
    function toggleReply(id) {
        const form = document.getElementById('reply-form-' + id);
        form.classList.toggle('hidden');
    }
</script>
@endpush