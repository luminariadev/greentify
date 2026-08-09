@extends('layouts.app')

@section('title', 'Sponsored Posts')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl sm:text-4xl font-bold text-primary">Sponsored Posts 📣</h1>
        <p class="mt-3 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Konten khusus dari brand dan sponsor yang mendukung gaya hidup ramah lingkungan.
        </p>
    </div>

    @if($sponsoredPosts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($sponsoredPosts as $post)
                <div class="nature-shadow rounded-2xl overflow-hidden bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col">
                    <a href="{{ route('sponsored.show', $post) }}" class="block relative h-48 bg-gray-100 dark:bg-gray-900 overflow-hidden">
                        @if($post->image_url)
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-5xl">📣</div>
                        @endif
                        <span class="absolute top-2 left-2 bg-amber-500 text-white text-xs font-bold px-2 py-1 rounded-full">SPONSORED</span>
                    </a>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100 line-clamp-1">
                            <a href="{{ route('sponsored.show', $post) }}" class="hover:text-primary transition-colors">{{ $post->title }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 line-clamp-2 flex-1">{{ $post->content }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-xs text-gray-400">Oleh {{ $post->sponsor_name }}</span>
                            <a href="{{ route('sponsored.show', $post) }}" class="text-primary text-sm font-semibold hover:underline">Baca →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $sponsoredPosts->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-5xl mb-4">📭</p>
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Belum ada sponsored post</h3>
            <p class="text-gray-500 mt-2">Nantikan konten menarik dari sponsor kami.</p>
        </div>
    @endif
</div>
@endsection
