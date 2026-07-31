@extends('layouts.app')

@section('title', 'Limbah (Waste Management) - Greentify')

@section('content')
<div class="flex max-w-container-max-width mx-auto pt-24 min-h-screen">
    <!-- Sidebar -->
    @include('components.blog-sidebar', ['activeCategory' => 'limbah'])

    <!-- Main Content Canvas -->
    <main class="flex-1 w-full lg:ml-64 px-margin-mobile md:px-gutter lg:px-margin-desktop py-12 relative z-10">
        <!-- Category Header -->
        <section class="mb-16">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full mb-6">
                    <span class="material-symbols-outlined text-[18px]">recycling</span>
                    <span class="font-label-sm uppercase tracking-widest">Eksplorasi</span>
                </div>
                <h1 class="font-headline-md text-headline-md text-primary mb-6">Limbah (Waste Management)</h1>
                <p class="font-body-lg text-on-surface-variant leading-relaxed">
                    Strategies for reducing plastic waste and sustainable living. Pelajari cara mengolah limbah rumah tangga menjadi kompos dan dukung gerakan nol sampah global.
                </p>
            </div>
        </section>

        <!-- Featured Article (Editorial Hero) -->
        <section class="mb-16">
            <div class="grid lg:grid-cols-2 bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="relative min-h-[320px]">
                    <img class="absolute inset-0 w-full h-full object-cover"
                         alt="A serene landscape showing the impact of effective waste management with a clean, lush forest edge meeting a small, crystal-clear stream."
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxg_V3xIFXSMHsbsB5BuIPFC8en1f53o56YWuj4ZnGuhh_ReMFxso0UfWzy9pu2qTECjm6lqTujWvRdy6MT4U7dWHyJuRh_FkHloQCQOWIgfRdzFw1BSqPnTKzY7FZtm_3bEyVMl--e3Gbv6t4csuHxqaKq9UFgjNa1LbsBwkojTSNz_1obVIyksE3Ss279h3CXO_n4HIaRZ5ypB1a8PrSmViqAEozOnLvEDUuVQzPo1zGdLHyPmDp9A"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <span class="text-secondary font-label-md mb-4">Sorotan Utama</span>
                    <h2 class="font-headline-md text-primary mb-4">Panduan 2024: Zero-Waste di Apartemen Sempit</h2>
                    <p class="text-on-surface-variant mb-8 line-clamp-3">Bagaimana mengubah ruang kecil menjadi pusat pengolahan limbah mandiri yang estetik dan higienis.</p>
                    <div class="flex items-center gap-4">
                        <img class="w-12 h-12 rounded-full object-cover border-2 border-primary-fixed"
                             alt="Author portrait"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuCsWjV-Scrs4py2Wu6thqiTiWFGscKsas5kfhUgckc2k_aEYJnPBcUfBCaQ6OtONQkvWMFBZUXYPlgWOtz2hXV87xaYCF_-jg9VT8okWOH160U_V6tSrfcw96S7QqM4FbyXy__KtrQFsqleXhhRNXiqfjjEm8GCQrwlPWmzgFeNero8CkVA0H04LRO_pTn3oJ-tk30qhLJciPsdATOik6cRt-9RKXKnswj7dSfKh7gN64AMTwFUx-wADg"/>
                        <div>
                            <p class="font-label-md text-primary">Dr. Sarah K.</p>
                            <p class="font-label-sm text-on-surface-variant">Lead Conservationist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Grid (Bento Style) -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Article 1 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Professional composition showing organic kitchen scraps arranged in a ceramic compost bin with natural wood accent"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHwfXruhtiEHvB-Ug-QZDcCi2yajOG0s6i61mJNEpxTTORxBJlE_H3paog6TeAXAhYo8phqKgnwJiMx8vjYGfdfGDUi9lzutk4pdel4pyihvY1kprjrnwr_DfPP5PTe7aT3bEYVMl--e3Gbv6t4csuHxqaKq9UFgjNa1LbsBwkojTSNz_1obVIyksE3Ss279h3CXO_n4HIaRZ5ypB1a8PrSmViqAEozOnLvEDUuVQzPo1zGdLHyPmDp9A"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Kompos</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Seni Mengompos: Dari Dapur ke Kebun</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md mt-2 line-clamp-3 mb-6">
                        Langkah-langkah praktis mengolah sisa makanan menjadi nutrisi bagi tanah tanpa bau dan hama.
                    </p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">May 14, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Minimalist artistic arrangement of recycled glass bottles and upcycled plastic containers on warm clay surface"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOP5tkKmPXrBOUf9gDKYLdV1PODMXD3vrUIgzMU84CRPA9YBYjcnBD64F_L1qk2fd7VXA3ggYqBY92Lra0Knzq6Zzh0VPVmyra2zte6MDhMABwn0JTpzW4PcHL1Wlji9RONxMuwIxL9wxh66lZS7BhIRaASZnfori5Jf_w-dTeIqdd8Uku54-IXyPzw0I6CqhXZHbnzC6y9R1FfoQqH7gHMn_zkLfQTWoqrQxGSKRvUDxDGFEoukHmzA"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Upcycling</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Upcycling: Mengubah Sampah Menjadi Hiasan</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md mt-2 line-clamp-3 mb-6">
                        Ide kreatif mendaur ulang kemasan plastik sekali pakai menjadi barang fungsional yang memiliki nilai estetika tinggi di rumah modern.
                    </p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">March 28, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Environmental data visualization showing waste reduction metrics on digital display"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeA0v5XY5ZqYcRcU_FIIs0a8tJpHtQ4wKaMEH5qkwEL6k2nZ3qKFQ0v5xXw8z2z3J9z"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Research</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Studi Komunitas: Dampak Pengomposan di Urban Surabaya</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md mt-2 line-clamp-3 mb-6">
                        Penelitian kolaboratif tiga bulan melibatkan 200 rumah tangga di Surabaya Barat menunjukkan hasil signifikan.
                    </p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">April 10, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Article 4 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Modern compost bin with smart sensors showing fill levels in green living room"
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0seJTxJK37MvE_nFy5Tt5l9sts1_X8v9RihIRSz9_O4IHQx2DQ0QUrtXQmV0U04Qmutb13rarhTZCMmFcao6HjwmIHWUEtDpQzQ6WoVJ1a5gLhfnpUwgEJ_Bn9W_azDK_GvQGGBikauD0Y2yShOjmeTk5RhAuB1Mr-oFJQwUlRCABLyxa9I2tjKKgdv-JSKApUrueKT3ABG-m1oKePFss0EtawudPrkZgCu9kNrUSMa57vyKgiFcPJA"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Technology</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Smart Composter 3.0: Mengurangi Bau dan Meningkatkan Efisiensi</h3>
                    <p class="text-on-surface-variant font-body-md text-body-md mt-2 line-clamp-3 mb-6">
                        Bot kompos pintar terbaru dengan sensor kelembapan, suhu dan RFID tracking untuk hasil optimal.
                    </p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">February 15, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 5 (Text Heavy / Opinion) -->
            <div class="bg-primary text-on-primary rounded-xl p-8 flex flex-col justify-between nature-shadow border border-primary-container">
                <div>
                    <span class="material-symbols-outlined text-secondary-fixed mb-6 text-3xl">format_quote</span>
                    <h3 class="font-headline-sm text-xl mb-6">"Zero waste isn't about being perfect — it's about progress. Every small step counts in the journey toward a more sustainable future."</h3>
                    <p class="opacity-80 text-sm italic">— Community Member</p>
                </div>
                <div class="pt-8 border-t border-white/10 mt-8">
                    <p class="font-label-md">Bagian dari gerakan kami</p>
                    <p class="text-xs opacity-60">Dipercayai oleh 2,847 rumah tangga</p>
                </div>
            </div>
        </section>

        <!-- Newsletter / Community Section -->
        <section class="bg-surface-container rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 border border-outline-variant/30">
            <div class="flex-1">
                <h2 class="font-headline-md text-primary mb-4">The Waste Dispatch</h2>
                <p class="text-on-surface-variant mb-8">Join 8,000+ eco warriors receiving weekly strategies for waste reduction, composting tips, and sustainable living ideas.</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input class="flex-1 bg-surface-container-lowest border-outline-variant/30 rounded-lg px-6 py-3 focus:ring-secondary focus:border-secondary transition-all" placeholder="Your email address" type="email"/>
                    <button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-label-md hover:bg-primary/90 transition-all">Subscribe</button>
                </div>
                <p class="text-[10px] text-on-surface-variant mt-4 opacity-70">By subscribing, you agree to our Privacy Policy. No spam, just waste wisdom.</p>
            </div>
            <div class="hidden md:block w-1/3">
                <div class="relative w-full aspect-square bg-primary-fixed rounded-full overflow-hidden flex items-center justify-center p-8">
                    <span class="material-symbols-outlined text-primary text-7xl absolute">recycling</span>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection