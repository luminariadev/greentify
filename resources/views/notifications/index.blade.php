@extends('layouts.app')

@section('title', 'Notifikasi - Greentify')

@section('content')
<div class="max-w-3xl mx-auto px-gutter pt-24 pb-24 min-h-screen">
    <section class="pt-8 pb-10">
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between gap-4 flex-wrap">
                <h1 class="font-headline-md text-headline-md text-primary">Notifikasi</h1>
                @auth
                    @if(auth()->user()->unreadNotifications->isNotEmpty())
                        <form method="POST" action="{{ route('notifications.markAllRead') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-secondary-container text-on-secondary-container rounded-lg font-label-sm text-label-sm hover:bg-secondary-fixed transition-colors">
                                Tandai semua dibaca
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg mb-8">{{ session('success') }}</div>
    @endif

    <section class="space-y-3">
        @forelse($notifications as $notification)
            @php $data = $notification->data; @endphp
            <div class="bg-white rounded-xl nature-shadow border border-outline-variant/10 p-5 flex items-start gap-4 {{ $notification->read_at ? 'opacity-60' : '' }}">
                <div class="w-10 h-10 rounded-full {{ $notification->read_at ? 'bg-surface-container text-on-surface-variant' : 'bg-secondary-container text-on-secondary-container' }} flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-lg">
                        {{ $data['type'] === 'article_liked' ? 'favorite' : ($data['type'] === 'article_bookmarked' ? 'bookmark' : ($data['type'] === 'user_followed' ? 'person_add' : 'chat_bubble')) }}
                    </span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-body-md text-body-md text-on-surface mb-1">{{ $data['message'] }}</p>
                    <div class="flex items-center gap-3">
                        <span class="font-label-sm text-label-sm text-on-surface-variant/60">{{ $notification->created_at->diffForHumans() }}</span>
                        @if(!$notification->read_at)
                            <span class="px-2 py-0.5 bg-secondary/10 text-secondary rounded-full text-[10px] font-bold uppercase">Baru</span>
                        @endif
                    </div>
                    @if(isset($data['url']))
                        <a href="{{ $data['url'] }}" class="inline-flex items-center gap-1 mt-2 font-label-sm text-label-sm text-secondary hover:underline">
                            Lihat <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    @endif
                </div>
                @if(!$notification->read_at)
                    <form method="POST" action="{{ route('notifications.markRead') }}">
                        @csrf
                        <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                        <button type="submit" class="text-on-surface-variant hover:text-primary" title="Tandai dibaca">
                            <span class="material-symbols-outlined text-lg">done_all</span>
                        </button>
                    </form>
                @endif
            </div>
        @empty
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-outline mb-4 block">notifications_none</span>
                <h2 class="font-headline-sm text-headline-sm text-primary mb-2">Belum Ada Notifikasi</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Like, bookmark, follow, dan komentar baru akan muncul di sini.</p>
            </div>
        @endforelse
    </section>

    @if($notifications->hasPages())
        <div class="mt-12">{{ $notifications->links() }}</div>
    @endif
</div>
@endsection
