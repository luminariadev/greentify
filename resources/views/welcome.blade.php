@extends('layouts.app')

@section('title', 'The Environment is Where We All Meet')

@section('content')
<!-- Hero Section -->
<section class="relative h-[870px] min-h-[600px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-primary/20 mix-blend-multiply z-10"></div>
        <img class="w-full h-full object-cover"
             alt="A breathtaking, cinematic panoramic view of a lush ancient forest at sunrise. Soft, golden morning light filters through thick canopies, illuminating misty moss-covered ground and towering cedar trees."
             src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXEKlV3B_H51XZJ5LHxt4NLFV3IIRyiLB-CNGYZt0ekjhrlPWxYviaA0ZLSdIkxv9o-huMmPtTXT6v-2KR6a9nfG8jQ8Y9hAwYr1i88DxncB_VuA3jpAUdCUedps4YVa50wMfM6xGs4EYU3ep-1IAPqQqIksLpSa22aJDFHB34Yy4VdWkSvGCjS3itESYUMp-v-6Skoz7ggAqR2ByotApvNnM6u-kM9YSpJ1KaFEvEKjZhqwst2ZdCog"/>
    </div>
    <div class="relative z-20 w-full px-gutter max-w-container-max-width mx-auto">
        <div class="max-w-2xl text-on-primary">
            <span class="font-label-md text-label-md uppercase tracking-widest mb-6 block opacity-90">Eco-Conscious Living</span>
            <h1 class="font-display-lg text-display-lg-mobile md:text-display-lg mb-8 leading-tight">The environment is where we all meet.</h1>
            <p class="font-body-lg text-body-lg mb-10 opacity-90 max-w-lg">Dedicated to restoring our planet through collective action, deep conservation insights, and community-driven reforestation projects.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('register') }}" class="bg-on-primary text-primary font-label-md text-label-md px-8 py-4 rounded-lg hover:bg-secondary-container hover:text-on-secondary-container transition-all active:scale-95 flex items-center justify-center gap-2">
                    Join our Community
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
                <a href="{{ route('limbah') }}" class="border border-on-primary text-on-primary font-label-md text-label-md px-8 py-4 rounded-lg hover:bg-on-primary/10 transition-all active:scale-95 flex items-center justify-center">
                    Explore Projects
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Mission/About Section -->
<section class="py-24 px-gutter max-w-container-max-width mx-auto">
    <div class="grid md:grid-cols-2 gap-16 items-center">
        <div class="relative">
            <div class="aspect-[4/5] rounded-xl overflow-hidden nature-shadow border border-outline-variant/20">
                <img class="w-full h-full object-cover"
                     alt="A high-end editorial close-up of a young green seedling being carefully planted into rich, dark soil by human hands."
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAf8WeCoiCOY_ty7uiVVtYUTQpjPUAaVxeY_LWJ2Hp6kSqhq2TE9AAOFyaKFDRTAUCg_6Es2CowIx3E-IIMvcXJoWGOBx9-KfkaVvqGPVf6p9DI3FKVQpDomh2_s428Ivg18ECRn3wUwSa0geHPxb0gy1tsttPZCulzZNfVpcMz9gE-h15daB_YO9LJt2E4wKiU4l-TISdBwn6_F-7wBsyt2QkrL1rwWPsWg7mTv89KCqfONqVTOeJkQ"/>
            </div>
            <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-secondary-container rounded-full flex items-center justify-center p-8 text-center nature-shadow hidden lg:flex">
                <p class="font-headline-sm text-label-md text-on-secondary-container leading-tight">1.2M Trees Planted Together</p>
            </div>
        </div>
        <div>
            <h2 class="font-headline-md text-headline-md text-primary mb-6">Our Mission for a Greener Tomorrow</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-6">
                Greentify is more than a platform; it is a movement. We bridge the gap between high-end digital publishing and grassroots activism, providing a sophisticated space for environmental thinkers and doers.
            </p>
            <p class="font-body-md text-body-md text-on-surface-variant mb-8 leading-relaxed">
                By focusing on four key pillars—Waste Management, Conservation, Reforestation, and Forest Protection—we empower communities to make tangible impacts on their local and global ecosystems. Our approach is rooted in academic reliability and community passion.
            </p>
            <a class="font-label-md text-label-md text-primary flex items-center gap-2 group" href="#">
                Read Our Full Story
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">trending_flat</span>
            </a>
        </div>
    </div>
</section>

