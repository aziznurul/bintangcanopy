<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {
    use HasFactory;
    protected $fillable = [
        'thumbnail', 'judul', 'jenis_pekerjaan', 'kategori',
        'lokasi', 'nama_klien', 'deskripsi'
    ];

    public function photos() {
        return $this->hasMany(PortfolioPhoto::class);
    }
}