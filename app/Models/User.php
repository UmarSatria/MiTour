<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'users';
    protected $fillable = [
        'email',
        'username',
        'password',
        'role'
    ];

    public function pemesanan() {
        return $this->hasMany(Pemesanan::class, 'user_id');
    }
}
