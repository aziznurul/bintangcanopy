@extends('admin.layout.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Ganti Logo</h1>

    <form action="{{ route('admin.logo.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            @if($logo->path)
                <img src="{{ asset('storage/' . $logo->path) }}" class="h-20 mb-2" alt="Logo Saat Ini">
            @else
                <p class="text-gray-500">Belum ada logo</p>
            @endif
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Upload Logo Baru</label>
            <input type="file" name="logo" accept="image/*" class="w-full border p-2 rounded">
            @error('logo')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan Logo
        </button>
    </form>
</div>

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
@endsection
