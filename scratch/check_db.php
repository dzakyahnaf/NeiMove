<?php
require_once 'config/database.php';
$conn = getConnection();
$result = $conn->query("SELECT id, nama, email, password FROM users");
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . " | Email: " . $row['email'] . " | Hash: " . $row['password'] . "\n";
}
