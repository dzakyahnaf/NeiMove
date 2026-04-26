<?php
require_once '../includes/auth.php';
// requireLogin(); // Homepage can be public, but let's follow the redirect flow for now

$title = "Home";
$activePage = 'home';

include '../includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Find Your Perfect Ride</h1>
        <p>Premium cars for your unforgettable journeys.</p>
    </div>
</section>

<section class="container" style="padding: 4rem 0; text-align: center;">
    <h2>Featured Cars</h2>
    <p style="color: var(--secondary); margin-bottom: 2rem;">This page is under construction. Please check the Dashboard for your bookings.</p>
    <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
</section>

<?php include '../includes/footer.php'; ?>
