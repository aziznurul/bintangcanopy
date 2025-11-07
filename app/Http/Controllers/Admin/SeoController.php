<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    public function index()
    {
        $seo = SeoSetting::first();
        return view('admin.seo.index', compact('seo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'og_title' => 'nullable|max:255',
            'og_description' => 'nullable',
            'og_image' => 'nullable|image|max:2048',
        ]);

        $seo = SeoSetting::first() ?? new SeoSetting();

        // Hapus gambar lama jika upload baru
        if ($request->hasFile('og_image')) {
            if ($seo->og_image && Storage::disk('public')->exists($seo->og_image)) {
                Storage::disk('public')->delete($seo->og_image);
            }
            $seo->og_image = $request->file('og_image')->store('seo', 'public');
        }

        $seo->fill($request->only([
            'meta_title',
            'meta_description',
            'meta_keywords',
            'og_title',
            'og_description'
        ]));

        $seo->save();

        return back()->with('success', 'Pengaturan SEO berhasil diperbarui.');
    }
}
