<?php
session_start();

// Hapus semua session
session_unset();

// Hancurkan session
session_destroy();

// Optional: hapus cookie login jika ada
if (isset($_COOKIE['remember'])) {
    setcookie('remember', '', time() - 3600, '/');
}

// Redirect ke halaman login
header("Location: login.php");
exit;
?>
