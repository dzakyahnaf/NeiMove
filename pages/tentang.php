<?php
session_start();
$title = "Tentang Perusahaan";
$activePage = 'tentang';
include '../includes/header.php';
?>

<main class="page-header" style="background: var(--dark); color: white; padding: 6rem 0; margin-bottom: 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; font-weight: 900;">Tentang NeiMove</h1>
        <p style="opacity: 0.8; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Penyedia layanan rental mobil premium terbaik untuk perjalanan eksklusif Anda.</p>
    </div>
</main>

<div class="container" style="padding: 4rem 1.5rem;">
    <div class="detail-container" style="grid-template-columns: 1fr 1fr; align-items: center;">
        
        <!-- Image/Visual Profile -->
        <div class="detail-img" style="height: auto; margin-bottom: 0; position: relative; overflow: hidden; border-radius: 24px; box-shadow: var(--card-shadow-hover);">
            <img src="../assets/images/hero-bg-2.png" style="width: 100%; height: 100%; object-fit: cover; display: block;" alt="NeiMove Fleet">
            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white;">
                <h3 style="color: white; font-size: 1.5rem; margin-bottom: 0.5rem;">Koleksi Mobil Premium</h3>
                <p style="opacity: 0.9; font-size: 0.9rem;">Armada terbaru dengan perawatan rutin untuk kenyamanan maksimal.</p>
            </div>
        </div>

        <!-- Text Profile -->
        <div class="detail-main" style="background: transparent; box-shadow: none; padding: 0 2rem;">
            <div class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 100px; font-weight: 800; font-size: 0.75rem; margin-bottom: 1.5rem; display: inline-block;">PROFIL KAMI</div>
            <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 1.5rem; color: var(--dark); line-height: 1.2;">Lebih dari sekadar<br>penyewaan mobil.</h2>
            
            <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem;">
                <strong>NeiMove</strong> hadir sebagai solusi mobilitas premium di Jakarta dan sekitarnya. Kami berdedikasi untuk memberikan pengalaman berkendara yang aman, nyaman, dan berkelas bagi setiap pelanggan.
            </p>
            
            <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
                Baik untuk kebutuhan bisnis, liburan keluarga, atau sekadar perjalanan dalam kota, armada kami selalu siap menemani dengan pilihan mobil lepas kunci maupun dengan sopir profesional.
            </p>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: 16px; border: 1px solid var(--gray-100);">
                    <i data-lucide="shield-check" style="color: var(--primary); width: 32px; height: 32px; margin-bottom: 1rem;"></i>
                    <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Aman & Terpercaya</h4>
                    <p style="font-size: 0.9rem; color: var(--secondary);">Perlindungan asuransi dan kendaraan yang selalu dicek.</p>
                </div>
                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: 16px; border: 1px solid var(--gray-100);">
                    <i data-lucide="star" style="color: var(--primary); width: 32px; height: 32px; margin-bottom: 1rem;"></i>
                    <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Layanan Premium</h4>
                    <p style="font-size: 0.9rem; color: var(--secondary);">Kebersihan kabin dan kenyamanan prioritas utama.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Location/Address -->
    <div class="detail-main" style="margin-top: 5rem; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">
        <div style="display: inline-flex; justify-content: center; align-items: center; width: 64px; height: 64px; background: rgba(248, 123, 27, 0.1); border-radius: 50%; margin-bottom: 1.5rem;">
            <i data-lucide="map-pin" style="color: var(--primary); width: 32px; height: 32px;"></i>
        </div>
        <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">Kunjungi Kantor Kami</h2>
        <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
            Jl. Metro Pondok Indah, RT.1/RW.16, Pd. Pinang,<br>Kec. Kebayoran Lama, Kota Jakarta Selatan,<br>Daerah Khusus Ibukota Jakarta 12310
        </p>
        <a href="https://maps.google.com/?q=Jl.+Metro+Pondok+Indah,+Jakarta+Selatan" target="_blank" class="btn btn-primary">
            <i data-lucide="map"></i> Buka di Google Maps
        </a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
