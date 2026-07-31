<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register | Greentify</title>
    <link rel="icon" href="{{ asset('images/greentify.png') }}" type="image/png"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-stretch">

<!-- Left Side: Editorial Nature Illustration -->
<section class="hidden lg:flex lg:w-1/2 relative overflow-hidden group">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center scale-105 transition-transform duration-700 group-hover:scale-100"
             alt="A serene and majestic editorial photograph of a lush tropical forest with sunlight filtering through dense green leaves and ancient trees."
             style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCsWjV-Scrs4py2Wu6thqiTiWFGscKsas5kfhUgckc2k_aEYJnPBcUfBCaQ6OtONQkvWMFBZUXYPlgWOtz2hXV87xaYCF_-jg9VT8okWOH160U_V6tSrfcw96S7QqM4FbyXy__KtrQFsqleXhhRNXiqfjjEm8GCQrwlPWmzgFeNero8CkVA0H04LRO_pTn3oJ-tk30qhLJciPsdATOik6cRt-9RKXKnswj7dSfKh7gN64AMTwFUx-wADg')"></div>
    </div>
    <div class="absolute inset-0 nature-overlay z-10"></div>
    <div class="relative z-20 p-16 flex flex-col justify-between w-full h-full text-surface">
        <div>
            <h1 class="font-display-lg text-display-lg tracking-tight mb-4">Greentify</h1>
            <p class="font-body-lg text-body-lg max-w-md opacity-90 leading-relaxed">
                Bridging the gap between digital community and grassroots environmental activism.
            </p>
        </div>
        <div class="bg-surface/10 backdrop-blur-md p-8 rounded-xl border border-surface/20 max-w-sm">
            <span class="material-symbols-outlined mb-4 text-secondary-fixed">nature_people</span>
            <p class="font-body-md text-body-md italic opacity-90 mb-4">
                "Alam bukan hanya tempat untuk dikunjungi, ia adalah rumah."
            </p>
            <div class="flex items-center gap-3">
                <div class="w-8 h-[1px] bg-secondary-fixed"></div>
                <span class="font-label-sm text-label-sm uppercase tracking-widest">Eco-Community Jakarta</span>
            </div>
        </div>
    </div>
</section>

<!-- Right Side: Clean Register Form -->
<main class="w-full lg:w-1/2 bg-surface flex items-center justify-center p-gutter relative">
    <!-- Background Atmospheric Effect -->
    <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">potted_plant</span>
    </div>
    <div class="w-full max-w-md space-y-10 relative z-10">
        <!-- Mobile Brand Logo -->
        <div class="lg:hidden flex flex-col items-center mb-6">
            <h1 class="font-display-lg-mobile text-display-lg-mobile text-primary">Greentify</h1>
            <p class="font-label-md text-label-md text-on-surface-variant">Eco-Community Ecosystem</p>
        </div>
        <header class="space-y-2">
            <h2 class="font-headline-md text-headline-md text-primary">Bergabung dengan Komunitas</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Mulai perjalanan hijau Anda bersama kami.</p>
        </header>

        @if(session('success'))
            <div class="bg-secondary-container text-on-secondary-container p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-error-container text-on-error-container p-4 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-5" method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name Field -->
            <div class="space-y-2 group">
                <label class="font-label-md text-label-md text-primary block transition-colors group-focus-within:text-secondary" for="name">Nama Lengkap</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">person</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-tertiary-fixed-dim/10 border-transparent rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent focus:bg-surface-container-lowest input-transition font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50" id="name" name="name" placeholder="Nama Anda" required type="text" value="{{ old('name') }}"/>
                </div>
            </div>
            <!-- Email Field -->
            <div class="space-y-2 group">
                <label class="font-label-md text-label-md text-primary block transition-colors group-focus-within:text-secondary" for="email">Email Alamat</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">mail</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-tertiary-fixed-dim/10 border-transparent rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent focus:bg-surface-container-lowest input-transition font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50" id="email" name="email" placeholder="nama@email.com" required type="email" value="{{ old('email') }}"/>
                </div>
            </div>
            <!-- Password Field -->
            <div class="space-y-2 group">
                <label class="font-label-md text-label-md text-primary block transition-colors group-focus-within:text-secondary" for="password">Kata Sandi</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-tertiary-fixed-dim/10 border-transparent rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent focus:bg-surface-container-lowest input-transition font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50" id="password" name="password" placeholder="Minimal 8 karakter" required type="password"/>
                    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" type="button" onclick="togglePassword('password', 'passwordIcon')">
                        <span class="material-symbols-outlined" id="passwordIcon">visibility</span>
                    </button>
                </div>
            </div>
            <!-- Confirm Password Field -->
            <div class="space-y-2 group">
                <label class="font-label-md text-label-md text-primary block transition-colors group-focus-within:text-secondary" for="password_confirmation">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-tertiary-fixed-dim/10 border-transparent rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent focus:bg-surface-container-lowest input-transition font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required type="password"/>
                    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" type="button" onclick="togglePassword('password_confirmation', 'passwordConfirmationIcon')">
                        <span class="material-symbols-outlined" id="passwordConfirmationIcon">visibility</span>
                    </button>
                </div>
            </div>
            <!-- Action Button -->
            <button class="w-full bg-primary text-on-primary py-4 rounded-lg font-label-md text-label-md shadow-sm hover:shadow-lg hover:bg-primary-container active:scale-[0.98] transition-all duration-200 flex items-center justify-center gap-2 group" type="submit">
                Daftar
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </button>
        </form>

        <footer class="text-center pt-4">
            <p class="font-body-md text-body-md text-on-surface-variant">
                Sudah punya akun?
                <a class="text-secondary font-semibold hover:underline transition-all" href="{{ route('login') }}">Masuk</a>
            </p>
        </footer>
    </div>

    <!-- Decorative Subtle Pattern Bottom Right -->
    <div class="absolute bottom-12 right-12 flex gap-4 opacity-10">
        <span class="material-symbols-outlined">eco</span>
        <span class="material-symbols-outlined">recycling</span>
        <span class="material-symbols-outlined">forest</span>
    </div>
</main>

<style>
    body {
        background-color: #f9f9f8;
        color: #191c1c;
    }
    .nature-overlay {
        background: linear-gradient(to bottom, rgba(1, 45, 29, 0.4), rgba(1, 45, 29, 0.1));
    }
    .input-transition {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<script>
    // Toggle password visibility
    function togglePassword(id, iconId) {
        const input = document.getElementById(id);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }
</script>
</body>
</html>