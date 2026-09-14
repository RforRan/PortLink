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
   LINK TREE — theme-aware tokens
===================================================== */
:root {
    --lt-accent:              #1c6b3a;
    --lt-accent-bg:           rgba(28,107,58,0.09);
    --lt-accent-border:       rgba(28,107,58,0.28);
    --lt-accent-hover-bg:     rgba(28,107,58,0.16);
    --lt-accent-hover-border: rgba(28,107,58,0.55);
    --lt-item-hover-bg:       rgba(0,0,0,0.025);
    --lt-short-cl:            #1c6b3a;
    --lt-badge-bg:            rgba(28,107,58,0.09);
    --lt-badge-bd:            rgba(28,107,58,0.22);
    --lt-badge-cl:            #1c6b3a;
    --lt-ctr-bg:              rgba(43,90,140,0.09);
    --lt-ctr-bd:              rgba(43,90,140,0.22);
    --lt-ctr-cl:              #2b5a8c;

    /* Spinner */
    --spinner-bd:             rgba(0,0,0,0.08);
    --spinner-top:            #1c6b3a;

    /* Panel */
    --fp-backdrop-bg:         rgba(0,0,0,0.45);
    --fp-panel-shadow:        0 20px 60px rgba(0,0,0,0.22), 0 0 0 1px rgba(0,0,0,0.06);
    --fp-error-cl:            #892222;
    --fp-warn-bg:             rgba(137,34,34,0.08);
    --fp-warn-bd:             rgba(137,34,34,0.22);
    --fp-warn-left:           #892222;
    --fp-warn-cl:             #892222;
    --fp-warn-strong:         #6e1a1a;
    --fp-input-focus-sh:      rgba(28,107,58,0.12);
    --fp-input-focus-bd:      rgba(28,107,58,0.55);
    --fp-close-hover-bg:      rgba(137,34,34,0.10);
    --fp-close-hover-bd:      rgba(137,34,34,0.30);
    --fp-close-hover-cl:      #892222;
    --fp-spinner-bd:          rgba(0,0,0,0.10);

    /* Panel buttons */
    --fp-btn-cancel-hover-bg: rgba(0,0,0,0.06);
    --fp-btn-cancel-hover-bd: rgba(0,0,0,0.14);
    --fp-btn-cancel-hover-cl: var(--md-text-primary);
    --fp-btn-save-bg:         rgba(43,90,140,0.12);
    --fp-btn-save-bd:         rgba(43,90,140,0.32);
    --fp-btn-save-cl:         #2b5a8c;
    --fp-btn-save-hover-bg:   rgba(43,90,140,0.22);
    --fp-btn-save-hover-bd:   rgba(43,90,140,0.55);
    --fp-btn-save-hover-cl:   #1d3d66;
    --fp-btn-delete-bg:       rgba(137,34,34,0.10);
    --fp-btn-delete-bd:       rgba(137,34,34,0.30);
    --fp-btn-delete-cl:       #892222;
    --fp-btn-delete-hover-bg: rgba(137,34,34,0.20);
    --fp-btn-delete-hover-bd: rgba(137,34,34,0.55);
    --fp-btn-delete-hover-cl: #6e1a1a;
    --fp-btn-open-bg:         rgba(28,107,58,0.10);
    --fp-btn-open-bd:         rgba(28,107,58,0.30);
    --fp-btn-open-cl:         #1c6b3a;
    --fp-btn-open-hover-bg:   rgba(28,107,58,0.20);
    --fp-btn-open-hover-bd:   rgba(28,107,58,0.55);
    --fp-btn-open-hover-cl:   #135028;
    --btn-qr-dl-bg:           rgba(0,0,0,0.04);
    --btn-qr-dl-hover-bg:     rgba(0,0,0,0.08);
    --btn-qr-dl-hover-bd:     rgba(0,0,0,0.16);

    /* Sidebar nav items */
    --sb-eyebrow-cl:          rgba(0,0,0,0.45);
    --sb-short-cl:            #1c6b3a;
    --sb-orig-cl:             rgba(0,0,0,0.45);
    --fp-nav-icon-bg:         rgba(0,0,0,0.05);
    --nav-info-hover-bg:      rgba(43,90,140,0.08);
    --nav-info-hover-bd:      rgba(43,90,140,0.18);
    --nav-info-hover-cl:      #2b5a8c;
    --nav-info-active-bg:     rgba(43,90,140,0.13);
    --nav-info-active-bd:     rgba(43,90,140,0.32);
    --nav-info-active-cl:     #2b5a8c;
    --nav-info-icon-bg:       rgba(43,90,140,0.13);
    --nav-edit-hover-bg:      rgba(43,75,150,0.08);
    --nav-edit-hover-bd:      rgba(43,75,150,0.18);
    --nav-edit-hover-cl:      #2b4b96;
    --nav-edit-active-bg:     rgba(43,75,150,0.13);
    --nav-edit-active-bd:     rgba(43,75,150,0.32);
    --nav-edit-active-cl:     #2b4b96;
    --nav-edit-icon-bg:       rgba(43,75,150,0.13);
    --nav-delete-cl:          #892222;
    --nav-delete-hover-bg:    rgba(137,34,34,0.08);
    --nav-delete-hover-bd:    rgba(137,34,34,0.22);
    --nav-delete-hover-cl:    #6e1a1a;
    --nav-delete-active-bg:   rgba(137,34,34,0.13);
    --nav-delete-active-bd:   rgba(137,34,34,0.32);
    --nav-delete-active-cl:   #6e1a1a;
    --nav-delete-icon-bg:     rgba(137,34,34,0.10);
    --nav-delete-icon-cl:     #892222;

    /* Toast */
    --toast-success-bg:       #ecf4ed;
    --toast-success-bd:       #3a8a5a;
    --toast-success-cl:       #1c6b3a;
    --toast-error-bg:         rgba(137,34,34,0.09);
    --toast-error-bd:         rgba(137,34,34,0.35);
    --toast-error-cl:         #892222;

    /* Item input row */
    --item-row-bg:            rgba(0,0,0,0.02);
    --item-row-bd:            rgba(0,0,0,0.08);
    --item-remove-cl:         #892222;
    --item-remove-hover-bg:   rgba(137,34,34,0.08);
    --item-remove-hover-bd:   rgba(137,34,34,0.22);

    --bg-grid-line:           rgba(0,0,0,0.04);
    --bg-blob-1:              rgba(107,155,122,0.09);
    --bg-blob-2:              rgba(100,130,200,0.06);
    --bg-blob-3:              rgba(179,155,107,0.05);

    /* Pagination */
    --pg-btn-bg:              rgba(255,255,255,0.55);
    --pg-btn-hover-bg:        rgba(255,255,255,0.85);
    --pg-btn-hover-bd:        rgba(0,0,0,0.16);
    --pg-btn-hover-cl:        #1c6b3a;
    --pg-active-bg:           rgba(28,107,58,0.13);
    --pg-active-bd:           rgba(28,107,58,0.36);
    --pg-active-cl:           #1c6b3a;
    --pg-hash-hover-bg:       rgba(255,255,255,0.85);
    --pg-hash-hover-bd:       rgba(0,0,0,0.16);
    --pg-hash-hover-cl:       var(--md-text-primary);
    --pg-hash-input-bd:       rgba(28,107,58,0.50);
    --pg-hash-input-sh:       rgba(28,107,58,0.12);
}

[data-theme="dark"] {
    --lt-accent:              #8bc99f;
    --lt-accent-bg:           rgba(107,155,122,0.12);
    --lt-accent-border:       rgba(107,155,122,0.28);
    --lt-accent-hover-bg:     rgba(107,155,122,0.22);
    --lt-accent-hover-border: rgba(107,155,122,0.60);
    --lt-item-hover-bg:       rgba(255,255,255,0.025);
    --lt-short-cl:            #8bc99f;
    --lt-badge-bg:            rgba(107,155,122,0.12);
    --lt-badge-bd:            rgba(107,155,122,0.28);
    --lt-badge-cl:            #8bc99f;
    --lt-ctr-bg:              rgba(154,176,197,0.12);
    --lt-ctr-bd:              rgba(154,176,197,0.28);
    --lt-ctr-cl:              #c2d4e8;
    --spinner-bd:             rgba(255,255,255,0.10);
    --spinner-top:            #8bc99f;
    --fp-backdrop-bg:         rgba(0,0,0,0.65);
    --fp-panel-shadow:        0 20px 60px rgba(0,0,0,0.7), 0 0 0 1px rgba(255,255,255,0.06);
    --fp-error-cl:            #d98989;
    --fp-warn-bg:             rgba(179,107,107,0.10);
    --fp-warn-bd:             rgba(179,107,107,0.28);
    --fp-warn-left:           #b36b6b;
    --fp-warn-cl:             #d98989;
    --fp-warn-strong:         #f0a0a0;
    --fp-input-focus-sh:      rgba(107,155,122,0.12);
    --fp-input-focus-bd:      rgba(107,155,122,0.55);
    --fp-close-hover-bg:      rgba(179,107,107,0.15);
    --fp-close-hover-bd:      rgba(179,107,107,0.30);
    --fp-close-hover-cl:      #d98989;
    --fp-spinner-bd:          rgba(255,255,255,0.10);
    --fp-btn-cancel-hover-bg: rgba(255,255,255,0.08);
    --fp-btn-cancel-hover-bd: rgba(255,255,255,0.18);
    --fp-btn-cancel-hover-cl: var(--md-text-primary);
    --fp-btn-save-bg:         rgba(154,176,197,0.15);
    --fp-btn-save-bd:         rgba(154,176,197,0.35);
    --fp-btn-save-cl:         #c2d4e8;
    --fp-btn-save-hover-bg:   rgba(154,176,197,0.28);
    --fp-btn-save-hover-bd:   rgba(154,176,197,0.60);
    --fp-btn-save-hover-cl:   #ddeaf5;
    --fp-btn-delete-bg:       rgba(179,107,107,0.15);
    --fp-btn-delete-bd:       rgba(179,107,107,0.35);
    --fp-btn-delete-cl:       #d98989;
    --fp-btn-delete-hover-bg: rgba(179,107,107,0.28);
    --fp-btn-delete-hover-bd: rgba(179,107,107,0.60);
    --fp-btn-delete-hover-cl: #f0a0a0;
    --fp-btn-open-bg:         rgba(107,155,122,0.15);
    --fp-btn-open-bd:         rgba(107,155,122,0.35);
    --fp-btn-open-cl:         #8bc99f;
    --fp-btn-open-hover-bg:   rgba(107,155,122,0.28);
    --fp-btn-open-hover-bd:   rgba(107,155,122,0.60);
    --fp-btn-open-hover-cl:   #aaddb8;
    --btn-qr-dl-bg:           rgba(255,255,255,0.04);
    --btn-qr-dl-hover-bg:     rgba(255,255,255,0.08);
    --btn-qr-dl-hover-bd:     rgba(255,255,255,0.16);
    --sb-eyebrow-cl:          rgba(255,255,255,0.35);
    --sb-short-cl:            #8bc99f;
    --sb-orig-cl:             rgba(255,255,255,0.35);
    --fp-nav-icon-bg:         rgba(255,255,255,0.06);
    --nav-info-hover-bg:      rgba(154,176,197,0.10);
    --nav-info-hover-bd:      rgba(154,176,197,0.22);
    --nav-info-hover-cl:      #c2d4e8;
    --nav-info-active-bg:     rgba(154,176,197,0.18);
    --nav-info-active-bd:     rgba(154,176,197,0.40);
    --nav-info-active-cl:     #c2d4e8;
    --nav-info-icon-bg:       rgba(154,176,197,0.18);
    --nav-edit-hover-bg:      rgba(154,176,197,0.10);
    --nav-edit-hover-bd:      rgba(154,176,197,0.22);
    --nav-edit-hover-cl:      #c2d4e8;
    --nav-edit-active-bg:     rgba(154,176,197,0.18);
    --nav-edit-active-bd:     rgba(154,176,197,0.40);
    --nav-edit-active-cl:     #c2d4e8;
    --nav-edit-icon-bg:       rgba(154,176,197,0.18);
    --nav-delete-cl:          #d98989;
    --nav-delete-hover-bg:    rgba(179,107,107,0.10);
    --nav-delete-hover-bd:    rgba(179,107,107,0.25);
    --nav-delete-hover-cl:    #f0a0a0;
    --nav-delete-active-bg:   rgba(179,107,107,0.18);
    --nav-delete-active-bd:   rgba(179,107,107,0.40);
    --nav-delete-active-cl:   #f0a0a0;
    --nav-delete-icon-bg:     rgba(179,107,107,0.15);
    --nav-delete-icon-cl:     #d98989;
    --toast-success-bg:       rgba(107,155,122,0.15);
    --toast-success-bd:       #6b9b7a;
    --toast-success-cl:       #8bc99f;
    --toast-error-bg:         rgba(179,107,107,0.15);
    --toast-error-bd:         #b36b6b;
    --toast-error-cl:         #d98989;
    --item-row-bg:            rgba(255,255,255,0.03);
    --item-row-bd:            rgba(255,255,255,0.08);
    --item-remove-cl:         #d98989;
    --item-remove-hover-bg:   rgba(179,107,107,0.12);
    --item-remove-hover-bd:   rgba(179,107,107,0.28);
    --bg-grid-line:           rgba(255,255,255,0.018);
    --bg-blob-1:              rgba(107,155,122,0.06);
    --bg-blob-2:              rgba(100,130,200,0.04);
    --bg-blob-3:              rgba(179,155,107,0.03);

    /* Pagination dark */
    --pg-btn-bg:              rgba(255,255,255,0.05);
    --pg-btn-hover-bg:        rgba(255,255,255,0.10);
    --pg-btn-hover-bd:        rgba(255,255,255,0.18);
    --pg-btn-hover-cl:        #8bc99f;
    --pg-active-bg:           rgba(107,155,122,0.20);
    --pg-active-bd:           rgba(107,155,122,0.45);
    --pg-active-cl:           #8bc99f;
    --pg-hash-hover-bg:       rgba(255,255,255,0.10);
    --pg-hash-hover-bd:       rgba(255,255,255,0.18);
    --pg-hash-hover-cl:       var(--md-text-primary);
    --pg-hash-input-bd:       rgba(107,155,122,0.55);
    --pg-hash-input-sh:       rgba(107,155,122,0.14);
}

