@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="max-w-3xl mx-auto px-gutter py-16">
    <header class="mb-12">
        <h1 class="font-headline-md text-headline-md text-primary mb-4">Edit Artikel</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant">Perbarui konten artikel Anda.</p>
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

    <form class="space-y-8" method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="title">Judul Artikel</label>
            <input class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface" id="title" name="title" placeholder="Masukkan judul yang menarik..." required type="text" value="{{ old('title', $article->title) }}"/>
        </div>

        <!-- Category -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="category_id">Kategori</label>
            <select class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Excerpt -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="excerpt">Ringkasan</label>
            <textarea class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface resize-none" id="excerpt" name="excerpt" placeholder="Ringkasan singkat artikel..." rows="3" maxlength="500">{{ old('excerpt', $article->excerpt) }}</textarea>
        </div>

        <!-- Content -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="content">Konten Artikel</label>
            <textarea class="w-full px-4 py-3 bg-surface-container border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface resize-y" id="content" name="content" rows="15" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <!-- Featured Image -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block" for="featured_image">Gambar Utama</label>
            @if($article->featured_image)
                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="max-h-40 rounded-lg mb-4"/>
            @endif
            <div class="border-2 border-dashed border-outline-variant/30 rounded-xl p-8 text-center hover:border-primary/50 transition-colors">
                <input class="sr-only" id="featured_image" name="featured_image" type="file" accept="image/*"/>
                <label for="featured_image" class="cursor-pointer w-full h-full">
                    <span class="material-symbols-outlined text-4xl text-outline mb-4 block">add_photo_alternate</span>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-2">Klik untuk ganti gambar</p>
                    <p class="font-label-sm text-label-sm text-on-surface-variant/60">PNG, JPG, WebP • Maks 2MB</p>
                </label>
            </div>
        </div>

        <!-- Status -->
        <div class="space-y-2">
            <label class="font-label-md text-label-md text-primary block">Status Publikasi</label>
            <div class="flex gap-6">
                @foreach(['draft' => 'Draft', 'published' => 'Publikasikan', 'archived' => 'Arsipkan'] as $value => $label)
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="{{ $value }}" {{ old('status', $article->status) === $value ? 'checked' : '' }} class="w-5 h-5 text-primary border-outline-variant/30 focus:ring-primary"/>
                        <span class="font-body-md text-body-md text-on-surface">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-outline-variant/30">
            <a href="{{ route('articles.index') }}" class="flex-1 sm:flex-none px-8 py-4 bg-surface-container text-on-surface border border-outline-variant/30 rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-colors text-center">Batal</a>
            <button class="flex-1 sm:flex-none px-8 py-4 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all active:scale-[0.98] flex items-center justify-center gap-2" type="submit">
                Perbarui Artikel
                <span class="material-symbols-outlined text-sm">save</span>
            </button>
        </div>
    </form>
</div>
@endsection