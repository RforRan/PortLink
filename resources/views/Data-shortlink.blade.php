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
   THEME TOKENS — light (default) & dark
===================================================== */

/* ── Light mode ── */
:root {
    /* Short URL accent */
    --sl-short-cl:              #1c6b3a;
    --sl-short-hover-cl:        #135028;

    /* List item hover */
    --sl-item-hover-bg:         rgba(0,0,0,0.025);

    /* Spinner */
    --spinner-bd:               rgba(0,0,0,0.08);
    --spinner-top:              #1c6b3a;

    /* Gear button */
    --gear-hover-bg:            rgba(28,107,58,0.12);
    --gear-hover-bd:            rgba(28,107,58,0.35);
    --gear-active-from:         rgba(28,107,58,0.16);
    --gear-active-to:           rgba(28,107,58,0.28);
    --gear-active-bd:           rgba(28,107,58,0.50);

    /* Backdrop */
    --fp-backdrop-bg:           rgba(0,0,0,0.45);

    /* Panel shadow */
    --fp-panel-shadow:          0 20px 60px rgba(0,0,0,0.22), 0 0 0 1px rgba(0,0,0,0.06);

    /* Page icons in panel */
    --fp-icon-info-bg:          rgba(43,90,140,0.10);
    --fp-icon-info-cl:          #2b5a8c;
    --fp-icon-stat-bg:          rgba(28,107,58,0.10);
    --fp-icon-stat-cl:          #1c6b3a;
    --fp-icon-edit-bg:          rgba(43,75,150,0.10);
    --fp-icon-edit-cl:          #2b4b96;
    --fp-icon-delete-bg:        rgba(137,34,34,0.10);
    --fp-icon-delete-cl:        #892222;
    --fp-icon-open-bg:          rgba(28,107,58,0.10);
    --fp-icon-open-cl:          #1c6b3a;

    /* Info value link color */
    --fp-info-link-cl:          #1c6b3a;

    /* Panel buttons */
    --fp-btn-cancel-hover-bg:   rgba(0,0,0,0.06);
    --fp-btn-cancel-hover-bd:   rgba(0,0,0,0.14);
    --fp-btn-cancel-hover-cl:   var(--md-text-primary);
    --fp-btn-save-bg:           rgba(43,90,140,0.12);
    --fp-btn-save-bd:           rgba(43,90,140,0.32);
    --fp-btn-save-cl:           #2b5a8c;
    --fp-btn-save-hover-bg:     rgba(43,90,140,0.22);
    --fp-btn-save-hover-bd:     rgba(43,90,140,0.55);
    --fp-btn-save-hover-cl:     #1d3d66;
    --fp-btn-delete-bg:         rgba(137,34,34,0.10);
    --fp-btn-delete-bd:         rgba(137,34,34,0.30);
    --fp-btn-delete-cl:         #892222;
    --fp-btn-delete-hover-bg:   rgba(137,34,34,0.20);
    --fp-btn-delete-hover-bd:   rgba(137,34,34,0.55);
    --fp-btn-delete-hover-cl:   #6e1a1a;
    --fp-btn-open-bg:           rgba(28,107,58,0.10);
    --fp-btn-open-bd:           rgba(28,107,58,0.30);
    --fp-btn-open-cl:           #1c6b3a;
    --fp-btn-open-hover-bg:     rgba(28,107,58,0.20);
    --fp-btn-open-hover-bd:     rgba(28,107,58,0.55);
    --fp-btn-open-hover-cl:     #135028;

    /* QR download button */
    --btn-qr-dl-bg:             rgba(0,0,0,0.04);
    --btn-qr-dl-hover-bg:       rgba(0,0,0,0.08);
    --btn-qr-dl-hover-bd:       rgba(0,0,0,0.16);

    /* Close button (X) hover */
    --fp-close-hover-bg:        rgba(137,34,34,0.10);
    --fp-close-hover-bd:        rgba(137,34,34,0.30);
    --fp-close-hover-cl:        #892222;

    /* Panel spinner */
    --fp-spinner-bd:            rgba(0,0,0,0.10);

    /* Sidebar */
    --sb-eyebrow-cl:            rgba(0,0,0,0.45);
    --sb-short-cl:              #1c6b3a;
    --sb-orig-cl:               rgba(0,0,0,0.45);

    /* Nav icon default */
    --fp-nav-icon-bg:           rgba(0,0,0,0.05);

    /* Nav item — info/detail */
    --nav-info-hover-bg:        rgba(43,90,140,0.08);
    --nav-info-hover-bd:        rgba(43,90,140,0.18);
    --nav-info-hover-cl:        #2b5a8c;
    --nav-info-active-bg:       rgba(43,90,140,0.13);
    --nav-info-active-bd:       rgba(43,90,140,0.32);
    --nav-info-active-cl:       #2b5a8c;
    --nav-info-icon-bg:         rgba(43,90,140,0.13);

    /* Nav item — stat */
    --nav-stat-hover-bg:        rgba(28,107,58,0.08);
    --nav-stat-hover-bd:        rgba(28,107,58,0.18);
    --nav-stat-hover-cl:        #1c6b3a;
    --nav-stat-active-bg:       rgba(28,107,58,0.13);
    --nav-stat-active-bd:       rgba(28,107,58,0.32);
    --nav-stat-active-cl:       #1c6b3a;
    --nav-stat-icon-bg:         rgba(28,107,58,0.13);

    /* Nav item — edit */
    --nav-edit-hover-bg:        rgba(43,75,150,0.08);
    --nav-edit-hover-bd:        rgba(43,75,150,0.18);
    --nav-edit-hover-cl:        #2b4b96;
    --nav-edit-active-bg:       rgba(43,75,150,0.13);
    --nav-edit-active-bd:       rgba(43,75,150,0.32);
    --nav-edit-active-cl:       #2b4b96;
    --nav-edit-icon-bg:         rgba(43,75,150,0.13);

    /* Nav item — delete */
    --nav-delete-cl:            #892222;
    --nav-delete-hover-bg:      rgba(137,34,34,0.08);
    --nav-delete-hover-bd:      rgba(137,34,34,0.22);
    --nav-delete-hover-cl:      #6e1a1a;
    --nav-delete-active-bg:     rgba(137,34,34,0.13);
    --nav-delete-active-bd:     rgba(137,34,34,0.32);
    --nav-delete-active-cl:     #6e1a1a;
    --nav-delete-icon-bg:       rgba(137,34,34,0.10);
    --nav-delete-icon-cl:       #892222;

    /* fp-input focus */
    --fp-input-focus-sh:        rgba(28,107,58,0.12);
    --fp-input-focus-bd:        rgba(28,107,58,0.55);

    /* fp-warn (delete warning) */
    --fp-warn-bg:               rgba(137,34,34,0.08);
    --fp-warn-bd:               rgba(137,34,34,0.22);
    --fp-warn-left:             #892222;
    --fp-warn-cl:               #892222;
    --fp-warn-strong:           #6e1a1a;

    /* Error messages */
    --fp-error-cl:              #892222;
    --sl-create-error-bg:       rgba(137,34,34,0.08);
    --sl-create-error-bd:       rgba(137,34,34,0.20);
    --sl-create-error-cl:       #892222;

    /* Searchbar */
    --sl-search-focus-bd:       rgba(28,107,58,0.45);
    --sl-search-focus-sh:       rgba(28,107,58,0.10);
    --sl-search-clear-hover:    rgba(0,0,0,0.06);

    /* Filter button */
    --sl-filter-btn-hover-bg:   rgba(28,107,58,0.10);
    --sl-filter-btn-hover-bd:   rgba(28,107,58,0.28);
    --sl-filter-btn-hover-cl:   #1c6b3a;

    /* Filter dropdown */
    --sl-filter-dd-bg:          #f0f7f1;
    --sl-filter-dd-bd:          rgba(0,0,0,0.10);
    --sl-filter-dd-sh:          0 8px 28px rgba(0,0,0,0.14);
    --sl-filter-section-bd:     rgba(0,0,0,0.06);
    --sl-filter-item-hover-bg:  rgba(0,0,0,0.04);
    --sl-filter-item-hover-cl:  var(--md-text-primary);
    --sl-filter-selected-bg:    rgba(28,107,58,0.10);
    --sl-filter-selected-cl:    #1c6b3a;
    --sl-filter-check-cl:       #1c6b3a;

    /* Sort badge */
    --sl-sort-badge-bg:         rgba(28,107,58,0.10);
    --sl-sort-badge-bd:         rgba(28,107,58,0.28);
    --sl-sort-badge-cl:         #1c6b3a;
    --sl-sort-badge-btn-cl:     #1c6b3a;
    --sl-sort-badge-btn-hover:  #135028;

    /* Pagination */
    --pg-btn-bg:                rgba(255,255,255,0.55);
    --pg-btn-hover-bg:          rgba(255,255,255,0.85);
    --pg-btn-hover-bd:          rgba(0,0,0,0.16);
    --pg-btn-hover-cl:          #1c6b3a;
    --pg-active-bg:             rgba(28,107,58,0.13);
    --pg-active-bd:             rgba(28,107,58,0.36);
    --pg-active-cl:             #1c6b3a;
    --pg-hash-hover-bg:         rgba(255,255,255,0.85);
    --pg-hash-hover-bd:         rgba(0,0,0,0.16);
    --pg-hash-hover-cl:         var(--md-text-primary);
    --pg-hash-input-bd:         rgba(28,107,58,0.50);
    --pg-hash-input-sh:         rgba(28,107,58,0.12);

    /* Stat range pill in panel */
    --sl-range-group-bg:        rgba(255,255,255,0.55);
    --sl-range-group-bd:        rgba(0,0,0,0.10);
    --sl-range-hover-bg:        rgba(0,0,0,0.05);
    --sl-range-active-bg:       rgba(28,107,58,0.13);
    --sl-range-active-bd:       rgba(28,107,58,0.35);
    --sl-range-active-cl:       #1c6b3a;

    /* Stat mini boxes in panel */
    --sl-stat-mini-bg:          #d5e5d9;
    --sl-stat-mini-bd:          rgba(0,0,0,0.07);

    --sl-create-header-hover-bg: rgba(0,0,0,0.03);
    --sl-create-header-open-bg:  rgba(0,0,0,0.03);
    --sl-input-bg:               var(--md-bg-elevated);
    --sl-input-prefix-bg:        var(--md-bg-primary);
    --sl-input-hover-bg:         var(--md-bg-elevated);

    /* Chart dataset colors (light) */
    --sl-chart-link-bg:         rgba(30,77,130,0.55);
    --sl-chart-link-bd:         rgba(30,77,130,0.80);
    --sl-chart-qr-bg:           rgba(28,107,58,0.50);
    --sl-chart-qr-bd:           rgba(28,107,58,0.80);
    --sl-chart-unique-bg:       rgba(90,30,150,0.40);
    --sl-chart-unique-bd:       rgba(90,30,150,0.70);

    /* Panel stat mini value colors (mini boxes inside floating panel) */
    --sl-stat-val-total-cl:     #1b211b;
    --sl-stat-val-link-cl:      #1e4d82;
    --sl-stat-val-qr-cl:        #1c6b3a;
    --sl-stat-val-unique-cl:    #5a1e96;

    /* fp-stat-box number colors */
    --fp-stat-link-cl:          #1e4d82;
    --fp-stat-qr-cl:            #1c6b3a;
    --fp-stat-total-cl:         #1b211b;
    --fp-stat-unique-cl:        #5a1e96;

    /* fp-stat-box border-top */
    --fp-stat-box-qr-top:       rgba(28,107,58,0.40);
    --fp-stat-box-link-top:     rgba(43,90,140,0.40);
    --fp-stat-box-total-top:    rgba(28,107,58,0.55);
    --fp-stat-box-unique-top:   rgba(100,40,160,0.35);

    /* Create form */
    --sl-create-input-hover-bg: rgba(0,0,0,0.02);
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

    /* Create icon */
    --sl-create-icon-bg:        rgba(28,107,58,0.12);
    --sl-create-icon-bd:        rgba(28,107,58,0.28);
    --sl-create-icon-cl:        #1c6b3a;
    --sl-create-icon-hover-bg:  rgba(28,107,58,0.20);
    --sl-create-icon-hover-bd:  rgba(28,107,58,0.45);
    --sl-create-icon-hover-cl:  #135028;

    /* Toast */
    --toast-success-bg:         rgba(28,107,58,0.10);
    --toast-success-bd:         #1c6b3a;
    --toast-success-cl:         #1c6b3a;
    --toast-error-bg:           rgba(137,34,34,0.10);
    --toast-error-bd:           #892222;
    --toast-error-cl:           #892222;

    /* Chart.js */
    --chart-text-cl:            #4a574a;
    --chart-grid-cl:            rgba(0,0,0,0.07);
    --chart-tooltip-bg:         #ecf4ed;
    --chart-tooltip-bd:         rgba(0,0,0,0.11);
    --chart-tooltip-title:      #1b211b;
    --chart-tooltip-body:       #4a574a;

    /* inline spinner loading in panel */
    --inline-spin-bd:           rgba(0,0,0,0.09);
    --inline-spin-top:          #1c6b3a;

    /* error block */
    --md-error-bg:              rgba(137,34,34,0.08);
    --md-error-bd:              rgba(137,34,34,0.22);
    --md-error-left:            #892222;
    --md-error-cl:              #892222;

    /* Background */
    --bg-grid-line:             rgba(0,0,0,0.04);
    --bg-blob-1:                rgba(107,155,122,0.09);
    --bg-blob-2:                rgba(100,130,200,0.06);
    --bg-blob-3:                rgba(179,155,107,0.05);
}

