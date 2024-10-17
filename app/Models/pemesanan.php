<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
