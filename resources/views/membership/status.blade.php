@extends('layouts.app')

@section('title', 'Status Membership')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-primary mb-6">Status Membership</h1>

    @if(session('success'))
        <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-xl p-4">
            ✅ {{ session('success') }}
        </div>
    @endif

    @php
        $membership = $user->membership;
        $tier = $membership?->tier;
    @endphp

    @if($membership && $membership->is_active && !$membership->isExpired())
        <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-primary/30">
            <div class="flex items-center gap-4 mb-6">
                <span class="text-5xl">🌿</span>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $tier->name }}</h2>
                    <p class="text-gray-500 dark:text-gray-400">{{ $tier->description }}</p>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-4">
                    <p class="text-sm text-gray-500">Mulai</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $membership->starts_at?->format('d M Y') ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-4">
                    <p class="text-sm text-gray-500">Berakhir</p>
                    <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $membership->expires_at?->format('d M Y') ?? 'Selamanya' }}</p>
                </div>
            </div>

            <ul class="space-y-2 mb-6">
                @foreach($tier->features ?? [] as $feature)
                    <li class="flex items-start gap-2 text-gray-700 dark:text-gray-300">
                        <span class="text-primary">✓</span> {{ $feature }}
                    </li>
                @endforeach
            </ul>

            <div class="flex gap-3">
                <a href="{{ route('membership.pricing') }}" class="bg-primary hover:bg-primary-dark text-white font-semibold px-6 py-3 rounded-xl transition-colors">
                    Upgrade / Ubah Tier
                </a>
                <form method="POST" action="{{ route('membership.cancel') }}">
                    @csrf
                    <button type="submit" class="border border-red-300 dark:border-red-800 text-red-500 font-semibold px-6 py-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                        Batalkan
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-center">
            <p class="text-5xl mb-4">🌱</p>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Anda Belum Punya Membership Aktif</h2>
            <p class="text-gray-500 dark:text-gray-400 mb-6">Upgrade sekarang untuk akses konten premium, analitik artikel, dan tanpa iklan.</p>
            <a href="{{ route('membership.pricing') }}" class="inline-block bg-primary hover:bg-primary-dark text-white font-semibold px-8 py-3 rounded-xl transition-colors">
                Lihat Paket Membership
            </a>
        </div>
    @endif
</div>
@endsection
