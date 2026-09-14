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
   PROFIL & PENGATURAN — theme-aware tokens
===================================================== */

/* ── Light mode tokens ── */
:root {
    /* Avatar */
    --pf-avatar-bg:          rgba(28,107,58,0.12);
    --pf-avatar-bd:          rgba(28,107,58,0.30);
    --pf-avatar-cl:          #1c6b3a;

    /* Badge (status aktif) */
    --pf-badge-bg:           rgba(28,107,58,0.11);
    --pf-badge-bd:           rgba(28,107,58,0.28);
    --pf-badge-cl:           #1c6b3a;

    /* Card head icons */
    --pf-icon-blue-bg:       rgba(43,90,140,0.10);
    --pf-icon-blue-cl:       #2b5a8c;
    --pf-icon-blue-bd:       rgba(43,90,140,0.22);
    --pf-icon-green-bg:      rgba(28,107,58,0.10);
    --pf-icon-green-cl:      #1c6b3a;
    --pf-icon-green-bd:      rgba(28,107,58,0.22);
    --pf-icon-red-bg:        rgba(137,34,34,0.09);
    --pf-icon-red-cl:        #892222;
    --pf-icon-red-bd:        rgba(137,34,34,0.22);

    /* Stat mini cards */
    --pf-stat-mini-bg:       #d5e5d9;
    --pf-stat-mini-bd:       rgba(0,0,0,0.08);
    --pf-stat-val-link:      #1c6b3a;
    --pf-stat-val-visit:     #2b5a8c;
    --pf-stat-val-qr:        #7a5010;

    /* Mono value chip */
    --pf-mono-bg:            rgba(0,0,0,0.05);
    --pf-mono-bd:            rgba(0,0,0,0.10);

    /* Logout button */
    --pf-logout-bg:          rgba(137,34,34,0.09);
    --pf-logout-bd:          rgba(137,34,34,0.28);
    --pf-logout-cl:          #892222;
    --pf-logout-bg-h:        rgba(137,34,34,0.18);
    --pf-logout-bd-h:        rgba(137,34,34,0.50);
    --pf-logout-cl-h:        #6e1a1a;

    /* Background */
    --bg-grid-line:          rgba(0,0,0,0.04);
    --bg-blob-1:             rgba(107,155,122,0.09);
    --bg-blob-2:             rgba(100,130,200,0.06);
    --bg-blob-3:             rgba(179,155,107,0.05);
}

/* ── Dark mode tokens ── */
[data-theme="dark"] {
    --pf-avatar-bg:          rgba(107,155,122,0.15);
    --pf-avatar-bd:          rgba(107,155,122,0.35);
    --pf-avatar-cl:          #8bc99f;

    --pf-badge-bg:           rgba(107,155,122,0.15);
    --pf-badge-bd:           rgba(107,155,122,0.30);
    --pf-badge-cl:           #8bc99f;

    --pf-icon-blue-bg:       rgba(154,176,197,0.15);
    --pf-icon-blue-cl:       #c2d4e8;
    --pf-icon-blue-bd:       rgba(154,176,197,0.25);
    --pf-icon-green-bg:      rgba(107,155,122,0.15);
    --pf-icon-green-cl:      #8bc99f;
    --pf-icon-green-bd:      rgba(107,155,122,0.25);
    --pf-icon-red-bg:        rgba(179,107,107,0.15);
    --pf-icon-red-cl:        #d98989;
    --pf-icon-red-bd:        rgba(179,107,107,0.25);

    --pf-stat-mini-bg:       var(--md-bg-elevated);
    --pf-stat-mini-bd:       rgba(255,255,255,0.08);
    --pf-stat-val-link:      #8bc99f;
    --pf-stat-val-visit:     #c2d4e8;
    --pf-stat-val-qr:        #d9b97a;

    --pf-mono-bg:            var(--md-bg-elevated);
    --pf-mono-bd:            rgba(255,255,255,0.10);

    --pf-logout-bg:          rgba(179,107,107,0.15);
    --pf-logout-bd:          rgba(179,107,107,0.35);
    --pf-logout-cl:          #d98989;
    --pf-logout-bg-h:        rgba(179,107,107,0.28);
    --pf-logout-bd-h:        rgba(179,107,107,0.58);
    --pf-logout-cl-h:        #f0a0a0;

    --bg-grid-line:          rgba(255,255,255,0.018);
    --bg-blob-1:             rgba(107,155,122,0.06);
    --bg-blob-2:             rgba(100,130,200,0.04);
    --bg-blob-3:             rgba(179,155,107,0.03);
}

