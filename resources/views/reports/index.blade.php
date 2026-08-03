@extends('layouts.app')

@section('title', 'Kelola Laporan - Greentify')

@section('content')
<div class="max-w-5xl mx-auto px-gutter pt-24 pb-24 min-h-screen">
    <section class="pt-8 pb-10">
        <h1 class="font-headline-md text-headline-md text-primary">Kelola Laporan</h1>
    </section>

    @if(session('success'))
        <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
    @endif

    <section class="space-y-4">
        @forelse($reports as $report)
            <div class="bg-white rounded-xl nature-shadow border border-outline-variant/10 p-6">
                <div class="flex items-start justify-between gap-4 mb-3">
                    <div>
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                            {{ $report->status === 'pending' ? 'bg-tertiary-fixed/20 text-tertiary' : ($report->status === 'reviewed' ? 'bg-surface-container text-on-surface-variant' : ($report->status === 'dismissed' ? 'bg-surface-container text-on-surface-variant' : 'bg-error-container/20 text-error')) }}">
                            {{ $report->status === 'pending' ? 'Ditinjau' : ($report->status === 'reviewed' ? 'Ditinjau' : ($report->status === 'dismissed' ? 'Ditolak' : 'Ditindak')) }}
                        </span>
                    </div>
                    <span class="font-label-sm text-label-sm text-on-surface-variant/60">{{ $report->created_at->diffForHumans() }}</span>
                </div>

                <p class="font-body-md text-body-md text-on-surface mb-2">{{ $report->reporter->name }} melaporkan {{ class_basename($report->reportable_type) }} #{{ $report->reportable_id }}.</p>
                <p class="font-label-sm text-label-sm text-on-surface-variant mb-4">Alasan: <strong class="text-primary">{{ $report->reason }}</strong></p>

                @if($report->description)
                    <p class="font-body-md text-body-md text-on-surface-variant italic bg-surface-container p-3 rounded-lg mb-4">{{ $report->description }}</p>
                @endif

                @if(isset($report->reportable) && method_exists($report->reportable, 'title'))
                    <p class="font-body-md text-body-md text-on-surface mb-4">Konten: <a href="{{ route('articles.show', $report->reportable) }}" class="text-secondary hover:underline">{{ $report->reportable->title }}</a></p>
                @endif

                @if($report->status === 'pending')
                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('reports.review', $report) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="reviewed">
                            <button type="submit" class="px-4 py-2 bg-surface-container-high text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-colors">Tinjau</button>
                        </form>
                        <form method="POST" action="{{ route('reports.review', $report) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="dismissed">
                            <button type="submit" class="px-4 py-2 bg-surface-container-high text-on-surface-variant rounded-lg font-label-sm text-label-sm hover:bg-surface-container transition-colors">Tolak</button>
                        </form>
                        <form method="POST" action="{{ route('reports.review', $report) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="action_taken">
                            <button type="submit" class="px-4 py-2 bg-error/10 text-error rounded-lg font-label-sm text-label-sm hover:bg-error/20 transition-colors">Tindak</button>
                        </form>
                    </div>
                @else
                    <p class="font-label-sm text-label-sm text-on-surface-variant">Ditinjau oleh {{ $report->reviewedBy?->name ?? 'admin' }} {{ $report->reviewed_at?->diffForHumans() ?? '' }}</p>
                @endif
            </div>
        @empty
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-outline mb-4 block">report_off</span>
                <h2 class="font-headline-sm text-headline-sm text-primary mb-2">Tidak Ada Laporan</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Semua konten dalam kondisi baik.</p>
            </div>
        @endforelse
    </section>

    @if($reports->hasPages())
        <div class="mt-12">{{ $reports->links() }}</div>
    @endif
</div>
@endsection
