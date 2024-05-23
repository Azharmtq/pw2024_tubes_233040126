<?php
session_start();
// Definisikan basis URL
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/'); // Sesuaikan dengan URL aplikasi Anda
// Cek apakah pengguna sudah login dan apakah role-nya adalah admin
if (!isset($_SESSION['user_logged_in']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php"); // Asumsi login.php berada di luar folder admin
    exit();
}

// Include file koneksi ke database
include 'koneksi.php';
include 'users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* @media print {
         ini dari pak sandhika terkait jika halaman di print   
        } */
    </style>
</head>
<body>
    <?php include '../include/navbar.php';?>
    <div class="container-fluid" style="min-height: 90vh;">
        <div class="row">
            <div class="container-lg">
                <div class="user_table table-responsive"> 
                <h1>DATA USER</h1>
                    <input type="text" id="searchInput" placeholder="Cari" onkeyup="fetchData()">
                    <select id="sortSelect" onchange="fetchData()">
                        <option value="user_id_asc">ID Terkecil</option>
                        <option value="username_user_asc">Username A to Z</option>
                        <option value="username_user_desc   ">Username Z to A</option>
                        <option value="user_id_desc">ID Terbesar</option>
                    </select>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <?php if ($totalUsers > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($users)) : ?>
                                    <tr>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['username_user']; ?></td>
                                        <td><?php echo $row['email_user']; ?></td>
                                        <td>
                                            <a href="users_delete.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('Apakah anda yakin untuk hapus data ini?')"><i class="bi bi-trash3-fill" style="color: salmon; font-size:larger"></i></a>
                                            <a href="users_edit.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('Apakah anda yakin untuk edit data ini?')"><i class="bi bi-pencil-square" style="color: white; font-size:larger;"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">Data tidak ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="list_user table-responsive">
                <!-- Dropdown untuk jumlah data per halaman -->
                <div class="option">
                    <select class="form-select" id="limitSelect" onchange="changeLimit()">
                        <option value="5" <?php echo $limit == 5 ? 'selected' : ''; ?>>5</option>
                        <option value="10" <?php echo $limit == 10 ? 'selected' : ''; ?>>10</option>
                        <option value="15" <?php echo $limit == 15 ? 'selected' : ''; ?>>15</option>
                        <option value="20" <?php echo $limit == 20 ? 'selected' : ''; ?>>20</option>
                        <option value="25" <?php echo $limit == 25 ? 'selected' : ''; ?>>25</option>
                        <option value="50" <?php echo $limit == 50 ? 'selected' : ''; ?>>50</option>
                        <option value="100" <?php echo $limit == 100 ? 'selected' : ''; ?>>100</option>
                    </select>
                </div>
                <!-- Paginasi -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($totalUsers > 0) : ?>
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <?php if ($i <= 3 || $i >= $totalPages - 2 || ($i >= $page - 1 && $i <= $page + 1)) : ?>
                                    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>"><a class="page-link btn btn-outline-success" href="?page=<?php echo $i . ($search ? '&search=' . $search : '') . '&limit=' . $limit; ?>"><?php echo $i; ?></a></li>
                                <?php elseif ($i == 4 && $page > 5) : ?>
                                    <li class="page-item disabled"><a class="page-link btn btn-outline-success" href="#">...</a></li>
                                <?php elseif ($i == $totalPages - 3 && $page < $totalPages - 4) : ?>
                                    <li class="page-item disabled"><a class="page-link btn btn-outline-success" href="#">...</a></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
                </div>
                <div class="table-responsive" style="display: flex; gap: 10px; flex-wrap:wrap;">
                <a href="users_add.php" class="l-konten btn btn-success">Tambah User</a>
                <a href="content.php" class="l-konten btn btn-success">Kelola Konten</a>
                <a href="cetak.php" target="_blank" class="l-konten btn btn-success"><i class="bi bi-printer" style="font-size:15px;"></i></a>
                </div>
                </div>
            </div>
        </div>
    
    <?php include '../include/footer.php';?>
    <?php include 'script.php';?>
    <script>
        function changeLimit() {
            var limit = document.getElementById("limitSelect").value;
            window.location.href = "?limit=" + limit;
        }

        function fetchData() {
            var search = document.getElementById('searchInput').value;
            var sort = document.getElementById('sortSelect').value;

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'ajax_fetch_users.php?search=' + search + '&sort=' + sort, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('userTableBody').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
