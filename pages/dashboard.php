<?php
session_start();
require_once '../includes/auth.php';
require_once '../config/database.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_nama = $_SESSION['user_nama'];
$conn = getConnection();

// Fetch booking history
$stmt = $conn->prepare("
    SELECT b.*, m.nama AS nama_mobil, m.foto, d.nama AS nama_driver
    FROM bookings b 
    JOIN mobil m ON b.mobil_id = m.id 
    LEFT JOIN drivers d ON b.driver_id = d.id
    WHERE b.user_id = ? 
    ORDER BY b.created_at DESC
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$bookings = $stmt->get_result();

$title = "Dashboard";
$activePage = 'dashboard';

include '../includes/header.php';
?>

<section class="page-header dashboard-header">
    <div class="container">
        <h1 style="font-size: 2.5rem; font-weight: 800;">Halo, <span class="text-primary"><?php echo htmlspecialchars($user_nama); ?></span>!</h1>
        <p>Kelola pengiriman armada Anda dan pantau riwayat pesanan dengan mudah.</p>
    </div>
</section>

<section class="dashboard-section">
    <div class="container">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" style="background: var(--success); color: white; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem;">
                <i data-lucide="check-circle" size="20"></i>
                Pesanan Anda berhasil dikirim! Silakan tunggu konfirmasi admin.
            </div>
        <?php endif; ?>

        <div class="content-card">
            <div class="content-card-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
                <h2 style="font-size: 1.5rem; font-weight: 700;">Riwayat Penyewaan</h2>
                <a href="home.php" class="btn btn-primary btn-sm">Pesan Armada Lagi</a>
            </div>

            <?php if ($bookings->num_rows > 0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Armada & Layanan</th>
                                <th>Tanggal Sewa</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $bookings->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <div class="car-info">
                                            <img src="../assets/images/angkutan/<?php echo $row['foto']; ?>" class="car-img-thumb" style="width: 80px; height: 50px;">
                                            <div>
                                                <div style="font-weight: 700;"><?php echo htmlspecialchars($row['nama_mobil']); ?></div>
                                                <div style="font-size: 0.75rem; color: var(--secondary); display: flex; align-items: center; gap: 0.25rem;">
                                                    <?php if($row['service_type'] == 'driver_service'): ?>
                                                        <i data-lucide="user-check" size="12"></i> Driver: <?php echo htmlspecialchars($row['nama_driver']); ?>
                                                    <?php else: ?>
                                                        <i data-lucide="key" size="12"></i> Lepas Kunci
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 500; font-size: 0.9rem;">
                                            <?php echo date('d M Y', strtotime($row['tanggal_mulai'])); ?> - 
                                            <?php echo date('d M Y', strtotime($row['tanggal_selesai'])); ?>
                                        </div>
                                        <div style="font-size: 0.8rem; color: var(--secondary);"><?php echo $row['durasi_hari']; ?> Hari</div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 700; color: var(--primary);">Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></div>
                                        <div style="font-size: 0.75rem; color: var(--secondary);"><?php echo $row['metode_bayar']; ?></div>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?php echo $row['status']; ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Invoice</button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 5rem 2rem;">
                    <i data-lucide="package" class="empty-state-icon" size="48" style="color: var(--gray-200); margin-bottom: 1.5rem; opacity: 0.5;"></i>
                    <h3 style="color: var(--secondary); margin-bottom: 0.5rem;">Belum ada pesanan.</h3>
                    <p style="color: var(--secondary); opacity: 0.6; margin-bottom: 2rem;">Mulai pengiriman Anda dengan pilihan armada premium kami.</p>
                    <a href="home.php" class="btn btn-primary">Lihat Armada</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
