<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tagline;

class TaglineController extends Controller
{
    public function index()
    {
        // Ambil data pertama, atau buat data baru kosong jika belum ada
        $tagline = Tagline::first();

        if (!$tagline) {
            $tagline = Tagline::create([
                'judul' => '',
                'deskripsi' => '',
            ]);
        }

        return view('admin.tagline.index', compact('tagline'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Jika data tidak ditemukan (misalnya dihapus dari DB), buat baru
        $tagline = Tagline::find($id);

        if (!$tagline) {
            $tagline = Tagline::create($request->only(['judul', 'deskripsi']));
        } else {
            $tagline->update($request->only(['judul', 'deskripsi']));
        }

        return redirect()->route('admin.tagline.index')->with('success', 'Tagline berhasil diperbarui!');
    }
}
