<?php
// Informasi koneksi database
$host = 'localhost'; // Host database
$user = 'root'; // Username database
$password = ''; // Password database
$database = 'pw2024_tubes_233040126'; // Nama database

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

