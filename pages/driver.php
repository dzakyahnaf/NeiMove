<?php
session_start();
$title = "Mitra Pengemudi";
$activePage = 'driver';
include '../includes/header.php';

// Data Driver
$drivers = [
    [
        'nama' => 'Pratama Ihza',
        'pengalaman' => '8 tahun di bidang angkutan barang skala kecil-menengah',
        'spesialis' => 'Pickup Bak',
        'rating' => '4.8',
        'foto' => 'Pratama Ihza.jpg'
    ],
    [
        'nama' => 'Andri Pamungkas',
        'pengalaman' => '6 tahun sebagai driver logistik & pengiriman dalam kota',
        'spesialis' => 'Motor & Van (pengiriman cepat)',
        'rating' => '4.9',
        'foto' => 'Andri Pamungkas.jpg'
    ],
    [
        'nama' => 'Rafi Abdillah',
        'pengalaman' => '10 tahun mengemudi kendaraan niaga',
        'spesialis' => 'CDD Bak & Box',
        'rating' => '4.7',
        'foto' => 'Rafi Abdillah.jpg'
    ],
    [
        'nama' => 'Muhammad Taga',
        'pengalaman' => '5 tahun driver ekspedisi dan kurir instan',
        'spesialis' => 'Motor (same day delivery)',
        'rating' => '4.9',
        'foto' => 'Muhammad Taga.jpg'
    ],
    [
        'nama' => 'Asep Santoso',
        'pengalaman' => '12 tahun di industri logistik berat',
        'spesialis' => 'Fuso Box',
        'rating' => '4.9',
        'foto' => 'Asep Santoso.jpg'
    ],
    [
        'nama' => 'Raihan Saputra',
        'pengalaman' => '7 tahun driver fuso & pengiriman antar kota',
        'spesialis' => 'Van',
        'rating' => '4.8',
        'foto' => 'Raihan Saputra.jpg'
    ],
    [
        'nama' => 'Mahardika',
        'pengalaman' => '15 tahun driver truk besar antar kota & antar pulau',
        'spesialis' => 'Tronton Wingbox',
        'rating' => '4.8',
        'foto' => 'Mahardika.jpg'
    ]
];
?>

<section class="page-header" style="background: var(--dark); color: white; text-align: center; padding: 4rem 1.5rem;">
    <div class="container">
        <h1 style="color: white; font-size: 3rem; font-weight: 900; margin-bottom: 1rem;">Mitra Pengemudi Handal</h1>
        <p style="opacity: 0.8; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Dipercaya oleh ribuan pelanggan. Para pengemudi kami terlatih, berpengalaman, dan siap mengantarkan barang Anda dengan aman dan tepat waktu.</p>
    </div>
</section>

<div class="container" style="padding: 4rem 1.5rem;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <?php foreach($drivers as $driver): ?>
            <div style="background: white; border-radius: 20px; overflow: hidden; border: 1px solid var(--gray-100); box-shadow: var(--card-shadow); transition: var(--transition); display: flex; flex-direction: column;">
                <div style="width: 100%; height: 300px; overflow: hidden; background: var(--gray-50);">
                    <img src="../assets/images/driver/<?php echo rawurlencode($driver['foto']); ?>" alt="<?php echo htmlspecialchars($driver['nama']); ?>" style="width: 100%; height: 100%; object-fit: cover; object-position: top;">
                </div>
                <div style="padding: 1.5rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--dark); margin: 0;"><?php echo htmlspecialchars($driver['nama']); ?></h3>
                        <div style="display: flex; align-items: center; background: rgba(255, 214, 10, 0.2); padding: 0.25rem 0.5rem; border-radius: 100px; gap: 0.25rem;">
                            <i data-lucide="star" style="color: #d4a017; width: 14px; height: 14px; fill: #d4a017;"></i>
                            <span style="font-size: 0.85rem; font-weight: 700; color: #d4a017;"><?php echo $driver['rating']; ?>/5</span>
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 1rem;">
                        <span style="display: inline-block; background: var(--gray-50); padding: 0.25rem 0.75rem; border-radius: 100px; font-size: 0.8rem; font-weight: 600; color: var(--primary); border: 1px solid rgba(248, 123, 27, 0.2);">
                            Spesialis: <?php echo htmlspecialchars($driver['spesialis']); ?>
                        </span>
                    </div>

                    <p style="color: var(--secondary); font-size: 0.95rem; line-height: 1.6; margin: 0; flex-grow: 1;">
                        <i data-lucide="clock" style="width: 14px; height: 14px; display: inline-block; vertical-align: middle; margin-right: 4px; margin-top: -2px;"></i>
                        <?php echo htmlspecialchars($driver['pengalaman']); ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
