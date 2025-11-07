<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInfo extends Model
{
    use HasFactory;

    protected $table = 'services_info';

    protected $fillable = [
        'deskripsi',
    ];
}
