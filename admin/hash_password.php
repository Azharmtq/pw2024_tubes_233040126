<?php
include 'koneksi.php'; // Pastikan ini adalah path yang benar ke file koneksi database Anda
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php");
    exit();
}
// Hashing untuk tabel admin
$queryAdmin = "SELECT admin_id, admin_password FROM admin";
$resultAdmin = mysqli_query($koneksi, $queryAdmin);

while ($rowAdmin = mysqli_fetch_assoc($resultAdmin)) {
    $hashed_password_admin = password_hash($rowAdmin['admin_password'], PASSWORD_DEFAULT);
    
    // Update password dengan versi yang di-hash untuk admin
    $update_query_admin = "UPDATE admin SET admin_password = ? WHERE admin_id = ?";
    $stmtAdmin = mysqli_prepare($koneksi, $update_query_admin);
    mysqli_stmt_bind_param($stmtAdmin, "si", $hashed_password_admin, $rowAdmin['admin_id']);
    mysqli_stmt_execute($stmtAdmin);
    mysqli_stmt_close($stmtAdmin);
}

// Hashing untuk tabel users
$queryUsers = "SELECT user_id, password_user FROM users";
$resultUsers = mysqli_query($koneksi, $queryUsers);

while ($rowUsers = mysqli_fetch_assoc($resultUsers)) {
    $hashed_password_users = password_hash($rowUsers['password_user'], PASSWORD_DEFAULT);
    
    // Update password dengan versi yang di-hash untuk users
    $update_query_users = "UPDATE users SET password_user = ? WHERE user_id = ?";
    $stmtUsers = mysqli_prepare($koneksi, $update_query_users);
    mysqli_stmt_bind_param($stmtUsers, "si", $hashed_password_users, $rowUsers['user_id']);
    mysqli_stmt_execute($stmtUsers);
    mysqli_stmt_close($stmtUsers);
}

echo "Password untuk admin dan user telah di-update ke format yang di-hash.";
echo"<script>window.location.href='admin.php';</script>";
?>

