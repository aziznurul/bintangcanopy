<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MitraDeskripsi;
use App\Models\Mitra;

class MitraCabangController extends Controller
{
    public function index()
    {
        // Deskripsi Cabang & Mitra
        $cabangInfo = MitraDeskripsi::first();

        // Daftar Mitra
        $mitras = Mitra::all();

        // Kantor Pusat (dummy, bisa disesuaikan)
        $kantor = [
            'alamat' => 'Griya Bukit Tanimulya, No 89 RT 002, RW 004, Desa Tanimulya, Kec. Ngamprah Kab. Bandung Barat, Indonesia',
            'telepon' => '+62 812 2020 9566',
            'email' => 'bintangcanopyofficial@example.com',
            'maps' => 'https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d247.57619849409232!2d107.52772928370665!3d-6.864317325996106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e3!4m0!4m3!3m2!1d-6.864281708599772!2d107.52787479354734!5e0!3m2!1sid!2sid!4v1762480334817!5m2!1sid!2sid'
        ];

        // Contact WA (dummy, bisa disesuaikan)
        $contact = [
            'wa' => '6281220209566',
            'pesan' => 'Halo, saya ingin informasi lebih lanjut tentang layanan Anda.'
        ];

        return view('mitra', compact('cabangInfo', 'mitras', 'kantor', 'contact'));
    }
}
