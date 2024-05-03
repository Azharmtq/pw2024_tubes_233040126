<?php
// Mulai session
session_start();

// Fungsi untuk menetapkan nilai session pengguna jika sudah login
function setSessionIfLoggedIn($key, $value) {
    if (isLoggedIn()) {
        $_SESSION[$key] = $value;
    }
}

// Fungsi untuk mengecek apakah pengguna sudah login atau belum
function isLoggedIn() {
    // Anda dapat menentukan logika autentikasi di sini
    // Misalnya, Anda dapat memeriksa apakah ada session 'username' atau tidak
    return isset( $_SESSION['user_email']);
}

// Contoh penggunaan
setSessionIfLoggedIn('user_email', 'john@gmail.com');
?>