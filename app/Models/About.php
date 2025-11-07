<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $fillable = [
        'sejarah_singkat',
        'visi',
        'misi',
        'tagline',
        'deskripsi_struktur',
        'jumlah_proyek',
        'jumlah_mitra',
        'persentase_pengerjaan',
    ];
}
