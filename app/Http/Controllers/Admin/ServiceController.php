<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceInfo;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Menampilkan daftar layanan
    public function index()
    {
        $services = Service::latest()->get();
        $info = ServiceInfo::first(); // jika mau menampilkan deskripsi umum
        return view('admin.services.index', compact('services', 'info'));
    }
    
    // Tambah atau update deskripsi umum layanan
    public function updateInfo(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
        ]);

        $info = ServiceInfo::first();

        if ($info) {
            // update
            $info->update([
                'deskripsi' => $request->deskripsi
            ]);
        } else {
            // buat baru
            ServiceInfo::create([
                'deskripsi' => $request->deskripsi
            ]);
        }

        return back()->with('success', 'Deskripsi layanan berhasil diperbarui.');
    }

    // Jika ingin hapus deskripsi umum (opsional)
    public function destroyInfo($id)
    {
        $info = ServiceInfo::findOrFail($id);
        $info->delete();

        return back()->with('success', 'Deskripsi layanan berhasil dihapus.');
    }

    // Halaman tambah layanan baru
    public function create()
    {
        return view('admin.services.create');
    }

    // Simpan layanan baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul_material' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $foto = $request->file('foto')?->store('services', 'public');

        Service::create([
            'kategori' => $request->kategori,
            'judul_material' => $request->judul_material,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Halaman edit layanan
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // Update layanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul_material' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $service = Service::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($service->foto && Storage::disk('public')->exists($service->foto)) {
                Storage::disk('public')->delete($service->foto);
            }
            $foto = $request->file('foto')->store('services', 'public');
        } else {
            $foto = $service->foto;
        }

        $service->update([
            'kategori' => $request->kategori,
            'judul_material' => $request->judul_material,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.services.index')
                         ->with('success', 'Layanan berhasil diperbarui.');
    }

    // Hapus layanan
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->foto && Storage::disk('public')->exists($service->foto)) {
            Storage::disk('public')->delete($service->foto);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Layanan berhasil dihapus.');
    }
}
