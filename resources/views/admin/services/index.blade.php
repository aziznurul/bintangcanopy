@extends('admin.layout.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Layanan Bintang Canopy</h1>
</div>

{{-- Alert Success/Error --}}
@if(session('success')) <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
{{ session('success') }} </div>
@endif
@if($errors->any()) <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"> <ul class="list-disc pl-5">
@foreach($errors->all() as $error) <li>{{ $error }}</li>
@endforeach </ul> </div>
@endif

{{-- Form Deskripsi Umum Layanan (ServiceInfo) --}}

<div class="bg-white p-6 rounded shadow mb-6">
    <form action="{{ route('admin.services.updateInfo') }}" method="POST">
        @csrf
        <label class="block font-semibold mb-2">Deskripsi Umum Layanan</label>
        <textarea name="deskripsi" rows="4" class="w-full border rounded p-2" required>{{ old('deskripsi', $info->deskripsi) }}</textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3 hover:bg-blue-600 transition inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Simpan
        </button>
    </form>
</div>

{{-- Form Tambah Layanan Baru (Service) --}}

<div class="bg-white p-6 rounded shadow mb-6">
    <h2 class="font-semibold mb-4">Tambah Layanan Baru</h2>
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Kategori</label>
                <input type="text" name="kategori" class="w-full border rounded p-2" placeholder="Masukkan kategori" required>
            </div>
            <div>
                <label class="block font-medium mb-1">Judul Material</label>
                <input type="text" name="judul_material" class="w-full border rounded p-2" placeholder="Masukkan judul material" required>
            </div>
        </div>
        <div class="mt-4">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2" placeholder="Masukkan deskripsi" required></textarea>
        </div>
        <div class="mt-4">
            <label class="block font-medium mb-1">Foto</label>
            <input type="file" name="foto" class="w-full border rounded p-2" accept="image/*">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4 hover:bg-green-600 transition inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah
        </button>
    </form>
</div>

{{-- Daftar Layanan --}}

<div class="bg-white p-6 rounded shadow">
    <h2 class="font-semibold mb-4">Daftar Layanan</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border px-4 py-2">Foto</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $s)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">
                            @if($s->foto)
                                <img src="{{ Storage::url($s->foto) }}" alt="" class="w-24 h-24 object-cover rounded">
                            @else
                                <span class="text-gray-400 text-sm">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $s->kategori }}</td>
                        <td class="border px-4 py-2">{{ $s->judul_material }}</td>
                        <td class="border px-4 py-2">{{ $s->deskripsi }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST" class="inline delete-service-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" data-id="{{ $s->id }}" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {
        Swal.fire({
            title: 'Yakin hapus layanan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e53e3e',
            cancelButtonColor: '#a0aec0',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit();
            }
        });
    });
});
</script>

@endsection
