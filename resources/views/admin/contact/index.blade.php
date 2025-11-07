@extends('admin.layout.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold mb-4">Pesan Masuk</h1>

    {{-- Notifikasi sukses (akan ditampilkan lewat SweetAlert) --}}
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

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                    <th class="border px-4 py-2 text-left">Pesan</th>
                    <th class="border px-4 py-2 text-left">Tanggal</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $contact->name }}</td>
                        <td class="border px-4 py-2">{{ $contact->email }}</td>
                        <td class="border px-4 py-2">{{ $contact->message }}</td>
                        <td class="border px-4 py-2">{{ $contact->created_at->format('d M Y H:i') }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button type="button"
                                class="delete-btn px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                data-id="{{ $contact->id }}">
                                Hapus
                            </button>

                            <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $contacts->links() }}
    </div>
</div>

{{-- Script SweetAlert untuk konfirmasi hapus --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;

            Swal.fire({
                title: 'Yakin hapus pesan ini?',
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        });
    });
});
</script>
@endsection
