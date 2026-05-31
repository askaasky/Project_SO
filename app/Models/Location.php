<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false; // 🔴 WAJIB kalau tabel locations gak punya created_at & updated_at
}