/* ── Dark mode — restore all original values ── */
[data-theme="dark"] {
    --sl-short-cl:              #e55;
    --sl-short-hover-cl:        #ff7070;

    --sl-item-hover-bg:         rgba(255,255,255,0.03);

    --spinner-bd:               rgba(255,255,255,0.1);
    --spinner-top:              var(--md-accent);

    --gear-hover-bg:            var(--md-accent-dark);
    --gear-hover-bd:            var(--md-accent);
    --gear-active-from:         var(--md-accent-dark);
    --gear-active-to:           var(--md-accent);
    --gear-active-bd:           var(--md-accent);

    --fp-backdrop-bg:           rgba(0,0,0,0.70);
    --fp-panel-shadow:          0 32px 80px rgba(0,0,0,0.85), 0 0 0 1px rgba(255,255,255,0.04);

    --fp-icon-info-bg:          rgba(154,176,197,0.18);
    --fp-icon-info-cl:          #c2d4e8;
    --fp-icon-stat-bg:          rgba(107,155,122,0.18);
    --fp-icon-stat-cl:          #aaddb8;
    --fp-icon-edit-bg:          rgba(100,130,200,0.18);
    --fp-icon-edit-cl:          #c2d4f0;
    --fp-icon-delete-bg:        rgba(179,107,107,0.18);
    --fp-icon-delete-cl:        #f0a0a0;
    --fp-icon-open-bg:          rgba(107,155,122,0.18);
    --fp-icon-open-cl:          #aaddb8;

    --fp-info-link-cl:          var(--md-accent-light);

    --fp-btn-cancel-hover-bg:   rgba(255,255,255,0.08);
    --fp-btn-cancel-hover-bd:   rgba(255,255,255,0.18);
    --fp-btn-cancel-hover-cl:   var(--md-text-primary);
    --fp-btn-save-bg:           rgba(100,130,200,0.18);
    --fp-btn-save-bd:           rgba(100,130,200,0.4);
    --fp-btn-save-cl:           #9ab3d9;
    --fp-btn-save-hover-bg:     rgba(100,130,200,0.30);
    --fp-btn-save-hover-bd:     rgba(100,130,200,0.65);
    --fp-btn-save-hover-cl:     #c2d4f0;
    --fp-btn-delete-bg:         rgba(179,107,107,0.18);
    --fp-btn-delete-bd:         rgba(179,107,107,0.4);
    --fp-btn-delete-cl:         #d98989;
    --fp-btn-delete-hover-bg:   rgba(179,107,107,0.30);
    --fp-btn-delete-hover-bd:   rgba(179,107,107,0.65);
    --fp-btn-delete-hover-cl:   #f0a0a0;
    --fp-btn-open-bg:           rgba(107,155,122,0.18);
    --fp-btn-open-bd:           rgba(107,155,122,0.4);
    --fp-btn-open-cl:           #8bc99f;
    --fp-btn-open-hover-bg:     rgba(107,155,122,0.30);
    --fp-btn-open-hover-bd:     rgba(107,155,122,0.65);
    --fp-btn-open-hover-cl:     #aaddb8;

    --btn-qr-dl-bg:             rgba(255,255,255,0.05);
    --btn-qr-dl-hover-bg:       rgba(255,255,255,0.10);
    --btn-qr-dl-hover-bd:       rgba(255,255,255,0.20);

    --fp-close-hover-bg:        rgba(179,107,107,0.18);
    --fp-close-hover-bd:        rgba(179,107,107,0.4);
    --fp-close-hover-cl:        #d98989;

    --fp-spinner-bd:            rgba(255,255,255,0.2);

    --sb-eyebrow-cl:            rgba(255,255,255,0.45);
    --sb-short-cl:              var(--md-accent-light);
    --sb-orig-cl:               rgba(255,255,255,0.45);

    --fp-nav-icon-bg:           rgba(255,255,255,0.05);

    --nav-info-hover-bg:        rgba(180,190,200,0.10);
    --nav-info-hover-bd:        rgba(180,190,200,0.20);
    --nav-info-hover-cl:        var(--md-text-primary);
    --nav-info-active-bg:       rgba(154,176,197,0.18);
    --nav-info-active-bd:       rgba(154,176,197,0.38);
    --nav-info-active-cl:       #c2d4e8;
    --nav-info-icon-bg:         rgba(154,176,197,0.22);

    --nav-stat-hover-bg:        rgba(107,155,122,0.10);
    --nav-stat-hover-bd:        rgba(107,155,122,0.20);
    --nav-stat-hover-cl:        #8bc99f;
    --nav-stat-active-bg:       rgba(107,155,122,0.18);
    --nav-stat-active-bd:       rgba(107,155,122,0.38);
    --nav-stat-active-cl:       #aaddb8;
    --nav-stat-icon-bg:         rgba(107,155,122,0.22);

    --nav-edit-hover-bg:        rgba(100,130,200,0.10);
    --nav-edit-hover-bd:        rgba(100,130,200,0.20);
    --nav-edit-hover-cl:        #9ab3d9;
    --nav-edit-active-bg:       rgba(100,130,200,0.18);
    --nav-edit-active-bd:       rgba(100,130,200,0.38);
    --nav-edit-active-cl:       #c2d4f0;
    --nav-edit-icon-bg:         rgba(100,130,200,0.22);

    --nav-delete-cl:            #d98989;
    --nav-delete-hover-bg:      rgba(179,107,107,0.12);
    --nav-delete-hover-bd:      rgba(179,107,107,0.28);
    --nav-delete-hover-cl:      #f0a0a0;
    --nav-delete-active-bg:     rgba(179,107,107,0.18);
    --nav-delete-active-bd:     rgba(179,107,107,0.4);
    --nav-delete-active-cl:     #f0a0a0;
    --nav-delete-icon-bg:       rgba(179,107,107,0.15);
    --nav-delete-icon-cl:       #d98989;

    --fp-input-focus-sh:        rgba(128,128,128,0.14);
    --fp-input-focus-bd:        var(--md-accent);

    --fp-warn-bg:               rgba(179,107,107,0.10);
    --fp-warn-bd:               rgba(179,107,107,0.28);
    --fp-warn-left:             #b36b6b;
    --fp-warn-cl:               #d98989;
    --fp-warn-strong:           #f0a0a0;

    --fp-error-cl:              #d98989;
    --sl-create-error-bg:       rgba(179,107,107,0.10);
    --sl-create-error-bd:       rgba(179,107,107,0.25);
    --sl-create-error-cl:       #d98989;

    --sl-search-focus-bd:       rgba(107,155,122,0.5);
    --sl-search-focus-sh:       rgba(107,155,122,0.10);
    --sl-search-clear-hover:    rgba(255,255,255,0.08);

    --sl-filter-btn-hover-bg:   rgba(154,176,197,0.12);
    --sl-filter-btn-hover-bd:   rgba(154,176,197,0.35);
    --sl-filter-btn-hover-cl:   #c2d4e8;

    --sl-filter-dd-bg:          #1e1e1e;
    --sl-filter-dd-bd:          rgba(255,255,255,0.10);
    --sl-filter-dd-sh:          0 8px 28px rgba(0,0,0,0.55);
    --sl-filter-section-bd:     rgba(255,255,255,0.06);
    --sl-filter-item-hover-bg:  rgba(255,255,255,0.05);
    --sl-filter-item-hover-cl:  var(--md-text-primary);
    --sl-filter-selected-bg:    rgba(107,155,122,0.08);
    --sl-filter-selected-cl:    #8bc99f;
    --sl-filter-check-cl:       #8bc99f;

    --sl-sort-badge-bg:         rgba(154,176,197,0.12);
    --sl-sort-badge-bd:         rgba(154,176,197,0.30);
    --sl-sort-badge-cl:         #c2d4e8;
    --sl-sort-badge-btn-cl:     #c2d4e8;
    --sl-sort-badge-btn-hover:  #f0f0f0;

    --pg-btn-bg:                var(--md-bg-elevated);
    --pg-btn-hover-bg:          rgba(100,130,200,0.10);
    --pg-btn-hover-bd:          rgba(100,130,200,0.25);
    --pg-btn-hover-cl:          #9ab3d9;
    --pg-active-bg:             rgba(154,176,197,0.22);
    --pg-active-bd:             rgba(154,176,197,0.45);
    --pg-active-cl:             #c2d4e8;
    --pg-hash-hover-bg:         rgba(255,255,255,0.08);
    --pg-hash-hover-bd:         rgba(255,255,255,0.18);
    --pg-hash-hover-cl:         var(--md-text-primary);
    --pg-hash-input-bd:         var(--md-accent);
    --pg-hash-input-sh:         rgba(128,128,128,0.14);

    --sl-range-group-bg:        var(--md-bg-elevated);
    --sl-range-group-bd:        var(--md-border);
    --sl-range-hover-bg:        rgba(255,255,255,0.06);
    --sl-range-active-bg:       rgba(107,155,122,0.22);
    --sl-range-active-bd:       rgba(107,155,122,0.45);
    --sl-range-active-cl:       #aaddb8;

    --sl-stat-mini-bg:          var(--md-bg-elevated);
    --sl-stat-mini-bd:          var(--md-border);

    --sl-stat-val-total-cl:     var(--md-text-primary);
    --sl-stat-val-link-cl:      #9ab3d9;
    --sl-stat-val-qr-cl:        #8bc99f;
    --sl-stat-val-unique-cl:    #c9a3e8;

    --sl-create-header-hover-bg: var(--md-bg-elevated);
    --sl-create-header-open-bg:  var(--md-bg-elevated);
    --sl-input-bg:               var(--md-bg-elevated);
    --sl-input-prefix-bg:        var(--md-bg-primary);
    --sl-input-hover-bg:         var(--sl-create-input-hover-bg);

    /* Chart dataset colors (dark) */
    --sl-chart-link-bg:         rgba(154,179,217,0.70);
    --sl-chart-link-bd:         rgba(154,179,217,0.90);
    --sl-chart-qr-bg:           rgba(139,201,159,0.70);
    --sl-chart-qr-bd:           rgba(139,201,159,0.90);
    --sl-chart-unique-bg:       rgba(201,163,232,0.65);
    --sl-chart-unique-bd:       rgba(201,163,232,0.85);

    --fp-stat-link-cl:          #9ab3d9;
    --fp-stat-qr-cl:            #8bc99f;
    --fp-stat-total-cl:         var(--md-accent-light);
    --fp-stat-unique-cl:        #c9a3e8;

    --fp-stat-box-qr-top:       rgba(107,155,122,0.5);
    --fp-stat-box-link-top:     rgba(122,139,180,0.5);
    --fp-stat-box-total-top:    var(--md-accent);
    --fp-stat-box-unique-top:   rgba(178,140,217,0.5);

    --sl-create-input-hover-bg: rgba(255,255,255,0.04);
    --sl-create-btn-cancel-hover-bg: rgba(255,255,255,0.08);
    --sl-create-btn-cancel-hover-bd: rgba(255,255,255,0.18);
    --sl-create-btn-submit-bg:  rgba(107,155,122,0.18);
    --sl-create-btn-submit-bd:  rgba(107,155,122,0.4);
    --sl-create-btn-submit-cl:  #8bc99f;
    --sl-create-btn-submit-hover-bg: rgba(107,155,122,0.30);
    --sl-create-btn-submit-hover-bd: rgba(107,155,122,0.65);
    --sl-create-btn-submit-hover-cl: #aaddb8;
    --sl-create-spinner-bd:     rgba(107,155,122,0.3);
    --sl-create-spinner-top:    #8bc99f;

    --sl-create-icon-bg:        rgba(107,155,122,0.15);
    --sl-create-icon-bd:        rgba(107,155,122,0.3);
    --sl-create-icon-cl:        #8bc99f;
    --sl-create-icon-hover-bg:  rgba(107,155,122,0.25);
    --sl-create-icon-hover-bd:  rgba(107,155,122,0.5);
    --sl-create-icon-hover-cl:  #aaddb8;

    --toast-success-bg:         rgba(107,155,122,0.15);
    --toast-success-bd:         #6b9b7a;
    --toast-success-cl:         #8bc99f;
    --toast-error-bg:           rgba(179,107,107,0.15);
    --toast-error-bd:           #b36b6b;
    --toast-error-cl:           #d98989;

    --chart-text-cl:            #b0b0b0;
    --chart-grid-cl:            rgba(255,255,255,0.07);
    --chart-tooltip-bg:         #262626;
    --chart-tooltip-bd:         rgba(255,255,255,0.10);
    --chart-tooltip-title:      #f5f5f5;
    --chart-tooltip-body:       #b0b0b0;

    --inline-spin-bd:           rgba(255,255,255,0.10);
    --inline-spin-top:          var(--md-accent);

    --md-error-bg:              rgba(179,107,107,0.15);
    --md-error-bd:              rgba(179,107,107,0.3);
    --md-error-left:            #b36b6b;
    --md-error-cl:              #d98989;

    --bg-grid-line:             rgba(255,255,255,0.018);
    --bg-blob-1:                rgba(107,155,122,0.06);
    --bg-blob-2:                rgba(100,130,200,0.04);
    --bg-blob-3:                rgba(179,155,107,0.03);
}

/* =====================================================
   BASE
===================================================== */
.md-header {
    margin-bottom: 28px;
    animation: fadeUp 0.35s ease-out both;
}
.md-header h3 { font-size:1.75rem; font-weight:700; color:var(--md-text-primary); letter-spacing:-0.02em; margin:0 0 4px; }
.md-header p  { font-size:0.9375rem; color:var(--md-text-secondary); margin:0; }

.md-card {
    background:var(--md-bg-card); border:1px solid var(--md-border);
    border-radius:12px; box-shadow:var(--md-elevation-2);
    margin-bottom:24px; transition:box-shadow 0.3s; animation:fadeIn 0.4s ease-out;
}
.md-card:hover { box-shadow:var(--md-elevation-4); }

