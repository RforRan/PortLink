@extends('layouts.Layout-dashboard')

@section('content')
<div class="bg-layer">
    <div class="bg-grid"></div>
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>
    <div class="bg-blob bg-blob-3"></div>
</div>
<style>
/* =====================================================
   STATISTIK — theme-aware tokens
===================================================== */

/* ── Light mode tokens ── */
:root {
    /* Stat card icons */
    --st-card-bg:            #d5e5d9;
    --st-icon-total-bg:      rgba(43,90,140,0.10);
    --st-icon-total-cl:      #2b5a8c;
    --st-icon-link-bg:       rgba(43,75,150,0.10);
    --st-icon-link-cl:       #2b4b96;
    --st-icon-qr-bg:         rgba(28,107,58,0.10);
    --st-icon-qr-cl:         #1c6b3a;
    --st-icon-unique-bg:     rgba(100,60,160,0.10);
    --st-icon-unique-cl:     #6428a0;
    --st-icon-unique-bd:     rgba(100,60,160,0.25);

    /* Range / type buttons */
    --range-group-bg:        rgba(255,255,255,0.55);
    --range-group-border:    rgba(0,0,0,0.10);
    --range-btn-hover-bg:    rgba(0,0,0,0.06);
    --range-btn-active-bg:   rgba(28,107,58,0.13);
    --range-btn-active-bd:   rgba(28,107,58,0.35);
    --range-btn-active-cl:   #1c6b3a;
    --type-btn-bg:           rgba(255,255,255,0.55);
    --type-btn-hover-bg:     rgba(255,255,255,0.85);
    --type-btn-active-bg:    rgba(28,107,58,0.13);
    --type-btn-active-bd:    rgba(28,107,58,0.35);
    --type-btn-active-cl:    #1c6b3a;

    /* Pagination */
    --pg-btn-bg:             rgba(255,255,255,0.55);
    --pg-btn-hover-bg:       rgba(255,255,255,0.85);
    --pg-btn-hover-bd:       rgba(0,0,0,0.16);
    --pg-active-bg:          rgba(28,107,58,0.14);
    --pg-active-bd:          rgba(28,107,58,0.38);
    --pg-active-cl:          #1c6b3a;
    --pg-hash-focus-bd:      rgba(28,107,58,0.50);
    --pg-hash-focus-sh:      rgba(28,107,58,0.12);

    /* Rank badges */
    --rank-top1-bg:          rgba(180,148,30,0.14);
    --rank-top1-cl:          #8a6e00;
    --rank-top1-bd:          rgba(180,148,30,0.32);
    --rank-top2-bg:          rgba(130,130,130,0.14);
    --rank-top2-cl:          #555555;
    --rank-top2-bd:          rgba(130,130,130,0.30);
    --rank-top3-bg:          rgba(140,100,50,0.14);
    --rank-top3-cl:          #6b4a14;
    --rank-top3-bd:          rgba(140,100,50,0.30);

    /* Bar chart fill */
    --bar-link-from:         #4a6fa8;
    --bar-link-to:           #6b94cc;
    --bar-qr-from:           #2a7a4a;
    --bar-qr-to:             #4aaa6a;
    --bar-track-bg:          rgba(0,0,0,0.08);

    /* Shortlink short url color */
    --sl-short-cl:           #1c6b3a;

    /* Chart.js */
    --chart-text-cl:         #4a574a;
    --chart-grid-cl:         rgba(0,0,0,0.07);
    --chart-tooltip-bg:      #ecf4ed;
    --chart-tooltip-bd:      rgba(0,0,0,0.11);
    --chart-tooltip-title:   #1b211b;
    --chart-tooltip-body:    #4a574a;

    /* Spin ring */
    --spin-ring-bd:          rgba(0,0,0,0.09);
    --spin-ring-top:         #1c6b3a;

    /* Item hover */
    --sl-item-hover:         rgba(0,0,0,0.03);

    /* Background */
    --bg-grid-line:          rgba(0,0,0,0.04);
    --bg-blob-1:             rgba(107,155,122,0.09);
    --bg-blob-2:             rgba(100,130,200,0.06);
    --bg-blob-3:             rgba(179,155,107,0.05);
}

/* ── Dark mode tokens ── */
[data-theme="dark"] {
    --st-icon-total-bg:      rgba(154,176,197,0.18);
    --st-card-bg:            var(--md-bg-card);
    --st-icon-total-cl:      #c2d4e8;
    --st-icon-link-bg:       rgba(122,139,180,0.18);
    --st-icon-link-cl:       #9ab3d9;
    --st-icon-qr-bg:         rgba(107,155,122,0.18);
    --st-icon-qr-cl:         #8bc99f;
    --st-icon-unique-bg:     rgba(178,140,217,0.15);
    --st-icon-unique-cl:     #c9a3e8;
    --st-icon-unique-bd:     rgba(178,140,217,0.30);

    --range-group-bg:        var(--md-bg-primary);
    --range-group-border:    rgba(255,255,255,0.10);
    --range-btn-hover-bg:    rgba(255,255,255,0.06);
    --range-btn-active-bg:   rgba(107,155,122,0.22);
    --range-btn-active-bd:   rgba(107,155,122,0.45);
    --range-btn-active-cl:   #aaddb8;
    --type-btn-bg:           var(--md-bg-elevated);
    --type-btn-hover-bg:     rgba(255,255,255,0.06);
    --type-btn-active-bg:    rgba(100,130,200,0.22);
    --type-btn-active-bd:    rgba(100,130,200,0.50);
    --type-btn-active-cl:    #c2d4f0;

    --pg-btn-bg:             var(--md-bg-elevated);
    --pg-btn-hover-bg:       rgba(255,255,255,0.08);
    --pg-btn-hover-bd:       rgba(255,255,255,0.18);
    --pg-active-bg:          rgba(154,176,197,0.22);
    --pg-active-bd:          rgba(154,176,197,0.45);
    --pg-active-cl:          #c2d4e8;
    --pg-hash-focus-bd:      rgba(128,128,128,0.55);
    --pg-hash-focus-sh:      rgba(128,128,128,0.14);

    --rank-top1-bg:          rgba(212,175,55,0.20);
    --rank-top1-cl:          #d4af37;
    --rank-top1-bd:          rgba(212,175,55,0.30);
    --rank-top2-bg:          rgba(192,192,192,0.20);
    --rank-top2-cl:          #c0c0c0;
    --rank-top2-bd:          rgba(192,192,192,0.30);
    --rank-top3-bg:          rgba(176,141,87,0.20);
    --rank-top3-cl:          #b08d57;
    --rank-top3-bd:          rgba(176,141,87,0.30);

    --bar-link-from:         #7a8bb4;
    --bar-link-to:           #9ab3d9;
    --bar-qr-from:           #6b9b7a;
    --bar-qr-to:             #8bc99f;
    --bar-track-bg:          rgba(255,255,255,0.07);

    --sl-short-cl:           #8bc99f;

    --chart-text-cl:         #b0b0b0;
    --chart-grid-cl:         rgba(255,255,255,0.05);
    --chart-tooltip-bg:      #262626;
    --chart-tooltip-bd:      rgba(255,255,255,0.10);
    --chart-tooltip-title:   #f5f5f5;
    --chart-tooltip-body:    #b0b0b0;

    --spin-ring-bd:          rgba(255,255,255,0.10);
    --spin-ring-top:         #8bc99f;

    --sl-item-hover:         rgba(255,255,255,0.03);

    --bg-grid-line:          rgba(255,255,255,0.018);
    --bg-blob-1:             rgba(107,155,122,0.06);
    --bg-blob-2:             rgba(100,130,200,0.04);
    --bg-blob-3:             rgba(179,155,107,0.03);
}

