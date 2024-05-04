<?php
// Sertakan file koneksi.php untuk menghubungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id pengguna yang akan dihapus telah diterima dari URL
if(isset($_GET['id'])) {
    // Escape input untuk mencegah serangan SQL Injection
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query untuk menghapus pengguna berdasarkan id
    $query = "DELETE FROM users WHERE id = $id";

    // Eksekusi query
    if(mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman yang sesuai setelah penghapusan berhasil
        header("Location: admin.php");
        exit();
    } else {
        // Jika query gagal dieksekusi, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi database
mysqli_close($koneksi);?>