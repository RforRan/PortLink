<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'short_url_id',
        'is_qr',
        'visitor_hash',
        'visited_at',
    ];

    protected $casts = [
        'is_qr'      => 'boolean',
        'visited_at' => 'datetime',
    ];

    public function shortUrl()
    {
        return $this->belongsTo(ShortUrl::class);
    }
}
