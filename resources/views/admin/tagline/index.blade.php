@extends('admin.layout.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Pengaturan Tagline</h2>

    @if (session('success'))
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

    <form action="{{ route('admin.tagline.update', $tagline->id ?? 1) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" 
                   value="{{ old('judul', $tagline->judul ?? '') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2" rows="3">{{ old('deskripsi', $tagline->deskripsi ?? '') }}</textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
