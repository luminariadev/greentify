@extends('layouts.app')

@section('title', 'Tulis Artikel Baru')

@section('content')
<div class="max-w-3xl mx-auto px-gutter py-16">
    <header class="mb-12">
        <h1 class="font-headline-md text-headline-md text-primary mb-4">Tulis Artikel Baru</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Bagikan wawasan, pengalaman, atau penelitian Anda dengan komunitas Greentify.</p>
    </header>

    @if($errors->any())
        <div class="bg-error-container text-on-error-container p-4 rounded-lg mb-8">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="space-y-8" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="title">Judul Artikel</label>
            <input class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50" id="title" name="title" placeholder="Masukkan judul yang menarik..." required type="text" value="{{ old('title') }}"/>
        </div>

        <!-- Category -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="category_id">Kategori</label>
            <select class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface" id="category_id" name="category_id" required>
                <option value="">Pilih kategori...</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Excerpt -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="excerpt">Ringkasan (Opsional)</label>
            <textarea class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50 resize-none" id="excerpt" name="excerpt" placeholder="Ringkasan singkat artikel (maks 500 karakter)..." rows="3" maxlength="500">{{ old('excerpt') }}</textarea>
            <p class="font-label-sm text-label-sm text-on-surface-variant/60">Maksimal 500 karakter. Tampil di halaman index dan preview.</p>
        </div>

        <!-- Content -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="content">Konten Artikel</label>
            <textarea class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50 resize-y" id="content" name="content" placeholder="Tulis konten artikel lengkap di sini... Gunakan paragraf yang jelas, sub-judul, dan struktur yang mudah dibaca." rows="15" required>{{ old('content') }}</textarea>
            <p class="font-label-sm text-label-sm text-on-surface-variant/60">Tips: Gunakan paragraf pendek, sub-judul, dan ilustrasi untuk memudahkan pembaca.</p>
        </div>

        <!-- Featured Image -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="featured_image">Gambar Utama (Opsional)</label>
            <div class="border-2 border-dashed border-outline-variant/30 rounded-xl p-8 text-center hover:border-primary/50 transition-colors">
                <input class="sr-only" id="featured_image" name="featured_image" type="file" accept="image/*"/>
                <label for="featured_image" class="cursor-pointer w-full h-full">
                    <span class="material-symbols-outlined text-4xl text-outline mb-4 block">add_photo_alternate</span>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-2">Klik atau drag & drop gambar</p>
                    <p class="font-label-sm text-label-sm text-on-surface-variant/60">PNG, JPG, WebP • Maks 2MB</p>
                </label>
            </div>
            @if(old('featured_image'))
                <div class="mt-4">
                    <img src="{{ asset('storage/' . old('featured_image')) }}" alt="Preview" class="max-h-40 rounded-lg"/>
                </div>
            @endif
        </div>

        <!-- Status -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block">Status Publikasi</label>
            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="status" value="draft" {{ old('status', 'draft') === 'draft' ? 'checked' : '' }} class="w-5 h-5 text-primary border-outline-variant/30 focus:ring-primary"/>
                    <span class="font-body-md text-body-md text-on-surface">Draft</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="status" value="published" {{ old('status') === 'published' ? 'checked' : '' }} class="w-5 h-5 text-primary border-outline-variant/30 focus:ring-primary"/>
                    <span class="font-body-md text-body-md text-on-surface">Publikasikan</span>
                </label>
            </div>
            <p class="font-label-sm text-label-sm text-on-surface-variant/60">Draft hanya terlihat oleh Anda. Publikasi akan muncul di halaman blogspot.</p>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-outline-variant/30">
            <a href="{{ route('articles.index') }}" class="flex-1 sm:flex-none px-8 py-4 bg-surface-container text-on-surface border border-outline-variant/30 rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-colors text-center">Batal</a>
            <button class="flex-1 sm:flex-none px-8 py-4 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all active:scale-[0.98] flex items-center justify-center gap-2" type="submit">
                Simpan Artikel
                <span class="material-symbols-outlined text-sm">save</span>
            </button>
        </div>
    </form>
</div>
@endsection