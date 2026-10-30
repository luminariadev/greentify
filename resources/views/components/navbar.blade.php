<!-- Unified Top Navigation Bar (User-Centered Design) -->
<header id="site-header" class="fixed top-0 inset-x-0 w-full z-50 bg-surface/95 backdrop-blur-md border-b border-outline-variant/15 transition-shadow duration-300">
    <div class="max-w-container-max-width mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
        
        <!-- Brand Logo -->
        <div class="flex items-center gap-8">
            <a class="flex items-center gap-2.5 group flex-shrink-0" href="{{ route('welcome') }}" aria-label="Greentify Home">
                <span class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-on-primary group-hover:scale-105 transition-transform duration-300 shadow-sm">
                    <span class="material-symbols-outlined text-2xl">eco</span>
                </span>
                <span class="font-display-lg text-2xl md:text-3xl font-bold text-primary tracking-tight">Greentify</span>
            </a>

            <!-- Desktop Primary Navigation -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2" aria-label="Navigasi Utama">
                <!-- Beranda -->
                <a href="{{ route('welcome') }}" 
                   class="px-3.5 py-2 rounded-lg font-label-md text-label-md transition-all {{ request()->routeIs('welcome') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                    Beranda
                </a>

                <!-- Semua Artikel -->
                <a href="{{ route('blogspot') }}" 
                   class="px-3.5 py-2 rounded-lg font-label-md text-label-md transition-all {{ request()->routeIs('blogspot', 'articles.show') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                    Artikel
                </a>

                <!-- Topik Dropdown -->
                <div class="relative" id="topics-dropdown-container">
                    <button type="button" 
                            id="topics-menu-button"
                            aria-expanded="false" 
                            aria-haspopup="true"
                            class="px-3.5 py-2 rounded-lg font-label-md text-label-md inline-flex items-center gap-1 transition-all {{ request()->routeIs('limbah', 'konservasi', 'penghijauan', 'hutan') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                        <span>Topik</span>
                        <span class="material-symbols-outlined text-lg transition-transform duration-200" id="topics-chevron">expand_more</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="topics-dropdown-menu" 
                         class="hidden absolute left-0 mt-2 w-64 bg-surface-container-lowest rounded-2xl shadow-nature-xl border border-outline-variant/20 p-2 z-50">
                        <a href="{{ route('limbah') }}" 
                           class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-surface-container transition-colors {{ request()->routeIs('limbah') ? 'bg-secondary-container text-on-secondary-container font-semibold' : 'text-on-surface' }}">
                            <span class="material-symbols-outlined text-secondary">recycling</span>
                            <div>
                                <p class="font-label-md text-sm">Limbah</p>
                                <p class="text-xs text-on-surface-variant">Waste management & zero waste</p>
                            </div>
                        </a>
                        <a href="{{ route('konservasi') }}" 
                           class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-surface-container transition-colors {{ request()->routeIs('konservasi') ? 'bg-secondary-container text-on-secondary-container font-semibold' : 'text-on-surface' }}">
                            <span class="material-symbols-outlined text-secondary">nature</span>
                            <div>
                                <p class="font-label-md text-sm">Konservasi</p>
                                <p class="text-xs text-on-surface-variant">Air & ekosistem alami</p>
                            </div>
                        </a>
                        <a href="{{ route('penghijauan') }}" 
                           class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-surface-container transition-colors {{ request()->routeIs('penghijauan') ? 'bg-secondary-container text-on-secondary-container font-semibold' : 'text-on-surface' }}">
                            <span class="material-symbols-outlined text-secondary">park</span>
                            <div>
                                <p class="font-label-md text-sm">Penghijauan</p>
                                <p class="text-xs text-on-surface-variant">Reforestasi & iklim kota</p>
                            </div>
                        </a>
                        <a href="{{ route('hutan') }}" 
                           class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-surface-container transition-colors {{ request()->routeIs('hutan') ? 'bg-secondary-container text-on-secondary-container font-semibold' : 'text-on-surface' }}">
                            <span class="material-symbols-outlined text-secondary">forest</span>
                            <div>
                                <p class="font-label-md text-sm">Hutan</p>
                                <p class="text-xs text-on-surface-variant">Hutan hujan & keanekaragaman</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Marketplace -->
                <a href="{{ route('marketplace.index') }}" 
                   class="px-3.5 py-2 rounded-lg font-label-md text-label-md transition-all {{ request()->routeIs('marketplace.*') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                    Marketplace
                </a>

                <!-- Donasi -->
                <a href="{{ route('donation.index') }}" 
                   class="px-3.5 py-2 rounded-lg font-label-md text-label-md transition-all {{ request()->routeIs('donation.*') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                    Donasi
                </a>

                <!-- Membership -->
                <a href="{{ auth()->check() ? route('membership.status') : route('membership.pricing') }}" 
                   class="px-3.5 py-2 rounded-lg font-label-md text-label-md transition-all {{ request()->routeIs('membership.*') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                    Membership
                </a>

                <!-- Kontak -->
                <a href="{{ route('contact.form') }}" 
                   class="px-3.5 py-2 rounded-lg font-label-md text-label-md transition-all {{ request()->routeIs('contact.*') ? 'bg-primary text-on-primary shadow-sm font-semibold' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
                    Kontak
                </a>
            </nav>
        </div>

        <!-- Right Side: Action Cluster (Desktop & Mobile trigger) -->
        <div class="flex items-center gap-3 sm:gap-4">
            @auth
                <!-- Tulis Artikel CTA Button -->
                <a href="{{ route('articles.create') }}" 
                   class="hidden sm:inline-flex items-center gap-1.5 bg-primary text-on-primary font-label-md text-label-md px-4 py-2.5 rounded-xl hover:opacity-90 active:scale-95 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-lg">edit</span>
                    <span>Tulis</span>
                </a>

                <!-- Notifikasi Icon -->
                <a href="{{ route('notifications.index') }}" 
                   class="relative w-10 h-10 rounded-xl flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors"
                   aria-label="Notifikasi">
                    <span class="material-symbols-outlined text-2xl">notifications</span>
                    @if(auth()->user()->unreadNotifications->isNotEmpty())
                        <span class="absolute top-1.5 right-1.5 min-w-[18px] h-[18px] px-1 rounded-full bg-error text-on-error text-[10px] font-bold flex items-center justify-center ring-2 ring-surface">
                            {{ auth()->user()->unreadNotifications->count() > 9 ? '9+' : auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </a>

                <!-- User Profile Dropdown (Desktop) -->
                <div class="relative hidden sm:block" id="user-dropdown-container">
                    <button type="button" 
                            id="user-menu-button"
                            aria-expanded="false" 
                            aria-haspopup="true"
                            class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-surface-container transition-colors border border-outline-variant/30">
                        <div class="w-8 h-8 rounded-lg bg-primary-fixed text-primary font-bold flex items-center justify-center text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="text-sm font-semibold text-primary max-w-[120px] truncate">{{ auth()->user()->name }}</span>
                        <span class="material-symbols-outlined text-lg text-on-surface-variant">expand_more</span>
                    </button>

                    <!-- Dropdown Card -->
                    <div id="user-dropdown-menu" 
                         class="hidden absolute right-0 mt-2 w-64 bg-surface-container-lowest rounded-2xl shadow-nature-xl border border-outline-variant/20 p-2 z-50">
                        <!-- User Info -->
                        <div class="px-3.5 py-3 border-b border-outline-variant/15">
                            <p class="font-semibold text-primary text-sm truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-on-surface-variant truncate">{{ auth()->user()->email }}</p>
                            <span class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ auth()->user()->role === 'admin' ? 'bg-amber-100 text-amber-800' : 'bg-primary-fixed text-primary' }}">
                                {{ ucfirst(auth()->user()->role ?? 'User') }}
                            </span>
                        </div>

                        <!-- Menu Options -->
                        <div class="py-1">
                            <a href="{{ route('articles.my') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                <span class="material-symbols-outlined text-lg">article</span>
                                <span>Artikel Saya</span>
                            </a>
                            <a href="{{ route('bookmarks.index') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                <span class="material-symbols-outlined text-lg">bookmark</span>
                                <span>Bookmark Disimpan</span>
                            </a>
                            <a href="{{ route('membership.status') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                <span class="material-symbols-outlined text-lg">card_membership</span>
                                <span>Status Membership</span>
                            </a>

                            @if(auth()->user()->role === 'admin')
                                <div class="my-1 border-t border-outline-variant/15"></div>
                                <div class="px-3.5 py-1 text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/70">Admin Panel</div>
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                    <span class="material-symbols-outlined text-lg">dashboard</span>
                                    <span>Dashboard Admin</span>
                                </a>
                                <a href="{{ route('admin.payments.index') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                    <span class="material-symbols-outlined text-lg">fact_check</span>
                                    <span>Verifikasi Pembayaran</span>
                                </a>
                                <a href="{{ route('reports.index') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                    <span class="material-symbols-outlined text-lg">flag</span>
                                    <span>Kelola Laporan</span>
                                </a>
                            @endif

                            <div class="my-1 border-t border-outline-variant/15"></div>
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-on-surface-variant hover:text-primary hover:bg-surface-container transition-colors">
                                <span class="material-symbols-outlined text-lg">person</span>
                                <span>Profil Akun</span>
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="pt-1 border-t border-outline-variant/15">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-sm text-error hover:bg-error-container/20 transition-colors text-left font-medium">
                                    <span class="material-symbols-outlined text-lg">logout</span>
                                    <span>Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <!-- Guest Desktop CTA -->
                <a href="{{ route('login') }}" class="hidden sm:inline-flex font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors px-4 py-2">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="bg-primary text-on-primary font-label-md text-label-md px-5 py-2.5 rounded-xl hover:opacity-90 active:scale-95 transition-all shadow-sm">
                    Daftar
                </a>
            @endauth

            <!-- Mobile Hamburger Toggle Button -->
            <button type="button" 
                    id="mobile-nav-toggle"
                    aria-label="Buka Menu Navigasi" 
                    aria-expanded="false" 
                    aria-controls="mobile-nav-drawer"
                    class="lg:hidden w-10 h-10 rounded-xl flex items-center justify-center text-primary hover:bg-surface-container transition-colors border border-outline-variant/30">
                <span class="material-symbols-outlined text-2xl" id="mobile-toggle-icon">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-nav-drawer" 
         class="hidden lg:hidden bg-surface-container-lowest border-b border-outline-variant/20 shadow-nature-xl max-h-[calc(100vh-5rem)] overflow-y-auto px-6 py-6 transition-all duration-300">
        
        @auth
            <!-- Mobile User Profile Card -->
            <div class="flex items-center justify-between pb-4 mb-4 border-b border-outline-variant/15">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary-fixed text-primary font-bold flex items-center justify-center text-base">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-semibold text-primary text-sm leading-tight">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-on-surface-variant leading-tight">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ auth()->user()->role === 'admin' ? 'bg-amber-100 text-amber-800' : 'bg-primary-fixed text-primary' }}">
                    {{ ucfirst(auth()->user()->role ?? 'User') }}
                </span>
            </div>

            <!-- Write Action for Mobile -->
            <div class="mb-4">
                <a href="{{ route('articles.create') }}" class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary py-3 rounded-xl font-semibold shadow-sm">
                    <span class="material-symbols-outlined text-lg">edit</span>
                    <span>Tulis Artikel Baru</span>
                </a>
            </div>
        @endauth

        <!-- Primary Mobile Links -->
        <div class="space-y-1">
            <p class="px-3 py-1 text-xs font-bold uppercase tracking-wider text-on-surface-variant/70">Menu Utama</p>
            <a href="{{ route('welcome') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium {{ request()->routeIs('welcome') ? 'bg-primary text-on-primary' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-lg">home</span>
                <span>Beranda</span>
            </a>
            <a href="{{ route('blogspot') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium {{ request()->routeIs('blogspot') ? 'bg-primary text-on-primary' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-lg">article</span>
                <span>Semua Artikel</span>
            </a>
            <a href="{{ route('marketplace.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium {{ request()->routeIs('marketplace.*') ? 'bg-primary text-on-primary' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-lg">storefront</span>
                <span>Green Marketplace</span>
            </a>
            <a href="{{ route('donation.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium {{ request()->routeIs('donation.*') ? 'bg-primary text-on-primary' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-lg">volunteer_activism</span>
                <span>Donasi Hijau</span>
            </a>
            <a href="{{ auth()->check() ? route('membership.status') : route('membership.pricing') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium {{ request()->routeIs('membership.*') ? 'bg-primary text-on-primary' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-lg">card_membership</span>
                <span>Membership</span>
            </a>
            <a href="{{ route('contact.form') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-medium {{ request()->routeIs('contact.*') ? 'bg-primary text-on-primary' : 'text-on-surface hover:bg-surface-container' }}">
                <span class="material-symbols-outlined text-lg">mail</span>
                <span>Hubungi Kami</span>
            </a>
        </div>

        <!-- Topics Section in Mobile -->
        <div class="mt-4 pt-4 border-t border-outline-variant/15 space-y-1">
            <p class="px-3 py-1 text-xs font-bold uppercase tracking-wider text-on-surface-variant/70">Topik Lingkungan</p>
            <div class="grid grid-cols-2 gap-2 pt-1">
                <a href="{{ route('limbah') }}" class="flex items-center gap-2 p-2.5 rounded-xl border border-outline-variant/20 hover:bg-surface-container text-sm font-medium text-primary">
                    <span class="material-symbols-outlined text-secondary text-base">recycling</span>
                    <span>Limbah</span>
                </a>
                <a href="{{ route('konservasi') }}" class="flex items-center gap-2 p-2.5 rounded-xl border border-outline-variant/20 hover:bg-surface-container text-sm font-medium text-primary">
                    <span class="material-symbols-outlined text-secondary text-base">nature</span>
                    <span>Konservasi</span>
                </a>
                <a href="{{ route('penghijauan') }}" class="flex items-center gap-2 p-2.5 rounded-xl border border-outline-variant/20 hover:bg-surface-container text-sm font-medium text-primary">
                    <span class="material-symbols-outlined text-secondary text-base">park</span>
                    <span>Penghijauan</span>
                </a>
                <a href="{{ route('hutan') }}" class="flex items-center gap-2 p-2.5 rounded-xl border border-outline-variant/20 hover:bg-surface-container text-sm font-medium text-primary">
                    <span class="material-symbols-outlined text-secondary text-base">forest</span>
                    <span>Hutan</span>
                </a>
            </div>
        </div>

        @auth
            <!-- Mobile User Tools -->
            <div class="mt-4 pt-4 border-t border-outline-variant/15 space-y-1">
                <p class="px-3 py-1 text-xs font-bold uppercase tracking-wider text-on-surface-variant/70">Akun Anda</p>
                <a href="{{ route('articles.my') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface hover:bg-surface-container text-sm font-medium">
                    <span class="material-symbols-outlined text-lg">article</span>
                    <span>Artikel Saya</span>
                </a>
                <a href="{{ route('bookmarks.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface hover:bg-surface-container text-sm font-medium">
                    <span class="material-symbols-outlined text-lg">bookmark</span>
                    <span>Bookmark Tersimpan</span>
                </a>
                <a href="{{ route('notifications.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-on-surface hover:bg-surface-container text-sm font-medium">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-lg">notifications</span>
                        <span>Notifikasi</span>
                    </div>
                    @if(auth()->user()->unreadNotifications->isNotEmpty())
                        <span class="px-2 py-0.5 rounded-full bg-error text-on-error text-xs font-bold">
                            {{ auth()->user()->unreadNotifications->count() }} baru
                        </span>
                    @endif
                </a>
                <a href="{{ route('profile.show') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-on-surface hover:bg-surface-container text-sm font-medium">
                    <span class="material-symbols-outlined text-lg">person</span>
                    <span>Profil Pengguna</span>
                </a>

                @if(auth()->user()->role === 'admin')
                    <div class="my-2 border-t border-outline-variant/15"></div>
                    <p class="px-3 py-1 text-xs font-bold uppercase tracking-wider text-amber-700">Administrator</p>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-amber-900 bg-amber-50/60 hover:bg-amber-100 text-sm font-semibold">
                        <span class="material-symbols-outlined text-lg">dashboard</span>
                        <span>Dashboard Admin</span>
                    </a>
                    <a href="{{ route('admin.payments.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-amber-900 bg-amber-50/60 hover:bg-amber-100 text-sm font-semibold">
                        <span class="material-symbols-outlined text-lg">fact_check</span>
                        <span>Verifikasi Pembayaran</span>
                    </a>
                    <a href="{{ route('reports.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-amber-900 bg-amber-50/60 hover:bg-amber-100 text-sm font-semibold">
                        <span class="material-symbols-outlined text-lg">flag</span>
                        <span>Kelola Laporan</span>
                    </a>
                @endif

                <div class="pt-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl text-error bg-error-container/20 font-semibold text-sm">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            <span>Keluar dari Akun</span>
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- Mobile Guest Login/Register -->
            <div class="mt-6 pt-4 border-t border-outline-variant/15 flex flex-col gap-2.5">
                <a href="{{ route('login') }}" class="w-full text-center py-2.5 rounded-xl border border-outline-variant/40 font-semibold text-primary hover:bg-surface-container transition-colors">
                    Masuk ke Akun
                </a>
                <a href="{{ route('register') }}" class="w-full text-center py-2.5 rounded-xl bg-primary text-on-primary font-semibold hover:opacity-90 transition-opacity">
                    Daftar Sekarang
                </a>
            </div>
        @endauth
    </div>
