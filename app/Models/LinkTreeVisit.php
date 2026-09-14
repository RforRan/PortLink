<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkTreeVisit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'link_tree_id',
        'item_id',
        'is_qr',
        'visitor_hash',
        'visited_at',
    ];

    protected $casts = [
        'is_qr'      => 'boolean',
        'visited_at' => 'datetime',
    ];

    // ── Relationships ────────────────────────────────────────────

    public function linkTree()
    {
        return $this->belongsTo(LinkTree::class);
    }

    public function item()
    {
        return $this->belongsTo(LinkTreeItem::class, 'item_id');
    }

    // ── Scopes ───────────────────────────────────────────────────

    /**
     * Hanya kunjungan halaman induk (bukan klik sub link).
     */
    public function scopePageViews($query)
    {
        return $query->whereNull('item_id');
    }

    /**
     * Hanya klik sub link (bukan kunjungan halaman).
     */
    public function scopeItemClicks($query)
    {
        return $query->whereNotNull('item_id');
    }
}
