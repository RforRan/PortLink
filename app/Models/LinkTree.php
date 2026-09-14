<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkTree extends Model
{
    use HasFactory;

    protected $fillable = [
        'npp',
        'kode',
        'judul',
        'deskripsi',
        'tema_warna',
        'foto',
        'visits',
        'visits_link',
        'visits_qr',
    ];

    protected $casts = [
        'visits'      => 'integer',
        'visits_link' => 'integer',
        'visits_qr'   => 'integer',
    ];

    /**
     * Sembunyikan kolom foto dari serialisasi default (toArray / toJson).
     * foto hanya dikembalikan secara eksplisit via formatTree() di controller,
     * agar response list tidak membawa payload base64 yang besar.
     */
    protected $hidden = ['foto'];

    // ── Relationships ────────────────────────────────────────────

    public function items()
    {
        return $this->hasMany(LinkTreeItem::class)->orderBy('urutan');
    }

    public function visits()
    {
        return $this->hasMany(LinkTreeVisit::class);
    }

    // ── Helpers ──────────────────────────────────────────────────

    /**
     * URL publik halaman link tree.
     */
    public function publicUrl(): string
    {
        return url('lt/' . $this->kode);
    }

    /**
     * URL QR redirect.
     */
    public function qrUrl(): string
    {
        return url('lt/' . $this->kode . '/qr');
    }

    /**
     * Cek apakah link tree memiliki foto profil.
     */
    public function hasFoto(): bool
    {
        return !empty($this->foto);
    }

    /**
     * Hitung click-through rate dalam persen.
     * CTR = total klik keluar / total kunjungan halaman * 100
     * Dihitung dari kolom counter (cepat), bukan dari tabel visits.
     *
     * @return float 0–100, dua desimal
     */
    public function ctr(): float
    {
        $pageViews = $this->visits;
        if ($pageViews === 0) return 0.0;

        $totalClicks = $this->items->sum('visits');

        return round(($totalClicks / $pageViews) * 100, 2);
    }
}
