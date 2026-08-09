@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl sm:text-4xl font-bold text-primary">Dukung Greentify 🌱</h1>
        <p class="mt-3 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Donasi Anda membantu kami terus menyediakan konten lingkungan yang edukatif dan membangun komunitas.
        </p>
    </div>

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

    <!-- Stats -->
    <div class="grid sm:grid-cols-2 gap-6 mb-10">
        <div class="nature-shadow rounded-2xl p-6 text-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <p class="text-4xl font-extrabold text-primary">Rp {{ number_format((float) $totalRaised, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Terkumpul</p>
        </div>
        <div class="nature-shadow rounded-2xl p-6 text-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <p class="text-4xl font-extrabold text-primary">{{ $donationCount }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Donatur</p>
        </div>
    </div>

    <!-- Donation Form -->
    <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">Buat Donasi</h2>
        <form method="POST" action="{{ route('donation.store') }}">
            @csrf

            <!-- Amount presets -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilih Nominal</label>
                <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                    @foreach([10000, 25000, 50000, 100000, 250000] as $preset)
                        <button type="button" data-preset="{{ $preset }}"
                                class="preset-btn border border-gray-300 dark:border-gray-700 rounded-lg py-2 text-sm font-semibold text-gray-700 dark:text-gray-300 hover:border-primary hover:text-primary transition-colors">
                            {{ $preset >= 1000 ? 'Rp ' . number_format($preset / 1000) . 'rb' : $preset }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nominal Lainnya (Rp)</label>
                <input type="number" name="amount" id="amount" min="1000" max="10000000" required
                       class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                       placeholder="Contoh: 50000"/>
            </div>

            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" required
                        class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="qris">QRIS</option>
                    <option value="bank_transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pesan (opsional)</label>
                <textarea name="message" id="message" rows="3" maxlength="500"
                          class="w-full rounded-xl border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                          placeholder="Tulis pesan dukunganmu..."></textarea>
            </div>

            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-4 rounded-xl transition-colors text-lg">
                💚 Donasi Sekarang
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('amount').value = btn.dataset.preset;
            document.querySelectorAll('.preset-btn').forEach(b => {
                b.classList.remove('border-primary', 'text-primary', 'bg-primary/5');
            });
            btn.classList.add('border-primary', 'text-primary', 'bg-primary/5');
        });
    });
</script>
@endpush
