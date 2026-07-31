<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head', ['title' => 'Halaman Utama'])

<body>
    @include('components.sidebar')

    @include('components.content')
    

    @include('components.footer')
</body>
</html>
