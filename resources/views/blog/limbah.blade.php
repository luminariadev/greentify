<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head', ['title' => 'Single Post'])

<body>
    @include('components.sidebar')

    <!-- Main Container -->
    <div class="content flex-grow p-4 xl:ml-80">
        
        <!-- Navigation Bar -->
        <nav class="bg-white shadow-lg p-4">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">
                Single Post
            </h1>
        </nav>

        <!-- Detailed Article View -->
        <div class="bg-white shadow-2xl rounded-lg dark:bg-gray-800 overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Pengurangan Limbah Plastik</h2>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Penggunaan plastik sekali pakai telah menjadi salah satu masalah lingkungan yang paling mendesak saat ini. Artikel ini mengulas berbagai strategi untuk mengurangi penggunaan plastik, seperti memilih kantong belanja reusable, mengganti pengemasan dengan bahan ramah lingkungan, dan menggalakkan kampanye pengurangan plastik di masyarakat. Dengan edukasi yang tepat, kita dapat mengurangi dampak negatif plastik terhadap lingkungan dan mendorong adopsi praktik yang lebih berkelanjutan.
                </p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">
                    Dengan edukasi yang tepat, kita dapat mengurangi dampak negatif plastik terhadap lingkungan dan mendorong adopsi praktik yang lebih berkelanjutan. Penggunaan plastik sekali pakai telah menjadi salah satu masalah lingkungan yang paling mendesak saat ini. Artikel ini mengulas berbagai strategi untuk mengurangi penggunaan plastik, seperti memilih kantong belanja reusable, mengganti pengemasan dengan bahan ramah lingkungan, dan menggalakkan kampanye pengurangan plastik di masyarakat. Dengan edukasi yang tepat, kita dapat mengurangi dampak negatif plastik terhadap lingkungan dan mendorong adopsi praktik yang lebih berkelanjutan.
                </p>
                <div class="mt-4 flex items-center">
                    <img class="w-12 h-12 object-cover rounded-full shadow mr-4" src="https://lh3.googleusercontent.com/a/ACg8ocKcx6AJJO9LlyMtEKcTk5GV9AgMVpwDXIAkztEXAeAWJzd-C5lx=s288-c-no" alt="Avatar">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                            <a href="#">Rizkia Nuari Fujiana</a>
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">| 23 June 2024</p>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('blogspot') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                        Kembali ke Blog
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