.md-card-header {
    background: var(--md-bg-elevated);
    border-bottom:1px solid var(--md-border); padding:20px 24px;
    display:flex; justify-content:space-between; align-items:center;
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
@keyframes pulse { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.08); } }
@keyframes spin   { to { transform:rotate(360deg); } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
.md-empty-icon { font-size:4rem; color:var(--md-text-disabled); opacity:0.5; }

/* =====================================================
   TABLE — Card-row layout
===================================================== */
.sl-list { list-style:none; margin:0; padding:0; }

.sl-item {
    display:flex; align-items:stretch;
    border-bottom:1px solid var(--md-border);
    padding:16px 20px; gap:18px;
    transition:background 0.15s;
    position:relative;
}
.sl-item:last-child { border-bottom:none; }
.sl-item:hover { background:var(--sl-item-hover-bg); }

/* ── QR paling kiri ── */
.sl-qr {
    flex-shrink:0;
    width:72px; height:72px;
    background:#fff; border-radius:8px; padding:4px;
    display:flex; align-items:center; justify-content:center;
    box-shadow:0 2px 8px rgba(0,0,0,0.4);
    align-self:center;
}
.sl-qr canvas,
.sl-qr img { width:64px!important; height:64px!important; display:block; }

/* ── Info utama (tengah, flex:1) ── */
.sl-info {
    flex:1; min-width:0;
    display:flex; flex-direction:column; justify-content:center; gap:3px;
}

.sl-title {
    font-size:0.9375rem; font-weight:600; color:var(--md-text-primary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}

.sl-short {
    font-size:1rem; font-weight:700;
    color:var(--sl-short-cl);
    display:flex; align-items:center; gap:8px; flex-wrap:wrap;
}
.sl-short a { color:var(--sl-short-cl); text-decoration:none; }
.sl-short a:hover { text-decoration:underline; color:var(--sl-short-hover-cl); }

.sl-copy-btn {
    background:none; border:none; cursor:pointer; padding:0;
    color:var(--md-text-disabled); font-size:0.8rem; transition:color 0.15s;
    display:inline-flex; align-items:center;
}
.sl-copy-btn:hover { color:var(--sl-short-cl); }

.sl-orig {
    font-size:0.8125rem; color:var(--md-text-secondary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}

.sl-date {
    font-size:0.775rem; color:var(--md-text-disabled);
    display:flex; align-items:center; gap:5px; margin-top:3px;
}

/* ── Stat + Aksi (kanan) ── */
.sl-right {
    display:flex; flex-direction:column; align-items:flex-end;
    justify-content:space-between; flex-shrink:0; gap:8px;
    min-width:80px;
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

.fp-stat-box-qr    { border-top:2px solid var(--fp-stat-box-qr-top); }
.fp-stat-box-link  { border-top:2px solid var(--fp-stat-box-link-top); }
.fp-stat-box-total { border-top:2px solid var(--fp-stat-box-total-top); }
.fp-stat-box-unique{ border-top:2px solid var(--fp-stat-box-unique-top); }

/* Gear button */
.btn-gear {
    width:34px; height:34px; border-radius:8px;
    border:1px solid var(--md-border); background:var(--md-bg-elevated);
    color:var(--md-text-secondary);
    display:inline-flex; align-items:center; justify-content:center;
    cursor:pointer; font-size:0.95rem;
    transition:all 0.2s cubic-bezier(0.4,0,0.2,1);
}
.btn-gear:hover {
    background:var(--gear-hover-bg); color:var(--md-text-primary);
    border-color:var(--gear-hover-bd); box-shadow:var(--md-elevation-2);
}
.btn-gear.active {
    background:linear-gradient(135deg,var(--gear-active-from) 0%,var(--gear-active-to) 100%);
    color:var(--md-text-primary); border-color:var(--gear-active-bd);
}
.btn-gear .gear-icon { transition:transform 0.35s cubic-bezier(0.4,0,0.2,1); }
.btn-gear.active .gear-icon { transform:rotate(90deg); }

.sl-item.row-removing { opacity:0; transform:translateX(20px); transition:opacity 0.3s,transform 0.3s; }
.md-link { color:var(--fp-info-link-cl); text-decoration:none; }
.md-link:hover { text-decoration:underline; }
.md-error { background:var(--md-error-bg); border:1px solid var(--md-error-bd); border-left:4px solid var(--md-error-left); padding:22px; border-radius:8px; color:var(--md-error-cl); }

/* =====================================================
   PAGINATION
===================================================== */
.sl-pagination {
    display:flex; align-items:center; justify-content:center;
    gap:6px; padding:16px 20px;
    border-top:1px solid var(--md-border);
}

/* Setiap tombol/elemen paginasi */
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
.pg-btn:disabled {
    opacity:0.3; cursor:not-allowed;
}

/* Divider vertikal antara grup */
.pg-divider {
    width:1px; height:24px;
    background:var(--md-border);
    margin:0 4px;
}

/* Jump-to-page — tombol # yang bisa berubah jadi input */
.pg-jump-wrap {
    display:flex; align-items:center; gap:4px;
}
/* Tombol # dalam mode normal */
.pg-hash-btn {
    width:36px; height:36px; border-radius:9px;
    border:1px solid var(--md-border); background:var(--pg-btn-bg);
    color:var(--md-text-secondary);
    display:inline-flex; align-items:center; justify-content:center;
    font-size:0.875rem; font-weight:600; cursor:pointer;
    font-family:'Inter',sans-serif;
    transition:all 0.18s cubic-bezier(0.4,0,0.2,1);
}
.pg-hash-btn:hover {
    background:var(--pg-hash-hover-bg);
    color:var(--pg-hash-hover-cl);
    border-color:var(--pg-hash-hover-bd);
}
/* Tombol # dalam mode input (aktif) */
.pg-hash-btn.is-input {
    width:52px;
    background:var(--pg-btn-bg);
    border-color:var(--pg-hash-input-bd);
    box-shadow:0 0 0 3px var(--pg-hash-input-sh);
    color:var(--md-text-primary);
    cursor:text; font-weight:400; letter-spacing:0.04em;
}
/* Input tersembunyi di dalam tombol # */
.pg-inline-input {
    width:100%; height:100%; border:none; background:transparent;
    color:var(--md-text-primary); text-align:center;
    font-size:0.875rem; font-family:'Inter',sans-serif;
    outline:none; padding:0;
}
.pg-inline-input::-webkit-inner-spin-button,
.pg-inline-input::-webkit-outer-spin-button { -webkit-appearance:none; }

/* Info total halaman */
.pg-info {
    font-size:0.72rem; color:var(--md-text-disabled);
    white-space:nowrap; padding:0 4px;
}

/* =====================================================
   FLOATING SETTING PANEL
===================================================== */
.fp-backdrop {
    position:fixed; inset:0;
    background:var(--fp-backdrop-bg); backdrop-filter:blur(6px);
    z-index:3000;
    opacity:0; visibility:hidden;
    transition:opacity 0.25s, visibility 0.25s;
}
.fp-backdrop.show { opacity:1; visibility:visible; }

.fp-panel {
    position:fixed;
    top:50%; left:50%;
    transform:translate(-50%,-50%) scale(0.95);
    z-index:3001;
    width: min(820px, 94vw);
    max-height: min(540px, 90vh);
    height: min(540px, 90vh);
    background:var(--md-bg-card);
    border:1px solid var(--md-border);
    border-radius:18px;
    box-shadow:var(--fp-panel-shadow);
    display:flex;
    overflow:hidden;
    opacity:0; visibility:hidden;
    transition:
        opacity 0.28s cubic-bezier(0.4,0,0.2,1),
        visibility 0.28s,
        transform 0.28s cubic-bezier(0.34,1.35,0.64,1);
}
.fp-panel.show {
    opacity:1; visibility:visible;
    transform:translate(-50%,-50%) scale(1);
}

/* ── KIRI: Area konten ── */
.fp-content {
    flex:1; min-width:0;
    display:flex; flex-direction:column;
    border-right:1px solid var(--md-border);
    overflow:hidden;
}

.fp-content-head {
    padding:22px 26px 18px;
    border-bottom:1px solid var(--md-border);
    display:flex; align-items:center; gap:14px;
    flex-shrink:0;
}
.fp-page-icon {
    width:44px; height:44px; border-radius:11px;
    display:flex; align-items:center; justify-content:center;
    font-size:1.25rem; flex-shrink:0;
}
.fp-page-icon.icon-info   { background:var(--fp-icon-info-bg);   color:var(--fp-icon-info-cl); }
.fp-page-icon.icon-stat   { background:var(--fp-icon-stat-bg);   color:var(--fp-icon-stat-cl); }
.fp-page-icon.icon-edit   { background:var(--fp-icon-edit-bg);   color:var(--fp-icon-edit-cl); }
.fp-page-icon.icon-delete { background:var(--fp-icon-delete-bg); color:var(--fp-icon-delete-cl); }
.fp-page-icon.icon-open   { background:var(--fp-icon-open-bg);   color:var(--fp-icon-open-cl); }

.fp-page-title { font-size:1.05rem; font-weight:600; color:var(--md-text-primary); margin:0 0 2px; }
.fp-page-desc  { font-size:0.8rem; color:var(--md-text-secondary); margin:0; }

.fp-content-body {
    flex:1; overflow-y:auto; padding:24px 26px;
}

.fp-content-footer {
    padding:14px 26px 20px;
    border-top:1px solid var(--md-border);
    display:flex; gap:10px; justify-content:flex-end; flex-shrink:0;
}

/* Info rows */
.fp-info-row {
    display:flex; align-items:flex-start; gap:12px;
    padding:13px 15px; background:var(--md-bg-elevated);
    border:1px solid var(--md-border); border-radius:10px; margin-bottom:10px;
}
.fp-info-row i { font-size:1rem; color:var(--md-text-secondary); margin-top:2px; flex-shrink:0; }
.fp-info-label { font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.06em; color:var(--md-text-secondary); margin-bottom:3px; }
.fp-info-value { font-size:0.875rem; color:var(--md-text-primary); word-break:break-all; line-height:1.5; }
.fp-info-value a { color:var(--fp-info-link-cl); text-decoration:none; }
.fp-info-value a:hover { text-decoration:underline; }

.fp-stat-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-top:4px; }
.fp-stat-box {
    padding:16px; background:var(--md-bg-elevated);
    border:1px solid var(--md-border); border-radius:10px; text-align:center;
}
.fp-stat-box .stat-num { font-size:1.6rem; font-weight:700; color:var(--md-text-primary); line-height:1; }
.fp-stat-box .stat-lbl { font-size:0.7rem; color:var(--md-text-secondary); text-transform:uppercase; letter-spacing:0.07em; margin-top:5px; }
/* Warna angka per tipe — harus di bawah .fp-stat-box .stat-num agar tidak teroverride */
.fp-stat-box.fp-stat-box-link   .stat-num { color:var(--fp-stat-link-cl); }
.fp-stat-box.fp-stat-box-qr     .stat-num { color:var(--fp-stat-qr-cl); }
.fp-stat-box.fp-stat-box-total  .stat-num { color:var(--fp-stat-total-cl); }
.fp-stat-box.fp-stat-box-unique .stat-num { color:var(--fp-stat-unique-cl); }

/* Form */
.fp-form-group { margin-bottom:18px; }
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
.fp-input {
    flex:1; padding:11px 14px; background:var(--md-bg-elevated);
    border:none; color:var(--md-text-primary);
    font-size:0.9375rem; font-family:'Inter',sans-serif;
}
.fp-input:focus { outline:none; }
.fp-input::placeholder { color:var(--md-text-disabled); }
.fp-hint  { font-size:0.78rem; color:var(--md-text-secondary); margin-top:5px; }
.fp-error { font-size:0.78rem; color:var(--fp-error-cl); margin-top:5px; display:none; }

/* Delete warning */
.fp-warn {
    background:var(--fp-warn-bg); border:1px solid var(--fp-warn-bd);
    border-left:4px solid var(--fp-warn-left); border-radius:10px;
    padding:15px 18px; display:flex; gap:13px; align-items:flex-start; margin-bottom:16px;
}
.fp-warn i { font-size:1.2rem; color:var(--fp-warn-cl); flex-shrink:0; margin-top:2px; }
.fp-warn p { margin:0; font-size:0.875rem; color:var(--fp-warn-cl); line-height:1.55; }
.fp-warn strong { color:var(--fp-warn-strong); }

.fp-confirm-check {
    display:flex; align-items:center; gap:10px;
    padding:12px 15px; background:var(--md-bg-elevated);
    border:1px solid var(--md-border); border-radius:8px; cursor:pointer;
}
.fp-confirm-check input[type=checkbox] { accent-color:var(--md-accent); width:16px; height:16px; cursor:pointer; flex-shrink:0; }
.fp-confirm-check label { font-size:0.875rem; color:var(--md-text-secondary); cursor:pointer; user-select:none; }

/* ── Panel Buttons ── */
.fp-btn {
    padding:10px 20px; border-radius:8px; font-size:0.875rem; font-weight:500;
    cursor:pointer; border:1px solid transparent;
    display:inline-flex; align-items:center; gap:7px;
    transition:all 0.18s cubic-bezier(0.4,0,0.2,1);
    font-family:'Inter',sans-serif; text-decoration:none;
    letter-spacing:0.01em;
}

/* Batal / Tutup — netral */
.fp-btn-cancel {
    background:var(--md-bg-elevated);
    border-color:var(--md-border);
    color:var(--md-text-secondary);
}
.fp-btn-cancel:hover {
    background:var(--fp-btn-cancel-hover-bg);
    border-color:var(--fp-btn-cancel-hover-bd);
    color:var(--fp-btn-cancel-hover-cl);
}

/* Simpan — biru/accent */
.fp-btn-save {
    background:var(--fp-btn-save-bg);
    border-color:var(--fp-btn-save-bd);
    color:var(--fp-btn-save-cl);
}
.fp-btn-save:hover {
    background:var(--fp-btn-save-hover-bg);
    border-color:var(--fp-btn-save-hover-bd);
    color:var(--fp-btn-save-hover-cl);
    transform:translateY(-1px);
}
.fp-btn-save:disabled { opacity:0.35; cursor:not-allowed; transform:none; }

/* Hapus — merah */
.fp-btn-delete {
    background:var(--fp-btn-delete-bg);
    border-color:var(--fp-btn-delete-bd);
    color:var(--fp-btn-delete-cl);
}
.fp-btn-delete:hover {
    background:var(--fp-btn-delete-hover-bg);
    border-color:var(--fp-btn-delete-hover-bd);
    color:var(--fp-btn-delete-hover-cl);
    transform:translateY(-1px);
}
.fp-btn-delete:disabled { opacity:0.35; cursor:not-allowed; transform:none; }

/* Buka URL — hijau */
.fp-btn-open {
    background:var(--fp-btn-open-bg);
    border-color:var(--fp-btn-open-bd);
    color:var(--fp-btn-open-cl);
}
.fp-btn-open:hover {
    background:var(--fp-btn-open-hover-bg);
    border-color:var(--fp-btn-open-hover-bd);
    color:var(--fp-btn-open-hover-cl);
    transform:translateY(-1px);
}

/* Unduh QR */
.btn-qr-dl {
    display:inline-flex; align-items:center; gap:7px;
    padding:8px 14px; border-radius:8px;
    background:var(--btn-qr-dl-bg);
    border:1px solid var(--md-border);
    color:var(--md-text-secondary);
    cursor:pointer; font-size:0.8rem; font-family:'Inter',sans-serif;
    transition:all 0.15s;
}
.btn-qr-dl:hover {
    background:var(--btn-qr-dl-hover-bg);
    border-color:var(--btn-qr-dl-hover-bd);
    color:var(--md-text-primary);
}

/* Tombol tutup (X) di sidebar */
.fp-close-btn {
    position:absolute; top:12px; right:12px;
    width:28px; height:28px; border-radius:7px;
    border:1px solid var(--md-border);
    background:var(--md-bg-elevated);
    color:var(--md-text-secondary);
    display:flex; align-items:center; justify-content:center;
    cursor:pointer; font-size:0.8rem; transition:all 0.15s;
}
.fp-close-btn:hover {
    background:var(--fp-close-hover-bg);
    border-color:var(--fp-close-hover-bd);
    color:var(--fp-close-hover-cl);
}

.fp-spinner {
    width:14px; height:14px;
    border:2px solid var(--fp-spinner-bd); border-top-color:currentColor;
    border-radius:50%; animation:spin 0.7s linear infinite; display:none;
}

/* ── KANAN: Sidebar menu ── */
.fp-sidebar {
    width:210px; min-width:210px; flex-shrink:0;
    background:var(--md-bg-secondary);
    display:flex; flex-direction:column;
    overflow:hidden;
}

.fp-sidebar-head {
    padding:20px 16px 16px;
    background:var(--md-bg-elevated);
    border-bottom:1px solid var(--md-border);
    flex-shrink:0; position:relative;
}
.fp-sidebar-eyebrow {
    font-size:0.63rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.1em; color:var(--sb-eyebrow-cl); margin-bottom:8px;
}
.fp-sidebar-short {
    font-size:0.8125rem; font-weight:600; color:var(--sb-short-cl);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis; margin-bottom:3px;
}
.fp-sidebar-orig {
    font-size:0.7rem; color:var(--sb-orig-cl);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
/* fp-close-btn — see panel buttons section */

.fp-nav { flex:1; padding:10px 8px; overflow-y:auto; }

.fp-nav-section {
    font-size:0.63rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.1em; color:var(--md-text-disabled);
    padding:8px 8px 4px;
}
.fp-nav-item {
    width:100%; display:flex; align-items:center; gap:10px;
    padding:9px 10px; border-radius:8px; border:1px solid transparent;
    background:transparent; color:var(--md-text-secondary);
    cursor:pointer; text-align:left; font-family:'Inter',sans-serif;
    font-size:0.845rem; margin-bottom:3px;
    transition:all 0.16s cubic-bezier(0.4,0,0.2,1);
}
.fp-nav-icon {
    width:30px; height:30px; border-radius:7px;
    display:flex; align-items:center; justify-content:center;
    font-size:0.9rem; flex-shrink:0;
    background:var(--fp-nav-icon-bg); transition:background 0.16s;
}

/* ── Detail ── */
#nav-info:hover {
    background:var(--nav-info-hover-bg);
    border-color:var(--nav-info-hover-bd);
    color:var(--nav-info-hover-cl);
}
#nav-info.is-active {
    background:var(--nav-info-active-bg);
    border-color:var(--nav-info-active-bd);
    color:var(--nav-info-active-cl);
}
#nav-info.is-active .fp-nav-icon { background:var(--nav-info-icon-bg); color:var(--nav-info-active-cl); }

/* ── Statistik ── */
#nav-stat:hover {
    background:var(--nav-stat-hover-bg);
    border-color:var(--nav-stat-hover-bd);
    color:var(--nav-stat-hover-cl);
}
#nav-stat.is-active {
    background:var(--nav-stat-active-bg);
    border-color:var(--nav-stat-active-bd);
    color:var(--nav-stat-active-cl);
}
#nav-stat.is-active .fp-nav-icon { background:var(--nav-stat-icon-bg); color:var(--nav-stat-active-cl); }

