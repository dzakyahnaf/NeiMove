<?php
session_start();
$title = "NeiNei Rewards";
$activePage = 'rewards';
include '../includes/header.php';
?>

<section class="page-header" style="background: var(--dark); color: white; text-align: center; padding: 4rem 1.5rem;">
    <div class="container">
        <div style="display: inline-flex; justify-content: center; align-items: center; width: 80px; height: 80px; background: rgba(255, 0, 110, 0.2); border-radius: 50%; margin-bottom: 1.5rem;">
            <i data-lucide="gift" style="color: var(--primary); width: 40px; height: 40px;"></i>
        </div>
        <h1 style="color: white; font-size: 3rem; font-weight: 900; margin-bottom: 1rem;">Dapatkan 1 NeineiPoint di setiap pesanan</h1>
        <p style="opacity: 0.8; font-size: 1.1rem; max-width: 700px; margin: 0 auto; line-height: 1.6;">Nikmati keuntungan dari setiap order yang kamu lakukan. Setiap transaksi akan memberikan 1 NeiPoint yang bisa dikumpulkan dan ditukarkan dengan berbagai reward menarik.</p>
    </div>
</section>

<div class="container" style="padding: 4rem 1.5rem;">
    <div style="text-align: center; margin-bottom: 3rem;">
        <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 1rem; color: var(--dark);">Tingkat Reward Anda</h2>
        <p style="color: var(--secondary); font-size: 1.1rem;">1 NeineiPoint untuk setiap order pengiriman.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; max-width: 1000px; margin: 0 auto;">
        
        <!-- Reward 1 -->
        <div style="background: white; border-radius: 20px; padding: 2rem; border: 1px solid var(--gray-100); text-align: center; box-shadow: var(--card-shadow); transition: var(--transition);">
            <div style="font-size: 3rem; font-weight: 900; color: var(--primary); margin-bottom: 0.5rem;">10<span style="font-size: 1.2rem; font-weight: 600; color: var(--secondary);"> pts</span></div>
            <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; color: var(--dark);">1x Order Gratis</h3>
            <p style="color: var(--secondary); font-size: 1rem; line-height: 1.6;">Kumpulkan 10 NeineiPoint dan nikmati layanan pengiriman barang gratis untuk order Anda selanjutnya (maks. Rp100.000).</p>
        </div>

        <!-- Reward 2 -->
        <div style="background: white; border-radius: 20px; padding: 2rem; border: 1px solid var(--gray-100); text-align: center; box-shadow: var(--card-shadow); transition: var(--transition);">
            <div style="font-size: 3rem; font-weight: 900; color: var(--accent); margin-bottom: 0.5rem;">30<span style="font-size: 1.2rem; font-weight: 600; color: var(--secondary);"> pts</span></div>
            <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; color: var(--dark);">Voucher Makanan</h3>
            <p style="color: var(--secondary); font-size: 1rem; line-height: 1.6;">Bisa ditukar dengan voucher makanan spesial di partner kami seperti Marugame Udon, HokBen, atau Pepper Lunch.</p>
        </div>

        <!-- Reward 3 -->
        <div style="background: white; border-radius: 20px; padding: 2rem; border: 1px solid var(--gray-100); text-align: center; box-shadow: var(--card-shadow); transition: var(--transition); grid-column: 1 / -1; max-width: 600px; margin: 0 auto;">
            <div style="font-size: 3rem; font-weight: 900; color: #FFD60A; margin-bottom: 0.5rem;">50<span style="font-size: 1.2rem; font-weight: 600; color: var(--secondary);"> pts</span></div>
            <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; color: var(--dark);">🎁 Mega Reward</h3>
            <p style="color: var(--secondary); font-size: 1rem; line-height: 1.6;">Pilih hadiahmu! Tukarkan dengan Voucher Belanja / e-Wallet (OVO, GoPay, dll) senilai Rp250.000 ATAU diskon pengiriman raksasa hingga 50% untuk kebutuhan logistik bisnis Anda berikutnya.</p>
        </div>

    </div>

    <div style="text-align: center; margin-top: 4rem;">
        <?php if(!isset($_SESSION['user_id'])): ?>
            <a href="../pages/login.php" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">Daftar Sekarang & Mulai Kumpulkan</a>
        <?php else: ?>
            <a href="../pages/home.php" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">Order Sekarang</a>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
