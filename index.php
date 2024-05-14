<?php
session_start();
// Definisikan basis URL
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/'); // Sesuaikan dengan URL aplikasi Anda
include 'koneksi.php';
// Fungsi untuk mendapatkan jumlah total data konten
function getTotalContentCount($koneksi, $search = null) {
    $query = "SELECT COUNT(*) AS total FROM content";
    if ($search) {
        $query .= " WHERE content_title LIKE '%$search%' OR content_musik LIKE '%$search%'";
    }
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Fungsi untuk mendapatkan data konten sesuai dengan halaman dan jumlah data per halaman
function getContent($koneksi, $offset, $limit, $search = null) {
    $query = "SELECT * FROM content";
    if ($search) {
        $query .= " WHERE content_title LIKE '%$search%' OR content_musik LIKE '%$search%'";
    }
    $query .= " LIMIT $offset, $limit";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

// Ambil nilai halaman saat ini atau set ke 1 jika tidak ada
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Jumlah data per halaman
$limit = isset($_GET['limit']) ? $_GET['limit'] : 6;

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
<div id="preloader">
    <div class="spinner"></div>
</div>
    <?php include './include/navbar.php';?>
    
    <div class="container-fluid container-lg">
        <div class="row">
            <div class="container-lg ">
                <!-- Tabel Konten -->
                <div class="table-responsive">
                <h1>KONTEN</h1>
                <table class="table table-dark">
                        <div style="display: flex; flex-wrap: wrap; justify-content: space-evenly;">
                            <?php if ($totalContent > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($content)) : ?>
                                    <div class="card" style="width: fit-content; max-width: 400px;">
                                        <div class="wrap_image" style="width:300px; height:300px; border: 2px solid black; border-radius:10px;">
                                        <div style="width: 100%; height:100%; background-image: url(./assets/img/<?php echo $row['content_picture']; ?>);background-position: center;background-repeat: no-repeat;            background-size: cover; border-radius:10px;">
                                        </div>
                                        </div>
                                        <h5 class="card-header"><?php echo $row['content_title']; ?></h5>
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $row['content_musik']; ?></p>
                                            <a href="<?php echo $row['content_url']; ?>" class="btn btn-success">Selengkapnya</a>
                                        </div>
                                        </div>
                                        
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8">Data tidak ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </div>
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
                </nav>  
            </div>
        </div>
    </div>
</div>
</div>
</div>

    <?php include './include/footer.php';?>
    <?php include 'script.php';?>
    <!-- <script>
 function changeLimit() {
    var limit = document.getElementById("limitSelect").value;
    window.location.href = "?limit=" + limit;
    }
    </script> -->
    <script>
        window.addEventListener('load', function() {
            var preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
        });
    </script>
</body>
</html>