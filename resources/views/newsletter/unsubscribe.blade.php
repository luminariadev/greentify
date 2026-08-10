@extends('layouts.app')

@section('title', 'Unsubscribe Newsletter')

@section('content')
<div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-primary mb-6 text-center">Berhenti Berlangganan Newsletter</h1>

    @if(session('success'))
        <div class="mb-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-xl p-4 text-center">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
        <p class="text-gray-700 dark:text-gray-300 mb-6">
            Kami mohon maaf jika newsletter kami tidak sesuai harapan. Jika Anda yakin ingin berhenti berlangganan, masukkan email Anda di bawah:
        </p>
        <form method="POST" action="{{ route('newsletter.unsubscribe') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Anda</label>
                <input type="email" name="email" id="email" required value="{{ old('email', $email ?? '') }}"
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                       placeholder="email@example.com"/>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl transition-colors text-lg">
                Berhenti Berlangganan
            </button>
        </form>
    </div>
</div>
@endsection
