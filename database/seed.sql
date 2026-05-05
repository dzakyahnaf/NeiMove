-- 🚗 Dummy Data Rental Mobil

INSERT INTO `users` (`nama`, `email`, `password`, `role`) VALUES
('Admin Utama', 'admin@example.com', '$2y$10$K7AQBUtMbAiUfzsjpo./.uL7cfRTVtiAqIbrK6qYZ8qwpJcjUlWZS', 'admin'),
('Tasya User', 'user@example.com', '$2y$10$K7AQBUtMbAiUfzsjpo./.uL7cfRTVtiAqIbrK6qYZ8qwpJcjUlWZS', 'user');

INSERT INTO `drivers` (`nama`, `foto`, `pengalaman`) VALUES
('Budi Santoso', 'driver1.jpg', '10 tahun pengalaman mengemudi lintas kota, ramah dan hafal rute Jawa-Bali.'),
('Agus Wijaya', 'driver2.jpg', '5 tahun pengalaman sebagai driver pariwisata, fasih berbahasa Inggris dasar.'),
('Slamet Riyadi', 'driver3.jpg', '8 tahun pengalaman mengemudi kendaraan berat dan logistik.');

INSERT INTO `mobil` (`nama`, `foto`, `kategori`, `tipe`, `transmisi`, `kapasitas`, `harga_per_hari`, `deskripsi`, `ac`, `bluetooth`) VALUES
-- Kategori Pribadi
('Innova Reborn', 'mobil 1.jpg', 'pribadi', 'MPV', 'Matic', '7', 550000.00, 'Mobil keluarga premium yang nyaman dan bertenaga.', 1, 1),
('All New Avanza', 'mobil 2.jpg', 'pribadi', 'MPV', 'Manual', '7', 300000.00, 'Mobil sejuta umat dengan efisiensi bahan bakar tinggi.', 1, 1),
('Honda Brio', 'mobil 3.jpg', 'pribadi', 'Hatchback', 'Matic', '5', 200000.00, 'Mobil city car yang lincah dan hemat bahan bakar.', 1, 1),
('Pajero Sport', 'mobil 4.jpg', 'pribadi', 'SUV', 'Matic', '7', 660000.00, 'SUV tangguh dengan fitur melimpah.', 1, 1),
('Alphard', 'mobil 5.jpg', 'pribadi', 'Luxury', 'Matic', '7', 1100000.00, 'Simbol kemewahan dan kenyamanan maksimal.', 1, 1),

-- Kategori Travel
('Toyota HiAce', 'hiace.jpg', 'travel', 'Van', 'Manual', '11-16', 1500000.00, 'Kapasitas 11-16 penumpang. Fasilitas: AC double blower, Sandaran Kursi, Kabin luas & nyaman, Audio & hiburan, Bagasi belakang.', 1, 1),
('Isuzu Elf', 'elf.jpg', 'travel', 'Microbus', 'Manual', '10-20', 1200000.00, 'Kapasitas 10-20 penumpang. Fasilitas: AC, Kursi penumpang standar, Kabin lega, Audio, Bagasi (opsional).', 1, 1),

-- Kategori Barang
('Suzuki Carry Pick Up', 'pickup.jpg', 'barang', 'Pick Up', 'Manual', '2', 250000.00, 'Bak terbuka luas, cocok untuk barang ringan.', 0, 0),
('Daihatsu Granmax', 'granmax.jpg', 'barang', 'Pick Up', 'Manual', '2', 300000.00, 'Cocok untuk barang besar, bak terbuka luas.', 0, 0),
('Daihatsu Granmax Box', 'granmax-box.jpg', 'barang', 'Box', 'Manual', '2-3', 350000.00, 'Box tertutup (melindungi dari hujan & panas), pintu belakang lebar, cocok untuk barang sensitif (elektronik, makanan, dll).', 0, 0);

INSERT INTO `bookings` (`user_id`, `mobil_id`, `tanggal_mulai`, `tanggal_selesai`, `durasi_hari`, `total_harga`, `metode_bayar`, `status`) VALUES
(2, 1, '2026-04-20', '2026-04-22', 2, 1100000.00, 'Transfer Bank', 'selesai'),
(2, 2, '2026-04-24', '2026-04-26', 2, 600000.00, 'Transfer Bank', 'diproses');
