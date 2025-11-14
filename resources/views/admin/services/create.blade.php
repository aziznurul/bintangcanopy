@extends('admin.layout.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Tambah Layanan Baru</h1>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded shadow max-w-5xl">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium mb-1">Kategori</label>
            <input type="text" name="kategori" class="w-full border rounded p-2" placeholder="Masukkan kategori" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Judul Material</label>
            <input type="text" name="judul_material" class="w-full border rounded p-2" placeholder="Masukkan judul material" required>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border rounded p-2" placeholder="Masukkan deskripsi" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Foto</label>
            <input type="file" name="foto" class="w-full border rounded p-2" accept="image/*">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
        <a href="{{ route('admin.services.index') }}" class="ml-2 text-gray-700 hover:underline">Batal</a>
    </form>
</div>
@endsection
