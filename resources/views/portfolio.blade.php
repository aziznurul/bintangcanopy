@extends('layouts.app')

@section('content')

<!-- Section: portfolio / Info Portfolio -->

<section id="portfolio" class="bg-gradient-to-t from-blue-100 to-slate-50 max-w-7xl w-full min-h-[18rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 overflow-hidden">
    <div class="w-full mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Portfolio Kami</h2>
        <p class="text-lg leading-relaxed text-gray-700" style="font-family: 'Poppins', sans-serif;">
            {{ $info->deskripsi ?? 'Belum ada data sejarah singkat yang tersedia.' }}
        </p>
    </div>
</section>

<!-- Section: Filter & Search -->

<section id="portfolio-filter" class="w-full min-h-[8rem] rounded-[5px] flex flex-col items-stretch justify-center px-6 md:px-16 mx-auto py-10 bg-white overflow-hidden">
    <form action="{{ route('portfolio') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4">
        <!-- Search -->
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Cari portfolio..." 
               class="w-full md:w-1/2 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">


    <!-- Filter kategori -->
    <select name="kategori" class="w-full md:w-1/4 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        <option value="">Semua Kategori</option>
        @foreach($categories as $category)
            <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>
                {{ $category }}
            </option>
        @endforeach
    </select>

    <!-- Submit -->
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
        Filter
    </button>
</form>


</section>

<!-- Section 2: Grid Portofolio -->

<section id="portfolio-grid" class="max-w-7xl w-full min-h-[18rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($portfolios as $portfolio)
        <a href="{{ route('portfolio.show', $portfolio->id) }}" 
           class="relative block rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
            <!-- Thumbnail -->
            <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" 
                 alt="{{ $portfolio->judul }}" 
                 class="w-full h-64 object-cover">


        <!-- Overlay Judul -->
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-60 text-white text-center py-2">
            <h3 class="text-lg font-semibold">{{ $portfolio->judul }}</h3>
        </div>
    </a>
    @endforeach
</div>

<!-- Tombol Lebih Banyak -->
<div class="mt-6 text-center">
    @if($portfolios->hasMorePages())
    <a href="{{ $portfolios->nextPageUrl() }}" 
       class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded transition">
        Lebih Banyak
    </a>
    @endif
</div>

</section>

<!-- Section: Video Dokumentasi Proyek -->
<section id="video-dokumentasi" class="max-w-7xl w-full mx-auto mt-12 px-6 md:px-16 py-10 bg-white border border-blue-600 rounded-[10px] shadow-md">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">
        Video Dokumentasi Proyek
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Kiri: Video Terbaru -->
        <div class="md:col-span-2">
            @if($latestVideo)
                <div class="aspect-[16/9] rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                    <iframe 
                        src="https://www.youtube.com/embed/{{ $latestVideo['id']['videoId'] ?? '' }}" 
                        frameborder="0" 
                        allowfullscreen
                        class="w-full h-full rounded-xl">
                    </iframe>
                </div>
                <h3 class="text-xl font-semibold mt-3 text-gray-800 leading-tight">
                    {{ $latestVideo['snippet']['title'] ?? 'Video tanpa judul' }}
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    {{ \Carbon\Carbon::parse($latestVideo['snippet']['publishedAt'])->translatedFormat('d F Y') }}
                </p>
            @else
                <p class="text-gray-500">Belum ada video terbaru.</p>
            @endif
        </div>

        <!-- Kanan: Video Sebelumnya -->
        <div class="flex flex-col gap-6">
            @if(!empty($otherVideos))
                @foreach($otherVideos as $video)
                    <div class="group">
                        <div class="aspect-[16/9] rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                            <iframe 
                                src="https://www.youtube.com/embed/{{ $video['id']['videoId'] ?? '' }}" 
                                frameborder="0" 
                                allowfullscreen
                                class="w-full h-full rounded-lg">
                            </iframe>
                        </div>
                        <h4 class="text-base font-semibold mt-2 text-gray-800 group-hover:text-blue-600 transition">
                            {{ $video['snippet']['title'] ?? 'Video tanpa judul' }}
                        </h4>
                        <p class="text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($video['snippet']['publishedAt'])->translatedFormat('d F Y') }}
                        </p>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500">Belum ada video sebelumnya.</p>
            @endif
        </div>
    </div>
</section>


<!-- Section: Call to Action -->
<section id="call-to-action" class="max-w-7xl w-full mx-auto mt-16 px-6 md:px-16 py-12 bg-gradient-to-r from-green-600 to-blue-600 rounded-[10px] text-white text-center shadow-lg">
    <h2 class="text-3xl font-bold mb-4">Ingin Berkolaborasi atau Berdiskusi Proyek?</h2>
    <p class="text-lg mb-8 max-w-2xl mx-auto text-blue-50 leading-relaxed">
        Kami terbuka untuk kerja sama, diskusi ide, dan pengembangan proyek bersama. 
        Hubungi kami melalui WhatsApp untuk memulai percakapan dan wujudkan inovasi bersama!
    </p>

    <a href="https://wa.me/{{ $social->whatsapp ?? '6281234567890' }}" 
       target="_blank"
       class="inline-flex items-center gap-2 bg-white text-green-700 font-semibold px-6 py-3 rounded-full shadow-md hover:bg-green-50 hover:scale-105 transition-transform">
        <!-- WhatsApp Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" 
             fill="currentColor" 
             viewBox="0 0 24 24" 
             class="w-6 h-6 text-green-600">
            <path d="M20.52 3.48A11.73 11.73 0 0 0 12.06 0C5.49 0 .14 5.35.14 11.92a11.87 11.87 0 0 0 1.64 6l-1.05 3.86 3.94-1A11.8 11.8 0 0 0 12 23.84h.06c6.57 0 11.92-5.35 11.92-11.92A11.83 11.83 0 0 0 20.52 3.48Zm-8.46 18a9.83 9.83 0 0 1-5-1.38l-.36-.21-2.93.74.78-2.85-.24-.37a9.9 9.9 0 0 1-1.51-5.24c0-5.46 4.45-9.91 9.91-9.91a9.9 9.9 0 0 1 9.9 9.91c0 5.46-4.45 9.91-9.9 9.91Zm5.43-7.41c-.3-.15-1.78-.88-2.05-.98s-.48-.15-.68.15-.78.98-.95 1.18-.35.22-.65.07a8.07 8.07 0 0 1-2.37-1.46 8.88 8.88 0 0 1-1.64-2.04c-.17-.3 0-.46.13-.61.13-.13.3-.35.45-.52s.2-.3.3-.5a.55.55 0 0 0 0-.52c-.07-.15-.68-1.64-.93-2.26s-.48-.52-.68-.52h-.52a.98.98 0 0 0-.68.3 2.89 2.89 0 0 0-.9 2.15c0 1.26.93 2.48 1.05 2.65s1.83 2.78 4.42 3.9a14.6 14.6 0 0 0 1.43.52c.6.2 1.15.17 1.58.1.48-.07 1.48-.6 1.69-1.18.2-.58.2-1.08.15-1.18s-.26-.15-.55-.3Z"/>
        </svg>
        Hubungi via WhatsApp
    </a>
</section>

@endsection
