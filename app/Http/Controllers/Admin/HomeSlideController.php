<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Illuminate\Support\Facades\Storage;

class HomeSlideController extends Controller
{
    public function index()
    {
        $slides = HomeSlide::latest()->get();
        return view('admin.home.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_slides', 'public');
        }

        HomeSlide::create($data);

        return redirect()->route('admin.home.index')->with('success', 'Slide berhasil ditambahkan!');
    }

        /**
     * Tampilkan form edit slide.
     */
    public function edit(HomeSlide $home)
    {
        return view('admin.home.edit', ['homeSlide' => $home]);
    }

    /**
     * Update data slide.
     */
    public function update(Request $request, HomeSlide $home)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($home->image && Storage::disk('public')->exists($home->image)) {
                Storage::disk('public')->delete($home->image);
            }

            // Upload gambar baru
            $data['image'] = $request->file('image')->store('home_slides', 'public');
        }

        $home->update($data);

        return redirect()->route('admin.home.index')->with('success', 'Slide berhasil diperbarui!');
    }

    /**

    * Hapus slide.
    */
    public function destroy(HomeSlide $home)
    {
    // Hapus gambar lama jika ada
    if ($home->image && Storage::disk('public')->exists($home->image)) {
    Storage::disk('public')->delete($home->image);
    }

    // Hapus data slide
    $home->delete();

    return redirect()->route('admin.home.index')->with('success', 'Slide berhasil dihapus!');
    }



}