@keyframes spin    { to { transform: rotate(360deg); } }
@keyframes pulse   { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.08); } }
@keyframes fadeUp  { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }

/* ── Header ── */
.stat-header {
    margin-bottom: 28px;
    display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; flex-wrap: wrap;
    animation: fadeUp 0.35s ease-out both;
}
.stat-header-text h3 { font-size:1.75rem; font-weight:700; color:var(--md-text-primary); letter-spacing:-0.02em; margin:0 0 4px; }
.stat-header-text p  { font-size:0.9375rem; color:var(--md-text-secondary); margin:0; }

/* ── Summary cards ── */
.stat-summary {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px; margin-bottom: 24px;
}
@media(max-width:860px) { .stat-summary { grid-template-columns: repeat(2,1fr); } }
@media(max-width:480px) { .stat-summary { grid-template-columns: 1fr; } }

.stat-card {
    background: var(--st-card-bg); border: 1px solid var(--md-border);
    border-radius: 12px; padding: 20px 22px;
    box-shadow: var(--md-elevation-2);
    display: flex; align-items: center; gap: 16px;
    transition: box-shadow 0.2s, transform 0.2s;
    animation: fadeUp 0.4s ease-out both;
}
.stat-card:hover { box-shadow: var(--md-elevation-4); transform: translateY(-2px); }
.stat-card:nth-child(1) { animation-delay: 0.05s; }
.stat-card:nth-child(2) { animation-delay: 0.12s; }
.stat-card:nth-child(3) { animation-delay: 0.19s; }
.stat-card:nth-child(4) { animation-delay: 0.26s; }

.stat-card-icon {
    width: 48px; height: 48px; border-radius: 12px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center; font-size: 1.4rem;
}
.icon-total  { background: var(--st-icon-total-bg);  color: var(--st-icon-total-cl); }
.icon-link   { background: var(--st-icon-link-bg);   color: var(--st-icon-link-cl); }
.icon-qr     { background: var(--st-icon-qr-bg);     color: var(--st-icon-qr-cl); }
.icon-unique { background: var(--st-icon-unique-bg); color: var(--st-icon-unique-cl); border: 1px solid var(--st-icon-unique-bd); }

.stat-card-body .label {
    font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 0.08em; color: var(--md-text-disabled); margin-bottom: 4px;
}
.stat-card-body .value {
    font-size: 1.75rem; font-weight: 700; color: var(--md-text-primary); line-height: 1;
}
.stat-card-body .sub {
    font-size: 0.75rem; color: var(--md-text-secondary); margin-top: 4px;
}

/* ── Chart card ── */
.chart-card {
    background: var(--md-bg-card); border: 1px solid var(--md-border);
    border-radius: 12px; box-shadow: var(--md-elevation-2);
    margin-bottom: 24px; overflow: hidden;
    animation: fadeUp 0.4s 0.25s ease-out both;
}
.chart-card-head {
    background: var(--md-bg-elevated);
    padding: 18px 24px;
    border-bottom: 1px solid var(--md-border);
    display: flex; align-items: center; justify-content: space-between;
    gap: 12px; flex-wrap: wrap;
}
.chart-card-head h5 { margin:0; font-weight:600; font-size:1.05rem; color:var(--md-text-primary); }

