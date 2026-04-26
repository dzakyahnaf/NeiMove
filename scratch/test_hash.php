<?php
$hash = '$2y$10$bY3iQ1TAqAhX50UUqpXtDeuvMVbKpDquzXtd0FlJRCWgcXwAZ5E.G';
$password = 'password';
if (password_verify($password, $hash)) {
    echo "Password is valid!";
} else {
    echo "Invalid password hash.";
}
