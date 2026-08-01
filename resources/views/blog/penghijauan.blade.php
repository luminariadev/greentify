@extends('layouts.app')

@section('title', 'Penghijauan (Urban Greening) - Greentify')

@section('content')
<div class="max-w-container-max-width mx-auto px-gutter pt-24">
    <!-- Main Content (full width, no sidebar) -->
    <main class="py-12 relative z-10">
        <!-- Category Header -->
        <section class="mb-16">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full mb-6">
                    <span class="material-symbols-outlined text-[18px]">park</span>
                    <span class="font-label-sm uppercase tracking-widest">Featured Category</span>
                </div>
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6">Penghijauan (Urban Greening)</h1>
                <p class="font-body-lg text-on-surface-variant leading-relaxed">Urban greening and reforestation are key to combating climate change. Explore our guides on tree planting, green roofs, vertical gardens, and how cities become oxygen-rich sanctuaries.</p>
            </div>
        </section>

        <!-- Featured Article (Editorial Hero) -->
        <section class="mb-16">
            <div class="grid lg:grid-cols-2 bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="relative min-h-[320px]">
                    <img class="absolute inset-0 w-full h-full object-cover"
                         alt="An aerial, top-down shot of a thriving urban garden on a skyscraper rooftop."
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHfW9PvSb3y2bxxt3KUlqi3nnUQuwYFsTCdPETs39f4XuQQ4MmSIdPjwVCHXSSE6yiJjBF2LEzeaNHlkRiJN_AQY8Q215UMMXGXA3AbnT9Er0-2qf0rj5M8pvYBnipxMxjWuDHJZpxc1-2Fcv5ppjdPKqe7-WsQQxKxj8GrProQxvbr_ib4nIYgcvTuJ64vJ4fEvR2Vmt4PoU5mW6_EqmnPBsUkEsPsw1uVBr09df4fGYVSA7qneeOxg"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <span class="text-secondary font-label-md mb-4">Deep Dive • 8 min read</span>
                    <h2 class="font-headline-md text-primary mb-4">The Urban Greening Initiative: Concrete to Canopy</h2>
                    <p class="text-on-surface-variant mb-8 line-clamp-3">Transforming concrete jungles into oxygen-rich sanctuaries through vertical farming, community parks, and green corridors.</p>
                    <div class="flex items-center gap-4">
                        <img class="w-12 h-12 rounded-full object-cover border-2 border-primary-fixed"
                             alt="Portrait of urban planner"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjAc_2aTBMPVdIzjDmGyl83cUDgVyJmdMdLoUJTZ8GjoAHMNU3TbZXRtBLMKspGteZsivKdfHDXvrfVWMiWMUoWY4-CLJ6vYSNUsXJ4dUeSXTQbGxH5xtjbiYyb5H6DCxZS28dDW0j1cxGhgGYr-vof4UdziDTtBDF-zWtQxStf8o737qsdvTGYfpOxoRfhv-bONh3N1qPO-vqK2-kUdjVkgexYad9RlvY2x_hlKc5q4TL8abchkI0rQ"/>
                        <div>
                            <p class="font-label-md text-primary">Andi Pratama</p>
                            <p class="font-label-sm text-on-surface-variant">Urban Greening Specialist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Grid -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Card 1 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Green roof garden with native plants on a modern city building."
                         src="https://images.unsplash.com/photo-1523986371872-9d3ba2e2a389?w=800"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Green Roof</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Manfaat Penghijauan Kota dalam Mengatasi Perubahan Iklim</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Bagaimana taman atap dan penghijauan vertikal menurunkan suhu kota hingga beberapa derajat dan menyerap emisi karbon.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">June 25, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 (Quote) -->
            <div class="bg-primary text-on-primary rounded-xl p-8 flex flex-col justify-between border border-primary-container">
                <div>
                    <span class="material-symbols-outlined text-secondary-fixed mb-6 text-3xl">local_florist</span>
                    <h3 class="font-headline-sm text-xl mb-6">"Every tree planted in a city is a life support system for a thousand others."</h3>
                    <p class="opacity-80 text-sm italic">— Urban Forester</p>
                </div>
                <div class="pt-8 border-t border-white/10 mt-8">
                    <p class="font-label-md">Green Movement</p>
                    <p class="text-xs opacity-60">Community Action</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Community members planting trees together in a city park."
                         src="https://images.unsplash.com/photo-1605810230434-7631ac76ec81?w=800"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Community</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Gerakan 1.2 Juta Pohon: Kisah dari Depok</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Kolaborasi warga, sekolah, dan pemerintah kota dalam program penanaman pohon terbesar di wilayah metropolitan.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">April 05, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Vertical garden on a modern building facade with cascading plants."
                         src="https://images.unsplash.com/photo-1585409677983-0f6c41ca9c3b?w=800"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Vertical</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Vertical Garden: Solusi Ruang Terbatas</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Memanfaatkan dinding bangunan untuk ruang hijau di tengah padatnya permukiman kota besar.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">March 12, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 5 (Tool) -->
            <div class="bg-secondary-container rounded-xl p-8 flex flex-col justify-between nature-shadow border border-secondary/10">
                <div>
                    <span class="material-symbols-outlined text-secondary text-4xl mb-6">eco</span>
                    <h3 class="font-headline-sm text-primary mb-2">Find a Planting Event</h3>
                    <p class="text-on-secondary-container/80 text-sm">Jadwal aksi tanam pohon dan kegiatan penghijauan terdekat di kota Anda.</p>
                </div>
                <button class="mt-8 bg-primary text-on-primary py-3 rounded-lg font-label-md flex justify-center items-center gap-2 hover:brightness-110 transition-all">
                    Explore Events
                </button>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="bg-surface-container rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 border border-outline-variant/30">
            <div class="flex-1">
                <h2 class="font-headline-md text-primary mb-4">The Green Canopy Brief</h2>
                <p class="text-on-surface-variant mb-8">Join 10,000+ green enthusiasts receiving weekly tips on urban gardening, planting events, and city greening initiatives.</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input class="flex-1 bg-surface-container-lowest border-outline-variant/30 rounded-lg px-6 py-3 focus:ring-secondary focus:border-secondary transition-all" placeholder="Your email address" type="email"/>
                    <button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-label-md hover:bg-primary/90 transition-all">Subscribe</button>
                </div>
                <p class="text-[10px] text-on-surface-variant mt-4 opacity-70">By subscribing, you agree to our Privacy Policy. No spam, just green living tips.</p>
            </div>
            <div class="hidden md:block w-1/3">
                <div class="relative w-full aspect-square bg-primary-fixed rounded-full overflow-hidden flex items-center justify-center p-8">
                    <span class="material-symbols-outlined text-primary text-7xl absolute">park</span>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection