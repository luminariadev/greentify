@extends('layouts.app')

@section('title', 'Jelajahi Dunia Hijau')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-300 to-primary py-20 px-4 sm:px-6 lg:px-8 text-center text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1518837695005-208320ca9425?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w1MDcwMDV8MHwxfHNlYXJjaHw1Nnx8ZW52aXJvbm1lbnRhbHxlbnwwfHx8fDE2OTEzNzE0ODJ8MA&ixlib=rb-4.0.3&q=80&w=1080'); background-size: cover; background-position: center;"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mb-4 nature-shadow-text">
                Greentify: Menghijaukan Masa Depan
            </h1>
            <p class="text-lg sm:text-xl mb-8 leading-relaxed">
                Platform komunitas dan blog untuk inspirasi, edukasi, dan aksi nyata gaya hidup berkelanjutan.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('blogspot') }}"
                   class="bg-white text-primary font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    Jelajahi Artikel
                </a>
                <a href="{{ route('marketplace.index') }}"
                   class="bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-white hover:text-primary transition-all duration-300 transform hover:scale-105">
                    Lihat Marketplace
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-900 dark:text-gray-100 mb-12 nature-shadow-text">
                Apa yang Kami Tawarkan?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="text-center nature-shadow p-6 rounded-xl bg-gray-50 dark:bg-gray-700 hover:shadow-primary-md transition-all duration-300">
                    <span class="text-5xl text-primary mb-4 block">📚</span>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Artikel Edukatif</h3>
                    <p class="text-gray-600 dark:text-gray-400">Baca artikel mendalam tentang lingkungan, tips hidup hijau, dan berita terkini.</p>
                </div>
                <div class="text-center nature-shadow p-6 rounded-xl bg-gray-50 dark:bg-gray-700 hover:shadow-primary-md transition-all duration-300">
                    <span class="text-5xl text-primary mb-4 block">🤝</span>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Komunitas Aktif</h3>
                    <p class="text-gray-600 dark:text-gray-400">Bergabunglah dengan komunitas yang peduli lingkungan, berdiskusi, dan berkolaborasi.</p>
                </div>
                <div class="text-center nature-shadow p-6 rounded-xl bg-gray-50 dark:bg-gray-700 hover:shadow-primary-md transition-all duration-300">
                    <span class="text-5xl text-primary mb-4 block">🛍️</span>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Marketplace Hijau</h3>
                    <p class="text-gray-600 dark:text-gray-400">Temukan produk ramah lingkungan pilihan dan dukung bisnis berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-gradient-to-r from-primary to-green-500 py-20 px-4 sm:px-6 lg:px-8 text-center text-white">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6 nature-shadow-text">
                Siap Bergabung dengan Gerakan Hijau?
            </h2>
            <p class="text-lg sm:text-xl mb-10 leading-relaxed">
                Daftar sekarang untuk mulai berkontribusi, belajar, dan berbelanja secara berkelanjutan.
            </p>
            <a href="{{ route('register') }}"
               class="bg-white text-primary font-bold py-4 px-10 rounded-full shadow-lg hover:shadow-xl hover:bg-gray-100 text-xl transition-all duration-300 transform hover:scale-105">
                Daftar Gratis
            </a>
        </div>
    </section>
</div>
@endsection