/* ── Range pills ── */
.chart-controls { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

.range-group {
    display: flex; background: var(--range-group-bg);
    border: 1px solid var(--range-group-border, var(--md-border)); border-radius: 8px; padding: 3px; gap: 2px;
}
.range-btn {
    padding: 6px 12px; border-radius: 6px; border: 1px solid transparent;
    background: transparent; color: var(--md-text-secondary);
    cursor: pointer; font-size: 0.8rem; font-weight: 500;
    font-family: 'Inter', sans-serif;
    transition: all 0.18s; white-space: nowrap;
}
.range-btn:hover { color: var(--md-text-primary); background: var(--range-btn-hover-bg); }
.range-btn.active {
    background: var(--range-btn-active-bg);
    border-color: var(--range-btn-active-bd);
    color: var(--range-btn-active-cl);
}

/* ── Chart type toggle ── */
.chart-type-group { display: flex; gap: 6px; }
.chart-type-btn {
    width: 32px; height: 32px; border-radius: 7px;
    border: 1px solid var(--md-border); background: var(--type-btn-bg);
    color: var(--md-text-secondary); cursor: pointer; font-size: 0.9rem;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.15s;
}
.chart-type-btn:hover { background: var(--type-btn-hover-bg); color: var(--md-text-primary); }
.chart-type-btn.active {
    background: var(--type-btn-active-bg);
    border-color: var(--type-btn-active-bd);
    color: var(--type-btn-active-cl);
}

/* ── Chart area ── */
.chart-body { padding: 24px; position: relative; }
.chart-wrap { position: relative; height: 300px; }

/* ── Loading overlay ── */
.chart-loading {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    background: var(--md-bg-card); border-radius: 0 0 12px 12px;
    z-index: 5; transition: opacity 0.3s;
}
.chart-loading.hidden { opacity: 0; pointer-events: none; }

.spin-ring {
    width: 36px; height: 36px;
    border: 3px solid var(--spin-ring-bd); border-top-color: var(--spin-ring-top);
    border-radius: 50%; animation: spin 0.8s linear infinite;
}

/* ── Legend ── */
.chart-legend {
    display: flex; gap: 20px; flex-wrap: wrap;
    padding: 0 24px 20px;
}
.legend-item {
    display: flex; align-items: center; gap: 7px;
    font-size: 0.8375rem; color: var(--md-text-secondary);
}
.legend-dot { width: 10px; height: 10px; border-radius: 2px; flex-shrink: 0; }

/* ── Shortlink rank list ── */
.sl-stat-list { list-style: none; margin: 0; padding: 0; }
.sl-stat-item {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 24px; border-bottom: 1px solid var(--md-divider);
    transition: background 0.15s; animation: fadeUp 0.3s ease-out both;
}
.sl-stat-item:last-child { border-bottom: none; }
.sl-stat-item:hover { background: var(--sl-item-hover); }

.sl-stat-rank {
    width: 26px; height: 26px; border-radius: 7px;
    background: var(--md-bg-elevated); border: 1px solid var(--md-border);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.75rem; font-weight: 700; color: var(--md-text-secondary);
    flex-shrink: 0;
}
.sl-stat-rank.top1 { background: var(--rank-top1-bg); color: var(--rank-top1-cl); border-color: var(--rank-top1-bd); }
.sl-stat-rank.top2 { background: var(--rank-top2-bg); color: var(--rank-top2-cl); border-color: var(--rank-top2-bd); }
.sl-stat-rank.top3 { background: var(--rank-top3-bg); color: var(--rank-top3-cl); border-color: var(--rank-top3-bd); }

.sl-stat-info { flex: 1; min-width: 0; }
.sl-stat-short {
    font-size: 0.875rem; font-weight: 600; color: var(--sl-short-cl);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.sl-stat-orig {
    font-size: 0.75rem; color: var(--md-text-secondary);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 2px;
}

.sl-stat-bars { display: flex; flex-direction: column; gap: 4px; min-width: 130px; }
.sl-bar-row { display: flex; align-items: center; gap: 7px; font-size: 0.72rem; }
.sl-bar-label { width: 28px; color: var(--md-text-disabled); flex-shrink: 0; text-align: right; }
.sl-bar-track {
    flex: 1; height: 6px; background: var(--bar-track-bg);
    border-radius: 3px; overflow: hidden;
}
.sl-bar-fill { height: 100%; border-radius: 3px; transition: width 0.6s cubic-bezier(0.4,0,0.2,1); }
.sl-bar-fill.link { background: linear-gradient(90deg, var(--bar-link-from), var(--bar-link-to)); }
.sl-bar-fill.qr   { background: linear-gradient(90deg, var(--bar-qr-from),   var(--bar-qr-to)); }
.sl-bar-count { width: 28px; color: var(--md-text-secondary); font-weight: 600; flex-shrink: 0; }

.sl-stat-total {
    font-size: 1.1rem; font-weight: 700; color: var(--md-text-primary);
    min-width: 40px; text-align: right;
}

/* ── Pagination ── */
.rank-pagination {
    display: flex; align-items: center; justify-content: center;
    gap: 6px; padding: 14px 20px;
    border-top: 1px solid var(--md-border);
}
.pg-btn {
    width: 36px; height: 36px; border-radius: 9px;
    border: 1px solid var(--md-border);
    background: var(--pg-btn-bg);
    color: var(--md-text-secondary);
    display: inline-flex; align-items: center; justify-content: center;
    cursor: pointer; font-size: 0.875rem; font-weight: 500;
    font-family: 'Inter', sans-serif;
    transition: all 0.18s cubic-bezier(0.4,0,0.2,1);
    user-select: none; line-height: 1; text-decoration: none;
}
.pg-btn:hover:not(:disabled):not(.pg-active) {
    background: var(--pg-btn-hover-bg);
    color: var(--md-text-primary);
    border-color: var(--pg-btn-hover-bd);
}
.pg-btn.pg-active {
    background: var(--pg-active-bg);
    border-color: var(--pg-active-bd);
    color: var(--pg-active-cl); cursor: default;
}
.pg-btn:disabled { opacity: 0.3; cursor: not-allowed; }
.pg-divider { width: 1px; height: 24px; background: var(--md-border); margin: 0 4px; }
.pg-jump-wrap { display: flex; align-items: center; gap: 4px; }
.pg-hash-btn {
    width: 36px; height: 36px; border-radius: 9px;
    border: 1px solid var(--md-border); background: var(--pg-btn-bg);
    color: var(--md-text-secondary);
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 0.875rem; font-weight: 600; cursor: pointer;
    font-family: 'Inter', sans-serif;
    transition: all 0.18s cubic-bezier(0.4,0,0.2,1);
}
.pg-hash-btn:hover { background: var(--pg-btn-hover-bg); color: var(--md-text-primary); border-color: var(--pg-btn-hover-bd); }
.pg-hash-btn.is-input {
    width: 52px; border-color: var(--pg-hash-focus-bd);
    box-shadow: 0 0 0 3px var(--pg-hash-focus-sh);
    color: var(--md-text-primary);
}
.pg-inline-input {
    width: 100%; background: transparent; border: none; outline: none;
    color: var(--md-text-primary); text-align: center;
    font-size: 0.875rem; font-family: 'Inter', sans-serif;
}
.pg-inline-input::-webkit-inner-spin-button,
.pg-inline-input::-webkit-outer-spin-button { -webkit-appearance: none; }
.pg-info { font-size: 0.75rem; color: var(--md-text-disabled); white-space: nowrap; }

/* ── Tab nav ── */
.stat-tabs {
    display: flex; gap: 4px; padding: 4px;
    background: var(--range-group-bg);
    border: 1px solid var(--range-group-border, var(--md-border));
    border-radius: 10px; margin-bottom: 24px;
    animation: fadeUp 0.3s ease-out both;
}
.stat-tab-btn {
    flex: 1; padding: 9px 20px; border-radius: 7px;
    border: 1px solid transparent; background: transparent;
    color: var(--md-text-secondary); cursor: pointer;
    font-size: 0.875rem; font-weight: 500; font-family: 'Inter', sans-serif;
    display: flex; align-items: center; justify-content: center; gap: 7px;
    transition: all 0.18s cubic-bezier(0.4,0,0.2,1);
}
.stat-tab-btn:hover { background: var(--range-btn-hover-bg); color: var(--md-text-primary); }
.stat-tab-btn.active {
    background: var(--range-btn-active-bg);
    border-color: var(--range-btn-active-bd);
    color: var(--range-btn-active-cl);
}

/* ── Link Tree dropdown ── */
.lt-filter-select {
    padding: 6px 10px; border-radius: 7px;
    border: 1px solid var(--md-border); background: var(--md-bg-elevated);
    color: var(--md-text-primary); font-size: 0.8rem; font-family: 'Inter', sans-serif;
    cursor: pointer; outline: none; transition: border-color 0.18s;
}
.lt-filter-select:focus { border-color: var(--range-btn-active-bd); }

/* ── LT rank item ── */
.lt-rank-item {
    display: flex; align-items: center; gap: 14px;
    padding: 14px 24px; border-bottom: 1px solid var(--md-divider);
    transition: background 0.15s; animation: fadeUp 0.3s ease-out both;
}
.lt-rank-item:last-child { border-bottom: none; }
.lt-rank-item:hover { background: var(--sl-item-hover); }
.lt-rank-info { flex: 1; min-width: 0; }
.lt-rank-title {
    font-size: 0.875rem; font-weight: 600; color: var(--sl-short-cl);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.lt-rank-url {
    font-size: 0.75rem; color: var(--md-text-secondary);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 2px;
}
.lt-ctr-badge {
    font-size: 0.72rem; font-weight: 600; padding: 2px 8px; border-radius: 20px;
    background: rgba(28,107,58,0.09); border: 1px solid rgba(28,107,58,0.22); color: #1c6b3a;
}
[data-theme="dark"] .lt-ctr-badge {
    background: rgba(107,155,122,0.12); border-color: rgba(107,155,122,0.28); color: #8bc99f;
}

/* ── Background layer ── */
.bg-layer { position: fixed; inset: 0; overflow: hidden; z-index: 0; pointer-events: none; }
.bg-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(var(--bg-grid-line) 1px, transparent 1px),
        linear-gradient(90deg, var(--bg-grid-line) 1px, transparent 1px);
    background-size: 56px 56px;
}
.bg-blob { position: absolute; border-radius: 50%; filter: blur(90px); animation: pulse 10s ease-in-out infinite; }
.bg-blob-1 { width:500px; height:500px; background:var(--bg-blob-1); top:-150px; left:-120px; animation-delay:0s; }
.bg-blob-2 { width:400px; height:400px; background:var(--bg-blob-2); bottom:-120px; right:-100px; animation-delay:4s; }
.bg-blob-3 { width:300px; height:300px; background:var(--bg-blob-3); top:40%; left:55%; animation-delay:7s; }
</style>

<div style="position:relative;z-index:1;" class="container-fluid px-4 py-4">

    {{-- Header --}}
    <div class="stat-header">
        <div class="stat-header-text">
            <h3>Statistik</h3>
            <p>Pantau performa shortlink dan link tree Anda secara visual</p>
        </div>
        <div style="font-size:0.8rem;color:var(--md-text-disabled);">
            <i class="bi bi-clock me-1"></i><span id="lastUpdated">—</span>
        </div>
    </div>

    {{-- Tab Nav --}}
    <div class="stat-tabs">
        <button class="stat-tab-btn active" id="tabBtnSl" onclick="switchTab('shortlink')">
            <i class="bi bi-link-45deg"></i> ShortLink
        </button>
        <button class="stat-tab-btn" id="tabBtnLt" onclick="switchTab('linktree')">
            <i class="bi bi-diagram-3-fill"></i> Link Tree
        </button>
    </div>

    {{-- Summary Cards: ShortLink --}}
    <div class="stat-summary" id="summaryShortlink">
        <div class="stat-card">
            <div class="stat-card-icon icon-total"><i class="bi bi-bar-chart-fill"></i></div>
            <div class="stat-card-body">
                <div class="label">Total Kunjungan</div>
                <div class="value" id="sumTotal">—</div>
                <div class="sub">semua shortlink</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon icon-link"><i class="bi bi-link-45deg"></i></div>
            <div class="stat-card-body">
                <div class="label">Via Link</div>
                <div class="value" id="sumLink">—</div>
                <div class="sub">klik langsung</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon icon-qr"><i class="bi bi-qr-code-scan"></i></div>
            <div class="stat-card-body">
                <div class="label">Via QR Code</div>
                <div class="value" id="sumQr">—</div>
                <div class="sub">scan QR</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon icon-unique"><i class="bi bi-people-fill"></i></div>
            <div class="stat-card-body">
                <div class="label">Unique Visitor</div>
                <div class="value" id="sumUnique">—</div>
                <div class="sub">pengunjung unik</div>
            </div>
        </div>
    </div>

    {{-- Summary Cards: Link Tree --}}
    <div class="stat-summary" id="summaryLinktree" style="display:none;">
        <div class="stat-card">
            <div class="stat-card-icon icon-total"><i class="bi bi-eye-fill"></i></div>
            <div class="stat-card-body">
                <div class="label">Page Views</div>
                <div class="value" id="sumLtPageviews">—</div>
                <div class="sub">kunjungan halaman</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon icon-link"><i class="bi bi-cursor-fill"></i></div>
            <div class="stat-card-body">
                <div class="label">Klik Keluar</div>
                <div class="value" id="sumLtClicks">—</div>
                <div class="sub">klik sub link</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon icon-unique"><i class="bi bi-people-fill"></i></div>
            <div class="stat-card-body">
                <div class="label">Unique Visitor</div>
                <div class="value" id="sumLtUnique">—</div>
                <div class="sub">pengunjung unik</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-card-icon icon-qr"><i class="bi bi-percent"></i></div>
            <div class="stat-card-body">
                <div class="label">CTR</div>
                <div class="value" id="sumLtCtr">—</div>
                <div class="sub">click-through rate</div>
            </div>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="chart-card">
        <div class="chart-card-head">
            <h5><i class="bi bi-graph-up me-2"></i>Grafik Kunjungan</h5>
            <div class="chart-controls">
                {{-- Dropdown LT (hanya tampil di tab Link Tree) --}}
                <select class="lt-filter-select" id="ltFilterSelect" style="display:none;" onchange="onLtFilterChange(this.value)">
                    <option value="all">Semua Link Tree</option>
                </select>
                <div class="chart-type-group">
                    <button class="chart-type-btn active" id="typeBar"  onclick="setChartType('bar')"  title="Bar"><i class="bi bi-bar-chart-fill"></i></button>
                    <button class="chart-type-btn"        id="typeLine" onclick="setChartType('line')" title="Line"><i class="bi bi-graph-up"></i></button>
                </div>
                <div class="range-group">
                    <button class="range-btn" data-r="3hour"  onclick="setRange(this)">3 Jam</button>
                    <button class="range-btn active" data-r="day" onclick="setRange(this)">Hari ini</button>
                    <button class="range-btn" data-r="3day"   onclick="setRange(this)">3 Hari</button>
                    <button class="range-btn" data-r="week"   onclick="setRange(this)">Minggu</button>
                    <button class="range-btn" data-r="month"  onclick="setRange(this)">Bulan</button>
                    <button class="range-btn" data-r="3month" onclick="setRange(this)">3 Bulan</button>
                </div>
            </div>
        </div>

        <div class="chart-body">
            <div class="chart-wrap">
                <canvas id="visitChart"></canvas>
                <div class="chart-loading" id="chartLoading">
                    <div class="spin-ring"></div>
                </div>
            </div>
        </div>

        <div class="chart-legend">
            <div class="legend-item">
                <div class="legend-dot" style="background:var(--bar-link-to);"></div>
                Via Link
            </div>
            <div class="legend-item">
                <div class="legend-dot" style="background:var(--bar-qr-to);"></div>
                Via QR Code
            </div>
            <div class="legend-item">
                <div class="legend-dot" style="background:var(--st-icon-unique-cl);"></div>
                Unique Visitor
            </div>
        </div>
    </div>

    {{-- Peringkat --}}
    <div class="chart-card">
        <div class="chart-card-head">
            <h5 id="rankCardTitle"><i class="bi bi-list-ol me-2"></i>Peringkat ShortLink</h5>
            <span style="font-size:0.8rem;color:var(--md-text-secondary);" id="rankCardSub">berdasarkan total kunjungan</span>
        </div>
        {{-- ShortLink rank --}}
        <div id="rankSl">
            <ul class="sl-stat-list" id="rankList">
                <li class="text-center py-5" style="color:var(--md-text-secondary);">
                    <div class="spin-ring mx-auto mb-3"></div>
                    Memuat...
                </li>
            </ul>
            <div class="rank-pagination" id="rankPagination" style="display:none;"></div>
        </div>
        {{-- Link Tree rank --}}
        <div id="rankLt" style="display:none;">
            <ul class="sl-stat-list" id="ltRankList">
                <li class="text-center py-5" style="color:var(--md-text-secondary);">
                    <div class="spin-ring mx-auto mb-3"></div>
                    Memuat...
                </li>
            </ul>
            <div class="rank-pagination" id="ltRankPagination" style="display:none;"></div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
let _chart     = null;
let _chartType = 'bar';
let _range     = 'day';
let _npp       = null;
let _allData   = null;

// ── Baca token CSS ─────────────────────────────
function cssVar(name) {
    return getComputedStyle(document.documentElement).getPropertyValue(name).trim();
}

// ═══════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', () => {
    try {
        _npp = JSON.parse(localStorage.getItem('auth_response')).data.user.npp;
    } catch(e) { /* middleware sudah handle */ }

    initChart();
    loadChart();
    setInterval(loadChart, 120000);

    // Re-init chart saat tema berubah agar warna ikut menyesuaikan
    const observer = new MutationObserver(() => {
        if (_chart) { destroyAndReinit(); }
    });
    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });
});

