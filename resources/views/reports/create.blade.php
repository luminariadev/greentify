@extends('layouts.app')

@section('title', 'Laporkan Konten - Greentify')

@section('content')
<div class="max-w-2xl mx-auto px-gutter pt-24 pb-24 min-h-screen">
    <section class="pt-8 pb-10">
        <h1 class="font-headline-md text-headline-md text-primary mb-2">Laporkan Konten</h1>
        <p class="font-body-md text-body-md text-on-surface-variant">Bantu kami menjaga komunitas tetap aman. Pilih alasan pelaporan Anda.</p>
    </section>

    @if(session('success'))
        <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-error-container text-on-error-container p-4 rounded-lg mb-8">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('reports.store') }}" class="bg-white rounded-xl nature-shadow border border-outline-variant/10 p-8">
        @csrf
        <input type="hidden" name="reportable_type" value="{{ $reportableType }}">
        <input type="hidden" name="reportable_id" value="{{ $reportableId }}">

        <div class="mb-6">
            <label class="font-label-md text-label-md text-primary block mb-3">Alasan Pelaporan</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach(['spam' => 'Spam', 'inappropriate' => 'Konten Tidak Pantas', 'hate_speech' => 'Ujaran Kebencian', 'misinformation' => 'Informasi Salah', 'copyright' => 'Hak Cipta', 'other' => 'Lainnya'] as $value => $label)
                    <label class="flex items-center gap-3 p-3 border border-outline-variant/30 rounded-lg cursor-pointer hover:bg-surface-container transition-colors">
                        <input type="radio" name="reason" value="{{ $value }}" class="accent-primary" required>
                        <span class="font-body-md text-body-md text-on-surface">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('reason') <p class="text-error text-sm mt-2">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="font-label-md text-label-md text-primary block mb-3" for="description">Deskripsi Tambahan <span class="text-on-surface-variant/60">(opsional)</span></label>
            <textarea id="description" name="description" rows="4" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all font-body-md text-body-md text-on-surface" placeholder="Jelaskan secara singkat mengapa konten ini melanggar aturan..."></textarea>
        </div>

        <button type="submit" class="px-6 py-3 bg-error text-on-error rounded-lg font-label-md text-label-md hover:opacity-90 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">flag</span> Kirim Laporan
        </button>
    </form>
</div>
@endsection