/* ── Edit ── */
#nav-edit:hover {
    background:var(--nav-edit-hover-bg);
    border-color:var(--nav-edit-hover-bd);
    color:var(--nav-edit-hover-cl);
}
#nav-edit.is-active {
    background:var(--nav-edit-active-bg);
    border-color:var(--nav-edit-active-bd);
    color:var(--nav-edit-active-cl);
}
#nav-edit.is-active .fp-nav-icon { background:var(--nav-edit-icon-bg); color:var(--nav-edit-active-cl); }

/* ── Hapus ── */
.fp-nav-item.is-delete { color:var(--nav-delete-cl); }
.fp-nav-item.is-delete:hover {
    background:var(--nav-delete-hover-bg);
    border-color:var(--nav-delete-hover-bd);
    color:var(--nav-delete-hover-cl);
}
.fp-nav-item.is-delete.is-active {
    background:var(--nav-delete-active-bg);
    border-color:var(--nav-delete-active-bd);
    color:var(--nav-delete-active-cl);
}
.fp-nav-item.is-delete .fp-nav-icon { background:var(--nav-delete-icon-bg); color:var(--nav-delete-icon-cl); }
.fp-nav-item.is-delete.is-active .fp-nav-icon { background:var(--nav-delete-icon-bg); color:var(--nav-delete-active-cl); }

.fp-nav-divider { height:1px; background:var(--md-border); margin:7px 4px; }

/* page switching */
.fp-page { display:none; flex:1; flex-direction:column; overflow:hidden; }
.fp-page.is-active { display:flex; }

/* =====================================================
   QR CODE
===================================================== */
.qr-mini-wrap canvas,
.qr-mini-wrap img { width:64px!important; height:64px!important; display:block; }

.qr-panel-wrap {
    display:flex; flex-direction:row; align-items:flex-start;
    gap:16px; padding:14px 16px;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    border-radius:12px; margin-bottom:14px;
}
.qr-canvas-box {
    background:#fff; border-radius:8px; padding:7px;
    box-shadow:0 2px 10px rgba(0,0,0,0.45);
    flex-shrink:0;
}
.qr-canvas-box canvas,
.qr-canvas-box img { width:100px!important; height:100px!important; display:block; }

.qr-panel-info {
    display:flex; flex-direction:column; justify-content:center;
    gap:7px; min-width:0; padding-top:2px;
}
.qr-url-label {
    font-size:0.78rem; color:var(--md-text-secondary);
    word-break:break-all; line-height:1.4; margin:0;
}

.qr-edit-preview {
    display:flex; align-items:center; gap:14px;
    padding:14px 16px; background:var(--md-bg-elevated);
    border:1px solid var(--md-border); border-radius:10px; margin-top:14px;
}
.qr-edit-box {
    background:#fff; border-radius:8px; padding:6px;
    flex-shrink:0; box-shadow:0 2px 8px rgba(0,0,0,0.4);
}
.qr-edit-box canvas,
.qr-edit-box img { width:80px!important; height:80px!important; display:block; }
.qr-edit-desc strong { display:block; font-size:0.845rem; color:var(--md-text-primary); margin-bottom:3px; }
.qr-edit-desc small  { font-size:0.75rem; color:var(--md-text-secondary); line-height:1.4; display:block; }

/* btn-qr-dl — see panel buttons section */

/* =====================================================
   STATISTIK
===================================================== */
.sl-range-group { display:flex; background:var(--sl-range-group-bg); border:1px solid var(--sl-range-group-bd); border-radius:8px; padding:3px; gap:2px; align-self:flex-start; }
.sl-range-btn { padding:5px 10px; border-radius:6px; border:1px solid transparent; background:transparent; color:var(--md-text-secondary); font-size:0.75rem; font-family:'Inter',sans-serif; cursor:pointer; transition:all 0.15s; white-space:nowrap; }
.sl-range-btn:hover { color:var(--md-text-primary); background:var(--sl-range-hover-bg); }
.sl-range-btn.active { background:var(--sl-range-active-bg); border-color:var(--sl-range-active-bd); color:var(--sl-range-active-cl); }
.sl-stat-summary { display:grid; grid-template-columns:1fr 1fr 1fr 1fr; gap:8px; }
.sl-stat-mini { background:var(--sl-stat-mini-bg); border:1px solid var(--sl-stat-mini-bd); border-radius:8px; padding:8px 10px; display:flex; flex-direction:column; align-items:center; gap:3px; }
.sl-stat-mini-val { font-size:1.2rem; font-weight:700; color:var(--md-text-primary); line-height:1; }
.sl-stat-mini-lbl { font-size:0.68rem; color:var(--md-text-disabled); text-transform:uppercase; letter-spacing:0.06em; }

/* =====================================================
   TOAST
===================================================== */
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

