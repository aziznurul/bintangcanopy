<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioInfo extends Model
{
    use HasFactory;

    // Nama tabel yang benar sesuai database
    protected $table = 'portfolio_info';

    protected $fillable = ['deskripsi'];
}
