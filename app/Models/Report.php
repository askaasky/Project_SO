<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\User;

class Report extends Model
{
    /**
     * Nama tabel (opsional, tapi aman)
     */
    protected $table = 'reports';

    /**
     * Kolom yang boleh diisi mass assignment
     */
    protected $fillable = [
        'item_id',
        'admin_id',
        'report_type',
        'note'
    ];

    /**
     * Relasi ke item yang dilaporkan
     * reports.item_id -> items.id
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Relasi ke admin yang melakukan aksi
     * reports.admin_id -> users.id
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
