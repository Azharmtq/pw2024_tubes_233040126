<?php
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'content_upload_asc';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = ($page - 1) * $limit;

// Fungsi untuk mendapatkan data konten
function getContent($koneksi, $offset, $limit, $search, $sort) {
    $search = mysqli_real_escape_string($koneksi, $search);
    $orderBy = '';

    switch ($sort) {
        case 'content_upload_asc':
            $orderBy = 'content_upload ASC';
            break;
        case 'content_upload_desc':
            $orderBy = 'content_upload DESC';
            break;
        case 'content_release_asc':
            $orderBy = 'content_release ASC';
            break;
        case 'content_release_desc':
            $orderBy = 'content_release DESC';
            break;
        default:
            $orderBy = 'content_upload ASC';
            break;
    }

    $query = "SELECT * FROM content WHERE content_title LIKE '%$search%' ORDER BY $orderBy LIMIT $offset, $limit";
    return mysqli_query($koneksi, $query);
}

// Fungsi untuk mendapatkan jumlah total konten
function getTotalContentCount($koneksi, $search) {
    $search = mysqli_real_escape_string($koneksi, $search);
    $query = "SELECT COUNT(*) as count FROM content WHERE content_title LIKE '%$search%'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    return $data['count'];
}

$content = getContent($koneksi, $offset, $limit, $search, $sort);
$totalContent = getTotalContentCount($koneksi, $search);
$totalPages = ceil($totalContent / $limit);

$tableContent_musik = '';
$paginationContent_musik = '';

if (mysqli_num_rows($content) > 0) {
    while ($row = mysqli_fetch_assoc($content)) {
        $tableContent_musik .= '<tr>';
        $tableContent_musik .= '<td>' . $row['content_id'] . '</td>';
        $tableContent_musik .= '<td>' . $row['content_title'] . '</td>';
        $tableContent_musik .= '<td>' . $row['content_musik'] . '</td>';
        $tableContent_musik .= '<td style="widht:100px !important;">' . $row['content_url'] . '</td>';
        $tableContent_musik .= '<td><img src="../assets/img/' . $row['content_picture'] . '" alt="" style="width: 150px; height: auto;"></td>';
        $tableContent_musik .= '<td>' . $row['content_upload'] . '</td>';
        $tableContent_musik .= '<td>' . $row['content_release'] . '</td>';
        $tableContent_musik .= '<td>';
        $tableContent_musik .= '<a href="./content_delete.php?id=' . $row['content_id'] . '" onclick="return confirm(\'Apakah anda yakin untuk hapus data ini?\')"><i class="bi bi-trash3-fill" style="color: salmon; font-size:larger"></i></a>';
        $tableContent_musik .= '<a href="./content_edit.php?id=' . $row['content_id'] . '" onclick="return confirm(\'Apakah anda yakin untuk edit data ini?\')"><i class="bi bi-pencil-square" style="color: white; font-size:larger;"></i></a>';
        $tableContent_musik .= '</td>';
        $tableContent_musik .= '</tr>';
    }
} else {
    $tableContent_musik .= '<tr><td colspan="8">Data tidak ditemukan.</td></tr>';
}

if ($totalPages > 1) {
    $paginationContent_musik .= '<nav aria-label="Page navigation example"><ul class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        $paginationContent_musik .= '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
        $paginationContent_musik .= '<a class="page-link" href="#" onclick="fetchData(' . $i . ')">' . $i . '</a>';
        $paginationContent_musik .= '</li>';
    }
    $paginationContent_musik .= '</ul></nav>';
}

echo json_encode(['tableContent_musik' => $tableContent_musik, 'paginationContent_musik' => $paginationContent_musik]);
?>
