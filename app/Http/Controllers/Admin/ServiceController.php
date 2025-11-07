<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceInfo;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Menampilkan halaman Services
    public function index()
    {
        // Ambil ServiceInfo pertama, jika belum ada buat default
        $info = ServiceInfo::first();
        if (!$info) {
            $info = ServiceInfo::create(['deskripsi' => '']);
        }

        // Ambil semua layanan
        $services = Service::latest()->get();

        return view('admin.services.index', compact('info', 'services'));
    }

    // Update deskripsi umum layanan (ServiceInfo)
    public function updateInfo(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        $info = ServiceInfo::first();
        if (!$info) {
            // Jika belum ada, buat record baru
            $info = ServiceInfo::create([
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $info->update([
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return back()->with('success', 'Deskripsi layanan berhasil diperbarui.');
    }

    // Tambah layanan baru (Service)
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul_material' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        // Simpan file foto jika ada
        $foto = $request->file('foto')?->store('services', 'public');

        Service::create([
            'foto' => $foto,
            'kategori' => $request->kategori,
            'judul_material' => $request->judul_material,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    // Hapus layanan (Service)
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Hapus file foto jika ada
        if ($service->foto && Storage::disk('public')->exists($service->foto)) {
            Storage::disk('public')->delete($service->foto);
        }

        $service->delete();

        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}
