<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'Greentify') | Greentify</title>
    <link rel="icon" href="{{ asset('images/greentify.png') }}" type="image/png"/>
    <link rel="manifest" href="{{ asset('manifest.json') }}"/>
    <meta name="theme-color" content="#16a34a"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface font-body-md overflow-x-hidden">

    @include('components.navbar')

    <main class="pt-20">
        @yield('content')
    </main>

    @include('components.footer')

    <script>
        // Scroll shadow on navbar
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('shadow-nature');
                } else {
                    header.classList.remove('shadow-nature');
                }
            }
        });

        // Intersection observer for scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.nature-shadow').forEach(el => {
            el.classList.add('transition-all', 'duration-700', 'opacity-0', 'translate-y-8');
            observer.observe(el);
        });
    </script>

    <!-- PWA: Register Service Worker -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('{{ asset("service-worker.js") }}')
                    .then(reg => console.log('SW registered:', reg.scope))
                    .catch(err => console.warn('SW registration failed:', err));
            });
        }
    </script>

    @stack('scripts')
</body>
</html>