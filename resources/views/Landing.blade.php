<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ShortLink — Portal Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ══════════════════════════════════
           DESIGN TOKENS — LIGHT MODE (default)
        ══════════════════════════════════ */
        :root {
            /* Surfaces */
            --md-bg-primary:       #e2ebe3;
            --md-bg-secondary:     #d5e2d6;
            --md-bg-elevated:      #c4d9c6;
            --md-bg-card:          #ecf4ed;
            /* Text */
            --md-text-primary:     #1b211b;
            --md-text-secondary:   #4a574a;
            --md-text-disabled:    #8a9888;
            /* Structural */
            --md-border:           rgba(0,0,0,0.09);
            --md-divider:          rgba(0,0,0,0.055);
            --hero-stat-border:    rgba(0,0,0,0.18);
            --hero-stat-divider:   rgba(0,0,0,0.15);
            --md-elevation-2:      0 2px 8px rgba(0,0,0,0.07);
            --md-elevation-4:      0 5px 16px rgba(0,0,0,0.11);
            --md-elevation-8:      0 10px 32px rgba(0,0,0,0.14);
            /* Green accent — darker for readability on light bg */
            --accent:              #1c6b3a;
            --accent-hover:        #135028;
            --accent-bg:           rgba(28,107,58,0.09);
            --accent-bg-btn:       rgba(28,107,58,0.11);
            --accent-bg-hover:     rgba(28,107,58,0.18);
            --accent-border:       rgba(28,107,58,0.28);
            --accent-border-btn:   rgba(28,107,58,0.38);
            --accent-border-hover: rgba(28,107,58,0.58);
            --accent-glow:         0 8px 24px rgba(28,107,58,0.13);
            /* Other accents — darkened for light mode */
            --accent-blue:         #2b5a8c;
            --accent-blue-bg:      rgba(43,90,140,0.09);
            --accent-blue-border:  rgba(43,90,140,0.26);
            --accent-amber:        #885b0e;
            --accent-amber-bg:     rgba(136,91,14,0.09);
            --accent-amber-border: rgba(136,91,14,0.26);
            --accent-red:          #892222;
            --accent-red-bg:       rgba(137,34,34,0.09);
            --accent-red-border:   rgba(137,34,34,0.26);
            --accent-purple:       #5a389a;
            --accent-purple-bg:    rgba(90,56,154,0.09);
            --accent-purple-border:rgba(90,56,154,0.26);
            --accent-teal:         #196b65;
            --accent-teal-bg:      rgba(25,107,101,0.09);
            --accent-teal-border:  rgba(25,107,101,0.26);
            /* Nav */
            --nav-bg:              rgba(226,235,227,0.88);
            --nav-bg-scrolled:     rgba(226,235,227,0.97);
            --nav-border:          rgba(0,0,0,0.09);
            --nav-shadow:          0 4px 24px rgba(0,0,0,0.09);
            --nav-link-hover-bg:   rgba(28,107,58,0.10);
            --nav-link-hover-bd:   rgba(28,107,58,0.28);
            /* Misc */
            --grid-line:           rgba(0,0,0,0.04);
            --card-hover-border:   rgba(0,0,0,0.14);
            --btn-sec-hover-bg:    rgba(0,0,0,0.04);
            --btn-sec-hover-bd:    rgba(0,0,0,0.14);
            --guest-form-bg:       rgba(236,244,237,0.95);
            --guest-form-border:   rgba(0,0,0,0.10);
            --guest-form-shadow:   0 8px 32px rgba(0,0,0,0.10);
            /* Hero highlight shimmer — deep vibrant for light bg */
            --hl-from:             #1a6b38;
            --hl-mid:              #0d6a8a;
            --hl-to:               #2244a0;
            /* Blobs */
            --blob-1:              rgba(107,155,122,0.11);
            --blob-2:              rgba(100,130,200,0.08);
            --blob-3:              rgba(179,155,107,0.06);
            /* CTA glow */
            --cta-glow:            radial-gradient(ellipse 80% 60% at 50% -10%, rgba(28,107,58,0.07) 0%, transparent 70%);
            /* Steps */
            --step-num-bg:         rgba(28,107,58,0.11);
            --step-num-border:     rgba(28,107,58,0.28);
            --step-num-color:      #1c6b3a;
            /* Alerts */
            --alert-error-bg:      rgba(137,34,34,0.09);
            --alert-error-border:  rgba(137,34,34,0.28);
            --alert-error-color:   #892222;
            --alert-ok-bg:         rgba(28,107,58,0.09);
            --alert-ok-border:     rgba(28,107,58,0.28);
            --alert-ok-color:      #1c6b3a;
            /* Quota warn */
            --quota-warn:          #885b0e;
            --days-warn:           #885b0e;
        }

        /* ══════════════════════════════════
           DESIGN TOKENS — DARK MODE
        ══════════════════════════════════ */
        [data-theme="dark"] {
            --md-bg-primary:       #0d0d0d;
            --md-bg-secondary:     #1a1a1a;
            --md-bg-elevated:      #262626;
            --md-bg-card:          #1a1a1a;
            --md-text-primary:     #f5f5f5;
            --md-text-secondary:   #b0b0b0;
            --md-text-disabled:    #6b6b6b;
            --md-border:           rgba(255,255,255,0.1);
            --md-divider:          rgba(255,255,255,0.06);
            --hero-stat-border:    rgba(255,255,255,0.13);
            --hero-stat-divider:   rgba(255,255,255,0.10);
            --md-elevation-2:      0 3px 8px rgba(0,0,0,0.5);
            --md-elevation-4:      0 6px 16px rgba(0,0,0,0.6);
            --md-elevation-8:      0 12px 32px rgba(0,0,0,0.7);
            --accent:              #8bc99f;
            --accent-hover:        #aaddb8;
            --accent-bg:           rgba(107,155,122,0.12);
            --accent-bg-btn:       rgba(107,155,122,0.18);
            --accent-bg-hover:     rgba(107,155,122,0.30);
            --accent-border:       rgba(107,155,122,0.28);
            --accent-border-btn:   rgba(107,155,122,0.42);
            --accent-border-hover: rgba(107,155,122,0.65);
            --accent-glow:         0 8px 24px rgba(107,155,122,0.15);
            --accent-blue:         #c2d4e8;
            --accent-blue-bg:      rgba(154,176,197,0.15);
            --accent-blue-border:  rgba(154,176,197,0.28);
            --accent-amber:        #d9b97a;
            --accent-amber-bg:     rgba(179,155,107,0.15);
            --accent-amber-border: rgba(179,155,107,0.28);
            --accent-red:          #d98989;
            --accent-red-bg:       rgba(179,107,107,0.15);
            --accent-red-border:   rgba(179,107,107,0.28);
            --accent-purple:       #c2aae8;
            --accent-purple-bg:    rgba(155,130,200,0.15);
            --accent-purple-border:rgba(155,130,200,0.28);
            --accent-teal:         #8bc9c4;
            --accent-teal-bg:      rgba(107,179,170,0.15);
            --accent-teal-border:  rgba(107,179,170,0.28);
            --nav-bg:              rgba(26,26,26,0.75);
            --nav-bg-scrolled:     rgba(26,26,26,0.92);
            --nav-border:          rgba(255,255,255,0.08);
            --nav-shadow:          0 4px 24px rgba(0,0,0,0.4);
            --nav-link-hover-bg:   rgba(255,255,255,0.06);
            --nav-link-hover-bd:   rgba(255,255,255,0.1);
            --grid-line:           rgba(255,255,255,0.018);
            --card-hover-border:   rgba(255,255,255,0.16);
            --btn-sec-hover-bg:    rgba(255,255,255,0.06);
            --btn-sec-hover-bd:    rgba(255,255,255,0.2);
            --guest-form-bg:       rgba(26,26,26,0.80);
            --guest-form-border:   rgba(255,255,255,0.10);
            --guest-form-shadow:   0 8px 32px rgba(0,0,0,0.4);
            --hl-from:             #8bc99f;
            --hl-mid:              #aaddb8;
            --hl-to:               #c2d4e8;
            --blob-1:              rgba(107,155,122,0.07);
            --blob-2:              rgba(100,130,200,0.05);
            --blob-3:              rgba(179,155,107,0.04);
            --cta-glow:            radial-gradient(ellipse 80% 60% at 50% -10%, rgba(107,155,122,0.08) 0%, transparent 70%);
            --step-num-bg:         rgba(107,155,122,0.15);
            --step-num-border:     rgba(107,155,122,0.30);
            --step-num-color:      #8bc99f;
            --alert-error-bg:      rgba(179,107,107,0.12);
            --alert-error-border:  rgba(179,107,107,0.30);
            --alert-error-color:   #d98989;
            --alert-ok-bg:         rgba(107,155,122,0.12);
            --alert-ok-border:     rgba(107,155,122,0.30);
            --alert-ok-color:      #8bc99f;
            --quota-warn:          #d9b97a;
            --days-warn:           #d9b97a;
        }

        @keyframes fadeUp  { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeIn  { from { opacity:0; } to { opacity:1; } }
        @keyframes pulse   { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.08); } }
        @keyframes float   { 0%,100% { transform:translateY(0); } 50% { transform:translateY(-8px); } }
        @keyframes spin    { to { transform:rotate(360deg); } }
        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position:  200% center; }
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--md-bg-primary);
            color: var(--md-text-primary);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background-color 0.3s, color 0.3s;
        }

        /* ══════════════════════════════════
           BACKGROUND
        ══════════════════════════════════ */
        .bg-layer {
            position: fixed; inset: 0; overflow: hidden; z-index: 0;
            pointer-events: none;
        }
        .bg-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(var(--grid-line) 1px, transparent 1px),
                linear-gradient(90deg, var(--grid-line) 1px, transparent 1px);
            background-size: 56px 56px;
        }
        .bg-blob {
            position: absolute; border-radius: 50%;
            filter: blur(90px); animation: pulse 10s ease-in-out infinite;
        }
        .bg-blob-1 { width:600px; height:600px; background:var(--blob-1); top:-180px; left:-150px; animation-delay:0s; }
        .bg-blob-2 { width:500px; height:500px; background:var(--blob-2); bottom:-140px; right:-120px; animation-delay:4s; }
        .bg-blob-3 { width:350px; height:350px; background:var(--blob-3); top:38%; left:50%; animation-delay:7s; }

        /* ══════════════════════════════════
           FLOATING HEADER
        ══════════════════════════════════ */
        .nav-wrap {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 16px 24px;
            display: flex; justify-content: center;
            animation: fadeIn 0.5s ease-out both;
        }
        .nav {
            width: 100%; max-width: 1100px;
            background: var(--nav-bg);
            backdrop-filter: blur(16px) saturate(1.4);
            -webkit-backdrop-filter: blur(16px) saturate(1.4);
            border: 1px solid var(--nav-border);
            border-radius: 16px;
            padding: 12px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 16px;
            box-shadow: var(--nav-shadow);
            transition: background 0.2s;
        }
        .nav-brand {
            display: flex; align-items: center; gap: 10px; text-decoration: none;
        }
        .nav-brand-icon {
            width: 36px; height: 36px; border-radius: 9px; flex-shrink: 0;
            background: var(--accent-bg);
            border: 1px solid var(--accent-border);
            color: var(--accent);
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
        }
        .nav-brand-text {
            font-size: 0.975rem; font-weight: 700;
            color: var(--md-text-primary); letter-spacing: -0.01em;
        }
        .nav-brand-text span {
            font-weight: 400; color: var(--md-text-disabled); font-size: 0.8rem;
            display: block; margin-top: -1px;
        }
        .nav-links {
            display: flex; align-items: center; gap: 4px;
        }
        .nav-link {
            padding: 7px 14px; border-radius: 8px;
            font-size: 0.845rem; font-weight: 500;
            color: var(--md-text-secondary); text-decoration: none;
            border: 1px solid transparent;
            transition: all 0.18s;
        }
        .nav-link:hover {
            background: var(--nav-link-hover-bg);
            color: var(--accent);
            border-color: var(--nav-link-hover-bd);
        }
        .nav-btn {
            padding: 8px 18px; border-radius: 9px;
            background: var(--accent-bg-btn);
            border: 1px solid var(--accent-border-btn);
            color: var(--accent);
            font-size: 0.845rem; font-weight: 600;
            font-family: 'Inter', sans-serif; cursor: pointer;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 7px;
            transition: all 0.18s;
        }
        .nav-btn:hover {
            background: var(--accent-bg-hover);
            border-color: var(--accent-border-hover);
            color: var(--accent-hover); transform: translateY(-1px);
        }

        /* ── Theme Toggle Button ── */
        .theme-toggle {
            width: 34px; height: 34px; border-radius: 8px;
            background: var(--nav-link-hover-bg);
            border: 1px solid var(--nav-border);
            color: var(--md-text-secondary);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.875rem; cursor: pointer;
            transition: all 0.22s; margin-left: 4px; flex-shrink: 0;
        }
        .theme-toggle:hover {
            background: var(--accent-bg);
            border-color: var(--accent-border);
            color: var(--accent);
            transform: rotate(18deg) scale(1.08);
        }

        /* ══════════════════════════════════
           HERO
        ══════════════════════════════════ */
        .hero {
            position: relative; z-index: 1;
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            padding: 140px 24px 80px;
            text-align: center;
        }
        .hero-inner { max-width: 740px; }

        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 14px; border-radius: 20px;
            background: var(--accent-bg);
            border: 1px solid var(--accent-border);
            color: var(--accent); font-size: 0.78rem; font-weight: 600;
            letter-spacing: 0.04em; text-transform: uppercase;
            margin-bottom: 28px;
            animation: fadeUp 0.5s 0.1s ease-out both;
        }
        .hero-badge i { font-size: 0.85rem; }

        .hero-title {
            font-size: clamp(2.4rem, 6vw, 3.8rem);
            font-weight: 800; letter-spacing: -0.03em;
            color: var(--md-text-primary);
            line-height: 1.1; margin-bottom: 20px;
            animation: fadeUp 0.5s 0.18s ease-out both;
        }

        /* ── Shimmer effect — adapts per theme ── */
        .hero-title .hl {
            background: linear-gradient(135deg, var(--hl-from) 0%, var(--hl-mid) 50%, var(--hl-to) 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 4s linear infinite;
        }

        .hero-sub {
            font-size: 1.05rem; color: var(--md-text-secondary);
            line-height: 1.7; max-width: 540px; margin: 0 auto 36px;
            animation: fadeUp 0.5s 0.25s ease-out both;
        }

        .hero-actions {
            display: flex; align-items: center; justify-content: center;
            gap: 12px; flex-wrap: wrap;
            animation: fadeUp 0.5s 0.32s ease-out both;
        }
        .hero-btn-primary {
            padding: 14px 28px; border-radius: 11px;
            background: var(--accent-bg-btn);
            border: 1px solid var(--accent-border-btn);
            color: var(--accent);
            font-size: 0.9375rem; font-weight: 600;
            font-family: 'Inter', sans-serif; cursor: pointer;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 9px;
            transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 0 0 0 transparent;
        }
        .hero-btn-primary:hover {
            background: var(--accent-bg-hover);
            border-color: var(--accent-border-hover);
            color: var(--accent-hover); transform: translateY(-2px);
            box-shadow: var(--accent-glow);
        }
        .hero-btn-secondary {
            padding: 14px 28px; border-radius: 11px;
            background: transparent;
            border: 1px solid var(--md-border);
            color: var(--md-text-secondary);
            font-size: 0.9375rem; font-weight: 500;
            font-family: 'Inter', sans-serif; cursor: pointer;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 9px;
            transition: all 0.2s;
        }
        .hero-btn-secondary:hover {
            background: var(--accent-bg);
            border-color: var(--accent-border);
            color: var(--accent);
            transform: translateY(-2px);
        }

        /* Hero stats */
        .hero-stats {
            display: flex; align-items: center; justify-content: center;
            gap: 32px; flex-wrap: wrap;
            margin-top: 56px; padding-top: 40px;
            border-top: 1px solid var(--hero-stat-border);
            animation: fadeUp 0.5s 0.4s ease-out both;
        }
        .hero-stat-item { text-align: center; }
        .hero-stat-val {
            font-size: 1.6rem; font-weight: 800;
            color: var(--md-text-primary); letter-spacing: -0.02em;
        }
        .hero-stat-lbl {
            font-size: 0.75rem; color: var(--md-text-disabled);
            text-transform: uppercase; letter-spacing: 0.08em;
            margin-top: 4px;
        }
        .hero-stat-div {
            width: 1px; height: 36px;
            background: var(--hero-stat-divider);
        }

        /* ══════════════════════════════════
           FEATURES
        ══════════════════════════════════ */
        .section {
            position: relative; z-index: 1;
            padding: 100px 24px;
        }
        .section-inner { max-width: 1100px; margin: 0 auto; }

        .section-label {
            display: inline-block;
            font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--accent); margin-bottom: 12px;
        }
        .section-title {
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 800; letter-spacing: -0.025em;
            color: var(--md-text-primary); margin-bottom: 14px;
        }
        .section-sub {
            font-size: 0.975rem; color: var(--md-text-secondary);
            max-width: 500px; line-height: 1.7;
        }

        .features-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 16px; margin-top: 52px;
        }
        @media(max-width: 900px) { .features-grid { grid-template-columns: 1fr 1fr; } }
        @media(max-width: 580px) { .features-grid { grid-template-columns: 1fr; } }

        .feat-card {
            background: var(--md-bg-card);
            border: 1px solid var(--md-border);
            border-radius: 16px; padding: 24px;
            box-shadow: var(--md-elevation-2);
            transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s;
        }
        .feat-card:hover {
            box-shadow: var(--md-elevation-4);
            transform: translateY(-3px);
            border-color: var(--card-hover-border);
        }
        .feat-icon {
            width: 44px; height: 44px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; margin-bottom: 16px;
        }
        .feat-icon.green  { background:var(--accent-bg);         color:var(--accent);        border:1px solid var(--accent-border); }
        .feat-icon.blue   { background:var(--accent-blue-bg);    color:var(--accent-blue);   border:1px solid var(--accent-blue-border); }
        .feat-icon.amber  { background:var(--accent-amber-bg);   color:var(--accent-amber);  border:1px solid var(--accent-amber-border); }
        .feat-icon.red    { background:var(--accent-red-bg);     color:var(--accent-red);    border:1px solid var(--accent-red-border); }
        .feat-icon.purple { background:var(--accent-purple-bg);  color:var(--accent-purple); border:1px solid var(--accent-purple-border); }
        .feat-icon.teal   { background:var(--accent-teal-bg);    color:var(--accent-teal);   border:1px solid var(--accent-teal-border); }

        .feat-title {
            font-size: 0.95rem; font-weight: 700;
            color: var(--md-text-primary); margin-bottom: 8px;
        }
        .feat-desc {
            font-size: 0.845rem; color: var(--md-text-secondary); line-height: 1.65;
        }

        /* ══════════════════════════════════
           HOW IT WORKS
        ══════════════════════════════════ */
        .steps-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 24px; margin-top: 52px; position: relative;
        }
        @media(max-width:720px) { .steps-grid { grid-template-columns: 1fr; } }

        .steps-grid::before {
            content: '';
            position: absolute; top: 28px; left: calc(16.6% + 12px); right: calc(16.6% + 12px);
            height: 1px; background: var(--md-border); z-index: 0;
        }
        @media(max-width:720px) { .steps-grid::before { display:none; } }

        .step-card {
            background: var(--md-bg-card); border: 1px solid var(--md-border);
            border-radius: 16px; padding: 24px 20px; text-align: center;
            position: relative; z-index: 1;
            box-shadow: var(--md-elevation-2);
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .step-card:hover { box-shadow: var(--md-elevation-4); transform: translateY(-3px); }
        .step-num {
            width: 44px; height: 44px; border-radius: 12px; margin: 0 auto 16px;
            background: var(--step-num-bg); border: 1px solid var(--step-num-border);
            color: var(--step-num-color); font-size: 1rem; font-weight: 800;
            display: flex; align-items: center; justify-content: center;
        }
        .step-title { font-size: 0.95rem; font-weight: 700; color: var(--md-text-primary); margin-bottom: 8px; }
        .step-desc  { font-size: 0.84rem; color: var(--md-text-secondary); line-height: 1.65; }

        /* ══════════════════════════════════
           CTA
        ══════════════════════════════════ */
        .cta-section {
            position: relative; z-index: 1;
            padding: 80px 24px 120px;
        }
        .cta-card {
            max-width: 700px; margin: 0 auto;
            background: var(--md-bg-card);
            border: 1px solid var(--accent-border);
            border-radius: 24px; padding: 52px 48px;
            text-align: center; box-shadow: var(--md-elevation-8);
            position: relative; overflow: hidden;
        }
        .cta-card::before {
            content: '';
            position: absolute; inset: 0;
            background: var(--cta-glow);
            pointer-events: none;
        }
        .cta-card h2 {
            font-size: clamp(1.5rem, 4vw, 2.2rem);
            font-weight: 800; letter-spacing: -0.025em;
            color: var(--md-text-primary); margin-bottom: 14px;
        }
        .cta-card p {
            font-size: 0.975rem; color: var(--md-text-secondary);
            line-height: 1.7; margin-bottom: 32px;
        }

        /* ══════════════════════════════════
           FOOTER
        ══════════════════════════════════ */
        footer {
            position: relative; z-index: 1;
            border-top: 1px solid var(--md-divider);
            background: var(--md-bg-secondary);
        }
        .footer-inner {
            max-width: 1100px; margin: 0 auto;
            padding: 40px 24px 32px;
            display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 40px;
        }
        @media(max-width:720px) { .footer-inner { grid-template-columns: 1fr; gap: 28px; } }

        .footer-brand-row {
            display: flex; align-items: center; gap: 10px; margin-bottom: 12px;
        }
        .footer-brand-icon {
            width: 34px; height: 34px; border-radius: 8px; flex-shrink: 0;
            background: var(--accent-bg); border: 1px solid var(--accent-border);
            color: var(--accent); display: flex; align-items: center; justify-content: center;
            font-size: 0.9rem;
        }
        .footer-brand-name {
            font-size: 0.95rem; font-weight: 700; color: var(--md-text-primary);
        }
        .footer-brand-desc {
            font-size: 0.8rem; color: var(--md-text-disabled); line-height: 1.65;
            max-width: 260px;
        }

        .footer-col h6 {
            font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.09em;
            color: var(--md-text-disabled); margin-bottom: 14px;
        }
        .footer-col ul { list-style: none; }
        .footer-col li { margin-bottom: 9px; }
        .footer-col a {
            font-size: 0.845rem; color: var(--md-text-secondary);
            text-decoration: none; transition: color 0.15s;
            display: inline-flex; align-items: center; gap: 6px;
        }
        .footer-col a:hover { color: var(--accent); }

        .footer-bottom {
            border-top: 1px solid var(--md-divider);
            padding: 18px 24px;
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 10px;
            max-width: 1100px; margin: 0 auto;
        }
        .footer-copy { font-size: 0.78rem; color: var(--md-text-disabled); }
        .footer-badge {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 0.75rem; color: var(--accent);
            background: var(--accent-bg); border: 1px solid var(--accent-border);
            padding: 4px 12px; border-radius: 20px;
        }
        .footer-badge i { color: var(--accent); }

        /* ══════════════════════════════════
           GUEST SHORTLINK SECTION
        ══════════════════════════════════ */
        .guest-section {
            padding: 80px 0 60px;
            position: relative; z-index: 1;
        }
        .guest-inner {
            max-width: 680px; margin: 0 auto; padding: 0 24px;
            text-align: center;
        }
        .guest-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 5px 14px; border-radius: 20px; margin-bottom: 20px;
            background: var(--accent-bg); border: 1px solid var(--accent-border);
            font-size: 0.78rem; font-weight: 600; color: var(--accent);
            text-transform: uppercase; letter-spacing: 0.08em;
        }
        .guest-title {
            font-size: clamp(1.5rem, 4vw, 2rem); font-weight: 700;
            color: var(--md-text-primary); letter-spacing: -0.02em;
            margin-bottom: 10px;
        }
        .guest-sub {
            font-size: 0.9375rem; color: var(--md-text-secondary);
            margin-bottom: 32px; line-height: 1.6;
        }

        /* Form */
        .guest-form-wrap {
            background: var(--guest-form-bg);
            border: 1px solid var(--guest-form-border);
            border-radius: 16px; padding: 24px;
            backdrop-filter: blur(12px);
            box-shadow: var(--guest-form-shadow);
            text-align: left;
        }
        .guest-input-row { display: flex; gap: 10px; align-items: stretch; }
        .guest-input-wrap { flex: 1; position: relative; }
        .guest-input-wrap i {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            color: var(--md-text-disabled); font-size: 0.9rem; pointer-events: none;
        }
        .guest-input {
            width: 100%; padding: 12px 14px 12px 38px;
            background: var(--md-bg-elevated); border: 1px solid var(--md-border);
            border-radius: 10px; color: var(--md-text-primary);
            font-size: 0.9rem; font-family: 'Inter', sans-serif;
            outline: none; transition: border-color 0.18s, box-shadow 0.18s;
        }
        .guest-input:focus {
            border-color: var(--accent-border-btn);
            box-shadow: 0 0 0 3px var(--accent-bg);
        }
        .guest-input::placeholder { color: var(--md-text-disabled); }
        .guest-btn {
            padding: 12px 22px; border-radius: 10px;
            background: var(--accent-bg-btn); border: 1px solid var(--accent-border-btn);
            color: var(--accent); font-size: 0.875rem; font-weight: 600;
            font-family: 'Inter', sans-serif; cursor: pointer;
            display: flex; align-items: center; gap: 7px;
            transition: all 0.18s; white-space: nowrap; flex-shrink: 0;
        }
        .guest-btn:hover:not(:disabled) {
            background: var(--accent-bg-hover); border-color: var(--accent-border-hover);
            color: var(--accent-hover); transform: translateY(-1px);
        }
        .guest-btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }
        .guest-btn .spin { animation: spin 0.8s linear infinite; }

        /* Quota bar */
        .guest-quota {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: 14px; font-size: 0.78rem; color: var(--md-text-disabled);
        }
        .guest-quota-bar-wrap {
            flex: 1; height: 4px; background: var(--md-bg-elevated);
            border-radius: 4px; margin: 0 12px; overflow: hidden;
        }
        .guest-quota-bar {
            height: 100%; background: var(--accent); border-radius: 4px;
            transition: width 0.4s ease;
        }
        .guest-quota-bar.warn { background: var(--quota-warn); }
        .guest-quota-bar.full { background: var(--accent-red); }

        /* Alert */
        .guest-alert {
            margin-top: 14px; padding: 10px 14px; border-radius: 9px;
            font-size: 0.845rem; display: none; align-items: center; gap: 9px;
        }
        .guest-alert.show { display: flex; }
        .guest-alert.error   { background: var(--alert-error-bg); border: 1px solid var(--alert-error-border); color: var(--alert-error-color); }
        .guest-alert.success { background: var(--alert-ok-bg);    border: 1px solid var(--alert-ok-border);    color: var(--alert-ok-color); }

        /* Result card */
        .guest-result {
            margin-top: 16px; padding: 16px;
            background: var(--md-bg-elevated); border: 1px solid var(--accent-border);
            border-radius: 12px; display: none;
        }
        .guest-result.show { display: block; }
        .guest-result-label {
            font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.08em; color: var(--md-text-disabled); margin-bottom: 8px;
        }
        .guest-result-row { display: flex; align-items: center; gap: 10px; }
        .guest-result-url {
            flex: 1; font-size: 1rem; font-weight: 700; color: var(--accent);
            word-break: break-all; text-decoration: none;
        }
        .guest-result-url:hover { color: var(--accent-hover); }
        .guest-result-copy {
            padding: 7px 14px; border-radius: 8px; cursor: pointer;
            background: var(--accent-bg); border: 1px solid var(--accent-border);
            color: var(--accent); font-size: 0.8rem; font-weight: 600;
            font-family: 'Inter', sans-serif; transition: all 0.15s;
            display: flex; align-items: center; gap: 6px;
        }
        .guest-result-copy:hover { background: var(--accent-bg-hover); }
        .guest-result-copy.copied { color: var(--accent-hover); border-color: var(--accent-border-btn); }
        .guest-result-meta {
            margin-top: 8px; font-size: 0.75rem; color: var(--md-text-disabled);
            display: flex; gap: 16px;
        }
        .guest-result-meta span { display: flex; align-items: center; gap: 5px; }

        /* My links list */
        .guest-mylinks { margin-top: 20px; }
        .guest-mylinks-head {
            font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.08em; color: var(--md-text-disabled);
            margin-bottom: 10px; padding-top: 16px;
            border-top: 1px solid var(--md-divider);
        }
        .guest-link-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 0; border-bottom: 1px solid var(--md-divider);
        }
        .guest-link-item:last-child { border-bottom: none; }
        .guest-link-short {
            font-size: 0.875rem; font-weight: 600; color: var(--accent);
            text-decoration: none; flex-shrink: 0;
        }
        .guest-link-orig {
            flex: 1; font-size: 0.78rem; color: var(--md-text-disabled);
            overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
        .guest-link-days { font-size: 0.72rem; color: var(--md-text-disabled); flex-shrink: 0; }
        .guest-link-days.warn { color: var(--days-warn); }

        @media(max-width:580px) {
            .guest-input-row { flex-direction: column; }
            .guest-btn { justify-content: center; }
        }
    </style>
</head>
<body>

<!-- Background -->
<div class="bg-layer">
    <div class="bg-grid"></div>
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>
    <div class="bg-blob bg-blob-3"></div>
</div>

<!-- ══ FLOATING HEADER ══════════════════════════════ -->
<div class="nav-wrap">
    <nav class="nav">
        <a class="nav-brand" href="#">
            <div class="nav-brand-icon"><i class="bi bi-link-45deg"></i></div>
            <div class="nav-brand-text">
                ShortLink
                <span>Portal Pegawai</span>
            </div>
        </a>
        <div style="display:flex; align-items:center; gap:4px;">
            <a class="nav-link" href="#fitur">Fitur</a>
            <a class="nav-link" href="#cara-kerja">Cara Kerja</a>
            <a class="nav-link" href="#coba-gratis">Coba Gratis</a>
            <a class="nav-btn" href="/login-portal" style="margin-left:8px;">
                <i class="bi bi-box-arrow-in-right"></i> Masuk
            </a>
            <button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
                <i class="bi bi-moon-fill" id="themeIcon"></i>
            </button>
        </div>
    </nav>
</div>

<!-- ══ HERO ═════════════════════════════════════════ -->
<section class="hero">
    <div class="hero-inner">
        <h1 class="hero-title">
            Perpendek Link,<br>
            <span class="hl">Tingkatkan Produktivitas</span>
        </h1>
        <p class="hero-sub">
            Layanan shortlink internal Portal Pegawai. Buat, kelola, dan pantau
            performa link Anda dengan mudah — dilengkapi QR Code dan statistik kunjungan.
        </p>
        <div class="hero-actions">
            <a class="hero-btn-primary" href="/login-portal">
                <i class="bi bi-box-arrow-in-right"></i>
                Mulai Sekarang
            </a>
            <a class="hero-btn-secondary" href="#fitur">
                <i class="bi bi-grid-3x3-gap"></i>
                Lihat Fitur
            </a>
        </div>

        <div class="hero-stats">
            <div class="hero-stat-item">
                <div class="hero-stat-val">QR Code</div>
                <div class="hero-stat-lbl">Otomatis Dibuat</div>
            </div>
            <div class="hero-stat-div"></div>
            <div class="hero-stat-item">
                <div class="hero-stat-val">Real-time</div>
                <div class="hero-stat-lbl">Statistik Kunjungan</div>
            </div>
            <div class="hero-stat-div"></div>
            <div class="hero-stat-item">
                <div class="hero-stat-val">SSO</div>
                <div class="hero-stat-lbl">Login Portal Pegawai</div>
            </div>
        </div>
    </div>
</section>

<!-- ══ FEATURES ══════════════════════════════════════ -->
<section class="section" id="fitur">
    <div class="section-inner">
        <div>
            <span class="section-label">Fitur Unggulan</span>
            <h2 class="section-title">Semua yang Anda butuhkan</h2>
            <p class="section-sub">Dirancang khusus untuk kebutuhan pegawai — sederhana, cepat, dan terintegrasi.</p>
        </div>

        <div class="features-grid">
            <div class="feat-card">
                <div class="feat-icon green"><i class="bi bi-scissors"></i></div>
                <div class="feat-title">Perpendek URL</div>
                <div class="feat-desc">Ubah URL panjang menjadi link pendek yang mudah dibagikan dalam hitungan detik.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon blue"><i class="bi bi-qr-code"></i></div>
                <div class="feat-title">QR Code Otomatis</div>
                <div class="feat-desc">Setiap shortlink dilengkapi QR Code yang bisa diunduh langsung dalam format PNG.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon amber"><i class="bi bi-bar-chart-fill"></i></div>
                <div class="feat-title">Statistik Kunjungan</div>
                <div class="feat-desc">Pantau performa link secara real-time — total kunjungan, via link, dan via QR Code.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon teal"><i class="bi bi-pencil-square"></i></div>
                <div class="feat-title">Kode Kustom</div>
                <div class="feat-desc">Buat kode pendek sesuai keinginan atau biarkan sistem men-generate otomatis.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon purple"><i class="bi bi-tag"></i></div>
                <div class="feat-title">Judul & Deskripsi</div>
                <div class="feat-desc">Tambahkan judul dan deskripsi untuk mengorganisir shortlink Anda dengan rapi.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon red"><i class="bi bi-shield-lock"></i></div>
                <div class="feat-title">Akses Aman</div>
                <div class="feat-desc">Login menggunakan akun Portal Pegawai yang sudah terverifikasi — aman dan terpercaya.</div>
            </div>
        </div>
    </div>
</section>

<!-- ══ HOW IT WORKS ═══════════════════════════════════ -->
<section class="section" id="cara-kerja" style="padding-top:0;">
    <div class="section-inner">
        <div>
            <span class="section-label">Cara Kerja</span>
            <h2 class="section-title">Tiga langkah mudah</h2>
            <p class="section-sub">Tidak perlu registrasi — cukup login dengan akun Portal Pegawai Anda.</p>
        </div>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-num">1</div>
                <div class="step-title">Login Portal</div>
                <div class="step-desc">Masuk menggunakan NPP dan password Portal Pegawai Anda yang aktif.</div>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <div class="step-title">Buat ShortLink</div>
                <div class="step-desc">Tempel URL panjang, isi kode kustom (opsional), dan klik Perpendek.</div>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <div class="step-title">Bagikan & Pantau</div>
                <div class="step-desc">Salin link, unduh QR Code, dan pantau statistik kunjungan secara langsung.</div>
            </div>
        </div>
    </div>
</section>

<!-- ══ GUEST SHORTLINK ══════════════════════════════ -->
<section class="guest-section" id="coba-gratis">
    <div class="guest-inner">
        <div class="guest-badge"><i class="bi bi-lightning-charge-fill"></i> Coba Gratis</div>
        <h2 class="guest-title">Coba Tanpa Login</h2>
        <p class="guest-sub">Buat shortlink instan tanpa akun. Gratis hingga <strong>3 link per hari</strong>, aktif selama <strong>30 hari</strong>.</p>

        <div class="guest-form-wrap">
            {{-- Input --}}
            <div class="guest-input-row">
                <div class="guest-input-wrap">
                    <i class="bi bi-link-45deg"></i>
                    <input class="guest-input" type="url" id="guestUrlInput"
                           placeholder="https://contoh.com/url-panjang-anda..."
                           autocomplete="off">
                </div>
                <button class="guest-btn" id="guestBtn" onclick="guestShorten()">
                    <i class="bi bi-scissors" id="guestBtnIcon"></i>
                    <span id="guestBtnText">Persingkat</span>
                </button>
            </div>

            {{-- Quota --}}
            <div class="guest-quota" id="guestQuota" style="display:none;">
                <span id="guestQuotaText">3 tersisa hari ini</span>
                <div class="guest-quota-bar-wrap">
                    <div class="guest-quota-bar" id="guestQuotaBar" style="width:100%;"></div>
                </div>
                <span id="guestQuotaCount">0/3</span>
            </div>

            {{-- Alert --}}
            <div class="guest-alert" id="guestAlert">
                <i class="bi bi-exclamation-triangle-fill" id="guestAlertIcon"></i>
                <span id="guestAlertText"></span>
            </div>

            {{-- Result --}}
            <div class="guest-result" id="guestResult">
                <div class="guest-result-label">ShortLink Kamu</div>
                <div class="guest-result-row">
                    <a class="guest-result-url" id="guestResultUrl" href="#" target="_blank">—</a>
                    <button class="guest-result-copy" id="guestCopyBtn" onclick="guestCopy()">
                        <i class="bi bi-copy"></i> Salin
                    </button>
                </div>
                <div class="guest-result-meta">
                    <span><i class="bi bi-clock"></i> Aktif <span id="guestResultDays">30</span> hari</span>
                    <span><i class="bi bi-calendar-x"></i> Exp: <span id="guestResultExp">—</span></span>
                </div>
            </div>

            {{-- My links --}}
            <div class="guest-mylinks" id="guestMyLinks" style="display:none;">
                <div class="guest-mylinks-head"><i class="bi bi-clock-history me-1"></i>ShortLink Kamu Sebelumnya</div>
                <div id="guestMyLinksList"></div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="cta-card">
        <h2>Siap memulai?</h2>
        <p>Login dengan akun Portal Pegawai Anda dan mulai buat shortlink pertama dalam hitungan detik.</p>
        <a class="hero-btn-primary" href="/login-portal" style="display:inline-flex; margin: 0 auto;">
            <i class="bi bi-box-arrow-in-right"></i>
            Masuk Sekarang
        </a>
    </div>
</section>

<!-- ══ FOOTER ════════════════════════════════════════ -->
<footer>
    <div class="footer-inner">
        <div class="footer-brand">
            <div class="footer-brand-row">
                <div class="footer-brand-icon"><i class="bi bi-link-45deg"></i></div>
                <span class="footer-brand-name">ShortLink</span>
            </div>
            <p class="footer-brand-desc">
                Layanan shortlink internal untuk pegawai Portal Pegawai.
                Buat, kelola, dan pantau link Anda dengan mudah.
            </p>
        </div>

        <div class="footer-col">
            <h6>Navigasi</h6>
            <ul>
                <li><a href="#fitur"><i class="bi bi-grid-3x3-gap-fill"></i>Fitur</a></li>
                <li><a href="#cara-kerja"><i class="bi bi-list-ol"></i>Cara Kerja</a></li>
                <li><a href="/login-portal"><i class="bi bi-box-arrow-in-right"></i>Login</a></li>
            </ul>
        </div>

        <div class="footer-col" style="grid-column: span 2; display:grid; grid-template-columns:1fr 1fr; gap:40px;">
            <div>
                <h6>Fitur Unggulan</h6>
                <ul>
                    <li><a href="#fitur"><i class="bi bi-scissors"></i>Perpendek URL</a></li>
                    <li><a href="#fitur"><i class="bi bi-qr-code"></i>QR Code Otomatis</a></li>
                    <li><a href="#fitur"><i class="bi bi-bar-chart-fill"></i>Statistik Kunjungan</a></li>
                </ul>
            </div>
            <div>
                <h6 style="visibility:hidden;">—</h6>
                <ul>
                    <li><a href="#fitur"><i class="bi bi-pencil-square"></i>Kode Kustom</a></li>
                    <li><a href="#fitur"><i class="bi bi-tag"></i>Judul & Deskripsi</a></li>
                    <li><a href="#fitur"><i class="bi bi-shield-lock"></i>Akses Aman SSO</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <span class="footer-copy">© {{ date('Y') }} ShortLink — Portal Pegawai. All rights reserved.</span>
        <div class="footer-badge">
            <i class="bi bi-shield-check"></i>
            Sistem Internal
        </div>
    </div>
</footer>

<script>
    // ── HTML escape helper (cegah XSS) ───────────────────────────
    function esc(s) {
        return String(s || '')
            .replace(/&/g,'&amp;').replace(/"/g,'&quot;')
            .replace(/'/g,'&#39;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    // ══ THEME ════════════════════════════════════════════════════
    // Apply saved theme immediately (before paint)
    (function () {
        const saved = localStorage.getItem('sl_theme') || 'light';
        document.documentElement.setAttribute('data-theme', saved);
    })();

    function toggleTheme() {
        const html   = document.documentElement;
        const isDark = html.getAttribute('data-theme') === 'dark';
        const next   = isDark ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('sl_theme', next);
        _syncThemeIcon(next);
        _updateNavBg();
    }

    function _syncThemeIcon(theme) {
        const icon = document.getElementById('themeIcon');
        if (!icon) return;
        // light mode → show moon (click to go dark); dark mode → show sun (click to go light)
        icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
    }

    // Sync icon on load
    _syncThemeIcon(document.documentElement.getAttribute('data-theme') || 'light');

    // ══ REDIRECT ═════════════════════════════════════════════════
    function goToDashboardOrLogin(e) {
        if (localStorage.getItem('auth_response')) {
            e.preventDefault();
            window.location.href = '/dashboard';
        }
    }
    document.querySelectorAll('a[href="/login-portal"]').forEach(a => {
        a.addEventListener('click', goToDashboardOrLogin);
    });


    // ══ GUEST SHORTLINK ══════════════════════════════════════════
    const GUEST_LIMIT = 3;

    function guestSetLoading(on) {
        const btn  = document.getElementById('guestBtn');
        const icon = document.getElementById('guestBtnIcon');
        const text = document.getElementById('guestBtnText');
        btn.disabled = on;
        icon.className = on ? 'bi bi-arrow-repeat spin' : 'bi bi-scissors';
        text.textContent = on ? 'Memproses...' : 'Persingkat';
    }

    function guestShowAlert(type, msg) {
        const el   = document.getElementById('guestAlert');
        const icon = document.getElementById('guestAlertIcon');
        const text = document.getElementById('guestAlertText');
        el.className = `guest-alert show ${type}`;
        icon.className = type === 'error'
            ? 'bi bi-exclamation-triangle-fill'
            : 'bi bi-check-circle-fill';
        text.textContent = msg;
    }

    function guestHideAlert() {
        document.getElementById('guestAlert').className = 'guest-alert';
    }

    function guestUpdateQuota(used, limit) {
        const wrap  = document.getElementById('guestQuota');
        const bar   = document.getElementById('guestQuotaBar');
        const text  = document.getElementById('guestQuotaText');
        const count = document.getElementById('guestQuotaCount');
        const rem   = Math.max(0, limit - used);

        wrap.style.display = 'flex';
        const pct = (rem / limit) * 100;
        bar.style.width = pct + '%';
        bar.className = 'guest-quota-bar' + (rem === 0 ? ' full' : rem === 1 ? ' warn' : '');
        text.textContent = rem > 0 ? `${rem} tersisa hari ini` : 'Batas harian tercapai';
        count.textContent = `${used}/${limit}`;
    }

    function guestShowResult(data) {
        const result = document.getElementById('guestResult');
        const urlEl  = document.getElementById('guestResultUrl');
        result.classList.add('show');
        urlEl.href        = data.short_url;
        urlEl.textContent = data.short_url;
        document.getElementById('guestResultDays').textContent = data.expired_days;
        document.getElementById('guestResultExp').textContent  = data.expired_at;
        document.getElementById('guestCopyBtn').className = 'guest-result-copy';
        document.getElementById('guestCopyBtn').innerHTML = '<i class="bi bi-copy"></i> Salin';
    }

    function guestCopy() {
        const url = document.getElementById('guestResultUrl').href;
        navigator.clipboard.writeText(url).then(() => {
            const btn = document.getElementById('guestCopyBtn');
            btn.className = 'guest-result-copy copied';
            btn.innerHTML = '<i class="bi bi-check2"></i> Tersalin!';
            setTimeout(() => {
                btn.className = 'guest-result-copy';
                btn.innerHTML = '<i class="bi bi-copy"></i> Salin';
            }, 2000);
        });
    }


    // ══════════════════════════════════════════════════════
    // BROWSER FINGERPRINT
    // Mengumpulkan sinyal browser untuk identifikasi unik.
    // Hash SHA-256 dari kombinasi: UA, layar, timezone,
    // bahasa, CPU core, RAM, canvas render, WebGL GPU info.
    // Tidak menyimpan data personal — hanya hash anonim.
    // ══════════════════════════════════════════════════════
    let _fingerprintCache = null;

    async function getBrowserFingerprint() {
        if (_fingerprintCache) return _fingerprintCache;

        const signals = [];

        // ── Sinyal dasar ──────────────────────────────────
        signals.push(navigator.userAgent);
        signals.push(navigator.language || '');
        signals.push(screen.width + 'x' + screen.height);
        signals.push(screen.colorDepth || '');
        signals.push(Intl.DateTimeFormat().resolvedOptions().timeZone || '');
        signals.push(navigator.hardwareConcurrency || '');
        signals.push(navigator.deviceMemory || '');
        signals.push(navigator.platform || '');
        signals.push(screen.pixelDepth || '');
        signals.push(navigator.maxTouchPoints || '0');

        // ── Canvas fingerprint ────────────────────────────
        // GPU + driver render teks/shape sedikit berbeda tiap device
        try {
            const canvas  = document.createElement('canvas');
            canvas.width  = 280;
            canvas.height = 60;
            const ctx = canvas.getContext('2d');
            ctx.textBaseline = 'top';
            ctx.font         = '14px Arial';
            ctx.fillStyle    = '#f60';
            ctx.fillRect(0, 0, 280, 60);
            ctx.fillStyle    = '#069';
            ctx.fillText('ShortLink fp 🔗 <canvas>', 2, 15);
            ctx.fillStyle    = 'rgba(102,204,0,0.7)';
            ctx.fillText('ShortLink fp 🔗 <canvas>', 4, 17);
            signals.push(canvas.toDataURL().slice(-50)); // ambil tail saja
        } catch(e) {
            signals.push('canvas-err');
        }

        // ── WebGL fingerprint ─────────────────────────────
        // Vendor + renderer GPU berbeda antar device
        try {
            const gl       = document.createElement('canvas').getContext('webgl')
                          || document.createElement('canvas').getContext('experimental-webgl');
            if (gl) {
                const dbgInfo = gl.getExtension('WEBGL_debug_renderer_info');
                if (dbgInfo) {
                    signals.push(gl.getParameter(dbgInfo.UNMASKED_VENDOR_WEBGL)   || '');
                    signals.push(gl.getParameter(dbgInfo.UNMASKED_RENDERER_WEBGL) || '');
                }
                signals.push(gl.getParameter(gl.VERSION)  || '');
                signals.push(gl.getParameter(gl.VENDOR)   || '');
            }
        } catch(e) {
            signals.push('webgl-err');
        }

        // ── Audio fingerprint ─────────────────────────────
        // Cara browser memproses sinyal audio sedikit berbeda
        try {
            const AudioCtx = window.OfflineAudioContext || window.webkitOfflineAudioContext;
            if (AudioCtx) {
                const ctx  = new AudioCtx(1, 44100, 44100);
                const osc  = ctx.createOscillator();
                const comp = ctx.createDynamicsCompressor();
                osc.type   = 'triangle';
                osc.frequency.value = 10000;
                osc.connect(comp);
                comp.connect(ctx.destination);
                osc.start(0);
                ctx.startRendering();
                await new Promise(resolve => {
                    ctx.oncomplete = e => {
                        const buf = e.renderedBuffer.getChannelData(0);
                        // ambil checksum sederhana dari beberapa sample
                        let sum = 0;
                        for (let i = 0; i < Math.min(buf.length, 5000); i++) sum += Math.abs(buf[i]);
                        signals.push(sum.toString().slice(0, 10));
                        resolve();
                    };
                    setTimeout(resolve, 500); // timeout audio fallback
                });
            }
        } catch(e) {
            signals.push('audio-err');
        }

        // ── Hash semua sinyal dengan SHA-256 ─────────────
        const raw     = signals.join('|||');
        const encoded = new TextEncoder().encode(raw);
        const hashBuf = await crypto.subtle.digest('SHA-256', encoded);
        const hashArr = Array.from(new Uint8Array(hashBuf));
        const hashHex = hashArr.map(b => b.toString(16).padStart(2, '0')).join('');

        _fingerprintCache = hashHex;
        return hashHex;
    }

    async function guestShorten() {
        const url = document.getElementById('guestUrlInput').value.trim();
        if (!url) { guestShowAlert('error', 'Masukkan URL terlebih dahulu.'); return; }
        if (!/^https?:\/\//.test(url)) { guestShowAlert('error', 'URL harus diawali https:// atau http://'); return; }

        guestHideAlert();
        guestSetLoading(true);
        document.getElementById('guestResult').classList.remove('show');

        try {
            const token       = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
            const fingerprint = await getBrowserFingerprint();

            const resp = await fetch('/api/guest/shorten', {
                method: 'POST',
                headers: {
                    'Content-Type':  'application/json',
                    'Accept':        'application/json',
                    'X-CSRF-TOKEN':  token,
                    'X-Fingerprint': fingerprint,
                },
                body: JSON.stringify({ url, fingerprint }),
            });

            let res;
            try { res = await resp.json(); }
            catch(parseErr) {
                guestShowAlert('error', 'Respons server tidak valid (status ' + resp.status + ').');
                return;
            }

            if (resp.status === 429 || res.status === 'error') {
                guestShowAlert('error', res.message || 'Terjadi kesalahan.');
                if (res.limit !== undefined) guestUpdateQuota(res.used, res.limit);
            } else if (res.status === 'success') {
                guestShowResult(res.data);
                guestUpdateQuota(res.used, res.limit);
                guestHideAlert();
                document.getElementById('guestUrlInput').value = '';
                guestLoadMyLinks();
            } else {
                guestShowAlert('error', 'Respons tidak dikenal dari server.');
            }
        } catch(e) {
            guestShowAlert('error', 'Tidak dapat terhubung ke server. Coba lagi.');
            console.error('guestShorten error:', e);
        } finally {
            guestSetLoading(false);
        }
    }

    async function guestLoadMyLinks() {
        try {
            const fingerprint = await getBrowserFingerprint();
            const resp = await fetch('/api/guest/my-links', {
                headers: {
                    'Accept':        'application/json',
                    'X-Fingerprint': fingerprint,
                }
            });
            const res = await resp.json();
            if (res.status !== 'success') return;

            if (res.quota) guestUpdateQuota(res.quota.used, res.quota.limit);

            const list = res.data || [];
            const wrap = document.getElementById('guestMyLinks');
            const el   = document.getElementById('guestMyLinksList');

            if (!list.length) { wrap.style.display = 'none'; return; }

            wrap.style.display = 'block';
            el.innerHTML = list.map(item => {
                const daysClass = item.days_left <= 3 ? 'guest-link-days warn' : 'guest-link-days';
                return `<div class="guest-link-item">
                    <a class="guest-link-short" href="${esc(item.short_url)}" target="_blank">${esc(item.short_url)}</a>
                    <span class="guest-link-orig" title="${esc(item.original_url)}">${esc(item.original_url)}</span>
                    <span class="${daysClass}"><i class="bi bi-clock"></i> ${esc(String(item.days_left))}h</span>
                </div>`;
            }).join('');
        } catch(e) {}
    }

    // Enter key submit
    document.getElementById('guestUrlInput')?.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') guestShorten();
    });

    // Load my links saat halaman dimuat
    document.addEventListener('DOMContentLoaded', guestLoadMyLinks);

    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // ══ NAVBAR SCROLL (theme-aware) ══════════════════════════════
    const navEl = document.querySelector('.nav');

    function _updateNavBg() {
        const isDark   = document.documentElement.getAttribute('data-theme') === 'dark';
        const scrolled = window.scrollY > 40;
        navEl.style.background = isDark
            ? (scrolled ? 'rgba(26,26,26,0.92)'    : 'rgba(26,26,26,0.75)')
            : (scrolled ? 'rgba(226,235,227,0.97)' : 'rgba(226,235,227,0.88)');
    }

    window.addEventListener('scroll', _updateNavBg, { passive: true });
</script>
</body>
</html>
