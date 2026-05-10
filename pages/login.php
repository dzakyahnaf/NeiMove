<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$title = "Login";
$activePage = 'login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | NeiNeiMove</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="login-body">

    <section class="login-section">
        <div class="login-card">
            <div class="login-header">
                <a href="home.php" class="brand-text">NeiNei<span>Move</span></a>
                <h1>Welcome Back</h1>
                <p>Please enter your details to sign in.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        if ($_GET['error'] == 'invalid') echo "Invalid email or password.";
                        else if ($_GET['error'] == 'required') echo "Please fill all fields.";
                        else echo "An error occurred. Please try again.";
                    ?>
                </div>
            <?php endif; ?>

            <form action="../api/login_process.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                </div>
                
                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
                </div>
            </form>

            <div style="text-align: center; margin-top: 2rem; color: var(--secondary); font-size: 0.9rem;">
                Don't have an account? <a href="#" style="color: var(--primary); font-weight: 600;">Sign up for free</a>
            </div>
        </div>
    </section>

</body>
</html>
