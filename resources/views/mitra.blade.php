@extends('layouts.app')

@section('content')

<!-- Section: Deskripsi Cabang & Mitra -->

<section id="mitra-deskripsi" class="max-w-7xl mx-auto px-6 md:px-16 py-10 bg-white border border-blue-600 rounded-[5px] shadow-sm mt-8">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-6">Tentang Cabang & Mitra</h2>
    <p class="text-gray-700 text-lg">
        {{ $cabangInfo->deskripsi ?? 'Belum ada deskripsi tersedia.' }}
    </p>
</section>

<!-- Section: Daftar Mitra -->

<section id="mitra-list" class="max-w-7xl mx-auto px-6 md:px-16 py-10 bg-white border border-blue-600 rounded-[5px] shadow-sm mt-8">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-6">Mitra Kami</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
        @foreach($mitras as $mitra)
            <div class="flex flex-col items-center text-center p-4 border border-gray-200 rounded-lg shadow hover:shadow-md transition">
                <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->nama }}" class="w-24 h-24 object-contain mb-3">
            </div>
        @endforeach
    </div>
</section>

<!-- Section: Kantor Pusat -->

<section id="kantor-pusat" class="max-w-7xl mx-auto px-6 md:px-16 py-10 bg-white border border-blue-600 rounded-[5px] shadow-sm mt-8">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-6">Kantor Pusat</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kiri: Informasi Kontak -->
        <div class="space-y-3">
            <p><span class="font-semibold">Alamat:</span> {{ $kantor['alamat'] }}</p>
            <p><span class="font-semibold">Telepon:</span> {{ $kantor['telepon'] }}</p>
            <p><span class="font-semibold">Email:</span> {{ $kantor['email'] }}</p>
        </div>
        <!-- Kanan: Maps -->

        <div class="w-full rounded-lg overflow-hidden shadow-md">
            <div class="relative" style="padding-bottom: 56.25%; height: 0;">
                <iframe 
                    src="{{ $kantor['maps'] }}" 
                    class="absolute top-0 left-0 w-full h-full border-0 rounded-lg" 
                    allowfullscreen 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</section>

<!-- Section: Call to Action -->

<section id="call-to-action" class="max-w-7xl mx-auto px-6 md:px-16 py-10 bg-green-50 border border-green-400 rounded-[5px] shadow-sm mt-8 text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Cabang & Mitra di Seluruh Indonesia</h2>
    <p class="text-gray-700 mb-6">Kami bekerja sama dengan lebih dari 30 mitra resmi di berbagai kota untuk memastikan kualitas layanan dan hasil kerja seragam di seluruh wilayah Indonesia</p>
    <a href="https://wa.me/{{ $contact['wa'] }}?text={{ urlencode($contact['pesan']) }}" target="_blank"
       class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded transition">
        Hubungi via WhatsApp
    </a>
</section>

@endsection
