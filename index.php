<?php
session_start();
// Definisikan basis URL
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/'); // Sesuaikan dengan URL aplikasi Anda
include 'koneksi.php';
function getTotalContentCount($koneksi, $search = null) {//ambil jumlah seluruh data
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
    $query = "SELECT content_id, content_title, content_picture, content_url, SUBSTRING(content_musik, 1, 200) AS content_musik FROM content";
    if ($search) {
        $query .= " WHERE content_title LIKE '%$search%' OR content_musik LIKE '%$search%'";
    }
    $query .= " LIMIT $offset, $limit";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = isset($_GET['limit']) ? $_GET['limit'] : 6;

$search = isset($_GET['search']) ? $_GET['search'] : null;
$totalContent = getTotalContentCount($koneksi, $search);

$totalPages = ceil($totalContent / $limit);

$page = max(1, min($page, $totalPages));

$offset = ($page - 1) * $limit;

$content = getContent($koneksi, $offset, $limit, $search);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
    
</head>
<body>
    <?php include './include/navbar.php';?>
           <div id="utama" style="min-height: 100vh; background-image:url(./assets/img/macklemore_169.jpeg); background-position: center; background-repeat: no-repeat; background-size: cover;">
            <div style="position: absolute; top: 50%; left: 0%; background:rgba(0, 0, 0, 0.9); padding:20px; border-radius:2px; color:white; min-width:300px; width: 40%; text-align:left; height:200px; display:flex; flex-direction:column;">
                <h1 style="align-self: flex-start;">MUSIKCO</h1>
                <h3>Cari Berita Musik Sesukamu</h3>
            </div>
           </div>
                <h1>Apa Yang Kau Cari?</h1>
                <div class="container-fluid wrap" style="display:flex; flex-wrap:wrap; padding:10vh 5vh; gap: 10px;">
                
                <div class="container-sm" id="home" style="width:100%; padding:0 0; margin:0 0; ">
                        <div class="content" style="display: flex; flex-wrap: wrap; width:100%; gap:20px; overflow:auto;">
                            <?php if ($totalContent > 0) : ?>
                                <?php while ($row = mysqli_fetch_assoc($content)) : ?>
                                    <div class="card" style="width: fit-content; max-width: 400px;">
                                        <div class="wrap_image" style="border: 2px solid black; border-radius:10px; width:100%; height:300px;overflow:hidden;">
                                        <img src="./assets/img/<?php echo $row['content_picture']; ?>" alt="" style="object-fit: cover; width:100%; height:300px;">
                                        </div>
                                        <h5 class="card-header"><?php echo $row['content_title']; ?></h5>
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $row['content_musik']; ?>...</p>
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
                        <div class="container-sm highlight">
                            
                        </div>
                    </div>
                    <div class="highlight" style="width:400px; height:fit-content;">
                <div class="list-group">
                    <a href="#home" class="list-group-item list-group-item-action active" aria-current="true">
                        Home
                    </a>

                    <?php 
                    function getAllContent($koneksi) {
                        $query = "SELECT content_url, content_title FROM content";
                        $result = mysqli_query($koneksi, $query);
                        return $result;
                    }
                    // Fungsi untuk menampilkan semua data
                    function displayAllContent($koneksi) {
                        $content = getAllContent($koneksi);
                        if ($content && mysqli_num_rows($content) > 0) {
                            while ($row = mysqli_fetch_assoc($content)) {
                    ?>
                    <a href="<?php echo $row['content_url'];?>" class="list-group-item list-group-item-action"><?php echo $row['content_title'];?></a>
                    <?php 
                     }
                    } else {
                        echo 'Tidak ada data yang ditemukan.';
                    }
                }
                
                // Pemanggilan fungsi untuk menampilkan data
                displayAllContent($koneksi);
                    ?>
                    </div>
                </div>
                    </div>
                    <nav aria-label="Page navigation" style="display: flex; place-content: center; gap:10px;">
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