/* Judul & deskripsi di tabel */
.sl-judul {
    font-size:0.9rem; font-weight:600; color:var(--md-text-primary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
}
.sl-deskripsi {
    font-size:0.75rem; color:var(--md-text-secondary);
    white-space:nowrap; overflow:hidden; text-overflow:ellipsis;
    margin-top:1px;
}
/* Textarea di form edit */
.fp-textarea {
    width:100%; padding:10px 14px;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    border-radius:8px; color:var(--md-text-primary);
    font-size:0.875rem; font-family:'Inter',sans-serif;
    resize:vertical; min-height:72px;
    transition:border-color 0.2s;
    outline:none;
}
.fp-textarea:focus { border-color:var(--fp-input-focus-bd); }
.fp-textarea::placeholder { color:var(--md-text-disabled); }

/* Stat grid 3 kolom */
.fp-stat-grid-3 {
    display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-top:4px;
}

/* fp-input standalone (tanpa wrapper) */
.fp-input-standalone {
    width:100%; padding:11px 14px;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    border-radius:8px; color:var(--md-text-primary);
    font-size:0.9rem; font-family:'Inter',sans-serif;
    transition:border-color 0.2s, box-shadow 0.2s;
    outline:none; box-sizing:border-box;
}
.fp-input-standalone:focus {
    border-color:var(--fp-input-focus-bd);
    box-shadow:0 0 0 3px var(--fp-input-focus-sh);
}
.fp-input-standalone::placeholder { color:var(--md-text-disabled); }

/* Section divider di content body */
.fp-section-label {
    font-size:0.63rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.09em; color:var(--md-text-disabled);
    margin:16px 0 8px; padding-bottom:6px;
    border-bottom:1px solid var(--md-border);
}

/* ── Searchbar & Filter ── */
.sl-search-wrap {
    padding:12px 16px;
    border-bottom:1px solid var(--md-border);
    display:flex; align-items:center; gap:10px;
}
.sl-search-box {
    flex:1; display:flex; align-items:center; gap:10px;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    border-radius:10px; padding:0 14px;
    transition:border-color 0.18s, box-shadow 0.18s;
}
.sl-search-box:focus-within {
    border-color:var(--sl-search-focus-bd);
    box-shadow:0 0 0 3px var(--sl-search-focus-sh);
}
.sl-search-box i {
    font-size:0.9rem; color:var(--md-text-disabled); flex-shrink:0;
}
.sl-search-input {
    flex:1; padding:10px 0; background:transparent; border:none;
    color:var(--md-text-primary); font-size:0.875rem;
    font-family:'Inter',sans-serif; outline:none;
}
.sl-search-input::placeholder { color:var(--md-text-disabled); }
.sl-search-clear {
    width:22px; height:22px; border-radius:6px; border:none;
    background:transparent; color:var(--md-text-disabled);
    display:none; align-items:center; justify-content:center;
    cursor:pointer; font-size:0.78rem; flex-shrink:0;
    transition:all 0.15s;
}
.sl-search-clear:hover { background:var(--sl-search-clear-hover); color:var(--md-text-primary); }
.sl-search-clear.visible { display:flex; }

/* Filter button */
.sl-filter-btn {
    height:38px; padding:0 14px; border-radius:10px; flex-shrink:0;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    color:var(--md-text-secondary); font-size:0.845rem; font-weight:500;
    font-family:'Inter',sans-serif; cursor:pointer;
    display:flex; align-items:center; gap:7px;
    transition:all 0.18s;
}
.sl-filter-btn:hover, .sl-filter-btn.active {
    background:var(--sl-filter-btn-hover-bg);
    border-color:var(--sl-filter-btn-hover-bd);
    color:var(--sl-filter-btn-hover-cl);
}
.sl-filter-btn.active { border-color:var(--sl-filter-btn-hover-bd); }

/* Filter dropdown */
.sl-filter-dropdown {
    position:absolute; top:calc(100% + 6px); right:0;
    background:var(--sl-filter-dd-bg); border:1px solid var(--sl-filter-dd-bd);
    border-radius:12px; box-shadow:var(--sl-filter-dd-sh);
    z-index:200; min-width:220px; overflow:hidden;
    display:none;
}
.sl-filter-dropdown.show { display:block; }
.sl-filter-section { padding:10px 0; }
.sl-filter-section + .sl-filter-section { border-top:1px solid var(--sl-filter-section-bd); }
.sl-filter-head {
    padding:6px 14px 4px;
    font-size:0.68rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.08em; color:var(--md-text-disabled);
}
.sl-filter-item {
    display:flex; align-items:center; gap:10px;
    padding:8px 14px; cursor:pointer;
    font-size:0.845rem; color:var(--md-text-secondary);
    transition:background 0.15s;
}
.sl-filter-item:hover { background:var(--sl-filter-item-hover-bg); color:var(--sl-filter-item-hover-cl); }
.sl-filter-item.selected {
    color:var(--sl-filter-selected-cl);
    background:var(--sl-filter-selected-bg);
}
.sl-filter-item i { font-size:0.85rem; width:16px; text-align:center; }
.sl-filter-item .check {
    margin-left:auto; font-size:0.75rem; color:var(--sl-filter-check-cl);
    display:none;
}
.sl-filter-item.selected .check { display:block; }

/* Sort indicator badge */
.sl-sort-badge {
    display:none; align-items:center; gap:5px;
    font-size:0.72rem; font-weight:600;
    padding:3px 9px; border-radius:20px;
    background:var(--sl-sort-badge-bg); border:1px solid var(--sl-sort-badge-bd);
    color:var(--sl-sort-badge-cl);
}
.sl-sort-badge.show { display:inline-flex; }
.sl-sort-badge button {
    background:none; border:none; padding:0; cursor:pointer;
    color:var(--sl-sort-badge-btn-cl); font-size:0.72rem; line-height:1;
    display:flex; align-items:center;
}
.sl-sort-badge button:hover { color:var(--sl-sort-badge-btn-hover); }

.sl-search-empty {
    text-align:center; padding:40px 20px;
    color:var(--md-text-secondary); font-size:0.9rem;
}
.sl-search-empty i { font-size:2.5rem; display:block; margin-bottom:10px; color:var(--md-text-disabled); }

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

        .bg-layer {
            position: fixed; inset: 0; overflow: hidden; z-index: 0;
            pointer-events: none;
        }
        .bg-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(var(--bg-grid-line) 1px, transparent 1px),
                linear-gradient(90deg, var(--bg-grid-line) 1px, transparent 1px);
            background-size: 56px 56px;
        }
        .bg-blob {
            position: absolute; border-radius: 50%;
            filter: blur(90px); animation: pulse 10s ease-in-out infinite;
        }
        .bg-blob-1 { width:500px; height:500px; background:var(--bg-blob-1); top:-150px; left:-120px; animation-delay:0s; }
        .bg-blob-2 { width:400px; height:400px; background:var(--bg-blob-2); bottom:-120px; right:-100px; animation-delay:4s; }
        .bg-blob-3 { width:300px; height:300px; background:var(--bg-blob-3); top:40%; left:55%; animation-delay:7s; }

</style>

{{-- =====================================================
     HALAMAN UTAMA
===================================================== --}}
<div style="position:relative;z-index:1;" class="container-fluid px-4 py-4">
    <div class="md-header">
        <h3>Data ShortLink Anda</h3>
        <p>Kelola semua link pendek yang telah Anda buat.</p>
    </div>

    {{-- ══ FORM BUAT SHORTLINK BARU ══ --}}
    <div class="sl-create-card">

        {{-- Header collapsible --}}
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

        {{-- Body --}}
        <div class="sl-create-body" id="createBody">

            <div class="sl-create-body-inner">

                {{-- URL Tujuan --}}
                <div class="sl-create-field">
                    <label class="sl-create-label" for="createUrl">
                        URL Tujuan <span class="sl-create-required">*</span>
                    </label>
                    <input type="url" class="sl-create-input" id="createUrl"
                           placeholder="https://example.com/halaman-panjang"
                           autocomplete="off">
                </div>

                {{-- Kode Pendek --}}
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

                {{-- Judul --}}
                <div class="sl-create-field">
                    <label class="sl-create-label" for="createJudul">
                        Judul
                        <span class="sl-create-optional">(opsional)</span>
                    </label>
                    <input type="text" class="sl-create-input" id="createJudul"
                           placeholder="Nama singkat untuk shortlink ini"
                           maxlength="100" autocomplete="off">
                </div>

                {{-- Deskripsi --}}
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

            {{-- Error --}}
            <div class="sl-create-error" id="createError">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span id="createErrText"></span>
            </div>

            {{-- Footer --}}
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

    <div class="md-card">
        <div class="md-card-header">
            <h5>Daftar ShortLink</h5>
            <span class="md-badge" id="totalLinks">0 Link</span>
        </div>
        <div class="card-body p-0">

            <div id="loadingState" class="text-center py-5">
                <div class="md-spinner mx-auto"></div>
                <p class="mt-4 fw-medium" style="font-size:1rem;color:var(--md-text-secondary);">Memuat data...</p>
            </div>

            <div id="emptyState" class="text-center py-5 d-none">
                <i class="bi bi-link-45deg md-empty-icon"></i>
                <p class="mt-3 fw-medium" style="font-size:1rem;color:var(--md-text-secondary);">Belum ada shortlink.</p>
            </div>

            <div id="tableContainer" class="d-none">
                {{-- SEARCHBAR & FILTER --}}
                <div class="sl-search-wrap">
                    <div class="sl-search-box">
                        <i class="bi bi-search"></i>
                        <input class="sl-search-input" id="slSearchInput" type="text"
                               placeholder="Cari judul atau kode pendek..." autocomplete="off"
                               oninput="onSearch(this.value)">
                        <button class="sl-search-clear" id="slSearchClear" onclick="clearSearch()" title="Hapus">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    {{-- Filter --}}
                    <div style="position:relative;">
                        <button class="sl-filter-btn" id="slFilterBtn" onclick="toggleFilter()">
                            <i class="bi bi-sliders2"></i> Filter
                        </button>
                        <div class="sl-filter-dropdown" id="slFilterDropdown">
                            <div class="sl-filter-section">
                                <div class="sl-filter-head">Urutkan Berdasarkan Tanggal</div>
                                <div class="sl-filter-item" id="flt-date-new" onclick="setSort('date','desc')">
                                    <i class="bi bi-calendar-arrow-down"></i> Terbaru
                                    <i class="bi bi-check2 check"></i>
                                </div>
                                <div class="sl-filter-item" id="flt-date-old" onclick="setSort('date','asc')">
                                    <i class="bi bi-calendar-arrow-up"></i> Terlama
                                    <i class="bi bi-check2 check"></i>
                                </div>
                            </div>
                            <div class="sl-filter-section">
                                <div class="sl-filter-head">Urutkan Berdasarkan Kunjungan</div>
                                <div class="sl-filter-item" id="flt-view-most" onclick="setSort('views','desc')">
                                    <i class="bi bi-graph-up-arrow"></i> Terbanyak
                                    <i class="bi bi-check2 check"></i>
                                </div>
                                <div class="sl-filter-item" id="flt-view-least" onclick="setSort('views','asc')">
                                    <i class="bi bi-graph-down-arrow"></i> Tersedikit
                                    <i class="bi bi-check2 check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Sort badge --}}
                <div style="padding:8px 16px 6px; display:flex; align-items:center; gap:8px;">
                    <span class="sl-sort-badge" id="slSortBadge">
                        <i class="bi bi-funnel-fill"></i>
                        <span id="slSortLabel"></span>
                        <button onclick="clearSort()" title="Hapus filter"><i class="bi bi-x"></i></button>
                    </span>
                </div>

                <ul class="sl-list" id="tableBody"></ul>
                <div class="sl-search-empty" id="slSearchEmpty" style="display:none;">
                    <i class="bi bi-search"></i>
                    Tidak ada shortlink yang cocok dengan "<span id="slSearchQuery"></span>"
                </div>

                {{-- PAGINATION --}}
                <div class="sl-pagination" id="paginationEl" style="display:none!important;"></div>
            </div>

        </div>
    </div>
</div>

{{-- =====================================================
     FLOATING SETTING PANEL
===================================================== --}}
<div class="fp-backdrop" id="fpBackdrop" onclick="closePanel()"></div>