@keyframes pulse  { 0%,100% { opacity:0.4; transform:scale(1); } 50% { opacity:0.7; transform:scale(1.08); } }
@keyframes fadeUp { from { opacity:0; transform:translateY(14px); } to { opacity:1; transform:translateY(0); } }

/* ── Header ── */
.pf-header { margin-bottom:28px; animation:fadeUp 0.35s ease-out both; }
.pf-header h2 {
    font-size:1.75rem; font-weight:700; color:var(--md-text-primary);
    letter-spacing:-0.02em; margin:0 0 4px;
}
.pf-header p { font-size:0.9375rem; color:var(--md-text-secondary); margin:0; }

/* ── Avatar card ── */
.pf-avatar-card {
    background:var(--md-bg-card); border:1px solid var(--md-border);
    border-radius:14px; box-shadow:var(--md-elevation-2);
    padding:28px 24px; margin-bottom:20px;
    display:flex; align-items:center; gap:20px; flex-wrap:wrap;
    animation:fadeUp 0.4s 0.05s ease-out both;
}
.pf-avatar {
    width:72px; height:72px; border-radius:18px; flex-shrink:0;
    background:var(--pf-avatar-bg); border:2px solid var(--pf-avatar-bd);
    display:flex; align-items:center; justify-content:center;
    font-size:1.9rem; color:var(--pf-avatar-cl); font-weight:700;
}
.pf-avatar-info h3 {
    font-size:1.25rem; font-weight:700; color:var(--md-text-primary);
    margin:0 0 4px; letter-spacing:-0.01em;
}
.pf-avatar-info p { margin:0; font-size:0.875rem; color:var(--md-text-secondary); }
.pf-badge {
    margin-left:auto; padding:6px 14px; border-radius:20px;
    font-size:0.78rem; font-weight:600;
    background:var(--pf-badge-bg); border:1px solid var(--pf-badge-bd);
    color:var(--pf-badge-cl);
}

/* ── Info card ── */
.pf-card {
    background:var(--md-bg-card); border:1px solid var(--md-border);
    border-radius:14px; box-shadow:var(--md-elevation-2);
    overflow:hidden; margin-bottom:20px;
    animation:fadeUp 0.4s ease-out both;
}
.pf-card:nth-child(3) { animation-delay:0.10s; }
.pf-card:nth-child(4) { animation-delay:0.16s; }
.pf-card:nth-child(5) { animation-delay:0.22s; }

.pf-card-head {
    padding:16px 22px; border-bottom:1px solid var(--md-border);
    background:var(--md-bg-elevated);
    display:flex; align-items:center; gap:10px;
}
.pf-card-head-icon {
    width:32px; height:32px; border-radius:8px; flex-shrink:0;
    display:flex; align-items:center; justify-content:center; font-size:0.875rem;
}
.pf-card-head-icon.blue  {
    background:var(--pf-icon-blue-bg);
    color:var(--pf-icon-blue-cl);
    border:1px solid var(--pf-icon-blue-bd);
}
.pf-card-head-icon.green {
    background:var(--pf-icon-green-bg);
    color:var(--pf-icon-green-cl);
    border:1px solid var(--pf-icon-green-bd);
}
.pf-card-head-icon.red   {
    background:var(--pf-icon-red-bg);
    color:var(--pf-icon-red-cl);
    border:1px solid var(--pf-icon-red-bd);
}
.pf-card-head h5 { margin:0; font-size:0.9rem; font-weight:600; color:var(--md-text-primary); }

