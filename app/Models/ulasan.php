<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'admin_id', 'komentar', 'rating',
    ];

    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
