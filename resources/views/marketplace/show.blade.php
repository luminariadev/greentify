@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Breadcrumb -->
    <nav class="text-sm text-gray-500 dark:text-gray-400 mb-6">
        <a href="{{ route('marketplace.index') }}" class="hover:text-primary transition-colors">Marketplace</a>
        @if($product->affiliateCategory)
            <span class="mx-1">/</span>
            <a href="{{ route('marketplace.index', ['category' => $product->affiliateCategory->slug]) }}" class="hover:text-primary transition-colors">{{ $product->affiliateCategory->name }}</a>
        @endif
        <span class="mx-1">/</span>
        <span class="text-gray-700 dark:text-gray-300">{{ $product->name }}</span>
    </nav>

    <div class="grid md:grid-cols-2 gap-8">
        <!-- Image -->
        <div class="rounded-2xl overflow-hidden bg-gray-100 dark:bg-gray-900 aspect-square flex items-center justify-center">
            @if($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                     class="w-full h-full object-cover" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-product.png') }}';"/>
            @else
                <span class="text-8xl">♻️</span>
            @endif
        </div>

        <!-- Info -->
        <div class="flex flex-col">
            @if($product->affiliateCategory)
                <span class="self-start bg-primary/10 text-primary text-xs font-semibold px-3 py-1 rounded-full mb-3">
                    {{ $product->affiliateCategory->name }}
                </span>
            @endif

            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $product->name }}</h1>
            <p class="mt-2 text-3xl font-extrabold text-primary">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>

            <div class="mt-6 prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                <p>{{ $product->description }}</p>
            </div>

            <div class="mt-8 space-y-3">
                <a href="{{ $product->affiliate_link }}" target="_blank" rel="noopener nofollow sponsored"
                   class="block w-full text-center bg-primary hover:bg-primary-dark text-white font-bold py-4 rounded-xl transition-colors text-lg">
                    🛒 Beli di Toko Rekanan
                </a>
                <a href="{{ route('marketplace.index') }}"
                   class="block w-full text-center border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold py-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    ← Kembali ke Marketplace
                </a>
            </div>

            <div class="mt-6 p-4 rounded-xl bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 text-sm text-amber-800 dark:text-amber-200">
                💡 <strong>Disclaimer:</strong> Greentify mendapat komisi afiliasi dari pembelian melalui link ini. Harga & ketersediaan produk dikelola toko rekanan.
            </div>
        </div>
    </div>
</div>
@endsection