<div class="fp-panel" id="fpPanel" role="dialog" aria-modal="true" aria-label="Pengaturan ShortLink">

    {{-- ══ KIRI: Area konten ══ --}}
    <div class="fp-content">

        {{-- PAGE: Detail --}}
        <div class="fp-page is-active" id="fp-page-info">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-info"><i class="bi bi-info-circle-fill"></i></div>
                <div>
                    <p class="fp-page-title">Detail ShortLink</p>
                    <p class="fp-page-desc">Informasi lengkap shortlink ini</p>
                </div>
            </div>
            <div class="fp-content-body" style="overflow-y:auto;">

                {{-- QR + info singkat --}}
                <div class="qr-panel-wrap">
                    <div class="qr-canvas-box" id="qrPanelBox"></div>
                    <div class="qr-panel-info">
                        <p style="font-size:0.68rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--md-text-disabled);margin:0 0 4px;">QR Code</p>
                        <p class="qr-url-label" id="qrPanelLabel">—</p>
                        <button class="btn-qr-dl" onclick="downloadQr()">
                            <i class="bi bi-download"></i> Unduh PNG
                        </button>
                    </div>
                </div>

                {{-- Judul & Deskripsi (tampil hanya jika ada) --}}
                <div class="fp-info-row" id="infoJudulRow" style="display:none;">
                    <i class="bi bi-tag"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">Judul</div>
                        <div class="fp-info-value" id="infoJudul">—</div>
                    </div>
                </div>
                <div class="fp-info-row" id="infoDeskripsRow" style="display:none;">
                    <i class="bi bi-card-text"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">Deskripsi</div>
                        <div class="fp-info-value" id="infoDeskripsi" style="white-space:pre-wrap;line-height:1.6;">—</div>
                    </div>
                </div>

                {{-- Info rows --}}
                <div class="fp-info-row">
                    <i class="bi bi-link-45deg"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">ShortLink</div>
                        <div class="fp-info-value"><a id="infoShortUrl" href="#" target="_blank">—</a></div>
                    </div>
                </div>
                <div class="fp-info-row">
                    <i class="bi bi-globe2"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">URL Tujuan</div>
                        <div class="fp-info-value" id="infoOrigUrl">—</div>
                    </div>
                </div>
                <div class="fp-info-row">
                    <i class="bi bi-hash"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">Kode Pendek</div>
                        <div class="fp-info-value" id="infoCode" style="word-break:break-all;">—</div>
                    </div>
                </div>
                <div class="fp-info-row">
                    <i class="bi bi-calendar3"></i>
                    <div style="min-width:0;">
                        <div class="fp-info-label">Dibuat</div>
                        <div class="fp-info-value" id="infoCreatedAt">—</div>
                    </div>
                </div>

                {{-- Statistik kunjungan --}}
                <div class="fp-section-label">Kunjungan</div>
                <div class="fp-stat-grid-3">
                    <div class="fp-stat-box fp-stat-box-link">
                        <div class="stat-num" id="infoVisitsLink">0</div>
                        <div class="stat-lbl"><i class="bi bi-link-45deg"></i> Via Link</div>
                    </div>
                    <div class="fp-stat-box fp-stat-box-qr">
                        <div class="stat-num" id="infoVisitsQr">0</div>
                        <div class="stat-lbl"><i class="bi bi-qr-code-scan"></i> Via QR</div>
                    </div>
                    <div class="fp-stat-box fp-stat-box-total">
                        <div class="stat-num" id="infoVisits">0</div>
                        <div class="stat-lbl"><i class="bi bi-bar-chart-fill"></i> Total</div>
                    </div>
                    <div class="fp-stat-box fp-stat-box-unique">
                        <div class="stat-num" id="infoUnique">0</div>
                        <div class="stat-lbl"><i class="bi bi-people-fill"></i> Unique</div>
                    </div>
                </div>

            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel" onclick="closePanel()">Tutup</button>
            </div>
        </div>

        {{-- PAGE: Edit --}}
        <div class="fp-page" id="fp-page-edit">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-edit"><i class="bi bi-pencil-square"></i></div>
                <div>
                    <p class="fp-page-title">Edit ShortLink</p>
                    <p class="fp-page-desc">Ubah kode pendek sesuai keinginan</p>
                </div>
            </div>
            <div class="fp-content-body" style="overflow-y:auto;">
                <div class="fp-info-row" style="margin-bottom:16px;">
                    <i class="bi bi-globe2"></i>
                    <div>
                        <div class="fp-info-label">URL Tujuan (tidak dapat diubah)</div>
                        <div class="fp-info-value" id="editOrigUrl">—</div>
                    </div>
                </div>
                <div class="fp-form-group">
                    <label class="fp-form-label" for="editShortCode">Kode ShortLink</label>
                    <div class="fp-input-group">
                        <span class="fp-input-prefix">{{ url('/') }}/</span>
                        <input type="text" class="fp-input" id="editShortCode"
                               placeholder="contoh: promo2026" autocomplete="off" spellcheck="false">
                    </div>
                    <p class="fp-hint"><i class="bi bi-info-circle me-1"></i>Hanya huruf, angka, - dan _</p>
                    <p class="fp-error" id="editError">
                        <i class="bi bi-exclamation-circle me-1"></i><span id="editErrText"></span>
                    </p>
                </div>
                <div class="fp-section-label">Identitas (opsional)</div>
                <div class="fp-form-group">
                    <label class="fp-form-label" for="editJudul">Judul</label>
                    <input type="text" class="fp-input-standalone" id="editJudul"
                           placeholder="Nama singkat shortlink ini" maxlength="100" autocomplete="off">
                </div>
                <div class="fp-form-group">
                    <label class="fp-form-label" for="editDeskripsi">Deskripsi</label>
                    <textarea class="fp-textarea" id="editDeskripsi"
                              placeholder="Keterangan singkat..." maxlength="500"></textarea>
                </div>
                <div class="qr-edit-preview" id="qrEditPreview">
                    <div class="qr-edit-box" id="qrEditBox"></div>
                    <div class="qr-edit-desc">
                        <strong>Preview QR Code</strong>
                        <small id="qrEditLabel">QR akan terupdate saat kode diubah</small>
                    </div>
                </div>
            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel" onclick="closePanel()">Batal</button>
                <button class="fp-btn fp-btn-save" id="btnSaveEdit" onclick="submitEdit()">
                    <span class="fp-spinner" id="editSpinner"></span>
                    <i class="bi bi-check-lg" id="editBtnIcon"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>

        {{-- PAGE: Hapus --}}
        <div class="fp-page" id="fp-page-delete">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-delete"><i class="bi bi-trash3-fill"></i></div>
                <div>
                    <p class="fp-page-title">Hapus ShortLink</p>
                    <p class="fp-page-desc">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>
            <div class="fp-content-body">
                <div class="fp-info-row" style="margin-bottom:10px;">
                    <i class="bi bi-link-45deg"></i>
                    <div>
                        <div class="fp-info-label">ShortLink</div>
                        <div class="fp-info-value" id="deleteShortUrl" style="color:var(--sl-short-cl);">—</div>
                    </div>
                </div>
                <div class="fp-info-row" style="margin-bottom:18px;">
                    <i class="bi bi-globe2"></i>
                    <div>
                        <div class="fp-info-label">URL Tujuan</div>
                        <div class="fp-info-value" id="deleteOrigUrl">—</div>
                    </div>
                </div>
                <div class="fp-warn">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <p><strong>Perhatian!</strong> Shortlink ini akan dihapus secara permanen beserta seluruh data kunjungannya dan tidak dapat dipulihkan.</p>
                </div>
                <label class="fp-confirm-check">
                    <input type="checkbox" id="delCheck" onchange="toggleDelBtn()">
                    <span>Saya mengerti dan ingin menghapus shortlink ini</span>
                </label>
            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel" onclick="closePanel()">Batal</button>
                <button class="fp-btn fp-btn-delete" id="btnDelete" onclick="submitDelete()" disabled>
                    <span class="fp-spinner" id="deleteSpinner"></span>
                    <i class="bi bi-trash3" id="deleteBtnIcon"></i>
                    Hapus Sekarang
                </button>
            </div>
        </div>

        {{-- PAGE: Statistik --}}
        <div class="fp-page" id="fp-page-stat">
            <div class="fp-content-head">
                <div class="fp-page-icon icon-stat"><i class="bi bi-graph-up"></i></div>
                <div>
                    <p class="fp-page-title">Statistik Kunjungan</p>
                    <p class="fp-page-desc">Grafik kunjungan shortlink ini</p>
                </div>
            </div>
            <div class="fp-content-body" style="overflow-y:auto;display:flex;flex-direction:column;gap:12px;">
                <div class="sl-range-group">
                    <button class="sl-range-btn active" data-r="day"    onclick="setSlRange(this)">Hari ini</button>
                    <button class="sl-range-btn"        data-r="week"   onclick="setSlRange(this)">Minggu</button>
                    <button class="sl-range-btn"        data-r="month"  onclick="setSlRange(this)">Bulan</button>
                    <button class="sl-range-btn"        data-r="3month" onclick="setSlRange(this)">3 Bulan</button>
                </div>
                <div class="sl-stat-summary">
                    <div class="sl-stat-mini">
                        <span class="sl-stat-mini-val" style="color:var(--sl-stat-val-total-cl);" id="slStatTotal">—</span>
                        <span class="sl-stat-mini-lbl">Total</span>
                    </div>
                    <div class="sl-stat-mini">
                        <span class="sl-stat-mini-val" style="color:var(--sl-stat-val-link-cl);" id="slStatLink">—</span>
                        <span class="sl-stat-mini-lbl"><i class="bi bi-link-45deg"></i> Link</span>
                    </div>
                    <div class="sl-stat-mini">
                        <span class="sl-stat-mini-val" style="color:var(--sl-stat-val-qr-cl);" id="slStatQr">—</span>
                        <span class="sl-stat-mini-lbl"><i class="bi bi-qr-code-scan"></i> QR</span>
                    </div>
                    <div class="sl-stat-mini">
                        <span class="sl-stat-mini-val" style="color:var(--sl-stat-val-unique-cl);" id="slStatUnique">—</span>
                        <span class="sl-stat-mini-lbl"><i class="bi bi-people-fill"></i> Unique</span>
                    </div>
                </div>
                <div style="position:relative;flex:1;min-height:150px;">
                    <canvas id="slChart"></canvas>
                    <div id="slChartLoading" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:var(--md-bg-card);">
                        <div style="width:24px;height:24px;border:2px solid var(--inline-spin-bd);border-top-color:var(--inline-spin-top);border-radius:50%;animation:spin 0.8s linear infinite;"></div>
                    </div>
                </div>
                <div style="display:flex;gap:14px;font-size:0.75rem;color:var(--md-text-secondary);">
                    <span style="display:flex;align-items:center;gap:5px;"><span style="width:8px;height:8px;border-radius:2px;background:#9ab3d9;display:inline-block;flex-shrink:0;"></span>Via Link</span>
                    <span style="display:flex;align-items:center;gap:5px;"><span style="width:8px;height:8px;border-radius:2px;background:#8bc99f;display:inline-block;flex-shrink:0;"></span>Via QR</span>
                    <span style="display:flex;align-items:center;gap:5px;"><span style="width:8px;height:8px;border-radius:2px;background:#c9a3e8;display:inline-block;flex-shrink:0;"></span>Unique</span>
                </div>
            </div>
            <div class="fp-content-footer">
                <button class="fp-btn fp-btn-cancel" onclick="closePanel()">Tutup</button>
            </div>
        </div>

    </div>{{-- /.fp-content --}}

    {{-- ══ KANAN: Sidebar menu navigasi ══ --}}
    <div class="fp-sidebar">
        <div class="fp-sidebar-head">
            <button class="fp-close-btn" onclick="closePanel()" title="Tutup">
                <i class="bi bi-x-lg"></i>
            </button>
            <div class="fp-sidebar-eyebrow">ShortLink</div>
            <div class="fp-sidebar-short" id="sbShort">—</div>
            <div class="fp-sidebar-orig"  id="sbOrig">—</div>
        </div>

        <div class="fp-nav">
            <div class="fp-nav-section">Informasi</div>
            <button class="fp-nav-item is-active" id="nav-info" onclick="goPage('info')">
                <div class="fp-nav-icon"><i class="bi bi-info-circle"></i></div>
                Detail
            </button>
            <button class="fp-nav-item" id="nav-stat" onclick="goPage('stat')">
                <div class="fp-nav-icon"><i class="bi bi-graph-up"></i></div>
                Statistik
            </button>
            <div class="fp-nav-divider"></div>
            <div class="fp-nav-section">Kelola</div>
            <button class="fp-nav-item" id="nav-edit" onclick="goPage('edit')">
                <div class="fp-nav-icon"><i class="bi bi-pencil-square"></i></div>
                Edit ShortLink
            </button>
            <button class="fp-nav-item is-delete" id="nav-delete" onclick="goPage('delete')">
                <div class="fp-nav-icon"><i class="bi bi-trash3"></i></div>
                Hapus
            </button>
        </div>
    </div>{{-- /.fp-sidebar --}}

</div>{{-- /.fp-panel --}}

{{-- Toast --}}
<div class="md-toast" id="toastEl">
    <i class="bi" id="toastIcon"></i>
    <span id="toastMsg"></span>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

@endsection

@push('scripts')
<script>
// ═══════════════════════════════════════════════
// STATE
// ═══════════════════════════════════════════════
let _id          = null;
let _short       = null;
let _code        = null;
let _orig        = null;
let _visits         = 0;
let _visitsLink     = 0;
let _visitsQr       = 0;
let _uniqueVisitors = 0;
let _date        = '';
let _gear        = null;
let _page        = 'info';
let _judul       = '';
let _deskripsi   = '';

// Pagination state
const PER_PAGE   = 5;
let _allData     = [];
let _curPage     = 1;

// ═══════════════════════════════════════════════
// INIT
// ═══════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', () => {
    loadShortLinks();
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closePanel(); });
    document.getElementById('editShortCode').addEventListener('keydown', e => {
        if (e.key === 'Enter') submitEdit();
    });
    document.getElementById('editShortCode').addEventListener('input', e => {
        const val = e.target.value.trim();
        if (/^[a-zA-Z0-9\-_]+$/.test(val) || val === '') updateEditQR(val);
    });
});

// ═══════════════════════════════════════════════
// PANEL OPEN / CLOSE
// ═══════════════════════════════════════════════
function openPanel(id, short, code, orig, visits, visitsLink, visitsQr, uniqueVisitors, date, judul, deskripsi, gearBtn) {
    if (_gear && _gear !== gearBtn) _gear.classList.remove('active');
    _gear = gearBtn;
    gearBtn.classList.add('active');

    _id         = id;
    _short      = short;
    _code       = code;
    _orig       = orig;
    _visits          = visits;
    _visitsLink      = visitsLink;
    _visitsQr        = visitsQr;
    _uniqueVisitors  = uniqueVisitors || 0;
    _date       = date;
    _judul      = judul || '';
    _deskripsi  = deskripsi || '';
    // Reset chart stat agar tidak tampilkan data shortlink lain
    _slRendered = false;
    if (_slChart) { _slChart.destroy(); _slChart = null; }

    document.getElementById('sbShort').textContent = short;
    document.getElementById('sbOrig').textContent  = orig;

    goPage('info');

    document.getElementById('fpBackdrop').classList.add('show');
    document.getElementById('fpPanel').classList.add('show');
}

function closePanel() {
    document.getElementById('fpPanel').classList.remove('show');
    document.getElementById('fpBackdrop').classList.remove('show');
    if (_gear) { _gear.classList.remove('active'); _gear = null; }
    const cb = document.getElementById('delCheck');
    if (cb) { cb.checked = false; toggleDelBtn(); }
}

// ═══════════════════════════════════════════════
// NAVIGASI HALAMAN PANEL
// ═══════════════════════════════════════════════
function goPage(name) {
    _page = name;
    document.querySelectorAll('.fp-page').forEach(p => p.classList.remove('is-active'));
    document.querySelectorAll('.fp-nav-item').forEach(n => n.classList.remove('is-active'));
    const pg  = document.getElementById('fp-page-' + name);
    const nav = document.getElementById('nav-' + name);
    if (pg)  pg.classList.add('is-active');
    if (nav) nav.classList.add('is-active');
    if (name === 'info')   fillInfo();
    if (name === 'edit')   fillEdit();
    if (name === 'delete') fillDelete();
    if (name === 'stat')   fillStat();
}

function fillInfo() {
    const a = document.getElementById('infoShortUrl');
    a.href        = _short;
    a.textContent = _short;
    document.getElementById('infoOrigUrl').textContent    = _orig;
    document.getElementById('infoCreatedAt').textContent  = _date;
    document.getElementById('infoVisitsLink').textContent = _visitsLink;
    document.getElementById('infoVisitsQr').textContent   = _visitsQr;
    document.getElementById('infoVisits').textContent     = _visits;
    document.getElementById('infoUnique').textContent     = _uniqueVisitors;
    document.getElementById('infoCode').textContent       = _code;

    // Judul
    const judulRow = document.getElementById('infoJudulRow');
    if (_judul) {
        document.getElementById('infoJudul').textContent = _judul;
        judulRow.style.display = '';
    } else {
        judulRow.style.display = 'none';
    }

    // Deskripsi
    const deskRow = document.getElementById('infoDeskripsRow');
    if (_deskripsi) {
        document.getElementById('infoDeskripsi').textContent = _deskripsi;
        deskRow.style.display = '';
    } else {
        deskRow.style.display = 'none';
    }

    setTimeout(() => fillInfoQR(_short), 30);
}

function fillEdit() {
    document.getElementById('editOrigUrl').textContent  = _orig;
    document.getElementById('editShortCode').value      = _code;
    document.getElementById('editJudul').value          = _judul;
    document.getElementById('editDeskripsi').value      = _deskripsi;
    document.getElementById('editError').style.display  = 'none';
    setTimeout(() => {
        document.getElementById('editShortCode').focus();
        updateEditQR(_code);
    }, 180);
}

function fillDelete() {
    document.getElementById('deleteShortUrl').textContent = _short;
    document.getElementById('deleteOrigUrl').textContent  = _orig;
    const cb = document.getElementById('delCheck');
    cb.checked = false;
    toggleDelBtn();
}

// ═══════════════════════════════════════════════
// STATISTIK PER SHORTLINK
// ═══════════════════════════════════════════════
let _slChart    = null;
let _slRange    = 'day';
let _slRendered = false;

