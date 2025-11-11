<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @php
            $seo = \App\Models\SeoSetting::first();
        @endphp

        <title>{{ config('app.name', 'Bintang Canopy') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('asset/images/BC.png') }}">
        <meta name="description" content="{{ $seo->meta_description ?? '' }}">
        <meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $seo->og_title ?? $seo->meta_title ?? '' }}">
        <meta property="og:description" content="{{ $seo->og_description ?? $seo->meta_description ?? '' }}">
        @if(!empty($seo->og_image))
        <meta property="og:image" content="{{ asset('storage/' . $seo->og_image) }}">
        @endif
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans relative bg-white">
        <div class="min-h-screen">
            @include('layouts.topbar')
            @include('layouts.navbar')
    
            <main class="pt-40">
                @yield('content')
            </main>
    
            @include('layouts.footer')
        </div>
        <script>
            let lastScrollTop = 0;
            const topbar = document.getElementById('topbar');
            const navbar = document.querySelector('header');

            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                const isDesktop = window.innerWidth >= 768; // md breakpoint

                if (isDesktop) {
                    // Scroll down → sembunyikan topbar
                    if (scrollTop > lastScrollTop) {
                        topbar.style.transform = "translateY(-100%)";
                        navbar.style.top = "0px";
                    } 
                    // Scroll up → tampilkan topbar lagi
                    else {
                        topbar.style.transform = "translateY(0)";
                        navbar.style.top = "48px"; // tinggi topbar
                    }
                } else {
                    // Mobile → topbar tidak ada, navbar selalu di top 0
                    navbar.style.top = "0";
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // prevent negative scroll
            });

            // Optional: update topbar/navbar saat resize
            window.addEventListener('resize', function() {
                if (window.innerWidth < 768) {
                    navbar.style.top = "0";
                    topbar.style.transform = "translateY(-100%)"; // sembunyikan topbar di mobile
                } else {
                    navbar.style.top = "48px"; // desktop default
                    topbar.style.transform = "translateY(0)";
                }
            });
        </script>


    </body>

</html>