/* ── Info rows ── */
.pf-row {
    display:flex; align-items:flex-start; gap:12px;
    padding:14px 22px; border-bottom:1px solid var(--md-border);
}
.pf-row:last-child { border-bottom:none; }
.pf-row-icon {
    width:32px; height:32px; border-radius:7px; flex-shrink:0;
    background:var(--md-bg-elevated); border:1px solid var(--md-border);
    display:flex; align-items:center; justify-content:center;
    font-size:0.8rem; color:var(--md-text-disabled); margin-top:2px;
}
.pf-row-label {
    font-size:0.7rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.08em; color:var(--md-text-disabled); margin-bottom:3px;
}
.pf-row-value { font-size:0.9rem; color:var(--md-text-primary); word-break:break-word; }
.pf-row-value.mono {
    font-family:'Courier New', monospace; font-size:0.875rem;
    background:var(--pf-mono-bg); border:1px solid var(--pf-mono-bd);
    padding:3px 10px; border-radius:6px; display:inline-block;
}

/* ── Stat mini cards ── */
.pf-stats-grid {
    display:grid; grid-template-columns:repeat(3,1fr); gap:14px;
    padding:18px 22px;
}
@media(max-width:600px) { .pf-stats-grid { grid-template-columns:1fr; } }
.pf-stat-mini {
    background:var(--pf-stat-mini-bg); border:1px solid var(--pf-stat-mini-bd);
    border-radius:10px; padding:14px 16px; text-align:center;
}
.pf-stat-mini-val {
    font-size:1.5rem; font-weight:700; color:var(--md-text-primary); line-height:1;
}
.pf-stat-mini-lbl {
    font-size:0.68rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.07em; color:var(--md-text-disabled); margin-top:6px;
}
.pf-stat-mini:nth-child(1) .pf-stat-mini-val { color:var(--pf-stat-val-link); }
.pf-stat-mini:nth-child(2) .pf-stat-mini-val { color:var(--pf-stat-val-visit); }
.pf-stat-mini:nth-child(3) .pf-stat-mini-val { color:var(--pf-stat-val-qr); }

