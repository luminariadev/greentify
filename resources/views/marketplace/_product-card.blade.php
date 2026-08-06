@php
    $formattedPrice = 'Rp ' . number_format((float) $product->price, 0, ',', '.');
@endphp

<div class="nature-shadow group rounded-2xl overflow-hidden bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col">
    <!-- Image -->
    <a href="{{ route('marketplace.show', $product) }}" class="block relative h-48 bg-gray-100 dark:bg-gray-900 overflow-hidden">
        @if($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 loading="lazy" onerror="this.onerror=null;this.src='{{ asset('images/placeholder-product.png') }}';"/>
        @else
            <div class="w-full h-full flex items-center justify-center text-5xl">♻️</div>
        @endif
        @if($product->affiliateCategory)
            <span class="absolute top-2 left-2 bg-primary/90 text-white text-xs font-semibold px-2 py-1 rounded-full">
                {{ $product->affiliateCategory->name }}
            </span>
        @endif
    </a>

    <!-- Body -->
    <div class="p-4 flex flex-col flex-1">
        <h3 class="font-semibold text-gray-900 dark:text-gray-100 line-clamp-1">
            <a href="{{ route('marketplace.show', $product) }}" class="hover:text-primary transition-colors">{{ $product->name }}</a>
        </h3>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 line-clamp-2 flex-1">{{ $product->description }}</p>

        <div class="mt-3 flex items-center justify-between">
            <span class="text-lg font-bold text-primary">{{ $formattedPrice }}</span>
            <a href="{{ $product->affiliate_link }}" target="_blank" rel="noopener nofollow sponsored"
               class="inline-flex items-center gap-1 bg-primary hover:bg-primary-dark text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                Beli <span>→</span>
            </a>
        </div>
    </div>
</div>
