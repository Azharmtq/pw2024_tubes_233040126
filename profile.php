<?php
// Mulai sesi
session_start();
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/'); // Sesuaikan dengan URL aplikasi Anda
// Contoh, asumsikan username disimpan dalam sesi saat pengguna login
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Tamu';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
</body>
</html>