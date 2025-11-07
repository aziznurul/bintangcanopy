@extends('layouts.app')

@section('content')

<!-- Google Fonts -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Hero Section -->

<section id="hero" class="max-w-7xl w-full h-[33rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col md:flex-row items-center justify-center px-6 md:px-16 mx-auto">
    <!-- Kiri: Teks & CTA -->
    <div class="md:w-full flex flex-col justify-center items-start space-y-6">

        <div class="md:w-10/12 flex flex-col justify-center items-start space-y-6 overflow-hidden px-4 md:px-0">
            <h1 id="hero-title" class="text-3xl md:text-4xl font-bold transform opacity-0 transition-all duration-700" style="font-family: 'Space Grotesk', sans-serif;">
                {{ $slides[0]->title ?? 'Judul Hero' }}
            </h1>
            <p id="hero-desc" class="w-full md:w-11/12 text-lg md:text-xl text-gray-700 transform opacity-0 transition-all duration-700 delay-150" style="font-family: 'Poppins', sans-serif;">
                {{ $slides[0]->description ?? 'Deskripsi singkat hero di sini.' }}
            </p>
        </div>

        <div class="flex space-x-4">
            <a href="https://wa.me/6281220209566" target="_blank" class="bg-white text-black border border-green-600 px-6 py-3 rounded-[5px] font-semibold flex items-center space-x-2 hover:bg-green-600 transition">
                <img src="{{ asset('asset/images/whatsapp.png') }}" alt="WhatsApp" class="h-6 w-6">
                <span>Konsultasi Gratis</span>
            </a>
            <a href="#portfolio" class="bg-white text-black border border-blue-600 px-6 py-3 rounded-[5px] font-semibold hover:bg-blue-500 transition">
                Lihat Portfolio
            </a>
        </div>
    </div>

    <!-- Kanan: Gambar / Carousel -->
    <div class="md:w-1/2 mt-8 md:mt-0">
        <div class="swiper h-80 md:h-full rounded overflow-hidden">
            <div class="swiper-wrapper">
                @foreach($slides as $slide)
                    <div class="swiper-slide h-full flex items-center justify-center">
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" class="object-cover h-full w-full rounded">
                    </div>
                @endforeach
            </div>

            <!-- Navigation -->
            <div class="swiper-button-next text-black"></div>
            <div class="swiper-button-prev text-black"></div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

</section>

<!-- Section Tentang -->
<section id="tentang" class="max-w-7xl w-full min-h-[28rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col md:flex-row items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <div class="flex flex-col lg:flex-row items-start justify-between gap-10 w-full">
        
        <!-- Kolom Kiri: Sejarah, Visi, Misi -->
        <div class="lg:w-2/3 space-y-6">
            <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3">Tentang Kami</h2>
            
            <div>
                <h3 class="text-xl font-semibold text-green-700">Visi</h3>
                <p class="text-gray-600 mt-2 leading-relaxed">
                    {{ $about->visi ?? 'Belum ada data visi.' }}
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-green-700">Misi</h3>
                @if(!empty($about->misi))
                    <ul class="list-disc list-inside text-gray-600 mt-2 space-y-1">
                        @foreach(explode("\n", $about->misi) as $misi)
                            @if(trim($misi) !== '')
                                <li>{{ $misi }}</li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600 mt-2 leading-relaxed">Belum ada data misi.</p>
                @endif
            </div>

        </div>

        <!-- Kolom Kanan: Logo -->
        <div class="lg:w-1/3 flex flex-col items-center space-y-4">
            <img src="{{ asset('asset/images/BC.png') }}" alt="Logo SINERGANTARA" class="w-64 lg:w-72 object-contain">

            <a href="#"
            class="bg-green-600 text-white px-6 py-2 rounded-[5px] font-semibold hover:bg-green-700 transition flex items-center gap-2">
                <span>Lihat Selengkapnya</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

        </div>

    </div>
</section>

