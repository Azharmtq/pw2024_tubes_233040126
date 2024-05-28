<?php
include 'koneksi.php'; // Pastikan ini adalah path yang benar ke file koneksi database Anda
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php");
    exit();
}
// Reset dan hash password untuk tabel users
$queryUsers = "SELECT user_id, username_user FROM users";
$resultUsers = mysqli_query($koneksi, $queryUsers);

while ($rowUsers = mysqli_fetch_assoc($resultUsers)) {
    $new_password_users = password_hash($rowUsers['username_user'], PASSWORD_DEFAULT);
    
    // Update password dengan username yang di-hash
    $update_query_users = "UPDATE users SET password_user = ? WHERE user_id = ?";
    $stmtUsers = mysqli_prepare($koneksi, $update_query_users);
    mysqli_stmt_bind_param($stmtUsers, "si", $new_password_users, $rowUsers['user_id']);
    mysqli_stmt_execute($stmtUsers);
    mysqli_stmt_close($stmtUsers);
}

// Reset dan hash password untuk tabel admin
$queryAdmin = "SELECT admin_id, admin_username FROM admin";
$resultAdmin = mysqli_query($koneksi, $queryAdmin);

while ($rowAdmin = mysqli_fetch_assoc($resultAdmin)) {
    $new_password_admin = password_hash($rowAdmin['admin_username'], PASSWORD_DEFAULT);
    
    // Update password dengan username yang di-hash
    $update_query_admin = "UPDATE admin SET admin_password = ? WHERE admin_id = ?";
    $stmtAdmin = mysqli_prepare($koneksi, $update_query_admin);
    mysqli_stmt_bind_param($stmtAdmin, "si", $new_password_admin, $rowAdmin['admin_id']);
    mysqli_stmt_execute($stmtAdmin);
    mysqli_stmt_close($stmtAdmin);
}

echo "Password untuk semua users dan admin telah di-reset dan di-update.";
echo"<script>window.location.href='admin.php';</script>";
?>