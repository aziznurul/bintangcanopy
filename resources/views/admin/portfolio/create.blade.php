@extends('admin.layout.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Tambah Portfolio</h1>
</div>

<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    <div>
        <label class="block font-medium mb-1">Judul</label>
        <input type="text" name="judul" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Jenis Pekerjaan</label>
        <input type="text" name="jenis_pekerjaan" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Kategori</label>
        <select name="kategori" class="w-full border rounded p-2">
            <option value="">-- Pilih kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat }}">{{ $cat }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block font-medium mb-1">Lokasi</label>
        <input type="text" name="lokasi" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Nama Klien</label>
        <input type="text" name="nama_klien" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4" class="w-full border rounded p-2"></textarea>
    </div>
    <div>
        <label class="block font-medium mb-1">Thumbnail</label>
        <input type="file" name="thumbnail" class="w-full border rounded p-2" accept="image/*">
        <img id="thumbnailPreview" class="h-32 mt-2 hidden" />
    </div>
    <div>
        <label class="block font-medium mb-1">Foto Tambahan</label>
        <input type="file" name="foto[]" class="w-full border rounded p-2" accept="image/*" multiple>
        <div id="fotoPreview" class="flex flex-wrap mt-2 gap-2"></div>
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
</form>
@endsection

@section('scripts')
<script>
    const thumbnailInput = document.querySelector('input[name="thumbnail"]');
    const thumbnailPreview = document.getElementById('thumbnailPreview');

    thumbnailInput.addEventListener('change', function(e){
        const file = e.target.files[0];
        if(file){
            thumbnailPreview.src = URL.createObjectURL(file);
            thumbnailPreview.classList.remove('hidden');
        }
    });

    const fotoInput = document.querySelector('input[name="foto[]"]');
    const fotoPreview = document.getElementById('fotoPreview');

    fotoInput.addEventListener('change', function(){
        fotoPreview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.classList.add('h-24', 'rounded');
            fotoPreview.appendChild(img);
        });
    });
</script>
@endsection
