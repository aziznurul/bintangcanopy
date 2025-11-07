@extends('admin.layout.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Pengaturan Sosial Media</h1>

<form action="{{ route('admin.social_media.update', $social->id) }}" method="POST" class="space-y-4">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kiri: WhatsApp & Instagram -->
        <div class="space-y-4">
            <div>
                <label class="block font-medium mb-1">WhatsApp</label>
                <input type="text" name="whatsapp" 
                       value="{{ old('whatsapp', $social->whatsapp) }}" 
                       placeholder="081234567890" 
                       class="w-full border-gray-300 rounded-md p-2">
                @error('whatsapp')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Instagram</label>
                <input type="text" name="instagram" 
                       value="{{ old('instagram', $social->instagram) }}" 
                       placeholder="@bintangcanopyofficial" 
                       class="w-full border-gray-300 rounded-md p-2">
                @error('instagram')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Kanan: TikTok & YouTube -->
        <div class="space-y-4">
            <div>
                <label class="block font-medium mb-1">TikTok</label>
                <input type="text" name="tiktok" 
                       value="{{ old('tiktok', $social->tiktok) }}" 
                       placeholder="@bintangcanopyofficial" 
                       class="w-full border-gray-300 rounded-md p-2">
                @error('tiktok')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">YouTube</label>
                <input type="text" name="youtube" 
                       value="{{ old('youtube', $social->youtube) }}" 
                       placeholder="@bintangcanopyofficial" 
                       class="w-full border-gray-300 rounded-md p-2">
                @error('youtube')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>
    </div>
</form>


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