<!-- Featured Articles Bento Grid -->
<section class="bg-surface-container-low py-24">
    <div class="px-gutter max-w-container-max-width mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-xl">
                <h2 class="font-headline-md text-headline-md text-primary mb-4">Core Focus Categories</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Explore our curated collections of insights and projects dedicated to the preservation of our natural world.</p>
            </div>
            <a class="font-label-md text-label-md bg-white text-primary border border-outline-variant/30 px-6 py-2 rounded-lg hover:shadow-md transition-shadow" href="{{ route('blogspot') }}">View All Articles</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Limbah -->
            <a href="{{ route('limbah') }}" class="md:col-span-7 group cursor-pointer bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="aspect-[16/9] overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="A minimal, artistic photograph of a clean, futuristic recycling center interior." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYS4qmJmC63tahCXFuvs1Aj1Q8o1jV3eliGspHkYuKAe_PTlNjFzEjXljfATCTBdSO54tWv8N6gHZ9Fq2tbGaNudFKmow0CfpCEF1XaP_xe7XakrWJjX_6UNNXLXEag9YRVIrWyJ97n4q2fZYi4gd_St3jR34P_L3GBGRaC31qBOqK48kw5B-zC_VbniUzPH9BkVNCo-HgziTbhkwuSBFSR3SESw0lDlXEosDHCcHA098EvrxAhBDYGQ"/>
                </div>
                <div class="p-8">
                    <span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed-variant text-label-sm font-label-sm rounded-full mb-4">Limbah</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Reimagining Modern Waste Management</h3>
                    <p class="text-on-surface-variant font-body-md mb-4 line-clamp-2">How circular economy principles are transforming urban environments from waste producers into resource hubs.</p>
                    <span class="material-symbols-outlined text-primary">arrow_right_alt</span>
                </div>
            </a>
            <!-- Konservasi -->
            <a href="{{ route('konservasi') }}" class="md:col-span-5 group cursor-pointer bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="aspect-square overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="A stunning wildlife photograph of a rare leopard resting on a tree branch in a sun-drenched savannah." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnpDUPxiC6le6XI3b41Jw2Tqm_gMuljLorhedC994xP9uCOfNc_jlAQ-mZLChef-tySNOIGlgh23Huc0acNfjbNPsXvxYe4raBo5HlkEWLoPw0vZ4fsJYIjFujfc6JhVwlt0GJfR56EntKittHyj27KjHCp-XvkwgQ755pxmauXjYiQLm8ybuf5CN5oECdCtaOSIewd6D5HYIzTx3fcJVXuqKr0o2LNN6SVcESs7KcixcX3cKoAqcaZQ"/>
                </div>
                <div class="p-8">
                    <span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed-variant text-label-sm font-label-sm rounded-full mb-4">Konservasi</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Wildlife Habitat Protection</h3>
                    <p class="text-on-surface-variant font-body-md mb-4 line-clamp-2">Securing the corridors of life for endangered species across the archipelago.</p>
                    <span class="material-symbols-outlined text-primary">arrow_right_alt</span>
                </div>
            </a>
            <!-- Penghijauan -->
            <a href="{{ route('penghijauan') }}" class="md:col-span-5 group cursor-pointer bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="aspect-square overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="An aerial, top-down shot of a thriving urban garden on a skyscraper rooftop." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHfW9PvSb3y2bxxt3KUlqi3nnUQuwYFsTCdPETs39f4XuQQ4MmSIdPjwVCHXSSE6yiJjBF2LEzeaNHlkRiJN_AQY8Q215UMMXGXA3AbnT9Er0-2qf0rj5M8pvYBnipxMxjWuDHJZpxc1-2Fcv5ppjdPKqe7-WsQQxKxj8GrProQxvbr_ib4nIYgcvTuJ64vJ4fEvR2Vmt4PoU5mW6_EqmnPBsUkEsPsw1uVBr09df4fGYVSA7qneeOxg"/>
                </div>
                <div class="p-8">
                    <span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed-variant text-label-sm font-label-sm rounded-full mb-4">Penghijauan</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">The Urban Greening Initiative</h3>
                    <p class="text-on-surface-variant font-body-md mb-4 line-clamp-2">Transforming concrete jungles into oxygen-rich sanctuaries through vertical farming and community parks.</p>
                    <span class="material-symbols-outlined text-primary">arrow_right_alt</span>
                </div>
            </a>
            <!-- Hutan -->
            <a href="{{ route('hutan') }}" class="md:col-span-7 group cursor-pointer bg-white rounded-xl overflow-hidden nature-shadow border border-outline-variant/10">
                <div class="aspect-[16/9] overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="A wide-angle, atmospheric photo of a misty rainforest canopy at dusk." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2dWrCqTlG20H9EiX2TxQvBodHLraTNlFEb1SUt_ZjweI069qQDhyKNB2pdrMtb2fvuVMw7lQXmgCb_yOZsrb4xB8s2ipKpFYwRe1XgWjGzUBIC4D9UP10GMTtUNMtomZcgK6UFODLn54I0UZDhA-xTdiOMA6c7ozta8PhqqQAdOXeKIutNGmVNtP2W8kT1bPrb6E_-q0GDtRhjrZTa01FlB2L-ebsAV4qHvgq_i3SscGsvTpIqSl95g"/>
                </div>
                <div class="p-8">
                    <span class="inline-block px-3 py-1 bg-secondary-fixed text-on-secondary-fixed-variant text-label-sm font-label-sm rounded-full mb-4">Hutan</span>
                    <h3 class="font-headline-sm text-headline-sm text-primary mb-3">Protecting the Ancient Canopies</h3>
                    <p class="text-on-surface-variant font-body-md mb-4 line-clamp-2">A deep dive into why old-growth forests are our most powerful ally in the fight against climate change.</p>
                    <span class="material-symbols-outlined text-primary">arrow_right_alt</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-24 px-gutter">
    <div class="max-w-4xl mx-auto bg-primary rounded-2xl p-8 md:p-16 text-center text-on-primary relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="font-headline-md text-headline-md mb-4">Join the Green Movement</h2>
            <p class="font-body-lg text-body-lg mb-10 opacity-80 max-w-xl mx-auto">Receive weekly curated environmental insights, project updates, and exclusive community invitations directly to your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input class="flex-1 px-6 py-4 rounded-lg bg-on-primary/10 border border-on-primary/20 text-on-primary placeholder:text-on-primary/50 focus:outline-none focus:ring-2 focus:ring-secondary-fixed transition-all" placeholder="Your email address" type="email"/>
                <button class="bg-secondary-container text-on-secondary-container font-label-md text-label-md px-8 py-4 rounded-lg hover:bg-secondary-fixed transition-all active:scale-95 whitespace-nowrap" type="submit">Subscribe Now</button>
            </form>
            <p class="font-label-sm text-label-sm mt-6 opacity-60">We respect your privacy. Unsubscribe at any time.</p>
        </div>
    </div>
</section>
@endsection