<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $structures = OrganizationStructure::all();
        return view('admin.about.index', compact('about', 'structures'));
    }

    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'sejarah_singkat' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tagline' => 'nullable|string|max:255',
            'deskripsi_struktur' => 'nullable|string',
            'jumlah_proyek' => 'nullable|integer',
            'jumlah_mitra' => 'nullable|integer',
            'persentase_pengerjaan' => 'nullable|numeric',
        ]);

        $about = About::first() ?? new About();
        $about->fill($data)->save();

        return redirect()->route('admin.about.index')->with('success', 'Data About berhasil diperbarui!');
    }
}
