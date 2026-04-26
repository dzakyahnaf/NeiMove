<?php
require_once '../includes/auth.php';
require_once '../config/database.php';

// Ensure user is logged in
requireLogin();

$user = getCurrentUser();
$conn = getConnection();

// Fetch booking history
$stmt = $conn->prepare("
    SELECT b.*, m.nama AS nama_mobil, m.foto 
    FROM bookings b 
    JOIN mobil m ON b.mobil_id = m.id 
    WHERE b.user_id = ? 
    ORDER BY b.created_at DESC
");
$stmt->bind_param("i", $user['id']);
$stmt->execute();
$bookings = $stmt->get_result();

$title = "Dashboard";
$activePage = 'dashboard';

include '../includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['nama']); ?>!</h1>
        <p>Manage your luxury car rentals and view your history.</p>
    </div>
</section>

<section class="dashboard-section">
    <div class="container">
        <div class="content-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h2 style="font-size: 1.5rem; font-weight: 600;">Your Rental History</h2>
                <a href="home.php" class="btn btn-primary btn-sm">Rent a New Car</a>
            </div>

            <?php if ($bookings->num_rows > 0): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Car Details</th>
                                <th>Rental Date</th>
                                <th>Duration</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $bookings->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <div class="car-info">
                                            <div class="car-img-thumb" style="background-image: url('../assets/images/cars/<?php echo $row['foto']; ?>'); background-size: cover; background-position: center;"></div>
                                            <span style="font-weight: 500;"><?php echo htmlspecialchars($row['nama_mobil']); ?></span>
                                        </div>
                                    </td>
                                    <td style="color: var(--secondary);">
                                        <?php echo date('M d, Y', strtotime($row['tanggal_mulai'])); ?> - 
                                        <?php echo date('M d, Y', strtotime($row['tanggal_selesai'])); ?>
                                    </td>
                                    <td><?php echo $row['durasi_hari']; ?> Days</td>
                                    <td style="font-weight: 600;">Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                    <td>
                                        <span class="badge badge-<?php echo $row['status']; ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 4rem 2rem;">
                    <i data-lucide="car" style="width: 48px; height: 48px; color: var(--gray-200); margin-bottom: 1rem;"></i>
                    <h3 style="color: var(--secondary);">No rentals found yet.</h3>
                    <p style="color: var(--gray-200); margin-bottom: 2rem;">Ready to experience a premium drive?</p>
                    <a href="home.php" class="btn btn-primary">Browse Premium Cars</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
