<?php
include 'koneksi.php'; // Pastikan path ini sesuai dengan lokasi file koneksi Anda

// Mendapatkan user_id dari URL
$user_id = isset($_GET['id']) ? $_GET['id'] : '';

// Mengecek apakah user_id tidak kosong
if (!empty($user_id)) {
    // Query untuk menghapus user berdasarkan user_id
    $query = "DELETE FROM users WHERE user_id = ?";
    
    // Mempersiapkan statement untuk eksekusi
    $stmt = mysqli_prepare($koneksi, $query);
    
    // Mengikat parameter ke statement
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    
    // Menjalankan statement
    if (mysqli_stmt_execute($stmt)) {
        echo "User berhasil dihapus.";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    
    // Menutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID user tidak ditemukan.";
}

// Mengarahkan kembali ke halaman utama
header("Location: admin.php");
exit();
?>