<?php
session_start();
include 'koneksi.php';
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 5;
if (!isset($_SESSION['user_logged_in']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <style>
    </style>
</head>
<body>
    <?php include '../include/navbar.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                
                    <h1>KONTEN</h1>
                    <div class="option" style="display:flex; padding:1vh 1vh; 300px;">
                    <input type="text" id="searchInputAjax" placeholder="Cari" style="width:100px;">
                    <select id="sortSelect">
                        <option value="content_upload_asc">Upload Asc</option>
                        <option value="content_upload_desc">Upload Desc</option>
                        <option value="content_release_asc">Release Asc</option>
                        <option value="content_release_desc">Release Desc</option>
                    </select>
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
                    <div class="table-responsive container-fluid">
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
                        <tbody id="contentTableBody">
                            <!-- Konten akan dimuat melalui AJAX -->
                        </tbody>
                    </table>
                </div>
                    <div id="pagination"></div>
                <div>
                    <div class="table-responsive"> 
                        <a href="content_add.php" class="btn btn-success">Tambah Berita</a>
                        <a href="admin.php" class="btn btn-success">Kembali</a>
                        <a href="cetak_content.php" target="_blank" class="btn btn-success"><i class="bi bi-printer" style="font-size:15px;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../include/footer.php';?>
    <?php include 'script.php';?>
    <script>
        function changeLimit() {
            var limit = $('#limitSelect').val();
            fetchData(1, limit);
        }

        function fetchData(page = 1, limit = $('#limitSelect').val()) {
            var search = $('#searchInputAjax').val();
            var sort = $('#sortSelect').val();

            $.ajax({
                url: 'ajax_fetch_content.php',
                type: 'GET',
                data: {
                    search: search,
                    sort: sort,
                    page: page,
                    limit: limit
                },
                dataType: 'json',
                success: function(response) {
                    console.log('AJAX Response:', response); // Tambahkan log response
                    $('#contentTableBody').html(response.tableContent_musik);
                    $('#pagination').html(response.paginationContent_musik);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }

        $(document).ready(function() {
            fetchData();

            $('#searchInputAjax').on('input', function() {
                fetchData();
            });

            $('#sortSelect').on('change', function() {
                fetchData();
            });
        });
    </script>
</body>
</html>