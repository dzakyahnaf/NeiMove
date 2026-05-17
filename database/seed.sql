-- 🚗 Dummy Data Rental Mobil

INSERT INTO `users` (`nama`, `email`, `password`, `role`) VALUES
('Admin Utama', 'admin@example.com', '$2y$10$K7AQBUtMbAiUfzsjpo./.uL7cfRTVtiAqIbrK6qYZ8qwpJcjUlWZS', 'admin'),
('Tasya User', 'user@example.com', '$2y$10$K7AQBUtMbAiUfzsjpo./.uL7cfRTVtiAqIbrK6qYZ8qwpJcjUlWZS', 'user');

INSERT INTO `drivers` (`nama`, `foto`, `pengalaman`) VALUES
('Budi Santoso', 'driver1.jpg', '10 tahun pengalaman mengemudi lintas kota, ramah dan hafal rute Jawa-Bali.'),
('Agus Wijaya', 'driver2.jpg', '5 tahun pengalaman sebagai driver pariwisata, fasih berbahasa Inggris dasar.'),
('Slamet Riyadi', 'driver3.jpg', '8 tahun pengalaman mengemudi kendaraan berat dan logistik.');

INSERT INTO `mobil` (`nama`, `foto`, `kategori`, `tipe`, `transmisi`, `kapasitas`, `harga_per_hari`, `deskripsi`, `ac`, `bluetooth`, `jarak_dasar`, `berat_maksimal`, `batas_ukuran`, `pengiriman_antarkota`) VALUES
('Motor', 'motor.jpg', 'barang', 'Motor', 'Manual', '20', 8000.00, 'Biaya: 8.000/km', 0, 0, '5 km', '20 kg', '40 cm x 40 cm x 50 cm', 'Tidak Tersedia'),
('Van', 'Van.jpg', 'barang', 'Van', 'Manual', '600', 200000.00, 'Biaya: 200.000/trip (dalam kota)', 1, 1, '5 km', '600 kg', '210 cm x 150 cm x 120 cm', 'Wilayah Cakupan: DKI Jakarta, Bogor, Depok, Tangerang, Bekasi, Bandung, Semarang, Surabaya, dll'),
('Pickup Bak', 'pickup-bak.jpg', 'barang', 'Pickup', 'Manual', '800', 300000.00, 'Biaya: 300.000/trip (dalam kota)', 0, 0, '5 km', '800 kg', '200 cm x 160 cm x 120 cm', 'Wilayah Cakupan: Seluruh Pulau Jawa dan Bali'),
('Fuso Box', 'fuso-box.jpg', 'barang', 'Fuso', 'Manual', '5000', 550000.00, 'Biaya: 550.000/trip (dalam kota), 650.000/ trip (luar kota)', 1, 0, '10 km', '5000 kg', '500 cm x 200 cm x 200 cm', 'Tersedia untuk pengiriman Antar Provinsi di Pulau Jawa & Sumatera'),
('Tronton Wingbox', 'tronton-wingsbox.jpg', 'barang', 'Tronton', 'Manual', '15000', 2500000.00, 'Biaya: 2.500.000/trip (pulau jawa), 4.000.000/trip (luar pulau)', 1, 0, '20 km', '15000 kg', '900 cm x 240 cm x 240 cm', 'Tersedia untuk pengiriman Antar Pulau se-Indonesia');

INSERT INTO `bookings` (`user_id`, `mobil_id`, `tanggal_mulai`, `tanggal_selesai`, `durasi_hari`, `total_harga`, `metode_bayar`, `status`) VALUES
(2, 1, '2026-04-20', '2026-04-22', 2, 1100000.00, 'Transfer Bank', 'selesai'),
(2, 2, '2026-04-24', '2026-04-26', 2, 600000.00, 'Transfer Bank', 'diproses');
