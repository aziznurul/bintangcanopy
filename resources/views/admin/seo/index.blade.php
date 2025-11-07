@extends('admin.layout.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md max-w-5xl mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Pengaturan SEO</h1>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>
    @endif

    <form action="{{ route('admin.seo.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $seo->meta_title ?? '') }}"
                   class="w-full border-gray-300 rounded p-2">
        </div>

        <div>
            <label class="block font-medium mb-1">Meta Description</label>
            <textarea name="meta_description" rows="3"
                      class="w-full border-gray-300 rounded p-2">{{ old('meta_description', $seo->meta_description ?? '') }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Meta Keywords</label>
            <textarea name="meta_keywords" rows="2"
                      class="w-full border-gray-300 rounded p-2">{{ old('meta_keywords', $seo->meta_keywords ?? '') }}</textarea>
            <p class="text-sm text-gray-500 mt-1">Pisahkan dengan koma, misalnya: sinergantara, inovasi, governance</p>
        </div>

        <hr class="my-4">

        <div>
            <label class="block font-medium mb-1">OG Title (Social Share)</label>
            <input type="text" name="og_title" value="{{ old('og_title', $seo->og_title ?? '') }}"
                   class="w-full border-gray-300 rounded p-2">
        </div>

        <div>
            <label class="block font-medium mb-1">OG Description</label>
            <textarea name="og_description" rows="3"
                      class="w-full border-gray-300 rounded p-2">{{ old('og_description', $seo->og_description ?? '') }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">OG Image</label>
            @if(!empty($seo->og_image))
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $seo->og_image) }}" alt="OG Image" class="h-24 rounded shadow">
                </div>
            @endif
            <input type="file" name="og_image" class="w-full border-gray-300 rounded p-2">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
