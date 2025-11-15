@extends('layouts.app')

@section('content')



<!-- Section: Layanan -->
<section id="layanan" class="bg-gradient-to-t from-blue-100 to-slate-50 max-w-7xl w-full min-h-[18rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col md:flex-row items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 overflow-hidden">
    <div class="w-full mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Layanan Kami</h2>
        <p class="text-lg leading-relaxed text-gray-700" style="font-family: 'Poppins', sans-serif;">
            {{ $serviceinfo->deskripsi ?? 'Belum ada data sejarah singkat yang tersedia.' }}
        </p>
    </div>
</section>

<!-- Section: Daftar Layanan -->

<section id="daftar-layanan" class="max-w-7xl w-full min-h-[18rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    @foreach($services as $service)
    <div class="flex flex-col md:flex-row bg-white border border-gray-200 rounded-[10px] shadow-sm overflow-hidden hover:shadow-md transition duration-300 ease-in-out mb-10">
        <!-- Kiri: Gambar dengan Overlay Kategori di Kanan Atas -->
        <div class="md:w-1/3 w-full relative flex items-center justify-center">
            <img src="{{ asset('storage/' . $service->foto) }}" 
                 alt="{{ $service->judul_material }}" 
                 class="object-cover w-full h-64 md:h-full">

            <!-- Overlay Kategori -->
            <div class="absolute top-2 right-2">
                <span class="text-white text-sm font-semibold px-3 py-1 bg-green-600 bg-opacity-90 rounded-full shadow-md">
                    {{ $service->kategori }}
                </span>
            </div>
        </div>

        <!-- Kanan: Deskripsi dan CTA -->
        <div class="md:w-2/3 w-full flex flex-col justify-center p-6 space-y-4">
            <h3 class="text-xl font-semibold text-gray-800">{{ $service->kategori }}</h3>
            <p class="text-gray-700 text-base leading-relaxed">
                <span class="font-semibold">Material:</span> {{ $service->judul_material }} <br>
                {{ $service->deskripsi }}
            </p>
            <div>
                <a href="https://wa.me/6281220209566" target="_blank" 
                class="inline-flex items-center space-x-2 bg-white text-black border border-green-600 px-4 py-2 rounded hover:bg-green-600 transition max-w-max"> <img src="{{ asset('asset/images/whatsapp.png') }}" alt="WhatsApp" class="w-5 h-5"> <span>Konsultasi Sekarang</span> </a>
            </div>
        </div>

    </div>
    @endforeach

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


@endsection
