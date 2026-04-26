-- 🚗 Schema Database Rental Mobil
-- Database: rental_mobil

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('user', 'admin') DEFAULT 'user',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for `mobil`
CREATE TABLE IF NOT EXISTS `mobil` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `foto` VARCHAR(255),
  `tipe` ENUM('EV', 'SUV', 'MPV', 'Sedan', 'Hatchback') NOT NULL,
  `transmisi` ENUM('Manual', 'Matic') NOT NULL,
  `kapasitas` TINYINT NOT NULL,
  `harga_per_hari` DECIMAL(10,2) NOT NULL,
  `ac` TINYINT(1) DEFAULT 1,
  `bluetooth` TINYINT(1) DEFAULT 1,
  `deskripsi` TEXT,
  `tersedia` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for `bookings`
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `mobil_id` INT NOT NULL,
  `tanggal_mulai` DATE NOT NULL,
  `tanggal_selesai` DATE NOT NULL,
  `durasi_hari` INT NOT NULL,
  `total_harga` DECIMAL(12,2) NOT NULL,
  `metode_bayar` ENUM('Transfer Bank', 'Kartu Kredit', 'COD') NOT NULL,
  `status` ENUM('diproses', 'dikonfirmasi', 'selesai', 'dibatalkan') DEFAULT 'diproses',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`mobil_id`) REFERENCES `mobil`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for `testimoni`
CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `rating` TINYINT CHECK (rating BETWEEN 1 AND 5),
  `komentar` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

COMMIT;
