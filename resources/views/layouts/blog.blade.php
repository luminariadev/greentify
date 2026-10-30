@extends('layouts.app')

@section('title', 'Blogspot - Greentify')

@section('content')
<div class="max-w-container-max-width mx-auto px-gutter py-10 min-h-screen">
    <div class="mb-8">
        <h1 class="font-headline-md text-headline-md text-primary">Topik Blog Lingkungan</h1>
        <p class="font-body-md text-body-md text-on-surface-variant">Jelajahi panduan praktis dan artikel aksi lingkungan.</p>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
        <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden border border-outline-variant/10">
            <img class="object-cover w-full h-56 lg:w-64" src="https://images.unsplash.com/photo-1562077981-4d7eafd44932?q=80&w=1470&auto=format&fit=crop" alt="Pengurangan Limbah Plastik">
            <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                <a href="{{ route('limbah') }}" class="text-xl font-semibold text-primary hover:underline">
                    Pengurangan Limbah Plastik
                </a> 
                <span class="text-sm text-on-surface-variant mt-2">Strategi zero waste dan daur ulang berkelanjutan</span>
            </div>
        </div>

        <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden border border-outline-variant/10">
            <img class="object-cover w-full h-56 lg:w-64" src="https://plus.unsplash.com/premium_photo-1663013572158-a01191b95f4b?q=80&w=1470&auto=format&fit=crop" alt="Konservasi Air">
            <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                <a href="{{ route('konservasi') }}" class="text-xl font-semibold text-primary hover:underline">
                    Konservasi Air di Lingkungan Kering
                </a>
                <span class="text-sm text-on-surface-variant mt-2">Manajemen sumber daya air dan resapan</span>
            </div>
        </div>

        <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden border border-outline-variant/10">
            <img class="object-cover w-full h-56 lg:w-64" src="https://plus.unsplash.com/premium_photo-1663076367860-3cde6cedaf66?q=80&w=1472&auto=format&fit=crop" alt="Penghijauan Kota">
            <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                <a href="{{ route('penghijauan') }}" class="text-xl font-semibold text-primary hover:underline">
                    Manfaat Penghijauan Kota dalam Mengatasi Perubahan Iklim
                </a>
                <span class="text-sm text-on-surface-variant mt-2">Ruang terbuka hijau dan hutan perkotaan</span>
            </div>
        </div>

        <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-xl shadow-md overflow-hidden border border-outline-variant/10">
            <img class="object-cover w-full h-56 lg:w-64" src="https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=1632&auto=format&fit=crop" alt="Perlindungan Hutan Hujan">
            <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                <a href="{{ route('hutan') }}" class="text-xl font-semibold text-primary hover:underline">
                    Perlindungan Hutan Hujan bagi Keanekaragaman Hayati
                </a>
                <span class="text-sm text-on-surface-variant mt-2">Konservasi flora, fauna, dan kanopi pohon dunia</span>
            </div>
        </div>
    </div>
</div>
@endsection
