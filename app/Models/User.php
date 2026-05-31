<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'nim',
        'name',
        'display_name',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'nim',
        'name' // ⬅️ sembunyikan name
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
