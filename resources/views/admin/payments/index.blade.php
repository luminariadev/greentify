@extends('layouts.app')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between flex-wrap gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-primary mb-1">Verifikasi Pembayaran</h1>
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                Payer sudah menyatakan transfer. Cek rekening bank sebelum menyetujui.
            </p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-primary hover:underline font-medium">
            ← Dashboard
        </a>
    </div>

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

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Menunggu Verifikasi</p>
            <p class="text-3xl font-bold text-amber-600 dark:text-amber-400">{{ $stats['awaiting'] }}</p>
            @if($from || $to)
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">dalam rentang filter</p>
            @endif
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Diterima Hari Ini</p>
            <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['settled_today'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Total Diterima</p>
            <p class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['settled_total'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 border border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Kedaluwarsa</p>
            <p class="text-3xl font-bold text-gray-500 dark:text-gray-400">{{ $stats['expired'] }}</p>
            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">disapu otomatis tiap menit</p>
        </div>
    </div>

    {{-- Date filter. The queue is read-only, so a wrong date widens the
         result set rather than erroring out on the operator mid-reconcile. --}}
    <form method="GET" action="{{ route('admin.payments.index') }}"
          class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700 mb-6 flex flex-wrap items-end gap-3">
        <div>
            <label for="from" class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Dari tanggal</label>
            <input type="date" id="from" name="from" value="{{ $from?->toDateString() }}"
                   class="rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-900 px-3 py-2 text-sm focus:ring-primary focus:border-primary">
        </div>
        <div>
            <label for="to" class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Sampai tanggal</label>
            <input type="date" id="to" name="to" value="{{ $to?->toDateString() }}"
                   class="rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-900 px-3 py-2 text-sm focus:ring-primary focus:border-primary">
        </div>
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-semibold px-5 py-2 rounded-lg transition-colors">
            Terapkan
        </button>
        @if($from || $to)
            <a href="{{ route('admin.payments.index') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:underline py-2">
                Reset filter
            </a>
            <span class="text-xs text-gray-400 dark:text-gray-500 py-2">
                Menampilkan {{ $awaiting->total() }} klaim{{ $from ? ' sejak '.$from->translatedFormat('d M Y') : '' }}{{ $to ? ' sampai '.$to->translatedFormat('d M Y') : '' }}
            </span>
        @endif
    </form>

    <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">
        Antrean Verifikasi ({{ $awaiting->total() }})
    </h2>

    @if($awaiting->isEmpty())
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-10 text-center border border-gray-200 dark:border-gray-700">
            <p class="text-4xl mb-2">🎉</p>
            <p class="text-gray-600 dark:text-gray-400">Tidak ada pembayaran yang menunggu verifikasi.</p>
        </div>
    @else
        <div class="space-y-4 mb-10">
            @foreach($awaiting as $payment)
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-amber-200 dark:border-amber-800">
                    <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                        <div>
                            <p class="font-mono font-bold text-lg text-gray-900 dark:text-gray-100">{{ $payment->reference }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                {{ $payment->user?->name ?? 'Tamu (tanpa akun)' }}
                                · {{ $payment->created_at->format('d M Y H:i') }}
                                @if($payment->submitted_at)
                                    · dikirim {{ $payment->submitted_at->diffForHumans() }}
                                @endif
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-primary">
                                Rp {{ number_format((float) $payment->amount, 0, ',', '.') }}
                            </p>
                            <p class="text-xs uppercase text-gray-500 dark:text-gray-400">{{ $payment->method }}</p>
                        </div>
                    </div>

                    @if($payment->instructions)
                        <details class="mb-4">
                            <summary class="cursor-pointer text-sm font-semibold text-primary">Lihat instruksi yang diberikan ke payer</summary>
                            <pre class="mt-2 text-xs bg-gray-50 dark:bg-gray-900 rounded-lg p-3 whitespace-pre-wrap text-gray-700 dark:text-gray-300">{{ $payment->instructions }}</pre>
                        </details>
                    @endif

                    @php $type = class_basename((string) $payment->payable_type); @endphp
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">
                        Settles: <span class="font-semibold">{{ $type }} #{{ $payment->payable_id }}</span>
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <form method="POST" action="{{ route('admin.payments.approve', $payment->reference) }}">
                            @csrf
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-2.5 rounded-xl transition-colors">
                                ✅ Sudah Masuk Rekening
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.payments.reject', $payment->reference) }}"
                              class="flex-1 min-w-[280px] flex gap-2">
                            @csrf
                            <input type="text" name="note" required minlength="10" maxlength="255"
                                   placeholder="Alasan penolakan (min. 10 karakter)"
                                   class="flex-1 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-900 px-4 py-2.5 text-sm focus:ring-primary focus:border-primary">
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-2.5 rounded-xl transition-colors whitespace-nowrap">
                                Tolak
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-10">{{ $awaiting->links() }}</div>
    @endif

    @if($recentlyReviewed->isNotEmpty())
        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Riwayat Keputusan</h2>
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 dark:bg-gray-900 text-left">
                    <tr>
                        <th class="px-4 py-3">Reference</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Operator</th>
                        <th class="px-4 py-3">Waktu</th>
                        <th class="px-4 py-3">Catatan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($recentlyReviewed as $payment)
                        <tr>
                            <td class="px-4 py-3 font-mono text-xs">{{ $payment->reference }}</td>
                            <td class="px-4 py-3">
                                <span class="font-semibold {{ $payment->status === \App\Models\Payment::STATUS_PAID ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $payment->status === \App\Models\Payment::STATUS_PAID ? 'Disetujui' : 'Ditolak' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $payment->reviewer?->name ?? '—' }}</td>
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $payment->reviewed_at?->format('d M Y H:i') }}</td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">{{ $payment->review_note ?? '—' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
