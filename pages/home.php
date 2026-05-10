<?php
session_start();
require_once '../config/database.php';
$conn = getConnection();

$title = "Layanan Pengiriman & Angkutan Barang";
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
                    <h1>Solusi <span class="text-primary">Pengiriman</span> Barang</h1>
                    <p>Layanan angkutan barang cepat dan aman untuk segala kebutuhan bisnis dan pribadi Anda.</p>
                </div>
            </div>
            <div class="swiper-slide slide-2">
                <div class="container slide-content">
                    <h1>Pindahan <span class="text-primary">Tanpa Repot</span></h1>
                    <p>Tim profesional kami siap membantu pindahan rumah atau kantor Anda dengan aman dan efisien.</p>
                </div>
            </div>
            <div class="swiper-slide slide-3">
                <div class="container slide-content">
                    <h1>Armada <span class="text-primary">Lengkap & Handal</span></h1>
                    <p>Tersedia berbagai pilihan armada mulai dari blind van hingga truk besar untuk kapasitas apa pun.</p>
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
                <label><i data-lucide="search" size="18"></i> Cari Layanan</label>
                <input type="text" name="search" class="form-control" placeholder="Cari armada..." value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="form-group">
                <label><i data-lucide="layers" size="18"></i> Kategori Angkutan</label>
                <select name="kategori" class="form-control">
                    <option value="">Semua Kategori</option>
                    <option value="pribadi" <?php echo $kategori == 'pribadi' ? 'selected' : ''; ?>>Mobil Pribadi</option>
                    <option value="travel" <?php echo $kategori == 'travel' ? 'selected' : ''; ?>>Travel / Bus</option>
                    <option value="barang" <?php echo $kategori == 'barang' ? 'selected' : ''; ?>>Angkutan Barang</option>
                </select>
            </div>
            <div class="form-group">
                <label><i data-lucide="truck" size="18"></i> Jenis Armada</label>
                <select name="armada_type" class="form-control">
                    <option value="">Semua Armada</option>
                    <option value="Van" <?php echo $search == 'Van' ? 'selected' : ''; ?>>Blind Van</option>
                    <option value="Pickup" <?php echo $search == 'Pickup' ? 'selected' : ''; ?>>Pickup</option>
                    <option value="Truk" <?php echo $search == 'Truk' ? 'selected' : ''; ?>>Truk Engkel</option>
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
                            <div class="car-price">Rp <?php echo number_format($car['harga_per_hari'], 0, ',', '.'); ?><span>/trip</span></div>
                        </div>
                        <div class="car-specs-mini">
                            <div class="spec-item"><i data-lucide="package" size="16"></i> <?php echo $car['kapasitas']; ?> Kg</div>
                            <div class="spec-item"><i data-lucide="truck" size="16"></i> <?php echo $car['transmisi']; ?></div>
                            <?php if ($car['ac']): ?>
                                <div class="spec-item"><i data-lucide="shield-check" size="16"></i> Aman</div>
                            <?php endif; ?>
                        </div>
                        <a href="detail.php?id=<?php echo $car['id']; ?>" class="btn btn-primary" style="width: 100%;">Pesan Sekarang</a>
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
