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

function getUsers($koneksi, $offset, $limit, $search = null, $sort = 'user_id_asc') {
    $query = "SELECT * FROM users";
    if ($search) {
        $query .= " WHERE username_user LIKE '%$search%'";
    }
    if ($sort === 'username_user_asc') {
        $query .= " ORDER BY username_user ASC";
    } elseif ($sort === 'username_user_desc') {
        $query .= " ORDER BY username_user DESC";
    } elseif ($sort === 'user_id_asc') {
        $query .= " ORDER BY user_id ASC";
    } elseif ($sort === 'user_id_desc') {
        $query .= " ORDER BY user_id DESC";
    }
    $query .= " LIMIT $offset, $limit";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
$search = isset($_GET['search']) ? $_GET['search'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'user_id_asc';

$totalUsers = getTotalUsersCount($koneksi, $search);
$totalPages = ceil($totalUsers / $limit);
$page = max(1, min($page, $totalPages));
$offset = ($page - 1) * $limit;

$users = getUsers($koneksi, $offset, $limit, $search, $sort);

?>