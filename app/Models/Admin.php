<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = [];

    public function jadwal() {
        return $this->hasmany(Jadwal::class);
    }

    // public function ulasan() {
    //     return $this->hasMany(Ulasan::class);
    // }
}
