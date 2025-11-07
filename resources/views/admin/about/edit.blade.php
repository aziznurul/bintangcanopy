@extends('admin.layout.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit About</h1>

<form action="{{ route('admin.about.update') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
    @csrf
    <div>
        <label class="font-semibold">Sejarah Singkat</label>
        <textarea name="sejarah_singkat" rows="3" class="w-full border rounded p-2">{{ $about->sejarah_singkat ?? '' }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Visi</label>
        <textarea name="visi" rows="2" class="w-full border rounded p-2">{{ $about->visi }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Misi</label>
        <textarea name="misi" rows="2" class="w-full border rounded p-2">{{ $about->misi }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Tagline</label>
        <input type="text" name="tagline" value="{{ $about->tagline }}" class="w-full border rounded p-2">
    </div>

    <div>
        <label class="font-semibold">Deskripsi Struktur Organisasi</label>
        <textarea name="deskripsi_struktur" rows="3" class="w-full border rounded p-2">{{ $about->deskripsi_struktur }}</textarea>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="font-semibold">Jumlah Proyek</label>
            <input type="number" name="jumlah_proyek" value="{{ $about->jumlah_proyek }}" class="w-full border rounded p-2">
        </div>
        <div>
            <label class="font-semibold">Jumlah Mitra</label>
            <input type="number" name="jumlah_mitra" value="{{ $about->jumlah_mitra }}" class="w-full border rounded p-2">
        </div>
        <div>
            <label class="font-semibold">Persentase Pengerjaan (%)</label>
            <input type="number" step="0.01" name="persentase_pengerjaan" value="{{ $about->persentase_pengerjaan }}" class="w-full border rounded p-2">
        </div>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
</form>
@endsection