function destroyAndReinit() {
    if (_chart) { _chart.destroy(); _chart = null; }
    initChart();
    if (_allData) updateChart(_allData);
}

// ═══════════════════════════════════════════════
// CHART INIT
// ═══════════════════════════════════════════════
function initChart() {
    const ctx = document.getElementById('visitChart').getContext('2d');

    const textCl  = cssVar('--chart-text-cl');
    const gridCl  = cssVar('--chart-grid-cl');
    const tipBg   = cssVar('--chart-tooltip-bg');
    const tipBd   = cssVar('--chart-tooltip-bd');
    const tipTitle = cssVar('--chart-tooltip-title');
    const tipBody  = cssVar('--chart-tooltip-body');

    Chart.defaults.color       = textCl;
    Chart.defaults.borderColor = gridCl;
    Chart.defaults.font.family = "'Inter', sans-serif";

    _chart = new Chart(ctx, {
        type: 'bar',
        data: { labels: [], datasets: [] },
        options: {
            responsive:          true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            animation:   { duration: 500, easing: 'easeInOutQuart' },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor:  tipBg,
                    borderColor:      tipBd,
                    borderWidth:      1,
                    padding:          12,
                    titleColor:       tipTitle,
                    bodyColor:        tipBody,
                    titleFont:        { size: 13, weight: '600' },
                    bodyFont:         { size: 12 },
                    callbacks: {
                        label: ctx => ` ${ctx.dataset.label}: ${ctx.parsed.y} kunjungan`,
                    },
                },
            },
            scales: {
                x: {
                    stacked: false,
                    grid:    { color: gridCl },
                    ticks:   { maxRotation: 45, font: { size: 11 }, maxTicksLimit: 16, color: textCl },
                },
                y: {
                    stacked:      false,
                    beginAtZero:  true,
                    grid:         { color: gridCl },
                    ticks: {
                        font:     { size: 11 },
                        stepSize: 1,
                        color:    textCl,
                        callback: v => Number.isInteger(v) ? v : null,
                    },
                },
            },
        },
    });
}

