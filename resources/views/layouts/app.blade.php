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
            @include('layouts.navbar')
    
            <main class="pt-24">
                @yield('content')
            </main>
    
            @include('layouts.footer')
        </div>
    </body>

</html>