<!-- Section Layanan -->
<section id="layanan" class="max-w-7xl w-full min-h-[22rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col md:flex-row items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <div class="w-full mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Layanan Kami</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <!-- Card 1 -->
            <div class="bg-white shadow-md border border-blue-600 rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-12 w-12 text-green-600" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M13 16h-1v-4h-1m0-4h.01M12 20h9M3 20h9m-9 0a9 9 0 1118 0" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Konsultasi</h3>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md border border-blue-600 rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="flex justify-center mb-4">
                    <!-- Ikon Lokasi / Maps -->
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-12 w-12 text-green-600" 
                        fill="none" viewBox="0 0 24 24" 
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                        <circle cx="12" cy="9" r="2.5" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Survey Lokasi</h3>
            </div>


            <!-- Card 3 -->
            <div class="bg-white shadow-md border border-blue-600 rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-12 w-12 text-green-600" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zm8 0a3 3 0 100-6 3 3 0 000 6zM2 20v-1a4 4 0 014-4h4a4 4 0 014 4v1m4 0v-1a4 4 0 00-4-4h-1.172a4 4 0 01-2.828-1.172l-.586-.586A1 1 0 019 12h6a1 1 0 01.707.293l.586.586A4 4 0 0119.172 15H20a4 4 0 014 4v1" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Negosiasi</h3>
            </div>


            <!-- Card 4 -->
            <div class="bg-white shadow-md border border-blue-600 rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-12 w-12 text-green-600" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M9.75 3a1 1 0 011 1v1.08a7.97 7.97 0 012.5 0V4a1 1 0 112 0v1.08a8.001 8.001 0 012.17.9l.77-.77a1 1 0 011.42 1.42l-.77.77a8.001 8.001 0 01.9 2.17H20a1 1 0 110 2h-1.08a7.97 7.97 0 010 2.5H20a1 1 0 110 2h-1.08a8.001 8.001 0 01-.9 2.17l.77.77a1 1 0 11-1.42 1.42l-.77-.77a8.001 8.001 0 01-2.17.9V20a1 1 0 11-2 0v-1.08a7.97 7.97 0 01-2.5 0V20a1 1 0 11-2 0v-1.08a8.001 8.001 0 01-2.17-.9l-.77.77a1 1 0 11-1.42-1.42l.77-.77a8.001 8.001 0 01-.9-2.17H4a1 1 0 110-2h1.08a7.97 7.97 0 010-2.5H4a1 1 0 110-2h1.08a8.001 8.001 0 01.9-2.17l-.77-.77a1 1 0 111.42-1.42l.77.77a8.001 8.001 0 012.17-.9V4a1 1 0 011-1zm2.25 6a3 3 0 100 6 3 3 0 000-6z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Pengerjaan</h3>
            </div>


            <!-- Card 5 -->
            <div class="bg-white shadow-md border border-blue-600 rounded-xl p-6 text-center hover:shadow-lg transition">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h-12 w-12 text-green-600" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M16.862 4.487a9.354 9.354 0 0 1 2.65 1.607 9.373 9.373 0 0 1 1.607 2.65 9.389 9.389 0 0 1-10.607 12.87 9.373 9.373 0 0 1-2.65-1.607 9.354 9.354 0 0 1-1.607-2.65 9.389 9.389 0 0 1 10.607-12.87zM12 8.25v7.5m3.75-3.75h-7.5"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Pemasangan</h3>
            </div>

        </div>
    </div>
</section>

<!-- Highlight Proyek Section -->
<section class="max-w-7xl w-full min-h-[22rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col md:flex-row items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
  <div class="max-w-6xl mx-auto px-4 ">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Highlight Proyek</h2>

    <!-- Swiper Container -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @php
          $chunks = $portfolios->chunk(3); // Membagi portfolio menjadi 3 per slide
        @endphp

        @foreach ($chunks as $chunk)
          <div class="swiper-slide">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              @foreach ($chunk as $portfolio)
                <div class="bg-white border rounded-xl shadow-md overflow-hidden">
                  <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" 
                       alt="{{ $portfolio->judul }}" 
                       class="w-full h-56 object-cover">
                  <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $portfolio->judul }}</h3>
                    @if($portfolio->deskripsi)
                      <p class="text-sm text-gray-600 mt-1">{{ $portfolio->deskripsi }}</p>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>

      <!-- Navigasi panah -->
      <div class="swiper-button-next text-blue-600"></div>
      <div class="swiper-button-prev text-blue-600"></div>
    </div>

    <!-- Tombol Lihat Lebih Banyak -->
    <div class="mt-8 items-center text-center">
      <a href="#" 
         class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
        Lihat Lebih Banyak
      </a>
    </div>
  </div>
