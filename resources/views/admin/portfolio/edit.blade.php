@extends('admin.layout.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Edit Portfolio</h1>
</div>

<form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-medium mb-1">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $portfolio->judul) }}" class="w-full border rounded p-2" required>
    </div>
    <div>
        <label class="block font-medium mb-1">Jenis Pekerjaan</label>
        <input type="text" name="jenis_pekerjaan" value="{{ old('jenis_pekerjaan', $portfolio->jenis_pekerjaan) }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Kategori</label>
        <select name="kategori" class="w-full border rounded p-2">
            <option value="">-- Pilih kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ $portfolio->kategori == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block font-medium mb-1">Lokasi</label>
        <input type="text" name="lokasi" value="{{ old('lokasi', $portfolio->lokasi) }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Nama Klien</label>
        <input type="text" name="nama_klien" value="{{ old('nama_klien', $portfolio->nama_klien) }}" class="w-full border rounded p-2">
    </div>
    <div>
        <label class="block font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4" class="w-full border rounded p-2">{{ old('deskripsi', $portfolio->deskripsi) }}</textarea>
    </div>
    <div>
        <label class="block font-medium mb-1">Thumbnail</label>
        <input type="file" name="thumbnail" class="w-full border rounded p-2" accept="image/*">
        @if($portfolio->thumbnail)
        <img src="{{ Storage::url($portfolio->thumbnail) }}" id="thumbnailPreview" class="h-32 mt-2 rounded">
        @else
        <img id="thumbnailPreview" class="h-32 mt-2 hidden rounded">
        @endif
    </div>
    <div>
        <label class="block font-medium mb-1">Foto Tambahan</label>
        <input type="file" name="foto[]" class="w-full border rounded p-2" accept="image/*" multiple>
        <div id="fotoPreview" class="flex flex-wrap mt-2 gap-2">
            @foreach($portfolio->photos as $photo)
                <img src="{{ Storage::url($photo->foto) }}" class="h-24 rounded">
            @endforeach
        </div>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
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
