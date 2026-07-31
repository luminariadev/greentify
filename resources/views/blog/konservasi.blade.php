<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head', ['title' => 'Single Post'])

<body>
    @include('components.sidebar')

    <!-- component -->
    <div class="content flex-grow p-4 xl:ml-80">
        
        <!-- Navigation Bar -->
        <nav class="bg-white shadow-lg p-4">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">
                Single Post
            </h1>
        </nav>
            
            <!-- Article 3: Detailed Article View (Matching Design) -->
            <div class="bg-white shadow-2xl rounded-lg dark:bg-gray-800 overflow-hidden">
             \
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Konservasi Air di Lingkungan Kering</h2>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                        Ketersediaan air bersih semakin menjadi isu penting di daerah-daerah kering atau yang mengalami kekurangan air. Artikel ini membahas pentingnya konservasi air melalui praktik penghematan air, penggunaan teknologi irigasi yang efisien, dan perlunya pengelolaan air yang berkelanjutan. Dengan memahami tantangan ini, kita dapat mengambil langkah-langkah proaktif untuk melindungi sumber daya air yang semakin berkurang.</p>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                        Kelangkaan air bersih tak hanya berdampak pada kebutuhan rumah tangga, tapi juga sektor penting seperti pertanian dan industri. Di daerah kering, krisis air dapat memicu konflik sosial dan ekonomi, memperparah kemiskinan, dan menghambat pembangunan.
                    </p>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                        Oleh karena itu, konservasi air menjadi kunci untuk menjaga kelangsungan hidup di tengah kondisi yang menantang ini. Upaya kolektif dan berkelanjutan sangat diperlukan,  melibatkan individu, komunitas, pemerintah, dan pihak swasta.
                    </p>
                       <p class="mt-2 text-gray-700 dark:text-gray-300">
                           Dengan memahami akar permasalahan dan menerapkan solusi tepat, kita dapat melangkah menuju masa depan yang lebih aman dan sejahtera, di mana air tersedia bagi semua orang dan ekosistem di sekitarnya.
                       </p>
                    <div class="mt-4 flex items-center">
                        <img class="w-12 h-12 object-cover rounded-full shadow mr-4" src="https://lh3.googleusercontent.com/a/ACg8ocKcx6AJJO9LlyMtEKcTk5GV9AgMVpwDXIAkztEXAeAWJzd-C5lx=s288-c-no" alt="Avatar">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                <a href="#">Rizkia Nuari Fujiana</a>
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">| 20 June 2024</p>
                        </div>
                    </div>
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
