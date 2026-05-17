# 🚚 NeiNeiMove — Platform Pengiriman Instan & Logistik

**NeiNeiMove** adalah platform penyedia layanan pengiriman barang instan, pindahan, dan logistik yang dibangun menggunakan PHP Native dan MySQL. Project ini telah berevolusi dari sekadar rental mobil menjadi layanan pengiriman terpadu dengan antarmuka modern, interaktif, dan responsif.

---

## 🛠️ Tech Stack

- **Backend:** PHP 8.x (Native)
- **Database:** MySQL 8.x
- **Web Server:** Apache (XAMPP)
- **Frontend:** HTML5, Vanilla CSS3 (Custom Design), JavaScript
- **Icons:** Lucide Icons

---

## 🚀 Cara Menjalankan Project

Ikuti langkah-langkah di bawah ini untuk menjalankan project di lingkungan lokal Anda.

### 1. Prasyarat
Pastikan Anda sudah menginstal **XAMPP** (versi PHP 8.0 ke atas).
- Download di: [https://www.apachefriends.org/](https://www.apachefriends.org/)

### 2. Pindahkan Folder ke htdocs
Pindahkan seluruh folder project `rental-mobil` (atau `NeiMove`) ini ke direktori `htdocs` XAMPP Anda. 
Disarankan untuk mengubah nama folder menjadi `NeiMove` agar sesuai dengan URL:
- **Windows:** `C:\xampp\htdocs\NeiMove`
- **macOS:** `/Applications/XAMPP/htdocs/NeiMove`
- **Linux:** `/opt/lampp/htdocs/NeiMove`

### 3. Jalankan Apache & MySQL
1. Buka **XAMPP Control Panel**.
2. Klik tombol **Start** pada modul **Apache** dan **MySQL**.
3. Pastikan keduanya berwarna hijau (Running).

### 4. Setup Database
1. Buka browser dan akses: `http://localhost/phpmyadmin/`
2. Buat database baru dengan nama: `rental_mobil`
3. Klik tab **Import**, pilih file `database/schema.sql` yang ada di folder project, lalu klik **Go/Import**.
4. (Sangat Disarankan) Ulangi langkah import untuk file `database/seed.sql` guna mendapatkan data dummy awal yang berisi list armada pengiriman terbaru (Motor, Van, Pickup Bak, Fuso Box, Tronton Wingbox).

### 5. Konfigurasi Koneksi
Pastikan konfigurasi di file `config/database.php` sudah sesuai dengan kredensial XAMPP Anda:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Kosongkan jika menggunakan default XAMPP
define('DB_NAME', 'rental_mobil');
```

### 6. Akses Website
Buka browser Anda dan kunjungi URL berikut (sesuaikan dengan nama folder di htdocs):
`http://localhost/NeiMove/pages/home.php`

> **Tips:** Gunakan **Ctrl + F5** (Hard Refresh) jika tampilan antarmuka tidak memuat CSS terbaru.

---

## 🔐 Kredensial Login Default
Jika Anda meng-import `seed.sql`, Anda bisa menggunakan akun berikut untuk mencoba sistem:

| Role | Email | Password |
|------|-------|----------|
| **Admin** | `admin@example.com` | `password` |
| **User** | `user@example.com` | `password` |

---

## 📂 Struktur Folder
- `api/`: Berisi logika backend (proses login, booking, dll).
- `assets/`: File CSS, Gambar, dan Icon.
- `config/`: Konfigurasi database.
- `database/`: File SQL (Schema & Seed armada logistik).
- `includes/`: Template reusable (Header, Footer, Navbar).
- `pages/`: Halaman utama (Home, Rewards, Driver, Tentang Kami, Hubungi Kami).

---

## ✨ Fitur Utama
- [x] Sistem Pengiriman & Penyewaan Armada Logistik.
- [x] Antarmuka Interaktif Pemilihan Armada di Home Page.
- [x] Halaman Rewards System (NeiNeiPoint).
- [x] Profil Mitra Pengemudi Profesional.
- [x] Sistem Login & Logout Aman.
- [x] UI Modern, Responsif & *Glassmorphism-styled*.

---

Dibuat dengan ❤️ untuk merevolusi layanan logistik Indonesia.
