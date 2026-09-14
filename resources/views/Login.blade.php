<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Portal Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --md-border:           rgba(0,0,0,0.11);
            --md-divider:          rgba(0,0,0,0.13);
            --md-elevation-2:      0 2px 8px rgba(0,0,0,0.08);
            --md-elevation-4:      0 5px 16px rgba(0,0,0,0.12);
            --md-elevation-8:      0 10px 32px rgba(0,0,0,0.16);
            /* Green accent */
            --accent:              #1c6b3a;
            --accent-hover:        #135028;
            --accent-bg:           rgba(28,107,58,0.09);
            --accent-bg-btn:       rgba(28,107,58,0.11);
            --accent-bg-hover:     rgba(28,107,58,0.18);
            --accent-border:       rgba(28,107,58,0.28);
            --accent-border-btn:   rgba(28,107,58,0.38);
            --accent-border-focus: rgba(28,107,58,0.55);
            --accent-border-hover: rgba(28,107,58,0.58);
            --accent-glow-sm:      0 4px 16px rgba(28,107,58,0.13);
            /* Red accent */
            --accent-red:          #892222;
            --accent-red-bg:       rgba(137,34,34,0.09);
            /* Alerts */
            --alert-error-bg:      rgba(137,34,34,0.09);
            --alert-error-left:    #a04040;
            --alert-error-color:   #892222;
            --alert-ok-bg:         rgba(28,107,58,0.09);
            --alert-ok-left:       #3a8a5a;
            --alert-ok-color:      #1c6b3a;
            /* Backgrounds */
            --grid-line:           rgba(0,0,0,0.04);
            --blob-1:              rgba(107,155,122,0.11);
            --blob-2:              rgba(100,130,200,0.08);
            --blob-3:              rgba(179,155,107,0.06);
            /* Inputs */
            --field-input-hover:   rgba(0,0,0,0.03);
            --field-toggle-hover:  rgba(0,0,0,0.06);
            --field-input-bg:      #d8e8da;
            /* Dropdown */
            --dropdown-bg:         #ecf4ed;
            --dropdown-border:     rgba(0,0,0,0.11);
            --dropdown-shadow:     0 8px 24px rgba(0,0,0,0.13);
            --npp-item-border:     rgba(0,0,0,0.06);
            /* Back button */
            --btn-back-bg:         rgba(28,107,58,0.09);
            --btn-back-bg-hover:   rgba(28,107,58,0.16);
            /* Theme toggle */
            --toggle-bg:           rgba(0,0,0,0.05);
            --toggle-border:       rgba(0,0,0,0.09);
            --toggle-color:        #4a574a;
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
            --md-elevation-2:      0 3px 8px rgba(0,0,0,0.5);
            --md-elevation-4:      0 6px 16px rgba(0,0,0,0.6);
            --md-elevation-8:      0 12px 32px rgba(0,0,0,0.7);
            --accent:              #8bc99f;
            --accent-hover:        #aaddb8;
            --accent-bg:           rgba(107,155,122,0.12);
            --accent-bg-btn:       rgba(107,155,122,0.18);
            --accent-bg-hover:     rgba(107,155,122,0.30);
            --accent-border:       rgba(107,155,122,0.28);
            --accent-border-btn:   rgba(107,155,122,0.40);
            --accent-border-focus: rgba(107,155,122,0.60);
            --accent-border-hover: rgba(107,155,122,0.65);
            --accent-glow-sm:      0 4px 16px rgba(107,155,122,0.15);
            --accent-red:          #d98989;
            --accent-red-bg:       rgba(179,107,107,0.15);
            --alert-error-bg:      rgba(179,107,107,0.12);
            --alert-error-left:    #b36b6b;
            --alert-error-color:   #d98989;
            --alert-ok-bg:         rgba(107,155,122,0.12);
            --alert-ok-left:       #6b9b7a;
            --alert-ok-color:      #8bc99f;
            --grid-line:           rgba(255,255,255,0.015);
            --blob-1:              rgba(107,155,122,0.06);
            --blob-2:              rgba(100,130,200,0.05);
            --blob-3:              rgba(179,155,107,0.04);
            --field-input-hover:   rgba(255,255,255,0.04);
            --field-toggle-hover:  rgba(255,255,255,0.06);
            --field-input-bg:      var(--md-bg-elevated);
            --dropdown-bg:         #1e1e1e;
            --dropdown-border:     rgba(255,255,255,0.12);
            --dropdown-shadow:     0 8px 24px rgba(0,0,0,0.60);
            --npp-item-border:     rgba(255,255,255,0.04);
            --btn-back-bg:         rgba(107,155,122,0.10);
            --btn-back-bg-hover:   rgba(107,155,122,0.20);
            --toggle-bg:           rgba(255,255,255,0.06);
            --toggle-border:       rgba(255,255,255,0.10);
            --toggle-color:        #b0b0b0;
        }

        @keyframes fadeUp  { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeIn  { from { opacity:0; } to { opacity:1; } }
        @keyframes spin    { to { transform:rotate(360deg); } }
        @keyframes pulse   { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.05); } }

        html, body {
            height: 100%;
            font-family: 'Inter', sans-serif;
            background: var(--md-bg-primary);
            color: var(--md-text-primary);
            transition: background-color 0.3s, color 0.3s;
        }

        /* ── Background dekoratif ── */
        .bg-layer {
            position: fixed; inset: 0; overflow: hidden; z-index: 0;
            pointer-events: none;
        }
        .bg-blob {
            position: absolute; border-radius: 50%;
            filter: blur(80px); animation: pulse 8s ease-in-out infinite;
        }
        .bg-blob-1 { width:500px; height:500px; background:var(--blob-1); top:-120px; left:-100px; animation-delay:0s; }
        .bg-blob-2 { width:400px; height:400px; background:var(--blob-2); bottom:-100px; right:-80px; animation-delay:3s; }
        .bg-blob-3 { width:300px; height:300px; background:var(--blob-3); top:40%; left:55%; animation-delay:5s; }
        .bg-grid {
            position: absolute; inset: 0;
            background-image:
                linear-gradient(var(--grid-line) 1px, transparent 1px),
                linear-gradient(90deg, var(--grid-line) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* ── Wrapper ── */
        .page-wrap {
            position: relative; z-index: 1;
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            padding: 24px;
        }

        /* ── Card ── */
        .login-card {
            width: 100%; max-width: 420px;
            background: var(--md-bg-card);
            border: 1px solid var(--md-border);
            border-radius: 20px;
            box-shadow: var(--md-elevation-8);
            overflow: hidden;
            animation: fadeUp 0.45s cubic-bezier(0.4,0,0.2,1) both;
        }

        /* ── Card header strip ── */
        .card-top {
            padding: 32px 32px 28px;
            border-bottom: 1px solid var(--md-divider);
            background: var(--md-bg-elevated);
        }
        .card-top-brand {
            display: flex; align-items: center; gap: 12px; margin-bottom: 20px;
        }
        .brand-icon {
            width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
            background: var(--accent-bg);
            border: 1px solid var(--accent-border);
            color: var(--accent);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
        }
        .brand-text h1 {
            font-size: 1rem; font-weight: 700;
            color: var(--md-text-primary); margin: 0;
            letter-spacing: -0.01em;
        }
        .brand-text p {
            font-size: 0.75rem; color: var(--md-text-disabled);
            margin: 2px 0 0;
        }
        .card-top h2 {
            font-size: 1.5rem; font-weight: 700;
            color: var(--md-text-primary);
            letter-spacing: -0.02em; margin: 0 0 6px;
        }
        .card-top p {
            font-size: 0.875rem; color: var(--md-text-secondary); margin: 0;
        }

        /* ── Form body ── */
        .card-body { padding: 28px 32px 32px; background: var(--md-bg-card); }

        .field { margin-bottom: 18px; }
        .field-label {
            display: block;
            font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.08em;
            color: var(--md-text-disabled);
            margin-bottom: 8px;
        }
        .field-wrap {
            position: relative;
            display: flex; align-items: center;
        }
        .field-icon {
            position: absolute; left: 14px; z-index: 1;
            font-size: 0.95rem; color: var(--md-text-disabled);
            pointer-events: none;
            transition: color 0.18s;
        }
        .field-input {
            width: 100%; padding: 12px 14px 12px 40px;
            background: var(--field-input-bg);
            border: 1px solid var(--md-border);
            border-radius: 10px;
            color: var(--md-text-primary);
            font-size: 0.9375rem; font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
        }
        .field-input:hover { background: var(--field-input-hover); }
        .field-input:focus {
            border-color: var(--accent-border-focus);
            box-shadow: 0 0 0 3px var(--accent-bg);
        }
        .field-wrap:focus-within .field-icon { color: var(--accent); }
        .field-input::placeholder { color: var(--md-text-disabled); }

        /* Password toggle */
        .field-toggle {
            position: absolute; right: 12px;
            background: none; border: none; padding: 4px;
            color: var(--md-text-disabled); cursor: pointer;
            font-size: 0.95rem; border-radius: 6px;
            transition: color 0.15s, background 0.15s;
            display: flex; align-items: center; justify-content: center;
        }
        .field-toggle:hover {
            color: var(--md-text-secondary);
            background: var(--field-toggle-hover);
        }

        /* ── Submit button ── */
        .btn-login {
            width: 100%; padding: 13px 20px;
            border-radius: 10px;
            background: var(--accent-bg-btn);
            border: 1px solid var(--accent-border-btn);
            color: var(--accent);
            font-size: 0.9375rem; font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer; letter-spacing: 0.01em;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: all 0.18s cubic-bezier(0.4,0,0.2,1);
            margin-top: 8px;
        }
        .btn-login:hover:not(:disabled) {
            background: var(--accent-bg-hover);
            border-color: var(--accent-border-hover);
            color: var(--accent-hover);
            transform: translateY(-1px);
            box-shadow: var(--accent-glow-sm);
        }
        .btn-login:active:not(:disabled) { transform: translateY(0); }
        .btn-login:disabled { opacity: 0.35; cursor: not-allowed; }

        /* Spinner */
        .btn-spinner {
            width: 16px; height: 16px;
            border: 2px solid var(--accent-border);
            border-top-color: var(--accent);
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            display: none;
        }

        /* ── Alert ── */
        .lg-alert {
            display: none; align-items: flex-start; gap: 10px;
            padding: 12px 14px; border-radius: 10px;
            font-size: 0.855rem; margin-bottom: 18px;
            border-left: 3px solid;
            animation: fadeUp 0.2s ease-out;
        }
        .lg-alert.show { display: flex; }
        .lg-alert i { flex-shrink: 0; margin-top: 1px; font-size: 0.9rem; }
        .lg-alert.danger {
            background: var(--alert-error-bg);
            border-color: var(--alert-error-left);
            color: var(--alert-error-color);
        }
        .lg-alert.success {
            background: var(--alert-ok-bg);
            border-color: var(--alert-ok-left);
            color: var(--alert-ok-color);
        }

        /* ── Footer note ── */
        .card-footer-note {
            text-align: center; margin-top: 22px;
            font-size: 0.78rem; color: var(--md-text-disabled);
            padding-top: 20px; border-top: 1px solid var(--md-divider);
        }

        /* ── NPP History Dropdown ── */
        .npp-wrap { position: relative; }
        .npp-dropdown {
            position: absolute; top: calc(100% + 6px); left: 0; right: 0;
            background: var(--dropdown-bg);
            border: 1px solid var(--dropdown-border);
            border-radius: 10px;
            box-shadow: var(--dropdown-shadow);
            z-index: 999; overflow: hidden;
            display: none;
            animation: fadeUp 0.15s ease-out both;
        }
        .npp-dropdown.show { display: block; }
        .npp-dropdown-head {
            padding: 8px 12px 6px;
            font-size: 0.68rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.08em;
            color: var(--md-text-disabled);
            border-bottom: 1px solid var(--md-divider);
        }
        .npp-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; cursor: pointer;
            transition: background 0.15s;
            border-bottom: 1px solid var(--npp-item-border);
        }
        .npp-item:last-child { border-bottom: none; }
        .npp-item:hover { background: var(--accent-bg); }
        .npp-item-icon {
            width: 28px; height: 28px; border-radius: 7px; flex-shrink: 0;
            background: var(--accent-bg);
            border: 1px solid var(--accent-border);
            color: var(--accent);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.75rem;
        }
        .npp-item-text { flex: 1; }
        .npp-item-npp {
            font-size: 0.875rem; font-weight: 600;
            color: var(--md-text-primary); line-height: 1.2;
        }
        .npp-item-del {
            width: 22px; height: 22px; border-radius: 5px;
            background: transparent; border: none;
            color: var(--md-text-disabled); cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.7rem; transition: all 0.15s; flex-shrink: 0;
        }
        .npp-item-del:hover {
            background: var(--accent-red-bg);
            color: var(--accent-red);
        }

        /* ── Back button ── */
        .btn-back {
            position: fixed; top: 20px; left: 20px; z-index: 100;
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 0.845rem; font-weight: 500;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
            padding: 9px 16px; border-radius: 10px;
            border: 1px solid var(--accent-border);
            background: var(--btn-back-bg);
            color: var(--accent);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.18s cubic-bezier(0.4,0,0.2,1);
            animation: fadeIn 0.4s ease-out both;
        }
        .btn-back i { font-size: 0.85rem; }
        .btn-back:hover {
            background: var(--btn-back-bg-hover);
            border-color: var(--accent-border-hover);
            color: var(--accent-hover);
            transform: translateX(-2px);
        }

        /* ── Theme toggle button ── */
        .theme-toggle {
            position: fixed; top: 20px; right: 20px; z-index: 100;
            width: 38px; height: 38px; border-radius: 10px;
            background: var(--toggle-bg);
            border: 1px solid var(--toggle-border);
            color: var(--toggle-color);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.9rem; cursor: pointer;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.22s;
            animation: fadeIn 0.4s ease-out both;
        }
        .theme-toggle:hover {
            background: var(--accent-bg);
            border-color: var(--accent-border);
            color: var(--accent);
            transform: rotate(18deg) scale(1.08);
        }
    </style>
</head>
<body>

<!-- Background dekoratif -->
<div class="bg-layer">
    <div class="bg-grid"></div>
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>
    <div class="bg-blob bg-blob-3"></div>
</div>

<!-- Tombol kembali -->
<a href="/" class="btn-back">
    <i class="bi bi-arrow-left"></i> Kembali
</a>

<!-- Tombol theme toggle -->
<button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
    <i class="bi bi-moon-fill" id="themeIcon"></i>
</button>

<div class="page-wrap">
    <div class="login-card">

        <!-- Header -->
        <div class="card-top">
            <div class="card-top-brand">
                <div class="brand-icon"><i class="bi bi-link-45deg"></i></div>
                <div class="brand-text">
                    <h1>ShortLink</h1>
                    <p>Portal Pegawai</p>
                </div>
            </div>
            <h2>Selamat datang</h2>
            <p>Masuk dengan akun Portal Pegawai Anda</p>
        </div>

        <!-- Form -->
        <div class="card-body">

            <div class="lg-alert danger" id="alertBox" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span id="alertText"></span>
            </div>

            <form id="loginForm" novalidate>
                @csrf

                <!-- NPP -->
                <div class="field">
                    <label class="field-label" for="npp">NPP</label>
                    <div class="field-wrap npp-wrap" id="nppWrap">
                        <i class="bi bi-person field-icon"></i>
                        <input class="field-input" type="text" id="npp" name="npp"
                               placeholder="Masukkan NPP Anda"
                               autocomplete="off" required spellcheck="false">
                        <div class="npp-dropdown" id="nppDropdown"></div>
                    </div>
                </div>

                <!-- Password -->
                <div class="field">
                    <label class="field-label" for="password">Password</label>
                    <div class="field-wrap">
                        <i class="bi bi-lock field-icon" id="lockIcon"></i>
                        <input class="field-input" type="password" id="password" name="password"
                               placeholder="Masukkan password"
                               autocomplete="current-password" required
                               style="padding-right:44px;">
                        <button type="button" class="field-toggle" id="togglePw" tabindex="-1"
                                onclick="togglePassword()" title="Tampilkan/sembunyikan password">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <input type="hidden" id="hwid" name="hwid" value="web-browser-client">

                <button type="submit" class="btn-login" id="btnSubmit">
                    <span class="btn-spinner" id="btnSpinner"></span>
                    <i class="bi bi-box-arrow-in-right" id="btnIcon"></i>
                    <span id="btnText">Masuk</span>
                </button>
            </form>

            <div class="card-footer-note">
                Gunakan kredensial Portal Pegawai yang aktif
            </div>
        </div>

    </div>
</div>

<script>
    // ══ THEME ════════════════════════════════════════════════════
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
    }

    function _syncThemeIcon(theme) {
        const icon = document.getElementById('themeIcon');
        if (!icon) return;
        icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
    }

    _syncThemeIcon(document.documentElement.getAttribute('data-theme') || 'light');

    // ══ TOGGLE PASSWORD ══════════════════════════════════════════
    function togglePassword() {
        const input    = document.getElementById('password');
        const eyeIcon  = document.getElementById('eyeIcon');
        const lockIcon = document.getElementById('lockIcon');
        if (input.type === 'password') {
            input.type         = 'text';
            eyeIcon.className  = 'bi bi-eye-slash';
            lockIcon.className = 'bi bi-unlock field-icon';
        } else {
            input.type         = 'password';
            eyeIcon.className  = 'bi bi-eye';
            lockIcon.className = 'bi bi-lock field-icon';
        }
    }

    // ══ ALERT ════════════════════════════════════════════════════
    function showAlert(type, msg) {
        const box  = document.getElementById('alertBox');
        const text = document.getElementById('alertText');
        box.className = `lg-alert ${type} show`;
        text.textContent = msg;
    }
    function hideAlert() {
        document.getElementById('alertBox').className = 'lg-alert danger';
    }

    // ══ LOADING STATE ════════════════════════════════════════════
    function setLoading(on) {
        const btn     = document.getElementById('btnSubmit');
        const spinner = document.getElementById('btnSpinner');
        const icon    = document.getElementById('btnIcon');
        const text    = document.getElementById('btnText');
        btn.disabled          = on;
        spinner.style.display = on  ? 'block' : 'none';
        icon.style.display    = on  ? 'none'  : '';
        text.textContent      = on  ? 'Memproses...' : 'Masuk';
    }

    // ══ FORM SUBMIT ══════════════════════════════════════════════
    document.getElementById('loginForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        hideAlert();

        const npp      = document.getElementById('npp').value.trim();
        const password = document.getElementById('password').value;
        const hwid     = document.getElementById('hwid').value;

        if (!npp || !password) {
            showAlert('danger', 'NPP dan password tidak boleh kosong.');
            return;
        }

        setLoading(true);

        const url = "{{ config('services.portal_pegawai.login_url') }}";

        try {
            const resp = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ npp, password, hwid }),
            });

            const data = await resp.json();

            if (resp.ok && data.status === 200) {
                localStorage.setItem('auth_response', JSON.stringify(data));
                if (data.data?.access_token) {
                    localStorage.setItem('access_token', data.data.access_token);
                }
                saveNppToHistory(npp);
                showAlert('success', 'Login berhasil! Mengalihkan...');
                setTimeout(() => window.location.href = '/dashboard', 1200);
            } else {
                throw new Error(data.message || 'NPP atau password salah.');
            }

        } catch(err) {
            showAlert('danger', err.message || 'Terjadi kesalahan. Coba lagi.');
            setLoading(false);
        }
    });

    // ══ NPP HISTORY ══════════════════════════════════════════════
    const NPP_HISTORY_KEY = 'npp_history';

    function esc(s) {
        return String(s || '')
            .replace(/&/g,'&amp;').replace(/"/g,'&quot;')
            .replace(/'/g,'&#39;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function getNppHistory() {
        try { return JSON.parse(localStorage.getItem(NPP_HISTORY_KEY)) || []; }
        catch(e) { return []; }
    }

    function saveNppToHistory(npp) {
        let hist = getNppHistory().filter(h => h.npp !== npp);
        hist.unshift({ npp });
        hist = hist.slice(0, 5);
        localStorage.setItem(NPP_HISTORY_KEY, JSON.stringify(hist));
    }

    function deleteNppFromHistory(npp) {
        const hist = getNppHistory().filter(h => h.npp !== npp);
        localStorage.setItem(NPP_HISTORY_KEY, JSON.stringify(hist));
        renderNppDropdown();
    }

    function renderNppDropdown() {
        const dropdown = document.getElementById('nppDropdown');
        if (!dropdown) return;
        const hist     = getNppHistory();
        const query    = document.getElementById('npp').value.trim().toLowerCase();
        const filtered = query ? hist.filter(h => h.npp.toLowerCase().includes(query)) : hist;

        if (!filtered.length) { dropdown.classList.remove('show'); return; }

        dropdown.innerHTML =
            '<div class="npp-dropdown-head"><i class="bi bi-clock-history"></i> Riwayat Login</div>' +
            filtered.map(h => `
                <div class="npp-item" onclick="selectNpp('${esc(h.npp)}')">
                    <div class="npp-item-icon"><i class="bi bi-person"></i></div>
                    <div class="npp-item-text">
                        <div class="npp-item-npp">${esc(h.npp)}</div>
                    </div>
                    <button class="npp-item-del" onclick="event.stopPropagation();deleteNppFromHistory('${esc(h.npp)}')" title="Hapus">
                        <i class="bi bi-x"></i>
                    </button>
                </div>`
            ).join('');
        dropdown.classList.add('show');
    }

    function selectNpp(npp) {
        document.getElementById('npp').value = npp;
        document.getElementById('nppDropdown').classList.remove('show');
        document.getElementById('password').focus();
    }

    document.getElementById('npp').addEventListener('focus', renderNppDropdown);
    document.getElementById('npp').addEventListener('input', renderNppDropdown);
    document.addEventListener('click', function(e) {
        const wrap = document.getElementById('nppWrap');
        if (wrap && !wrap.contains(e.target)) {
            document.getElementById('nppDropdown').classList.remove('show');
        }
    });

    // ── Auto redirect jika sudah login ───────────────
    if (localStorage.getItem('auth_response')) {
        window.location.href = '/dashboard';
    }
</script>
</body>
</html>
