<?php
// Fungsi untuk mendapatkan jumlah total data pengguna
function getTotalUsersCount($koneksi, $search = null) {
    $query = "SELECT COUNT(*) AS total FROM users";
    if ($search) {
        $query .= " WHERE username_user LIKE '%$search%'";
    }
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Fungsi untuk mendapatkan data pengguna sesuai dengan halaman dan jumlah data per halaman
function getUsers($koneksi, $offset, $limit, $search = null) {
    $query = "SELECT * FROM users";
    if ($search) {
        $query .= " WHERE username_user LIKE '%$search%'";
    }
    $query .= " LIMIT $offset, $limit";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

// Ambil nilai halaman saat ini atau set ke 1 jika tidak ada
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Jumlah data per halaman
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;

// Mendapatkan total jumlah data pengguna
$search = isset($_GET['search']) ? $_GET['search'] : null;
$totalUsers = getTotalUsersCount($koneksi, $search);

// Hitung total halaman
$totalPages = ceil($totalUsers / $limit);

// Pastikan halaman yang diminta tidak melebihi total halaman yang ada
$page = max(1, min($page, $totalPages));

// Hitung offset untuk query database berdasarkan halaman saat ini
$offset = ($page - 1) * $limit;

// Mendapatkan data pengguna untuk halaman saat ini
$users = getUsers($koneksi, $offset, $limit, $search);
?>