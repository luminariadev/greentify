<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md">
    <nav class="flex justify-between items-center w-full px-gutter py-unit max-w-container-max-width mx-auto">
        <div class="flex items-center gap-8">
            <a class="font-display-lg text-headline-sm md:text-display-lg text-primary tracking-tight" href="{{ route('welcome') }}">Greentify</a>
            <div class="hidden md:flex items-center gap-6">
                <a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="{{ route('limbah') }}">Limbah</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('konservasi') }}">Konservasi</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('penghijauan') }}">Penghijauan</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('hutan') }}">Hutan</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('marketplace.index') }}">Marketplace</a>
                @auth
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('membership.status') }}">Membership</a>
                @endauth
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="{{ route('contact.form') }}">Contact</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('articles.create') }}" class="hidden sm:inline-flex items-center gap-1 font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">
                    <span class="material-symbols-outlined text-sm">edit</span> Tulis
                </a>
                <a href="{{ route('articles.my') }}" class="hidden sm:inline-flex items-center gap-1 font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">
                    <span class="material-symbols-outlined text-sm">article</span> Artikel Saya
                </a>
                <a href="{{ route('bookmarks.index') }}" class="hidden sm:inline-flex items-center gap-1 font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">
                    <span class="material-symbols-outlined text-sm">bookmark</span> Bookmark
                </a>
                <a href="{{ route('notifications.index') }}" class="hidden sm:inline-flex items-center gap-1 font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2 relative">
                    <span class="material-symbols-outlined text-sm">notifications</span>
                    @if(auth()->user()->unreadNotifications->isNotEmpty())
                        <span class="absolute top-1 right-1 min-w-[16px] h-4 px-1 rounded-full bg-error text-on-error text-[10px] font-bold flex items-center justify-center">
                            {{ auth()->user()->unreadNotifications->count() > 9 ? '9+' : auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                    Notifikasi
                </a>
                <a href="{{ route('profile.show') }}" class="hidden sm:inline-flex items-center gap-1 font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">
                    <span class="material-symbols-outlined text-sm">person</span> Profil
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hidden sm:block font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">Login</a>
                <a href="{{ route('register') }}" class="bg-primary text-on-primary font-label-md text-label-md px-6 py-2.5 rounded-lg hover:opacity-90 transition-all active:scale-95">
                    Register
                </a>
            @endauth
            <button class="md:hidden flex items-center p-2 text-primary">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </nav>
</header>