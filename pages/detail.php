<?php
session_start();
require_once '../config/database.php';
$conn = getConnection();

if (!isset($_GET['id'])) {
    header("Location: home.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM mobil WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$car = $stmt->get_result()->fetch_assoc();

if (!$car) {
    header("Location: home.php");
    exit();
}

// Get Drivers
$drivers_res = $conn->query("SELECT * FROM drivers");
$drivers = [];
while($d = $drivers_res->fetch_assoc()) $drivers[] = $d;

$title = $car['nama'];
$activePage = 'home';

include '../includes/header.php';
?>

<div class="container">
    <div class="detail-container">
        <!-- Main Content -->
        <div class="detail-main">
            <a href="home.php" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem; color: var(--secondary); font-weight: 500;">
                <i data-lucide="arrow-left" size="18"></i> Kembali ke Daftar
            </a>
            
            <img src="../assets/images/cars/<?php echo $car['foto']; ?>" alt="<?php echo $car['nama']; ?>" class="detail-img">
            
            <div class="detail-header">
                <div class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 100px; font-weight: 800; font-size: 0.75rem; margin-bottom: 1rem; display: inline-block;"><?php echo strtoupper($car['kategori']); ?></div>
                <h1 style="font-size: 3.5rem; font-weight: 900; margin-bottom: 1.5rem; color: var(--dark); line-height: 1.1;"><?php echo $car['nama']; ?></h1>
                <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8;">
                    <?php echo $car['deskripsi']; ?>
                </p>
            </div>

            <div class="detail-specs-grid">
                <div class="detail-spec-card">
                    <i data-lucide="users" size="24"></i>
                    <div>
                        <h4>Kapasitas</h4>
                        <p><?php echo $car['kapasitas']; ?> Orang</p>
                    </div>
                </div>
                <div class="detail-spec-card">
                    <i data-lucide="settings-2" size="24"></i>
                    <div>
                        <h4>Transmisi</h4>
                        <p><?php echo $car['transmisi']; ?></p>
                    </div>
                </div>
                <div class="detail-spec-card">
                    <i data-lucide="wind" size="24"></i>
                    <div>
                        <h4>AC</h4>
                        <p><?php echo $car['ac'] ? 'Tersedia' : 'Tidak Ada'; ?></p>
                    </div>
                </div>
                <div class="detail-spec-card">
                    <i data-lucide="bluetooth" size="24"></i>
                    <div>
                        <h4>Bluetooth</h4>
                        <p><?php echo $car['bluetooth'] ? 'Tersedia' : 'Tidak Ada'; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar / Booking Card -->
        <div class="detail-sidebar">
            <div class="booking-card">
                <div class="mb-4">
                    <span style="opacity: 0.7; font-size: 0.9rem;">Harga Sewa</span>
                    <h2 style="font-size: 2rem; font-weight: 800;">Rp <?php echo number_format($car['harga_per_hari'], 0, ',', '.'); ?><span style="font-size: 1rem; font-weight: 400; opacity: 0.7;">/hari</span></h2>
                </div>

                <form action="booking.php" method="GET">
                    <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
                    
                    <div class="mb-4">
                        <label style="display: block; margin-bottom: 1rem; font-weight: 600;">Pilih Layanan</label>
                        <div class="service-toggle">
                            <div class="service-btn active" id="btn-self-drive" onclick="setService('self_drive')">Lepas Kunci</div>
                            <div class="service-btn" id="btn-driver-service" onclick="setService('driver_service')">Dengan Driver</div>
                        </div>
                        <input type="hidden" name="service_type" id="service_type" value="self_drive">
                    </div>

                    <div id="driver-selection" style="display: none;" class="mb-4">
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Pilih Driver</label>
                        <select name="driver_id" class="form-control" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: white;" onchange="updateDriverInfo(this)">
                            <option value="">-- Pilih Driver --</option>
                            <?php foreach($drivers as $driver): ?>
                                <option value="<?php echo $driver['id']; ?>" data-pengalaman="<?php echo htmlspecialchars($driver['pengalaman']); ?>" data-foto="<?php echo $driver['foto']; ?>"><?php echo $driver['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div id="driver-info" class="driver-info-box">
                            <div class="driver-profile">
                                <img src="https://ui-avatars.com/api/?name=Driver&background=random" id="driver-img-display" class="driver-img">
                                <div class="driver-details">
                                    <h4 id="driver-name-display">Nama Driver</h4>
                                    <p>Driver Profesional</p>
                                </div>
                            </div>
                            <p id="driver-exp-display" style="font-size: 0.85rem; line-height: 1.5; opacity: 0.8;"></p>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;">Lanjut ke Pembayaran</button>
                </form>

                <p style="text-align: center; font-size: 0.8rem; opacity: 0.5; margin-top: 1.5rem;">
                    *Harga belum termasuk biaya driver (jika dipilih) dan bensin.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
function setService(type) {
    document.getElementById('service_type').value = type;
    document.getElementById('btn-self-drive').classList.toggle('active', type === 'self_drive');
    document.getElementById('btn-driver-service').classList.toggle('active', type === 'driver_service');
    
    const driverSelection = document.getElementById('driver-selection');
    driverSelection.style.display = type === 'driver_service' ? 'block' : 'none';
}

function updateDriverInfo(select) {
    const infoBox = document.getElementById('driver-info');
    if (!select.value) {
        infoBox.style.display = 'none';
        return;
    }
    
    const option = select.options[select.selectedIndex];
    document.getElementById('driver-name-display').innerText = option.text;
    document.getElementById('driver-exp-display').innerText = option.getAttribute('data-pengalaman');
    document.getElementById('driver-img-display').src = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(option.text) + '&background=random';
    
    infoBox.style.display = 'block';
}
</script>

<?php include '../includes/footer.php'; ?>
