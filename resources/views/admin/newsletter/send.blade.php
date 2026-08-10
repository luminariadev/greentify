@extends('layouts.app')

@section('title', 'Kirim Newsletter')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-primary mb-6 text-center">Kirim Newsletter ✉️</h1>

    @if(session('success'))
        <div class="mb-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-xl p-4 text-center">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-8 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 rounded-xl p-4">
            @foreach($errors->all() as $error)
                <p>⚠️ {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('admin.newsletter.send') }}">
            @csrf
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subjek Email</label>
                <input type="text" name="subject" id="subject" required value="{{ old('subject') }}"
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                       placeholder="Subjek Newsletter Anda"/>
                @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konten Email</label>
                <textarea name="content" id="content" rows="8" required
                          class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                          placeholder="Tulis konten newsletter di sini...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 rounded-xl transition-colors text-lg">
                Kirim Newsletter ke Subscriber
            </button>
        </form>
    </div>
</div>
@endsection
