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

    {{-- Revenue trend. Bars are inline SVG on a fixed viewBox rather than a
         charting library: the shape is a dozen rectangles, and pulling in
         Chart.js for that would add ~200 kB of JavaScript to a page whose
         only real content is a table an operator reads at 2am. Height is
         computed server-side so the tallest bar is always full height
         regardless of currency magnitude. --}}
    <section class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-5 mb-8">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-1">
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">Tren Pendapatan</h2>
            <div class="flex gap-1" role="group" aria-label="Granularitas grafik">
                {{-- Only the granularity travels; the queue's date filter
                     belongs to the claims table and has no bearing on
                     settled income. --}}
                @foreach($granularities as $value => $caption)
                    <a href="{{ route('admin.payments.index', ['granularity' => $value]) }}"
                       class="px-3 py-1.5 text-xs font-semibold rounded-lg transition-colors {{ $granularity === $value
                            ? 'bg-primary text-white'
                            : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        {{ $caption }}
                    </a>
                @endforeach
            </div>
        </div>
        <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">
            Hanya pembayaran berstatus <span class="font-semibold">paid</span>. Refund tidak dihitung sebagai pendapatan.
        </p>

        @php
            $peak = max($revenue['peak'], 1);
            $barCount = max(count($revenueBuckets), 1);
            $barWidth = 100 / $barCount;
            $barHeight = 100;
            $gapPercent = $barCount > 30 ? 1.5 : 4;
        @endphp

        @if($revenue['total'] <= 0)
            <div class="py-8 text-center">
                <p class="text-3xl mb-2">📉</p>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Belum ada pembayaran yang lunas pada rentang ini.
                </p>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-5">
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Total Tren</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        Rp {{ number_format($revenue['total'], 0, ',', '.') }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Rata-rata per {{ $granularityUnit }}</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        Rp {{ number_format($revenue['average'], 0, ',', '.') }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Periode Tertinggi</p>
                    <p class="text-xl font-bold text-green-600 dark:text-green-400">
                        Rp {{ number_format($revenue['peak'], 0, ',', '.') }}
                    </p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Transaksi Lunas</p>
                    <p class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ $revenue['count'] }}</p>
                </div>
            </div>

            <svg viewBox="0 0 100 {{ $barHeight + 6 }}" class="w-full h-40" role="img"
                 aria-label="Tren pendapatan, {{ count($revenueBuckets) }} periode">
                {{-- Baseline: without it a chart of small numbers floating in
                     whitespace reads as "there is no axis here" rather than
                     "these are the amounts". --}}
                <line x1="0" y1="{{ $barHeight }}" x2="100" y2="{{ $barHeight }}"
                      stroke="currentColor" class="text-gray-300 dark:text-gray-600" stroke-width="0.4" />
                @foreach($revenueBuckets as $bucket)
                    @php
                        // A zero bucket still gets a 2% stub rather than nothing:
                        // an absent bar and a no-revenue bar must not look
                        // identical, or the quiet days read as missing data.
                        $height = $bucket['total'] > 0
                            ? max($bucket['total'] / $peak * $barHeight, 2)
                            : 1;
                        $x = $loop->index * $barWidth;
                    @endphp
                    <rect x="{{ round($x + $barWidth * ($gapPercent / 200), 3) }}"
                          y="{{ round($barHeight - $height, 3) }}"
                          width="{{ round($barWidth * (1 - $gapPercent / 100), 3) }}"
                          height="{{ round($height, 3) }}"
                          rx="0.6"
                          class="{{ $bucket['total'] > 0 ? 'fill-primary' : 'fill-gray-300 dark:fill-gray-700' }}">
                        <title>{{ $bucket['label'] }}: Rp {{ number_format($bucket['total'], 0, ',', '.') }} ({{ $bucket['count'] }} transaksi)</title>
                    </rect>
                @endforeach
            </svg>

            {{-- Labels are thinned rather than rotated: 14 daily buckets fit
                 under the chart, 12 weekly ones do too, and a 90-degree
                 label is unreadable at any width. --}}
            <div class="flex justify-between mt-2 text-xs text-gray-500 dark:text-gray-400">
                <span>{{ $revenueBuckets[0]['label'] ?? '' }}</span>
                <span>{{ $revenueBuckets[count($revenueBuckets) - 1]['label'] ?? '' }}</span>
            </div>
        @endif
    </section>

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
