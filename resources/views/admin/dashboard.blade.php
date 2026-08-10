@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-primary mb-6">Admin Dashboard ⚙️</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card: Total Users -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Total Pengguna</h2>
                <span class="material-symbols-outlined text-primary text-3xl">people</span>
            </div>
            <p class="text-4xl font-bold text-gray-900 dark:text-gray-100">{{ \App\Models\User::count() }}</p>
            <p class="text-sm text-gray-500 mt-1">Pengguna terdaftar di platform</p>
        </div>

        <!-- Card: Total Articles -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Total Artikel</h2>
                <span class="material-symbols-outlined text-primary text-3xl">article</span>
            </div>
            <p class="text-4xl font-bold text-gray-900 dark:text-gray-100">{{ \App\Models\Article::count() }}</p>
            <p class="text-sm text-gray-500 mt-1">Artikel yang dipublikasikan</p>
        </div>

        <!-- Card: Total Donations -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Total Donasi</h2>
                <span class="material-symbols-outlined text-primary text-3xl">volunteer_activism</span>
            </div>
            <p class="text-4xl font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format(\App\Models\Donation::completed()->sum('amount'), 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">Total dukungan yang terkumpul</p>
        </div>
    </div>

    <div class="mt-10 p-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl">
        <h2 class="text-xl font-bold text-blue-800 dark:text-blue-200 mb-4">Aksi Admin</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.newsletter.send') }}" class="inline-flex items-center gap-2 bg-primary text-white font-semibold px-6 py-3 rounded-xl hover:bg-primary-dark transition-colors">
                <span class="material-symbols-outlined text-sm">send</span> Kirim Newsletter
            </a>
        </div>
    </div>
</div>
@endsection