/* ── Logout button ── */
.pf-logout-wrap { padding:22px; }
.pf-logout-btn {
    display:inline-flex; align-items:center; gap:8px;
    padding:11px 22px; border-radius:9px;
    background:var(--pf-logout-bg); border:1px solid var(--pf-logout-bd);
    color:var(--pf-logout-cl); font-size:0.875rem; font-weight:500;
    font-family:'Inter',sans-serif; cursor:pointer;
    transition:all 0.18s;
}
.pf-logout-btn:hover {
    background:var(--pf-logout-bg-h); border-color:var(--pf-logout-bd-h);
    color:var(--pf-logout-cl-h); transform:translateY(-1px);
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
    <div class="pf-header">
        <h2>Profil & Pengaturan</h2>
        <p>Informasi akun dan aktivitas Anda.</p>
    </div>

    {{-- Avatar card --}}
    <div class="pf-avatar-card">
        <div class="pf-avatar" id="pfInitial">—</div>
        <div class="pf-avatar-info">
            <h3 id="pfNama">—</h3>
            <p id="pfJabatan">—</p>
        </div>
        <div class="pf-badge" id="pfStatus">—</div>
    </div>

    {{-- Info Pegawai --}}
    <div class="pf-card">
        <div class="pf-card-head">
            <div class="pf-card-head-icon blue"><i class="bi bi-person-fill"></i></div>
            <h5>Informasi Pegawai</h5>
        </div>
        <div class="pf-row">
            <div class="pf-row-icon"><i class="bi bi-person"></i></div>
            <div>
                <div class="pf-row-label">Nama Lengkap</div>
                <div class="pf-row-value" id="pfNamaFull">—</div>
            </div>
        </div>
        <div class="pf-row">
            <div class="pf-row-icon"><i class="bi bi-hash"></i></div>
            <div>
                <div class="pf-row-label">NPP</div>
                <div class="pf-row-value" id="pfNpp">—</div>
            </div>
        </div>
        <div class="pf-row">
            <div class="pf-row-icon"><i class="bi bi-briefcase"></i></div>
            <div>
                <div class="pf-row-label">Jabatan</div>
                <div class="pf-row-value" id="pfJabatanFull">—</div>
            </div>
        </div>
        <div class="pf-row">
            <div class="pf-row-icon"><i class="bi bi-building"></i></div>
            <div>
                <div class="pf-row-label">Unit Kerja</div>
                <div class="pf-row-value" id="pfUnit">—</div>
            </div>
        </div>
        <div class="pf-row">
            <div class="pf-row-icon"><i class="bi bi-check-circle"></i></div>
            <div>
                <div class="pf-row-label">Status Pegawai</div>
                <div class="pf-row-value" id="pfStatusFull">—</div>
            </div>
        </div>
    </div>

    {{-- Statistik akun --}}
    <div class="pf-card">
        <div class="pf-card-head">
            <div class="pf-card-head-icon green"><i class="bi bi-graph-up"></i></div>
            <h5>Aktivitas ShortLink</h5>
        </div>
        <div class="pf-stats-grid">
            <div class="pf-stat-mini">
                <div class="pf-stat-mini-val" id="pfStatLink">—</div>
                <div class="pf-stat-mini-lbl">Total ShortLink</div>
            </div>
            <div class="pf-stat-mini">
                <div class="pf-stat-mini-val" id="pfStatVisit">—</div>
                <div class="pf-stat-mini-lbl">Total Kunjungan</div>
            </div>
            <div class="pf-stat-mini">
                <div class="pf-stat-mini-val" id="pfStatQr">—</div>
                <div class="pf-stat-mini-lbl">Via QR Code</div>
            </div>
        </div>
    </div>

    {{-- Sesi & Keamanan --}}
    <div class="pf-card">
        <div class="pf-card-head">
            <div class="pf-card-head-icon red">
                <i class="bi bi-shield-lock"></i>
            </div>
            <h5>Sesi & Keamanan</h5>
        </div>
        <div class="pf-logout-wrap">
            <button class="pf-logout-btn" onclick="logout()">
                <i class="bi bi-box-arrow-right"></i>
                Keluar dari Akun
            </button>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async () => {
    try {
        const auth    = JSON.parse(localStorage.getItem('auth_response'));
        const user    = auth.data.user;
        const pegawai = user.rl_pegawai;
        const npp     = user.npp;
        const nama    = pegawai.nama || '-';

        document.getElementById('pfInitial').textContent    = nama.charAt(0).toUpperCase();
        document.getElementById('pfNama').textContent       = nama;
        document.getElementById('pfJabatan').textContent    = pegawai.jabatan || '-';
        document.getElementById('pfStatus').textContent     = pegawai.satus_peg || '-';
        document.getElementById('pfNamaFull').textContent   = nama;
        document.getElementById('pfNpp').textContent        = pegawai.npp || npp || '-';
        document.getElementById('pfJabatanFull').textContent= pegawai.jabatan || '-';
        document.getElementById('pfUnit').textContent       = pegawai.satker_formatted || '-';
        document.getElementById('pfStatusFull').textContent = pegawai.satus_peg || '-';

        try {
            const resp = await apiFetch(`/api/data-shortlinks?npp=${encodeURIComponent(npp)}`);
            const res  = await resp.json();
            if (res.status === 'success') {
                const data = res.data || [];
                animateCount('pfStatLink',  data.length);
                animateCount('pfStatVisit', data.reduce((s,i)=>s+(i.visits||0),0));
                animateCount('pfStatQr',    data.reduce((s,i)=>s+(i.visits_qr||0),0));
            }
        } catch(e) {
            ['pfStatLink','pfStatVisit','pfStatQr'].forEach(id =>
                document.getElementById(id).textContent = '—'
            );
        }
    } catch(e) { console.error('Gagal memuat profil', e); }
});

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

function logout() {
    if (confirm('Apakah Anda yakin ingin keluar?')) {
        localStorage.removeItem('auth_response');
        localStorage.removeItem('access_token');
        window.location.href = '/';
    }
}
</script>
@endpush
