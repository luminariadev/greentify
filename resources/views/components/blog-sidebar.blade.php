{{-- Sidebar Komponen untuk Blog Category --}}
<aside class="hidden lg:block w-64 h-[calc(100vh-6rem)] sticky top-24 p-4 border-r border-outline-variant/20">
    <div class="flex flex-col h-full bg-surface-container-low rounded-xl p-4">
        <div class="mb-8">
            <h3 class="font-headline-sm text-headline-sm text-primary">Greentify</h3>
            <p class="text-on-surface-variant font-label-sm text-label-sm">Eco-Community</p>
        </div>
        <nav class="flex flex-col gap-2 flex-grow">
            <a class="flex items-center gap-3 {{ $activeCategory === 'limbah' ? 'bg-secondary-container text-on-secondary-container rounded-lg px-4 py-2 translate-x-1 duration-200 font-label-md text-label-md' : 'text-on-surface-variant px-4 py-2 hover:bg-surface-container-high transition-all font-label-md text-label-md' }}" href="{{ route('limbah') }}">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' {{ $activeCategory === 'limbah' ? '1' : '0' }};">recycling</span>
                Limbah
            </a>
            <a class="flex items-center gap-3 {{ $activeCategory === 'konservasi' ? 'bg-secondary-container text-on-secondary-container rounded-lg px-4 py-2 translate-x-1 duration-200 font-label-md text-label-md' : 'text-on-surface-variant px-4 py-2 hover:bg-surface-container-high transition-all font-label-md text-label-md' }}" href="{{ route('konservasi') }}">
                <span class="material-symbols-outlined">nature</span>
                Konservasi
            </a>
            <a class="flex items-center gap-3 {{ $activeCategory === 'penghijauan' ? 'bg-secondary-container text-on-secondary-container rounded-lg px-4 py-2 translate-x-1 duration-200 font-label-md text-label-md' : 'text-on-surface-variant px-4 py-2 hover:bg-surface-container-high transition-all font-label-md text-label-md' }}" href="{{ route('penghijauan') }}">
                <span class="material-symbols-outlined">park</span>
                Penghijauan
            </a>
            <a class="flex items-center gap-3 {{ $activeCategory === 'hutan' ? 'bg-secondary-container text-on-secondary-container rounded-lg px-4 py-2 translate-x-1 duration-200 font-label-md text-label-md' : 'text-on-surface-variant px-4 py-2 hover:bg-surface-container-high transition-all font-label-md text-label-md' }}" href="{{ route('hutan') }}">
                <span class="material-symbols-outlined">forest</span>
                Hutan
            </a>
            <a class="flex items-center gap-3 text-on-surface-variant px-4 py-2 hover:bg-surface-container-high transition-all font-label-md text-label-md" href="#">
                <span class="material-symbols-outlined">group</span>
                Community
            </a>
        </nav>
        <button class="mt-auto bg-primary text-on-primary py-3 px-4 rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity">
            Join the Community
        </button>
    </div>
</aside>