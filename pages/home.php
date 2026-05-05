<?php
session_start();
require_once '../config/database.php';
$conn = getConnection();

$title = "Sewa Mobil Premium";
$activePage = 'home';

// Handle Filter
$search = isset($_GET['search']) ? $_GET['search'] : '';
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$transmisi = isset($_GET['transmisi']) ? $_GET['transmisi'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';

$query = "SELECT * FROM mobil WHERE tersedia = 1";
$params = [];
$types = "";

if ($search) {
    $query .= " AND nama LIKE ?";
    $params[] = "%$search%";
    $types .= "s";
}
if ($kategori) {
    $query .= " AND kategori = ?";
    $params[] = $kategori;
    $types .= "s";
}
if ($transmisi) {
    $query .= " AND transmisi = ?";
    $params[] = $transmisi;
    $types .= "s";
}
if ($max_price) {
    $query .= " AND harga_per_hari <= ?";
    $params[] = $max_price;
    $types .= "d";
}

$stmt = $conn->prepare($query);
if ($params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

include '../includes/header.php';
?>

<section class="hero-section">
    <!-- Swiper -->
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-1">
                <div class="container slide-content">
                    <h1>Temukan Mobil <span class="text-primary">Impian</span> Anda</h1>
                    <p>Penyewaan mobil premium dengan layanan terbaik untuk perjalanan tak terlupakan Anda.</p>
                </div>
            </div>
            <div class="swiper-slide slide-2">
                <div class="container slide-content">
                    <h1>Kenyamanan <span class="text-primary">Eksklusif</span></h1>
                    <p>Rasakan pengalaman berkendara mewah dengan koleksi mobil premium kami.</p>
                </div>
            </div>
            <div class="swiper-slide slide-3">
                <div class="container slide-content">
                    <h1>Perjalanan <span class="text-primary">Tanpa Batas</span></h1>
                    <p>Armada terawat dengan dukungan pelanggan 24/7 untuk ketenangan Anda.</p>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<div class="container">
    <div class="filter-wrapper">
        <form action="" method="GET" class="filter-form">
            <div class="form-group">
                <label><i data-lucide="search" size="18"></i> Cari Mobil</label>
                <input type="text" name="search" class="form-control" placeholder="Nama mobil..." value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="form-group">
                <label><i data-lucide="layers" size="18"></i> Kategori</label>
                <select name="kategori" class="form-control">
                    <option value="">Semua Kategori</option>
                    <option value="pribadi" <?php echo $kategori == 'pribadi' ? 'selected' : ''; ?>>Mobil Pribadi</option>
                    <option value="travel" <?php echo $kategori == 'travel' ? 'selected' : ''; ?>>Travel / Bus</option>
                    <option value="barang" <?php echo $kategori == 'barang' ? 'selected' : ''; ?>>Angkutan Barang</option>
                </select>
            </div>
            <div class="form-group">
                <label><i data-lucide="settings-2" size="18"></i> Transmisi</label>
                <select name="transmisi" class="form-control">
                    <option value="">Semua Transmisi</option>
                    <option value="Manual" <?php echo $transmisi == 'Manual' ? 'selected' : ''; ?>>Manual</option>
                    <option value="Matic" <?php echo $transmisi == 'Matic' ? 'selected' : ''; ?>>Matic</option>
                </select>
            </div>
            <div class="form-group">
                <label><i data-lucide="banknote" size="18"></i> Harga Maksimal</label>
                <input type="number" name="max_price" class="form-control" placeholder="Rp 0" value="<?php echo htmlspecialchars($max_price); ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px;"><i data-lucide="filter"></i> Filter</button>
            </div>
        </form>
    </div>

    <div class="car-grid">
        <?php if ($result->num_rows > 0): ?>
            <?php while($car = $result->fetch_assoc()): ?>
                <div class="car-card">
                    <div class="car-card-img">
                        <img src="../assets/images/cars/<?php echo $car['foto']; ?>" alt="<?php echo $car['nama']; ?>">
                        <div class="car-badge"><?php echo ucfirst($car['kategori']); ?></div>
                    </div>
                    <div class="car-card-content">
                        <div class="car-card-header">
                            <h3 class="car-name"><?php echo $car['nama']; ?></h3>
                            <div class="car-price">Rp <?php echo number_format($car['harga_per_hari'], 0, ',', '.'); ?><span>/hari</span></div>
                        </div>
                        <div class="car-specs-mini">
                            <div class="spec-item"><i data-lucide="users" size="16"></i> <?php echo $car['kapasitas']; ?></div>
                            <div class="spec-item"><i data-lucide="settings-2" size="16"></i> <?php echo $car['transmisi']; ?></div>
                            <?php if ($car['ac']): ?>
                                <div class="spec-item"><i data-lucide="wind" size="16"></i> AC</div>
                            <?php endif; ?>
                        </div>
                        <a href="detail.php?id=<?php echo $car['id']; ?>" class="btn btn-primary" style="width: 100%;">Lihat Detail</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                <i data-lucide="car-front" size="48" style="opacity: 0.2; margin-bottom: 1rem;"></i>
                <p style="color: var(--secondary);">Tidak ada mobil yang ditemukan sesuai kriteria.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
