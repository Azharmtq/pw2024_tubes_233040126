<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_unset();

// Hapus sesi dari penyimpanan
session_destroy();

// Redirect kembali ke halaman utama
header("Location: index.php");
exit();
?>
