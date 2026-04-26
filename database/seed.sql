-- 🚗 Dummy Data Rental Mobil

INSERT INTO `users` (`nama`, `email`, `password`, `role`) VALUES
('Admin Utama', 'admin@example.com', '$2y$10$K7AQBUtMbAiUfzsjpo./.uL7cfRTVtiAqIbrK6qYZ8qwpJcjUlWZS', 'admin'),
('Dzaky User', 'user@example.com', '$2y$10$K7AQBUtMbAiUfzsjpo./.uL7cfRTVtiAqIbrK6qYZ8qwpJcjUlWZS', 'user');

INSERT INTO `mobil` (`nama`, `foto`, `tipe`, `transmisi`, `kapasitas`, `harga_per_hari`, `deskripsi`) VALUES
('Tesla Model S', 'tesla_model_s.jpg', 'EV', 'Matic', 5, 1500000.00, 'Mobil elektrik mewah dengan fitur autopilot.'),
('Toyota Fortuner', 'fortuner.jpg', 'SUV', 'Matic', 7, 800000.00, 'SUV tangguh untuk segala medan.'),
('Honda Civic', 'civic.jpg', 'Sedan', 'Matic', 5, 600000.00, 'Sedan sporty dengan performa tinggi.'),
('Toyota Avanza', 'avanza.jpg', 'MPV', 'Manual', 7, 350000.00, 'Mobil keluarga paling populer.'),
('Hyundai Ioniq 5', 'ioniq5.jpg', 'EV', 'Matic', 5, 1200000.00, 'EV futuristik dengan desain yang unik.');

INSERT INTO `bookings` (`user_id`, `mobil_id`, `tanggal_mulai`, `tanggal_selesai`, `durasi_hari`, `total_harga`, `metode_bayar`, `status`) VALUES
(2, 1, '2026-04-20', '2026-04-22', 2, 3000000.00, 'Transfer Bank', 'selesai'),
(2, 2, '2026-04-24', '2026-04-26', 2, 1600000.00, 'Transfer Bank', 'diproses');
