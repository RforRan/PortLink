<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkTreeItem extends Model
{
    protected $fillable = [
        'link_tree_id',
        'label',
        'url',
        'urutan',
        'visits',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'visits' => 'integer',
    ];

    // ── Relationships ────────────────────────────────────────────

    public function linkTree()
    {
        return $this->belongsTo(LinkTree::class);
    }

    public function treeVisits()
    {
        return $this->hasMany(LinkTreeVisit::class, 'item_id');
    }

    // ── Helpers ──────────────────────────────────────────────────

    /**
     * URL redirect publik untuk item ini.
     * /lt/{kode}/go/{item_id}
     */
    public function redirectUrl(): string
    {
        return url('lt/' . $this->linkTree->kode . '/go/' . $this->id);
    }

    /**
     * Persentase klik item ini dari total klik semua item di tree yang sama.
     * Dihitung dari kolom counter (tidak perlu query visits).
     *
     * @return float 0–100, dua desimal
     */
    public function clickPercentage(): float
    {
        $totalSiblingClicks = $this->linkTree->items->sum('visits');
        if ($totalSiblingClicks === 0) return 0.0;

        return round(($this->visits / $totalSiblingClicks) * 100, 2);
    }
}
