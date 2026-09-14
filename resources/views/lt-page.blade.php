<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tree->judul }} — Link Tree</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ── Design tokens — mengikuti pola landing.blade ── */
        :root {
            --bg-primary:     #e2ebe3;
            --bg-card:        #ecf4ed;
            --bg-elevated:    #c4d9c6;
            --text-primary:   #1b211b;
            --text-secondary: #4a574a;
            --text-disabled:  #8a9888;
            --border:         rgba(0,0,0,0.09);
            --divider:        rgba(0,0,0,0.055);
            --elevation-2:    0 2px 8px rgba(0,0,0,0.07);
            --elevation-4:    0 5px 16px rgba(0,0,0,0.11);
            --elevation-8:    0 10px 32px rgba(0,0,0,0.14);
            --grid-line:      rgba(0,0,0,0.04);
            --blob-1:         rgba(107,155,122,0.09);
            --blob-2:         rgba(100,130,200,0.06);
            --blob-3:         rgba(179,155,107,0.05);
            --scrollbar-thumb: rgba(0,0,0,0.18);

            /* Accent — warna tema dari link tree (dioverride inline) */
            --accent:         {{ $tree->tema_warna }};
            --accent-rgb:     {{ implode(',', sscanf($tree->tema_warna, '#%02x%02x%02x')) }};
            --accent-bg:      rgba(var(--accent-rgb), 0.09);
            --accent-border:  rgba(var(--accent-rgb), 0.28);
            --accent-hover:   rgba(var(--accent-rgb), 0.18);
            --link-hover-bg:  rgba(var(--accent-rgb), 0.07);
            --link-hover-bd:  rgba(var(--accent-rgb), 0.22);
            --link-hover-sh:  0 4px 16px rgba(var(--accent-rgb), 0.12);
        }

        [data-theme="dark"] {
            --bg-primary:     #0d0d0d;
            --bg-card:        #1a1a1a;
            --bg-elevated:    #262626;
            --text-primary:   #f5f5f5;
            --text-secondary: #b0b0b0;
            --text-disabled:  #6b6b6b;
            --border:         rgba(255,255,255,0.10);
            --divider:        rgba(255,255,255,0.06);
            --elevation-2:    0 3px 8px rgba(0,0,0,0.5);
            --elevation-4:    0 6px 16px rgba(0,0,0,0.6);
            --elevation-8:    0 12px 32px rgba(0,0,0,0.7);
            --grid-line:      rgba(255,255,255,0.018);
            --blob-1:         rgba(107,155,122,0.07);
            --blob-2:         rgba(100,130,200,0.05);
            --blob-3:         rgba(179,155,107,0.04);
            --scrollbar-thumb: rgba(255,255,255,0.18);
            --link-hover-bg:  rgba(var(--accent-rgb), 0.12);
            --link-hover-bd:  rgba(var(--accent-rgb), 0.30);
            --link-hover-sh:  0 4px 16px rgba(var(--accent-rgb), 0.18);
        }

        @keyframes fadeUp  { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        @keyframes pulse   { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.08); } }

        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
            transition: background-color 0.3s, color 0.3s;
        }

        /* ── Background dekoratif ── */
        .bg-layer { position: fixed; inset: 0; overflow: hidden; z-index: 0; pointer-events: none; }
        .bg-grid {
            position: absolute; inset: 0;
            background-image: linear-gradient(var(--grid-line) 1px, transparent 1px),
                              linear-gradient(90deg, var(--grid-line) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .bg-blob {
            position: absolute; border-radius: 50%; filter: blur(60px);
            animation: pulse 8s ease-in-out infinite;
        }
        .bg-blob-1 { width: 500px; height: 500px; top: -150px; right: -100px; background: var(--blob-1); }
        .bg-blob-2 { width: 400px; height: 400px; bottom: -100px; left: -80px; background: var(--blob-2); animation-delay: -3s; }
        .bg-blob-3 { width: 300px; height: 300px; top: 40%; left: 50%; background: var(--blob-3); animation-delay: -6s; }

        /* ── Theme toggle ── */
        .btn-theme {
            position: fixed; top: 16px; right: 16px; z-index: 100;
            width: 38px; height: 38px;
            border-radius: 50%; border: 1px solid var(--border);
            background: var(--bg-card); color: var(--text-secondary);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; font-size: 15px;
            box-shadow: var(--elevation-2);
            transition: background 0.2s, border-color 0.2s, color 0.2s;
        }
        .btn-theme:hover { background: var(--bg-elevated); color: var(--text-primary); }

        /* ── Layout utama ── */
        .page-wrap {
            position: relative; z-index: 1;
            min-height: 100vh;
            display: flex; flex-direction: column;
            align-items: center;
            padding: 48px 16px 64px;
        }

        /* ── Card container ── */
        .lt-card {
            width: 100%; max-width: 480px;
            animation: fadeUp 0.5s ease both;
        }

        /* ── Avatar / ikon ── */
        .lt-avatar {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: var(--accent-bg);
            border: 2px solid var(--accent-border);
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; color: var(--accent);
            margin: 0 auto 20px;
        }

        /* ── Judul & deskripsi ── */
        .lt-title {
            font-size: 1.5rem; font-weight: 700;
            text-align: center; color: var(--text-primary);
            margin-bottom: 8px; line-height: 1.3;
        }
        .lt-desc {
            font-size: 0.875rem; color: var(--text-secondary);
            text-align: center; line-height: 1.6;
            margin-bottom: 32px;
        }

        /* ── Daftar link ── */
        .lt-links { display: flex; flex-direction: column; gap: 12px; }

        .lt-link {
            display: flex; align-items: center; gap: 14px;
            padding: 14px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            text-decoration: none;
            color: var(--text-primary);
            box-shadow: var(--elevation-2);
            transition: background 0.2s, border-color 0.2s, box-shadow 0.2s, transform 0.2s;
            animation: fadeUp 0.5s ease both;
        }
        .lt-link:hover {
            background: var(--link-hover-bg);
            border-color: var(--link-hover-bd);
            box-shadow: var(--link-hover-sh);
            transform: translateY(-2px);
            color: var(--text-primary);
        }
        .lt-link-icon {
            width: 36px; height: 36px; flex-shrink: 0;
            border-radius: 9px;
            background: var(--accent-bg);
            border: 1px solid var(--accent-border);
            display: flex; align-items: center; justify-content: center;
            color: var(--accent); font-size: 16px;
        }
        .lt-link-label {
            flex: 1;
            font-size: 0.9375rem; font-weight: 500;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .lt-link-arrow {
            color: var(--text-disabled); font-size: 14px; flex-shrink: 0;
            transition: transform 0.2s, color 0.2s;
        }
        .lt-link:hover .lt-link-arrow {
            transform: translateX(3px);
            color: var(--accent);
        }

        /* ── Stagger animasi tiap link ── */
        @for ($i = 0; $i < 20; $i++)
        .lt-links .lt-link:nth-child({{ $i + 1 }}) { animation-delay: {{ $i * 0.07 }}s; }
        @endfor

        /* ── Footer branding ── */
        .lt-footer {
            margin-top: 40px;
            display: flex; align-items: center; justify-content: center; gap: 6px;
            font-size: 0.8rem; color: var(--text-disabled);
            text-decoration: none;
            transition: color 0.2s;
        }
        .lt-footer:hover { color: var(--accent); }
        .lt-footer-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--accent); opacity: 0.5;
        }

        /* ── Empty state ── */
        .lt-empty {
            text-align: center; padding: 32px 0;
            color: var(--text-disabled); font-size: 0.9rem;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--scrollbar-thumb); border-radius: 3px; }
    </style>
