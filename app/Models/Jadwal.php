<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id','hari', 'jam_buka', 'jam_tutup',
    ];

    public function jadwal() {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