</header>

<!-- Backdrop for mobile drawer and dropdowns -->
<div id="nav-backdrop" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40 transition-opacity duration-300"></div>

<!-- Interactive Navigation Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Elements
        const mobileToggle = document.getElementById('mobile-nav-toggle');
        const mobileDrawer = document.getElementById('mobile-nav-drawer');
        const mobileIcon = document.getElementById('mobile-toggle-icon');
        const backdrop = document.getElementById('nav-backdrop');

        const topicsBtn = document.getElementById('topics-menu-button');
        const topicsMenu = document.getElementById('topics-dropdown-menu');
        const topicsChevron = document.getElementById('topics-chevron');

        const userBtn = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-dropdown-menu');

        // Close all dropdowns
        const closeAllDropdowns = () => {
            if (topicsMenu) {
                topicsMenu.classList.add('hidden');
                if (topicsChevron) topicsChevron.style.transform = 'rotate(0deg)';
                if (topicsBtn) topicsBtn.setAttribute('aria-expanded', 'false');
            }
            if (userMenu) {
                userMenu.classList.add('hidden');
                if (userBtn) userBtn.setAttribute('aria-expanded', 'false');
            }
        };

        // Mobile drawer toggle
        const toggleMobileMenu = () => {
            const isOpen = !mobileDrawer.classList.contains('hidden');
            if (isOpen) {
                mobileDrawer.classList.add('hidden');
                backdrop.classList.add('hidden');
                mobileIcon.textContent = 'menu';
                mobileToggle.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('overflow-hidden');
            } else {
                closeAllDropdowns();
                mobileDrawer.classList.remove('hidden');
                backdrop.classList.remove('hidden');
                mobileIcon.textContent = 'close';
                mobileToggle.setAttribute('aria-expanded', 'true');
                document.body.classList.add('overflow-hidden');
            }
        };

        if (mobileToggle && mobileDrawer) {
            mobileToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMobileMenu();
            });
        }

        // Topics dropdown toggle
        if (topicsBtn && topicsMenu) {
            topicsBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isExpanded = !topicsMenu.classList.contains('hidden');
                closeAllDropdowns();
                if (!isExpanded) {
                    topicsMenu.classList.remove('hidden');
                    topicsChevron.style.transform = 'rotate(180deg)';
                    topicsBtn.setAttribute('aria-expanded', 'true');
                }
            });
        }

        // User dropdown toggle
        if (userBtn && userMenu) {
            userBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isExpanded = !userMenu.classList.contains('hidden');
                closeAllDropdowns();
                if (!isExpanded) {
                    userMenu.classList.remove('hidden');
                    userBtn.setAttribute('aria-expanded', 'true');
                }
            });
        }

        // Backdrop click closes mobile menu
        if (backdrop) {
            backdrop.addEventListener('click', () => {
                if (!mobileDrawer.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
                closeAllDropdowns();
            });
        }

        // Outside click listener
        document.addEventListener('click', (e) => {
            if (topicsMenu && !topicsMenu.contains(e.target) && !topicsBtn.contains(e.target)) {
                topicsMenu.classList.add('hidden');
                if (topicsChevron) topicsChevron.style.transform = 'rotate(0deg)';
                if (topicsBtn) topicsBtn.setAttribute('aria-expanded', 'false');
            }
            if (userMenu && !userMenu.contains(e.target) && !userBtn.contains(e.target)) {
                userMenu.classList.add('hidden');
                if (userBtn) userBtn.setAttribute('aria-expanded', 'false');
            }
        });

        // Escape key to close everything
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeAllDropdowns();
                if (mobileDrawer && !mobileDrawer.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            }
        });
    });
</script>
