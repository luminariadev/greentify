@extends('layouts.app')

@section('title', 'Status Pembayaran')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-primary mb-2">Status Pembayaran</h1>
    <p class="text-gray-600 dark:text-gray-400 mb-8">
        Reference: <span class="font-mono font-semibold">{{ $payment->reference }}</span>
    </p>

    @if(session('success'))
        <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-xl p-4">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-200 rounded-xl p-4">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    @php
        $status = $payment->effectiveStatus();
        $statusStyles = [
            \App\Models\Payment::STATUS_PENDING => ['label' => 'Menunggu Pembayaran', 'icon' => '⏳', 'class' => 'border-amber-200 dark:border-amber-800 bg-amber-50 dark:bg-amber-900/20 text-amber-800 dark:text-amber-200'],
            \App\Models\Payment::STATUS_PAID => ['label' => 'Sudah Dibayar', 'icon' => '✅', 'class' => 'border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900/20 text-green-800 dark:text-green-200'],
            \App\Models\Payment::STATUS_FAILED => ['label' => 'Gagal', 'icon' => '❌', 'class' => 'border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/20 text-red-800 dark:text-red-200'],
            \App\Models\Payment::STATUS_EXPIRED => ['label' => 'Kedaluwarsa', 'icon' => '⌛', 'class' => 'border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300'],
            \App\Models\Payment::STATUS_REFUNDED => ['label' => 'Dikembalikan', 'icon' => '↩️', 'class' => 'border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300'],
        ];
        $badge = $statusStyles[$status] ?? $statusStyles[\App\Models\Payment::STATUS_PENDING];
    @endphp

    <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 mb-6">
        <div class="flex items-center justify-between flex-wrap gap-4 mb-6">
            <div class="flex items-center gap-3">
                <span class="text-3xl">{{ $badge['icon'] }}</span>
                <div>
                    <p class="font-bold text-lg text-gray-900 dark:text-gray-100">{{ $badge['label'] }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Rp {{ number_format((float) $payment->amount, 0, ',', '.') }} · {{ strtoupper($payment->currency) }}
                    </p>
                </div>
            </div>
            <span class="rounded-full border px-4 py-2 text-sm font-semibold {{ $badge['class'] }}">
                {{ strtoupper($payment->method) }}
            </span>
        </div>

        <dl class="grid sm:grid-cols-2 gap-4">
            <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-4">
                <dt class="text-sm text-gray-500">Dibuat</dt>
                <dd class="font-semibold text-gray-900 dark:text-gray-100">{{ $payment->created_at->format('d M Y H:i') }}</dd>
            </div>
            <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-4">
                <dt class="text-sm text-gray-500">Batas bayar</dt>
                <dd class="font-semibold text-gray-900 dark:text-gray-100">{{ $payment->expires_at?->format('d M Y H:i') ?? '-' }}</dd>
            </div>
        </dl>
    </div>

    @if($status === \App\Models\Payment::STATUS_PENDING && $payment->instructions)
        <div class="nature-shadow rounded-2xl p-8 bg-white dark:bg-gray-800 border border-primary/30 mb-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Cara Membayar</h2>
            <ol class="space-y-3 mb-6">
                @foreach(explode("\n", $payment->instructions) as $index => $line)
                    <li class="flex gap-3 text-gray-700 dark:text-gray-300">
                        <span class="flex-shrink-0 w-6 h-6 rounded-full bg-primary/10 text-primary text-xs font-bold flex items-center justify-center">
                            {{ $index + 1 }}
                        </span>
                        <span>{{ $line }}</span>
                    </li>
                @endforeach
            </ol>

            <form method="POST" action="{{ route('payments.confirm', $payment->reference) }}">
                @csrf
                <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 rounded-xl transition-colors">
                    Saya Sudah Transfer
                </button>
            </form>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-3 text-center">
                Verifikasi manual oleh tim Greentify. Jika nominal atau reference tidak cocok, pembayaran tidak akan diproses.
            </p>
        </div>
    @endif

    @if($status === \App\Models\Payment::STATUS_PAID && $payment->paid_at)
        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-200 rounded-xl p-4 text-center">
            🎉 Pembayaran diterima pada {{ $payment->paid_at->format('d M Y H:i') }}. Terima kasih!
        </div>
    @endif

    <div class="mt-8 text-center">
        <a href="{{ route('membership.pricing') }}" class="text-primary hover:underline font-medium">← Kembali ke Membership</a>
    </div>
</div>
@endsection
