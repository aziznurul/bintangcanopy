<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model {
    use HasFactory;
    protected $fillable = ['portfolio_id', 'foto'];
    public function portfolio() {
        return $this->belongsTo(Portfolio::class);
    }
}