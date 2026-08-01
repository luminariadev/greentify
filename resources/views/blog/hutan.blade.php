@extends('layouts.app')

@section('title', 'Hutan (Forestry) - Greentify')

@section('content')
<div class="max-w-container-max-width mx-auto px-gutter pt-24">
    <!-- Main Content (full width, no sidebar) -->
    <main class="py-12 relative z-10">
        <!-- Category Header -->
        <section class="mb-16">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-secondary/10 text-secondary rounded-full mb-6">
                    <span class="material-symbols-outlined text-[18px]">forest</span>
                    <span class="font-label-sm uppercase tracking-widest">Featured Category</span>
                </div>
                <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg text-primary mb-6">Hutan (Forestry)</h1>
                <p class="font-body-lg text-on-surface-variant leading-relaxed">Protecting our rainforests and biodiversity is more than a duty—it's a necessity for planetary survival. Explore our deep dives into sustainable logging, reforestation efforts, and the indigenous wisdom guarding the world's lungs.</p>
            </div>
        </section>

        <!-- Featured Article (Editorial Hero) -->
        <section class="mb-16">
            <div class="grid lg:grid-cols-2 bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="relative min-h-[320px]">
                    <img class="absolute inset-0 w-full h-full object-cover"
                         alt="A lush, dense tropical rainforest scene captured during the golden hour. Sunbeams pierce through high canopy layers of ancient mahogany and teak trees."
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMHXBqXfTajiZMZN8SV-HdV62FW_qVeOxmtAQiyssl_Md_KJJPwgZiydPqDSmsmw5avC0zF8SkjXW-aMifEa2D1t-3eNnWlTlUMQk6MF8DP-1vSRrR5q_c21utM1QaeU3w58hjnDNVJoeJIcqx9gfRKCTO_tKzafc8Qoo6l1tav5N-1ERp8r-q3pt6NshF63V9iut5sd-IGP9vv1OrCZZwJgk5aLh_USwfK_2700nsOyINDhI-Gjn8AA"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="p-8 md:p-12 flex flex-col justify-center">
                    <span class="text-secondary font-label-md mb-4">Deep Dive • 12 min read</span>
                    <h2 class="font-headline-md text-primary mb-4">The Silent Sentinels: How Ancient Peatlands Store More Carbon Than We Thought</h2>
                    <p class="text-on-surface-variant mb-8 line-clamp-3">Recent satellite imaging reveals that Indonesia's hidden peatlands hold nearly twice the carbon capacity previously estimated, highlighting the urgent need for strict protection.</p>
                    <div class="flex items-center gap-4">
                        <img class="w-12 h-12 rounded-full object-cover border-2 border-primary-fixed"
                             alt="Professional studio portrait of an environmental scientist"
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuAo3vMNSLoMKtbAdcO0EivP0MiZZYPdwQKsy_GYffMcS4C9nyiJDtvsvv6KguosP4dNnPpgoWVSIhCsYzZmVldBw3kELsBE8BtVgoW7ttVKFVzSQw4Ulrp7hk_eCmndjH-N0jPhsPCDKzdCdz0si6MuxK6QuxQ7tEUYgt5IglgE-LROez3WIJOMQbnSCfCN5_thD9z4fyFeW8Mz7hPQspdYUSrtPlAbwTsycjrCykjzGXukAQAvFUZVnQ"/>
                        <div>
                            <p class="font-label-md text-primary">Dr. Elara Vance</p>
                            <p class="font-label-sm text-on-surface-variant">Lead Conservationist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Grid (Bento Style) -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Card 1 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="A macro photograph of a young oak sapling emerging from a bed of moss and fallen brown leaves."
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxg_V3xIFXSMHsbsB5BuIPFC8en1f53o56YWuj4ZnGuhh_ReMFxso0UfWzy9pu2qTECjm6lqTujWvRdy6MT4U7dWHyJuRh_FkHloQCQOWIgfRdzFw1BSqPnTKzY7FZtm_3bEyVMl--e3Gbv6t4csuHxqaKq9UFgjNa1LbsBwkojTSNz_1obVIyksE3Ss279h3CXO_n4HIaRZ5ypB1a8PrSmViqAEozOnLvEDUuVQzPo1zGdLHyPmDp9A"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Research</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Reforestation vs. Rewilding: Which is Better?</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Unpacking the science behind active tree planting and natural regeneration in damaged ecosystems.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">May 14, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 (Text Heavy / Opinion) -->
            <div class="bg-primary text-on-primary rounded-xl p-8 flex flex-col justify-between border border-primary-container">
                <div>
                    <span class="material-symbols-outlined text-secondary-fixed mb-6 text-3xl">format_quote</span>
                    <h3 class="font-headline-sm text-xl mb-6">"If we lose the Amazon, we lose the ability to regulate our planet's temperature. It's that simple."</h3>
                    <p class="opacity-80 text-sm italic">— Chief Almir Narayamoga Surui</p>
                </div>
                <div class="pt-8 border-t border-white/10 mt-8">
                    <p class="font-label-md">Indigenous Guardianship</p>
                    <p class="text-xs opacity-60">Voices from the Frontlines</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col hover:scale-[1.02] transition-transform duration-300">
                <div class="h-48 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         alt="Aerial drone photography of a sustainable pine forest plantation with rhythmic tree patterns."
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmoE82DRWeJrxyRbdLhTXEuz1E7imog_gcR_3zj1Sg3Efd3AKr65O1_qSkrlweLRJpnQg7RPLUOuSwFL4FXIyzhnEC8izBFUDEgSgejMibBZ3N0PAXV4L3tt6qEpvOW1QhlxFZG4Jc2pLux0r5mu5VaAEq_UDigOgY6Q_UUEFB7tuRPMw-M9AMl9lhGRjMcwEB75YYPdXAvIy_2pD8We8coxSnkTMwTsmRfpXGrfHqLu-5R9uEYkYLdA"/>
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="flex gap-2 mb-3">
                        <span class="bg-surface-container text-primary px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">Economy</span>
                    </div>
                    <h3 class="font-headline-sm text-lg text-primary mb-3">Sustainable Logging: A Necessary Paradox?</h3>
                    <p class="text-on-surface-variant text-sm line-clamp-3 mb-6">Exploring how controlled timber harvests can actually provide the funding needed for forest protection.</p>
                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-[12px] text-on-surface-variant">April 29, 2024</span>
                        <a class="text-secondary font-label-md flex items-center gap-1 group-hover:gap-2 transition-all" href="#">Read <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 (Feature Wide) -->
            <div class="group bg-white rounded-xl nature-shadow overflow-hidden border border-outline-variant/10 flex flex-col md:col-span-2 hover:scale-[1.01] transition-transform duration-300">
                <div class="grid md:grid-cols-5 h-full">
                    <div class="md:col-span-2 relative">
                        <img class="absolute inset-0 w-full h-full object-cover"
                             alt="High-resolution photography of an orangutan sitting thoughtfully on a thick vine in a Bornean rainforest."
                             src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0seJTxJK37MvE_nFy5Tt5l9sts1_X8v9RihIRSz9_O4IHQx2DQ0QUrtXQmV0U04Qmutb13rarhTZCMmFcao6HjwmIHWUEtDpQzQ6WoVJ1a5gLhfnpUwgEJ_Bn9W_azDK_GvQGGBikauD0Y2yShOjmeTk5RhAuB1Mr-oFJQwUlRCABLyxa9I2tjKKgdv-JSKApUrueKT3ABG-m1oKePFss0EtawudPrkZgCu9kNrUSMa57vyKgiFcPJA"/>
                    </div>
                    <div class="md:col-span-3 p-8 flex flex-col justify-center">
                        <span class="text-secondary font-label-md mb-2">Wildlife Conservation</span>
                        <h3 class="font-headline-sm text-2xl text-primary mb-4">Habitat Corridors: Bridging the Gap for Endangered Species</h3>
                        <p class="text-on-surface-variant text-sm mb-6">Small strips of forest connecting larger fragments can be the difference between extinction and survival for isolated wildlife populations.</p>
                        <div class="flex items-center gap-6">
                            <button class="flex items-center gap-2 text-primary font-label-md border border-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition-all">
                                <span class="material-symbols-outlined text-lg">play_circle</span> Watch Documentary
                            </button>
                            <span class="text-xs text-on-surface-variant">22 minutes • 4K</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 (Tool/Resource) -->
            <div class="bg-secondary-container rounded-xl p-8 flex flex-col justify-between nature-shadow border border-secondary/10">
                <div>
                    <span class="material-symbols-outlined text-secondary text-4xl mb-6">park</span>
                    <h3 class="font-headline-sm text-primary mb-2">Interactive Map: Loss Tracking</h3>
                    <p class="text-on-secondary-container/80 text-sm">Real-time alerts and satellite data on deforestation events across South-East Asia.</p>
                </div>
                <button class="mt-8 bg-primary text-on-primary py-3 rounded-lg font-label-md flex justify-center items-center gap-2 hover:brightness-110 transition-all">
                    Launch Global Forest Watch
                </button>
            </div>
        </section>

        <!-- Newsletter / Community Section -->
        <section class="bg-surface-container rounded-2xl p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 border border-outline-variant/30">
            <div class="flex-1">
                <h2 class="font-headline-md text-primary mb-4">The Canopy Dispatch</h2>
                <p class="text-on-surface-variant mb-8">Join 15,000+ forest advocates receiving weekly briefings on conservation science, policy updates, and ways to get involved.</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <input class="flex-1 bg-surface-container-lowest border-outline-variant/30 rounded-lg px-6 py-3 focus:ring-secondary focus:border-secondary transition-all" placeholder="Your email address" type="email"/>
                    <button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-label-md hover:bg-primary/90 transition-all">Subscribe</button>
                </div>
                <p class="text-[10px] text-on-surface-variant mt-4 opacity-70">By subscribing, you agree to our Privacy Policy. No spam, just soil and leaves.</p>
            </div>
            <div class="hidden md:block w-1/3">
                <div class="relative w-full aspect-square bg-primary-fixed rounded-full overflow-hidden flex items-center justify-center p-8">
                    <span class="material-symbols-outlined text-primary text-7xl absolute">eco</span>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection