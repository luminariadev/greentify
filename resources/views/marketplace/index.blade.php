@extends('layouts.app')

@section('title', 'Green Marketplace')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Hero -->
    <div class="text-center mb-10">
        <h1 class="text-3xl sm:text-4xl font-bold text-primary">Green Marketplace 🌿</h1>
        <p class="mt-3 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Produk ramah lingkungan pilihan — setiap pembelian mendukung gaya hidup berkelanjutan.
        </p>
    </div>

    <!-- Search -->
    <form method="GET" action="{{ route('marketplace.index') }}" class="max-w-xl mx-auto mb-8">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari produk hijau..."
                   class="flex-1 rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"/>
            <button type="submit"
                    class="bg-primary hover:bg-primary-dark text-white font-semibold px-6 py-3 rounded-xl transition-colors">
                Cari
            </button>
        </div>
    </form>

    <!-- Category Filter -->
    <div class="flex flex-wrap justify-center gap-2 mb-10">
        <a href="{{ route('marketplace.index') }}"
           class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}">
            Semua ({{ $categories->sum('products_count') }})
        </a>
        @foreach($categories as $category)
            <a href="{{ route('marketplace.index', ['category' => $category->slug]) }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-colors {{ request('category') === $category->slug ? 'bg-primary text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700' }}">
                {{ $category->name }} ({{ $category->products_count }})
            </a>
        @endforeach
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                @include('marketplace._product-card', ['product' => $product])
            @endforeach
        </div>

        <div class="mt-10">
            {{ $products->withQueryString()->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <p class="text-5xl mb-4">🌱</p>
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Produk belum tersedia</h3>
            <p class="text-gray-500 mt-2">Belum ada produk pada kategori ini. Coba kategori lain.</p>
        </div>
    @endif
</div>
@endsection
