<?php
/**
 * Authentication Helper
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if the user is logged in.
 * Redirects to login page if not.
 */
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../pages/login.php");
        exit();
    }
}

/**
 * Check if the user is an admin.
 */
function requireAdmin() {
    requireLogin();
    if ($_SESSION['user_role'] !== 'admin') {
        header("Location: ../pages/home.php?error=unauthorized");
        exit();
    }
}

/**
 * Get current user data from session
 */
function getCurrentUser() {
    if (!isset($_SESSION['user_id'])) return null;
    return [
        'id' => $_SESSION['user_id'],
        'nama' => $_SESSION['user_nama'],
        'email' => $_SESSION['user_email'],
        'role' => $_SESSION['user_role']
    ];
}
