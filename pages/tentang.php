<?php
session_start();
$title = "Tentang Perusahaan";
$activePage = 'tentang';
include '../includes/header.php';
?>

<section class="page-header" style="background: var(--dark); color: white; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; font-weight: 900;">Tentang NeiNeiMove</h1>
        <p style="opacity: 0.8; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Penyedia layanan pengiriman dan angkutan barang terpercaya untuk solusi logistik Anda.</p>
    </div>
</section>

<div class="container" style="padding: 2.5rem 1.5rem 4rem;">
    <div class="detail-container" style="grid-template-columns: 1fr 1fr; align-items: center;">
        
        <!-- Image/Visual Profile -->
        <div class="detail-img" style="height: auto; margin-bottom: 0; position: relative; overflow: hidden; border-radius: 24px; box-shadow: var(--card-shadow-hover);">
            <img src="../assets/images/hero-bg-2.png" style="width: 100%; height: 100%; object-fit: cover; display: block;" alt="NeiMove Fleet">
            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white;">
                <h3 style="color: white; font-size: 1.5rem; margin-bottom: 0.5rem;">Armada Logistik Terlengkap</h3>
                <p style="opacity: 0.9; font-size: 0.9rem;">Pilihan armada yang beragam untuk mendukung efisiensi pengiriman Anda.</p>
            </div>
        </div>

        <!-- Text Profile -->
        <div class="detail-main" style="background: transparent; box-shadow: none; padding: 0 2rem;">
            <div class="badge" style="background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 100px; font-weight: 800; font-size: 0.75rem; margin-bottom: 1.5rem; display: inline-block;">TENTANG KAMI</div>
            <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 1.5rem; color: var(--dark); line-height: 1.2;">Solusi Logistik<br>Cepat & Aman.</h2>
            
            <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem;">
                Didirikan di Yogyakarta, Jawa Tengah pada tahun 2025, <strong>NeiNeiMove</strong> merupakan perusahaan startup di bidang transportasi dan pengiriman yang hadir dengan tujuan mempermudah masyarakat dalam melakukan mobilitas serta distribusi barang secara cepat, praktis, dan terjangkau. Melalui satu platform, individu, pelaku usaha kecil, hingga perusahaan dapat mengakses berbagai pilihan armada yang dioperasikan oleh mitra pengemudi profesional.
            </p>
            
            <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
                Berbasis teknologi, NeiNeiMove mengintegrasikan pengguna, kendaraan, dan proses pengiriman dalam satu sistem yang efisien, sehingga mampu mendukung kebutuhan transportasi dan logistik secara menyeluruh di berbagai wilayah di Indonesia.
            </p>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: 16px; border: 1px solid var(--gray-100);">
                    <i data-lucide="shield-check" style="color: var(--primary); width: 32px; height: 32px; margin-bottom: 1rem;"></i>
                    <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Safety First</h4>
                    <p style="font-size: 0.9rem; color: var(--secondary);">Keamanan barang Anda adalah prioritas utama kami dengan asuransi pengiriman.</p>
                </div>
                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: 16px; border: 1px solid var(--gray-100);">
                    <i data-lucide="truck" style="color: var(--primary); width: 32px; height: 32px; margin-bottom: 1rem;"></i>
                    <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Reliability</h4>
                    <p style="font-size: 0.9rem; color: var(--secondary);">Layanan yang tepat waktu dan dapat diandalkan untuk segala jenis pengiriman.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Owner Profile Card -->
    <div style="margin-top: 5rem; max-width: 800px; margin-left: auto; margin-right: auto;">
        <div style="background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%); border-radius: 24px; padding: 3rem; display: flex; flex-wrap: wrap; gap: 3rem; align-items: center; border: 1px solid var(--gray-100); box-shadow: var(--card-shadow);">
            <div style="flex: 1; min-width: 250px;">
                <h3 style="font-size: 2.5rem; font-weight: 900; color: var(--dark); margin-bottom: 0.25rem;">Neisha Reya</h3>
                <p style="color: var(--primary); font-weight: 800; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 2rem;">Owner NeiNeiMove</p>
                
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="https://wa.me/6281215690152" target="_blank" style="display: flex; align-items: center; gap: 1rem; color: var(--secondary); text-decoration: none; padding: 0.75rem 1.5rem; background: white; border-radius: 100px; border: 1px solid var(--gray-100); transition: var(--transition);" onmouseover="this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" onmouseout="this.style.borderColor='var(--gray-100)'; this.style.color='var(--secondary)'">
                        <i data-lucide="message-circle" style="width: 20px; height: 20px;"></i>
                        <span style="font-weight: 600;">081215690152</span>
                    </a>
                    <a href="https://instagram.com/reyaneisha" target="_blank" style="display: flex; align-items: center; gap: 1rem; color: var(--secondary); text-decoration: none; padding: 0.75rem 1.5rem; background: white; border-radius: 100px; border: 1px solid var(--gray-100); transition: var(--transition);" onmouseover="this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" onmouseout="this.style.borderColor='var(--gray-100)'; this.style.color='var(--secondary)'">
                        <i data-lucide="instagram" style="width: 20px; height: 20px;"></i>
                        <span style="font-weight: 600;">@reyaneisha</span>
                    </a>
                    <a href="mailto:reyaneisha@gmail.com" style="display: flex; align-items: center; gap: 1rem; color: var(--secondary); text-decoration: none; padding: 0.75rem 1.5rem; background: white; border-radius: 100px; border: 1px solid var(--gray-100); transition: var(--transition);" onmouseover="this.style.borderColor='var(--primary)'; this.style.color='var(--primary)'" onmouseout="this.style.borderColor='var(--gray-100)'; this.style.color='var(--secondary)'">
                        <i data-lucide="mail" style="width: 20px; height: 20px;"></i>
                        <span style="font-weight: 600;">reyaneisha@gmail.com</span>
                    </a>
                </div>
            </div>
            <div style="flex: 1; min-width: 250px; text-align: center;">
                <div style="width: 200px; height: 200px; border-radius: 50%; background: var(--gray-100); display: inline-flex; justify-content: center; align-items: center; border: 4px solid white; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden;">
                    <img src="../assets/images/profil.png" alt="Neisha Reya" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <!-- Location/Address -->
    <div class="detail-main" style="margin-top: 5rem; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;">
        <div style="display: inline-flex; justify-content: center; align-items: center; width: 64px; height: 64px; background: rgba(248, 123, 27, 0.1); border-radius: 50%; margin-bottom: 1.5rem;">
            <i data-lucide="map-pin" style="color: var(--primary); width: 32px; height: 32px;"></i>
        </div>
        <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">Lokasi Operasional</h2>
        <p style="color: var(--secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
            Bersole, Karangpucung, Kec. Purwokerto Sel.,<br>Kabupaten Banyumas, Jawa Tengah 53142
        </p>
        <a href="https://maps.google.com/?q=Bersole,+Karangpucung,+Purwokerto+Selatan" target="_blank" class="btn btn-primary">
            <i data-lucide="map"></i> Buka di Google Maps
        </a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