</section>

<!-- Tagline Section -->
<section class="py-20">
  <div class="max-w-4xl mx-auto text-center px-4">
    <!-- Judul Tagline -->
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-6">
      “Ingin rumah atau tempat usaha Anda tampil modern dan terlindungi?”
    </h2>
    
    <!-- Subtext / Deskripsi -->
    <p class="text-lg md:text-xl text-gray-600">
      Hubungi Kami Sekarang
    </p>
    
    <!-- CTA Buttons -->
    <div class="mt-8 flex justify-center gap-4">
        <!-- WhatsApp Button -->
        <a href="https://wa.me/6281220209566" target="_blank" 
        class="inline-flex items-center bg-green-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition">
            <!-- Icon WhatsApp -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16.6 13.4c-.3-.2-1.6-.8-1.8-.9-.2-.1-.4-.2-.5.2s-.6.9-.8 1.1c-.2.2-.4.3-.7.1s-1.4-.5-2.6-1.6c-1-.9-1.7-2-1.9-2.3s0-.5.1-.7c.1-.2.2-.4.3-.6.1-.2.1-.3 0-.5-.1-.2-.5-1.2-.7-1.6s-.3-.4-.5-.4-.4 0-.6 0c-.2 0-.5.1-.8.3s-1 .9-1 2.2 1 2.6 1.1 2.8c.1.2 1.9 3 4.6 4.2 3 .9 3.1.8 3.6.7.5-.1 1.6-.7 1.8-1.3.2-.6.2-1.1.1-1.3s-.2-.2-.5-.4z"/>
            </svg>
            Whatsapp
        </a>

        <!-- Instagram Button -->
        <a href="https://instagram.com/bintangcanopyofficial" target="_blank" 
        class="inline-flex items-center bg-pink-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-pink-600 transition">
            <!-- Icon Instagram -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.9.2 2.3.4.5.2.8.4 1.1.7.3.3.5.6.7 1.1.2.4.3 1.1.4 2.3.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 1.9-.4 2.3-.2.5-.4.8-.7 1.1-.3.3-.6.5-1.1.7-.4.2-1.1.3-2.3.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.9-.2-2.3-.4-.5-.2-.8-.4-1.1-.7-.3-.3-.5-.6-.7-1.1-.2-.4-.3-1.1-.4-2.3C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.2-1.9.4-2.3.2-.5.4-.8.7-1.1.3-.3.6-.5 1.1-.7.4-.2 1.1-.3 2.3-.4C8.4 2.2 8.8 2.2 12 2.2zm0-2.2C8.7 0 8.3 0 7 .1 5.7.1 4.8.3 4.1.5 3.3.8 2.7 1.2 2.2 1.7c-.5.5-.9 1.1-1.2 1.9-.2.7-.4 1.6-.4 2.9C.3 8.3.3 8.7.3 12s0 3.7.1 5c.1 1.3.3 2.2.5 2.9.3.7.7 1.4 1.2 1.9s1.1.9 1.9 1.2c.7.2 1.6.4 2.9.5 1.3.1 1.7.1 5 .1s3.7 0 5-.1c1.3-.1 2.2-.3 2.9-.5.7-.3 1.4-.7 1.9-1.2s.9-1.1 1.2-1.9c.2-.7.4-1.6.5-2.9.1-1.3.1-1.7.1-5s0-3.7-.1-5c-.1-1.3-.3-2.2-.5-2.9-.3-.7-.7-1.4-1.2-1.9s-1.1-.9-1.9-1.2c-.7-.2-1.6-.4-2.9-.5C15.7 0 15.3 0 12 0z"/>
                <path d="M12 5.8a6.2 6.2 0 1 0 0 12.4 6.2 6.2 0 0 0 0-12.4zm0 10.2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                <circle cx="18.4" cy="5.6" r="1.4"/>
            </svg>
            Instagram
        </a>
    </div>

  </div>
</section>


@endsection
