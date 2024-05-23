<?php
include 'koneksi.php';
include 'users.php';

$search = isset($_GET['search']) ? $_GET['search'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'user_id_asc';

$users = getUsers($koneksi, 0, PHP_INT_MAX, $search, $sort);

if (mysqli_num_rows($users) > 0) {
    while ($row = mysqli_fetch_assoc($users)) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['username_user'] . '</td>';
        echo '<td>' . $row['email_user'] . '</td>';
        echo '<td>
                <a href="users_delete.php?id=' . $row['user_id'] . '" onclick="return confirm(\'Apakah anda yakin untuk hapus data ini?\')"><i class="bi bi-trash3-fill" style="color: salmon; font-size:larger"></i></a>
                <a href="users_edit.php?id=' . $row['user_id'] . '" onclick="return confirm(\'Apakah anda yakin untuk edit data ini?\')"><i class="bi bi-pencil-square" style="color: white; font-size:larger;"></i></a>
              </td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">Data tidak ditemukan.</td></tr>';
}