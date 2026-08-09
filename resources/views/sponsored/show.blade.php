@extends('layouts.app')

@section('title', $sponsoredPost->title)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Badge -->
    <div class="mb-6">
        <span class="inline-block bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full">SPONSORED</span>
    </div>

    <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $sponsoredPost->title }}</h1>
    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
        Oleh {{ $sponsoredPost->sponsor_name }}
        @if($sponsoredPost->sponsor_link)
            · <a href="{{ $sponsoredPost->sponsor_link }}" target="_blank" rel="noopener nofollow sponsored" class="text-primary hover:underline">Kunjungi Sponsor →</a>
        @endif
    </p>

    @if($sponsoredPost->image_url)
        <img src="{{ $sponsoredPost->image_url }}" alt="{{ $sponsoredPost->title }}"
             class="w-full rounded-2xl mb-6 object-cover max-h-96" loading="lazy"/>
    @endif

    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
        {!! nl2br(e($sponsoredPost->content)) !!}
    </div>

    <div class="mt-10 p-4 rounded-xl bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 text-sm text-amber-800 dark:text-amber-200">
        💡 <strong>Sponsored:</strong> Artikel ini disponsori oleh {{ $sponsoredPost->sponsor_name }}. Konten tetap dikurasi oleh tim Greentify.
    </div>
</div>
@endsection
