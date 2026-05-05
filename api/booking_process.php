<?php
session_start();
require_once '../config/database.php';
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pages/home.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mobil_id = $_POST['mobil_id'];
$service_type = $_POST['service_type'];
$driver_id = !empty($_POST['driver_id']) ? $_POST['driver_id'] : null;
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$metode_bayar = $_POST['metode_bayar'];
$harga_per_hari = $_POST['harga_per_hari'];

// Calculate Duration
$d1 = new DateTime($tanggal_mulai);
$d2 = new DateTime($tanggal_selesai);
$interval = $d1->diff($d2);
$durasi = $interval->days + 1;

if ($durasi <= 0) {
    header("Location: ../pages/booking.php?id=$mobil_id&error=invalid_date");
    exit();
}

$total_harga = $durasi * $harga_per_hari;

// Insert to DB
$stmt = $conn->prepare("INSERT INTO bookings (user_id, mobil_id, driver_id, service_type, tanggal_mulai, tanggal_selesai, durasi_hari, total_harga, metode_bayar, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'diproses')");
$stmt->bind_param("iiisssids", $user_id, $mobil_id, $driver_id, $service_type, $tanggal_mulai, $tanggal_selesai, $durasi, $total_harga, $metode_bayar);

if ($stmt->execute()) {
    // Update mobil availability (optional, for this demo we just redirect)
    // $conn->query("UPDATE mobil SET tersedia = 0 WHERE id = $mobil_id");
    
    header("Location: ../pages/dashboard.php?success=booked");
} else {
    header("Location: ../pages/booking.php?id=$mobil_id&error=db_error");
}
exit();
