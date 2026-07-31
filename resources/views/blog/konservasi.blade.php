@extends('layouts.app')

@section('title', 'Konservasi (Conservation) - Greentify')

@section('content')
<div class="flex max-w-container-max-width mx-auto pt-24 min-h-screen">
    @include('components.blog-sidebar', ['activeCategory' => 'konservasi'])

    <main class="flex-1 w-full lg:ml-64 px-margin-mobile md:px-gutter lg:px-margin-desktop py-12 relative z-10">
        <!-- Category Header -->
        <section class="mb-16">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full mb-6">
                    <span class="material-symbols-outlined text-[18px]">nature</span>
                    <span class="font-label-sm uppercase tracking-widest">Featured Category</span>
                </div>
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6">Konservasi (Conservation)</h1>
                <p class="font-body-lg text-on-surface-variant leading-relaxed">Conserving water and natural resources is fundamental to sustaining life. Explore our guides on water conservation, habitat protection, and community-led initiatives preserving Indonesia's unique ecosystems.</p>
            </div>
        </section>

        <!-- Featured Article (Editorial Hero) -->
        <section class="mb-16">
            <div class="grid lg:grid-cols-2 bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="relative min-h-[320px]">
                    <img class="absolute inset-0 w-full h-full object-cover"
                         alt="A stunning wildlife photograph of a rare leopard resting on a tree branch in a sun-drenched savannah."
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnpDUPxiC6le6XI3b41Jw2Tqm_gMuljLorhedC994xP9uCOfNc_jlAQ-mZLChef-tySNOIGlgh23Huc0acNfjbNPsXvxYe4raBo5HlkEWLoPw0vZ4fsJYIjFujfc6JhVwlt0GJfR56EntKittHyj27KjHCp-XvkwgQ755pxmauXjYiQLm8ybuf5CN5oECdCtaOSIewd6D5HYIzTx3fcJVXuqKr0o2LNN6SVcESs7KcixcX3cKoAqcaZQ"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <span class="text-secondary font-label-md mb-4">Deep Dive • 10 min read</span>
                    <h2 class="font-headline-md text-primary mb-4">Wildlife Habitat Protection: Securing the Corridors of Life</h2>
                    <p class="text-on-surface-variant mb-8 line-clamp-3">Securing the corridors of life for endangered species across the archipelago through community-based conservation areas and sustainable land-use planning.</p>
                    <div class="flex items-center gap-4">
                        <img class="w-12 h-12 rounded-full object-cover border-2 border-primary-fixed"
                             alt="Portrait of conservation leader"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGq2PhP_UGXrf8T_MYQga057exBqEJ63RYFEVZDL37ZI5rwKrd_o4EPZXPw1hoWqVX7K5Pl3FvYJKlWzqGbleup5e3qQ6-QzxY82kQhErQdUM9k1eJcl5POd_qp3sG8VeAi5zL9vJu657P-hpIliB2mgZqvgHMxZwUo3QwphvSwi-EbZOaR-lJ5Og3-61m4RoCSEnmzyrwhGebkwS22rXmUvHXZeUbgLysEjq2ggTMg3TaYmzOmDccOw"/>
                        <div>
                            <p class="font-label-md text-primary">Dr. Sarah K.</p>
                            <p class="font-label-sm text-on-surface-variant">Lead Conservationist</p>
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
                         alt="Clear mountain spring water flowing between stones in a pristine forest."
                         src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?w=800"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Water</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Konservasi Air di Lingkungan Kering</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Strategi pemanenan air hujan dan pengelolaan sumber air untuk daerah dengan curah hujan rendah.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">June 20, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 (Quote) -->
            <div class="bg-primary text-on-primary rounded-xl p-8 flex flex-col justify-between border border-primary-container">
                <div>
                    <span class="material-symbols-outlined text-secondary-fixed mb-6 text-3xl">water_drop</span>
                    <h3 class="font-headline-sm text-xl mb-6">"When we conserve water, we conserve life. Every drop preserved today is a future secured."</h3>
                    <p class="opacity-80 text-sm italic">— Community Water Keeper</p>
                </div>
                <div class="pt-8 border-t border-white/10 mt-8">
                    <p class="font-label-md">Water Conservation</p>
                    <p class="text-xs opacity-60">Local Initiatives</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Mangrove restoration project with young mangrove seedlings planted along a coastline."
                         src="https://images.unsplash.com/photo-1472148083604-64f1084980b9?w=800"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Ecosystem</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Restorasi Mangrove: Garis Pertahanan Pantai Kita</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Bagaimana komunitas pesisir memanfaatkan mangrove untuk melindungi garis pantai dan keanekaragaman hayati laut.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">May 08, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Coral reef ecosystem teeming with colorful fish in clear tropical water."
                         src="https://images.unsplash.com/photo-1546026423-cc4642628d2b?w=800"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Marine</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Terumbu Karang: Hutan Hujan di Bawah Laut</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Upaya transplantasi karang dan ekowisata bahari yang berkelanjutan di Raja Ampat dan Bunaken.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">April 22, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 5 (Tool) -->
            <div class="bg-secondary-container rounded-xl p-8 flex flex-col justify-between nature-shadow border border-secondary/10">
                <div>
                    <span class="material-symbols-outlined text-secondary text-4xl mb-6">monitoring</span>
                    <h3 class="font-headline-sm text-primary mb-2">Water Quality Tracker</h3>
                    <p class="text-on-secondary-container/80 text-sm">Pemantauan kualitas air berbasis komunitas dengan data terbuka dari 12 wilayah di Indonesia.</p>
                </div>
                <button class="mt-8 bg-primary text-on-primary py-3 rounded-lg font-label-md flex justify-center items-center gap-2 hover:brightness-110 transition-all">
                    Explore the Data
                </button>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="bg-surface-container rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 border border-outline-variant/30">
            <div class="flex-1">
                <h2 class="font-headline-md text-primary mb-4">The Conservation Brief</h2>
                <p class="text-on-surface-variant mb-8">Join 6,000+ conservationists receiving weekly updates on habitat protection, water security, and local action opportunities.</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input class="flex-1 bg-surface-container-lowest border-outline-variant/30 rounded-lg px-6 py-3 focus:ring-secondary focus:border-secondary transition-all" placeholder="Your email address" type="email"/>
                    <button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-label-md hover:bg-primary/90 transition-all">Subscribe</button>
                </div>
                <p class="text-[10px] text-on-surface-variant mt-4 opacity-70">By subscribing, you agree to our Privacy Policy. No spam, just conservation news.</p>
            </div>
            <div class="hidden md:block w-1/3">
                <div class="relative w-full aspect-square bg-primary-fixed rounded-full overflow-hidden flex items-center justify-center p-8">
                    <span class="material-symbols-outlined text-primary text-7xl absolute">nature</span>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection