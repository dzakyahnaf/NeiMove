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



<section class="hero-new">
    <div class="container">
        <div class="hero-new-content">
            <h1>Gerak Cepat,<br>Kirim Tepat</h1>
            <p class="subtitle">Platform Pengiriman Instan yang Mudah dan Terpercaya</p>
            <a href="login.php" class="btn btn-primary" style="background: #FFD60A; color: var(--dark); font-size: 1.1rem; padding: 1rem 2rem; border: none; font-weight: 800;">Mulai Pengiriman Sekarang</a>
            
            <div class="hero-new-features">
                <div class="hero-feature-item">
                    <div class="hero-feature-icon"><i data-lucide="check" size="18"></i></div>
                    Aman & Terjamin
                </div>
                <div class="hero-feature-item">
                    <div class="hero-feature-icon"><i data-lucide="search" size="18"></i></div>
                    Pelacakan Real-time Instan
                </div>
                <div class="hero-feature-item">
                    <div class="hero-feature-icon"><i data-lucide="banknote" size="18"></i></div>
                    Harga Transparan
                </div>
                <div class="hero-feature-item">
                    <div class="hero-feature-icon"><i data-lucide="zap" size="18"></i></div>
                    Sekali Layar Pengiriman Instan
                </div>
            </div>
        </div>
        <div class="hero-new-visual">
            <img src="../assets/images/angkutan/fuso-box.jpg" alt="Truk Pengiriman" class="truck-animation" style="border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
        </div>
    </div>
</section>

<section class="section-mitra">
    <div class="container">
        <div class="mitra-grid">
            <div>
                <img src="../assets/images/home-section-2.png" alt="Driver Lalamove" class="mitra-img">
            </div>
            <div class="mitra-content">
                <h2 style="font-size: 1.5rem; color: var(--secondary); font-weight: 600;">Partner Pengiriman Instan 24/7</h2>
                <h3>Cepat. Praktis. Hemat.</h3>
                
                <div class="mitra-list-item">
                    <div class="mitra-list-icon"><i data-lucide="truck" size="32"></i></div>
                    <div>
                        <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem;">Beragam armada pengiriman</h4>
                        <p style="color: var(--secondary); line-height: 1.6;">Tersedia berbagai jenis armada untuk kebutuhan pengirimanmu, mulai dari 20 kg hingga 8 ton.</p>
                    </div>
                </div>

                <div class="mitra-list-item">
                    <div class="mitra-list-icon"><i data-lucide="banknote" size="32"></i></div>
                    <div>
                        <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem;">Terjangkau</h4>
                        <p style="color: var(--secondary); line-height: 1.6;">Tarif yang transparan. Lakukan pembayaran langsung dari aplikasi atau secara tunai kepada driver.</p>
                    </div>
                </div>

                <div class="mitra-list-item">
                    <div class="mitra-list-icon"><i data-lucide="map-pin" size="32"></i></div>
                    <div>
                        <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem;">Pelacakan real-time</h4>
                        <p style="color: var(--secondary); line-height: 1.6;">Lacak pesanan secara real-time melalui aplikasi selama dalam pengiriman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-cara-pesan">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 900; margin-bottom: 4rem;">Bagaimana Cara Pesannya?</h2>
        <div class="mitra-grid" style="align-items: start;">
            <div style="text-align: center;">
                <div style="width: 300px; height: 600px; background: white; border-radius: 40px; border: 12px solid var(--dark); margin: 0 auto; box-shadow: var(--card-shadow); position: relative; overflow: hidden; display: flex; flex-direction: column;">
                    <div style="background: var(--gray-50); padding: 1rem; border-bottom: 1px solid var(--gray-100); font-weight: 700; font-size: 0.9rem;">
                        <i data-lucide="chevron-left" size="16" style="vertical-align: middle;"></i> Tambahkan detail
                    </div>
                    <div style="padding: 1.5rem; flex-grow: 1; text-align: left;">
                        <div style="background: white; border: 1px solid var(--gray-100); padding: 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                            <i data-lucide="map-pin" style="color: var(--primary);"></i>
                            <div>
                                <div style="font-size: 0.8rem; color: var(--secondary);">Waktu Pick up</div>
                                <div style="font-weight: 700;">Sekarang</div>
                            </div>
                        </div>
                        <div style="background: white; border: 1px solid var(--gray-100); padding: 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 0.9rem;"><i data-lucide="phone" size="14" style="color: var(--primary);"></i> +62 823...</span>
                            <i data-lucide="chevron-right" size="16"></i>
                        </div>
                    </div>
                    <div style="padding: 1.5rem; background: white; border-top: 1px solid var(--gray-100);">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                            <span style="font-weight: 700;">Total</span>
                            <span style="font-weight: 800; font-size: 1.2rem;">Rp9.400</span>
                        </div>
                        <a href="#" class="btn btn-primary" style="width: 100%; display: block; text-align: center;">Buat Order</a>
                    </div>
                </div>
            </div>
            
            <div style="padding-top: 2rem;">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--dark);">Masukkan Alamat Pengiriman dan Pengantaran</h4>
                    <p style="color: var(--secondary); line-height: 1.6;">Lengkapi juga dengan kontak pengirim dan penerima barang. (tambahkan hingga 19 titik)</p>
                </div>
                
                <div class="step-item">
                    <div class="step-number" style="background: #FFD60A; color: var(--dark);">2</div>
                    <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--dark);">Pilih Armada dan Dapatkan Informasi Tarif</h4>
                    <p style="color: var(--secondary); line-height: 1.6;">Anda dapat menambahkan layanan tambahan bila diperlukan.</p>
                </div>

                <div class="step-item">
                    <div class="step-number" style="background: var(--primary);">3</div>
                    <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--dark);">Pilih Metode Pembayaran</h4>
                    <p style="color: var(--secondary); line-height: 1.6;">Top-up walletmu untuk melakukan transaksi cashless.</p>
                </div>

                <div class="step-item">
                    <div class="step-number" style="background: #e2e8f0; color: var(--dark);">4</div>
                    <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--dark);">Lacak Pengirimanmu Secara Real-time</h4>
                    <p style="color: var(--secondary); line-height: 1.6;">Setelah berhasil memesan, Anda dapat melacak pengiriman secara real-time melalui aplikasi.</p>
                </div>
                
                <a href="login.php" class="btn btn-primary" style="margin-top: 1rem; padding: 1rem 2.5rem; font-size: 1.1rem;">Coba Sekarang</a>
            </div>
        </div>
    </div>
</section>

<section class="section-armada">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 900; margin-bottom: 1rem;">Armada yang tepat untuk pengirimanmu</h2>
        
        <div class="armada-wrapper">
            <!-- Sidebar / Tabs -->
            <div class="armada-sidebar">
                <div style="background: var(--gray-50); padding: 1rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center; font-weight: 700;">
                    Lokasi: Jakarta <i data-lucide="chevron-down" style="color: var(--primary);"></i>
                </div>
                
                <div id="armada-tabs">
                    <?php 
                    $active_idx = 0;
                    if ($result->num_rows > 0) {
                        $result->data_seek(0);
                        while($car = $result->fetch_assoc()) {
                            $is_active = ($active_idx == 0) ? 'active' : '';
                            echo '<div class="armada-tab ' . $is_active . '" onclick="showArmada(' . $car['id'] . ', this)">';
                            echo '<img src="../assets/images/angkutan/' . htmlspecialchars($car['foto']) . '" alt="' . htmlspecialchars($car['nama']) . '">';
                            echo '<span style="font-weight: 700; font-size: 1.1rem;">' . htmlspecialchars($car['nama']) . '</span>';
                            echo '</div>';
                            $active_idx++;
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Main Detail Area -->
            <div class="armada-main" id="armada-detail-container">
                <?php 
                if ($result->num_rows > 0) {
                    $result->data_seek(0);
                    $first = true;
                    while($car = $result->fetch_assoc()) {
                        $display = $first ? 'block' : 'none';
                        ?>
                        <div class="armada-content" id="armada-content-<?php echo $car['id']; ?>" style="display: <?php echo $display; ?>;">
                            <div style="display: flex; align-items: center; gap: 2rem; margin-bottom: 2rem;">
                                <img src="../assets/images/angkutan/<?php echo htmlspecialchars($car['foto']); ?>" alt="<?php echo htmlspecialchars($car['nama']); ?>" style="width: 200px; height: auto;">
                                <div>
                                    <h3 style="font-size: 2.5rem; font-weight: 900; margin: 0;"><?php echo htmlspecialchars($car['nama']); ?></h3>
                                    <p style="color: var(--primary); font-weight: 700; font-size: 1.2rem; margin-top: 0.5rem;"><?php echo htmlspecialchars($car['deskripsi']); ?></p>
                                </div>
                            </div>
                            
                            <table class="spec-table">
                                <tr>
                                    <td>Biaya Pengiriman:</td>
                                    <td>Untuk info biaya pengiriman, silakan lihat di Aplikasi NeiNeiMove (Atau lihat deskripsi di atas)</td>
                                </tr>
                                <tr>
                                    <td>Jarak Dasar:</td>
                                    <td><?php echo htmlspecialchars($car['jarak_dasar'] ?: '-'); ?></td>
                                </tr>
                                <tr>
                                    <td>Berat Maksimal:</td>
                                    <td><?php echo htmlspecialchars($car['berat_maksimal'] ?: '-'); ?></td>
                                </tr>
                                <tr>
                                    <td>Batas Ukuran (P x L x T):</td>
                                    <td><?php echo htmlspecialchars($car['batas_ukuran'] ?: '-'); ?></td>
                                </tr>
                                <tr>
                                    <td>Pengiriman Antarkota:</td>
                                    <td>
                                        <ul style="list-style-type: disc; margin-left: 1.5rem; margin-top: 0;">
                                            <li><?php echo htmlspecialchars($car['pengiriman_antarkota'] ?: '-'); ?></li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
                        $first = false;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
function showArmada(id, element) {
    // Hide all contents
    document.querySelectorAll('.armada-content').forEach(el => {
        el.style.display = 'none';
    });
    
    // Remove active class from tabs
    document.querySelectorAll('.armada-tab').forEach(el => {
        el.classList.remove('active');
    });
    
    // Show selected content and set tab to active
    document.getElementById('armada-content-' + id).style.display = 'block';
    element.classList.add('active');
}
</script>

<?php include '../includes/footer.php'; ?>
