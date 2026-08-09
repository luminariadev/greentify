<!-- Footer -->
<footer class="bg-primary text-on-primary">
    <div class="w-full py-16 px-gutter max-w-container-max-width mx-auto flex flex-row flex-wrap md:flex-row justify-between gap-8">
        <div class="flex-1 min-w-[250px]">
            <h3 class="font-headline-sm text-headline-sm mb-6">Greentify</h3>
            <p class="font-body-md text-on-primary/80 mb-8 max-w-xs">Connecting people with nature through modern editorial experiences and grassroots action.</p>
            <div class="flex gap-4">
                <a class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center hover:bg-on-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined text-on-primary">public</span>
                </a>
                <a class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center hover:bg-on-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined text-on-primary">eco</span>
                </a>
                <a class="w-10 h-10 rounded-full border border-on-primary/20 flex items-center justify-center hover:bg-on-primary/10 transition-colors" href="#">
                    <span class="material-symbols-outlined text-on-primary">group</span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-8 md:gap-16">
            <div>
                <h4 class="font-label-md text-label-md mb-6 uppercase tracking-wider">Quick Links</h4>
                <ul class="space-y-4 font-label-sm">
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('limbah') }}">Limbah</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('konservasi') }}">Konservasi</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('penghijauan') }}">Penghijauan</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('hutan') }}">Hutan</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('marketplace.index') }}">Marketplace</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('donation.index') }}">Donasi</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('contact.form') }}">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label-md text-label-md mb-6 uppercase tracking-wider">Resources</h4>
                <ul class="space-y-4 font-label-sm">
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="#">Sitemap</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="#">Privacy Policy</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="{{ route('contact.form') }}">Contact Us</a></li>
                    <li><a class="text-on-primary/80 hover:text-secondary-fixed transition-colors" href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="max-w-container-max-width mx-auto px-gutter py-8 editorial-border">
        <p class="font-label-sm text-label-sm text-on-primary/60 text-center md:text-left">© 2024 Greentify. Inspired by Rizkia Nuari Fujiana.</p>
    </div>
</footer>