</head>
<body>

<div class="bg-layer">
    <div class="bg-grid"></div>
    <div class="bg-blob bg-blob-1"></div>
    <div class="bg-blob bg-blob-2"></div>
    <div class="bg-blob bg-blob-3"></div>
</div>

<button class="btn-theme" onclick="toggleTheme()" title="Ganti tema">
    <i class="bi bi-moon-fill" id="themeIcon"></i>
</button>

<div class="page-wrap">
    <div class="lt-card">

        {{-- Avatar / foto --}}
        @if($tree->foto)
            <div class="lt-avatar" style="background:none;border:3px solid var(--accent);padding:0;overflow:hidden;">
                <img src="{{ $tree->foto }}" alt="{{ $tree->judul }}"
                     style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
            </div>
        @else
            <div class="lt-avatar">
                <i class="bi bi-diagram-3-fill"></i>
            </div>
        @endif

        {{-- Judul --}}
        <h1 class="lt-title">{{ $tree->judul }}</h1>

        {{-- Deskripsi (opsional) --}}
        @if($tree->deskripsi)
            <p class="lt-desc">{{ $tree->deskripsi }}</p>
        @else
            <div style="margin-bottom:32px;"></div>
        @endif

        {{-- Daftar link --}}
        <div class="lt-links">
            @forelse($tree->items as $item)
                <a href="{{ url('lt/' . $tree->kode . '/go/' . $item->id) }}"
                   class="lt-link"
                   target="_blank"
                   rel="noopener noreferrer">
                    <div class="lt-link-icon">
                        <i class="bi bi-link-45deg"></i>
                    </div>
                    <span class="lt-link-label">{{ $item->label }}</span>
                    <i class="bi bi-arrow-right lt-link-arrow"></i>
                </a>
            @empty
                <div class="lt-empty">
                    <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:8px;"></i>
                    Belum ada link tersedia.
                </div>
            @endforelse
        </div>

        {{-- Footer branding --}}
        <a href="{{ url('/') }}" class="lt-footer">
            <div class="lt-footer-dot"></div>
            Dibuat dengan ShortLink Portal Pegawai
        </a>

    </div>
</div>

<script>
    // ── Theme init & toggle ───────────────────────────────────────
    (function () {
        const saved = localStorage.getItem('sl_theme') || 'light';
        document.documentElement.setAttribute('data-theme', saved);
        _syncIcon(saved);
    })();

    function toggleTheme() {
        const html  = document.documentElement;
        const next  = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        html.setAttribute('data-theme', next);
        localStorage.setItem('sl_theme', next);
        _syncIcon(next);
    }

    function _syncIcon(theme) {
        const icon = document.getElementById('themeIcon');
        if (icon) icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
    }
</script>

</body>
</html>
