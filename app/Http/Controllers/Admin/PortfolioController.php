<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioInfo;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller {

    public function index() {
        $info = PortfolioInfo::first() ?? PortfolioInfo::create(['deskripsi' => '']);
        $portfolios = Portfolio::with('photos')->latest()->get();
         
        // Ambil kategori unik dari Service
        $categories = Service::select('kategori')->distinct()->pluck('kategori');
        return view('admin.portfolio.index', compact('info', 'portfolios','categories'));
    }

    public function updateInfo(Request $request) {
        $request->validate(['deskripsi' => 'required']);
        $info = PortfolioInfo::first();
        $info->update(['deskripsi' => $request->deskripsi]);
        return back()->with('success', 'Deskripsi portfolio berhasil diperbarui.');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'foto.*' => 'nullable|image|max:5120',
        ]);

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

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $f) {
                $path = $f->store('portfolio', 'public');
                $portfolio->photos()->create(['foto' => $path]);
            }
        }

        return back()->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function destroy($id) {
        $portfolio = Portfolio::with('photos')->findOrFail($id);
        if ($portfolio->thumbnail) Storage::disk('public')->delete($portfolio->thumbnail);
        foreach ($portfolio->photos as $photo) {
            Storage::disk('public')->delete($photo->foto);
            $photo->delete();
        }
        $portfolio->delete();
        return back()->with('success', 'Portfolio berhasil dihapus.');
    }
}

