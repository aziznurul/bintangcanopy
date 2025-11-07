<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationStructureController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('organization', 'public');
        }

        OrganizationStructure::create($data);
        return back()->with('success', 'Anggota struktur organisasi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $item = OrganizationStructure::findOrFail($id);
        if ($item->foto) {
            Storage::disk('public')->delete($item->foto);
        }
        $item->delete();
        return back()->with('success', 'Anggota struktur organisasi berhasil dihapus.');
    }
}
