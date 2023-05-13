<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- HyperText Markup Language Meta Tags --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="E-UMKM, Web Application, UMKM, Agile Software Development, Informatika Universitas Ciputra Surabaya" />
    <meta name="description"
        content="E-UMKM adalah Aplikasi Sistem Manajemen Berbasis Web untuk Komunitas Event Organizer yang mengadakan Bazaar UMKM dengan memberikan akses kepada pelanggan dalam mengelola informasi UMKM yang telah melakukan pendaftaran untuk penyewaan tenant." />
    <meta name="owner"
        content="Nur Azizah, Daniel Aprillio Budiono, Mahadi Rafi Winata, Oey Darryl Valencio Wijaya, Probo Krishnacahya, Nathaniel Axel Soetrisno." />
    <meta name="theme-color" content="#F97316">

    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ url('images/favicon.svg?v=2') }}" type="image/svg" />

    {{-- Laravel CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- External CSS --}}
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css" />

    {{-- Google Fonts CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;800&display=swap" rel="stylesheet">

    {{-- Alpine.js CDN --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Styles --}}
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        {{-- Header --}}
        @livewire('navigation-menu')

        {{-- Content --}}
        <main class="container max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 space-y-8">
            <div class="font-sans text-gray-900 antialiased">
                @if (isset($header))
                    <header>
                        {{ $header }}
                    </header>
                @endif
                <br>
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    {{-- Footer --}}
    <x-footer />

</body>

</html>
