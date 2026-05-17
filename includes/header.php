<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . " | NeiNeiMove" : "NeiNeiMove - Layanan Pengiriman & Angkutan Barang"; ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    
    <!-- JS Libraries -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/main.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>
    <header class="navbar <?php echo ($activePage == 'home') ? 'navbar-transparent' : 'navbar-solid'; ?>">
        <div class="container">
            <div class="nav-brand">
                <a href="../pages/home.php">
                    <span class="brand-text">NeiNei<span>Move</span></span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <nav class="nav-menu-desktop">
                <ul>
                    <li><a href="../pages/home.php" class="<?php echo ($activePage == 'home') ? 'active' : ''; ?>">Home</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="../pages/dashboard.php" class="<?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="../pages/driver.php" class="<?php echo ($activePage == 'driver') ? 'active' : ''; ?>">Driver</a></li>
                    <li><a href="../pages/rewards.php" class="<?php echo ($activePage == 'rewards') ? 'active' : ''; ?>">Rewards</a></li>
                    <li><a href="../pages/testimoni.php" class="<?php echo ($activePage == 'testimoni') ? 'active' : ''; ?>">Testimonials</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle <?php echo (in_array($activePage, ['tentang', 'hubungi'])) ? 'active' : ''; ?>">
                            Perusahaan <i data-lucide="chevron-down" style="width: 16px; height: 16px; display: inline-block; vertical-align: middle;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="../pages/tentang.php" class="<?php echo ($activePage == 'tentang') ? 'active' : ''; ?>">Tentang Kami</a></li>
                            <li><a href="../pages/hubungi_kami.php" class="<?php echo ($activePage == 'hubungi') ? 'active' : ''; ?>">Hubungi Kami</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <div class="nav-actions">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <div class="user-profile">
                        <span class="user-name"><?php echo htmlspecialchars($_SESSION['user_nama']); ?></span>
                        <a href="../api/logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                    </div>
                <?php else: ?>
                    <a href="../pages/login.php" class="btn btn-primary">Login</a>
                <?php endif; ?>
            </div>

            <!-- Mobile Toggle -->
            <div class="nav-toggle" id="nav-toggle">
                <i data-lucide="menu" size="28"></i>
            </div>
        </div>
    </header>

    <div class="nav-menu" id="nav-menu">
        <ul>
            <li><a href="../pages/home.php" class="<?php echo ($activePage == 'home') ? 'active' : ''; ?>">Home</a></li>
            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="../pages/dashboard.php" class="<?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
            <?php endif; ?>
            <li><a href="../pages/driver.php" class="<?php echo ($activePage == 'driver') ? 'active' : ''; ?>">Driver</a></li>
            <li><a href="../pages/rewards.php" class="<?php echo ($activePage == 'rewards') ? 'active' : ''; ?>">Rewards</a></li>
            <li><a href="../pages/testimoni.php" class="<?php echo ($activePage == 'testimoni') ? 'active' : ''; ?>">Testimonials</a></li>
            <li><a href="../pages/tentang.php" class="<?php echo ($activePage == 'tentang') ? 'active' : ''; ?>">Tentang Kami</a></li>
            <li><a href="../pages/hubungi_kami.php" class="<?php echo ($activePage == 'hubungi') ? 'active' : ''; ?>">Hubungi Kami</a></li>
        </ul>

        <div class="mobile-actions">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="../api/logout.php" class="btn btn-outline-danger">Logout (<?php echo htmlspecialchars($_SESSION['user_nama']); ?>)</a>
            <?php else: ?>
                <a href="../pages/login.php" class="btn btn-primary">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <main class="<?php echo ($activePage == 'home') ? 'home-page' : ''; ?>">
