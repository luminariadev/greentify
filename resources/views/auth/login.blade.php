<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login | Greentify</title>
    <link rel="icon" href="{{ asset('images/greentify.png') }}" type="image/png"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-stretch">

<!-- Left Side: Editorial Nature Illustration -->
<section class="hidden lg:block lg:w-1/2 relative h-screen sticky top-0">
    <div class="absolute inset-0 z-0">
        <div class="w-full h-full bg-cover bg-center"
             alt="A serene and majestic editorial photograph of a lush tropical forest with sunlight filtering through dense green leaves and ancient trees."
             style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDSj--lywyacXphOfKDLX1VtathH_pFjc5irDfBSYg4L55hCkrGezosOKiSSKtxEBKryaKIyGoI1lVeds8sUpvtpw6i0t02FfROZPG6u-Uxz4AktPFoDCTfOUyE4Ub04y0D7pAoqWKm4wjhcgLX-dNGbdzQwE99hHl235fw1B5c68jhvD8Awq98mGAbIl3QHKkwTviFPRYuxpQwA3kUBUUVdJDg5W4UBmUkdqrBX-kc5Hz3RT6QhmbWKw')"></div>
    </div>
    <div class="absolute inset-0 nature-overlay z-10"></div>
    <div class="relative z-20 p-16 flex flex-col justify-between w-full h-full text-white">
        <div>
            <h1 class="font-display-lg text-display-lg tracking-tight mb-4">Greentify</h1>
            <p class="font-body-lg text-body-lg max-w-md opacity-95 leading-relaxed">
                Bridging the gap between digital community and grassroots environmental activism.
            </p>
        </div>
        <div class="bg-black/20 backdrop-blur-md p-8 rounded-xl border border-white/20 max-w-sm self-start">
            <span class="material-symbols-outlined mb-4 text-secondary-fixed">nature_people</span>
            <p class="font-body-md text-body-md italic opacity-95 mb-4">
                "Alam bukan hanya tempat untuk dikunjungi, ia adalah rumah."
            </p>
            <div class="flex items-center gap-3">
                <div class="w-8 h-[1px] bg-secondary-fixed"></div>
                <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed">Eco-Community Jakarta</span>
            </div>
        </div>
    </div>
</section>

<!-- Right Side: Clean Login Form -->
<main class="w-full lg:w-1/2 bg-surface flex items-center justify-center p-gutter relative">
    <!-- Background Atmospheric Effect -->
    <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none">
        <span class="material-symbols-outlined text-[200px]">potted_plant</span>
    </div>
    <div class="w-full max-w-md space-y-12 relative z-10">
        <!-- Mobile Brand Logo -->
        <div class="lg:hidden flex flex-col items-center mb-8">
            <h1 class="font-display-lg-mobile text-display-lg-mobile text-primary">Greentify</h1>
            <p class="font-label-md text-label-md text-on-surface-variant">Eco-Community Ecosystem</p>
        </div>
        <header class="space-y-2">
            <h2 class="font-headline-md text-headline-md text-primary">Selamat Datang Kembali</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Akses dashboard konservasi dan limbah Anda.</p>
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

        <form class="space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
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
                <div class="flex justify-between items-center">
                    <label class="font-label-md text-label-md text-primary block transition-colors group-focus-within:text-secondary" for="password">Kata Sandi</label>
                    <a class="font-label-sm text-label-sm text-secondary hover:underline transition-all" href="#">Lupa sandi?</a>
                </div>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">lock</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-tertiary-fixed-dim/10 border-transparent rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent focus:bg-surface-container-lowest input-transition font-body-md text-body-md text-on-surface placeholder-on-surface-variant/50" id="password" name="password" placeholder="••••••••" required type="password"/>
                    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" type="button" onclick="togglePassword()">
                        <span class="material-symbols-outlined" id="passwordIcon">visibility</span>
                    </button>
                </div>
            </div>
            <!-- Remember Me -->
            <div class="flex items-center gap-3">
                <input class="w-5 h-5 rounded border-outline text-primary focus:ring-primary cursor-pointer" id="remember" name="remember" type="checkbox"/>
                <label class="font-label-md text-label-md text-on-surface-variant cursor-pointer select-none" for="remember">Ingat saya</label>
            </div>
            <!-- Action Button -->
            <button class="w-full bg-primary text-on-primary py-4 rounded-lg font-label-md text-label-md shadow-sm hover:shadow-lg hover:bg-primary-container active:scale-[0.98] transition-all duration-200 flex items-center justify-center gap-2 group" type="submit">
                Login
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </button>
        </form>

        <div class="relative flex items-center py-4">
            <div class="flex-grow border-t border-outline-variant/30"></div>
            <span class="flex-shrink mx-4 font-label-sm text-label-sm text-outline uppercase tracking-widest">Atau masuk dengan</span>
            <div class="flex-grow border-t border-outline-variant/30"></div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <button class="flex items-center justify-center gap-3 py-3 px-4 border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors font-label-md text-label-md">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"></path>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
                </svg>
                Google
            </button>
            <button class="flex items-center justify-center gap-3 py-3 px-4 border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors font-label-md text-label-md">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">file_download</span>
                Apple
            </button>
        </div>

        <footer class="text-center pt-8">
            <p class="font-body-md text-body-md text-on-surface-variant">
                Belum punya akun?
                <a class="text-secondary font-semibold hover:underline transition-all" href="{{ route('register') }}">Daftar</a>
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
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('passwordIcon');
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