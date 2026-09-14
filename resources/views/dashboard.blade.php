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
   DASHBOARD — theme-aware tokens
===================================================== */

/* Light mode extras (inherits base tokens from layout) */
:root {
    --db-name-color:      #1c6b3a;
    --db-stat-card-bg:    #d5e5d9;
    --db-icon-link-bg:    rgba(28,107,58,0.11);
    --db-icon-link-cl:    #1c6b3a;
    --db-icon-link-bd:    rgba(28,107,58,0.26);
    --db-icon-total-bg:   rgba(43,90,140,0.09);
    --db-icon-total-cl:   #2b5a8c;
    --db-icon-total-bd:   rgba(43,90,140,0.24);
    --db-icon-qr-bg:      rgba(136,91,14,0.09);
    --db-icon-qr-cl:      #885b0e;
    --db-icon-qr-bd:      rgba(136,91,14,0.24);

    --db-item-hover:      rgba(0,0,0,0.025);
    --db-sl-short-cl:     #1c6b3a;
    --db-copy-hover-bg:   rgba(28,107,58,0.11);
    --db-copy-hover-bd:   rgba(28,107,58,0.28);
    --db-copy-hover-cl:   #1c6b3a;
    --db-copy-done-bg:    rgba(28,107,58,0.18);
    --db-copy-done-bd:    rgba(28,107,58,0.42);
    --db-copy-done-cl:    #135028;
    --db-footer-hover-cl: #1c6b3a;
    --db-loading-ring-bd: rgba(0,0,0,0.08);
    --db-loading-ring-top:#1c6b3a;
    --db-toast-bg:        #ecf4ed;
    --db-toast-bd:        #3a8a5a;
    --db-toast-cl:        #1c6b3a;
    --db-toast-sh:        0 8px 24px rgba(0,0,0,0.12);
    --sl-input-bg:              var(--md-bg-elevated);
    --sl-input-hover-bg:        rgba(0,0,0,0.025);
    --sl-input-prefix-bg:       var(--md-bg-elevated);
    --sl-search-focus-bd:       rgba(28,107,58,0.55);
    --sl-search-focus-sh:       rgba(28,107,58,0.10);
    --sl-create-header-hover-bg: rgba(0,0,0,0.03);
    --sl-create-header-open-bg:  rgba(0,0,0,0.03);
    --sl-create-btn-cancel-hover-bg: rgba(0,0,0,0.06);
    --sl-create-btn-cancel-hover-bd: rgba(0,0,0,0.13);
    --sl-create-btn-submit-bg:  rgba(28,107,58,0.12);
    --sl-create-btn-submit-bd:  rgba(28,107,58,0.32);
    --sl-create-btn-submit-cl:  #1c6b3a;
    --sl-create-btn-submit-hover-bg: rgba(28,107,58,0.22);
    --sl-create-btn-submit-hover-bd: rgba(28,107,58,0.55);
    --sl-create-btn-submit-hover-cl: #135028;
    --sl-create-spinner-bd:     rgba(28,107,58,0.25);
    --sl-create-spinner-top:    #1c6b3a;
    --sl-create-icon-bg:        rgba(28,107,58,0.12);
    --sl-create-icon-bd:        rgba(28,107,58,0.28);
    --sl-create-icon-cl:        #1c6b3a;
    --sl-create-icon-hover-bg:  rgba(28,107,58,0.20);
    --sl-create-icon-hover-bd:  rgba(28,107,58,0.48);
    --sl-create-icon-hover-cl:  #135028;
    --sl-create-error-bg:       rgba(137,34,34,0.08);
    --sl-create-error-bd:       rgba(137,34,34,0.20);
    --sl-create-error-cl:       #892222;
    --fp-error-cl:              #892222;
    --bg-grid-line:       rgba(0,0,0,0.04);
    --bg-blob-1:          rgba(107,155,122,0.09);
    --bg-blob-2:          rgba(100,130,200,0.06);
    --bg-blob-3:          rgba(179,155,107,0.05);
}

[data-theme="dark"] {
    --db-name-color:      #aaddb8;
    --db-stat-card-bg:    var(--md-bg-card);
    --db-icon-link-bg:    rgba(107,155,122,0.15);
    --db-icon-link-cl:    #8bc99f;
    --db-icon-link-bd:    rgba(107,155,122,0.30);
    --db-icon-total-bg:   rgba(154,176,197,0.15);
    --db-icon-total-cl:   #c2d4e8;
    --db-icon-total-bd:   rgba(154,176,197,0.30);
    --db-icon-qr-bg:      rgba(179,155,107,0.15);
    --db-icon-qr-cl:      #d9b97a;
    --db-icon-qr-bd:      rgba(179,155,107,0.30);

    --db-item-hover:      rgba(255,255,255,0.03);
    --db-sl-short-cl:     #8bc99f;
    --db-copy-hover-bg:   rgba(107,155,122,0.15);
    --db-copy-hover-bd:   rgba(107,155,122,0.30);
    --db-copy-hover-cl:   #8bc99f;
    --db-copy-done-bg:    rgba(107,155,122,0.20);
    --db-copy-done-bd:    rgba(107,155,122,0.45);
    --db-copy-done-cl:    #aaddb8;
    --db-footer-hover-cl: #8bc99f;
    --db-loading-ring-bd: rgba(255,255,255,0.08);
    --db-loading-ring-top:#8bc99f;
    --db-toast-bg:        #1a1a1a;
    --db-toast-bd:        #6b9b7a;
    --db-toast-cl:        #8bc99f;
    --db-toast-sh:        0 8px 24px rgba(0,0,0,0.60);
    --sl-input-bg:              var(--md-bg-elevated);
    --sl-input-hover-bg:        rgba(255,255,255,0.04);
    --sl-input-prefix-bg:       rgba(255,255,255,0.04);
    --sl-search-focus-bd:       rgba(107,155,122,0.60);
    --sl-search-focus-sh:       rgba(107,155,122,0.12);
    --sl-create-header-hover-bg: rgba(255,255,255,0.03);
    --sl-create-header-open-bg:  rgba(255,255,255,0.03);
    --sl-create-btn-cancel-hover-bg: rgba(255,255,255,0.06);
    --sl-create-btn-cancel-hover-bd: rgba(255,255,255,0.15);
    --sl-create-btn-submit-bg:  rgba(107,155,122,0.18);
    --sl-create-btn-submit-bd:  rgba(107,155,122,0.40);
    --sl-create-btn-submit-cl:  #8bc99f;
    --sl-create-btn-submit-hover-bg: rgba(107,155,122,0.28);
    --sl-create-btn-submit-hover-bd: rgba(107,155,122,0.65);
    --sl-create-btn-submit-hover-cl: #aaddb8;
    --sl-create-spinner-bd:     rgba(107,155,122,0.30);
    --sl-create-spinner-top:    #8bc99f;
    --sl-create-icon-bg:        rgba(107,155,122,0.15);
    --sl-create-icon-bd:        rgba(107,155,122,0.30);
    --sl-create-icon-cl:        #8bc99f;
    --sl-create-icon-hover-bg:  rgba(107,155,122,0.25);
    --sl-create-icon-hover-bd:  rgba(107,155,122,0.55);
    --sl-create-icon-hover-cl:  #aaddb8;
    --sl-create-error-bg:       rgba(179,107,107,0.12);
    --sl-create-error-bd:       rgba(179,107,107,0.30);
    --sl-create-error-cl:       #d98989;
    --fp-error-cl:              #d98989;
    --bg-grid-line:       rgba(255,255,255,0.018);
    --bg-blob-1:          rgba(107,155,122,0.06);
    --bg-blob-2:          rgba(100,130,200,0.04);
    --bg-blob-3:          rgba(179,155,107,0.03);
}

