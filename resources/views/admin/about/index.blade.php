@extends('admin.layout.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">About Page</h1>
    <a href="{{ route('admin.about.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Edit About</a>
</div>

<div class="bg-white p-6 rounded-lg shadow-md border border-blue-600">
    <h2 class="text-xl font-semibold mb-2">Sejarah Singkat</h2>
    <p>{{ $about->sejarah_singkat ?? '-' }}</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">Visi</h2>
    <p>{{ $about->visi ?? '-' }}</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">Misi</h2>
    <p>{{ $about->misi ?? '-' }}</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">Tagline</h2>
    <p class="italic text-gray-600">“{{ $about->tagline ?? '-' }}”</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">Struktur Organisasi</h2>
    <form action="{{ route('admin.organization.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <div class="grid grid-cols-3 gap-4">
            <input type="file" name="foto" class="border rounded p-2">
            <input type="text" name="nama" placeholder="Nama" class="border rounded p-2" required>
            <input type="text" name="jabatan" placeholder="Jabatan" class="border rounded p-2" required>
        </div>
        <button type="submit" class="mt-3 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah</button>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($structures as $person)
            <div class="text-center border rounded-lg p-4 shadow-sm relative">
                <img src="{{ Storage::url($person->foto) }}" alt="{{ $person->nama }}" class="w-24 h-24 mx-auto rounded-full mb-2 object-cover">
                <h3 class="font-semibold">{{ $person->nama }}</h3>
                <p class="text-gray-500 text-sm">{{ $person->jabatan }}</p>
                    <form action="{{ route('admin.organization.destroy', $person->id) }}" 
                        method="POST" 
                        class="absolute top-2 right-2 delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="text-red-500 hover:text-red-700 text-sm delete-btn">✕</button>
                    </form>
            </div>
        @endforeach
    </div>

    <h2 class="text-xl font-semibold mt-6 mb-2">Deskripsi Struktur</h2>
    <p>{{ $about->deskripsi_struktur ?? '-' }}</p>

    <div class="grid grid-cols-3 text-center mt-8">
        <div>
            <p class="text-3xl font-bold text-blue-600">{{ $about->jumlah_proyek ?? 0 }}</p>
            <p class="text-gray-500">Proyek</p>
        </div>
        <div>
            <p class="text-3xl font-bold text-blue-600">{{ $about->jumlah_mitra ?? 0 }}</p>
            <p class="text-gray-500">Mitra</p>
        </div>
        <div>
            <p class="text-3xl font-bold text-blue-600">{{ ceil($about->persentase_pengerjaan ?? 0) }} %</p>
            <p class="text-gray-500">Pengerjaan</p>
        </div>
    </div>
</div>
@endsection
