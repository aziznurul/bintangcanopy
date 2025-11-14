@extends('admin.layout.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Portfolio</h1>
    <a href="{{ route('admin.portfolio.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Portfolio</a>
</div>

{{-- Alert success --}}
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
    {{ session('success') }}
</div>
@endif

{{-- Alert error --}}
@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- Form Deskripsi Umum Portfolio --}}
<div class="bg-white p-6 rounded shadow mb-6">
    <h2 class="font-bold mb-2">Deskripsi Umum Portfolio</h2>
    <form action="{{ route('admin.portfolio.updateInfo') }}" method="POST">
        @csrf
        <textarea name="deskripsi" rows="3" class="w-full border rounded p-2" placeholder="Deskripsi umum portfolio...">{{ old('deskripsi', $info->deskripsi) }}</textarea>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Deskripsi</button>
    </form>
</div>

{{-- Tabel Portfolio --}}
<div class="bg-white p-6 rounded shadow overflow-x-auto">
    <table class="min-w-full border">
        <thead class="bg-gray-50">
            <tr>
                <th class="border px-4 py-2">Thumbnail</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $p)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">
                    @if($p->thumbnail)
                    <img src="{{ Storage::url($p->thumbnail) }}" class="w-24 h-24 object-cover rounded" alt="">
                    @else
                    <span class="text-gray-400 text-sm">Tidak ada thumbnail</span>
                    @endif
                </td>
                <td class="border px-4 py-2">{{ $p->judul }}</td>
                <td class="border px-4 py-2">{{ $p->kategori }}</td>
                <td class="border px-4 py-2">{{ Str::limit($p->deskripsi, 50) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.portfolio.edit', $p->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Edit
                        </a>

                        <form action="{{ route('admin.portfolio.destroy', $p->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" 
                                onclick="return confirm('Yakin hapus portfolio ini?')">
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
