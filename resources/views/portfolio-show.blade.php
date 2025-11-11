@extends('layouts.app')

@section('content')

<section id="portfolio-show" class="max-w-7xl mx-auto px-6 md:px-16 py-12">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="{{ route('portfolio') }}" 
        class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded transition">
            &larr; Kembali ke Portfolio
        </a>
    </div>

    <!-- Judul Portfolio -->
    <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $portfolio->judul }}</h2>

    <!-- Slideshow Foto dengan Thumbnail Kotak Kecil -->
    @if($portfolio->photos->count() > 0)
    <div class="mb-8">
        <div class="swiper main-swiper h-96 rounded-lg overflow-hidden mb-4">
            <div class="swiper-wrapper">
                @foreach($portfolio->photos as $photo)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $photo->foto) }}" 
                        alt="{{ $portfolio->judul }}" 
                        class="w-full h-96 object-cover rounded-lg">
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @else
    <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" 
        alt="{{ $portfolio->judul }}" 
        class="w-full h-96 object-cover rounded-lg mb-8">
    @endif

    <!-- Detail Portfolio -->
    <div class="bg-white shadow-md border border-blue-600 rounded-lg p-6 space-y-4 mb-12">
        <p><span class="font-semibold">Jenis Pekerjaan:</span> {{ $portfolio->jenis_pekerjaan }}</p>
        <p><span class="font-semibold">Kategori:</span> {{ $portfolio->kategori }}</p>
        <p><span class="font-semibold">Lokasi:</span> {{ $portfolio->lokasi }}</p>
        <p><span class="font-semibold">Nama Klien:</span> {{ $portfolio->nama_klien }}</p>
        <p><span class="font-semibold">Deskripsi:</span> {{ $portfolio->deskripsi }}</p>
    </div>

    <!-- Section: Portfolio Lainnya -->
    <div class="mb-12">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Portfolio Lainnya</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($relatedPortfolios as $item)
            <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
                <a href="{{ route('portfolio.show', $item->id) }}">
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-gray-800 font-semibold truncate">{{ $item->judul }}</h4>
                        <p class="text-sm text-gray-500 truncate">{{ $item->kategori }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const thumbSwiper = new Swiper('.thumb-swiper', {
        spaceBetween: 10,
        slidesPerView: 'auto',
        freeMode: true,
        watchSlidesProgress: true,
    });

    const mainSwiper = new Swiper('.main-swiper', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        thumbs: {
            swiper: thumbSwiper
        }
    });
</script>
@endpush

@endsection
