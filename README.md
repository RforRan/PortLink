# ShortLink — Portal Pegawai

Platform **URL Shortener** dan **Link Tree** (bio link) untuk pegawai, terintegrasi dengan sistem **Portal Pegawai**. Aplikasi ini memungkinkan pembuatan shortlink, halaman link tree, pelacakan kunjungan (via link & QR Code), serta dashboard analitik real-time.

---

## Fitur Utama

### URL Shortener
- Buat shortlink dengan kode otomatis (base36) atau kode custom
- Redirect otomatis ke URL asli
- Pelacakan kunjungan terpisah: **via link** dan **via QR Code**
- Dukungan judul & deskripsi untuk setiap shortlink
- Manajemen CRUD shortlink (buat, edit, hapus)

### Link Tree (Bio Link)
- Halaman publik multi-link (mirip Linktree)
- Kustomisasi judul, deskripsi, tema warna, dan foto profil
- Upload foto dengan kompresi otomatis (max 400×400 px)
- Kode URL custom atau auto-generate
- Tracking kunjungan halaman & klik per item link
- Perhitungan **CTR (Click-Through Rate)**

### Analitik & Statistik
- Dashboard statistik dengan grafik interaktif (**Chart.js**)
- Filter rentang waktu: 3 jam, 1 hari, 3 hari, 1 minggu, 1 bulan, 3 bulan
- Metrik: total kunjungan, via link, via QR, unique visitors
- Ranking shortlink berdasarkan performa
- Auto-refresh data setiap 2 menit

### QR Code
- Generate QR Code client-side untuk setiap shortlink & link tree
- Endpoint redirect terpisah untuk tracking scan QR
- Unduh QR Code sebagai file PNG

### Mode Tamu (Guest)
- Buat shortlink tanpa login (maks. **3 link/hari**)
- Expired otomatis setelah **30 hari**
- Browser fingerprinting (Canvas, WebGL, Audio) untuk identifikasi perangkat
- Tetap bisa melihat shortlink sendiri meski ganti VPN/IP

### Autentikasi
- Integrasi SSO dengan **Portal Pegawai** (login eksternal)
- Validasi Bearer token via API Portal
- Cache validasi token selama 5 menit
- Guard client-side + middleware server-side

### UI/UX
- Dark mode & light mode
- Desain responsif (mobile & desktop)
- Sidebar collapsible dengan state persistence
- Material Design-inspired dengan CSS custom properties

---

## Tech Stack

| Layer | Teknologi |
|-------|-----------|
| **Backend** | PHP 8.2, Laravel 12 |
| **Database** | MySQL 8.0 / SQLite |
| **Frontend** | Blade, Bootstrap 5, Vanilla JavaScript |
| **Build Tool** | Vite 7, Tailwind CSS 4 |
| **Chart** | Chart.js 4.4 |
| **QR Code** | QRCode.js |
| **HTTP Client** | Axios, Fetch API |
| **Container** | Docker, Docker Compose, Nginx, PHP-FPM |
| **Dev Tools** | Laragon, Composer, npm, Laravel Pint, PHPUnit |

---

## Prasyarat

- PHP >= 8.2
- Composer
- Node.js >= 18 & npm
- MySQL 8.0 (atau SQLite untuk development)
- Git

**Untuk Docker:**
- Docker & Docker Compose

---

## Instalasi

### Opsi 1: Laragon (Development Lokal)

```bash
# Clone repository
git clone <url-repo> shortlink
cd shortlink

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di .env, lalu:
php artisan migrate

# Build assets
npm run build

# Jalankan server
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

### Opsi 2: Docker

```bash
# Dari folder docker/
docker compose up -d --build
```

Akses aplikasi di: `http://localhost:8080`  
MySQL tersedia di port: `3307`

### Setup Cepat (Composer Script)

```bash
composer setup
```

Script ini menjalankan: `composer install`, copy `.env`, generate key, migrate, `npm install`, dan `npm run build`.

---

## Environment Variables

Tambahkan konfigurasi berikut di file `.env`:

