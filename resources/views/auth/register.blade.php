<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/greentify.png') }}" type="image/png">
    <title>Register Pages</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-no-repeat bg-cover bg-center" style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);">
<div class="absolute bg-gradient-to-b from-green-500 to-green-400 opacity-75 inset-0"></div>
<div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
    <div class="flex-col flex self-center p-10 sm:max-w-5xl xl:max-w-2xl z-10">
        <div class="self-start hidden lg:flex flex-col text-white">
            <h1 class="mb-3 font-bold text-5xl">Hi ? Let's Join Us</h1>
            <p class="pr-3">Welcome to the Greentify website, I hope the environment we live in remains maintained and beautiful.</p>
        </div>
    </div>
    <div class="flex justify-center self-center z-10">
        <div class="p-12 bg-white mx-auto rounded-2xl w-full max-w-md">
            <div class="mb-4">
                <h3 class="font-semibold text-2xl text-gray-800">Register</h3>
                <p class="text-gray-500">Create your account.</p>
            </div>

            <!-- Tampilkan Pesan Keberhasilan -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tampilkan Pesan Kesalahan -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulir Registrasi -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div class="space-y-2">
                    <label for="name" class="text-sm font-medium text-gray-700 tracking-wide">Name</label>
                    <input id="name" name="name" type="text" placeholder="Your Name"
                           class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" value="{{ old('name') }}">
                </div>
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                    <input id="email" name="email" type="email" placeholder="mail@gmail.com"
                           class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" value="{{ old('email') }}">
                </div>
                <div class="space-y-2">
                    <label for="password" class="text-sm font-medium text-gray-700 tracking-wide">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter your password"
                           class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400">
                </div>
                <div class="space-y-2">
                    <label for="password_confirmation" class="text-sm font-medium text-gray-700 tracking-wide">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password"
                           class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400">
                </div>
                <div>
                    <button type="submit"
                            class="w-full flex justify-center bg-green-400 hover:bg-green-500 text-gray-100 p-3 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                        Register
                    </button>
                </div>
            </form>

            <!-- Menu Login -->
            <div class="mt-6 text-center text-sm">
                <span class="text-gray-600">Already have an account?</span>
                <a href="{{ route('login') }}" class="ml-1 text-green-400 hover:text-green-500">Login</a>
            </div>

        </div>
    </div>
</div>
</body>
</html>
