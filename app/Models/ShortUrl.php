<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'short_url',
        'npp',
        'judul',
        'deskripsi',
        'visits',
        'visits_link',
        'visits_qr',
        'is_guest',
        'guest_ip',
        'guest_fp',
        'expired_at',
    ];

    protected $casts = [
        'is_guest'   => 'boolean',
        'expired_at' => 'datetime',
    ];

    /**
     * Scope shortlink guest yang belum expired.
     */
    public function scopeGuestActive($query)
    {
        return $query->where('is_guest', true)
                     ->where(function($q) {
                         $q->whereNull('expired_at')
                           ->orWhere('expired_at', '>', now());
                     });
    }
}
