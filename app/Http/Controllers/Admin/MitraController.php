<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\MitraDeskripsi;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index()
    {
        $deskripsi = MitraDeskripsi::first();
        $mitras = Mitra::latest()->get();
        return view('admin.mitra.index', compact('deskripsi', 'mitras'));
    }

    public function updateDeskripsi(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
        ]);

        $deskripsi = MitraDeskripsi::first();
        if ($deskripsi) {
            $deskripsi->update(['deskripsi' => $request->deskripsi]);
        } else {
            MitraDeskripsi::create(['deskripsi' => $request->deskripsi]);
        }

        return redirect()->back()->with('success', 'Deskripsi mitra berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'required|image|max:2048',
        ]);

        $path = $request->file('logo')->store('mitra', 'public');

        Mitra::create([
            'nama' => $request->nama,
            'logo' => $path,
        ]);

        return redirect()->back()->with('success', 'Mitra berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        $mitra = Mitra::findOrFail($id);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($mitra->logo);
            $path = $request->file('logo')->store('mitra', 'public');
            $mitra->logo = $path;
        }

        $mitra->nama = $request->nama;
        $mitra->save();

        return redirect()->back()->with('success', 'Mitra berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        Storage::disk('public')->delete($mitra->logo);
        $mitra->delete();

        return redirect()->back()->with('success', 'Mitra berhasil dihapus.');
    }
}
