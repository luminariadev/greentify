@props(['position'])

@php
    use App\Http\Controllers\AdController;
    $ads = AdController::getActiveAds($position);
@endphp

@if($ads->isNotEmpty())
    <div {{ $attributes->merge(['class' => 'space-y-4']) }}>
        @foreach($ads as $ad)
            <a href="{{ route('ads.click', $ad) }}" target="_blank" rel="noopener nofollow sponsored"
               class="block rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300">
                <img src="{{ $ad->image_url }}" alt="{{ $ad->title }}"
                     class="w-full h-auto object-cover"
                     onerror="this.onerror=null;this.src='{{ asset('images/placeholder-ad.png') }}';" loading="lazy"/>
            </a>
        @endforeach
    </div>
@endif
