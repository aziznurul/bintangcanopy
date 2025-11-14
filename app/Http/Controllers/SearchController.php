<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');

        // Semua halaman yang ingin muncul
        $pages = [
            [
                'title' => 'Beranda',
                'url' => url('/'),
                'content' => 'Selamat datang di website Bintang Canopy, penyedia layanan canopy terbaik dengan desain modern dan kuat.'
            ],
            [
                'title' => 'Tentang Kami',
                'url' => url('/tentang'),
                'content' => 'Bintang Canopy adalah perusahaan yang bergerak di bidang pembuatan dan pemasangan canopy, dengan pengalaman lebih dari 10 tahun.'
            ],
            [
                'title' => 'Layanan',
                'url' => url('/layanan'),
                'content' => 'Kami menyediakan layanan canopy baja ringan, polycarbonate, kaca, dan galvalum untuk rumah, kantor, dan bangunan komersial.'
            ],
            [
                'title' => 'Portfolio',
                'url' => url('/portfolio'),
                'content' => 'Lihat hasil pekerjaan kami di berbagai proyek canopy pelanggan kami di Jakarta dan sekitarnya.'
            ],
            [
                'title' => 'Cabang & Mitra',
                'url' => url('/mitra'),
                'content' => 'Kami memiliki cabang di beberapa kota besar dan bekerja sama dengan mitra terpercaya di seluruh Indonesia.'
            ],
            [
                'title' => 'Kontak',
                'url' => url('/kontak'),
                'content' => 'Hubungi kami untuk konsultasi dan penawaran terbaik untuk kebutuhan canopy Anda.'
            ],
        ];

        // Kalau query kosong atau apapun yang diketik, tetap tampilkan semua halaman
        $results = collect($pages);

        return view('search-results', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
