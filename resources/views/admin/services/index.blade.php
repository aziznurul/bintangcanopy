@extends('admin.layout.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Layanan Bintang Canopy</h1>
    <a href="{{ route('admin.services.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Layanan</a>
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

{{-- Form Deskripsi Umum --}}
<div class="bg-white p-6 rounded shadow mb-6">
    <form action="{{ route('admin.services.updateInfo') }}" method="POST">
        @csrf
        <label class="block font-semibold mb-2">Deskripsi Umum Layanan</label>
        <textarea name="deskripsi" rows="4" class="w-full border rounded p-2" required>{{ old('deskripsi', $info->deskripsi ?? '') }}</textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-3 hover:bg-blue-600">Simpan</button>
    </form>
</div>

<div class="bg-white p-6 rounded shadow overflow-x-auto">
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
            @foreach($services as $s)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">
                    @if($s->foto)
                        <img src="{{ Storage::url($s->foto) }}" class="w-24 h-24 object-cover rounded" alt="">
                    @else
                        <span class="text-gray-400 text-sm">Tidak ada foto</span>
                    @endif
                </td>
                <td class="border px-4 py-2">{{ $s->kategori }}</td>
                <td class="border px-4 py-2">{{ $s->judul_material }}</td>
                <td class="border px-4 py-2">{{ $s->deskripsi }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.services.edit', $s->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Edit
                        </a>

                        <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // pilih semua form yang punya class delete-form
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // cegah submit default
            Swal.fire({
                title: 'Yakin hapus layanan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e53e3e',
                cancelButtonColor: '#a0aec0',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if(result.isConfirmed){
                    form.submit(); // submit form jika dikonfirmasi
                }
            });
        });
    });
});
</script>
@endsection
