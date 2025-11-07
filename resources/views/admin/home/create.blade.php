@extends('admin.layout.app')

@section('content')

<div class="container mx-auto p-6">

<h1 class="text-2xl font-bold mb-6">Tambah Slide Baru</h1>

<form action="{{ route('admin.home.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded border border-blue-500">
    @csrf

    {{-- Judul --}}
    <div class="mb-4">
        <label class="block font-medium mb-1">Judul</label>
        <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="mb-4">
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="description" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Upload Gambar --}}
    <div class="mb-6" x-data="{ preview: null }">
        <label class="block font-semibold mb-2 text-gray-800">Upload Gambar</label>

        {{-- Custom Upload Box --}}
        <div 
            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer bg-gray-50 hover:bg-gray-100 transition"
            @click="$refs.image.click()"
        >
            <template x-if="!preview">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-600">Klik atau seret gambar ke sini</p>
                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG | Maks: 2MB</p>
                </div>
            </template>

            {{-- Preview --}}
            <template x-if="preview">
                <div class="relative inline-block">
                    <img :src="preview" class="mx-auto w-40 h-40 object-cover rounded-lg shadow-md border border-gray-200">
                    <button 
                        type="button" 
                        @click="preview = null; $refs.image.value = ''"
                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full px-2 py-0.5 text-xs hover:bg-red-600"
                    >
                        ✕
                    </button>
                </div>
            </template>

            <input 
                type="file" 
                name="image" 
                x-ref="image"
                accept="image/*"
                class="hidden"
                @change="const file = $event.target.files[0]; if(file){ preview = URL.createObjectURL(file); }"
            >
        </div>

        {{-- SweetAlert untuk Error --}}
        @if ($errors->has('image'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Gagal',
                        text: '{{ $errors->first('image') }}',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Oke'
                    });
                });
            </script>
        @endif
    </div>


    {{-- Tombol --}}

    <div class="flex space-x-4 mt-4">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Simpan</button>
        <a href="{{ route('admin.home.index') }}" class=" bg-green-500 text-white px-4 py-2 border rounded hover:bg-green-600 transition">Batal</a>
    </div>

</form>

</div>
@endsection