```env
APP_NAME="ShortLink Portal Pegawai"
APP_URL=http://localhost:8000

# Database (MySQL)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=main
DB_USERNAME=root
DB_PASSWORD=

# Portal Pegawai (SSO)
PORTAL_LOGIN_URL=https://portal.example.com/api/login
PORTAL_CEK_TOKEN_URL=https://portal.example.com/api/cek-token

# Session & Cache
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

---

## Menjalankan Development

```bash
# Jalankan semua service sekaligus (server, queue, logs, vite)
composer dev
```

Atau jalankan terpisah:

```bash
php artisan serve          # Backend server
npm run dev                # Vite dev server (hot reload)
php artisan queue:listen   # Queue worker
php artisan pail           # Log viewer
```

---

## Struktur Halaman

| Route | Deskripsi | Auth |
|-------|-----------|------|
| `/` | Landing page + guest shortlink | Publik |
| `/login-portal` | Halaman login SSO | Publik |
| `/dashboard` | Dashboard utama | Protected |
| `/data-shortlink` | Manajemen shortlink | Protected |
| `/statistik` | Dashboard analitik | Protected |
| `/linktree` | Manajemen link tree | Protected |
| `/profil` | Profil pegawai | Protected |
| `/{code}` | Redirect shortlink | Publik |
| `/{code}/qr` | Redirect via QR scan | Publik |
| `/lt/{kode}` | Halaman link tree publik | Publik |
| `/lt/{kode}/qr` | Link tree via QR scan | Publik |
| `/lt/{kode}/go/{itemId}` | Redirect sub-link | Publik |

---

## API Endpoints

### Publik (Guest)

```
POST   /api/guest/shorten      Buat shortlink tanpa login
GET    /api/guest/my-links     Daftar shortlink guest milik device ini
```

### Protected (Bearer Token)

```
GET    /api/data-shortlinks           Daftar shortlink pegawai
POST   /api/shortlinks                Buat shortlink baru
PUT    /api/shortlinks/{id}           Update shortlink
DELETE /api/shortlinks/{id}           Hapus shortlink

GET    /api/statistik                 Data statistik shortlink
GET    /api/statistik/linktree        Data statistik link tree

GET    /api/linktree/data             Daftar link tree
POST   /api/linktree                  Buat link tree
PUT    /api/linktree/{id}             Update link tree
DELETE /api/linktree/{id}             Hapus link tree
POST   /api/linktree/{id}/foto        Upload foto profil
DELETE /api/linktree/{id}/foto        Hapus foto profil
```

Header yang diperlukan untuk API protected:

```
Authorization: Bearer {access_token}
```

---

## Struktur Proyek

```
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Business logic
│   │   ├── Middleware/      # CheckAuth (token validation)
│   │   └── Requests/        # Form validation
│   └── Models/              # Eloquent models
├── database/
│   └── migrations/          # Schema & index optimization
├── docker/
│   ├── Dockerfile           # PHP 8.2-FPM
│   ├── Docker-compose.YML   # Nginx + PHP-FPM + MySQL
│   └── nginx/default.conf   # Nginx config
├── resources/
│   ├── views/               # Blade templates
│   ├── css/app.css          # Tailwind entry
│   └── js/app.js            # Vite entry
├── routes/
│   └── web.php              # Route definitions
└── public/                  # Document root
```

---

## Testing

```bash
# Jalankan semua test
composer test

# Atau langsung
php artisan test
```

---

## Keamanan

- Validasi Bearer token via API Portal Pegawai eksternal
- Cache token 5 menit untuk mengurangi beban API
- Rate limiting guest: maks. 3 shortlink per hari per device
- Visitor tracking menggunakan SHA-256 hash (IP + User-Agent), tanpa menyimpan data mentah
- Browser fingerprinting untuk identifikasi guest yang akurat
- CSRF protection pada semua form
- Nginx memblokir akses ke file sensitif (`.env`, `.log`)
- Input validation ketat (URL, regex kode, max length)

---

## Lisensi

Proyek ini menggunakan [MIT License](https://opensource.org/licenses/MIT).

---

## Catatan

Proyek ini dikembangkan sebagai modul pendukung **Portal Pegawai**. Autentikasi sepenuhnya bergantung pada sistem Portal Pegawai eksternal — aplikasi ini tidak memiliki sistem login/register sendiri.
