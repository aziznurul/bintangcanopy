@extends('layouts.app')

@section('content')



<!-- Section: Sejarah Singkat -->
<section id="sejarah" class="max-w-7xl w-full min-h-[20rem] shadow-sm border border-blue-600 rounded-[5px] flex flex-col md:flex-row items-stretch justify-center px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <div class="w-full mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Sejarah Singkat</h2>
        <p class="text-lg leading-relaxed text-gray-700" style="font-family: 'Poppins', sans-serif;">
            {{ $about->sejarah_singkat ?? 'Belum ada data sejarah singkat yang tersedia.' }}
        </p>
    </div>
</section>

<!-- Section: Visi, Misi, dan Tagline -->
<section id="visi-misi" class="max-w-7xl w-full min-h-[20rem] shadow-sm border border-blue-600 rounded-[5px] px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Visi, Misi, dan Tagline</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Kolom Kiri: Visi + Tagline -->
        <div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Visi</h3>
            <p class="text-lg leading-relaxed text-gray-700 mb-8" style="font-family: 'Poppins', sans-serif;">
                {{ $about->visi ?? 'Belum ada data visi yang tersedia.' }}
            </p>

            <p class="text-lg italic text-gray-600" style="font-family: 'Poppins', sans-serif;">
                “{{ $about->tagline ?? 'Belum ada tagline yang tersedia.' }}”
            </p>
        </div>

        <!-- Kolom Kanan: Misi -->
        <div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Misi</h3>
            <p class="text-lg leading-relaxed text-gray-700" style="font-family: 'Poppins', sans-serif;">
                {{ $about->misi ?? 'Belum ada data misi yang tersedia.' }}
            </p>
        </div>
    </div>
</section>


<!-- Section: Struktur Organisasi -->
<section id="struktur" class="max-w-7xl w-full min-h-[20rem] shadow-sm border border-blue-600 rounded-[5px] px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Struktur</h2>

    @if($struktur && $struktur->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($struktur as $org)
                <div class="bg-white text-center p-6 border border-gray-200 rounded-xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <img 
                        src="{{ asset('storage/' . $org->foto) }}" 
                        alt="{{ $org->nama }}" 
                        class="mx-auto rounded-full w-32 h-32 object-cover mb-4 border-4 border-green-500"
                    >
                    <h4 class="text-xl font-semibold text-gray-800">{{ $org->nama }}</h4>
                    <p class="text-gray-500 text-base">{{ $org->jabatan }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500 text-lg">Belum ada data struktur organisasi.</p>
    @endif
</section>


<!-- Section: Statistik Proyek dan Mitra -->
<section id="statistik" class="max-w-7xl w-full min-h-[15rem] shadow-sm border border-blue-600 rounded-[5px] px-6 md:px-16 mx-auto mt-8 py-10 bg-white overflow-hidden">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">
        Statistik Proyek & Mitra
    </h2>

    @if($about)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-center">
            <div class="p-8 bg-blue-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <h4 class="counter text-4xl font-extrabold text-blue-700 mb-2" data-target="{{ intval($about->jumlah_proyek ?? 0) }}" style="font-family: 'Space Grotesk', sans-serif;">0</h4>
                <p class="text-lg text-gray-700 font-medium" style="font-family: 'Poppins', sans-serif;">Proyek</p>
            </div>

            <div class="p-8 bg-green-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <h4 class="counter text-4xl font-extrabold text-green-700 mb-2" data-target="{{ intval($about->jumlah_mitra ?? 0) }}" style="font-family: 'Space Grotesk', sans-serif;">0</h4>
                <p class="text-lg text-gray-700 font-medium" style="font-family: 'Poppins', sans-serif;">Mitra</p>
            </div>

            <div class="p-8 bg-yellow-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <h4 class="counter text-4xl font-extrabold text-yellow-700 mb-2" data-target="{{ intval($about->persentase_pengerjaan ?? 0) }}" style="font-family: 'Space Grotesk', sans-serif;">0</h4>
                <p class="text-lg text-gray-700 font-medium" style="font-family: 'Poppins', sans-serif;">Pekerjaan Selesai (%)</p>
            </div>
        </div>
    @else
        <p class="text-center text-gray-500 text-lg">Belum ada data statistik yang tersedia.</p>
    @endif
</section>

<!-- Script Animasi Counter -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".counter");
    const speed = 100; // Semakin kecil, semakin cepat

    const animateCounters = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute("data-target");
            const updateCount = () => {
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    // Gunakan IntersectionObserver agar animasi hanya berjalan saat terlihat
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.disconnect(); // Jalankan hanya sekali
            }
        });
    });

    observer.observe(document.querySelector("#statistik"));
});
</script>





@endsection
