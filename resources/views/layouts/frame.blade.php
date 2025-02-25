<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>IMS Store</title>
</head>

<body class="w-full bg-slate-100 dark:bg-gradient-to-t from-gray-900 to-gray-800">
    @include('sweetalert::alert')
    @extends('layouts.sidebar')
    <main class="min-h-screen capitalize">
        @yield('content')
    </main>
</body>

</html>