@keyframes pulse   { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.08); } }
@keyframes fadeUp  { from { opacity:0; transform:translateY(14px); } to { opacity:1; transform:translateY(0); } }
@keyframes fadeIn  { from { opacity:0; } to { opacity:1; } }
@keyframes spin    { to { transform:rotate(360deg); } }

/* ── Header ── */
.db-header { margin-bottom:28px; animation:fadeUp 0.35s ease-out both; }
.db-header h2 {
    font-size:1.75rem; font-weight:700; color:var(--md-text-primary);
    letter-spacing:-0.02em; margin:0 0 4px;
}
.db-header p { font-size:0.9375rem; color:var(--md-text-secondary); margin:0; }
.db-header span#dashboardName { color:var(--db-name-color); }

/* ── Summary cards ── */
.db-summary {
    display:grid; grid-template-columns:repeat(2,1fr); gap:16px;
    margin-bottom:28px;
}
@media(max-width:720px) { .db-summary { grid-template-columns:1fr; } }

.db-stat-card {
    background:var(--db-stat-card-bg); border:1px solid var(--md-border);
    border-radius:14px; padding:20px 22px;
    display:flex; align-items:center; gap:16px;
    box-shadow:var(--md-elevation-2);
    transition:box-shadow 0.2s, transform 0.2s;
    animation:fadeUp 0.4s ease-out both;
}
.db-stat-card:hover { box-shadow:var(--md-elevation-4); transform:translateY(-2px); }
.db-stat-card:nth-child(1) { animation-delay:0.05s; }
.db-stat-card:nth-child(2) { animation-delay:0.12s; }
.db-stat-card:nth-child(3) { animation-delay:0.19s; }

.db-stat-icon {
    width:48px; height:48px; border-radius:12px; flex-shrink:0;
    display:flex; align-items:center; justify-content:center; font-size:1.3rem;
}
.db-stat-icon.ic-link  { background:var(--db-icon-link-bg);  color:var(--db-icon-link-cl);  border:1px solid var(--db-icon-link-bd); }
.db-stat-icon.ic-total { background:var(--db-icon-total-bg); color:var(--db-icon-total-cl); border:1px solid var(--db-icon-total-bd); }
.db-stat-icon.ic-qr    { background:var(--db-icon-qr-bg);    color:var(--db-icon-qr-cl);    border:1px solid var(--db-icon-qr-bd); }

.db-stat-body .db-stat-val {
    font-size:1.9rem; font-weight:700; color:var(--md-text-primary);
    line-height:1; letter-spacing:-0.02em;
}
.db-stat-body .db-stat-lbl {
    font-size:0.72rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.08em; color:var(--md-text-disabled); margin-top:5px;
}
.db-stat-body .db-stat-sub {
    font-size:0.78rem; color:var(--md-text-secondary); margin-top:3px;
}

/* ── Shortlink list — pakai style sl-item dari data-shortlink ── */
.db-list-card {
    background:var(--md-bg-card); border:1px solid var(--md-border);
    border-radius:14px; box-shadow:var(--md-elevation-2); overflow:hidden;
    animation:fadeUp 0.4s 0.28s ease-out both;
}
.db-list-head {
    padding:16px 24px; border-bottom:1px solid var(--md-border);
    display:flex; align-items:center; justify-content:space-between;
    background:var(--md-bg-elevated);
}
.db-list-head h5 { margin:0; font-size:0.975rem; font-weight:600; color:var(--md-text-primary); }
.db-badge {
    background:var(--md-bg-card); border:1px solid var(--md-border);
    color:var(--md-text-secondary); font-size:0.78rem; font-weight:500;
    padding:4px 12px; border-radius:20px;
}

/* sl-item style (sama dengan data-shortlink) */
.sl-list { list-style:none; margin:0; padding:0; }
.sl-item {
    display:flex; align-items:stretch;
    border-bottom:1px solid var(--md-border);
    padding:16px 20px; gap:18px;
    transition:background 0.15s;
    position:relative;
    animation:fadeUp 0.3s ease-out both;
}
.sl-item:last-child { border-bottom:none; }
.sl-item:hover { background:var(--db-item-hover); }

.sl-qr {
    flex-shrink:0;
    width:72px; height:72px;
    background:#fff; border-radius:8px; padding:4px;
    display:flex; align-items:center; justify-content:center;
    box-shadow:0 2px 8px rgba(0,0,0,0.12);
    align-self:center;
}
.sl-qr canvas, .sl-qr img { width:64px!important; height:64px!important; display:block; }

