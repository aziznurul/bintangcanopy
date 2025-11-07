<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function index()
    {
        // Ambil data pertama atau buat baru jika belum ada
        $social = SocialMedia::first() ?? SocialMedia::create([
            'whatsapp' => '',
            'instagram' => '',
            'tiktok' => '',
            'youtube' => ''
        ]);

        return view('admin.social_media.index', compact('social'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'whatsapp' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ]);

        $social = SocialMedia::find($id);

        if (!$social) {
            $social = SocialMedia::create($request->only(['whatsapp','instagram','tiktok','youtube']));
        } else {
            $social->update($request->only(['whatsapp','instagram','tiktok','youtube']));
        }

        return redirect()->route('admin.social_media.index')->with('success', 'Data sosial media berhasil diperbarui!');
    }
}
