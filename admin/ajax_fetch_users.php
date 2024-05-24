<?php
include 'koneksi.php';
include 'users.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'user_id_asc';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = ($page - 1) * $limit;

$users = getUsers($koneksi, $offset, $limit, $search, $sort);
$totalUsers = getTotalUsersCount($koneksi, $search);
$totalPages = ceil($totalUsers / $limit);

$tableContent = '';
$paginationContent = '';

// Generate table content
if (mysqli_num_rows($users) > 0) {
    while ($row = mysqli_fetch_assoc($users)) {
        $tableContent .= '<tr>';
        $tableContent .= '<td>' . $row['user_id'] . '</td>';
        $tableContent .= '<td>' . $row['username_user'] . '</td>';
        $tableContent .= '<td>' . $row['email_user'] . '</td>';
        $tableContent .= '<td>';
        $tableContent .= '<a href="users_delete.php?id=' . $row['user_id'] . '" onclick="return confirm(\'Apakah anda yakin untuk hapus data ini?\')"><i class="bi bi-trash3-fill" style="color: salmon; font-size:larger"></i></a>';
        $tableContent .= '<a href="users_edit.php?id=' . $row['user_id'] . '" onclick="return confirm(\'Apakah anda yakin untuk edit data ini?\')"><i class="bi bi-pencil-square" style="color: white; font-size:larger;"></i></a>';
        $tableContent .= '</td>';
        $tableContent .= '</tr>';
    }
} else {
    $tableContent .= '<tr><td colspan="4">Data tidak ditemukan.</td></tr>';
}

// Generate pagination content
if ($totalPages > 1) {
    $paginationContent .= '<nav aria-label="Page navigation example"><ul class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        $paginationContent .= '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
        $paginationContent .= '<a class="page-link" href="#" onclick="fetchData(' . $i . ')">' . $i . '</a>';
        $paginationContent .= '</li>';
    }
    $paginationContent .= '</ul></nav>';
}

// Return JSON response
echo json_encode(['tableContent' => $tableContent, 'paginationContent' => $paginationContent]);