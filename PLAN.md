# 🚗 PLAN.MD — Website Rental Mobil

> Dokumen ini adalah panduan lengkap untuk membangun Website Rental Mobil menggunakan PHP Native, MySQL, XAMPP, dan phpMyAdmin. Dibuat agar junior developer dan AI model dapat memahami konteks, arsitektur, dan implementasi secara best practice.

---

## 📋 Daftar Isi

1. [Tech Stack](#tech-stack)
2. [Cara Menjalankan Project](#cara-menjalankan-project)
3. [Struktur Folder Project](#struktur-folder-project)
4. [Skema Database](#skema-database)
5. [Rencana Halaman & Fitur](#rencana-halaman--fitur)
6. [Alur Sistem (Flow)](#alur-sistem-flow)
7. [Konvensi Kode](#konvensi-kode)
8. [Best Practices](#best-practices)
9. [Checklist Implementasi](#checklist-implementasi)

---

## Tech Stack

| Komponen | Teknologi | Keterangan |
|----------|-----------|------------|
| Bahasa Backend | PHP 8.x (Native) | Tanpa framework |
| Database | MySQL 8.x | Via phpMyAdmin |
| Web Server | Apache (XAMPP) | Lokal development |
| Frontend | HTML5, CSS3, JavaScript (Vanilla) | Tanpa framework JS |
| DB Manager | phpMyAdmin | GUI manajemen database |

---

## Cara Menjalankan Project

### 1. Prasyarat

- Unduh dan install **XAMPP** dari [https://www.apachefriends.org](https://www.apachefriends.org)
- Pastikan versi XAMPP menggunakan **PHP 8.x** dan **MySQL 8.x**

### 2. Setup Project

```bash
# 1. Clone atau copy folder project ke direktori htdocs XAMPP
#    Lokasi default htdocs:
#    - Windows : C:\xampp\htdocs\
#    - macOS   : /Applications/XAMPP/htdocs/
#    - Linux   : /opt/lampp/htdocs/

# Contoh struktur setelah dicopy:
C:\xampp\htdocs\rental-mobil\
```

### 3. Jalankan XAMPP

1. Buka **XAMPP Control Panel**
2. Klik **Start** pada **Apache**
3. Klik **Start** pada **MySQL**
4. Pastikan status keduanya hijau (Running)

### 4. Setup Database

1. Buka browser, akses: `http://localhost/phpmyadmin`
2. Klik **New** → buat database baru dengan nama: `rental_mobil`
3. Pilih **Collation**: `utf8mb4_unicode_ci`
4. Klik tab **SQL**, lalu jalankan script SQL dari file `database/schema.sql` (ada di folder project)
5. Jalankan juga `database/seed.sql` untuk data dummy awal (opsional)

### 5. Konfigurasi Koneksi Database

Edit file `config/database.php`:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // default XAMPP
define('DB_PASS', '');           // default XAMPP (kosong)
define('DB_NAME', 'rental_mobil');
define('DB_CHARSET', 'utf8mb4');
```

### 6. Akses Website

Buka browser dan akses:

```
http://localhost/rental-mobil/
```

Halaman pertama yang tampil adalah **Halaman Login**.

---

## Struktur Folder Project

```
rental-mobil/
│
├── config/
│   └── database.php          # Konfigurasi koneksi database
│
├── database/
│   ├── schema.sql             # Script DDL (CREATE TABLE)
│   └── seed.sql               # Data dummy awal
│
├── includes/
│   ├── auth.php               # Fungsi autentikasi (login, logout, session)
│   ├── header.php             # Template header HTML (navbar)
│   └── footer.php             # Template footer HTML
│
├── assets/
│   ├── css/
│   │   └── style.css          # CSS utama
│   ├── js/
│   │   └── main.js            # JavaScript utama
│   └── images/
│       └── cars/              # Foto-foto mobil
│
├── pages/
│   ├── login.php              # Halaman Login
│   ├── dashboard.php          # Dashboard User (riwayat & status booking)
│   ├── home.php               # Homepage (list mobil, search, filter)
│   ├── detail.php             # Detail Mobil
│   ├── booking.php            # Form Booking
│   ├── testimoni.php          # Testimoni & Bantuan
│   └── tentang.php            # Tentang Perusahaan
│
├── api/
│   ├── login_process.php      # Proses POST login
│   ├── logout.php             # Proses logout
│   ├── booking_process.php    # Proses POST booking
│   └── search_cars.php        # API pencarian & filter mobil (AJAX)
│
├── admin/                     # (Opsional) Panel Admin
│   ├── index.php
│   └── manage_cars.php
│
└── index.php                  # Entry point → redirect ke login atau home
```

---

## Skema Database

### Tabel: `users`

```sql
CREATE TABLE users (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nama        VARCHAR(100) NOT NULL,
    email       VARCHAR(150) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL,          -- bcrypt hash
    role        ENUM('user', 'admin') DEFAULT 'user',
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabel: `mobil`

```sql
CREATE TABLE mobil (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nama            VARCHAR(100) NOT NULL,
    foto            VARCHAR(255),               -- path relatif ke assets/images/cars/
    tipe            ENUM('EV', 'SUV', 'MPV', 'Sedan', 'Hatchback') NOT NULL,
    transmisi       ENUM('Manual', 'Matic') NOT NULL,
    kapasitas       TINYINT NOT NULL,            -- jumlah penumpang
    harga_per_hari  DECIMAL(10,2) NOT NULL,
    ac              TINYINT(1) DEFAULT 1,        -- 1 = ada, 0 = tidak
    bluetooth       TINYINT(1) DEFAULT 1,
    deskripsi       TEXT,
    tersedia        TINYINT(1) DEFAULT 1,        -- 1 = tersedia
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabel: `bookings`

```sql
CREATE TABLE bookings (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    user_id         INT NOT NULL,
    mobil_id        INT NOT NULL,
    tanggal_mulai   DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    durasi_hari     INT NOT NULL,
    total_harga     DECIMAL(12,2) NOT NULL,
    metode_bayar    ENUM('Transfer Bank', 'Kartu Kredit', 'COD') NOT NULL,
    status          ENUM('diproses', 'dikonfirmasi', 'selesai', 'dibatalkan') DEFAULT 'diproses',
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (mobil_id) REFERENCES mobil(id) ON DELETE CASCADE
);
```

### Tabel: `testimoni`

```sql
CREATE TABLE testimoni (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT NOT NULL,
    rating      TINYINT CHECK (rating BETWEEN 1 AND 5),
    komentar    TEXT NOT NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

---

## Rencana Halaman & Fitur

### 1. `index.php` — Entry Point

- Cek apakah session user sudah login
- Jika sudah → redirect ke `pages/home.php`
- Jika belum → redirect ke `pages/login.php`

---

### 2. `pages/login.php` — Halaman Login

**Tampilan:**
- Form: input email + input password
- Tombol "Login"
- Link "Daftar" (opsional untuk pendaftaran)

**Logika (`api/login_process.php`):**
1. Terima POST: `email`, `password`
2. Validasi input (tidak boleh kosong, format email valid)
3. Query: `SELECT * FROM users WHERE email = ?` (gunakan prepared statement)
4. Verifikasi password dengan `password_verify()`
5. Jika berhasil → set `$_SESSION['user_id']` dan `$_SESSION['user_nama']` → redirect ke `home.php`
6. Jika gagal → tampilkan pesan error

---

### 3. `pages/dashboard.php` — Dashboard User

**Akses:** Hanya user yang sudah login (wajib cek session)

**Tampilan:**
- Sapa user dengan nama: "Halo, [Nama]!"
- Tabel riwayat booking dengan kolom: Nama Mobil, Tanggal Sewa, Durasi, Total Harga, Status
- Badge status berwarna: `diproses` (kuning), `dikonfirmasi` (biru), `selesai` (hijau), `dibatalkan` (merah)

**Query:**
```sql
SELECT b.*, m.nama AS nama_mobil, m.foto
FROM bookings b
JOIN mobil m ON b.mobil_id = m.id
WHERE b.user_id = ?
ORDER BY b.created_at DESC;
```

---

### 4. `pages/home.php` — Homepage

**Tampilan:**
- Search bar: input teks untuk mencari nama mobil
- Filter: dropdown Tipe, dropdown Transmisi, input range Harga
- Grid/list kartu mobil: foto + nama + harga per hari + tombol "Lihat Detail"

**Fitur Filter (AJAX ke `api/search_cars.php`):**
- Filter dikirim via `fetch()` atau `XMLHttpRequest`
- Response berupa HTML partial (list kartu mobil)
- Jika tanpa AJAX: gunakan query parameter URL (`?tipe=SUV&transmisi=Matic&harga_max=500000`)

**Query contoh:**
```sql
SELECT * FROM mobil
WHERE tersedia = 1
  AND (nama LIKE ? OR ? = '')
  AND (tipe = ? OR ? = '')
  AND (transmisi = ? OR ? = '')
  AND harga_per_hari <= ?
ORDER BY nama ASC;
```

---

### 5. `pages/detail.php` — Detail Mobil

**Akses:** `detail.php?id=3` (id mobil dari URL)

**Tampilan:**
- Foto besar mobil
- Nama, tipe, transmisi, kapasitas penumpang
- Harga per hari
- Fitur: ikon AC, Bluetooth, dll.
- Deskripsi lengkap
- Tombol "Booking Sekarang" → ke `booking.php?id=3`

**Validasi:**
- Cek apakah `$_GET['id']` ada dan valid (integer)
- Jika mobil tidak ditemukan atau tidak tersedia → tampilkan halaman 404 / redirect ke home

---

### 6. `pages/booking.php` — Form Booking

**Akses:** Hanya user login. Tampilkan ringkasan mobil di atas form.

**Tampilan:**
- Nama & foto mobil (diambil dari `mobil_id` di URL)
- Input: Tanggal Mulai Sewa (date picker)
- Input: Tanggal Selesai Sewa (date picker)
- Kalkulasi otomatis durasi hari dan total harga (via JavaScript)
- Dropdown metode pembayaran
- Tombol "Konfirmasi Booking"

**Logika JavaScript:**
```javascript
// Hitung otomatis durasi dan total saat tanggal berubah
const hargaPerHari = parseFloat(document.getElementById('harga').value);
const mulai = new Date(document.getElementById('tgl_mulai').value);
const selesai = new Date(document.getElementById('tgl_selesai').value);
const durasi = Math.ceil((selesai - mulai) / (1000 * 60 * 60 * 24));
const total = durasi * hargaPerHari;
```

**Logika (`api/booking_process.php`):**
1. Cek session login
2. Validasi input: tanggal valid, selesai > mulai, mobil tersedia
3. Hitung total harga di server (jangan percaya perhitungan dari client)
4. Insert ke tabel `bookings`
5. Redirect ke `dashboard.php` dengan pesan sukses

---

### 7. `pages/testimoni.php` — Testimoni & Bantuan

**Tampilan:**
- Daftar testimoni pelanggan: nama, rating (bintang), komentar, tanggal
- Tombol WhatsApp: `https://wa.me/628XXXXXXXXX?text=Halo,...`
- Bagian FAQ: accordion expand/collapse dengan JavaScript
- (Opsional) Form tambah testimoni untuk user login

---

### 8. `pages/tentang.php` — Tentang Perusahaan

**Tampilan:**
- Profil singkat: nama perusahaan, sejarah, visi misi
- Alamat lengkap
- Embed Google Maps (iframe)
- Jam operasional

---

## Alur Sistem (Flow)

```
Buka Website
     │
     ▼
Cek Session Login?
   │           │
  YA          TIDAK
   │             │
   ▼             ▼
Home.php     Login.php
   │             │
   │         Input Email + Password
   │             │
   │         Verifikasi DB (prepared statement + password_verify)
   │             │
   │         Berhasil? ──TIDAK──→ Tampilkan Error
   │             │
   │            YA → Set $_SESSION → Home.php
   │
   ▼
Pilih Mobil di Home
   │
   ▼
Detail Mobil (detail.php?id=X)
   │
   ▼
Klik Booking → Cek Login?
   │                   │
  YA                 TIDAK
   │                   │
   ▼              Redirect ke Login
Booking Form
(booking.php?id=X)
   │
   ▼
Isi Tanggal + Metode Bayar
   │
   ▼
booking_process.php (validasi + INSERT)
   │
   ▼
Dashboard (riwayat booking tampil)
```

---

## Konvensi Kode

### PHP

```php
<?php
// 1. Selalu mulai file PHP dengan tag pembuka
// 2. Gunakan prepared statements untuk SEMUA query yang menerima input user
// 3. Enkripsi password dengan password_hash()

// Koneksi database (config/database.php)
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset(DB_CHARSET);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Prepared statement (WAJIB untuk input user)
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Jangan pernah lakukan ini (rentan SQL Injection):
// $query = "SELECT * FROM users WHERE email = '$email'"; ❌
```

### Session & Auth

```php
// Di setiap halaman yang butuh login, taruh di paling atas:
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /rental-mobil/pages/login.php");
    exit();
}
?>
```

### Penamaan

| Hal | Konvensi | Contoh |
|-----|----------|--------|
| File PHP | snake_case | `booking_process.php` |
| Variabel PHP | camelCase | `$totalHarga` |
| Fungsi PHP | camelCase | `getCarById()` |
| Tabel DB | snake_case | `bookings` |
| Kolom DB | snake_case | `harga_per_hari` |
| ID HTML | kebab-case | `id="total-harga"` |
| Class CSS | kebab-case | `class="car-card"` |

---

## Best Practices

### Keamanan

- **Selalu gunakan Prepared Statements** — tidak ada query string langsung dari input user
- **Hash password dengan `password_hash()`** saat registrasi, verifikasi dengan `password_verify()`
- **Validasi input di server** — jangan hanya mengandalkan validasi JavaScript di client
- **Gunakan `session_start()`** di awal setiap halaman yang menggunakan session
- **Hindari menampilkan error MySQL** ke user di production — log ke file saja
- **Escape output HTML** dengan `htmlspecialchars()` saat menampilkan data dari DB ke HTML

```php
// Aman menampilkan data dari DB
echo htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8');
```

### Database

- Gunakan **foreign key** dan relasi yang benar antar tabel
- Gunakan **DECIMAL** untuk harga, bukan FLOAT (presisi finansial)
- Selalu set **charset utf8mb4** agar emoji dan karakter khusus tersimpan dengan benar

### Struktur Kode

- Pisahkan **logika bisnis** (PHP) dari **tampilan** (HTML) sebisa mungkin
- Gunakan `includes/header.php` dan `includes/footer.php` agar tidak duplikasi kode HTML
- File di folder `api/` hanya memproses POST/GET dan tidak menampilkan HTML lengkap

---

## Checklist Implementasi

### Setup Awal
- [ ] XAMPP terinstal dan berjalan (Apache + MySQL)
- [ ] Folder project ada di `htdocs/rental-mobil/`
- [ ] Database `rental_mobil` dibuat di phpMyAdmin
- [ ] Schema SQL dijalankan (semua tabel terbuat)
- [ ] `config/database.php` terisi dengan benar

### Backend
- [ ] Koneksi database berfungsi
- [ ] Login dengan prepared statement dan `password_verify()`
- [ ] Session management (start, set, destroy)
- [ ] Proteksi halaman (redirect jika belum login)
- [ ] CRUD booking (create + read untuk user)
- [ ] Validasi input server-side di semua form
- [ ] Filter & search mobil berfungsi

### Frontend
- [ ] Semua halaman sesuai desain yang direncanakan
- [ ] Form login dengan validasi client-side
- [ ] Kalkulasi total harga booking otomatis (JavaScript)
- [ ] Filter mobil di homepage berfungsi
- [ ] Tampilan responsif (mobile-friendly)
- [ ] Badge status booking berwarna sesuai status

### Halaman
- [ ] `index.php` (redirect logic)
- [ ] `pages/login.php`
- [ ] `pages/home.php`
- [ ] `pages/detail.php`
- [ ] `pages/booking.php`
- [ ] `pages/dashboard.php`
- [ ] `pages/testimoni.php`
- [ ] `pages/tentang.php`

### API / Proses
- [ ] `api/login_process.php`
- [ ] `api/logout.php`
- [ ] `api/booking_process.php`
- [ ] `api/search_cars.php` (opsional, untuk AJAX)

---

> **Catatan untuk Developer:** Selalu commit kode secara berkala ke Git. Jangan commit file `config/database.php` yang berisi kredensial — tambahkan ke `.gitignore`. Untuk deployment ke server live, pastikan konfigurasi DB diperbarui sesuai environment produksi.