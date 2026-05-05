<?php
session_start();
require_once '../includes/auth.php';
require_once '../config/database.php';
$conn = getConnection();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: home.php");
    exit();
}

$car_id = $_GET['id'];
$service_type = isset($_GET['service_type']) ? $_GET['service_type'] : 'self_drive';
$driver_id = isset($_GET['driver_id']) ? $_GET['driver_id'] : null;

$stmt = $conn->prepare("SELECT * FROM mobil WHERE id = ?");
$stmt->bind_param("i", $car_id);
$stmt->execute();
$car = $stmt->get_result()->fetch_assoc();

if (!$car) {
    header("Location: home.php");
    exit();
}

$driver = null;
if ($driver_id) {
    $stmt = $conn->prepare("SELECT * FROM drivers WHERE id = ?");
    $stmt->bind_param("i", $driver_id);
    $stmt->execute();
    $driver = $stmt->get_result()->fetch_assoc();
}

$title = "Booking " . $car['nama'];
$activePage = 'home';

include '../includes/header.php';
?>

<div class="container" style="padding: 4rem 0;">
    <div class="detail-container">
        <!-- Summary Card -->
        <div class="detail-main">
            <h2 style="font-size: 1.75rem; font-weight: 800; margin-bottom: 2rem;">Ringkasan Pesanan</h2>
            
            <div style="display: flex; gap: 2rem; background: var(--gray-100); padding: 1.5rem; border-radius: 16px; margin-bottom: 2rem;">
                <img src="../assets/images/cars/<?php echo $car['foto']; ?>" alt="<?php echo $car['nama']; ?>" style="width: 150px; height: 100px; object-fit: cover; border-radius: 12px;">
                <div>
                    <h3 style="font-size: 1.25rem; font-weight: 700;"><?php echo $car['nama']; ?></h3>
                    <p style="color: var(--secondary); margin-bottom: 0.5rem;"><?php echo $car['transmisi']; ?> • <?php echo $car['kapasitas']; ?> Kursi</p>
                    <div class="badge" style="background: var(--primary); color: white;"><?php echo $service_type == 'driver_service' ? 'Dengan Driver' : 'Lepas Kunci'; ?></div>
                </div>
            </div>

            <?php if ($driver): ?>
                <div style="border: 1px solid var(--gray-200); padding: 1.5rem; border-radius: 16px; margin-bottom: 2rem;">
                    <h4 style="margin-bottom: 1rem;">Data Driver</h4>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($driver['nama']); ?>&background=random" style="width: 50px; height: 50px; border-radius: 50%;">
                        <div>
                            <h5 style="font-size: 1rem;"><?php echo $driver['nama']; ?></h5>
                            <p style="font-size: 0.85rem; color: var(--secondary);">Driver Pilihan</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div style="background: white; border: 1px solid var(--gray-200); padding: 1.5rem; border-radius: 16px;">
                <h4 style="margin-bottom: 1.5rem;">Informasi Penting</h4>
                <ul style="color: var(--secondary); font-size: 0.9rem; list-style: disc; padding-left: 1.25rem;">
                    <li style="margin-bottom: 0.5rem;">Membawa KTP asli saat pengambilan kendaraan.</li>
                    <li style="margin-bottom: 0.5rem;">Menunjukkan SIM A yang masih berlaku (untuk lepas kunci).</li>
                    <li style="margin-bottom: 0.5rem;">Harga sudah termasuk asuransi dasar.</li>
                    <li>Pengembalian melebihi batas waktu akan dikenakan denda per jam.</li>
                </ul>
            </div>
        </div>

        <!-- Form Card -->
        <div class="detail-sidebar">
            <div class="content-card">
                <h3 style="margin-bottom: 2rem;">Detail Sewa</h3>
                <form action="../api/booking_process.php" method="POST" id="booking-form">
                    <input type="hidden" name="mobil_id" value="<?php echo $car['id']; ?>">
                    <input type="hidden" name="service_type" value="<?php echo $service_type; ?>">
                    <input type="hidden" name="driver_id" value="<?php echo $driver_id; ?>">
                    <input type="hidden" name="harga_per_hari" id="harga_per_hari" value="<?php echo $car['harga_per_hari']; ?>">

                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required min="<?php echo date('Y-m-d'); ?>" onchange="calculateTotal()">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required min="<?php echo date('Y-m-d'); ?>" onchange="calculateTotal()">
                    </div>

                    <div class="form-group">
                        <label for="metode_bayar">Metode Pembayaran</label>
                        <select name="metode_bayar" id="metode_bayar" class="form-control" required>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="Kartu Kredit">Kartu Kredit</option>
                            <option value="COD">COD (Bayar di Tempat)</option>
                        </select>
                    </div>

                    <div style="background: var(--gray-100); padding: 1.5rem; border-radius: 12px; margin: 2rem 0;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Durasi Sewa</span>
                            <span id="display-durasi">0 Hari</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-weight: 800; font-size: 1.2rem; color: var(--primary);">
                            <span>Total Harga</span>
                            <span id="display-total">Rp 0</span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem;">Konfirmasi Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function calculateTotal() {
    const start = document.getElementById('tanggal_mulai').value;
    const end = document.getElementById('tanggal_selesai').value;
    const harga = parseFloat(document.getElementById('harga_per_hari').value);
    
    if (start && end) {
        const d1 = new Date(start);
        const d2 = new Date(end);
        
        if (d2 >= d1) {
            const diffTime = Math.abs(d2 - d1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            
            const total = diffDays * harga;
            
            document.getElementById('display-durasi').innerText = diffDays + " Hari";
            document.getElementById('display-total').innerText = "Rp " + total.toLocaleString('id-ID');
        } else {
            document.getElementById('display-durasi').innerText = "0 Hari";
            document.getElementById('display-total').innerText = "Rp 0";
        }
    }
}
</script>

<?php include '../includes/footer.php'; ?>