function cssVar(n) { return getComputedStyle(document.documentElement).getPropertyValue(n).trim(); }

function fillStat() {
    if (!_slRendered) {
        const ctx = document.getElementById('slChart').getContext('2d');
        Chart.defaults.color       = cssVar('--chart-text-cl');
        Chart.defaults.borderColor = cssVar('--chart-grid-cl');
        Chart.defaults.font.family = "'Inter',sans-serif";
        _slChart = new Chart(ctx, {
            type: 'bar',
            data: { labels: [], datasets: [] },
            options: {
                responsive: true, maintainAspectRatio: false,
                animation: { duration: 400 },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor:  cssVar('--chart-tooltip-bg'),
                        borderColor:      cssVar('--chart-tooltip-bd'),
                        borderWidth:      1,
                        titleColor:       cssVar('--chart-tooltip-title'),
                        bodyColor:        cssVar('--chart-tooltip-body'),
                        callbacks: { label: c => ` ${c.dataset.label}: ${c.parsed.y}` }
                    }
                },
                scales: {
                    x: { grid:{color:cssVar('--chart-grid-cl')}, ticks:{font:{size:10},maxTicksLimit:10,maxRotation:45,color:cssVar('--chart-text-cl')} },
                    y: { beginAtZero:true, grid:{color:cssVar('--chart-grid-cl')}, ticks:{font:{size:10},stepSize:1,color:cssVar('--chart-text-cl'),callback:v=>Number.isInteger(v)?v:null} }
                }
            }
        });
        _slRendered = true;

        // Re-init chart when theme toggles
        const obs = new MutationObserver(() => {
            if (_slChart) {
                _slChart.destroy(); _slChart = null; _slRendered = false;
                fillStat();
            }
        });
        obs.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });
    }
    loadSlChart();
}

function setSlRange(btn) {
    _slRange = btn.dataset.r;
    document.querySelectorAll('.sl-range-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    loadSlChart();
}

async function loadSlChart() {
    if (!_id) return;
    document.getElementById('slChartLoading').style.display = 'flex';
    let npp = '';
    try { npp = JSON.parse(localStorage.getItem('auth_response')).data.user.npp; } catch(e) {}
    try {
        const res  = await apiFetch(`/api/statistik?npp=${encodeURIComponent(npp)}&range=${_slRange}&shortlink_id=${_id}`);
        const data = await res.json();
        if (data.status !== 'success') throw new Error();
        const tl = data.visits_link.reduce((a,b)=>a+b,0);
        const tq = data.visits_qr.reduce((a,b)=>a+b,0);
        const tu = data.summary_unique || 0;
        document.getElementById('slStatTotal').textContent  = tl + tq;
        document.getElementById('slStatLink').textContent   = tl;
        document.getElementById('slStatQr').textContent     = tq;
        document.getElementById('slStatUnique').textContent = tu;
        _slChart.data.labels   = data.labels;
        _slChart.data.datasets = [
            { label:'Via Link',       data:data.visits_link,        backgroundColor:cssVar('--sl-chart-link-bg'),   borderColor:cssVar('--sl-chart-link-bd'),   borderWidth:1, borderRadius:3 },
            { label:'Via QR',         data:data.visits_qr,          backgroundColor:cssVar('--sl-chart-qr-bg'),     borderColor:cssVar('--sl-chart-qr-bd'),     borderWidth:1, borderRadius:3 },
            { label:'Unique Visitor', data:data.unique_visitors||[], backgroundColor:cssVar('--sl-chart-unique-bg'), borderColor:cssVar('--sl-chart-unique-bd'), borderWidth:1, borderRadius:3 }
        ];
        _slChart.update();
    } catch(e) {
        console.error('Gagal load stat:', e);
    } finally {
        document.getElementById('slChartLoading').style.display = 'none';
    }
}

function copyText(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const i = btn.querySelector('i');
        i.className = 'bi bi-check2';
        showToast('success', 'Link disalin!');
        setTimeout(() => { i.className = 'bi bi-clipboard'; }, 2000);
    });
}

function toggleDelBtn() {
    document.getElementById('btnDelete').disabled = !document.getElementById('delCheck').checked;
}

// ═══════════════════════════════════════════════
// QR CODE ENGINE
// ═══════════════════════════════════════════════
function makeQR(url, container, size) {
    container.innerHTML = '';
    return new QRCode(container, {
        text:         url,
        width:        size,
        height:       size,
        colorDark:    '#000000',
        colorLight:   '#ffffff',
        correctLevel: QRCode.CorrectLevel.M,
    });
}

function generateTableQRs(data) {
    data.forEach(item => {
        const wrap = document.getElementById('qr-mini-' + item.id);
        if (!wrap) return;
        makeQR(item.short_url + '/qr', wrap, 64);
    });
}

function fillInfoQR(short) {
    const box = document.getElementById('qrPanelBox');
    if (!box) return;
    makeQR(short + '/qr', box, 160);
    document.getElementById('qrPanelLabel').textContent = short + '/qr';
}

let _qrEditTimer = null;
function updateEditQR(code) {
    clearTimeout(_qrEditTimer);
    _qrEditTimer = setTimeout(() => {
        const box = document.getElementById('qrEditBox');
        if (!box) return;
        if (!code) { box.innerHTML = ''; return; }
        const baseUrl = document.querySelector('#editShortCode')
            .closest('.fp-form-group')
            .querySelector('.fp-input-prefix').textContent.replace(/\/$/, '');
        const qrTarget = baseUrl + '/' + code + '/qr';
        makeQR(qrTarget, box, 80);
        document.getElementById('qrEditLabel').textContent = qrTarget;
    }, 300);
}

function downloadQr() {
    const box = document.getElementById('qrPanelBox');
    if (!box) return;
    const canvas = box.querySelector('canvas');
    const img    = box.querySelector('img');
    if (canvas) {
        const a = document.createElement('a');
        a.href     = canvas.toDataURL('image/png');
        a.download = 'qrcode-' + (_code || 'shortlink') + '.png';
        a.click();
    } else if (img) {
        const a = document.createElement('a');
        a.href     = img.src;
        a.download = 'qrcode-' + (_code || 'shortlink') + '.png';
        a.click();
    }
}

// ═══════════════════════════════════════════════
// LOAD & RENDER TABLE
// ═══════════════════════════════════════════════
async function loadShortLinks() {
    const loading = document.getElementById('loadingState');
    const empty   = document.getElementById('emptyState');
    const tableEl = document.getElementById('tableContainer');
    const totalEl = document.getElementById('totalLinks');

    try {
        const npp    = JSON.parse(localStorage.getItem('auth_response')).data.user.npp;
        const resp   = await apiFetch(`/api/data-shortlinks?npp=${encodeURIComponent(npp)}`);
        const result = await resp.json();

        loading.classList.add('d-none');

        if (result.status === 'success' && result.data.length > 0) {
            _allData = result.data;
            _curPage = 1;
            tableEl.classList.remove('d-none');
            totalEl.textContent = `${_allData.length} Link`;
            renderPage(_curPage);
        } else {
            empty.classList.remove('d-none');
            totalEl.textContent = '0 Link';
        }
    } catch (e) {
        loading.classList.add('d-none');
        document.getElementById('emptyState').innerHTML = `
            <div class="md-error text-center mx-4">
                <i class="bi bi-exclamation-triangle" style="font-size:3rem;"></i>
                <p class="mt-3 fw-medium">Gagal memuat data. Silakan refresh.</p>
            </div>`;
        document.getElementById('emptyState').classList.remove('d-none');
    }
}



// ═══════════════════════════════════════════════
// BUAT SHORTLINK BARU
// ═══════════════════════════════════════════════
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
    document.getElementById('btnCreate').disabled              = on;
    document.getElementById('createSpinner').style.display    = on ? 'block' : 'none';
    document.getElementById('createBtnIcon').style.display    = on ? 'none'  : '';
}

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

    let npp = '';
    try { npp = JSON.parse(localStorage.getItem('auth_response')).data.user.npp; } catch(e) {}
    if (!npp) { showCreateErr('Sesi tidak ditemukan. Silakan login ulang.'); return; }

    setCreateLoad(true);
    try {
        const tok  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const resp = await apiFetch('/api/shortlinks', {
            method: 'POST',
            headers: {'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':tok},
            body: JSON.stringify({ original_url: url, short_url: code||null, judul: judul||null, deskripsi: deskripsi||null, npp }),
        });
        const res = await resp.json();

        if (res.status === 'success') {
            // Tambah ke _allData dan re-render
            _allData.unshift(res.data);
            document.getElementById('totalLinks').textContent = `${_allData.length} Link`;
            _curPage = 1;
            applySearchAndRender();
            // Reset & tutup form
            resetCreateForm();
            const body = document.getElementById('createBody');
            body.classList.remove('open');
            document.getElementById('createToggle').classList.remove('open');
            document.getElementById('createHeader').classList.remove('open');
            showToast('success', 'ShortLink berhasil dibuat!');
            // Generate QR untuk baris baru
            setTimeout(() => generateTableQRs([res.data]), 200);
        } else {
            showCreateErr(res.message || 'Gagal membuat shortlink.');
        }
    } catch(e) {
        showCreateErr('Terjadi kesalahan. Coba lagi.');
    } finally {
        setCreateLoad(false);
    }
}

// ═══════════════════════════════════════════════
// SEARCH
// ═══════════════════════════════════════════════
let _searchQuery = '';
let _sortKey     = '';   // 'date' | 'views'
let _sortDir     = '';   // 'asc'  | 'desc'

function toggleFilter() {
    const dd  = document.getElementById('slFilterDropdown');
    const btn = document.getElementById('slFilterBtn');
    const show = !dd.classList.contains('show');
    dd.classList.toggle('show', show);
    btn.classList.toggle('active', show);
}

function setSort(key, dir) {
    _sortKey = key;
    _sortDir = dir;
    _curPage = 1;

    // Update selected state
    ['flt-date-new','flt-date-old','flt-view-most','flt-view-least'].forEach(id => {
        document.getElementById(id)?.classList.remove('selected');
    });
    const map = { 'date-desc':'flt-date-new','date-asc':'flt-date-old','views-desc':'flt-view-most','views-asc':'flt-view-least' };
    document.getElementById(map[key+'-'+dir])?.classList.add('selected');

    // Badge
    const labels = { 'date-desc':'Terbaru','date-asc':'Terlama','views-desc':'View Terbanyak','views-asc':'View Tersedikit' };
    const badge  = document.getElementById('slSortBadge');
    document.getElementById('slSortLabel').textContent = labels[key+'-'+dir] || '';
    badge.classList.add('show');

    // Filter button active
    document.getElementById('slFilterBtn').classList.add('active');

    // Tutup dropdown
    document.getElementById('slFilterDropdown').classList.remove('show');

    applySearchAndRender();
}

function clearSort() {
    _sortKey = ''; _sortDir = '';
    ['flt-date-new','flt-date-old','flt-view-most','flt-view-least'].forEach(id => {
        document.getElementById(id)?.classList.remove('selected');
    });
    document.getElementById('slSortBadge').classList.remove('show');
    document.getElementById('slFilterBtn').classList.remove('active');
    _curPage = 1;
    applySearchAndRender();
}

// Tutup filter dropdown saat klik di luar
document.addEventListener('click', function(e) {
    const dd  = document.getElementById('slFilterDropdown');
    const btn = document.getElementById('slFilterBtn');
    if (dd && !dd.contains(e.target) && btn && !btn.contains(e.target)) {
        dd.classList.remove('show');
        if (!_sortKey) btn.classList.remove('active');
    }
});

function onSearch(val) {
    _searchQuery = val.trim().toLowerCase();
    const clearBtn = document.getElementById('slSearchClear');
    if (clearBtn) clearBtn.classList.toggle('visible', _searchQuery.length > 0);
    _curPage = 1;
    applySearchAndRender();
}

function clearSearch() {
    _searchQuery = '';
    const input = document.getElementById('slSearchInput');
    if (input) input.value = '';
    const clearBtn = document.getElementById('slSearchClear');
    if (clearBtn) clearBtn.classList.remove('visible');
    _curPage = 1;
    applySearchAndRender();
}

function applySearchAndRender() {
    let filtered = _searchQuery
        ? _allData.filter(item => {
            const judul = (item.judul || '').toLowerCase();
            const code  = (item.short_code || '').toLowerCase();
            return judul.includes(_searchQuery) || code.includes(_searchQuery);
        })
        : [..._allData];

    // Sort
    if (_sortKey === 'date') {
        // Format dari API: d/m/Y H:i → perlu dikonversi ke Date
        const parseDate = (str) => {
            if (!str) return 0;
            // coba parse langsung dulu (ISO format)
            const direct = new Date(str);
            if (!isNaN(direct)) return direct;
            // parse d/m/Y H:i
            const m = str.match(/^(\d{2})\/(\d{2})\/(\d{4})\s(\d{2}):(\d{2})/);
            if (m) return new Date(`${m[3]}-${m[2]}-${m[1]}T${m[4]}:${m[5]}:00`);
            return 0;
        };
        filtered.sort((a, b) => {
            const da = parseDate(a.created_at);
            const db = parseDate(b.created_at);
            return _sortDir === 'asc' ? da - db : db - da;
        });
    } else if (_sortKey === 'views') {
        filtered.sort((a, b) => _sortDir === 'asc'
            ? (a.visits || 0) - (b.visits || 0)
            : (b.visits || 0) - (a.visits || 0)
        );
    }

    const empty = document.getElementById('slSearchEmpty');
    const body  = document.getElementById('tableBody');
    const pgEl  = document.getElementById('paginationEl');

    if (_searchQuery && filtered.length === 0) {
        body.innerHTML = '';
        pgEl.style.setProperty('display', 'none', 'important');
        document.getElementById('slSearchQuery').textContent = _searchQuery;
        if (empty) empty.style.display = '';
        return;
    }

    if (empty) empty.style.display = 'none';

    const totalPages = Math.ceil(filtered.length / PER_PAGE);
    _curPage = Math.max(1, Math.min(_curPage, totalPages || 1));
    const start = (_curPage - 1) * PER_PAGE;
    const slice = filtered.slice(start, start + PER_PAGE);

    renderTable(slice);
    renderPagination(totalPages, filtered);
    setTimeout(() => generateTableQRs(slice), 50);
}