.sl-info {
    flex:1; min-width:0;
    display:flex; flex-direction:column; justify-content:center; gap:3px;
}
.sl-title {
    font-size:0.9375rem; font-weight:600; color:var(--md-text-primary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.sl-judul {
    font-size:0.9375rem; font-weight:600; color:var(--md-text-primary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.sl-short {
    font-size:1rem; font-weight:700;
    color:var(--db-sl-short-cl);
    display:flex; align-items:center; gap:8px; flex-wrap:wrap;
}
.sl-short a { color:var(--db-sl-short-cl); text-decoration:none; }
.sl-short a:hover { text-decoration:underline; }
.sl-copy-btn {
    background:none; border:none; cursor:pointer; padding:0;
    color:var(--md-text-disabled); font-size:0.8rem; transition:color 0.15s;
    display:inline-flex; align-items:center;
}
.sl-copy-btn:hover { color:var(--db-sl-short-cl); }
.sl-orig {
    font-size:0.8125rem; color:var(--md-text-secondary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.sl-date {
    font-size:0.775rem; color:var(--md-text-disabled);
    display:flex; align-items:center; gap:5px; margin-top:3px;
}

.sl-right {
    display:flex; flex-direction:column; align-items:flex-end;
    justify-content:center; flex-shrink:0; gap:8px;
    min-width:90px;
}
.sl-visits {
    font-size:0.75rem; color:var(--md-text-secondary);
    display:flex; flex-direction:column; align-items:flex-end; gap:3px;
}
.sl-visits-total {
    display:flex; align-items:center; gap:4px; white-space:nowrap;
}
.sl-visits-total strong { font-size:0.9375rem; font-weight:700; color:var(--md-text-primary); }
.sl-visits-detail {
    display:flex; gap:6px; font-size:0.7rem; color:var(--md-text-disabled);
}
.sl-visits-detail span { display:flex; align-items:center; gap:3px; }

.db-empty {
    text-align:center; padding:48px 20px;
    color:var(--md-text-secondary); font-size:0.9rem;
}
.db-empty i { font-size:2.8rem; display:block; margin-bottom:12px; color:var(--md-text-disabled); }

.db-loading { text-align:center; padding:40px 20px; color:var(--md-text-secondary); }
.db-loading-ring {
    width:32px; height:32px; border-radius:50%; margin:0 auto 12px;
    border:3px solid var(--db-loading-ring-bd); border-top-color:var(--db-loading-ring-top);
    animation:spin 0.8s linear infinite;
}
.db-list-footer {
    padding:12px 20px; border-top:1px solid var(--md-border); text-align:center;
}
.db-list-footer a {
    font-size:0.82rem; color:var(--md-text-secondary); text-decoration:none;
    display:inline-flex; align-items:center; gap:6px; transition:color 0.15s;
}
.db-list-footer a:hover { color:var(--db-footer-hover-cl); }

/* ── Form Buat ShortLink ── */
.sl-create-card {
    background:var(--md-bg-card);
    border:1px solid var(--md-border);
    border-radius:14px;
    box-shadow:var(--md-elevation-2);
    margin-bottom:24px; overflow:hidden;
    animation:fadeIn 0.35s ease-out;
    transition:box-shadow 0.2s;
}
.sl-create-card:hover { box-shadow:var(--md-elevation-4); }

/* ── Header ── */
.sl-create-header {
    background:var(--md-bg-card);
    padding:18px 24px;
    display:flex; align-items:center; justify-content:space-between;
    cursor:pointer; border-bottom:1px solid transparent;
    transition:background 0.15s, border-color 0.2s;
    user-select:none;
}
.sl-create-header:hover { background:var(--sl-create-header-hover-bg); }
.sl-create-header.open  { border-bottom-color:var(--md-border); background:var(--sl-create-header-open-bg); }

.sl-create-header-left { display:flex; align-items:center; gap:14px; }

.sl-create-icon {
    width:40px; height:40px; border-radius:10px; flex-shrink:0;
    background:var(--sl-create-icon-bg); border:1px solid var(--sl-create-icon-bd);
    color:var(--sl-create-icon-cl);
    display:flex; align-items:center; justify-content:center;
    font-size:1.1rem; transition:all 0.2s;
}
.sl-create-header:hover .sl-create-icon,
.sl-create-header.open  .sl-create-icon {
    background:var(--sl-create-icon-hover-bg);
    border-color:var(--sl-create-icon-hover-bd);
    color:var(--sl-create-icon-hover-cl);
}
.sl-create-header-left h5 {
    margin:0; font-size:1rem; font-weight:600;
    color:var(--md-text-primary); letter-spacing:-0.01em;
}
.sl-create-header-left small {
    font-size:0.775rem; color:var(--md-text-disabled);
    display:block; margin-top:2px;
}

.sl-create-toggle {
    width:30px; height:30px; border-radius:8px;
    border:1px solid var(--md-border);
    background:var(--md-bg-elevated); color:var(--md-text-disabled);
    display:flex; align-items:center; justify-content:center;
    font-size:0.8rem; transition:all 0.25s; flex-shrink:0;
}
.sl-create-header:hover .sl-create-toggle { color:var(--md-text-secondary); }
.sl-create-toggle.open { transform:rotate(180deg); color:var(--md-text-primary); }

/* ── Body ── */
.sl-create-body { display:none; }
.sl-create-body.open { display:block; }

.sl-create-body-inner {
    padding:24px 24px 0;
    display:grid; grid-template-columns:1fr 1fr; gap:20px;
}
@media(max-width:640px) { .sl-create-body-inner { grid-template-columns:1fr; } }

/* Field group */
.sl-create-field { display:flex; flex-direction:column; gap:6px; }

.sl-create-label {
    font-size:0.78rem; font-weight:600;
    text-transform:uppercase; letter-spacing:0.07em;
    color:var(--md-text-disabled);
}
.sl-create-required { color:var(--fp-error-cl); margin-left:3px; }
.sl-create-optional { color:var(--md-text-disabled); font-weight:400; text-transform:none; letter-spacing:0; margin-left:4px; font-size:0.75rem; }

.sl-create-input {
    width:100%; padding:11px 14px;
    background:var(--sl-input-bg);
    border:1px solid var(--md-border);
    border-radius:9px; color:var(--md-text-primary);
    font-size:0.9rem; font-family:'Inter',sans-serif;
    outline:none; box-sizing:border-box;
    transition:border-color 0.18s, box-shadow 0.18s, background 0.18s;
}
.sl-create-input:hover { background:var(--sl-input-hover-bg); }
.sl-create-input:focus {
    border-color:var(--sl-search-focus-bd);
    box-shadow:0 0 0 3px var(--sl-search-focus-sh);
    background:var(--sl-input-bg);
}
.sl-create-input::placeholder { color:var(--md-text-disabled); }

/* Input group (URL prefix) */
.sl-create-input-group {
    display:flex; align-items:stretch;
    border:1px solid var(--md-border);
    border-radius:9px; overflow:hidden;
    transition:border-color 0.18s, box-shadow 0.18s;
    background:var(--sl-input-bg);
}
.sl-create-input-group:focus-within {
    border-color:var(--sl-search-focus-bd);
    box-shadow:0 0 0 3px var(--sl-search-focus-sh);
}
.sl-create-prefix {
    padding:11px 12px;
    font-size:0.78rem; color:var(--md-text-disabled);
    border-right:1px solid var(--md-border);
    white-space:nowrap; display:flex; align-items:center;
    flex-shrink:0; background:var(--sl-input-prefix-bg);
    letter-spacing:-0.01em;
}
.sl-create-input-group .sl-create-input {
    border:none; border-radius:0; background:transparent; box-shadow:none;
}
.sl-create-input-group .sl-create-input:focus { box-shadow:none; background:transparent; }
.sl-create-input-group .sl-create-input:hover { background:transparent; }

/* Textarea */
.sl-create-textarea {
    width:100%; padding:11px 14px;
    background:var(--sl-input-bg);
    border:1px solid var(--md-border);
    border-radius:9px; color:var(--md-text-primary);
    font-size:0.9rem; font-family:'Inter',sans-serif;
    outline:none; box-sizing:border-box;
    resize:vertical; min-height:80px;
    transition:border-color 0.18s, box-shadow 0.18s, background 0.18s;
}
.sl-create-textarea:hover { background:var(--sl-input-hover-bg); }
.sl-create-textarea:focus {
    border-color:var(--sl-search-focus-bd);
    box-shadow:0 0 0 3px var(--sl-search-focus-sh);
    background:var(--sl-input-bg);
}
.sl-create-textarea::placeholder { color:var(--md-text-disabled); }

.sl-create-hint {
    font-size:0.73rem; color:var(--md-text-disabled);
    display:flex; align-items:center; gap:4px; margin-top:1px;
}

/* Error */
.sl-create-error {
    margin:0 24px; padding:10px 14px;
    background:var(--sl-create-error-bg); border:1px solid var(--sl-create-error-bd);
    border-radius:8px; color:var(--sl-create-error-cl);
    font-size:0.82rem; display:none; align-items:center; gap:8px;
}
.sl-create-error.show { display:flex; }

/* Footer */
.sl-create-footer {
    display:flex; align-items:center; justify-content:flex-end;
    gap:10px; padding:18px 24px;
    border-top:1px solid var(--md-border); margin-top:20px;
}

.sl-create-btn {
    padding:10px 20px; border-radius:9px;
    font-size:0.875rem; font-weight:500; font-family:'Inter',sans-serif;
    cursor:pointer; display:inline-flex; align-items:center; gap:8px;
    transition:all 0.18s cubic-bezier(0.4,0,0.2,1);
    border:1px solid transparent; letter-spacing:0.01em;
}
/* Reset — netral */
.sl-create-btn-cancel {
    background:var(--md-bg-elevated);
    border-color:var(--md-border);
    color:var(--md-text-secondary);
}
.sl-create-btn-cancel:hover {
    background:var(--sl-create-btn-cancel-hover-bg);
    border-color:var(--sl-create-btn-cancel-hover-bd);
    color:var(--md-text-primary);
}
/* Submit — hijau */
.sl-create-btn-submit {
    background:var(--sl-create-btn-submit-bg);
    border-color:var(--sl-create-btn-submit-bd);
    color:var(--sl-create-btn-submit-cl); min-width:148px; justify-content:center;
}
.sl-create-btn-submit:hover {
    background:var(--sl-create-btn-submit-hover-bg);
    border-color:var(--sl-create-btn-submit-hover-bd);
    color:var(--sl-create-btn-submit-hover-cl); transform:translateY(-1px);
}
.sl-create-btn-submit:disabled { opacity:0.35; cursor:not-allowed; transform:none; }

.sl-create-spinner {
    width:14px; height:14px;
    border:2px solid var(--sl-create-spinner-bd); border-top-color:var(--sl-create-spinner-top);
    border-radius:50%; animation:spin 0.7s linear infinite; display:none;
}

/* ── Background layer ── */
.bg-layer { position:fixed; inset:0; overflow:hidden; z-index:0; pointer-events:none; }
.bg-grid {
    position:absolute; inset:0;
    background-image:
        linear-gradient(var(--bg-grid-line) 1px, transparent 1px),
        linear-gradient(90deg, var(--bg-grid-line) 1px, transparent 1px);
    background-size:56px 56px;
}
.bg-blob { position:absolute; border-radius:50%; filter:blur(90px); animation:pulse 10s ease-in-out infinite; }
.bg-blob-1 { width:500px; height:500px; background:var(--bg-blob-1); top:-150px; left:-120px; animation-delay:0s; }
.bg-blob-2 { width:400px; height:400px; background:var(--bg-blob-2); bottom:-120px; right:-100px; animation-delay:4s; }
.bg-blob-3 { width:300px; height:300px; background:var(--bg-blob-3); top:40%; left:55%; animation-delay:7s; }
</style>

<div style="position:relative;z-index:1;" class="container-fluid px-4 py-4">

    {{-- Header --}}
    <div class="db-header">
        <h2>Hai, <span id="dashboardName">...</span></h2>
        <p>Berikut ringkasan shortlink, link tree, dan kunjungan Anda.</p>
    </div>

    {{-- Summary cards --}}
    <div class="db-summary">
        <div class="db-stat-card">
            <div class="db-stat-icon ic-link"><i class="bi bi-link-45deg"></i></div>
            <div class="db-stat-body">
                <div class="db-stat-val" id="statTotalLink">—</div>
                <div class="db-stat-lbl">Total ShortLink</div>
                <div class="db-stat-sub">link yang dibuat</div>
            </div>
        </div>
        <div class="db-stat-card">
            <div class="db-stat-icon" style="background:rgba(28,107,58,0.10);color:#1c6b3a;border:1px solid rgba(28,107,58,0.22);">
                <i class="bi bi-diagram-3-fill"></i>
            </div>
            <div class="db-stat-body">
                <div class="db-stat-val" id="statTotalLt">—</div>
                <div class="db-stat-lbl">Total Link Tree</div>
                <div class="db-stat-sub">halaman pilihan link</div>
            </div>
        </div>
    </div>

    {{-- Form shortlink (sama dengan data-shortlink) --}}
    <input type="hidden" id="nppInput" value="">
    <div class="sl-create-card">
        <div class="sl-create-header" onclick="toggleCreateForm()" id="createHeader">
            <div class="sl-create-header-left">
                <div class="sl-create-icon">
                    <i class="bi bi-plus-lg"></i>
                </div>
                <div>
                    <h5>Buat ShortLink Baru</h5>
                    <small>Custom kode, judul, dan deskripsi</small>
                </div>
            </div>
            <div class="sl-create-toggle" id="createToggle">
                <i class="bi bi-chevron-down"></i>
            </div>
        </div>
        <div class="sl-create-body" id="createBody">
            <div class="sl-create-body-inner">
                <div class="sl-create-field">
                    <label class="sl-create-label" for="createUrl">
                        URL Tujuan <span class="sl-create-required">*</span>
                    </label>
                    <input type="url" class="sl-create-input" id="createUrl"
                           placeholder="https://example.com/halaman-panjang"
                           autocomplete="off">
                </div>
                <div class="sl-create-field">
                    <label class="sl-create-label" for="createCode">
                        Kode Pendek
                        <span class="sl-create-optional">(opsional)</span>
                    </label>
                    <div class="sl-create-input-group">
                        <span class="sl-create-prefix">{{ url('/') }}/</span>
                        <input type="text" class="sl-create-input" id="createCode"
                               placeholder="otomatis" autocomplete="off"
                               spellcheck="false" maxlength="50">
                    </div>
                    <span class="sl-create-hint">
                        <i class="bi bi-info-circle"></i>
                        Kosongkan untuk generate otomatis
                    </span>
                </div>
                <div class="sl-create-field">
                    <label class="sl-create-label" for="createJudul">
                        Judul
                        <span class="sl-create-optional">(opsional)</span>
                    </label>
                    <input type="text" class="sl-create-input" id="createJudul"
                           placeholder="Nama singkat untuk shortlink ini"
                           maxlength="100" autocomplete="off">
                </div>
                <div class="sl-create-field">
                    <label class="sl-create-label" for="createDeskripsi">
                        Deskripsi
                        <span class="sl-create-optional">(opsional)</span>
                    </label>
                    <textarea class="sl-create-textarea" id="createDeskripsi"
                              placeholder="Keterangan singkat tentang shortlink ini..."
                              maxlength="500"></textarea>
                </div>
            </div>
            <div class="sl-create-error" id="createError">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span id="createErrText"></span>
            </div>
            <div class="sl-create-footer">
                <button class="sl-create-btn sl-create-btn-cancel" onclick="resetCreateForm()">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Reset
                </button>
                <button class="sl-create-btn sl-create-btn-submit" id="btnCreate" onclick="submitCreate()">
                    <span class="sl-create-spinner" id="createSpinner"></span>
                    <i class="bi bi-plus-lg" id="createBtnIcon"></i>
                    Buat ShortLink
                </button>
            </div>
        </div>
    </div>

    {{-- Form buat Link Tree baru --}}
    <div class="sl-create-card" style="margin-top:16px;">
        <div class="sl-create-header" onclick="toggleLtForm()" id="ltCreateHeader">
            <div class="sl-create-header-left">
                <div class="sl-create-icon" style="background:rgba(28,107,58,0.12);border-color:rgba(28,107,58,0.28);color:#1c6b3a;">
                    <i class="bi bi-diagram-3-fill"></i>
                </div>
                <div>
                    <h5>Buat Link Tree Baru</h5>
                    <small>Halaman pilihan dengan banyak link</small>
                </div>
            </div>
            <div class="sl-create-toggle" id="ltCreateToggle">
                <i class="bi bi-chevron-down"></i>
            </div>
        </div>
        <div class="sl-create-body" id="ltCreateBody">
            <div class="sl-create-body-inner">
                {{-- Judul + Kode --}}
                <div class="row g-3 mb-0">
                    <div class="col-sm-7">
                        <div class="sl-create-field">
                            <label class="sl-create-label">Judul <span class="sl-create-required">*</span></label>
                            <input type="text" class="sl-create-input" id="ltJudul"
                                   placeholder="Nama halaman link tree" maxlength="100" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="sl-create-field">
                            <label class="sl-create-label">Kode kustom <span class="sl-create-optional">(opsional)</span></label>
                            <div class="sl-create-input-group">
                                <span class="sl-create-prefix">{{ url('/') }}/lt/</span>
                                <input type="text" class="sl-create-input" id="ltKode"
                                       placeholder="otomatis" maxlength="50" autocomplete="off" spellcheck="false">
                            </div>
                            <span class="sl-create-hint"><i class="bi bi-info-circle"></i> Kosongkan untuk generate otomatis</span>
                        </div>
                    </div>
                </div>

                {{-- Deskripsi + Warna --}}
                <div class="row g-3 mb-0">
                    <div class="col-sm-8">
                        <div class="sl-create-field">
                            <label class="sl-create-label">Deskripsi <span class="sl-create-optional">(opsional)</span></label>
                            <textarea class="sl-create-textarea" id="ltDeskripsi"
                                      placeholder="Keterangan singkat halaman..." maxlength="500"
                                      style="min-height:60px;"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="sl-create-field">
                            <label class="sl-create-label">Warna tema</label>
                            <div style="display:flex;align-items:center;gap:8px;">
                                <input type="color" id="ltWarnaPicker" value="#1c6b3a"
                                       style="width:40px;height:38px;border-radius:8px;border:1px solid var(--md-border);padding:2px;cursor:pointer;background:var(--md-bg-elevated);"
                                       oninput="document.getElementById('ltWarnaHex').value=this.value">
                                <input type="text" class="sl-create-input" id="ltWarnaHex" value="#1c6b3a"
                                       maxlength="7" style="font-family:monospace;letter-spacing:0.04em;"
                                       oninput="if(/^#[0-9a-fA-F]{6}$/.test(this.value)) document.getElementById('ltWarnaPicker').value=this.value">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Daftar link --}}
                <div class="sl-create-field">
                    <label class="sl-create-label">Daftar link <span class="sl-create-required">*</span></label>
                    <div id="ltItemsList" style="display:flex;flex-direction:column;gap:8px;margin-bottom:8px;"></div>
                    <button type="button" onclick="ltAddRow()"
                            style="width:100%;padding:9px;border-radius:8px;border:1px dashed var(--md-border);background:transparent;color:var(--md-text-secondary);font-size:0.85rem;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px;transition:all 0.15s;font-family:'Inter',sans-serif;"
                            onmouseover="this.style.borderColor='rgba(28,107,58,0.35)';this.style.color='#1c6b3a';this.style.background='rgba(28,107,58,0.05)';"
                            onmouseout="this.style.borderColor='';this.style.color='';this.style.background='';">
                        <i class="bi bi-plus-circle"></i> Tambah link
                    </button>
                </div>
            </div>

            <div class="sl-create-error" id="ltCreateError">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span id="ltCreateErrText"></span>
            </div>
            <div class="sl-create-footer">
                <button class="sl-create-btn sl-create-btn-cancel" onclick="ltResetForm()">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                </button>
                <button class="sl-create-btn sl-create-btn-submit" id="ltBtnCreate" onclick="ltSubmit()">
                    <span class="sl-create-spinner" id="ltSpinner"></span>
                    <i class="bi bi-plus-lg" id="ltBtnIcon"></i>
                    Buat Link Tree
                </button>
            </div>
        </div>
    </div>

    {{-- Shortlink list --}}
    <div class="db-list-card" style="margin-top:24px;">
        <div class="db-list-head">
            <h5><i class="bi bi-clock-history me-2" style="color:var(--md-text-disabled);"></i>ShortLink Terbaru</h5>
            <span class="db-badge" id="dbBadge">— link</span>
        </div>

        <div id="dbLoading" class="db-loading">
            <div class="db-loading-ring"></div>
            Memuat shortlink...
        </div>
        <div id="dbEmpty" class="db-empty" style="display:none;">
            <i class="bi bi-link-45deg"></i>
            Belum ada shortlink. Buat yang pertama!
        </div>
        <ul class="sl-list" id="dbList" style="display:none;"></ul>

        <div class="db-list-footer">
            <a href="/data-shortlink">
                Lihat semua shortlink <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Link Tree terbaru --}}
    <div class="db-list-card" style="margin-top:16px;">
        <div class="db-list-head">
            <h5><i class="bi bi-diagram-3-fill me-2" style="color:var(--md-text-disabled);"></i>Link Tree Terbaru</h5>
            <span class="db-badge" id="ltBadge">— item</span>
        </div>
        <div id="ltLoading" class="db-loading">
            <div class="db-loading-ring"></div>
            Memuat link tree...
        </div>
        <div id="ltEmpty" class="db-empty" style="display:none;">
            <i class="bi bi-diagram-3"></i>
            Belum ada link tree. Buat yang pertama!
        </div>
        <ul class="sl-list" id="ltList" style="display:none;"></ul>
        <div class="db-list-footer">
            <a href="/linktree">Lihat semua link tree <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

</div>

{{-- Toast --}}
<div id="dbToast" style="
    position:fixed; bottom:24px; right:24px; z-index:9999;
    padding:12px 18px; border-radius:10px;
    border-left:3px solid var(--db-toast-bd);
    background:var(--db-toast-bg); color:var(--db-toast-cl);
    font-size:0.875rem; display:none; align-items:center; gap:9px;
    box-shadow:var(--db-toast-sh);
    animation:fadeUp 0.2s ease-out;
">
    <i class="bi bi-clipboard-check"></i>
    <span id="dbToastText">Disalin!</span>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
let _npp  = null;
let _data = [];

document.addEventListener('DOMContentLoaded', () => {
    try {
        const auth    = JSON.parse(localStorage.getItem('auth_response'));
        const pegawai = auth.data.user.rl_pegawai;
        _npp          = auth.data.user.npp;
        document.getElementById('dashboardName').textContent = pegawai.nama || 'Pegawai';
        document.getElementById('nppInput').value = _npp || '';
    } catch(e) { /* session invalid — middleware sudah handle */ }
    loadData();
});

function loadShortlinks() { loadData(); }
async function loadData() {
    try {
        const resp = await apiFetch(`/api/data-shortlinks?npp=${encodeURIComponent(_npp)}`);
        const res  = await resp.json();
        if (res.status !== 'success') throw new Error();
        _data = res.data || [];
        renderSummary();
        renderList();
    } catch(e) {
        document.getElementById('dbLoading').style.display = 'none';
        document.getElementById('dbEmpty').style.display   = '';
    }
    // Load link tree paralel
    loadLtData();
}

function renderSummary() {
    animateCount('statTotalLink', _data.length);
}

function animateCount(id, target) {
    const el    = document.getElementById(id);
    const steps = 600 / (1000 / 30);
    let cur     = 0;
    const inc   = target / steps;
    const t = setInterval(() => {
        cur = Math.min(cur + inc, target);
        el.textContent = Math.round(cur).toLocaleString('id-ID');
        if (cur >= target) clearInterval(t);
    }, 1000 / 30);
}

function renderList() {
    const loading = document.getElementById('dbLoading');
    const empty   = document.getElementById('dbEmpty');
    const list    = document.getElementById('dbList');
    const badge   = document.getElementById('dbBadge');

    loading.style.display = 'none';
    badge.textContent = `${_data.length} link`;

    if (!_data.length) { empty.style.display = ''; return; }

    const recent = [..._data]
        .sort((a, b) => new Date(b.created_at_raw || b.created_at) - new Date(a.created_at_raw || a.created_at))
        .slice(0, 5);

    list.innerHTML = recent.map((item, idx) => `
        <li class="sl-item" id="dbrow-${item.id}" style="animation-delay:${0.05 + idx * 0.06}s;">
            <div class="sl-qr" id="dbqr-${item.id}"></div>
            <div class="sl-info">
                ${item.judul
                    ? `<div class="sl-judul">${esc(item.judul)}</div>`
                    : `<div class="sl-title">${esc((item.original_url||'').replace(/^https?:\/\//, '').split('/')[0])}</div>`
                }
                <div class="sl-short">
                    <a href="${esc(item.short_url)}" target="_blank">${esc(item.short_url)}</a>
                    <button class="sl-copy-btn" onclick="copyLink('${esc(item.short_url)}',this)" title="Salin">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
                <div class="sl-orig" title="${esc(item.original_url)}">${esc(item.original_url)}</div>
                <div class="sl-date">
                    <i class="bi bi-calendar3"></i>
                    ${esc(item.created_at)}
                </div>
            </div>
            <div class="sl-right">
                <div class="sl-visits">
                    <div class="sl-visits-total">
                        <i class="bi bi-bar-chart-fill"></i>
                        <strong>${(item.visits||0).toLocaleString('id-ID')}</strong>&nbsp;total
                    </div>
                    <div class="sl-visits-detail">
                        <span title="Via Link"><i class="bi bi-link-45deg"></i>${(item.visits_link||0).toLocaleString('id-ID')}</span>
                        <span title="Via QR"><i class="bi bi-qr-code-scan"></i>${(item.visits_qr||0).toLocaleString('id-ID')}</span>
                    </div>
                </div>
            </div>
        </li>
    `).join('');

    list.style.display = '';

    setTimeout(() => {
        recent.forEach(item => {
            const wrap = document.getElementById('dbqr-' + item.id);
            if (!wrap) return;
            wrap.innerHTML = '';
            new QRCode(wrap, {
                text: item.short_url + '/qr',
                width: 64, height: 64,
                colorDark: '#000000', colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.L,
            });
        });
    }, 80);
}

function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function copyLink(url, btn) {
    navigator.clipboard.writeText(url).then(() => {
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check-lg" style="color:var(--db-sl-short-cl)"></i>';
        showToast('Link disalin ke clipboard!');
        setTimeout(() => { btn.innerHTML = orig; }, 2000);
    });
}

function showToast(msg) {
    const t = document.getElementById('dbToast');
    document.getElementById('dbToastText').textContent = msg;
    t.style.display = 'flex';
    clearTimeout(t._timer);
    t._timer = setTimeout(() => t.style.display = 'none', 2500);
}

// ── sl-create functions (sama dengan data-shortlink) ──
function toggleCreateForm() {
    const body   = document.getElementById('createBody');
    const toggle = document.getElementById('createToggle');
    const header = document.getElementById('createHeader');
    const open   = body.classList.toggle('open');
    toggle.classList.toggle('open', open);
    header.classList.toggle('open', open);
    if (open) document.getElementById('createUrl').focus();
}

function resetCreateForm() {
    ['createUrl','createCode','createJudul','createDeskripsi'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.value = '';
    });
    document.getElementById('createError').classList.remove('show');
}

function showCreateErr(msg) {
    document.getElementById('createErrText').textContent = msg;
    document.getElementById('createError').classList.add('show');
}

function setCreateLoad(on) {
    document.getElementById('btnCreate').disabled           = on;
    document.getElementById('createSpinner').style.display = on ? 'block' : 'none';
    document.getElementById('createBtnIcon').style.display = on ? 'none'  : '';
}


// ── ShortLink create ────────────────────────────────────────────
async function submitCreate() {
    const url       = document.getElementById('createUrl').value.trim();
    const code      = document.getElementById('createCode').value.trim();
    const judul     = document.getElementById('createJudul').value.trim();
    const deskripsi = document.getElementById('createDeskripsi').value.trim();

    document.getElementById('createError').classList.remove('show');

    if (!url) { showCreateErr('URL tujuan tidak boleh kosong.'); return; }
    try { new URL(url); } catch { showCreateErr('Format URL tidak valid.'); return; }
    if (code && !/^[a-zA-Z0-9\-_]+$/.test(code)) {
        showCreateErr('Kode hanya boleh berisi huruf, angka, - dan _.');
        return;
    }

    const npp = document.getElementById('nppInput').value.trim();
    if (!npp) { showCreateErr('Sesi tidak ditemukan. Silakan login ulang.'); return; }

    setCreateLoad(true);
    try {
        const tok  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const resp = await apiFetch('/api/shortlinks', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': tok },
            body: JSON.stringify({
                original_url: url,
                short_url:    code || null,
                judul:        judul || null,
                deskripsi:    deskripsi || null,
                npp,
            }),
        });

        const res = await resp.json();
        if (res.status === 'success') {
            resetCreateForm();
            // Tutup form
            document.getElementById('createBody').classList.remove('open');
            document.getElementById('createToggle').classList.remove('open');
            document.getElementById('createHeader').classList.remove('open');
            // Refresh list
            loadData();
            showToast('ShortLink berhasil dibuat!');
        } else {
            showCreateErr(res.message || 'Gagal membuat shortlink.');
        }
    } catch(e) {
        showCreateErr('Terjadi kesalahan. Coba lagi.');
        console.error('submitCreate error:', e);
    } finally {
        setCreateLoad(false);
    }
}

let _ltData = [];

async function loadLtData() {
    try {
        const tok  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const resp = await apiFetch(`/api/linktree/data?npp=${encodeURIComponent(_npp)}`);
        const res  = await resp.json();
        if (res.status !== 'success') throw new Error();
        _ltData = res.data || [];
        animateCount('statTotalLt', _ltData.length);
        renderLtList();
    } catch(e) {
        document.getElementById('ltLoading').style.display = 'none';
        document.getElementById('ltEmpty').style.display   = '';
    }
}

function renderLtList() {
    const loading = document.getElementById('ltLoading');
    const empty   = document.getElementById('ltEmpty');
    const list    = document.getElementById('ltList');
    const badge   = document.getElementById('ltBadge');

    loading.style.display = 'none';
    badge.textContent = `${_ltData.length} item`;

    if (!_ltData.length) { empty.style.display = ''; return; }

    const recent = [..._ltData].slice(0, 5);
    list.innerHTML = recent.map((lt, idx) => `
        <li class="sl-item" style="animation-delay:${0.05 + idx * 0.06}s;cursor:default;">
            <div class="sl-qr" id="ltqr-${lt.id}"></div>
            <div class="sl-info">
                <div class="sl-judul" style="display:flex;align-items:center;gap:8px;">
                    <span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:${esc(lt.tema_warna)};border:1px solid rgba(0,0,0,0.15);flex-shrink:0;"></span>
                    ${esc(lt.judul)}
                </div>
                <div class="sl-short">
                    <a href="${esc(lt.public_url)}" target="_blank">${esc(lt.public_url)}</a>
                    <button class="sl-copy-btn" onclick="copyLink('${esc(lt.public_url)}',this)" title="Salin">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
                <div class="sl-orig">
                    <i class="bi bi-link-45deg" style="font-size:0.75rem;"></i>
                    ${lt.items.length} link &middot; CTR ${lt.ctr}%
                </div>
            </div>
            <div class="sl-right">
                <div class="sl-visits">
                    <div class="sl-visits-total">
                        <i class="bi bi-eye"></i>
                        <strong>${(lt.visits||0).toLocaleString('id-ID')}</strong>&nbsp;views
                    </div>
                    <div class="sl-visits-detail">
                        <span title="Klik keluar"><i class="bi bi-cursor"></i>${(lt.total_clicks||0).toLocaleString('id-ID')}</span>
                    </div>
                </div>
            </div>
        </li>
    `).join('');
    list.style.display = '';

    setTimeout(() => {
        recent.forEach(lt => {
            const wrap = document.getElementById('ltqr-' + lt.id);
            if (!wrap) return;
            wrap.innerHTML = '';
            new QRCode(wrap, {
                text: lt.qr_url,
                width: 64, height: 64,
                colorDark: '#000000', colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.L,
            });
        });
    }, 80);
}

function toggleLtForm() {
    const body   = document.getElementById('ltCreateBody');
    const toggle = document.getElementById('ltCreateToggle');
    const header = document.getElementById('ltCreateHeader');
    const open   = body.classList.toggle('open');
    toggle.classList.toggle('open', open);
    header.classList.toggle('open', open);
    // Init row pertama jika belum ada
    if (open && !document.getElementById('ltItemsList').children.length) ltAddRow();
    if (open) document.getElementById('ltJudul').focus();
}

function ltAddRow(label='', url='') {
    const list = document.getElementById('ltItemsList');
    const div  = document.createElement('div');
    div.style.cssText = 'display:flex;gap:8px;align-items:center;padding:9px 12px;border-radius:9px;background:var(--md-bg-elevated);border:1px solid var(--md-border);';
    div.innerHTML = `
        <input type="text" class="sl-create-input" placeholder="Label (contoh: Instagram)"
               value="${esc(label)}" maxlength="100"
               style="flex:1;min-width:0;border:none;background:transparent;box-shadow:none;padding:4px 0;">
        <input type="url" class="sl-create-input" placeholder="https://..."
               value="${esc(url)}" maxlength="2048"
               style="flex:2;min-width:0;border:none;background:transparent;box-shadow:none;padding:4px 0;">
        <button type="button" onclick="this.closest('div').remove()"
                style="flex-shrink:0;width:26px;height:26px;border-radius:6px;border:1px solid transparent;background:transparent;color:var(--md-text-disabled);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:0.85rem;transition:all 0.15s;"
                onmouseover="this.style.background='rgba(137,34,34,0.08)';this.style.color='#892222';this.style.borderColor='rgba(137,34,34,0.22)';"
                onmouseout="this.style.background='';this.style.color='';this.style.borderColor='';">
            <i class="bi bi-x"></i>
        </button>`;
    list.appendChild(div);
}

function ltGetRows() {
    return Array.from(document.getElementById('ltItemsList').children).map(div => {
        const inputs = div.querySelectorAll('input');
        return { label: inputs[0].value.trim(), url: inputs[1].value.trim() };
    });
}

function ltResetForm() {
    ['ltJudul','ltKode','ltDeskripsi'].forEach(id => { const el=document.getElementById(id); if(el) el.value=''; });
    document.getElementById('ltWarnaPicker').value = '#1c6b3a';
    document.getElementById('ltWarnaHex').value    = '#1c6b3a';
    document.getElementById('ltItemsList').innerHTML = '';
    document.getElementById('ltCreateError').classList.remove('show');
}

function showLtErr(msg) {
    document.getElementById('ltCreateErrText').textContent = msg;
    document.getElementById('ltCreateError').classList.add('show');
}

function setLtLoad(on) {
    document.getElementById('ltBtnCreate').disabled         = on;
    document.getElementById('ltSpinner').style.display      = on ? 'block' : 'none';
    document.getElementById('ltBtnIcon').style.display      = on ? 'none'  : '';
}

async function ltSubmit() {
    document.getElementById('ltCreateError').classList.remove('show');
    const judul     = document.getElementById('ltJudul').value.trim();
    const kode      = document.getElementById('ltKode').value.trim();
    const deskripsi = document.getElementById('ltDeskripsi').value.trim();
    const warna     = document.getElementById('ltWarnaHex').value.trim() || '#1c6b3a';
    const items     = ltGetRows();

    if (!judul) { showLtErr('Judul tidak boleh kosong.'); return; }
    if (kode && !/^[a-zA-Z0-9\-_]+$/.test(kode)) { showLtErr('Kode hanya boleh huruf, angka, - dan _.'); return; }
    if (!items.length) { showLtErr('Tambahkan minimal 1 link.'); return; }
    if (items.find(it => !it.label || !it.url)) { showLtErr('Semua label dan URL harus diisi.'); return; }

    setLtLoad(true);
    try {
        const tok  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Menggunakan apiFetch (bukan fetch biasa) agar:
        // 1. Bearer token diambil otomatis dari localStorage
        // 2. Response 401 ditangani → redirect ke login (konsisten dengan apiFetch lain)
        const resp = await apiFetch('/api/linktree', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': tok },
            body: JSON.stringify({ npp: _npp, judul, kode: kode||null, deskripsi: deskripsi||null, tema_warna: warna, items }),
        });
        const res = await resp.json();
        if (res.status === 'success') {
            ltResetForm();
            document.getElementById('ltCreateBody').classList.remove('open');
            document.getElementById('ltCreateToggle').classList.remove('open');
            document.getElementById('ltCreateHeader').classList.remove('open');
            _ltData.unshift(res.data);
            animateCount('statTotalLt', _ltData.length);
            renderLtList();
            showToast('Link Tree berhasil dibuat!');
        } else {
            showLtErr(res.message || 'Gagal membuat link tree.');
        }
    } catch(e) {
        showLtErr('Terjadi kesalahan. Coba lagi.');
    } finally {
        setLtLoad(false);
    }
}
</script>
@endpush
