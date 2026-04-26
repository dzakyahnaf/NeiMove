# 🚗 NeiMove — Premium Car Rental Website

**NeiMove** adalah platform penyewaan mobil premium yang dibangun menggunakan PHP Native dan MySQL. Project ini dirancang dengan antarmuka modern (Glassmorphism) dan sistem autentikasi yang aman.

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

### 2. Clone Repository
Buka terminal atau Git Bash, lalu jalankan perintah berikut:

```bash
# Clone repository ini
git clone https://github.com/dzakyahnaf/NeiMove.git

# Masuk ke folder project
cd NeiMove
```

### 3. Pindahkan ke htdocs
Pindahkan folder `NeiMove` ke direktori `htdocs` XAMPP Anda:
- **Windows:** `C:\xampp\htdocs\NeiMove`
- **macOS:** `/Applications/XAMPP/htdocs/NeiMove`
- **Linux:** `/opt/lampp/htdocs/NeiMove`

### 4. Jalankan Apache & MySQL
1. Buka **XAMPP Control Panel**.
2. Klik tombol **Start** pada modul **Apache** dan **MySQL**.
3. Pastikan keduanya berwarna hijau (Running).

### 5. Setup Database
1. Buka browser dan akses: `http://localhost/phpmyadmin/`
2. Buat database baru dengan nama: `rental_mobil`
3. Klik tab **Import**, pilih file `database/schema.sql` yang ada di folder project, lalu klik **Go/Import**.
4. (Opsional) Ulangi langkah import untuk file `database/seed.sql` guna mendapatkan data dummy awal.

### 6. Konfigurasi Koneksi
Pastikan konfigurasi di file `config/database.php` sudah sesuai dengan kredensial XAMPP Anda:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Kosongkan jika menggunakan default XAMPP
define('DB_NAME', 'rental_mobil');
```

### 7. Akses Website
Buka browser dan akses URL berikut:
```
http://localhost/NeiMove/
```

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
- `assets/`: File CSS, JS, dan Gambar.
- `config/`: Konfigurasi database.
- `database/`: File SQL (Schema & Seed).
- `includes/`: Template reusable (Header, Footer, Auth).
- `pages/`: Halaman utama website (Login, Dashboard, Home).

---

## ✨ Fitur Utama
- [x] Sistem Login & Logout Aman (Bcrypt Hash).
- [x] Dashboard User (Riwayat Booking).
- [x] UI Modern & Responsif.
- [x] Manajemen Sesi (Session Handling).

---

Dibuat dengan ❤️ untuk kemudahan penyewaan mobil.