// ── Render satu halaman ──
function renderPage(page) {
    _curPage = page;
    applySearchAndRender();
}

function renderTable(data) {
    document.getElementById('tableBody').innerHTML = data.map(item => `
        <li class="sl-item" id="row-${item.id}">
            <div class="sl-qr" id="qr-mini-${item.id}"></div>
            <div class="sl-info">
                ${item.judul
                    ? '<div class="sl-judul">' + esc(item.judul) + '</div>'
                    : '<div class="sl-title">' + esc(trunc((item.original_url||'').replace(/^https?:\/\//, '').split('/')[0], 40)) + '</div>'
                }
                <div class="sl-short">
                    <a href="${esc(item.short_url)}" target="_blank">${esc(item.short_url)}</a>
                    <button class="sl-copy-btn" onclick="copyText('${esc(item.short_url)}',this)" title="Salin">
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
                        <strong>${item.visits}</strong>&nbsp;total
                    </div>
                    <div class="sl-visits-detail">
                        <span title="Via Link"><i class="bi bi-link-45deg"></i>${item.visits_link}</span>
                        <span title="Via QR"><i class="bi bi-qr-code-scan"></i>${item.visits_qr}</span>
                    </div>
                </div>
                <button class="btn-gear"
                    onclick="openPanel(${item.id},'${esc(item.short_url)}','${esc(item.short_code)}','${esc(item.original_url)}',${item.visits},${item.visits_link},${item.visits_qr},${item.unique_visitors||0},'${esc(item.created_at)}','${esc(item.judul||'')}','${esc(item.deskripsi||'')}',this)"
                    title="Pengaturan">
                    <i class="bi bi-gear-fill gear-icon"></i>
                </button>
            </div>
        </li>
    `).join('');
}

// ── Render pagination sesuai referensi gambar ──
// Layout: [<] [1] [2] [3] [>] | [#][input][>]
function renderPagination(totalPages) {
    const el = document.getElementById('paginationEl');

    if (totalPages <= 1) {
        el.style.setProperty('display', 'none', 'important');
        return;
    }

    el.style.removeProperty('display');

    // Buat tombol nomor halaman (max tampil 5 nomor di tengah)
    const pageButtons = buildPageNumbers(_curPage, totalPages);

    let html = '';

    // Tombol Prev
    html += `<button class="pg-btn" onclick="renderPage(${_curPage - 1})" ${_curPage === 1 ? 'disabled' : ''} title="Sebelumnya">
                <i class="bi bi-chevron-left"></i>
             </button>`;

    // Nomor halaman
    pageButtons.forEach(p => {
        if (p === '…') {
            html += `<span class="pg-btn" style="cursor:default;opacity:0.4;">…</span>`;
        } else {
            html += `<button class="pg-btn ${p === _curPage ? 'pg-active' : ''}" onclick="renderPage(${p})">${p}</button>`;
        }
    });

    // Tombol Next
    html += `<button class="pg-btn" onclick="renderPage(${_curPage + 1})" ${_curPage === totalPages ? 'disabled' : ''} title="Berikutnya">
                <i class="bi bi-chevron-right"></i>
             </button>`;

    // Divider + Jump-to-page (# tombol yang berubah jadi input saat diklik)
    html += `<div class="pg-divider"></div>`;
    html += `<div class="pg-jump-wrap" title="Klik # lalu ketik nomor halaman">
                <button class="pg-hash-btn" id="pgHashBtn" onclick="activateJump()" title="Lompat ke halaman">
                    #
                </button>
                <button class="pg-btn" id="pgJumpGo" onclick="jumpToPage(${totalPages})" title="Pergi" style="display:none;">
                    <i class="bi bi-chevron-right"></i>
                </button>
             </div>`;

    // Info halaman
    html += `<span class="pg-info">${_curPage} / ${totalPages}</span>`;

    el.innerHTML = html;
}

// Buat array nomor halaman dengan elipsis jika perlu
function buildPageNumbers(cur, total) {
    if (total <= 7) return Array.from({length: total}, (_, i) => i + 1);

    const pages = [];
    // Selalu tampilkan halaman 1
    pages.push(1);

    if (cur > 3) pages.push('…');

    // Halaman sekitar current
    const start = Math.max(2, cur - 1);
    const end   = Math.min(total - 1, cur + 1);
    for (let i = start; i <= end; i++) pages.push(i);

    if (cur < total - 2) pages.push('…');

    // Selalu tampilkan halaman terakhir
    pages.push(total);

    return pages;
}

// Aktifkan mode input di tombol #
function activateJump() {
    const btn = document.getElementById('pgHashBtn');
    const go  = document.getElementById('pgJumpGo');
    if (!btn) return;

    // Ubah tombol # jadi input inline
    btn.classList.add('is-input');
    btn.innerHTML = `<input type="number" class="pg-inline-input" id="pgJumpInput"
        min="1" placeholder="#" autocomplete="off"
        onblur="deactivateJump()"
        onkeydown="handleJumpKey(event, ${Math.ceil(_allData.length / PER_PAGE)})">`;
    if (go) go.style.display = '';

    const input = document.getElementById('pgJumpInput');
    if (input) {
        input.focus();
        input.addEventListener('input', () => {
            btn.style.width = Math.max(52, Math.min(72, input.value.length * 10 + 36)) + 'px';
        });
    }
}

// Kembali ke tampilan tombol # jika blur tanpa aksi
function deactivateJump() {
    // Delay agar klik tombol > sempat terpanggil dulu
    setTimeout(() => {
        const btn = document.getElementById('pgHashBtn');
        const go  = document.getElementById('pgJumpGo');
        if (!btn) return;
        btn.classList.remove('is-input');
        btn.style.width = '';
        btn.innerHTML = '#';
        if (go) go.style.display = 'none';
    }, 150);
}

function handleJumpKey(e, totalPages) {
    if (e.key === 'Enter') jumpToPage(totalPages);
    if (e.key === 'Escape') {
        const btn = document.getElementById('pgHashBtn');
        if (btn) btn.blur();
    }
}

function jumpToPage(totalPages) {
    const input = document.getElementById('pgJumpInput');
    if (!input) return;
    const val = parseInt(input.value);
    if (!isNaN(val) && val >= 1 && val <= totalPages) {
        renderPage(val);
    } else if (input.value !== '') {
        showToast('error', `Halaman harus antara 1 – ${totalPages}`);
        input.value = '';
        input.focus();
    }
}

// ═══════════════════════════════════════════════
// EDIT
// ═══════════════════════════════════════════════
async function submitEdit() {
    const code = document.getElementById('editShortCode').value.trim();
    document.getElementById('editError').style.display = 'none';

    if (!code)                            { showEditErr('Kode tidak boleh kosong.'); return; }
    if (!/^[a-zA-Z0-9\-_]+$/.test(code)) { showEditErr('Hanya huruf, angka, - dan _.'); return; }

    setEditLoad(true);
    try {
        const tok  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const judul     = document.getElementById('editJudul').value.trim();
        const deskripsi = document.getElementById('editDeskripsi').value.trim();
        const resp = await apiFetch(`/api/shortlinks/${_id}`, {
            method: 'PUT',
            headers: {'Content-Type':'application/json','Accept':'application/json','X-CSRF-TOKEN':tok},
            body: JSON.stringify({ short_url: code, judul, deskripsi }),
        });
        const res = await resp.json();

        if (res.status === 'success') {
            _short     = res.data.short_url;
            _code      = res.data.short_code;
            _judul     = res.data.judul     || '';
            _deskripsi = res.data.deskripsi || '';

            // Update state _allData juga agar sinkron
            const idx = _allData.findIndex(d => d.id === _id);
            if (idx !== -1) {
                _allData[idx].short_url  = _short;
                _allData[idx].short_code = _code;
                _allData[idx].judul      = _judul;
                _allData[idx].deskripsi  = _deskripsi;
            }
            // Update judul di baris tabel
            const row2 = document.getElementById(`row-${_id}`);
            if (row2) {
                const judulEl = row2.querySelector('.sl-judul');
                const titleEl = row2.querySelector('.sl-title');
                const deskEl  = row2.querySelector('.sl-deskripsi');
                if (_judul) {
                    if (judulEl) judulEl.textContent = _judul;
                    else if (titleEl) { titleEl.className = 'sl-judul'; titleEl.textContent = _judul; }
                } else {
                    if (judulEl) { judulEl.className = 'sl-title'; judulEl.textContent = _orig.replace(/^https?:\/\//, '').split('/')[0]; }
                }
                if (deskEl) deskEl.textContent = _deskripsi;
                else if (_deskripsi) {
                    const info = row2.querySelector('.sl-info');
                    const judulNode = info?.querySelector('.sl-judul,.sl-title');
                    if (judulNode) { const d = document.createElement('div'); d.className = 'sl-deskripsi'; d.textContent = _deskripsi; judulNode.after(d); }
                }
            }

            document.getElementById('sbShort').textContent = _short;
            updateTableRow(_id, _short, _code);

            showToast('success', 'ShortLink berhasil diperbarui!');
            goPage('info');
        } else {
            showEditErr(res.message || 'Gagal menyimpan.');
        }
    } catch (e) {
        showEditErr('Terjadi kesalahan. Coba lagi.');
    } finally {
        setEditLoad(false);
    }
}

function showEditErr(msg) {
    document.getElementById('editErrText').textContent = msg;
    document.getElementById('editError').style.display = 'block';
}
function setEditLoad(on) {
    document.getElementById('btnSaveEdit').disabled      = on;
    document.getElementById('editSpinner').style.display = on ? 'block' : 'none';
    document.getElementById('editBtnIcon').style.display = on ? 'none'  : '';
}

function updateTableRow(id, fullUrl, shortCode) {
    const row = document.getElementById(`row-${id}`);
    if (!row) return;

    const pill    = row.querySelector('.sl-short a');
    const copyBtn = row.querySelector('.sl-copy-btn');
    const gear    = row.querySelector('.btn-gear');

    if (pill)    { pill.textContent = fullUrl; pill.href = fullUrl; }
    if (copyBtn) copyBtn.setAttribute('onclick', `copyText('${esc(fullUrl)}',this)`);
    if (gear)    gear.setAttribute('onclick',
        `openPanel(${id},'${esc(fullUrl)}','${esc(shortCode)}','${esc(_orig)}',${_visits},${_visitsLink},${_visitsQr},${_uniqueVisitors},'${esc(_date)}','${esc(_judul)}','${esc(_deskripsi)}',this)`);

    const qrMini = document.getElementById('qr-mini-' + id);
    if (qrMini) makeQR(fullUrl + '/qr', qrMini, 64);
}

// ═══════════════════════════════════════════════
// DELETE
// ═══════════════════════════════════════════════
async function submitDelete() {
    setDeleteLoad(true);
    try {
        const tok  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const resp = await apiFetch(`/api/shortlinks/${_id}`, {
            method: 'DELETE',
            headers: {'Accept':'application/json','X-CSRF-TOKEN':tok},
        });
        const res = await resp.json();

        if (res.status === 'success') {
            closePanel();
            showToast('success', 'ShortLink berhasil dihapus.');
            removeTableRow(_id);
        } else {
            showToast('error', res.message || 'Gagal menghapus.');
        }
    } catch (e) {
        showToast('error', 'Terjadi kesalahan.');
    } finally {
        setDeleteLoad(false);
    }
}

function setDeleteLoad(on) {
    document.getElementById('btnDelete').disabled          = on;
    document.getElementById('deleteSpinner').style.display = on ? 'block' : 'none';
    document.getElementById('deleteBtnIcon').style.display = on ? 'none'  : '';
}

function removeTableRow(id) {
    // Hapus dari _allData
    _allData = _allData.filter(d => d.id !== id);

    // Update badge total
    document.getElementById('totalLinks').textContent = `${_allData.length} Link`;

    const totalPages = Math.ceil(_allData.length / PER_PAGE);

    if (_allData.length === 0) {
        document.getElementById('tableContainer').classList.add('d-none');
        document.getElementById('emptyState').classList.remove('d-none');
        return;
    }

    // Jika halaman saat ini melebihi totalPages baru, mundur satu
    if (_curPage > totalPages) _curPage = totalPages;

    renderPage(_curPage);
}

// ═══════════════════════════════════════════════
// TOAST
// ═══════════════════════════════════════════════
let _tt;
function showToast(type, msg) {
    const el = document.getElementById('toastEl');
    clearTimeout(_tt);
    el.className = `md-toast toast-${type}`;
    document.getElementById('toastIcon').className  = `bi ${type==='success'?'bi-check-circle-fill':'bi-exclamation-circle-fill'}`;
    document.getElementById('toastMsg').textContent = msg;
    void el.offsetWidth;
    el.classList.add('show');
    _tt = setTimeout(() => el.classList.remove('show'), 3500);
}

// ═══════════════════════════════════════════════
// UTILS
// ═══════════════════════════════════════════════
function trunc(s, n) { return s.length <= n ? s : s.slice(0,n) + '…'; }
function esc(s) {
    return String(s)
        .replace(/&/g,'&amp;').replace(/"/g,'&quot;')
        .replace(/'/g,'&#39;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}
</script>
@endpush
