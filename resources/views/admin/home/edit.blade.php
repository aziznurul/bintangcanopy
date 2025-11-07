{{-- resources/views/admin/home/edit.blade.php --}}
@extends('admin.layout.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white rounded-xl p-8 mt-10 border border-blue-300">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Slide</h2>

    <form action="{{ route('admin.home.update', $homeSlide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-5">
            <label for="title" class="block text-gray-700 font-medium mb-2">Judul</label>
            <input type="text" name="title" id="title"
                value="{{ old('title', $homeSlide->title) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Deskripsi --}}
        <div class="mb-5">
            <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $homeSlide->description) }}</textarea>
        </div>

        {{-- Upload Gambar Modern --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Gambar</label>

            <div
                class="relative flex flex-col items-center justify-center w-full p-6 border-2 border-dashed rounded-xl cursor-pointer hover:bg-gray-50 transition group">
                <input type="file" name="image" id="imageUpload"
                    class="absolute inset-0 opacity-0 cursor-pointer"
                    accept="image/*"
                    onchange="previewImage(event)">
                <div class="text-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10 text-gray-400 mb-2 group-hover:text-blue-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16V4m0 0L3 8m4-4l4 4M21 16v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                    </svg>
                    <p class="text-gray-600 font-medium">Klik untuk mengunggah gambar baru</p>
                    <p class="text-sm text-gray-400">PNG, JPG — maksimal 2MB</p>
                </div>
            </div>

            {{-- Preview Gambar Baru --}}
            <div class="mt-4">
                <p class="text-gray-600 text-sm mb-1">Pratinjau gambar baru:</p>
                <img id="preview" class="hidden w-40 h-40 object-cover rounded-lg border shadow">
            </div>

            {{-- Gambar Saat Ini --}}
            @if ($homeSlide->image)
                <div class="mt-4">
                    <p class="text-gray-600 text-sm mb-1">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $homeSlide->image) }}" class="w-40 h-40 object-cover rounded-lg border shadow">
                </div>
            @endif
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('admin.home.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

{{-- SweetAlert Error --}}
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            });
        });
    </script>
@endif

{{-- Script Preview Gambar --}}
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
