<?php
session_start();
include 'koneksi.php';
// Fungsi untuk mendapatkan jumlah total data konten
function getTotalContentCount($koneksi, $search = null) {
    $query = "SELECT COUNT(*) AS total FROM content";
    if ($search) {
        $query .= " WHERE content_title LIKE '%$search%'";
    }
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Fungsi untuk mendapatkan data konten sesuai dengan halaman dan jumlah data per halaman
function getContent($koneksi, $offset, $limit, $search = null) {
    $query = "SELECT * FROM content";
    if ($search) {
        $query .= " WHERE content_title LIKE '%$search%'";
    }
    $query .= " LIMIT $offset, $limit";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

// Ambil nilai halaman saat ini atau set ke 1 jika tidak ada
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Jumlah data per halaman
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;

// Mendapatkan total jumlah data konten
$search = isset($_GET['search']) ? $_GET['search'] : null;
$totalContent = getTotalContentCount($koneksi, $search);

// Hitung total halaman
$totalPages = ceil($totalContent / $limit);

// Pastikan halaman yang diminta tidak melebihi total halaman yang ada
$page = max(1, min($page, $totalPages));

// Hitung offset untuk query database berdasarkan halaman saat ini
$offset = ($page - 1) * $limit;

// Mendapatkan data konten untuk halaman saat ini
$content = getContent($koneksi, $offset, $limit, $search);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
</head>
<body>
    <?php include '../include/navbar.php';?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <!-- Tabel Konten -->
                <div class="table-responsive">
                <h1>KONTEN</h1>
                <!-- Dropdown untuk jumlah data per halaman -->
                <div class="option">
                    <label for="limitSelect" class="form-label">Jumlah berita per halaman:</label>
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
                <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Sinopsis</th>
                                <th scope="col">Url Sumber</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Tanggal Upload</th>
                                <th scope="col">Tanggal Rilis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($totalContent > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($content)) : ?>
                                    <tr>
                                        <td><?php echo $row['content_id']; ?></td>
                                        <td><?php echo $row['content_title']; ?></td>
                                        <td><?php echo $row['content_musik']; ?></td>
                                        <td><?php echo $row['content_url']; ?></td>
                                        <td><img src="../assets/img/<?php echo $row['content_picture']; ?>" alt=""><?php echo $row['content_picture']; ?></td>
                                        <td><?php echo $row['content_upload']; ?></td>
                                        <td><?php echo $row['content_release']; ?></td>
                                        <td>
                                            <a href="./content_delete.php?id=<?php echo $row['content_id']; ?>">Hapus</a>
                                            <a href="./content_edit.php?id=<?php echo $row['content_id']; ?>">Edit</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8">Data tidak ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div>
                        <!-- tabel user -->
                        <div class="table-responsive"> 
                    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($totalContent > 0) : ?>
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
                    <a href="content_add.php" class="btn btn-success">Tambah Berita</a>
                    <a href="admin.php" class="btn btn-success">Kembali</a>
                </nav>  
            </div>
        </div>
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

        function search() {
            var search = document.getElementById("searchInput").value;
            window.location.href = "?search=" + search;
        }
    </script>
</body>
</html>