@extends('admin.layout.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Portfolio</h1>
</div>

{{-- Alert Success/Error --}}
@if(session('success')) <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
{{ session('success') }} </div>
@endif
@if($errors->any()) <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"> <ul class="list-disc pl-5">
@foreach($errors->all() as $error) <li>{{ $error }}</li>
@endforeach </ul> </div>
@endif

{{-- Deskripsi Portfolio (PortfolioInfo) --}}

<div class="bg-white p-6 rounded shadow mb-6">
    <form action="{{ route('admin.portfolio.updateInfo') }}" method="POST">
        @csrf
        <label class="block font-semibold mb-2">Deskripsi Umum Portfolio</label>
        <textarea name="deskripsi" rows="4" class="w-full border rounded p-2">{{ old('deskripsi', $info->deskripsi ?? '') }}</textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3 hover:bg-blue-600 transition inline-flex items-center">
            Simpan
        </button>
    </form>
</div>

{{-- Tambah Portfolio Baru --}}

<div class="bg-white p-6 rounded shadow mb-6">
    <h2 class="font-semibold mb-4">Tambah Portfolio Baru</h2>
    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium mb-1">Judul</label>
                <input type="text" name="judul" class="w-full border rounded p-2" placeholder="Masukkan judul">
            </div>
            <div>
                <label class="block font-medium mb-1">Jenis Pekerjaan</label>
                <input type="text" name="jenis_pekerjaan" class="w-full border rounded p-2" placeholder="Masukkan jenis pekerjaan">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block font-medium mb-1">Kategori</label>
                <select name="kategori" class="w-full border rounded p-2">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Lokasi</label>
                <input type="text" name="lokasi" class="w-full border rounded p-2" placeholder="Masukkan lokasi">
            </div>
        </div>
        <div class="mt-4">
            <label class="block font-medium mb-1">Nama Klien</label>
            <input type="text" name="nama_klien" class="w-full border rounded p-2" placeholder="Masukkan nama klien">
        </div>
        <div class="mt-4">
            <label class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded p-2" placeholder="Masukkan deskripsi"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block font-medium mb-1">Thumbnail</label>
                <input type="file" name="thumbnail" class="w-full border rounded p-2">
            </div>
            <div class="mt-4">
                <label class="block font-medium mb-1">Foto Lainnya</label>
                <div id="foto-container">
                    <div class="mb-2 flex items-center gap-2">
                        <input type="file" name="foto[]" class="w-full border rounded p-2">
                        <button type="button" class="bg-blue-500 text-white px-2 py-1 rounded btn-add">+</button>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const container = document.getElementById('foto-container');

                    container.addEventListener('click', function(e) {
                        if (e.target.classList.contains('btn-add')) {
                            const div = document.createElement('div');
                            div.classList.add('mb-2', 'flex', 'items-center', 'gap-2');
                            div.innerHTML = `
                                <input type="file" name="foto[]" class="w-full border rounded p-2">
                                <button type="button" class="bg-red-500 text-white px-2 py-1 rounded btn-remove">-</button>
                            `;
                            container.appendChild(div);
                        }

                        if (e.target.classList.contains('btn-remove')) {
                            e.target.parentElement.remove();
                        }
                    });
                });
                </script>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-4 hover:bg-green-600 transition inline-flex items-center">
            Tambah
        </button>
    </form>
</div>

{{-- Daftar Portfolio --}}

<div class="bg-white p-6 rounded shadow">
    <h2 class="font-semibold mb-4">Daftar Portfolio</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border px-4 py-2">Thumbnail</th>
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Jenis Pekerjaan</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Lokasi</th>
                    <th class="border px-4 py-2">Klien</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">
                            @if($p->thumbnail)
                                <img src="{{ Storage::url($p->thumbnail) }}" class="w-24 h-24 object-cover rounded">
                            @else
                                <span class="text-gray-400 text-sm">Tidak ada thumbnail</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $p->judul }}</td>
                        <td class="border px-4 py-2">{{ $p->jenis_pekerjaan }}</td>
                        <td class="border px-4 py-2">{{ $p->kategori }}</td>
                        <td class="border px-4 py-2">{{ $p->lokasi }}</td>
                        <td class="border px-4 py-2">{{ $p->nama_klien }}</td>
                        <td class="border px-4 py-2">{{ $p->deskripsi }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ route('admin.portfolio.destroy', $p->id) }}" method="POST" class="inline delete-portfolio-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" data-id="{{ $p->id }}" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm btn-delete">Hapus</button>
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
            title: 'Yakin hapus portfolio ini?',
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
