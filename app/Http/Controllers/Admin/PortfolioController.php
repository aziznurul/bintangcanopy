<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioInfo;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    // Menampilkan halaman Portfolio
    public function index()
    {
        $info = PortfolioInfo::first() ?? PortfolioInfo::create(['deskripsi' => '']);
        $portfolios = Portfolio::with('photos')->latest()->get();

        // Ambil kategori unik dari Service
        $categories = Service::select('kategori')->distinct()->pluck('kategori');

        return view('admin.portfolio.index', compact('info', 'portfolios', 'categories'));
    }

    // Update deskripsi umum Portfolio
    public function updateInfo(Request $request)
    {
        $request->validate(['deskripsi' => 'required']);

        $info = PortfolioInfo::first() ?? PortfolioInfo::create(['deskripsi' => '']);
        $info->update(['deskripsi' => $request->deskripsi]);

        return back()->with('success', 'Deskripsi portfolio berhasil diperbarui.');
    }

    // Tambah portfolio baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_pekerjaan' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nama_klien' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'foto.*' => 'nullable|image|max:5120',
        ]);

        // Upload thumbnail
        $thumbnail = $request->file('thumbnail')?->store('portfolio', 'public');

        $portfolio = Portfolio::create([
            'judul' => $request->judul,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'nama_klien' => $request->nama_klien,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $thumbnail,
        ]);

        // Upload foto tambahan
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $f) {
                $path = $f->store('portfolio', 'public');
                $portfolio->photos()->create(['foto' => $path]);
            }
        }

        return back()->with('success', 'Portfolio berhasil ditambahkan.');
    }

    // Menampilkan halaman edit portfolio
    public function edit($id)
    {
        $portfolio = Portfolio::with('photos')->findOrFail($id);
        $categories = Service::select('kategori')->distinct()->pluck('kategori');
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    // Update portfolio
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_pekerjaan' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'nama_klien' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'foto.*' => 'nullable|image|max:5120',
        ]);

        $portfolio = Portfolio::with('photos')->findOrFail($id);

        // Update thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($portfolio->thumbnail && Storage::disk('public')->exists($portfolio->thumbnail)) {
                Storage::disk('public')->delete($portfolio->thumbnail);
            }
            $thumbnail = $request->file('thumbnail')->store('portfolio', 'public');
        } else {
            $thumbnail = $portfolio->thumbnail;
        }

        $portfolio->update([
            'judul' => $request->judul,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'nama_klien' => $request->nama_klien,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $thumbnail,
        ]);

        // Upload foto tambahan
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $f) {
                $path = $f->store('portfolio', 'public');
                $portfolio->photos()->create(['foto' => $path]);
            }
        }

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil diperbarui.');
    }

    // Hapus portfolio beserta foto
    public function destroy($id)
    {
        $portfolio = Portfolio::with('photos')->findOrFail($id);

        if ($portfolio->thumbnail && Storage::disk('public')->exists($portfolio->thumbnail)) {
            Storage::disk('public')->delete($portfolio->thumbnail);
        }

        foreach ($portfolio->photos as $photo) {
            if (Storage::disk('public')->exists($photo->foto)) {
                Storage::disk('public')->delete($photo->foto);
            }
            $photo->delete();
        }

        $portfolio->delete();

        return back()->with('success', 'Portfolio berhasil dihapus.');
    }
}
