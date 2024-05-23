<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM content WHERE content_id = $id";
    $result = mysqli_query($koneksi, $query);
    if($result) {
        // Redirect kembali ke halaman konten setelah penghapusan
        header("Location: content.php");
        exit();
    } else {
        echo "Gagal menghapus konten.";
    }
} else {
    echo "ID konten tidak ditemukan.";
}