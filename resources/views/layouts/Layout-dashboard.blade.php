<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Portal Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ══════════════════════════════════
           DESIGN TOKENS — LIGHT MODE (default)
        ══════════════════════════════════ */
        :root {
            --md-bg-primary:     #e2ebe3;
            --md-bg-secondary:   #d5e2d6;
            --md-bg-elevated:    #c4d9c6;
            --md-bg-card:        #ecf4ed;

            --md-text-primary:   #1b211b;
            --md-text-secondary: #4a574a;
            --md-text-disabled:  #8a9888;

            --md-border:         rgba(0,0,0,0.09);
            --md-divider:        rgba(0,0,0,0.06);

            --md-elevation-1:    0 2px 4px rgba(0,0,0,0.06);
            --md-elevation-2:    0 3px 8px rgba(0,0,0,0.08);
            --md-elevation-4:    0 6px 16px rgba(0,0,0,0.11);
            --md-elevation-8:    0 12px 32px rgba(0,0,0,0.13);

            /* Green accent */
            --accent:            #1c6b3a;
            --accent-hover:      #135028;
            --accent-bg:         rgba(28,107,58,0.09);
            --accent-bg-hover:   rgba(28,107,58,0.16);
            --accent-border:     rgba(28,107,58,0.28);
            --accent-border-hover: rgba(28,107,58,0.55);

            /* Red accent */
            --accent-red:        #892222;
            --accent-red-hover:  #6e1a1a;
            --accent-red-bg:     rgba(137,34,34,0.09);
            --accent-red-bg-h:   rgba(137,34,34,0.16);
            --accent-red-border: rgba(137,34,34,0.30);
            --accent-red-bdh:    rgba(137,34,34,0.55);

            /* Sidebar nav */
            --sidebar-bg:        rgba(255,255,255,0.88);
            --sidebar-border:    rgba(0,0,0,0.08);
            --sidebar-shadow:    0 8px 32px rgba(0,0,0,0.10);
            --sidebar-head-bd:   rgba(0,0,0,0.07);
            --nav-link-hover-bg: rgba(28,107,58,0.09);
            --nav-link-hover-bd: rgba(28,107,58,0.24);
            --nav-link-hover-cl: #1c6b3a;
            --nav-link-active-bg:rgba(28,107,58,0.15);
            --nav-link-active-bd:rgba(28,107,58,0.36);
            --nav-link-active-cl:#135028;

            /* Navbar */
            --navbar-bg:         rgba(242,245,242,0.88);
            --navbar-border:     rgba(0,0,0,0.08);
            --navbar-shadow:     0 6px 24px rgba(0,0,0,0.08);

            /* Toggle btn */
            --btn-toggle-hover:  rgba(0,0,0,0.06);

            /* Theme toggle */
            --toggle-bg:         rgba(0,0,0,0.05);
            --toggle-border:     rgba(0,0,0,0.09);
            --toggle-color:      #4a574a;

            /* Overlay */
            --overlay-bg:        rgba(0,0,0,0.35);

            /* Scrollbar */
            --scrollbar-thumb:   rgba(0,0,0,0.18);
            --scrollbar-thumb-h: rgba(0,0,0,0.30);

            /* Body gradient blobs */
            --body-grad-1:       rgba(107,155,122,0.04);
            --body-grad-2:       rgba(107,155,122,0.03);
        }

        /* ══════════════════════════════════
           DESIGN TOKENS — DARK MODE
        ══════════════════════════════════ */
        [data-theme="dark"] {
            --md-bg-primary:     #0d0d0d;
            --md-bg-secondary:   #1a1a1a;
            --md-bg-elevated:    #262626;
            --md-bg-card:        #1a1a1a;

            --md-text-primary:   #f5f5f5;
            --md-text-secondary: #b0b0b0;
            --md-text-disabled:  #6b6b6b;

            --md-border:         rgba(255,255,255,0.10);
            --md-divider:        rgba(255,255,255,0.06);

            --md-elevation-1:    0 2px 4px rgba(0,0,0,0.40);
            --md-elevation-2:    0 3px 8px rgba(0,0,0,0.50);
            --md-elevation-4:    0 6px 16px rgba(0,0,0,0.60);
            --md-elevation-8:    0 12px 32px rgba(0,0,0,0.70);

            --accent:            #8bc99f;
            --accent-hover:      #aaddb8;
            --accent-bg:         rgba(107,155,122,0.12);
            --accent-bg-hover:   rgba(107,155,122,0.22);
            --accent-border:     rgba(107,155,122,0.28);
            --accent-border-hover: rgba(107,155,122,0.60);

            --accent-red:        #d98989;
            --accent-red-hover:  #f0a0a0;
            --accent-red-bg:     rgba(179,107,107,0.18);
            --accent-red-bg-h:   rgba(179,107,107,0.30);
            --accent-red-border: rgba(179,107,107,0.38);
            --accent-red-bdh:    rgba(179,107,107,0.58);

            --sidebar-bg:        rgba(26,26,26,0.82);
            --sidebar-border:    rgba(255,255,255,0.08);
            --sidebar-shadow:    0 8px 32px rgba(0,0,0,0.55);
            --sidebar-head-bd:   rgba(255,255,255,0.07);
            --nav-link-hover-bg: rgba(100,130,200,0.10);
            --nav-link-hover-bd: rgba(100,130,200,0.20);
            --nav-link-hover-cl: #9ab3d9;
            --nav-link-active-bg:rgba(100,130,200,0.18);
            --nav-link-active-bd:rgba(100,130,200,0.38);
            --nav-link-active-cl:#c2d4f0;

            --navbar-bg:         rgba(26,26,26,0.82);
            --navbar-border:     rgba(255,255,255,0.08);
            --navbar-shadow:     0 6px 24px rgba(0,0,0,0.45);

            --btn-toggle-hover:  rgba(255,255,255,0.10);

            --toggle-bg:         rgba(255,255,255,0.06);
            --toggle-border:     rgba(255,255,255,0.10);
            --toggle-color:      #b0b0b0;

            --overlay-bg:        rgba(0,0,0,0.60);

            --scrollbar-thumb:   rgba(255,255,255,0.18);
            --scrollbar-thumb-h: rgba(255,255,255,0.30);

            --body-grad-1:       rgba(128,128,128,0.03);
            --body-grad-2:       rgba(128,128,128,0.03);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 100%; }

        body {
            background-color: var(--md-bg-primary);
            font-family: 'Inter', 'Roboto', sans-serif;
            color: var(--md-text-primary);
            overflow-x: hidden;
            background-image:
                radial-gradient(circle at 20% 50%, var(--body-grad-1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, var(--body-grad-2) 0%, transparent 50%);
            transition: background-color 0.3s, color 0.3s;
        }

        /* ── Layout wrapper ── */
        .wrapper { display: flex; width: 100%; min-height: 100vh; }

        /* ── Overlay (mobile) ── */
        .sidebar-overlay {
            display: none;
            position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            background: var(--overlay-bg);
            backdrop-filter: blur(4px);
            z-index: 998; opacity: 0;
            transition: opacity 0.25s ease;
        }
        .sidebar-overlay.active { display: block; opacity: 1; }

        /* ── Floating Sidebar ── */
        #sidebar {
            width: 240px; min-width: 240px; max-width: 240px;
            position: fixed; top: 10px; left: 10px;
            height: calc(100vh - 20px);
            background: var(--sidebar-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--sidebar-border);
            border-radius: 18px;
            box-shadow: var(--sidebar-shadow);
            z-index: 999;
            overflow-y: auto; overflow-x: hidden;
            display: flex; flex-direction: column;
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1),
                        opacity 0.3s cubic-bezier(0.4,0,0.2,1);
            transform: translateX(calc(-100% - 32px));
            opacity: 0;
            pointer-events: none;
        }
        #sidebar.active {
            transform: translateX(0);
            opacity: 1;
            pointer-events: all;
        }

        #sidebar .sidebar-header {
            padding: 20px 18px 16px;
            background: transparent;
            text-align: left;
            color: var(--md-text-primary);
            border-bottom: 1px solid var(--sidebar-head-bd);
            flex-shrink: 0;
        }
        #sidebar .sidebar-header h3 {
            font-family: 'Inter', sans-serif;
            color: var(--md-text-primary);
            margin: 0;
            font-size: 1.15rem; font-weight: 700; letter-spacing: -0.02em;
        }
        #sidebar .sidebar-header small {
            color: var(--md-text-secondary);
            font-weight: 400; font-size: 0.78rem; letter-spacing: 0.01em;
            display: block; margin-top: 2px;
        }

        #sidebar ul.components { padding: 16px 0; }
        #sidebar ul li { list-style: none; margin: 4px 12px; }
        #sidebar ul li a {
            padding: 9px 14px;
            font-size: 0.875rem; font-weight: 500;
            display: flex; align-items: center;
            color: var(--md-text-secondary);
            text-decoration: none;
            transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
            border-radius: 8px;
            background: transparent;
            border: 1px solid transparent;
            position: relative; letter-spacing: 0.01em;
        }
        #sidebar ul li a:hover {
            background: var(--nav-link-hover-bg);
            border-color: var(--nav-link-hover-bd);
            color: var(--nav-link-hover-cl);
        }
        #sidebar ul li a.active {
            background: var(--nav-link-active-bg);
            border-color: var(--nav-link-active-bd);
            color: var(--nav-link-active-cl);
        }
        #sidebar ul li a i {
            margin-right: 12px;
            width: 20px; text-align: center; font-size: 1.1rem;
        }

        /* ── Content Area ── */
        #content {
            flex: 1; min-width: 0;
            height: 100vh; overflow-y: auto;
            display: flex; flex-direction: column;
            background: var(--md-bg-primary);
            transition: padding-left 0.3s cubic-bezier(0.4,0,0.2,1);
            padding-left: 0;
        }
        #content.sidebar-open { padding-left: 256px; }

        #content .navbar-float-wrap {
            position: sticky; top: 10px; z-index: 100;
            padding: 0 10px; flex-shrink: 0;
            pointer-events: none;
        }
        #content .navbar-float-wrap > * { pointer-events: all; }

        #content .content-wrapper {
            flex: 1; padding: 24px;
            overflow-y: auto; position: relative;
        }

        /* ── Floating Navbar ── */
        .navbar-custom {
            padding: 10px 18px !important;
            background: var(--navbar-bg) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--navbar-border) !important;
            border-radius: 14px;
            box-shadow: var(--navbar-shadow);
            display: flex; align-items: center;
            margin-bottom: 0;
        }
        .navbar-custom .container-fluid {
            background: transparent !important;
            display: flex; width: 100%; align-items: center;
            padding: 0; position: relative;
        }

        /* Toggle sidebar button */
        .btn-toggle {
            background: transparent;
            color: var(--md-text-primary);
            border: 1px solid var(--md-border);
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
            letter-spacing: 0.01em;
            font-size: 0.9375rem;
            border-radius: 8px;
        }
        .btn-toggle:hover {
            background: var(--btn-toggle-hover);
            color: var(--md-text-primary);
            border-color: var(--accent-border);
        }

        /* User info chip */
        .user-info {
            padding: 8px 16px;
            background: var(--md-bg-elevated);
            border: 1px solid var(--md-border);
            margin-right: 12px;
            border-radius: 8px;
            box-shadow: var(--md-elevation-1);
        }
        .user-info span {
            font-size: 0.9375rem;
            color: var(--md-text-primary); font-weight: 500;
        }
        .user-info small {
            color: var(--md-text-secondary);
            font-size: 0.8125rem; font-weight: 400;
        }

        /* Logout button */
        .btn-logout {
            background: var(--accent-red-bg);
            color: var(--accent-red);
            border: 1px solid var(--accent-red-border);
            font-weight: 500;
            padding: 10px 20px;
            transition: all 0.18s cubic-bezier(0.4,0,0.2,1);
            letter-spacing: 0.01em;
            font-size: 0.9375rem;
            border-radius: 8px;
        }
        .btn-logout:hover {
            background: var(--accent-red-bg-h);
            color: var(--accent-red-hover);
            border-color: var(--accent-red-bdh);
            transform: translateY(-1px);
        }

        /* ── Theme Toggle ── */
        .btn-theme {
            width: 38px; height: 38px; border-radius: 8px;
            background: var(--toggle-bg);
            border: 1px solid var(--toggle-border);
            color: var(--toggle-color);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.875rem; cursor: pointer;
            transition: all 0.22s;
            margin-left: 10px; flex-shrink: 0;
        }
        .btn-theme:hover {
            background: var(--accent-bg);
            border-color: var(--accent-border);
            color: var(--accent);
            transform: rotate(18deg) scale(1.08);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .user-info { display: none !important; }
            #content .navbar-custom { padding: 12px 16px !important; }
            #content .content-wrapper { padding: 16px; }
            #sidebar {
                top: 0; left: 0;
                height: 100vh;
                border-radius: 0;
                transform: translateX(-100%);
                opacity: 1;
            }
            #sidebar.active { transform: translateX(0); }
            #content.sidebar-open { padding-left: 0; }
        }
        @media (max-width: 480px) {
            .btn-toggle { padding: 8px 16px; font-size: 0.875rem; }
            .btn-logout  { padding: 8px 16px; font-size: 0.875rem; }
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb {
            background: var(--scrollbar-thumb); border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover { background: var(--scrollbar-thumb-h); }

        /* ANIMATIONS */
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to   { transform: translateX(0); opacity: 1; }
        }

        /* UTILITY */
        .text-gradient {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-hover) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover-lift { transition: transform 0.2s cubic-bezier(0.4,0,0.2,1); }
        .card-hover-lift:hover { transform: translateY(-4px); }
    </style>
</head>
<body>

    <!-- Overlay backdrop -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="wrapper">
        <!-- SIDEBAR -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ShortLink</h3>
                <small>Portal Pegawai</small>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="/dashboard" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
                </li>
                <li>
                    <a href="/data-shortlink"><i class="bi bi-link-45deg"></i> ShortLink</a>
                </li>
                <li>
                    <a href="/linktree"><i class="bi bi-diagram-3-fill"></i> Link Tree</a>
                </li>
                <li>
                    <a href="/statistik"><i class="bi bi-bar-chart-line-fill"></i> Statistik</a>
                </li>
                <li>
                    <a href="/profil"><i class="bi bi-person-circle"></i> Profil & Setting</a>
                </li>
            </ul>
        </nav>

        <!-- CONTENT -->
        <div id="content">
            <div class="navbar-float-wrap">
                <div class="navbar-custom">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-toggle btn-sm">
                            <i class="bi bi-layout-sidebar"></i>
                        </button>

                        <div class="ms-auto d-flex align-items-center">
                            <div class="user-info d-none d-md-block">
                                <span class="d-block fw-medium" id="userNameDisplay"></span>
                                <small class="d-block" id="userNppDisplay" style="color:var(--md-text-disabled);font-size:0.75rem;"></small>
                            </div>
                            <button class="btn btn-logout btn-sm" onclick="logout()">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                            <button class="btn-theme" id="themeToggle" onclick="toggleTheme()" title="Ganti tema">
                                <i class="bi bi-moon-fill" id="themeIcon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-wrapper">
                @yield('content')
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ══ THEME ════════════════════════════════════════════════
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
            _updateNavbarBg();
        }

        function _syncThemeIcon(theme) {
            const icon = document.getElementById('themeIcon');
            if (!icon) return;
            icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
        }

        _syncThemeIcon(document.documentElement.getAttribute('data-theme') || 'light');

        // ══ SIDEBAR ══════════════════════════════════════════════
        document.getElementById('sidebarCollapse').addEventListener('click', function () {
            const sidebar  = document.getElementById('sidebar');
            const content  = document.getElementById('content');
            const overlay  = document.getElementById('sidebarOverlay');
            const isMobile = window.innerWidth <= 768;

            sidebar.classList.toggle('active');
            const isOpen = sidebar.classList.contains('active');
            if (!isMobile) {
                content.classList.toggle('sidebar-open', isOpen);
                sessionStorage.setItem('sidebar_open', isOpen);
            }
            if (isMobile) overlay.classList.toggle('active', isOpen);
        });

        document.getElementById('sidebarOverlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('active');
            document.getElementById('sidebarOverlay').classList.remove('active');
        });

        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const overlay = document.getElementById('sidebarOverlay');
            if (window.innerWidth > 768) {
                overlay.classList.remove('active');
                content.classList.toggle('sidebar-open', sidebar.classList.contains('active'));
            } else {
                content.classList.remove('sidebar-open');
            }
        });

        document.querySelectorAll('#sidebar ul li a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('sidebar').classList.remove('active');
                document.getElementById('content').classList.remove('sidebar-open');
                document.getElementById('sidebarOverlay').classList.remove('active');
                sessionStorage.setItem('sidebar_open', 'false');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth > 768) {
                const isOpen = sessionStorage.getItem('sidebar_open') !== 'false';
                if (isOpen) {
                    document.getElementById('sidebar').classList.add('active');
                    document.getElementById('content').classList.add('sidebar-open');
                }
            }
        });

        // Active Menu
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('#sidebar ul li a').forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                if (href === currentPath ||
                    (currentPath === '/dashboard'     && href === '/dashboard') ||
                    (currentPath === '/data-shortlink'&& href === '/data-shortlink') ||
                    (currentPath === '/linktree'      && href === '/linktree') ||
                    (currentPath === '/statistik'     && href === '/statistik') ||
                    (currentPath === '/profil'        && href === '/profil')) {
                    link.classList.add('active');
                }
            });
        });

        // Navbar scroll bg (theme-aware)
        function _updateNavbarBg() {
            const isDark   = document.documentElement.getAttribute('data-theme') === 'dark';
            const navEl    = document.querySelector('.navbar-custom');
            if (!navEl) return;
            navEl.style.background = isDark
                ? 'rgba(26,26,26,0.92)'
                : 'rgba(242,245,242,0.97)';
        }

        // ── Client-side guard + populate user info ────────────
        // Middleware hanya jaga API. Untuk Blade, guard ini cukup:
        // jika tidak ada token → redirect ke login (tidak loop karena
        // login page hanya redirect ke /dashboard jika auth_response ADA).
        (function () {
            const raw = localStorage.getItem('auth_response');
            const tok = localStorage.getItem('access_token');
            if (!raw || !tok) {
                window.location.replace('/login-portal');
                return;
            }
            try {
                const auth = JSON.parse(raw);
                const user = auth.data.user;
                if (!user || !user.npp) throw new Error();
                document.addEventListener('DOMContentLoaded', function () {
                    document.getElementById('userNameDisplay').innerText = user.name || '-';
                    document.getElementById('userNppDisplay').innerText  = user.npp  || '-';
                });
            } catch (e) {
                localStorage.removeItem('auth_response');
                localStorage.removeItem('access_token');
                window.location.replace('/login-portal');
            }
        })();

        function logout() {
            if(confirm('Apakah anda yakin ingin keluar?')) {
                localStorage.removeItem('auth_response');
                localStorage.removeItem('access_token');
                window.location.href = '/';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('sidebar').classList.remove('active');
                document.getElementById('sidebarOverlay').classList.remove('active');
            }
        });
    </script>

    <script>
        // ── apiFetch helper ───────────────────────────────────
        let _sessionExpired = false;

        async function apiFetch(url, options = {}) {
            const token      = localStorage.getItem('access_token');
            const controller = new AbortController();
            const timeoutId  = setTimeout(() => controller.abort(), 15000); // 15 detik timeout

            try {
                const resp = await fetch(url, {
                    ...options,
                    signal: controller.signal,
                    headers: {
                        'Content-Type':  'application/json',
                        'Accept':        'application/json',
                        'Authorization': `Bearer ${token}`,
                        ...(options.headers || {}),
                    },
                });
                clearTimeout(timeoutId);

                if (resp.status === 401 && !_sessionExpired) {
                    _sessionExpired = true;
                    localStorage.removeItem('auth_response');
                    localStorage.removeItem('access_token');
                    window.location.replace('/login-portal');
                }
                return resp;
            } catch (err) {
                clearTimeout(timeoutId);
                if (err.name === 'AbortError') {
                    throw new Error('Request timeout — server tidak merespons dalam 15 detik.');
                }
                throw err;
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
