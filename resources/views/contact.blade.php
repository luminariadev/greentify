@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<!-- Contact Page -->
<main class="min-h-[calc(100vh-200px)] flex items-center py-margin-desktop bg-sage-wash">
    <div class="max-w-container-max-width mx-auto px-gutter w-full grid grid-cols-1 md:grid-cols-12 gap-16 items-start">
        <!-- Left Column: Identity & Contact Details -->
        <div class="md:col-span-5 space-y-12">
            <div class="space-y-4">
                <h1 class="font-headline-md text-headline-md text-primary">Let's connect for a greener future.</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    Whether you're starting a local conservation project or looking for waste management solutions, our team is here to support your journey.
                </p>
            </div>
            <!-- Contact Info Cards -->
            <div class="space-y-8">
                <div class="flex items-start gap-4 group">
                    <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
                        <span class="material-symbols-outlined">location_on</span>
                    </div>
                    <div>
                        <h3 class="font-label-md text-label-md text-primary">Our Sanctuary</h3>
                        <p class="text-on-surface-variant mt-1">123 Eco Way, Highland Forest,<br/>Pebble City, GC 45210</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 group">
                    <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <div>
                        <h3 class="font-label-md text-label-md text-primary">Email Inquiries</h3>
                        <p class="text-on-surface-variant mt-1">hello@greentify.eco<br/>support@greentify.eco</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 group">
                    <div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shrink-0">
                        <span class="material-symbols-outlined">share</span>
                    </div>
                    <div>
                        <h3 class="font-label-md text-label-md text-primary">Social Community</h3>
                        <div class="flex gap-4 mt-2">
                            <a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">Instagram</a>
                            <a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">LinkedIn</a>
                            <a class="text-on-surface-variant hover:text-secondary transition-colors" href="#">X (Twitter)</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quote Section -->
            <div class="pt-8 border-t border-outline-variant/30">
                <blockquote class="italic text-primary-container font-headline-sm text-headline-sm relative">
                    <span class="absolute -left-6 -top-2 opacity-10 text-6xl">"</span>
                    Nature provides for those who protect it. Let us build bridges between conservation and modern life.
                </blockquote>
                <p class="mt-4 font-label-md text-label-md text-on-surface-variant">— Inspired by Rizkia Nuari Fujiana</p>
            </div>
        </div>
        <!-- Right Column: Modern Contact Form -->
        <div class="md:col-span-7">
            <div class="bg-surface-container-lowest p-8 md:p-12 rounded-xl nature-shadow border border-outline-variant/20">
                <form class="space-y-6" id="contactForm" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="font-label-sm text-label-sm text-on-surface-variant ml-1" for="name">Full Name</label>
                            <input class="w-full px-4 py-3 rounded-lg bg-surface-container border-none focus:ring-2 focus:ring-primary/20 text-on-surface placeholder:text-on-surface-variant/40 transition-all" id="name" name="name" placeholder="John Doe" type="text" required/>
                        </div>
                        <div class="space-y-2">
                            <label class="font-label-sm text-label-sm text-on-surface-variant ml-1" for="email">Email Address</label>
                            <input class="w-full px-4 py-3 rounded-lg bg-surface-container border-none focus:ring-2 focus:ring-primary/20 text-on-surface placeholder:text-on-surface-variant/40 transition-all" id="email" name="email" placeholder="john@example.com" type="email" required/>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant ml-1" for="subject">Subject</label>
                        <select class="w-full px-4 py-3 rounded-lg bg-surface-container border-none focus:ring-2 focus:ring-primary/20 text-on-surface transition-all appearance-none" id="subject" name="subject" required>
                            <option value="general">General Inquiry</option>
                            <option value="limbah">Limbah (Waste Management)</option>
                            <option value="konservasi">Konservasi (Conservation)</option>
                            <option value="community">Community Support</option>
                            <option value="partnership">Partnership</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-sm text-label-sm text-on-surface-variant ml-1" for="message">Message</label>
                        <textarea class="w-full px-4 py-3 rounded-lg bg-surface-container border-none focus:ring-2 focus:ring-primary/20 text-on-surface placeholder:text-on-surface-variant/40 transition-all resize-none" id="message" name="message" placeholder="How can we help you today?" rows="5" required></textarea>
                    </div>
                    <button class="w-full py-4 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all flex items-center justify-center gap-2 group" type="submit">
                        Send Message
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">send</span>
                    </button>
                </form>
                @if(session('success'))
                    <div class="hidden text-center py-12 space-y-4" id="successMessage">
                        <div class="w-16 h-16 bg-secondary-container text-on-secondary-container rounded-full flex items-center justify-center mx-auto">
                            <span class="material-symbols-outlined text-3xl">check_circle</span>
                        </div>
                        <h2 class="font-headline-sm text-headline-sm text-primary">Message Sent!</h2>
                        <p class="text-on-surface-variant">Thank you for reaching out. Our eco-specialists will get back to you within 24 hours.</p>
                        <button class="text-primary font-label-md hover:underline" onclick="resetForm()">Send another message</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>

<!-- Map Section -->
<section class="w-full h-96 bg-surface-container relative overflow-hidden">
    <div class="absolute inset-0 grayscale contrast-125 opacity-40">
        <img class="w-full h-full object-cover" alt="A clean, minimalist topographic map illustration of a lush forest and urban intersection area in a light-mode editorial style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9bk2JuCYQwZFjRYWnxCC58CW9pW_707EDPSFLFb5SxoebYEjpVewuN-e_-GJJfOWJh7f4gd3Zc7A948CNrda2sqoEc18dW9vFC4Q3Zh3YOL16-UhQ1tXuLT-Pg0xoYZO7F_I6YUgfI_m_ZdQfj5UwojFd3ssZAQt-4TX1RyviZLnfgsaFQqJqn6bBVcBN4RBFEKCWMN1kiTt9Wav0wH7e1t3IeMgm1Lt3j99EfYpK4y0kj_hefuVFJQ"/>
    </div>
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="bg-primary text-on-primary px-4 py-2 rounded-full shadow-2xl flex items-center gap-2 animate-bounce">
            <span class="material-symbols-outlined text-sm">park</span>
            <span class="font-label-sm">Greentify HQ</span>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    const contactForm = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');

    @if(session('success'))
        contactForm.classList.add('hidden');
        successMessage.classList.remove('hidden');
        successMessage.classList.add('animate-fade-in');
    @endif

    contactForm.addEventListener('submit', (e) => {
        // Form will submit normally via POST to Laravel route
    });

    function resetForm() {
        contactForm.reset();
        successMessage.classList.add('hidden');
        contactForm.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
    }

    // Add small scroll reveal interaction
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-8');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.nature-shadow').forEach(el => {
        el.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-8');
        observer.observe(el);
    });
</script>
@endpush