/* ── Animations ── */
@keyframes fadeUp  { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
@keyframes fadeIn  { from { opacity:0; } to { opacity:1; } }
@keyframes spin    { to { transform:rotate(360deg); } }
@keyframes pulse   { 0%,100%{opacity:0.4;transform:scale(1);} 50%{opacity:0.7;transform:scale(1.08);} }
@keyframes slideIn { from { transform:translateX(100%); opacity:0; } to { transform:translateX(0); opacity:1; } }
@keyframes toastIn { from { opacity:0; transform:translateY(16px) scale(0.97); } to { opacity:1; transform:translateY(0) scale(1); } }

/* ── Background ── */
.bg-layer { position:fixed; inset:0; overflow:hidden; z-index:0; pointer-events:none; }
.bg-grid {
    position:absolute; inset:0;
    background-image: linear-gradient(var(--bg-grid-line) 1px, transparent 1px),
                      linear-gradient(90deg, var(--bg-grid-line) 1px, transparent 1px);
    background-size: 40px 40px;
}
.bg-blob { position:absolute; border-radius:50%; filter:blur(60px); animation:pulse 8s ease-in-out infinite; }
.bg-blob-1 { width:500px; height:500px; top:-150px; right:-100px; background:var(--bg-blob-1); }
.bg-blob-2 { width:400px; height:400px; bottom:-100px; left:-80px; background:var(--bg-blob-2); animation-delay:-3s; }
.bg-blob-3 { width:300px; height:300px; top:40%; left:50%; background:var(--bg-blob-3); animation-delay:-6s; }

/* ── Header ── */
.md-header { margin-bottom:28px; animation:fadeUp 0.35s ease-out both; }
.md-header h3 { font-size:1.75rem; font-weight:700; color:var(--md-text-primary); letter-spacing:-0.02em; margin:0 0 4px; }
.md-header p  { font-size:0.9375rem; color:var(--md-text-secondary); margin:0; }

/* ── Card ── */
.md-card {
    background:var(--md-bg-card); border:1px solid var(--md-border);
    border-radius:12px; box-shadow:var(--md-elevation-2);
    margin-bottom:24px; transition:box-shadow 0.3s; animation:fadeIn 0.4s ease-out;
}
.md-card:hover { box-shadow:var(--md-elevation-4); }
.md-card-header {
    background:var(--md-bg-elevated); border-bottom:1px solid var(--md-border);
    padding:20px 24px; display:flex; justify-content:space-between; align-items:center;
    border-radius:12px 12px 0 0;
}
.md-card-header h5 { margin:0; font-weight:600; font-size:1.25rem; color:var(--md-text-primary); }
.md-badge {
    background:var(--md-bg-elevated); color:var(--md-text-primary);
    border:1px solid var(--md-border); padding:8px 16px;
    font-weight:500; font-size:0.875rem; border-radius:20px;
}
.md-spinner {
    width:48px; height:48px;
    border:4px solid var(--spinner-bd); border-top-color:var(--spinner-top);
    border-radius:50%; animation:spin 1s linear infinite;
}
.md-empty-icon { font-size:4rem; color:var(--md-text-disabled); opacity:0.5; }

/* ── List items ── */
.lt-list { list-style:none; margin:0; padding:0; }
.lt-item {
    display:flex; align-items:stretch;
    border-bottom:1px solid var(--md-border);
    padding:16px 20px; gap:16px;
    transition:background 0.15s; position:relative; cursor:pointer;
}
.lt-item:last-child { border-bottom:none; }
.lt-item:hover { background:var(--lt-item-hover-bg); }

/* QR thumbnail */
.lt-qr {
    flex-shrink:0; width:72px; height:72px;
    background:#fff; border-radius:8px; padding:4px;
    display:flex; align-items:center; justify-content:center;
    box-shadow:0 2px 8px rgba(0,0,0,0.4); align-self:center;
}
.lt-qr canvas { width:64px!important; height:64px!important; }

/* Color dot */
.lt-color-dot {
    width:10px; height:10px; border-radius:50%;
    flex-shrink:0; align-self:center;
    border:1px solid rgba(0,0,0,0.12);
}

/* Main info */
.lt-info { flex:1; min-width:0; display:flex; flex-direction:column; justify-content:center; gap:4px; }
.lt-judul {
    font-size:0.9375rem; font-weight:600; color:var(--md-text-primary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.lt-url {
    font-size:0.8125rem; font-weight:500; color:var(--lt-short-cl);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
    text-decoration:none;
}
.lt-url:hover { text-decoration:underline; }
.lt-desc-preview {
    font-size:0.775rem; color:var(--md-text-disabled);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.lt-item-count {
    font-size:0.75rem; color:var(--md-text-secondary);
    display:flex; align-items:center; gap:4px;
}

/* Stats badges */
.lt-stats {
    display:flex; flex-direction:column; align-items:flex-end;
    justify-content:center; gap:6px; flex-shrink:0;
}
.lt-stat-badge {
    font-size:0.75rem; font-weight:500; padding:3px 10px;
    border-radius:20px; white-space:nowrap;
    display:flex; align-items:center; gap:4px;
}
.lt-stat-badge.visits {
    background:var(--lt-badge-bg); border:1px solid var(--lt-badge-bd); color:var(--lt-badge-cl);
}
.lt-stat-badge.ctr {
    background:var(--lt-ctr-bg); border:1px solid var(--lt-ctr-bd); color:var(--lt-ctr-cl);
}
.lt-date { font-size:0.72rem; color:var(--md-text-disabled); text-align:right; }

/* Gear button */
.lt-gear {
    flex-shrink:0; align-self:center;
    width:32px; height:32px; border-radius:8px;
    display:flex; align-items:center; justify-content:center;
    border:1px solid transparent; background:transparent;
    color:var(--md-text-disabled); font-size:1rem; cursor:pointer;
    transition:all 0.16s;
}
.lt-gear:hover { background:var(--lt-accent-bg); border-color:var(--lt-accent-border); color:var(--lt-accent); }
.lt-gear.is-active { background:var(--lt-accent-hover-bg); border-color:var(--lt-accent-hover-border); color:var(--lt-accent); }

/* =====================================================
   PAGINATION
===================================================== */
.sl-pagination {
    display:flex; align-items:center; justify-content:center;
    gap:6px; padding:16px 20px;
    border-top:1px solid var(--md-border);
}
.pg-btn {
    min-width:36px; height:36px; border-radius:9px;
    border:1px solid var(--md-border);
    background:var(--pg-btn-bg);
    color:var(--md-text-secondary);
    display:inline-flex; align-items:center; justify-content:center;
    cursor:pointer; font-size:0.875rem; font-weight:500;
    font-family:'Inter',sans-serif;
    transition:all 0.18s cubic-bezier(0.4,0,0.2,1);
    user-select:none; line-height:1;
    text-decoration:none; padding:0 10px;
}
.pg-btn:hover:not(:disabled):not(.pg-active) {
    background:var(--pg-btn-hover-bg);
    border-color:var(--pg-btn-hover-bd);
    color:var(--pg-btn-hover-cl);
}
.pg-btn.pg-active {
    background:var(--pg-active-bg);
    border-color:var(--pg-active-bd);
    color:var(--pg-active-cl);
    font-weight:700;
    cursor:default;
}
.pg-btn:disabled { opacity:0.3; cursor:not-allowed; }
.pg-divider { width:1px; height:24px; background:var(--md-border); margin:0 4px; }
.pg-jump-wrap { display:flex; align-items:center; gap:4px; }
.pg-hash-btn {
    width:36px; height:36px; border-radius:9px;
    border:1px solid var(--md-border); background:var(--pg-btn-bg);
    color:var(--md-text-secondary);
    display:inline-flex; align-items:center; justify-content:center;
    font-size:0.875rem; font-weight:600; cursor:pointer;
    font-family:'Inter',sans-serif;
    transition:all 0.18s cubic-bezier(0.4,0,0.2,1);
}
.pg-hash-btn:hover { background:var(--pg-hash-hover-bg); color:var(--pg-hash-hover-cl); border-color:var(--pg-hash-hover-bd); }
.pg-hash-btn.is-input {
    width:52px; background:var(--pg-btn-bg);
    border-color:var(--pg-hash-input-bd);
    box-shadow:0 0 0 3px var(--pg-hash-input-sh);
    color:var(--md-text-primary); cursor:text; font-weight:400;
}
.pg-inline-input {
    width:100%; height:100%; border:none; background:transparent;
    color:var(--md-text-primary); text-align:center;
    font-size:0.875rem; font-family:'Inter',sans-serif; outline:none; padding:0;
}
.pg-inline-input::-webkit-inner-spin-button,
.pg-inline-input::-webkit-outer-spin-button { -webkit-appearance:none; }
.pg-info { font-size:0.72rem; color:var(--md-text-disabled); white-space:nowrap; padding:0 4px; }

/* ── Create form (collapsible) ── */
.lt-create-header {
    display:flex; align-items:center; gap:12px;
    padding:18px 24px; cursor:pointer; user-select:none;
    border-radius:12px; transition:background 0.2s;
}
.lt-create-header:hover { background:rgba(0,0,0,0.03); }
[data-theme="dark"] .lt-create-header:hover { background:rgba(255,255,255,0.03); }
.lt-create-header.is-open { background:rgba(0,0,0,0.03); border-radius:12px 12px 0 0; }
[data-theme="dark"] .lt-create-header.is-open { background:rgba(255,255,255,0.03); }
.lt-create-icon {
    width:36px; height:36px; border-radius:9px; flex-shrink:0;
    background:var(--lt-accent-bg); border:1px solid var(--lt-accent-border);
    color:var(--lt-accent); display:flex; align-items:center; justify-content:center; font-size:1.05rem;
    transition:background 0.2s, border-color 0.2s;
}
.lt-create-header:hover .lt-create-icon,
.lt-create-header.is-open .lt-create-icon { background:var(--lt-accent-hover-bg); border-color:var(--lt-accent-hover-border); }
.lt-create-title { font-weight:600; font-size:0.9375rem; color:var(--md-text-primary); }
.lt-create-sub   { font-size:0.8rem; color:var(--md-text-secondary); }
.lt-create-chevron { margin-left:auto; color:var(--md-text-disabled); font-size:1rem; transition:transform 0.3s; }
.lt-create-header.is-open .lt-create-chevron { transform:rotate(180deg); }
.lt-create-body {
    padding:0 24px; max-height:0; overflow:hidden;
    transition:max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.3s;
}
.lt-create-body.is-open { max-height:1200px; padding:0 24px 24px; }

/* ── Form inputs ── */
.fp-label { font-size:0.8125rem; font-weight:600; color:var(--md-text-secondary); margin-bottom:6px; display:block; }
.fp-input {
    width:100%; padding:10px 13px; border-radius:8px;
    border:1px solid var(--md-border); background:var(--md-bg-elevated);
    color:var(--md-text-primary); font-size:0.875rem; font-family:'Inter',sans-serif;
    outline:none; transition:border-color 0.2s, box-shadow 0.2s;
}
.fp-input:hover { background:rgba(0,0,0,0.025); }
[data-theme="dark"] .fp-input:hover { background:rgba(255,255,255,0.04); }
.fp-input:focus { border-color:var(--fp-input-focus-bd); box-shadow:0 0 0 3px var(--fp-input-focus-sh); }
.fp-input::placeholder { color:var(--md-text-disabled); }
.fp-hint  { font-size:0.78rem; color:var(--md-text-secondary); margin-top:5px; }
.fp-error { font-size:0.78rem; color:var(--fp-error-cl); margin-top:5px; display:none; }

/* Color picker wrapper */
.color-pick-wrap {
    display:flex; align-items:center; gap:10px;
}
.color-pick-wrap input[type=color] {
    width:40px; height:36px; border-radius:8px;
    border:1px solid var(--md-border); padding:2px; cursor:pointer;
    background:var(--md-bg-elevated);
}
.color-pick-hex {
    flex:1; font-family:monospace; letter-spacing:0.05em;
}

/* Items list in form */
.lt-items-list { display:flex; flex-direction:column; gap:8px; margin-bottom:10px; }
.lt-item-row {
    display:flex; gap:8px; align-items:center;
    padding:10px 12px; border-radius:9px;
    background:var(--item-row-bg); border:1px solid var(--item-row-bd);
}
.lt-item-row input { flex:1; min-width:0; }
.lt-item-row .fp-input { padding:8px 10px; }
.lt-item-remove {
    flex-shrink:0; width:28px; height:28px; border-radius:7px;
    border:1px solid transparent; background:transparent;
    color:var(--item-remove-cl); cursor:pointer; font-size:0.9rem;
    display:flex; align-items:center; justify-content:center;
    transition:all 0.15s;
}
.lt-item-remove:hover { background:var(--item-remove-hover-bg); border-color:var(--item-remove-hover-bd); }

.lt-add-item-btn {
    display:flex; align-items:center; gap:6px;
    padding:8px 14px; border-radius:8px;
    border:1px dashed var(--md-border); background:transparent;
    color:var(--md-text-secondary); font-size:0.85rem; cursor:pointer;
    font-family:'Inter',sans-serif; transition:all 0.15s; width:100%;
    justify-content:center;
}
.lt-add-item-btn:hover { border-color:var(--lt-accent-border); color:var(--lt-accent); background:var(--lt-accent-bg); }

/* Form action buttons */
.lt-create-actions { display:flex; gap:10px; justify-content:flex-end; margin-top:20px; }
.fp-btn {
    padding:10px 20px; border-radius:8px; font-size:0.875rem; font-weight:500;
    cursor:pointer; border:1px solid transparent;
    display:inline-flex; align-items:center; gap:7px;
    transition:all 0.18s cubic-bezier(0.4,0,0.2,1);
    font-family:'Inter',sans-serif; letter-spacing:0.01em;
}
.fp-btn-cancel { background:var(--md-bg-elevated); border-color:var(--md-border); color:var(--md-text-secondary); }
.fp-btn-cancel:hover { background:var(--fp-btn-cancel-hover-bg); border-color:var(--fp-btn-cancel-hover-bd); color:var(--fp-btn-cancel-hover-cl); }
.fp-btn-save { background:var(--fp-btn-save-bg); border-color:var(--fp-btn-save-bd); color:var(--fp-btn-save-cl); }
.fp-btn-save:hover { background:var(--fp-btn-save-hover-bg); border-color:var(--fp-btn-save-hover-bd); color:var(--fp-btn-save-hover-cl); transform:translateY(-1px); }
.fp-btn-save:disabled { opacity:0.35; cursor:not-allowed; transform:none; }
.fp-btn-delete { background:var(--fp-btn-delete-bg); border-color:var(--fp-btn-delete-bd); color:var(--fp-btn-delete-cl); }
.fp-btn-delete:hover { background:var(--fp-btn-delete-hover-bg); border-color:var(--fp-btn-delete-hover-bd); color:var(--fp-btn-delete-hover-cl); transform:translateY(-1px); }
.fp-btn-delete:disabled { opacity:0.35; cursor:not-allowed; transform:none; }
.fp-btn-open { background:var(--fp-btn-open-bg); border-color:var(--fp-btn-open-bd); color:var(--fp-btn-open-cl); }
.fp-btn-open:hover { background:var(--fp-btn-open-hover-bg); border-color:var(--fp-btn-open-hover-bd); color:var(--fp-btn-open-hover-cl); transform:translateY(-1px); }
.btn-qr-dl {
    display:inline-flex; align-items:center; gap:7px; padding:8px 14px; border-radius:8px;
    background:var(--btn-qr-dl-bg); border:1px solid var(--md-border);
    color:var(--md-text-secondary); cursor:pointer; font-size:0.8rem; font-family:'Inter',sans-serif; transition:all 0.15s;
}
.btn-qr-dl:hover { background:var(--btn-qr-dl-hover-bg); border-color:var(--btn-qr-dl-hover-bd); color:var(--md-text-primary); }
.fp-spinner { width:14px; height:14px; border:2px solid var(--fp-spinner-bd); border-top-color:currentColor; border-radius:50%; animation:spin 0.7s linear infinite; display:none; }

/* ── Floating panel — pola data-shortlink (modal di tengah) ── */
.fp-backdrop {
    position:fixed; inset:0;
    background:var(--fp-backdrop-bg); backdrop-filter:blur(6px);
    z-index:3000; opacity:0; visibility:hidden;
    transition:opacity 0.25s, visibility 0.25s;
}
.fp-backdrop.show { opacity:1; visibility:visible; }

.fp-panel {
    position:fixed; top:50%; left:50%;
    transform:translate(-50%,-50%) scale(0.95);
    z-index:3001;
    width:min(820px, 94vw);
    max-height:min(560px, 92vh);
    height:min(560px, 92vh);
    background:var(--md-bg-card);
    border:1px solid var(--md-border);
    border-radius:18px;
    box-shadow:var(--fp-panel-shadow);
    display:flex; overflow:hidden;
    opacity:0; visibility:hidden;
    transition:opacity 0.28s cubic-bezier(0.4,0,0.2,1),
                visibility 0.28s,
                transform 0.28s cubic-bezier(0.34,1.35,0.64,1);
}
.fp-panel.show { opacity:1; visibility:visible; transform:translate(-50%,-50%) scale(1); }

/* Kiri: konten */
.fp-content {
    flex:1; min-width:0; display:flex; flex-direction:column;
    border-right:1px solid var(--md-border); overflow:hidden;
}
.fp-content-head {
    padding:22px 26px 18px; border-bottom:1px solid var(--md-border);
    display:flex; align-items:center; gap:14px; flex-shrink:0;
}
.fp-page-icon {
    width:44px; height:44px; border-radius:11px;
    display:flex; align-items:center; justify-content:center;
    font-size:1.25rem; flex-shrink:0;
}
.fp-page-icon.icon-info   { background:var(--fp-icon-info-bg,rgba(43,90,140,0.10));   color:var(--fp-icon-info-cl,#2b5a8c); }
.fp-page-icon.icon-stat   { background:var(--lt-accent-bg);   color:var(--lt-accent); }
.fp-page-icon.icon-edit   { background:rgba(43,75,150,0.10);  color:#2b4b96; }
.fp-page-icon.icon-delete { background:var(--fp-warn-bg);     color:var(--fp-warn-cl); }
[data-theme="dark"] .fp-page-icon.icon-edit { background:rgba(154,176,197,0.15); color:#c2d4e8; }

.fp-page-title { font-size:1.05rem; font-weight:600; color:var(--md-text-primary); margin:0 0 2px; }
.fp-page-desc  { font-size:0.8rem; color:var(--md-text-secondary); margin:0; }

.fp-content-body { flex:1; overflow-y:auto; padding:24px 26px; }
.fp-content-footer {
    padding:14px 26px 18px; border-top:1px solid var(--md-border);
    display:flex; gap:10px; justify-content:flex-end; flex-shrink:0;
}

/* Pages */
.fp-page { display:none; flex-direction:column; height:100%; }
.fp-page.is-active { display:flex; }

/* Info rows */
.fp-info-row {
    display:flex; align-items:flex-start; gap:12px;
    padding:13px 15px; background:var(--md-bg-elevated);
    border:1px solid var(--md-border); border-radius:10px; margin-bottom:10px;
}
.fp-info-row > i { font-size:1rem; color:var(--md-text-secondary); margin-top:2px; flex-shrink:0; }
.fp-info-label { font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.06em; color:var(--md-text-secondary); margin-bottom:3px; }
.fp-info-value { font-size:0.875rem; color:var(--md-text-primary); word-break:break-all; line-height:1.5; }
.fp-info-link { color:var(--lt-short-cl); text-decoration:none; }
.fp-info-link:hover { text-decoration:underline; }

/* Stat boxes */
.fp-stat-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-top:4px; }
.fp-stat-box { padding:14px; background:var(--md-bg-elevated); border:1px solid var(--md-border); border-radius:10px; text-align:center; }
.fp-stat-box .stat-num { font-size:1.5rem; font-weight:700; color:var(--md-text-primary); line-height:1; }
.fp-stat-box .stat-lbl { font-size:0.7rem; color:var(--md-text-secondary); text-transform:uppercase; letter-spacing:0.07em; margin-top:5px; }
.fp-stat-box-views  { border-top:2px solid var(--lt-accent-border); }
.fp-stat-box-clicks { border-top:2px solid rgba(43,90,140,0.45); }
.fp-stat-box-qr     { border-top:2px solid rgba(28,107,58,0.45); }
.fp-stat-box-unique { border-top:2px solid rgba(100,60,160,0.40); }
.fp-stat-box-views  .stat-num { color:var(--lt-accent); }
.fp-stat-box-clicks .stat-num { color:#2b5a8c; }
.fp-stat-box-qr     .stat-num { color:var(--lt-accent); }
.fp-stat-box-unique .stat-num { color:#6428a0; }
[data-theme="dark"] .fp-stat-box-clicks .stat-num { color:#c2d4e8; }
[data-theme="dark"] .fp-stat-box-unique .stat-num { color:#c9a3e8; }

/* CTR badge in info */
.fp-ctr-badge {
    display:inline-flex; align-items:center; gap:5px;
    font-size:0.8rem; font-weight:600; padding:4px 12px; border-radius:20px;
    background:var(--lt-ctr-bg); border:1px solid var(--lt-ctr-bd); color:var(--lt-ctr-cl);
}

/* Sub-items list */
.fp-items-list { list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:8px; }
.fp-item-row {
    display:flex; align-items:center; gap:10px;
    padding:10px 12px; border-radius:9px;
    background:var(--item-row-bg); border:1px solid var(--item-row-bd);
}
.fp-item-num   { font-size:0.72rem; font-weight:700; color:var(--md-text-disabled); min-width:16px; }
.fp-item-info  { flex:1; min-width:0; }
.fp-item-label { font-size:0.8125rem; font-weight:600; color:var(--md-text-primary); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.fp-item-url   { font-size:0.75rem; color:var(--lt-short-cl); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.fp-item-visits{ font-size:0.72rem; color:var(--md-text-disabled); flex-shrink:0; white-space:nowrap; }

/* QR panel */
.fp-qr-wrap { display:flex; gap:16px; align-items:flex-start; padding:14px 15px; background:var(--md-bg-elevated); border:1px solid var(--md-border); border-radius:10px; margin-bottom:10px; }
.fp-qr-canvas-box { background:#fff; border-radius:8px; padding:4px; box-shadow:0 2px 8px rgba(0,0,0,0.4); flex-shrink:0; }
.fp-qr-canvas-box canvas { width:80px!important; height:80px!important; display:block; }
.fp-qr-info { flex:1; min-width:0; display:flex; flex-direction:column; gap:6px; padding-top:2px; }
.fp-qr-label { font-size:0.78rem; color:var(--md-text-secondary); word-break:break-all; line-height:1.4; }

/* Form group */
.fp-form-group { margin-bottom:16px; }
.fp-form-label { display:block; font-size:0.845rem; font-weight:500; color:var(--md-text-secondary); margin-bottom:8px; }
.fp-input-group {
    display:flex; align-items:stretch;
    border:1px solid var(--md-border); border-radius:8px; overflow:hidden;
    transition:border-color 0.2s, box-shadow 0.2s;
}
.fp-input-group:focus-within { border-color:var(--fp-input-focus-bd); box-shadow:0 0 0 3px var(--fp-input-focus-sh); }
.fp-input-prefix {
    background:var(--md-bg-primary); padding:11px 13px;
    font-size:0.8rem; color:var(--md-text-secondary);
    border-right:1px solid var(--md-border);
    white-space:nowrap; display:flex; align-items:center; user-select:none;
}
.fp-input-field {
    flex:1; padding:11px 14px; background:var(--md-bg-elevated);
    border:none; color:var(--md-text-primary);
    font-size:0.9375rem; font-family:'Inter',sans-serif;
    outline:none;
}
.fp-input-field::placeholder { color:var(--md-text-disabled); }
.fp-section-label {
    font-size:0.63rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.09em; color:var(--md-text-disabled);
    margin:16px 0 8px; padding-bottom:6px; border-bottom:1px solid var(--md-border);
}

/* Delete warn */
.fp-warn {
    background:var(--fp-warn-bg); border:1px solid var(--fp-warn-bd);
    border-left:4px solid var(--fp-warn-left); border-radius:10px;
    padding:14px 16px; display:flex; gap:12px; align-items:flex-start; margin-bottom:16px;
}
.fp-warn > i { font-size:1.1rem; color:var(--fp-warn-cl); flex-shrink:0; margin-top:2px; }
.fp-warn p { margin:0; font-size:0.875rem; color:var(--fp-warn-cl); line-height:1.5; }
.fp-warn strong { color:var(--fp-warn-strong); }
.fp-confirm-check {
    display:flex; align-items:center; gap:10px;
    padding:10px 14px; background:var(--md-bg-elevated);
    border:1px solid var(--md-border); border-radius:8px; cursor:pointer; margin-bottom:16px;
}
.fp-confirm-check input[type=checkbox] { accent-color:var(--lt-accent); width:16px; height:16px; cursor:pointer; flex-shrink:0; }
.fp-confirm-check label { font-size:0.875rem; color:var(--md-text-secondary); cursor:pointer; user-select:none; }

/* Sidebar kanan */
.fp-sidebar {
    width:210px; min-width:210px; flex-shrink:0;
    background:var(--md-bg-secondary); display:flex; flex-direction:column; overflow:hidden;
}
.fp-sidebar-head {
    padding:18px 16px 14px; background:var(--md-bg-elevated);
    border-bottom:1px solid var(--md-border); position:relative; flex-shrink:0;
}
.fp-close-btn {
    position:absolute; top:12px; right:12px;
    width:28px; height:28px; border-radius:7px;
    border:1px solid var(--md-border); background:var(--md-bg-elevated);
    color:var(--md-text-secondary); display:flex; align-items:center; justify-content:center;
    cursor:pointer; font-size:0.8rem; transition:all 0.15s;
}
.fp-close-btn:hover { background:var(--fp-close-hover-bg); border-color:var(--fp-close-hover-bd); color:var(--fp-close-hover-cl); }
.fp-sidebar-eyebrow { font-size:0.63rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:var(--sb-eyebrow-cl); margin-bottom:6px; }
.fp-sidebar-short { font-size:0.8125rem; font-weight:600; color:var(--sb-short-cl); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; margin-bottom:2px; }
.fp-sidebar-orig  { font-size:0.7rem; color:var(--sb-orig-cl); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }

.fp-nav { flex:1; padding:10px 8px; overflow-y:auto; }
.fp-nav-section { font-size:0.63rem; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:var(--md-text-disabled); padding:8px 8px 4px; }
.fp-nav-divider { height:1px; background:var(--md-border); margin:6px 8px; }
.fp-nav-item {
    width:100%; display:flex; align-items:center; gap:10px;
    padding:9px 10px; border-radius:8px; border:1px solid transparent;
    background:transparent; color:var(--md-text-secondary);
    cursor:pointer; text-align:left; font-family:'Inter',sans-serif;
    font-size:0.845rem; margin-bottom:3px; transition:all 0.16s;
}
.fp-nav-icon { width:30px; height:30px; border-radius:7px; display:flex; align-items:center; justify-content:center; font-size:0.9rem; flex-shrink:0; background:var(--fp-nav-icon-bg); transition:background 0.16s; }

#fp-nav-foto:hover { background:var(--lt-accent-bg); border-color:var(--lt-accent-border); color:var(--lt-accent); }
#fp-nav-foto.is-active { background:var(--lt-accent-hover-bg); border-color:var(--lt-accent-hover-border); color:var(--lt-accent); }
#fp-nav-foto.is-active .fp-nav-icon { background:var(--lt-accent-bg); color:var(--lt-accent); }

/* Foto upload area */
.foto-avatar-wrap {
    display:flex; flex-direction:column; align-items:center; gap:16px;
    padding:20px 0 10px;
}
.foto-avatar {
    width:110px; height:110px; border-radius:50%;
    overflow:hidden; position:relative; cursor:pointer;
    border:3px solid var(--lt-accent-border);
    background:var(--lt-accent-bg);
    display:flex; align-items:center; justify-content:center;
    transition:border-color 0.2s;
    flex-shrink:0;
}
.foto-avatar:hover { border-color:var(--lt-accent); }
.foto-avatar img { width:100%; height:100%; object-fit:cover; display:block; }
.foto-avatar .foto-placeholder { font-size:2.5rem; color:var(--lt-accent); }
.foto-avatar-overlay {
    position:absolute; inset:0; border-radius:50%;
    background:rgba(0,0,0,0.45);
    display:flex; align-items:center; justify-content:center;
    opacity:0; transition:opacity 0.2s;
    color:#fff; font-size:1.2rem;
}
.foto-avatar:hover .foto-avatar-overlay { opacity:1; }
.foto-hint { font-size:0.78rem; color:var(--md-text-disabled); text-align:center; line-height:1.5; }
.foto-actions { display:flex; gap:8px; flex-wrap:wrap; justify-content:center; }
.foto-progress {
    width:100%; height:3px; border-radius:2px;
    background:var(--md-border); overflow:hidden; display:none;
}
.foto-progress-bar {
    height:100%; border-radius:2px;
    background:var(--lt-accent);
    transition:width 0.3s;
}
.foto-error { font-size:0.78rem; color:var(--fp-error-cl); text-align:center; display:none; }
#fp-nav-info.is-active { background:var(--nav-info-active-bg); border-color:var(--nav-info-active-bd); color:var(--nav-info-active-cl); }
#fp-nav-info.is-active .fp-nav-icon { background:var(--nav-info-icon-bg); color:var(--nav-info-active-cl); }
#fp-nav-stat:hover   { background:var(--lt-accent-bg); border-color:var(--lt-accent-border); color:var(--lt-accent); }
#fp-nav-stat.is-active { background:var(--lt-accent-hover-bg); border-color:var(--lt-accent-hover-border); color:var(--lt-accent); }
#fp-nav-stat.is-active .fp-nav-icon { background:var(--lt-accent-bg); color:var(--lt-accent); }
#fp-nav-edit:hover   { background:var(--nav-edit-hover-bg); border-color:var(--nav-edit-hover-bd); color:var(--nav-edit-hover-cl); }
#fp-nav-edit.is-active { background:var(--nav-edit-active-bg); border-color:var(--nav-edit-active-bd); color:var(--nav-edit-active-cl); }
#fp-nav-edit.is-active .fp-nav-icon { background:var(--nav-edit-icon-bg); color:var(--nav-edit-active-cl); }
#fp-nav-delete:hover { background:var(--nav-delete-hover-bg); border-color:var(--nav-delete-hover-bd); color:var(--nav-delete-hover-cl); }
#fp-nav-delete.is-active { background:var(--nav-delete-active-bg); border-color:var(--nav-delete-active-bd); color:var(--nav-delete-active-cl); }
#fp-nav-delete.is-active .fp-nav-icon { background:var(--nav-delete-icon-bg); color:var(--nav-delete-icon-cl); }
.fp-nav-item.is-delete { color:var(--nav-delete-cl); }

/* Statistik panel — range & mini stat */
.fp-range-group { display:flex; background:var(--md-bg-elevated); border:1px solid var(--md-border); border-radius:8px; padding:3px; gap:2px; align-self:flex-start; flex-wrap:wrap; }
.fp-range-btn { padding:5px 10px; border-radius:6px; border:1px solid transparent; background:transparent; color:var(--md-text-secondary); font-size:0.75rem; font-family:'Inter',sans-serif; cursor:pointer; transition:all 0.15s; white-space:nowrap; }
.fp-range-btn:hover { color:var(--md-text-primary); background:rgba(0,0,0,0.04); }
[data-theme="dark"] .fp-range-btn:hover { background:rgba(255,255,255,0.05); }
.fp-range-btn.active { background:var(--lt-accent-bg); border-color:var(--lt-accent-border); color:var(--lt-accent); }
.fp-mini-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:8px; }
.fp-mini-box { background:var(--md-bg-elevated); border:1px solid var(--md-border); border-radius:8px; padding:10px; display:flex; flex-direction:column; align-items:center; gap:3px; }
.fp-mini-val { font-size:1.1rem; font-weight:700; color:var(--md-text-primary); line-height:1; }
.fp-mini-lbl { font-size:0.65rem; color:var(--md-text-disabled); text-transform:uppercase; letter-spacing:0.06em; text-align:center; }

/* Toast — pakai pola md-toast dari data-shortlink */
.md-toast {
    position:fixed; bottom:26px; right:26px; z-index:9999;
    min-width:280px; max-width:400px; padding:14px 18px;
    border-radius:11px; border-left:4px solid;
    box-shadow:var(--md-elevation-8);
    display:flex; align-items:flex-start; gap:11px; font-size:0.9375rem;
    transform:translateY(14px); opacity:0;
    transition:all 0.3s cubic-bezier(0.34,1.56,0.64,1); pointer-events:none;
}
.md-toast.show { transform:translateY(0); opacity:1; pointer-events:auto; }
.md-toast.toast-success { background:var(--toast-success-bg); border-color:var(--toast-success-bd); color:var(--toast-success-cl); }
.md-toast.toast-error   { background:var(--toast-error-bg);   border-color:var(--toast-error-bd);   color:var(--toast-error-cl); }
.md-toast i { font-size:1.15rem; flex-shrink:0; margin-top:1px; }

/* ── Toast ── */
.toast-wrap { position:fixed; bottom:24px; left:50%; transform:translateX(-50%); z-index:9999; display:flex; flex-direction:column; gap:8px; align-items:center; pointer-events:none; }
.toast {
    padding:11px 20px; border-radius:10px; font-size:0.875rem; font-weight:500;
    display:flex; align-items:center; gap:8px; pointer-events:auto;
    animation:toastIn 0.3s ease; border:1px solid;
    box-shadow:0 4px 20px rgba(0,0,0,0.15);
}
.toast.success { background:var(--toast-success-bg); border-color:var(--toast-success-bd); color:var(--toast-success-cl); }
.toast.error   { background:var(--toast-error-bg); border-color:var(--toast-error-bd); color:var(--toast-error-cl); }

/* ── Search bar ── */
.lt-search-wrap { padding:16px 20px; border-bottom:1px solid var(--md-border); }
.lt-search-input {
    width:100%; padding:9px 14px 9px 36px; border-radius:8px;
    border:1px solid var(--md-border); background:var(--md-bg-elevated);
    color:var(--md-text-primary); font-size:0.875rem; font-family:'Inter',sans-serif;
    outline:none; transition:border-color 0.2s, box-shadow 0.2s; position:relative;
}
.lt-search-wrap { position:relative; }
.lt-search-icon { position:absolute; left:32px; top:50%; transform:translateY(-50%); color:var(--md-text-disabled); font-size:0.9rem; pointer-events:none; }
.lt-search-input:focus { border-color:var(--fp-input-focus-bd); box-shadow:0 0 0 3px var(--fp-input-focus-sh); }

/* ── Foto upload di form create ── */
.c-foto-wrap {
    display:flex; align-items:center; gap:20px;
    padding:14px 16px;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    border-radius:10px;
}
.c-foto-avatar {
    width:72px; height:72px; border-radius:50%;
    overflow:hidden; position:relative; cursor:pointer; flex-shrink:0;
    border:2px solid var(--lt-accent-border);
    background:var(--lt-accent-bg);
    display:flex; align-items:center; justify-content:center;
    transition:border-color 0.2s;
}
.c-foto-avatar:hover { border-color:var(--lt-accent); }
.c-foto-avatar img { width:100%; height:100%; object-fit:cover; display:block; }
.c-foto-avatar .c-foto-placeholder { font-size:1.8rem; color:var(--lt-accent); }
.c-foto-avatar-overlay {
    position:absolute; inset:0; border-radius:50%;
    background:rgba(0,0,0,0.45);
    display:flex; align-items:center; justify-content:center;
    opacity:0; transition:opacity 0.2s; color:#fff; font-size:1rem;
}
.c-foto-avatar:hover .c-foto-avatar-overlay { opacity:1; }
.c-foto-info { flex:1; min-width:0; }
.c-foto-label { font-size:0.8125rem; font-weight:600; color:var(--md-text-secondary); margin-bottom:3px; }
.c-foto-hint  { font-size:0.75rem; color:var(--md-text-disabled); line-height:1.5; }
.c-foto-name  { font-size:0.75rem; color:var(--lt-accent); margin-top:4px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.c-foto-error { font-size:0.78rem; color:var(--fp-error-cl); margin-top:6px; display:none; }
.c-foto-remove {
    flex-shrink:0; width:28px; height:28px; border-radius:7px;
    border:1px solid transparent; background:transparent;
    color:var(--item-remove-cl); cursor:pointer; font-size:0.85rem;
    display:none; align-items:center; justify-content:center;
    transition:all 0.15s;
}
.c-foto-remove:hover { background:var(--item-remove-hover-bg); border-color:var(--item-remove-hover-bd); }
.c-foto-remove.visible { display:flex; }

/* Responsive */
@media (max-width: 600px) {
    .fp-sidebar { display:none; }
    .lt-stats { display:none; }
    .lt-item { flex-wrap:wrap; }
}
</style>

<div class="container-fluid py-4" style="position:relative;z-index:1;max-width:900px;">

    {{-- Header --}}
    <div class="md-header">
        <h3><i class="bi bi-diagram-3-fill me-2" style="color:var(--lt-accent);"></i>Link Tree</h3>
        <p>Kelola halaman pilihan link milik kamu.</p>
    </div>

    {{-- Create form --}}
    <div class="md-card" id="createCard">
        <div class="lt-create-header" id="createHeader" onclick="toggleCreate()">
            <div class="lt-create-icon"><i class="bi bi-plus-lg"></i></div>
            <div>
                <div class="lt-create-title">Buat Link Tree Baru</div>
                <div class="lt-create-sub">Tambah halaman pilihan link baru</div>
            </div>
            <i class="bi bi-chevron-down lt-create-chevron"></i>
        </div>
        <div class="lt-create-body" id="createBody">
            <div style="border-top:1px solid var(--md-border);padding-top:20px;">

                {{-- Row 1: Judul + Kode --}}
                <div class="row g-3 mb-3">
                    <div class="col-sm-7">
                        <label class="fp-label">Judul <span style="color:var(--fp-error-cl)">*</span></label>
                        <input type="text" class="fp-input" id="c_judul" placeholder="Nama halaman link tree" maxlength="100">
                        <div class="fp-error" id="c_judul_err"></div>
                    </div>
                    <div class="col-sm-5">
                        <label class="fp-label">Kode kustom <span style="color:var(--md-text-disabled);font-weight:400;">(opsional)</span></label>
                        <div style="position:relative;">
                            <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);font-size:0.8rem;color:var(--md-text-disabled);">lt/</span>
                            <input type="text" class="fp-input" id="c_kode" placeholder="kode-kustom" maxlength="50" style="padding-left:32px;">
                        </div>
                        <div class="fp-hint">Kosongkan untuk generate otomatis</div>
                        <div class="fp-error" id="c_kode_err"></div>
                    </div>
                </div>

                {{-- Row 2: Deskripsi + Warna --}}
                <div class="row g-3 mb-3">
                    <div class="col-sm-8">
                        <label class="fp-label">Deskripsi <span style="color:var(--md-text-disabled);font-weight:400;">(opsional)</span></label>
                        <textarea class="fp-input" id="c_deskripsi" rows="2" placeholder="Deskripsi singkat halaman" maxlength="500" style="resize:vertical;"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <label class="fp-label">Warna tema</label>
                        <div class="color-pick-wrap">
                            <input type="color" id="c_warna_picker" value="#1c6b3a" oninput="syncColorHex('c_warna_picker','c_warna_hex')">
                            <input type="text" class="fp-input color-pick-hex" id="c_warna_hex" value="#1c6b3a" maxlength="7"
                                   placeholder="#1c6b3a" oninput="syncColorPicker('c_warna_hex','c_warna_picker')">
                        </div>
                    </div>
                </div>

                {{-- Links --}}
                <div class="mb-3">
                    <label class="fp-label">Foto profil <span style="color:var(--md-text-disabled);font-weight:400;">(opsional)</span></label>
                    <div class="c-foto-wrap">
                        <div class="c-foto-avatar" id="cFotoAvatar" onclick="triggerCFotoInput()" title="Klik untuk pilih foto">
                            <img id="cFotoPreviewImg" src="" alt="" style="display:none;">
                            <div class="c-foto-placeholder" id="cFotoPlaceholder"><i class="bi bi-diagram-3-fill"></i></div>
                            <div class="c-foto-avatar-overlay"><i class="bi bi-camera-fill"></i></div>
                        </div>
                        <div class="c-foto-info">
                            <div class="c-foto-label">Foto Profil</div>
                            <div class="c-foto-hint">JPEG / PNG / WebP · Maks 3 MB<br>Akan ditampilkan sebagai lingkaran di halaman publik.</div>
                            <div class="c-foto-name" id="cFotoName"></div>
                            <div class="c-foto-error" id="cFotoError"></div>
                        </div>
                        <button type="button" class="c-foto-remove" id="cFotoRemoveBtn" onclick="removeCFoto()" title="Hapus foto">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <input type="file" id="cFotoFileInput" accept="image/jpeg,image/png,image/webp"
                           style="display:none;" onchange="onCFotoSelected(this)">
                </div>

                {{-- Daftar link --}}
                <div class="mb-3">
                    <label class="fp-label">Daftar link <span style="color:var(--fp-error-cl)">*</span></label>
                    <div class="lt-items-list" id="c_items_list"></div>
                    <button class="lt-add-item-btn" onclick="addItemRow('c_items_list')">
                        <i class="bi bi-plus-circle"></i> Tambah link
                    </button>
                    <div class="fp-error" id="c_items_err"></div>
                </div>

                <div class="lt-create-actions">
                    <button class="fp-btn fp-btn-cancel" onclick="toggleCreate()">Batal</button>
                    <button class="fp-btn fp-btn-save" id="c_submit" onclick="submitCreate()">
                        <span class="fp-spinner" id="c_spin"></span>
                        <i class="bi bi-check2-circle" id="c_submit_icon"></i> Buat Link Tree
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- List card --}}
    <div class="md-card">
        <div class="md-card-header">
            <h5><i class="bi bi-list-ul me-2"></i>Daftar Link Tree</h5>
            <span class="md-badge" id="ltCount">— item</span>
        </div>

        {{-- Search --}}
        <div class="lt-search-wrap" style="position:relative;">
            <i class="bi bi-search lt-search-icon"></i>
            <input type="text" class="lt-search-input" id="ltSearch" placeholder="Cari judul atau kode..." oninput="filterList()">
        </div>

        {{-- Loading --}}
        <div id="ltLoading" class="text-center py-5">
            <div class="md-spinner mx-auto mb-3"></div>
            <p style="color:var(--md-text-disabled);">Memuat data...</p>
        </div>

        {{-- Empty --}}
        <div id="ltEmpty" class="text-center py-5" style="display:none;">
            <div class="md-empty-icon mb-3"><i class="bi bi-diagram-3"></i></div>
            <p style="color:var(--md-text-secondary);font-weight:500;">Belum ada link tree</p>
            <p style="color:var(--md-text-disabled);font-size:0.875rem;">Buat link tree pertamamu di form di atas.</p>
        </div>

        {{-- List --}}
        <ul class="lt-list" id="ltList" style="display:none;"></ul>

        {{-- PAGINATION --}}
        <div class="sl-pagination" id="ltPaginationEl" style="display:none!important;"></div>
    </div>

</div>

{{-- ── Floating Panel (modal di tengah, pola data-shortlink) ── --}}
<div class="fp-backdrop" id="fpBackdrop" onclick="closePanel()"></div>

<div class="fp-panel" id="fpPanel">

    {{-- ══ KIRI: Area konten ══ --}}
    <div class="fp-content">

        {{-- PAGE: Detail --}}
        <div class="fp-page is-active" id="fp-page-info">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-info"><i class="bi bi-info-circle-fill"></i></div>
                <div>
                    <p class="fp-page-title">Detail Link Tree</p>
                    <p class="fp-page-desc">Informasi lengkap link tree ini</p>
                </div>
            </div>
            <div class="fp-content-body">

                {{-- QR + URL --}}
                <div class="fp-qr-wrap">
                    <div class="fp-qr-canvas-box"><div id="fpQrCanvas"></div></div>
                    <div class="fp-qr-info">
                        <p style="font-size:0.68rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--md-text-disabled);margin:0 0 4px;">QR Code</p>
                        <p class="fp-qr-label" id="fpQrLabel">—</p>
                        <button class="btn-qr-dl" onclick="downloadQr()"><i class="bi bi-download"></i> Unduh PNG</button>
                    </div>
                </div>

                {{-- Info rows --}}
                <div class="fp-info-row">
                    <i class="bi bi-link-45deg"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">URL Publik</div>
                        <div class="fp-info-value"><a class="fp-info-link" id="d_url" href="#" target="_blank">—</a></div>
                    </div>
                </div>
                <div class="fp-info-row">
                    <i class="bi bi-palette"></i>
                    <div style="min-width:0;flex:1;">
                        <div class="fp-info-label">Warna tema</div>
                        <div class="fp-info-value" id="d_warna" style="display:flex;align-items:center;gap:8px;">—</div>
                    </div>
                    <span class="fp-ctr-badge" id="d_ctr_badge">CTR —%</span>
                </div>
                <div class="fp-info-row">
                    <i class="bi bi-card-text"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">Deskripsi</div>
                        <div class="fp-info-value" id="d_desc" style="white-space:pre-wrap;">—</div>
                    </div>
                </div>
                <div class="fp-info-row">
                    <i class="bi bi-calendar3"></i>
                    <div>
                        <div class="fp-info-label">Dibuat</div>
                        <div class="fp-info-value" id="d_created">—</div>
                    </div>
                </div>

                {{-- Statistik --}}
                <div class="fp-section-label">Kunjungan</div>
                <div class="fp-stat-grid" style="grid-template-columns:1fr 1fr 1fr 1fr;">
                    <div class="fp-stat-box fp-stat-box-views">
                        <div class="stat-num" id="d_visits">0</div>
                        <div class="stat-lbl"><i class="bi bi-eye"></i> Page Views</div>
                    </div>
                    <div class="fp-stat-box fp-stat-box-clicks">
                        <div class="stat-num" id="d_clicks">0</div>
                        <div class="stat-lbl"><i class="bi bi-cursor"></i> Klik Keluar</div>
                    </div>
                    <div class="fp-stat-box fp-stat-box-qr">
                        <div class="stat-num" id="d_via_qr">0</div>
                        <div class="stat-lbl"><i class="bi bi-qr-code-scan"></i> Via QR</div>
                    </div>
                    <div class="fp-stat-box fp-stat-box-unique">
                        <div class="stat-num" id="d_via_link">0</div>
                        <div class="stat-lbl"><i class="bi bi-link-45deg"></i> Via Link</div>
                    </div>
                </div>

                {{-- Sub-links --}}
                <div class="fp-section-label">Daftar link (<span id="d_item_count">0</span>)</div>
                <ul class="fp-items-list" id="d_items_list"></ul>

            </div>
            <div class="fp-content-footer">
                <a class="fp-btn fp-btn-open" id="d_open_btn" href="#" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i> Buka halaman
                </a>
                <button class="fp-btn fp-btn-cancel ms-auto" onclick="closePanel()">Tutup</button>
            </div>
        </div>

        {{-- PAGE: Statistik --}}
        <div class="fp-page" id="fp-page-stat">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-stat"><i class="bi bi-graph-up"></i></div>
                <div>
                    <p class="fp-page-title">Statistik Kunjungan</p>
                    <p class="fp-page-desc" id="stat_page_desc">Grafik page views link tree ini</p>
                </div>
            </div>
            <div class="fp-content-body" style="display:flex;flex-direction:column;gap:12px;">
                <div class="fp-range-group">
                    <button class="fp-range-btn active" data-r="day"    onclick="setLtRange(this)">Hari ini</button>
                    <button class="fp-range-btn"        data-r="3day"   onclick="setLtRange(this)">3 Hari</button>
                    <button class="fp-range-btn"        data-r="week"   onclick="setLtRange(this)">Minggu</button>
                    <button class="fp-range-btn"        data-r="month"  onclick="setLtRange(this)">Bulan</button>
                    <button class="fp-range-btn"        data-r="3month" onclick="setLtRange(this)">3 Bulan</button>
                </div>
                <div class="fp-mini-grid">
                    <div class="fp-mini-box">
                        <span class="fp-mini-val" id="st_pageviews" style="color:var(--lt-accent);">—</span>
                        <span class="fp-mini-lbl">Page Views</span>
                    </div>
                    <div class="fp-mini-box">
                        <span class="fp-mini-val" id="st_clicks" style="color:#2b5a8c;">—</span>
                        <span class="fp-mini-lbl">Klik Keluar</span>
                    </div>
                    <div class="fp-mini-box">
                        <span class="fp-mini-val" id="st_ctr" style="color:var(--lt-ctr-cl);">—</span>
                        <span class="fp-mini-lbl">CTR</span>
                    </div>
                </div>
                <div style="position:relative;flex:1;min-height:160px;">
                    <canvas id="ltStatChart"></canvas>
                    <div id="ltChartLoading" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:var(--md-bg-card);">
                        <div style="width:24px;height:24px;border:2px solid var(--fp-spinner-bd);border-top-color:var(--lt-accent);border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    </div>
                </div>
                <div style="font-size:0.72rem;color:var(--md-text-disabled);">
                    <i class="bi bi-info-circle me-1"></i>Grafik menampilkan kunjungan halaman (bukan klik sub link)
                </div>
            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel ms-auto" onclick="closePanel()">Tutup</button>
            </div>
        </div>

        {{-- PAGE: Edit --}}
        <div class="fp-page" id="fp-page-edit">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-edit"><i class="bi bi-pencil-square"></i></div>
                <div>
                    <p class="fp-page-title">Edit Link Tree</p>
                    <p class="fp-page-desc">Ubah judul, kode, dan daftar link</p>
                </div>
            </div>
            <div class="fp-content-body">
                <div class="fp-form-group">
                    <label class="fp-form-label">Judul <span style="color:var(--fp-error-cl)">*</span></label>
                    <input type="text" class="fp-input-field" style="width:100%;padding:11px 14px;border:1px solid var(--md-border);border-radius:8px;background:var(--md-bg-elevated);color:var(--md-text-primary);font-family:'Inter',sans-serif;font-size:0.9rem;outline:none;transition:border-color 0.2s,box-shadow 0.2s;" id="e_judul" maxlength="100"
                        onfocus="this.style.borderColor='var(--fp-input-focus-bd)';this.style.boxShadow='0 0 0 3px var(--fp-input-focus-sh)'"
                        onblur="this.style.borderColor='';this.style.boxShadow=''">
                    <div class="fp-error" id="e_judul_err"></div>
                </div>
                <div class="fp-form-group">
                    <label class="fp-form-label">Kode <span style="color:var(--fp-error-cl)">*</span></label>
                    <div class="fp-input-group">
                        <span class="fp-input-prefix">{{ url('/') }}/lt/</span>
                        <input type="text" class="fp-input-field" id="e_kode" maxlength="50" placeholder="kode-kustom" spellcheck="false" autocomplete="off">
                    </div>
                    <p class="fp-hint"><i class="bi bi-info-circle me-1"></i>Hanya huruf, angka, - dan _</p>
                    <div class="fp-error" id="e_kode_err"></div>
                </div>
                <div class="fp-form-group">
                    <label class="fp-form-label">Deskripsi</label>
                    <textarea style="width:100%;padding:10px 14px;background:var(--md-bg-elevated);border:1px solid var(--md-border);border-radius:8px;color:var(--md-text-primary);font-size:0.875rem;font-family:'Inter',sans-serif;resize:vertical;min-height:64px;outline:none;transition:border-color 0.2s;" id="e_deskripsi" maxlength="500"
                        onfocus="this.style.borderColor='var(--fp-input-focus-bd)'"
                        onblur="this.style.borderColor=''"></textarea>
                </div>
                <div class="fp-form-group">
                    <label class="fp-form-label">Warna tema</label>
                    <div class="color-pick-wrap">
                        <input type="color" id="e_warna_picker" oninput="syncColorHex('e_warna_picker','e_warna_hex')">
                        <input type="text" class="fp-input" id="e_warna_hex" maxlength="7" style="flex:1;font-family:monospace;"
                               oninput="syncColorPicker('e_warna_hex','e_warna_picker')">
                    </div>
                </div>
                <div class="fp-section-label">Daftar link <span style="color:var(--fp-error-cl)">*</span></div>
                <div class="lt-items-list" id="e_items_list"></div>
                <button class="lt-add-item-btn" onclick="addItemRow('e_items_list')">
                    <i class="bi bi-plus-circle"></i> Tambah link
                </button>
                <div class="fp-error" id="e_items_err"></div>
            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel" onclick="goPage('info')">Batal</button>
                <button class="fp-btn fp-btn-save" id="e_submit" onclick="submitEdit()">
                    <span class="fp-spinner" id="e_spin"></span>
                    <i class="bi bi-check-lg" id="e_submit_icon"></i> Simpan Perubahan
                </button>
            </div>
        </div>

        {{-- PAGE: Foto Profil --}}
        <div class="fp-page" id="fp-page-foto">
            <div class="fp-content-head">
                <div class="fp-page-icon" style="background:rgba(28,107,58,0.10);color:var(--lt-accent);"><i class="bi bi-image"></i></div>
                <div>
                    <p class="fp-page-title">Foto Profil</p>
                    <p class="fp-page-desc">Ganti ikon default dengan foto</p>
                </div>
            </div>
            <div class="fp-content-body" style="display:flex;flex-direction:column;gap:16px;">

                {{-- Avatar preview + click to upload --}}
                <div class="foto-avatar-wrap">
                    <div class="foto-avatar" id="fotoAvatarPreview" onclick="triggerFotoInput()" title="Klik untuk ganti foto">
                        <img id="fotoPreviewImg" src="" alt="" style="display:none;">
                        <div class="foto-placeholder" id="fotoPlaceholderIcon"><i class="bi bi-diagram-3-fill"></i></div>
                        <div class="foto-avatar-overlay"><i class="bi bi-camera-fill"></i></div>
                    </div>
                    <p class="foto-hint">
                        Klik foto untuk memilih gambar<br>
                        JPEG / PNG / WebP · Maks 3 MB
                    </p>
                </div>

                {{-- Progress & error --}}
                <div class="foto-progress" id="fotoProgress">
                    <div class="foto-progress-bar" id="fotoProgressBar" style="width:0%"></div>
                </div>
                <div class="foto-error" id="fotoError"></div>

                {{-- Info batas ukuran --}}
                <div class="fp-info-row" style="margin-bottom:0;">
                    <i class="bi bi-info-circle" style="color:var(--lt-ctr-cl);"></i>
                    <div>
                        <div class="fp-info-label">Ketentuan foto</div>
                        <div class="fp-info-value" style="font-size:0.8rem;color:var(--md-text-secondary);line-height:1.6;">
                            Foto akan ditampilkan sebagai lingkaran di halaman publik link tree.
                            Foto akan otomatis dikompres oleh browser sebelum dikirim.
                            Jika tidak diisi, ikon default akan tetap tampil.
                        </div>
                    </div>
                </div>

                {{-- Input file tersembunyi --}}
                <input type="file" id="fotoFileInput" accept="image/jpeg,image/png,image/webp"
                       style="display:none;" onchange="onFotoSelected(this)">

            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-delete" id="fotoDeleteBtn" onclick="deleteFoto()" style="display:none;">
                    <span class="fp-spinner" id="fotoDeleteSpin"></span>
                    <i class="bi bi-trash3" id="fotoDeleteIcon"></i> Hapus Foto
                </button>
                <button class="fp-btn fp-btn-cancel ms-auto" onclick="goPage('info')">Tutup</button>
                <button class="fp-btn fp-btn-save" id="fotoSaveBtn" onclick="saveFoto()" style="display:none;">
                    <span class="fp-spinner" id="fotoSaveSpin"></span>
                    <i class="bi bi-check-lg" id="fotoSaveIcon"></i> Simpan Foto
                </button>
            </div>
        </div>

        {{-- PAGE: Hapus --}}
        <div class="fp-page" id="fp-page-delete">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-delete"><i class="bi bi-trash3-fill"></i></div>
                <div>
                    <p class="fp-page-title">Hapus Link Tree</p>
                    <p class="fp-page-desc">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>
            <div class="fp-content-body">
                <div class="fp-info-row" style="margin-bottom:16px;">
                    <i class="bi bi-diagram-3-fill"></i>
                    <div>
                        <div class="fp-info-label">Link Tree</div>
                        <div class="fp-info-value" id="del_judul_val" style="color:var(--lt-short-cl);">—</div>
                    </div>
                </div>
                <div class="fp-warn">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <p><strong>Perhatian!</strong> Link tree <strong id="del_judul"></strong> beserta semua link di dalamnya dan seluruh data kunjungannya akan dihapus secara permanen.</p>
                </div>
                <label class="fp-confirm-check">
                    <input type="checkbox" id="del_confirm" onchange="toggleDeleteBtn()">
                    <label for="del_confirm">Saya mengerti dan ingin menghapus link tree ini</label>
                </label>
            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel" onclick="goPage('info')">Batal</button>
                <button class="fp-btn fp-btn-delete" id="del_btn" onclick="submitDelete()" disabled>
                    <span class="fp-spinner" id="del_spin"></span>
                    <i class="bi bi-trash3" id="del_icon"></i> Hapus Sekarang
                </button>
            </div>
        </div>

    </div>{{-- /.fp-content --}}

    {{-- ══ KANAN: Sidebar menu navigasi ══ --}}
    <div class="fp-sidebar">
        <div class="fp-sidebar-head">
            <button class="fp-close-btn" onclick="closePanel()" title="Tutup"><i class="bi bi-x-lg"></i></button>
            <div class="fp-sidebar-eyebrow">Link Tree</div>
            <div class="fp-sidebar-short" id="sbJudul">—</div>
            <div class="fp-sidebar-orig"  id="sbKode">—</div>
        </div>
        <div class="fp-nav">
            <div class="fp-nav-section">Informasi</div>
            <button class="fp-nav-item is-active" id="fp-nav-info" onclick="goPage('info')">
                <div class="fp-nav-icon"><i class="bi bi-info-circle"></i></div> Detail
            </button>
            <button class="fp-nav-item" id="fp-nav-stat" onclick="goPage('stat')">
                <div class="fp-nav-icon"><i class="bi bi-graph-up"></i></div> Statistik
            </button>
            <div class="fp-nav-divider"></div>
            <div class="fp-nav-section">Kelola</div>
            <button class="fp-nav-item" id="fp-nav-foto" onclick="goPage('foto')">
                <div class="fp-nav-icon"><i class="bi bi-image"></i></div> Foto Profil
            </button>
            <button class="fp-nav-item" id="fp-nav-edit" onclick="goPage('edit')">
                <div class="fp-nav-icon"><i class="bi bi-pencil-square"></i></div> Edit Link Tree
            </button>
            <button class="fp-nav-item is-delete" id="fp-nav-delete" onclick="goPage('delete')">
                <div class="fp-nav-icon"><i class="bi bi-trash3"></i></div> Hapus
            </button>
        </div>
    </div>{{-- /.fp-sidebar --}}

</div>{{-- /.fp-panel --}}

{{-- Toast --}}
<div class="md-toast" id="toastEl">
    <i class="bi" id="toastIcon"></i>
    <span id="toastMsg"></span>
</div>

{{-- QRCode + Chart.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
/* ================================================================
   STATE
================================================================ */
let ltData     = [];
let ltFiltered = [];
let activeLt   = null;
let activeTab  = 'info';
// TOKEN tidak lagi digunakan di sini — apiFetch dari Layout-dashboard
// mengambil access_token langsung dari localStorage setiap request.
const _auth = (() => { try { return JSON.parse(localStorage.getItem('auth_response') || '{}'); } catch(e) { return {}; } })();
const NPP   = _auth?.data?.user?.npp || '';

// Pagination
const LT_PER_PAGE = 5;
let _ltCurPage    = 1;
let _ltFiltered   = [];

/* ================================================================
   INIT
================================================================ */
document.addEventListener('DOMContentLoaded', () => {
    addItemRow('c_items_list');
    loadData();
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closePanel(); });
});

/* ================================================================
   LOAD DATA
================================================================ */
async function loadData() {
    document.getElementById('ltLoading').style.display = 'block';
    document.getElementById('ltList').style.display    = 'none';
    document.getElementById('ltEmpty').style.display   = 'none';
    try {
        const json = await _ltFetch(`/api/linktree/data?npp=${encodeURIComponent(NPP)}`);
        if (json.status !== 'success') throw new Error(json.message);
        ltData = json.data;
        renderList(ltData);
    } catch(e) {
        showToast('Gagal memuat data: ' + e.message, 'error');
    } finally {
        document.getElementById('ltLoading').style.display = 'none';
    }
}

/* ================================================================
   RENDER LIST (dengan pagination — maks 5 per halaman)
================================================================ */
function renderList(data) {
    _ltFiltered = data;
    const totalPages = Math.ceil(data.length / LT_PER_PAGE);
    _ltCurPage = Math.max(1, Math.min(_ltCurPage, totalPages || 1));

    const ul    = document.getElementById('ltList');
    const empty = document.getElementById('ltEmpty');
    const badge = document.getElementById('ltCount');
    badge.textContent = data.length + ' item';

    if (!data.length) {
        ul.style.display = 'none';
        empty.style.display = 'block';
        document.getElementById('ltPaginationEl').style.setProperty('display','none','important');
        return;
    }
    ul.style.display = 'block';
    empty.style.display = 'none';

    const start = (_ltCurPage - 1) * LT_PER_PAGE;
    const slice = data.slice(start, start + LT_PER_PAGE);

    ul.innerHTML = slice.map(lt => `
        <li class="lt-item" onclick="openPanel(${lt.id})">
            <div class="lt-qr" id="qr_${lt.id}"></div>
            <div class="lt-color-dot" style="background:${esc(lt.tema_warna)};"></div>
            <div class="lt-info">
                <div class="lt-judul">${esc(lt.judul)}</div>
                <a class="lt-url" href="${esc(lt.public_url)}" target="_blank" onclick="event.stopPropagation()">${esc(lt.public_url)}</a>
                <div class="lt-item-count">
                    <i class="bi bi-link-45deg"></i> ${lt.items.length} link
                    ${lt.deskripsi ? `<span style="color:var(--md-text-disabled);margin-left:6px;">&middot;</span> <span class="lt-desc-preview">${esc(lt.deskripsi)}</span>` : ''}
                </div>
            </div>
            <div class="lt-stats">
                <span class="lt-stat-badge visits"><i class="bi bi-eye"></i> ${lt.visits.toLocaleString('id')}</span>
                <span class="lt-stat-badge ctr"><i class="bi bi-cursor"></i> CTR ${lt.ctr}%</span>
                <span class="lt-date">${esc(lt.created_at)}</span>
            </div>
            <button class="lt-gear" data-id="${lt.id}" title="Pengaturan" onclick="event.stopPropagation();openPanel(${lt.id})">
                <i class="bi bi-gear gear-icon"></i>
            </button>
        </li>
    `).join('');

    // QR list items
    slice.forEach(lt => {
        const el = document.getElementById(`qr_${lt.id}`);
        if (el) new QRCode(el, { text:lt.qr_url, width:64, height:64, correctLevel:QRCode.CorrectLevel.M });
    });

    renderLtPagination(totalPages);
}

/* ================================================================
   PAGINATION
================================================================ */
function renderLtPagination(totalPages) {
    const el = document.getElementById('ltPaginationEl');

    if (totalPages <= 1) {
        el.style.setProperty('display','none','important');
        return;
    }

    el.style.removeProperty('display');

    const pageButtons = buildLtPageNumbers(_ltCurPage, totalPages);
    let html = '';

    // Prev
    html += `<button class="pg-btn" onclick="ltRenderPage(${_ltCurPage - 1})" ${_ltCurPage === 1 ? 'disabled' : ''} title="Sebelumnya">
                <i class="bi bi-chevron-left"></i>
             </button>`;

    // Nomor halaman
    pageButtons.forEach(p => {
        if (p === '…') {
            html += `<span class="pg-btn" style="cursor:default;opacity:0.4;">…</span>`;
        } else {
            html += `<button class="pg-btn ${p === _ltCurPage ? 'pg-active' : ''}" onclick="ltRenderPage(${p})">${p}</button>`;
        }
    });

    // Next
    html += `<button class="pg-btn" onclick="ltRenderPage(${_ltCurPage + 1})" ${_ltCurPage === totalPages ? 'disabled' : ''} title="Berikutnya">
                <i class="bi bi-chevron-right"></i>
             </button>`;

    // Divider + jump
    html += `<div class="pg-divider"></div>`;
    html += `<div class="pg-jump-wrap" title="Klik # lalu ketik nomor halaman">
                <button class="pg-hash-btn" id="ltPgHashBtn" onclick="ltActivateJump()" title="Lompat ke halaman">#</button>
                <button class="pg-btn" id="ltPgJumpGo" onclick="ltJumpToPage(${totalPages})" title="Pergi" style="display:none;">
                    <i class="bi bi-chevron-right"></i>
                </button>
             </div>`;

    html += `<span class="pg-info">${_ltCurPage} / ${totalPages}</span>`;

    el.innerHTML = html;
}

function buildLtPageNumbers(cur, total) {
    if (total <= 7) return Array.from({length: total}, (_, i) => i + 1);
    const pages = [];
    pages.push(1);
    if (cur > 3) pages.push('…');
    const start = Math.max(2, cur - 1);
    const end   = Math.min(total - 1, cur + 1);
    for (let i = start; i <= end; i++) pages.push(i);
    if (cur < total - 2) pages.push('…');
    pages.push(total);
    return pages;
}

function ltRenderPage(page) {
    _ltCurPage = page;
    renderList(_ltFiltered);
    document.getElementById('ltList').scrollIntoView({ behavior:'smooth', block:'start' });
}

function ltActivateJump() {
    const btn = document.getElementById('ltPgHashBtn');
    const go  = document.getElementById('ltPgJumpGo');
    if (!btn) return;
    const totalPages = Math.ceil(_ltFiltered.length / LT_PER_PAGE);
    btn.classList.add('is-input');
    btn.innerHTML = `<input type="number" class="pg-inline-input" id="ltPgJumpInput"
        min="1" placeholder="#" autocomplete="off"
        onblur="ltDeactivateJump()"
        onkeydown="ltHandleJumpKey(event, ${totalPages})">`;
    if (go) go.style.display = '';
    const input = document.getElementById('ltPgJumpInput');
    if (input) {
        input.focus();
        input.addEventListener('input', () => {
            btn.style.width = Math.max(52, Math.min(72, input.value.length * 10 + 36)) + 'px';
        });
    }
}

function ltDeactivateJump() {
    setTimeout(() => {
        const btn = document.getElementById('ltPgHashBtn');
        const go  = document.getElementById('ltPgJumpGo');
        if (!btn) return;
        btn.classList.remove('is-input');
        btn.style.width = '';
        btn.innerHTML = '#';
        if (go) go.style.display = 'none';
    }, 150);
}

function ltHandleJumpKey(e, totalPages) {
    if (e.key === 'Enter') ltJumpToPage(totalPages);
    if (e.key === 'Escape') { const btn = document.getElementById('ltPgHashBtn'); if (btn) btn.blur(); }
}

function ltJumpToPage(totalPages) {
    const input = document.getElementById('ltPgJumpInput');
    if (!input) return;
    const val = parseInt(input.value);
    if (!isNaN(val) && val >= 1 && val <= totalPages) {
        ltRenderPage(val);
    } else if (input.value !== '') {
        showToast(`Halaman harus antara 1 – ${totalPages}`, 'error');
        input.value = '';
        input.focus();
    }
}

/* ================================================================
   SEARCH / FILTER
================================================================ */
function filterList() {
    const q = document.getElementById('ltSearch').value.toLowerCase();
    const res = q ? ltData.filter(lt => lt.judul.toLowerCase().includes(q) || lt.kode.toLowerCase().includes(q)) : ltData;
    _ltCurPage = 1;
    renderList(res);
}

/* ================================================================
   CREATE TOGGLE
================================================================ */
function toggleCreate() {
    document.getElementById('createHeader').classList.toggle('is-open');
    document.getElementById('createBody').classList.toggle('is-open');
}

/* ================================================================
   ITEM ROWS
================================================================ */
function addItemRow(listId, label='', url='') {
    const div = document.createElement('div');
    div.className = 'lt-item-row';
    div.innerHTML = `
        <input type="text" class="fp-input item-label" placeholder="Label (contoh: Instagram)" value="${esc(label)}" maxlength="100">
        <input type="url"  class="fp-input item-url"   placeholder="https://..." value="${esc(url)}" maxlength="2048">
        <button class="lt-item-remove" onclick="removeItemRow(this)" title="Hapus"><i class="bi bi-x"></i></button>`;
    document.getElementById(listId).appendChild(div);
}
function removeItemRow(btn) { btn.closest('.lt-item-row').remove(); }
function getItemRows(listId) {
    return Array.from(document.querySelectorAll(`#${listId} .lt-item-row`)).map(row => ({
        label: row.querySelector('.item-label').value.trim(),
        url:   row.querySelector('.item-url').value.trim(),
    }));
}

/* ================================================================
   COLOR PICKER
================================================================ */
function syncColorHex(pickerId, hexId) { document.getElementById(hexId).value = document.getElementById(pickerId).value; }
function syncColorPicker(hexId, pickerId) {
    const val = document.getElementById(hexId).value;
    if (/^#[0-9a-fA-F]{6}$/.test(val)) document.getElementById(pickerId).value = val;
}

/* ================================================================
   SUBMIT CREATE
================================================================ */
async function submitCreate() {
    clearErrors(['c_judul_err','c_kode_err','c_items_err']);
    const judul     = document.getElementById('c_judul').value.trim();
    const kode      = document.getElementById('c_kode').value.trim();
    const deskripsi = document.getElementById('c_deskripsi').value.trim();
    const warna     = document.getElementById('c_warna_hex').value.trim() || '#1c6b3a';
    const items     = getItemRows('c_items_list');

    let valid = true;
    if (!judul) { showError('c_judul_err','Judul tidak boleh kosong.'); valid=false; }
    if (kode && !/^[a-zA-Z0-9\-_]+$/.test(kode)) { showError('c_kode_err','Kode hanya boleh huruf, angka, - dan _.'); valid=false; }
    if (!items.length) { showError('c_items_err','Tambahkan minimal 1 link.'); valid=false; }
    else if (items.find(it => !it.label || !it.url)) { showError('c_items_err','Semua label dan URL harus diisi.'); valid=false; }
    if (!valid) return;

    setLoading('c_submit','c_spin','c_submit_icon', true);
    try {
        // 1. Buat link tree dulu
        const res = await _ltFetch('/api/linktree', 'POST', {
            npp: NPP, judul, kode: kode||null, deskripsi: deskripsi||null, tema_warna: warna, items
        });
        if (res.status !== 'success') throw new Error(res.message);

        const newTree = res.data;

        // 2. Upload foto jika ada (fire-and-forget, error tidak blokir)
        if (_cFotoPendingBase64) {
            try {
                const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                const fotoRes = await apiFetch(`/api/linktree/${newTree.id}/foto`, {
                    method: 'POST',
                    headers: { 'Content-Type':'application/json', 'Accept':'application/json', 'X-CSRF-TOKEN':csrf },
                    body: JSON.stringify({ foto: _cFotoPendingBase64 }),
                });
                const fotoJson = await fotoRes.json();
                if (fotoJson.status === 'success') {
                    newTree.foto = _cFotoPendingBase64;
                }
            } catch(fotoErr) {
                // Link tree sudah dibuat, foto gagal — beri tahu user tapi jangan throw
                showToast('Link tree dibuat, tapi foto gagal diupload. Coba upload ulang via menu Foto Profil.', 'error');
            }
        }

        showToast('Link tree berhasil dibuat!', 'success');
        ltData.unshift(newTree);
        _ltCurPage = 1;
        renderList(ltData);
        document.getElementById('ltCount').textContent = ltData.length + ' item';

        // Reset form
        ['c_judul','c_kode','c_deskripsi'].forEach(id => document.getElementById(id).value='');
        document.getElementById('c_warna_picker').value = '#1c6b3a';
        document.getElementById('c_warna_hex').value    = '#1c6b3a';
        document.getElementById('c_items_list').innerHTML = '';
        addItemRow('c_items_list');
        resetCFoto();
        document.getElementById('createHeader').classList.remove('is-open');
        document.getElementById('createBody').classList.remove('is-open');
    } catch(e) {
        showToast(e.message, 'error');
    } finally {
        setLoading('c_submit','c_spin','c_submit_icon', false);
    }
}

/* ================================================================
   PANEL — OPEN / CLOSE / NAVIGATE
================================================================ */
let _ltQrObj = null;  // instance QRCode untuk panel

function openPanel(id) {
    activeLt = ltData.find(lt => lt.id === id);
    if (!activeLt) return;

    // Tandai gear aktif
    document.querySelectorAll('.lt-gear').forEach(g => g.classList.remove('is-active'));
    const gear = document.querySelector(`.lt-gear[data-id="${id}"]`);
    if (gear) gear.classList.add('is-active');

    // Sidebar head
    document.getElementById('sbJudul').textContent = activeLt.judul;
    document.getElementById('sbKode').textContent  = 'lt/' + activeLt.kode;

    goPage('info');
    document.getElementById('fpBackdrop').classList.add('show');
    document.getElementById('fpPanel').classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closePanel() {
    document.getElementById('fpBackdrop').classList.remove('show');
    document.getElementById('fpPanel').classList.remove('show');
    document.body.style.overflow = '';
    document.querySelectorAll('.lt-gear').forEach(g => g.classList.remove('is-active'));
    if (_ltStatChart) { _ltStatChart.destroy(); _ltStatChart = null; }
    activeLt = null;
}

function goPage(page) {
    activeTab = page;
    ['info','stat','foto','edit','delete'].forEach(p => {
        document.getElementById(`fp-page-${p}`).classList.toggle('is-active', p === page);
        document.getElementById(`fp-nav-${p}`).classList.toggle('is-active', p === page);
    });

    if (page === 'info')   fillInfo();
    if (page === 'stat')   loadLtStat();
    if (page === 'foto')   fillFoto();
    if (page === 'edit')   fillEdit();
    if (page === 'delete') fillDelete();
}

/* ── Fill Detail ── */
function fillInfo() {
    const lt = activeLt;

    // URL
    const urlEl = document.getElementById('d_url');
    urlEl.href        = lt.public_url;
    urlEl.textContent = lt.public_url;
    document.getElementById('d_open_btn').href = lt.public_url;

    // Stats
    document.getElementById('d_visits').textContent  = lt.visits.toLocaleString('id');
    document.getElementById('d_clicks').textContent  = lt.total_clicks.toLocaleString('id');
    document.getElementById('d_via_qr').textContent  = lt.visits_qr.toLocaleString('id');
    document.getElementById('d_via_link').textContent = lt.visits_link.toLocaleString('id');
    document.getElementById('d_ctr_badge').textContent = 'CTR ' + lt.ctr + '%';
    document.getElementById('d_desc').textContent    = lt.deskripsi || '—';
    document.getElementById('d_created').textContent = lt.created_at;
    document.getElementById('d_item_count').textContent = lt.items.length;

    // Warna
    document.getElementById('d_warna').innerHTML =
        `<span style="display:inline-block;width:16px;height:16px;border-radius:50%;background:${esc(lt.tema_warna)};border:1px solid rgba(0,0,0,0.15);flex-shrink:0;"></span><span>${esc(lt.tema_warna)}</span>`;

    // Items list
    document.getElementById('d_items_list').innerHTML = lt.items.length
        ? lt.items.map((item, i) => `
            <li class="fp-item-row">
                <span class="fp-item-num">${i+1}</span>
                <div class="fp-item-info">
                    <div class="fp-item-label">${esc(item.label)}</div>
                    <div class="fp-item-url">${esc(item.url)}</div>
                </div>
                <span class="fp-item-visits"><i class="bi bi-cursor"></i> ${item.visits}</span>
            </li>`).join('')
        : '<li style="color:var(--md-text-disabled);font-size:0.85rem;padding:8px 0;">Tidak ada link.</li>';

    // QR
    const box = document.getElementById('fpQrCanvas').parentElement;
    document.getElementById('fpQrCanvas').remove();
    const qrDiv = document.createElement('div');
    qrDiv.id = 'fpQrCanvas';
    box.appendChild(qrDiv);
    document.getElementById('fpQrLabel').textContent = lt.qr_url;
    if (_ltQrObj) { try { _ltQrObj.clear(); } catch(e){} }
    _ltQrObj = new QRCode(qrDiv, { text: lt.qr_url, width:80, height:80, correctLevel: QRCode.CorrectLevel.M });
}

/* ── Download QR ── */
function downloadQr() {
    const img = document.querySelector('#fpQrCanvas img') || document.getElementById('fpQrCanvas');
    const src = img.tagName === 'IMG' ? img.src : img.toDataURL('image/png');
    const a = document.createElement('a');
    a.download = `qr-lt-${activeLt.kode}.png`;
    a.href = src; a.click();
}

/* ── Fill Edit ── */
function fillEdit() {
    const lt = activeLt;
    document.getElementById('e_judul').value         = lt.judul;
    document.getElementById('e_kode').value          = lt.kode;
    document.getElementById('e_deskripsi').value     = lt.deskripsi || '';
    document.getElementById('e_warna_picker').value  = lt.tema_warna;
    document.getElementById('e_warna_hex').value     = lt.tema_warna;
    const list = document.getElementById('e_items_list');
    list.innerHTML = '';
    lt.items.forEach(item => addItemRow('e_items_list', item.label, item.url));
    if (!lt.items.length) addItemRow('e_items_list');
    clearErrors(['e_judul_err','e_kode_err','e_items_err']);
}

/* ── Fill Delete ── */
function fillDelete() {
    document.getElementById('del_judul').textContent     = activeLt.judul;
    document.getElementById('del_judul_val').textContent = activeLt.judul;
    document.getElementById('del_confirm').checked       = false;
    document.getElementById('del_btn').disabled          = true;
}

function toggleDeleteBtn() {
    document.getElementById('del_btn').disabled = !document.getElementById('del_confirm').checked;
}

/* ================================================================
   STATISTIK PANEL — per link tree
================================================================ */
let _ltStatChart = null;
let _ltStatRange = 'day';

function setLtRange(btn) {
    _ltStatRange = btn.dataset.r;
    document.querySelectorAll('.fp-range-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    loadLtStat();
}

async function loadLtStat() {
    if (!activeLt) return;
    document.getElementById('ltChartLoading').style.display = 'flex';

    try {
        const url = `/api/statistik/linktree?npp=${encodeURIComponent(NPP)}&range=${_ltStatRange}&linktree_id=${activeLt.id}`;
        const data = await _ltFetch(url);
        if (data.status !== 'success') throw new Error(data.message);

        // Mini stats
        document.getElementById('st_pageviews').textContent = data.summary_pageviews.toLocaleString('id');
        document.getElementById('st_clicks').textContent    = data.summary_clicks.toLocaleString('id');
        document.getElementById('st_ctr').textContent       = data.summary_ctr + '%';

        // Chart
        const ctx = document.getElementById('ltStatChart').getContext('2d');
        if (_ltStatChart) { _ltStatChart.destroy(); _ltStatChart = null; }

        const isDark   = document.documentElement.getAttribute('data-theme') === 'dark';
        const linkCl   = isDark ? '#9ab3d9' : '#4a6fa8';
        const qrCl     = isDark ? '#8bc99f' : '#2a7a4a';
        const uniqueCl = isDark ? '#c9a3e8' : '#6428a0';
        const gridCl   = isDark ? 'rgba(255,255,255,0.07)' : 'rgba(0,0,0,0.07)';
        const textCl   = isDark ? '#b0b0b0' : '#4a574a';
        const tipBg    = isDark ? '#262626' : '#ecf4ed';

        Chart.defaults.color       = textCl;
        Chart.defaults.borderColor = gridCl;
        Chart.defaults.font.family = "'Inter', sans-serif";

        _ltStatChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [
                    { label:'Via Link',  data:data.visits_link,     backgroundColor:`${linkCl}b3`,   borderWidth:0, borderRadius:3 },
                    { label:'Via QR',    data:data.visits_qr,       backgroundColor:`${qrCl}b3`,     borderWidth:0, borderRadius:3 },
                    { label:'Unique',    data:data.unique_visitors,  backgroundColor:`${uniqueCl}a6`, borderWidth:0, borderRadius:3 },
                ]
            },
            options: {
                responsive:true, maintainAspectRatio:false,
                interaction: { mode:'index', intersect:false },
                animation:   { duration:400 },
                plugins: {
                    legend: { display:false },
                    tooltip: {
                        backgroundColor:tipBg, borderColor:gridCl, borderWidth:1, padding:10,
                        titleColor:textCl, bodyColor:textCl,
                        callbacks: { label: c => ` ${c.dataset.label}: ${c.parsed.y}` }
                    }
                },
                scales: {
                    x: { grid:{ color:gridCl }, ticks:{ maxRotation:45, font:{size:10}, maxTicksLimit:12, color:textCl } },
                    y: { beginAtZero:true, grid:{ color:gridCl }, ticks:{ font:{size:10}, stepSize:1, color:textCl, callback:v=>Number.isInteger(v)?v:null } }
                }
            }
        });
    } catch(e) {
        document.getElementById('st_pageviews').textContent = '—';
        document.getElementById('st_clicks').textContent    = '—';
        document.getElementById('st_ctr').textContent       = '—';
    } finally {
        document.getElementById('ltChartLoading').style.display = 'none';
    }
}

/* ================================================================
   SUBMIT EDIT
================================================================ */
async function submitEdit() {
    clearErrors(['e_judul_err','e_kode_err','e_items_err']);
    const judul     = document.getElementById('e_judul').value.trim();
    const kode      = document.getElementById('e_kode').value.trim();
    const deskripsi = document.getElementById('e_deskripsi').value.trim();
    const warna     = document.getElementById('e_warna_hex').value.trim() || activeLt.tema_warna;
    const items     = getItemRows('e_items_list');

    let valid = true;
    if (!judul) { showError('e_judul_err','Judul tidak boleh kosong.'); valid=false; }
    if (!kode)  { showError('e_kode_err','Kode tidak boleh kosong.'); valid=false; }
    else if (!/^[a-zA-Z0-9\-_]+$/.test(kode)) { showError('e_kode_err','Kode hanya boleh huruf, angka, - dan _.'); valid=false; }
    if (!items.length) { showError('e_items_err','Tambahkan minimal 1 link.'); valid=false; }
    else if (items.find(it => !it.label || !it.url)) { showError('e_items_err','Semua label dan URL harus diisi.'); valid=false; }
    if (!valid) return;

    setLoading('e_submit','e_spin','e_submit_icon', true);
    try {
        const res = await _ltFetch(`/api/linktree/${activeLt.id}`, 'PUT', {
            judul, kode, deskripsi: deskripsi||null, tema_warna: warna, items
        });
        if (res.status !== 'success') throw new Error(res.message);

        showToast('Link tree berhasil diperbarui!', 'success');
        Object.assign(activeLt, res.data);
        const idx = ltData.findIndex(lt => lt.id === activeLt.id);
        if (idx !== -1) ltData[idx] = { ...ltData[idx], ...res.data };
        renderList(ltData);
        document.getElementById('sbJudul').textContent = activeLt.judul;
        document.getElementById('sbKode').textContent  = 'lt/' + activeLt.kode;
        goPage('info');
    } catch(e) {
        showToast(e.message, 'error');
    } finally {
        setLoading('e_submit','e_spin','e_submit_icon', false);
    }
}

/* ================================================================
   SUBMIT DELETE
================================================================ */
async function submitDelete() {
    if (!document.getElementById('del_confirm').checked) return;
    setLoading('del_btn','del_spin','del_icon', true);
    try {
        const res = await _ltFetch(`/api/linktree/${activeLt.id}`, 'DELETE');
        if (res.status !== 'success') throw new Error(res.message);

        showToast('Link tree berhasil dihapus.', 'success');
        ltData = ltData.filter(lt => lt.id !== activeLt.id);
        const totalPages = Math.ceil(ltData.length / LT_PER_PAGE);
        if (_ltCurPage > totalPages) _ltCurPage = Math.max(1, totalPages);
        renderList(ltData);
        document.getElementById('ltCount').textContent = ltData.length + ' item';
        closePanel();
    } catch(e) {
        showToast(e.message, 'error');
        setLoading('del_btn','del_spin','del_icon', false);
    }
}

/* ================================================================
   FOTO PROFIL — FORM CREATE
================================================================ */
let _cFotoPendingBase64 = null;

function triggerCFotoInput() {
    document.getElementById('cFotoFileInput').click();
}

function onCFotoSelected(input) {
    const file = input.files[0];
    if (!file) return;

    const errEl = document.getElementById('cFotoError');
    errEl.style.display = 'none';

    if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
        errEl.textContent  = 'Format tidak didukung. Gunakan JPEG, PNG, atau WebP.';
        errEl.style.display = 'block';
        return;
    }
    if (file.size > 3 * 1024 * 1024) {
        errEl.textContent  = 'Ukuran file terlalu besar. Maksimal 3 MB.';
        errEl.style.display = 'block';
        return;
    }

    // Kompres & resize via canvas (max 400×400, quality 0.82)
    const reader = new FileReader();
    reader.onload = (e) => {
        const img = new Image();
        img.onload = () => {
            const MAX = 400;
            let w = img.width, h = img.height;
            if (w > MAX || h > MAX) {
                if (w > h) { h = Math.round(h * MAX / w); w = MAX; }
                else       { w = Math.round(w * MAX / h); h = MAX; }
            }
            const canvas = document.createElement('canvas');
            canvas.width = w; canvas.height = h;
            canvas.getContext('2d').drawImage(img, 0, 0, w, h);
            const base64 = canvas.toDataURL('image/jpeg', 0.82);

            _cFotoPendingBase64 = base64;

            // Tampilkan preview
            const previewImg    = document.getElementById('cFotoPreviewImg');
            const placeholder   = document.getElementById('cFotoPlaceholder');
            previewImg.src      = base64;
            previewImg.style.display    = 'block';
            placeholder.style.display   = 'none';

            // Tampilkan nama file & tombol hapus
            document.getElementById('cFotoName').textContent  = file.name;
            document.getElementById('cFotoRemoveBtn').classList.add('visible');
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

function removeCFoto() {
    resetCFoto();
}

function resetCFoto() {
    _cFotoPendingBase64 = null;
    const previewImg  = document.getElementById('cFotoPreviewImg');
    const placeholder = document.getElementById('cFotoPlaceholder');
    previewImg.src            = '';
    previewImg.style.display  = 'none';
    placeholder.style.display = '';
    document.getElementById('cFotoName').textContent        = '';
    document.getElementById('cFotoError').style.display     = 'none';
    document.getElementById('cFotoRemoveBtn').classList.remove('visible');
    document.getElementById('cFotoFileInput').value         = '';
}

/* ================================================================
   FOTO PROFIL — PANEL EDIT
================================================================ */
let _fotoPendingBase64 = null; // base64 yang sudah dipilih user tapi belum disimpan

function fillFoto() {
    _fotoPendingBase64 = null;
    const hasFoto = activeLt.foto && activeLt.foto.length > 0;

    // Set preview
    _setFotoPreview(hasFoto ? activeLt.foto : null);

    // Tombol hapus hanya tampil jika sudah ada foto tersimpan
    document.getElementById('fotoDeleteBtn').style.display = hasFoto ? '' : 'none';
    document.getElementById('fotoSaveBtn').style.display   = 'none';

    // Reset state
    document.getElementById('fotoFileInput').value = '';
    document.getElementById('fotoError').style.display = 'none';
    document.getElementById('fotoProgress').style.display = 'none';

    // Sesuaikan border avatar dengan tema warna
    document.getElementById('fotoAvatarPreview').style.borderColor = activeLt.tema_warna;
}

function _setFotoPreview(src) {
    const img         = document.getElementById('fotoPreviewImg');
    const placeholder = document.getElementById('fotoPlaceholderIcon');
    if (src) {
        img.src           = src;
        img.style.display = 'block';
        placeholder.style.display = 'none';
    } else {
        img.src           = '';
        img.style.display = 'none';
        placeholder.style.display = 'flex';
    }
}

function triggerFotoInput() {
    document.getElementById('fotoFileInput').click();
}

function onFotoSelected(input) {
    const file = input.files[0];
    if (!file) return;

    // Validasi tipe
    if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
        _showFotoError('Format tidak didukung. Gunakan JPEG, PNG, atau WebP.');
        return;
    }

    // Validasi ukuran awal (3 MB)
    if (file.size > 3 * 1024 * 1024) {
        _showFotoError('Ukuran file terlalu besar. Maksimal 3 MB.');
        return;
    }

    _showFotoError('');

    // Kompres & resize via canvas (max 400×400, quality 0.82)
    const reader = new FileReader();
    reader.onload = (e) => {
        const img = new Image();
        img.onload = () => {
            const MAX = 400;
            let w = img.width, h = img.height;
            if (w > MAX || h > MAX) {
                if (w > h) { h = Math.round(h * MAX / w); w = MAX; }
                else       { w = Math.round(w * MAX / h); h = MAX; }
            }
            const canvas = document.createElement('canvas');
            canvas.width = w; canvas.height = h;
            canvas.getContext('2d').drawImage(img, 0, 0, w, h);
            const base64 = canvas.toDataURL('image/jpeg', 0.82);

            _fotoPendingBase64 = base64;
            _setFotoPreview(base64);
            document.getElementById('fotoSaveBtn').style.display   = '';
            document.getElementById('fotoDeleteBtn').style.display = activeLt.foto ? '' : 'none';
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

async function saveFoto() {
    if (!_fotoPendingBase64) return;

    setLoading('fotoSaveBtn','fotoSaveSpin','fotoSaveIcon', true);

    // Tampilkan progress bar animasi
    const prog    = document.getElementById('fotoProgress');
    const progBar = document.getElementById('fotoProgressBar');
    prog.style.display = 'block';
    progBar.style.width = '30%';

    try {
        // Kirim sebagai JSON (base64 string)
        const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const resp = await apiFetch(`/api/linktree/${activeLt.id}/foto`, {
            method: 'POST',
            headers: { 'Content-Type':'application/json', 'Accept':'application/json', 'X-CSRF-TOKEN':csrf },
            body: JSON.stringify({ foto: _fotoPendingBase64 }),
        });
        progBar.style.width = '80%';
        const res = await resp.json();
        progBar.style.width = '100%';

        if (res.status !== 'success') throw new Error(res.message);

        // Update state lokal
        activeLt.foto = _fotoPendingBase64;
        const idx = ltData.findIndex(lt => lt.id === activeLt.id);
        if (idx !== -1) ltData[idx].foto = _fotoPendingBase64;

        _fotoPendingBase64 = null;
        document.getElementById('fotoSaveBtn').style.display   = 'none';
        document.getElementById('fotoDeleteBtn').style.display = '';
        showToast('Foto berhasil disimpan!', 'success');

        // Re-render list agar thumbnail di list ikut update
        renderList(ltData);

    } catch(e) {
        _showFotoError(e.message || 'Gagal menyimpan foto.');
    } finally {
        setLoading('fotoSaveBtn','fotoSaveSpin','fotoSaveIcon', false);
        setTimeout(() => { prog.style.display = 'none'; progBar.style.width = '0%'; }, 600);
    }
}

async function deleteFoto() {
    setLoading('fotoDeleteBtn','fotoDeleteSpin','fotoDeleteIcon', true);
    try {
        const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const resp = await apiFetch(`/api/linktree/${activeLt.id}/foto`, {
            method: 'DELETE',
            headers: { 'Accept':'application/json', 'X-CSRF-TOKEN':csrf },
        });
        const res = await resp.json();
        if (res.status !== 'success') throw new Error(res.message);

        activeLt.foto = null;
        const idx = ltData.findIndex(lt => lt.id === activeLt.id);
        if (idx !== -1) ltData[idx].foto = null;

        _fotoPendingBase64 = null;
        _setFotoPreview(null);
        document.getElementById('fotoDeleteBtn').style.display = 'none';
        document.getElementById('fotoSaveBtn').style.display   = 'none';
        document.getElementById('fotoFileInput').value = '';
        showToast('Foto berhasil dihapus.', 'success');
        renderList(ltData);

    } catch(e) {
        _showFotoError(e.message || 'Gagal menghapus foto.');
    } finally {
        setLoading('fotoDeleteBtn','fotoDeleteSpin','fotoDeleteIcon', false);
    }
}

function _showFotoError(msg) {
    const el = document.getElementById('fotoError');
    el.textContent     = msg;
    el.style.display   = msg ? 'block' : 'none';
}

/* ================================================================
   UTILITIES
================================================================ */
function esc(str) {
    if (str == null) return '';
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
}

async function _ltFetch(url, method='GET', body=null) {
    // Menggunakan apiFetch dari Layout-dashboard agar:
    // 1. Token selalu diambil fresh dari localStorage
    // 2. Response 401 (token expired/invalid) ditangani otomatis → redirect ke login
    // 3. Cache 5 menit di CheckAuth middleware aktif karena token dikirim via Bearer
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const opts = {
        method,
        headers: {
            'X-CSRF-TOKEN': csrf,
        },
    };
    if (body) opts.body = JSON.stringify(body);
    const res = await apiFetch(url, opts);
    return res.json();
}

let _toastTimer = null;
function showToast(msg, type='success') {
    const el   = document.getElementById('toastEl');
    const icon = document.getElementById('toastIcon');
    const text = document.getElementById('toastMsg');
    icon.className = `bi bi-${type === 'success' ? 'check-circle-fill' : 'exclamation-circle-fill'}`;
    text.textContent = msg;
    el.className = `md-toast toast-${type} show`;
    clearTimeout(_toastTimer);
    _toastTimer = setTimeout(() => el.classList.remove('show'), 3500);
}

function showError(id, msg) { const el=document.getElementById(id); if(el){el.textContent=msg;el.style.display='block';} }
function clearErrors(ids) { ids.forEach(id=>{ const el=document.getElementById(id); if(el){el.textContent='';el.style.display='none';} }); }

function setLoading(btnId, spinId, iconId, loading) {
    const btn  = document.getElementById(btnId);
    const spin = document.getElementById(spinId);
    const icon = document.getElementById(iconId);
    if (!btn) return;
    btn.disabled = loading;
    if (spin) spin.style.display = loading ? 'inline-block' : 'none';
    if (icon) icon.style.display = loading ? 'none'         : 'inline-block';
}
</script>
@endsection