// ═══════════════════════════════════════════════
// UPDATE CHART
// ═══════════════════════════════════════════════
function updateChart(data) {
    const isLine    = _chartType === 'line';
    const linkFrom  = cssVar('--bar-link-from');
    const linkTo    = cssVar('--bar-link-to');
    const qrFrom    = cssVar('--bar-qr-from');
    const qrTo      = cssVar('--bar-qr-to');
    const uniqueCl  = cssVar('--st-icon-unique-cl');

    _chart.config.type  = _chartType;
    _chart.data.labels  = data.labels;
    _chart.data.datasets = [
        {
            label:                'Via Link',
            data:                 data.visits_link,
            backgroundColor:      isLine ? `${linkTo}26` : `${linkTo}b3`,
            borderColor:          linkTo,
            borderWidth:          isLine ? 2 : 0,
            borderRadius:         isLine ? 0 : 4,
            pointBackgroundColor: linkTo,
            pointRadius:          isLine ? 3 : 0,
            fill:                 isLine,
            tension:              0.4,
        },
        {
            label:                'Via QR Code',
            data:                 data.visits_qr,
            backgroundColor:      isLine ? `${qrTo}26` : `${qrTo}b3`,
            borderColor:          qrTo,
            borderWidth:          isLine ? 2 : 0,
            borderRadius:         isLine ? 0 : 4,
            pointBackgroundColor: qrTo,
            pointRadius:          isLine ? 3 : 0,
            fill:                 isLine,
            tension:              0.4,
        },
        {
            label:                'Unique Visitor',
            data:                 data.unique_visitors || [],
            backgroundColor:      isLine ? `${uniqueCl}26` : `${uniqueCl}a6`,
            borderColor:          uniqueCl,
            borderWidth:          isLine ? 2 : 0,
            borderRadius:         isLine ? 0 : 4,
            pointBackgroundColor: uniqueCl,
            pointRadius:          isLine ? 3 : 0,
            fill:                 isLine,
            tension:              0.4,
        },
    ];

    _chart.options.scales.x.stacked = false;
    _chart.options.scales.y.stacked = false;
    _chart.update();
}

// ═══════════════════════════════════════════════
// SUMMARY CARDS
// ═══════════════════════════════════════════════
function updateSummary(data) {
    const totalLink   = data.visits_link.reduce((a, b) => a + b, 0);
    const totalQr     = data.visits_qr.reduce((a, b) => a + b, 0);
    const total       = totalLink + totalQr;
    const totalUnique = data.summary_unique || 0;

    animCount('sumTotal',  total);
    animCount('sumLink',   totalLink);
    animCount('sumQr',     totalQr);
    animCount('sumUnique', totalUnique);
}

