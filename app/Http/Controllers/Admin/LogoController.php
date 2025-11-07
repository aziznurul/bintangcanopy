<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteLogo; // model baru
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    // Halaman admin logo
    public function index()
    {
        // Ambil logo pertama, atau buat baru jika belum ada
        $logo = SiteLogo::first();
        if (!$logo) {
            $logo = SiteLogo::create(['path' => null]);
        }

        return view('admin.logo.index', compact('logo'));
    }

    // Update logo
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $logo = SiteLogo::find($id);
        if (!$logo) {
            $logo = SiteLogo::create();
        }

        if ($request->hasFile('logo')) {
            // Hapus file lama jika ada
            if ($logo->path && Storage::exists('public/' . $logo->path)) {
                Storage::delete('public/' . $logo->path);
            }

            // Simpan file baru
            $path = $request->file('logo')->store('uploads/logo', 'public');
            $logo->update(['path' => $path]);
        }

        return redirect()->route('admin.logo.index')->with('success', 'Logo berhasil diperbarui!');
    }
}
