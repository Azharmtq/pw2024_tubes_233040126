<?php
session_start();
// Cek apakah pengguna sudah login dan apakah role-nya adalah admin
if (!isset($_SESSION['user_logged_in']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php");
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
                    <input type="text" id="searchInputAjax" placeholder="Cari">
                    <!-- <input type="text" id="searchInputAjax" placeholder="Cari" onkeyup="fetchData()"> -->
                    <select id="sortSelect">
                    <!-- <select id="sortSelect" onchange="fetchData()"> -->
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
                           <!-- Data Dari Server -->
                        </tbody>
                    </table>
                    <div id="pagination"></div>
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
        // function changeLimit() {
        //     var limit = document.getElementById("limitSelect").value;
        //     window.location.href = "?limit=" + limit;
        // }

        // function fetchData() {
        //     var search = document.getElementById('searchInputAjax').value;
        //     var sort = document.getElementById('sortSelect').value;

        //     var xhr = new XMLHttpRequest();
        //     xhr.open('GET', 'ajax_fetch_users.php?search=' + search + '&sort=' + sort, true);
        //     xhr.onload = function () {
        //         if (xhr.status === 200) {
        //             document.getElementById('userTableBody').innerHTML = xhr.responseText;
        //         }
        //     };
        //     xhr.send();
        // }

        //         $(document).ready(function() {
        //     $.ajax({
        //         url: 'ajax_fetch_users.php',
        //         type: 'GET',
        //         success: function(response) {
        //             $('#userTableBody').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('AJAX Error: ' + status + error);
        //         }
        //     });
        // });

        function changeLimit() {
            var limit = $('#limitSelect').val();
            fetchData(1, limit);
        }

        function fetchData(page = 1, limit = $('#limitSelect').val()) {
            var search = $('#searchInputAjax').val();
            var sort = $('#sortSelect').val();

            $.ajax({
                url: 'ajax_fetch_users.php',
                type: 'GET',
                data: {
                    search: search,
                    sort: sort,
                    page: page,
                    limit: limit
                },
                dataType: 'json',
                success: function(response) {
                    $('#userTableBody').html(response.tableContent);
                    $('#pagination').html(response.paginationContent);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        }

        $(document).ready(function() {
            fetchData();

            $('#searchInputAjax, #sortSelect').on('input change', function() {
                fetchData();
            });
        });
    </script>
</body>
</html>