function animCount(id, target) {
    const el   = document.getElementById(id);
    const cur  = parseInt(el.textContent) || 0;
    const diff = target - cur;
    if (diff === 0) return;
    const steps = 20; let i = 0;
    const t = setInterval(() => {
        i++;
        el.textContent = Math.round(cur + diff * (i / steps));
        if (i >= steps) clearInterval(t);
    }, 20);
}

// ═══════════════════════════════════════════════
// RANK LIST & PAGINATION
// ═══════════════════════════════════════════════
const RANK_PER_PAGE = 5;
let _rankData = [];
let _rankPage = 1;

// Link Tree pagination state
let _ltRankData = [];
let _ltRankPage = 1;
let _ltRankMode = 'overview';

function renderRankPage(page) {
    const total  = Math.ceil(_rankData.length / RANK_PER_PAGE);
    _rankPage    = Math.max(1, Math.min(page, total));
    const start  = (_rankPage - 1) * RANK_PER_PAGE;
    const slice  = _rankData.slice(start, start + RANK_PER_PAGE);
    const maxV   = _rankData[0]?.visits || 1;

    const linkCl   = cssVar('--bar-link-to');
    const qrCl     = cssVar('--bar-qr-to');
    const uniqueCl = cssVar('--st-icon-unique-cl');

    document.getElementById('rankList').innerHTML = slice.map((sl, i) => {
        const globalRank = start + i;
        const rankClass  = globalRank === 0 ? 'top1' : globalRank === 1 ? 'top2' : globalRank === 2 ? 'top3' : '';
        const pctLink    = Math.round(((sl.visits_link || 0) / maxV) * 100);
        const pctQr      = Math.round(((sl.visits_qr   || 0) / maxV) * 100);
        return `
        <li class="sl-stat-item" style="animation-delay:${i * 0.06}s">
            <div class="sl-stat-rank ${rankClass}">${globalRank + 1}</div>
            <div class="sl-stat-info">
                <div class="sl-stat-short">${esc(sl.short_url)}</div>
                <div class="sl-stat-orig">${esc(trunc(sl.original_url, 55))}</div>
            </div>
            <div class="sl-stat-bars">
                <div class="sl-bar-row">
                    <span class="sl-bar-label" style="color:${linkCl};font-size:0.68rem;">Link</span>
                    <div class="sl-bar-track"><div class="sl-bar-fill link" style="width:${pctLink}%"></div></div>
                    <span class="sl-bar-count">${sl.visits_link || 0}</span>
                </div>
                <div class="sl-bar-row">
                    <span class="sl-bar-label" style="color:${qrCl};font-size:0.68rem;">QR</span>
                    <div class="sl-bar-track"><div class="sl-bar-fill qr" style="width:${pctQr}%"></div></div>
                    <span class="sl-bar-count">${sl.visits_qr || 0}</span>
                </div>
                <div style="font-size:0.72rem;color:${uniqueCl};margin-top:4px;">
                    <i class="bi bi-people-fill"></i> ${sl.unique_visitors || 0} unique visitor
                </div>
            </div>
            <div class="sl-stat-total">${sl.visits || 0}</div>
        </li>`;
    }).join('');

    renderRankPagination(total);
}

function renderRankPagination(total) {
    const el = document.getElementById('rankPagination');
    if (total <= 1) { el.style.display = 'none'; return; }
    el.style.display = 'flex';

    const pages = buildRankPageNumbers(_rankPage, total);
    let html = '';
    html += `<button class="pg-btn" onclick="renderRankPage(${_rankPage - 1})" ${_rankPage === 1 ? 'disabled' : ''} title="Sebelumnya"><i class="bi bi-chevron-left"></i></button>`;
    pages.forEach(p => {
        if (p === '…') html += `<span class="pg-btn" style="cursor:default;opacity:0.4;">…</span>`;
        else html += `<button class="pg-btn ${p === _rankPage ? 'pg-active' : ''}" onclick="renderRankPage(${p})">${p}</button>`;
    });
    html += `<button class="pg-btn" onclick="renderRankPage(${_rankPage + 1})" ${_rankPage === total ? 'disabled' : ''} title="Berikutnya"><i class="bi bi-chevron-right"></i></button>`;
    html += `<div class="pg-divider"></div>`;
    html += `<div class="pg-jump-wrap">
                <button class="pg-hash-btn" id="rankHashBtn" onclick="activateRankJump()" title="Lompat ke halaman">#</button>
                <button class="pg-btn" id="rankJumpGo" onclick="jumpRankPage(${total})" style="display:none;"><i class="bi bi-chevron-right"></i></button>
             </div>`;
    html += `<span class="pg-info">${_rankPage} / ${total}</span>`;
    el.innerHTML = html;
}

function buildRankPageNumbers(cur, total) {
    if (total <= 7) return Array.from({length: total}, (_, i) => i + 1);
    const pages = [1];
    if (cur > 3) pages.push('…');
    const start = Math.max(2, cur - 1);
    const end   = Math.min(total - 1, cur + 1);
    for (let i = start; i <= end; i++) pages.push(i);
    if (cur < total - 2) pages.push('…');
    pages.push(total);
    return pages;
}

function activateRankJump() {
    const btn = document.getElementById('rankHashBtn');
    const go  = document.getElementById('rankJumpGo');
    if (!btn) return;
    btn.classList.add('is-input');
    btn.innerHTML = `<input type="number" class="pg-inline-input" id="rankJumpInput" min="1" placeholder="#" autocomplete="off"
        onblur="deactivateRankJump()"
        onkeydown="if(event.key==='Enter') jumpRankPage(${Math.ceil(_rankData.length/RANK_PER_PAGE)}); if(event.key==='Escape') document.getElementById('rankHashBtn').blur();">`;
    if (go) go.style.display = '';
    setTimeout(() => document.getElementById('rankJumpInput')?.focus(), 10);
}

function deactivateRankJump() {
    setTimeout(() => {
        const btn = document.getElementById('rankHashBtn');
        const go  = document.getElementById('rankJumpGo');
        if (!btn) return;
        btn.classList.remove('is-input');
        btn.style.width = '';
        btn.innerHTML = '#';
        if (go) go.style.display = 'none';
    }, 150);
}

function jumpRankPage(total) {
    const input = document.getElementById('rankJumpInput');
    if (!input) return;
    const val = parseInt(input.value);
    if (!isNaN(val) && val >= 1 && val <= total) renderRankPage(val);
}

