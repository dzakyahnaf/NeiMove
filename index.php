<?php
/**
 * Main Entry Point
 */
session_start();

if (isset($_SESSION['user_id'])) {
    // If logged in, go to home (or dashboard)
    header("Location: pages/home.php");
} else {
    // If not logged in, go to login page
    header("Location: pages/login.php");
}
exit();
