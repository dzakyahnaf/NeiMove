<?php
session_start();
$title = "Testimoni & Bantuan";
$activePage = 'testimoni';
include '../includes/header.php';
?>

<main class="page-header" style="background: var(--dark); color: white; padding: 6rem 0; margin-bottom: 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; font-weight: 900;">Testimoni & Bantuan</h1>
        <p style="opacity: 0.8; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Apa kata pelanggan kami dan temukan jawaban atas pertanyaan Anda.</p>
    </div>
</main>

<div class="container" style="padding: 4rem 1.5rem;">
    <!-- Testimonials Section -->
    <div style="margin-bottom: 5rem;" class="detail-main">
        <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 2rem; text-align: center;">Testimoni Pelanggan</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <!-- Dummy Testimoni 1 -->
            <div style="background: var(--gray-50); padding: 2rem; border-radius: 20px; border: 1px solid var(--gray-100);">
                <div style="display: flex; gap: 0.5rem; color: #f59e0b; margin-bottom: 1rem;">
                    <i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i>
                </div>
                <p style="color: var(--secondary); margin-bottom: 1.5rem; font-style: italic;">"Mobilnya sangat terawat dan wangi. Pelayanan dari tim NeiMove juga sangat profesional. Sangat direkomendasikan!"</p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="https://ui-avatars.com/api/?name=Andi+S&background=random" style="width: 40px; border-radius: 50%;">
                    <div>
                        <h5 style="font-weight: 700; font-size: 0.9rem;">Andi S.</h5>
                        <p style="font-size: 0.8rem; color: var(--secondary);">Sewa Innova Reborn</p>
                    </div>
                </div>
            </div>

            <!-- Dummy Testimoni 2 -->
            <div style="background: var(--gray-50); padding: 2rem; border-radius: 20px; border: 1px solid var(--gray-100);">
                <div style="display: flex; gap: 0.5rem; color: #f59e0b; margin-bottom: 1rem;">
                    <i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star"></i>
                </div>
                <p style="color: var(--secondary); margin-bottom: 1.5rem; font-style: italic;">"Driver sangat on-time dan hafal jalan. Perjalanan bisnis saya jadi lancar tanpa hambatan."</p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="https://ui-avatars.com/api/?name=Budi+Wibowo&background=random" style="width: 40px; border-radius: 50%;">
                    <div>
                        <h5 style="font-weight: 700; font-size: 0.9rem;">Budi Wibowo</h5>
                        <p style="font-size: 0.8rem; color: var(--secondary);">Sewa Alphard (Driver)</p>
                    </div>
                </div>
            </div>

            <!-- Dummy Testimoni 3 -->
            <div style="background: var(--gray-50); padding: 2rem; border-radius: 20px; border: 1px solid var(--gray-100);">
                <div style="display: flex; gap: 0.5rem; color: #f59e0b; margin-bottom: 1rem;">
                    <i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i><i data-lucide="star" fill="currentColor"></i>
                </div>
                <p style="color: var(--secondary); margin-bottom: 1.5rem; font-style: italic;">"Proses booking super cepat dan transparan. Tidak ada biaya tersembunyi. Pasti akan sewa lagi di sini."</p>
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <img src="https://ui-avatars.com/api/?name=Siti+A&background=random" style="width: 40px; border-radius: 50%;">
                    <div>
                        <h5 style="font-weight: 700; font-size: 0.9rem;">Siti A.</h5>
                        <p style="font-size: 0.8rem; color: var(--secondary);">Sewa Honda Brio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div style="margin-bottom: 5rem;" class="detail-main">
        <h2 style="font-size: 2rem; font-weight: 800; margin-bottom: 2rem; text-align: center;">Pertanyaan Umum (FAQ)</h2>
        
        <div style="display: flex; flex-direction: column; gap: 1rem; max-width: 800px; margin: 0 auto;">
            <div style="border: 1px solid var(--gray-200); border-radius: 16px; padding: 1.5rem; background: white;">
                <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
                    Apa saja syarat untuk menyewa kendaraan?
                    <i data-lucide="chevron-down" style="color: var(--secondary);"></i>
                </h4>
                <p style="color: var(--secondary); font-size: 0.95rem; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--gray-100);">
                    Untuk menyewa kendaraan, pelanggan perlu menunjukkan KTP yang masih berlaku dan SIM (untuk lepas kunci). Selain itu, penyewa diwajibkan mengisi data diri serta melakukan pembayaran sesuai ketentuan. Untuk beberapa jenis kendaraan, mungkin diperlukan deposit sebagai jaminan.
                </p>
            </div>

            <div style="border: 1px solid var(--gray-200); border-radius: 16px; padding: 1.5rem; background: white;">
                <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
                    Apakah harga sewa sudah termasuk sopir dan bahan bakar?
                    <i data-lucide="chevron-down" style="color: var(--secondary);"></i>
                </h4>
                <p style="color: var(--secondary); font-size: 0.95rem; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--gray-100);">
                    Harga sewa tergantung pada paket yang dipilih. Tersedia pilihan lepas kunci (tanpa sopir) dan dengan sopir. Biaya bahan bakar umumnya tidak termasuk dalam harga sewa, kecuali pada paket tertentu yang sudah mencakup sopir dan BBM.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact & WhatsApp -->
    <div class="detail-main" style="text-align: center; background: linear-gradient(135deg, var(--dark), #1e293b); color: white;">
        <h2 style="color: white; font-size: 2rem; font-weight: 800; margin-bottom: 1rem;">Butuh Bantuan Lebih Lanjut?</h2>
        <p style="opacity: 0.8; margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">Tim customer service kami siap melayani Anda 24/7 melalui WhatsApp.</p>
        
        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-primary" style="background: #25D366; color: white; padding: 1rem 2rem; font-size: 1.1rem;">
            <i data-lucide="message-circle"></i> Hubungi WhatsApp Cepat
        </a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
