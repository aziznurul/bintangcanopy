@extends('admin.layout.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-6">Kelola Mitra</h1>

    {{-- Deskripsi Mitra --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-2">Deskripsi Mitra</h2>
        <form action="{{ route('admin.mitra.updateDeskripsi') }}" method="POST">
            @csrf
            <textarea name="deskripsi" rows="4" class="w-full border rounded p-2" required>{{ $deskripsi->deskripsi ?? '' }}</textarea>
            <button type="submit" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Deskripsi</button>
        </form>
    </div>

    {{-- Tambah Mitra --}}
    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-2">Tambah Mitra</h2>
        <form action="{{ route('admin.mitra.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="text" name="nama" placeholder="Nama Mitra" class="w-full border rounded p-2" required>
            <input type="file" name="logo" class="w-full border rounded p-2" required>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Mitra</button>
        </form>
    </div>

    {{-- Daftar Mitra --}}
    <h2 class="text-xl font-semibold mb-4">Daftar Mitra</h2>
    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Logo</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mitras as $mitra)
            <tr>
                <td class="border px-4 py-2 text-center">
                    <img src="{{ asset('storage/'.$mitra->logo) }}" alt="{{ $mitra->nama }}" class="h-12 mx-auto">
                </td>
                <td class="border px-4 py-2">{{ $mitra->nama }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    {{-- Edit --}}
                    <form action="{{ route('admin.mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data" class="inline-block">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nama" value="{{ $mitra->nama }}" class="border rounded p-1 w-40 mb-1">
                        <input type="file" name="logo" class="border rounded p-1 w-40 mb-1">
                        <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded">Update</button>
                    </form>

                    {{-- Hapus --}}
                    <form action="{{ route('admin.mitra.destroy', $mitra->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus mitra ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
