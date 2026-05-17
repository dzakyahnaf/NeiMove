<?php
/**
 * Database Configuration
 * 🚗 Rental Mobil Project
 */

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');       // Default XAMPP user
define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');           // Default XAMPP password (empty)
define('DB_NAME', getenv('DB_NAME') ?: 'rental_mobil');
define('DB_CHARSET', 'utf8mb4');

/**
 * Establishment of database connection
 */
function getConnection() {
    static $conn = null;
    if ($conn === null) {
        try {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $conn->set_charset(DB_CHARSET);
            
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
        } catch (Exception $e) {
            die("Database Error: " . $e->getMessage());
        }
    }
    return $conn;
}
