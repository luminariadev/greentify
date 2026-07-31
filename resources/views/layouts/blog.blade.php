<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head', ['title' => 'Halaman Blog'])

<body>
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="content flex-grow p-4 xl:ml-80">
        <nav class="bg-white shadow-lg p-4">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">
                Blogspot Pages
            </h1>
        </nav>
        

        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2">
            <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <img class="object-cover w-full h-56 lg:w-64" src="https://images.unsplash.com/photo-1562077981-4d7eafd44932?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

                <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                    <a href="{{ route('limbah') }}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                        Pengurangan Limbah Plastik
                    </a> 
                    <span class="text-sm text-gray-500 dark:text-gray-300">On: 23 June 2024 </span>
                </div>
            </div>

            <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <img class="object-cover w-full h-56 lg:w-64" src="https://plus.unsplash.com/premium_photo-1663013572158-a01191b95f4b?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

                <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                    <a href="{{ route('konservasi') }}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                        Konservasi Air di Lingkungan Kering
                    </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 June 2024</span>
                </div>
            </div>

            <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <img class="object-cover w-full h-56 lg:w-64" src="https://plus.unsplash.com/premium_photo-1663076367860-3cde6cedaf66?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

                <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                    <a href="{{ route('penghijauan') }}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                        Manfaat Penghijauan Kota dalam Mengatasi Perubahan Iklim
                    </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">On: 25 June 2023</span>
                </div>
            </div>

            <div class="lg:flex justify-start items-center bg-white dark:bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <img class="object-cover w-full h-56 lg:w-64" src="https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

                <div class="flex flex-col justify-between py-6 px-4 lg:px-6">
                    <a href="{{ route('hutan') }}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                        Perlindungan Hutan Hujan bagi Keanekaragaman Hayati
                    </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">On: 25 June 2024</span>
                </div>
            </div>


    @include('components.footer')
</body>
</html>