function updateRankList(shortlinks) {
    if (!shortlinks || shortlinks.length === 0) {
        document.getElementById('rankList').innerHTML =
            '<li class="text-center py-4" style="color:var(--md-text-secondary);">Belum ada data dalam rentang ini</li>';
        document.getElementById('rankPagination').style.display = 'none';
        return;
    }
    _rankData = [...shortlinks].sort((a, b) => (b.visits || 0) - (a.visits || 0));
    _rankPage = 1;
    renderRankPage(1);
}

// ═══════════════════════════════════════════════
// TAB SWITCH
// ═══════════════════════════════════════════════
let _activeTab = 'shortlink';
let _ltFilterId = 'all';

function switchTab(tab) {
    _activeTab = tab;
    const isSl = tab === 'shortlink';

    document.getElementById('tabBtnSl').classList.toggle('active', isSl);
    document.getElementById('tabBtnLt').classList.toggle('active', !isSl);

    document.getElementById('summaryShortlink').style.display = isSl ? '' : 'none';
    document.getElementById('summaryLinktree').style.display  = isSl ? 'none' : '';
    document.getElementById('rankSl').style.display           = isSl ? '' : 'none';
    document.getElementById('rankLt').style.display           = isSl ? 'none' : '';
    document.getElementById('ltFilterSelect').style.display   = isSl ? 'none' : '';

    const titleEl = document.getElementById('rankCardTitle');
    const subEl   = document.getElementById('rankCardSub');
    if (isSl) {
        titleEl.innerHTML = '<i class="bi bi-list-ol me-2"></i>Peringkat ShortLink';
        subEl.textContent = 'berdasarkan total kunjungan';
    } else {
        titleEl.innerHTML = '<i class="bi bi-list-ol me-2"></i>Peringkat Link Tree';
        subEl.textContent = 'berdasarkan page views';
    }

    loadChart();
}

// ═══════════════════════════════════════════════
// LINK TREE FILTER DROPDOWN
// ═══════════════════════════════════════════════
function onLtFilterChange(val) {
    _ltFilterId = val;
    // Update rank card subtitle for detail mode
    const subEl = document.getElementById('rankCardSub');
    subEl.textContent = val === 'all' ? 'berdasarkan page views' : 'peringkat sub link';
    loadChart();
}

function populateLtDropdown(linktrees) {
    const sel = document.getElementById('ltFilterSelect');
    // Simpan pilihan sebelumnya
    const prev = sel.value;
    sel.innerHTML = '<option value="all">Semua Link Tree</option>';
    linktrees.forEach(lt => {
        const opt = document.createElement('option');
        opt.value       = lt.id;
        opt.textContent = lt.judul + ' (lt/' + lt.kode + ')';
        sel.appendChild(opt);
    });
    // Restore pilihan jika masih valid
    if ([...sel.options].some(o => o.value === String(prev))) sel.value = prev;
    else sel.value = 'all';
    _ltFilterId = sel.value;
}

// ═══════════════════════════════════════════════
// LOAD CHART — override untuk support dual mode
// ═══════════════════════════════════════════════
async function loadChart() {
    if (!_npp) return;
    showLoading(true);

    if (_activeTab === 'shortlink') {
        // Shortlink — sama seperti sebelumnya
        try {
            const resp = await apiFetch(
                `/api/statistik?npp=${encodeURIComponent(_npp)}&range=${_range}&shortlink_id=all`
            );
            const data = await resp.json();
            if (data.status !== 'success') throw new Error(data.message);
            _allData = data;
            updateSummary(data);
            updateChart(data);
            updateRankList(data.shortlinks);
            document.getElementById('lastUpdated').textContent =
                'Diperbarui: ' + new Date().toLocaleTimeString('id-ID');
        } catch(e) {
            console.error('Gagal load statistik:', e);
            document.getElementById('lastUpdated').textContent = '⚠ ' + (e.message || 'Gagal memuat data');
            if (_chart) { _chart.data.labels = []; _chart.data.datasets = []; _chart.update(); }
            ['sumTotal','sumLink','sumQr','sumUnique'].forEach(id => {
                const el = document.getElementById(id); if (el) el.textContent = '—';
            });
        } finally { showLoading(false); }

    } else {
        // Link Tree
        try {
            const url = `/api/statistik/linktree?npp=${encodeURIComponent(_npp)}&range=${_range}&linktree_id=${_ltFilterId}`;
            const resp = await apiFetch(url);
            const data = await resp.json();
            if (data.status !== 'success') throw new Error(data.message);

            _allData = data;
            updateSummaryLt(data);
            updateChart(data);
            populateLtDropdown(data.linktrees || []);
            updateLtRankList(data.rank, data.mode);
            document.getElementById('lastUpdated').textContent =
                'Diperbarui: ' + new Date().toLocaleTimeString('id-ID');
        } catch(e) {
            console.error('Gagal load LT statistik:', e);
            document.getElementById('lastUpdated').textContent = '⚠ ' + (e.message || 'Gagal memuat data');
            if (_chart) { _chart.data.labels = []; _chart.data.datasets = []; _chart.update(); }
            ['sumLtPageviews','sumLtClicks','sumLtUnique','sumLtCtr'].forEach(id => {
                const el = document.getElementById(id); if (el) el.textContent = '—';
            });
        } finally { showLoading(false); }
    }
}

// ═══════════════════════════════════════════════
// SUMMARY LINK TREE
// ═══════════════════════════════════════════════
function updateSummaryLt(data) {
    animCount('sumLtPageviews', data.summary_pageviews || 0);
    animCount('sumLtClicks',    data.summary_clicks    || 0);
    animCount('sumLtUnique',    data.summary_unique    || 0);
    const ctrEl = document.getElementById('sumLtCtr');
    if (ctrEl) ctrEl.textContent = (data.summary_ctr || 0) + '%';
}

// ═══════════════════════════════════════════════
// RANK LIST — LINK TREE (with pagination)
// ═══════════════════════════════════════════════
function updateLtRankList(rank, mode) {
    if (!rank || rank.length === 0) {
        document.getElementById('ltRankList').innerHTML =
            '<li class="text-center py-4" style="color:var(--md-text-secondary);">Belum ada data dalam rentang ini</li>';
        document.getElementById('ltRankPagination').style.display = 'none';
        return;
    }
    _ltRankData = rank;
    _ltRankMode = mode;
    _ltRankPage = 1;
    renderLtRankPage(1);
}

