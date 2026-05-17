<?php
session_start();
$title = "Hubungi Kami";
$activePage = 'hubungi';
include '../includes/header.php';
?>

<section class="page-header" style="background: var(--dark); color: white; text-align: center; padding: 4rem 1.5rem;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; font-weight: 900; margin-bottom: 1rem;">Hubungi Kami</h1>
        <p style="opacity: 0.8; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Pusat bantuan dan layanan informasi untuk mempermudah pengalaman logistik Anda bersama NeiNeiMove.</p>
    </div>
</section>

<div class="container" style="padding: 4rem 1.5rem;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; align-items: start;">
        
        <!-- Contact Information -->
        <div style="background: white; border-radius: 20px; padding: 2.5rem; border: 1px solid var(--gray-100); box-shadow: var(--card-shadow);">
            <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 2rem; color: var(--dark); border-bottom: 2px solid var(--gray-100); padding-bottom: 1rem;">Kontak Resmi</h2>
            
            <div style="margin-bottom: 2rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 0, 110, 0.1); display: flex; justify-content: center; align-items: center;">
                        <i data-lucide="message-square" style="color: var(--primary); width: 20px; height: 20px;"></i>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 700; margin: 0;">LIVE CHAT SERVICE</h3>
                </div>
                <p style="color: var(--secondary); margin-left: 3.5rem; margin-bottom: 1rem;">Layanan pelanggan kami siap membantu Anda 24/7.</p>
                <a href="https://wa.me/6281215690152" target="_blank" class="btn btn-primary" style="margin-left: 3.5rem;">
                    <i data-lucide="message-circle" style="width: 18px; height: 18px;"></i> ChatNei!
                </a>
            </div>

            <div style="margin-bottom: 2rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 0, 110, 0.1); display: flex; justify-content: center; align-items: center;">
                        <i data-lucide="mail" style="color: var(--primary); width: 20px; height: 20px;"></i>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 700; margin: 0;">EMAIL</h3>
                </div>
                <a href="mailto:reyaneisha@gmail.com" style="color: var(--primary); font-weight: 600; margin-left: 3.5rem; text-decoration: none;">reyaneisha@gmail.com</a>
            </div>

            <div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255, 0, 110, 0.1); display: flex; justify-content: center; align-items: center;">
                        <i data-lucide="map-pin" style="color: var(--primary); width: 20px; height: 20px;"></i>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 700; margin: 0;">ALAMAT</h3>
                </div>
                <p style="color: var(--secondary); line-height: 1.6; margin-left: 3.5rem;">
                    Jl. Laksda Adisucipto No.Km. 6, Ambarukmo, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                </p>
            </div>
        </div>

        <!-- FAQs -->
        <div>
            <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 2rem; color: var(--dark);">FAQs (Tanya Jawab)</h2>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                
                <!-- FAQ 1 -->
                <div style="background: white; border-radius: 16px; padding: 1.5rem; border: 1px solid var(--gray-100); box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1rem; color: var(--dark); display: flex; gap: 0.75rem; align-items: flex-start;">
                        <i data-lucide="help-circle" style="color: var(--primary); width: 20px; height: 20px; flex-shrink: 0; margin-top: 2px;"></i>
                        Apakah saya dapat melacak pengiriman barang saya?
                    </h4>
                    <p style="color: var(--secondary); line-height: 1.6; margin-left: 2.25rem;">
                        Ya! Lalamove memungkinkan kamu untuk melacak tiap order, memberimu informasi terbaru tentang status pengirimanmu. Pantau pengirimanmu secara real-time dan dapatkan pemberitahuan langsung saat pengiriman telah selesai.<br><br>Kamu bahkan dapat mengirimkan informasi pelacakan ke penerima, sehingga mereka mengetahui kapan barang akan tiba.
                    </p>
                </div>

                <!-- FAQ 2 -->
                <div style="background: white; border-radius: 16px; padding: 1.5rem; border: 1px solid var(--gray-100); box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1rem; color: var(--dark); display: flex; gap: 0.75rem; align-items: flex-start;">
                        <i data-lucide="help-circle" style="color: var(--primary); width: 20px; height: 20px; flex-shrink: 0; margin-top: 2px;"></i>
                        Apakah saya akan menerima update ketika pengiriman saya telah diterima?
                    </h4>
                    <p style="color: var(--secondary); line-height: 1.6; margin-left: 2.25rem;">
                        Ya! Fitur tanda terima elektronik kami memberikan bukti pengiriman berupa tanda tangan elektronik oleh penerima, memungkinkan kamu untuk segera mengetahui saat penerima telah menerima paket.
                    </p>
                </div>

                <!-- FAQ 3 -->
                <div style="background: white; border-radius: 16px; padding: 1.5rem; border: 1px solid var(--gray-100); box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1rem; color: var(--dark); display: flex; gap: 0.75rem; align-items: flex-start;">
                        <i data-lucide="help-circle" style="color: var(--primary); width: 20px; height: 20px; flex-shrink: 0; margin-top: 2px;"></i>
                        Apa yang terjadi jika barang saya rusak saat di perjalanan?
                    </h4>
                    <p style="color: var(--secondary); line-height: 1.6; margin-left: 2.25rem; margin-bottom: 1rem;">
                        Neineimove memberikan kompensasi kepada pelanggan atas kerugian langsung barang-barang yang hilang, dicuri, atau rusak selama pengangkutan atau pengiriman. Kamu akan mendapatkan kompensasi dengan detail sebagai berikut:
                    </p>
                    <ul style="color: var(--secondary); line-height: 1.6; margin-left: 3.5rem; margin-bottom: 1rem; list-style-type: disc;">
                        <li><strong>Motor:</strong> Rp1.000.000</li>
                        <li><strong>Van:</strong> Rp4.000.000</li>
                        <li><strong>Pickup Bak:</strong> Rp6.000.000</li>
                        <li><strong>Fuso Box:</strong> Rp6.000.000</li>
                    </ul>
                    <p style="color: var(--secondary); line-height: 1.6; margin-left: 2.25rem; font-style: italic;">
                        Cakupan ini tersedia sebagai layanan tambahan kapan pun Anda butuhkan tanpa dipungut biaya tambahan.
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include '../includes/footer.php'; ?>
