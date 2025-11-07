@extends('admin.layout.app')

@section('content')

<div class="container mx-auto p-6">
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Home Slides</h1>
    <a href="{{ route('admin.home.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded inline-flex items-center hover:bg-blue-600 transition">
        <!-- Icon Plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Slide
    </a>
</div>


{{-- Pesan sukses --}}
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false,
        });
    </script>
@endif


<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md border border-blue-300 rounded-lg overflow-hidden">
        <thead class="bg-blue-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Gambar</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Judul</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b border-gray-200">Deskripsi</th>
                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($slides as $slide)
            <tr class="hover:bg-blue-50 transition-colors">
                <td class="px-6 py-4">
                    @if($slide->image)
                        <img src="{{ asset('storage/' . $slide->image) }}" class="w-24 h-24 object-cover rounded-lg shadow-sm mx-auto">
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-800">{{ $slide->title }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $slide->description }}</td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('admin.home.edit', $slide->id) }}">
                            <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Edit</button>
                        </a>

                        <form id="delete-form-{{ $slide->id }}" action="{{ route('admin.home.destroy', $slide->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $slide->id }})" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Hapus</button>
                        </form>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@if($slides->isEmpty())
    <p class="text-gray-500 mt-4 text-center">Belum ada slide yang ditambahkan.</p>
@endif

</div>
@endsection