function renderLtRankPage(page) {
    const total = Math.ceil(_ltRankData.length / RANK_PER_PAGE);
    _ltRankPage = Math.max(1, Math.min(page, total));
    const start = (_ltRankPage - 1) * RANK_PER_PAGE;
    const slice = _ltRankData.slice(start, start + RANK_PER_PAGE);

    const ul = document.getElementById('ltRankList');

    if (_ltRankMode === 'overview') {
        ul.innerHTML = slice.map((lt, i) => {
            const globalRank = start + i;
            const rankClass = globalRank === 0 ? 'top1' : globalRank === 1 ? 'top2' : globalRank === 2 ? 'top3' : '';
            return `
            <li class="lt-rank-item" style="animation-delay:${i * 0.05}s">
                <div class="sl-stat-rank ${rankClass}">${globalRank + 1}</div>
                <div class="lt-rank-info">
                    <div class="lt-rank-title">${esc(lt.judul)}</div>
                    <div class="lt-rank-url">${esc(lt.public_url)}</div>
                </div>
                <div class="sl-stat-bars">
                    <div class="sl-bar-row">
                        <span class="sl-bar-label" style="font-size:0.68rem;">Views</span>
                        <span class="sl-bar-count">${lt.page_views}</span>
                    </div>
                    <div class="sl-bar-row">
                        <span class="sl-bar-label" style="font-size:0.68rem;">Klik</span>
                        <span class="sl-bar-count">${lt.total_clicks}</span>
                    </div>
                    <div style="font-size:0.72rem;color:var(--st-icon-unique-cl);margin-top:4px;">
                        <i class="bi bi-people-fill"></i> ${lt.unique_visitors} unique
                    </div>
                </div>
                <span class="lt-ctr-badge">CTR ${lt.ctr}%</span>
            </li>`;
        }).join('');
    } else {
        const maxClicks = _ltRankData[0]?.clicks || 1;
        ul.innerHTML = slice.map((item, i) => {
            const globalRank = start + i;
            const rankClass = globalRank === 0 ? 'top1' : globalRank === 1 ? 'top2' : globalRank === 2 ? 'top3' : '';
            const pct = Math.round((item.clicks / maxClicks) * 100);
            return `
            <li class="lt-rank-item" style="animation-delay:${i * 0.05}s">
                <div class="sl-stat-rank ${rankClass}">${globalRank + 1}</div>
                <div class="lt-rank-info">
                    <div class="lt-rank-title">${esc(item.label)}</div>
                    <div class="lt-rank-url">${esc(trunc(item.url, 55))}</div>
                </div>
                <div class="sl-stat-bars" style="min-width:150px;">
                    <div class="sl-bar-row">
                        <span class="sl-bar-label" style="width:32px;font-size:0.68rem;">Klik</span>
                        <div class="sl-bar-track"><div class="sl-bar-fill link" style="width:${pct}%"></div></div>
                        <span class="sl-bar-count">${item.clicks}</span>
                    </div>
                </div>
                <span class="lt-ctr-badge">${item.percentage}%</span>
            </li>`;
        }).join('');
    }

    renderLtRankPagination(total);
}

function renderLtRankPagination(total) {
    const el = document.getElementById('ltRankPagination');
    if (total <= 1) { el.style.display = 'none'; return; }
    el.style.display = 'flex';

    const pages = buildRankPageNumbers(_ltRankPage, total);
    let html = '';
    html += `<button class="pg-btn" onclick="renderLtRankPage(${_ltRankPage - 1})" ${_ltRankPage === 1 ? 'disabled' : ''} title="Sebelumnya"><i class="bi bi-chevron-left"></i></button>`;
    pages.forEach(p => {
        if (p === '…') html += `<span class="pg-btn" style="cursor:default;opacity:0.4;">…</span>`;
        else html += `<button class="pg-btn ${p === _ltRankPage ? 'pg-active' : ''}" onclick="renderLtRankPage(${p})">${p}</button>`;
    });
    html += `<button class="pg-btn" onclick="renderLtRankPage(${_ltRankPage + 1})" ${_ltRankPage === total ? 'disabled' : ''} title="Berikutnya"><i class="bi bi-chevron-right"></i></button>`;
    html += `<div class="pg-divider"></div>`;
    html += `<div class="pg-jump-wrap">
                <button class="pg-hash-btn" id="ltRankHashBtn" onclick="activateLtRankJump()" title="Lompat ke halaman">#</button>
                <button class="pg-btn" id="ltRankJumpGo" onclick="jumpLtRankPage(${total})" style="display:none;"><i class="bi bi-chevron-right"></i></button>
             </div>`;
    html += `<span class="pg-info">${_ltRankPage} / ${total}</span>`;
    el.innerHTML = html;
}

function activateLtRankJump() {
    const btn = document.getElementById('ltRankHashBtn');
    const go  = document.getElementById('ltRankJumpGo');
    if (!btn) return;
    btn.classList.add('is-input');
    btn.innerHTML = `<input type="number" class="pg-inline-input" id="ltRankJumpInput" min="1" placeholder="#" autocomplete="off"
        onblur="deactivateLtRankJump()"
        onkeydown="if(event.key==='Enter') jumpLtRankPage(${Math.ceil(_ltRankData.length/RANK_PER_PAGE)}); if(event.key==='Escape') document.getElementById('ltRankHashBtn').blur();">`;
    if (go) go.style.display = '';
    setTimeout(() => document.getElementById('ltRankJumpInput')?.focus(), 10);
}

function deactivateLtRankJump() {
    setTimeout(() => {
        const btn = document.getElementById('ltRankHashBtn');
        const go  = document.getElementById('ltRankJumpGo');
        if (!btn) return;
        btn.classList.remove('is-input');
        btn.style.width = '';
        btn.innerHTML = '#';
        if (go) go.style.display = 'none';
    }, 150);
}

function jumpLtRankPage(total) {
    const input = document.getElementById('ltRankJumpInput');
    if (!input) return;
    const val = parseInt(input.value);
    if (!isNaN(val) && val >= 1 && val <= total) renderLtRankPage(val);
}

// ═══════════════════════════════════════════════
// CONTROLS
// ═══════════════════════════════════════════════
function setRange(btn) {
    _range = btn.dataset.r;
    document.querySelectorAll('.range-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    loadChart();
}

function setChartType(type) {
    _chartType = type;
    document.getElementById('typeBar').classList.toggle('active',  type === 'bar');
    document.getElementById('typeLine').classList.toggle('active', type === 'line');
    if (_allData) updateChart(_allData);
}

function showLoading(on) {
    document.getElementById('chartLoading').classList.toggle('hidden', !on);
}

// ═══════════════════════════════════════════════
// UTILS
// ═══════════════════════════════════════════════
function trunc(s, n) { return s && s.length > n ? s.slice(0, n) + '…' : (s || ''); }
function esc(s) {
    return String(s || '')
        .replace(/&/g,'&amp;').replace(/"/g,'&quot;')
        .replace(/'/g,'&#39;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}
</script>
@endpush
