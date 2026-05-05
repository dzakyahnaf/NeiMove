<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . " | NeiMove" : "NeiMove - Premium Car Rental"; ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    
    <!-- JS Libraries -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../assets/js/main.js" defer></script>
</head>
<body>
    <header class="navbar <?php echo ($activePage == 'home') ? 'navbar-transparent' : 'navbar-solid'; ?>">
        <div class="container">
            <div class="nav-brand">
                <a href="../pages/home.php">
                    <span class="brand-text">Nei<span>Move</span></span>
                </a>
            </div>
            
            <nav class="nav-menu">
                <ul>
                    <li><a href="../pages/home.php" class="<?php echo ($activePage == 'home') ? 'active' : ''; ?>">Home</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="../pages/dashboard.php" class="<?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="../pages/testimoni.php">Testimonials</a></li>
                    <li><a href="../pages/tentang.php">About</a></li>
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
        </div>
    </header>
    <main class="<?php echo ($activePage == 'home') ? 'home-page' : ''; ?>">
