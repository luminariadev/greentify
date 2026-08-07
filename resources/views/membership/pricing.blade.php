@extends('layouts.app')

@section('title', 'Premium Membership')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Hero -->
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-primary">Premium Membership 🌿</h1>
        <p class="mt-3 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Dukung Greentify dan dapatkan akses eksklusif — dari konten premium sampai analitik artikel.
        </p>
    </div>

    @if(session('success'))
        <div class="max-w-xl mx-auto mb-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-xl p-4 text-center">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-xl mx-auto mb-8 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 rounded-xl p-4 text-center">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    <!-- Pricing Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
        @foreach($tiers as $tier)
            <div class="nature-shadow rounded-2xl p-6 bg-white dark:bg-gray-800 border {{ $tier->slug === 'pro-green' ? 'border-primary ring-2 ring-primary/20' : 'border-gray-200 dark:border-gray-700' }} flex flex-col relative">
                @if($tier->slug === 'pro-green')
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">TERPOPULER</span>
                @endif

                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $tier->name }}</h3>
                <p class="mt-2 text-3xl font-extrabold text-primary">
                    Rp {{ number_format((float) $tier->price, 0, ',', '.') }}
                    <span class="text-sm font-normal text-gray-500">/bulan</span>
                </p>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400 flex-1">{{ $tier->description }}</p>

                <ul class="mt-4 space-y-2 text-sm">
                    @foreach($tier->features ?? [] as $feature)
                        <li class="flex items-start gap-2 text-gray-700 dark:text-gray-300">
                            <span class="text-primary mt-0.5">✓</span> {{ $feature }}
                        </li>
                    @endforeach
                </ul>

                @auth
                    @if(auth()->user()->membership && auth()->user()->membership->tier?->slug === $tier->slug)
                        <span class="mt-6 block w-full text-center bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold py-3 rounded-xl">
                            Aktif Saat Ini
                        </span>
                    @else
                        <form method="POST" action="{{ route('membership.subscribe', $tier) }}" class="mt-6">
                            @csrf
                            <button type="submit"
                                    class="w-full {{ $tier->slug === 'free' ? 'bg-gray-500 hover:bg-gray-600' : 'bg-primary hover:bg-primary-dark' }} text-white font-semibold py-3 rounded-xl transition-colors">
                                {{ $tier->slug === 'free' ? 'Turun ke Free' : 'Pilih ' . $tier->name }}
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="mt-6 block w-full text-center bg-primary hover:bg-primary-dark text-white font-semibold py-3 rounded-xl transition-colors">
                        Login untuk Berlangganan
                    </a>
                @endauth
            </div>
        @endforeach
    </div>

    <!-- Benefits -->
    <div class="max-w-4xl mx-auto mt-16">
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-gray-100 mb-8">Keuntungan Membership</h2>
        <div class="grid sm:grid-cols-3 gap-6">
            <div class="text-center p-4">
                <p class="text-4xl mb-2">📊</p>
                <h4 class="font-semibold text-gray-900 dark:text-gray-100">Article Analytics</h4>
                <p class="text-sm text-gray-500 mt-1">Lihat performa artikelmu: views, likes, bookmark</p>
            </div>
            <div class="text-center p-4">
                <p class="text-4xl mb-2">✨</p>
                <h4 class="font-semibold text-gray-900 dark:text-gray-100">Badge & Verified</h4>
                <p class="text-sm text-gray-500 mt-1">Tampil beda dengan badge Green dan Verified</p>
            </div>
            <div class="text-center p-4">
                <p class="text-4xl mb-2">🚫</p>
                <h4 class="font-semibold text-gray-900 dark:text-gray-100">Tanpa Iklan</h4>
                <p class="text-sm text-gray-500 mt-1">Nikmati membaca tanpa gangguan iklan</p>
            </div>
        </div>
    </div>
</div>
@endsection
