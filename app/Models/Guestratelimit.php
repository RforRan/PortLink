<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestRateLimit extends Model
{
    protected $fillable = ['ip', 'fingerprint_hash', 'date', 'count'];

    public $timestamps = true;
}
