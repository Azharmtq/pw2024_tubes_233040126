<!doctype html>
<html>
<head>
  <?php require_once 'meta.php'?>
</head> 
<body>
  <?php include 'includes/navbar.php' ?>
  <div class="admin_page container-fluid">
  <h3>KONTEN</h3>
  <div class="table-responsive">
  <table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Judul</th>
      <th scope="col">Konten</th>
      <th scope="col">URL</th>
      <th scope="col">Tanggal Upload</th>
      <th scope="col">Gambar</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Judul</td>
      <td>Isi konten</td>
      <td>URL SUMBER</td>
      <td>Tanggal Upload</td>
      <td>Gambar</td>
      <td>
        <a href="">Ubah</a>
        <a href="">hapus</a>
      </td>
    </tr>
  </tbody>
</table>
</div>
<h3>DATA USER</h3>
<div class="table-responsive">
<table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="bg-dark">ID</th>
      <th scope="col" class="bg-dark">Email</th>
      <th scope="col" class="bg-dark">First Name</th>
      <th scope="col" class="bg-dark">Last Name</th>
      <th scope="col" class="bg-dark">AKSI</th>
    </tr>
  </thead>
  <tbody>
  <?php
    // Query untuk mengambil data pengguna dari tabel users
    $query = "SELECT * FROM users";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah ada baris yang dikembalikan
    if(mysqli_num_rows($result) > 0) {
        // Loop melalui setiap baris hasil
        while($row = mysqli_fetch_assoc($result)) {
            // Tampilkan data pengguna dalam baris tabel
            echo "<tr>";
            echo "<th scope='row' class='table-success'>" . $row['id'] . "</th>";
            echo "<td class='table-success'>" . $row['email'] . "</td>";
            echo "<td class='table-success'>" . $row['first_name'] . "</td>";
            echo "<td class='table-success'>" . $row['last_name'] . "</td>";
            echo "<td class='aksi table-success'>";
            echo "<a href='edit_user.php?id=" . $row['id'] . "' class='table-success'><i class='fa fa-file'></i></a>";
            echo "<a href='hapus_user.php?id=" . $row['id'] . "' class='table-success'><i class='fa fa-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        // Jika tidak ada baris yang dikembalikan, tampilkan pesan
        echo "<tr><td colspan='5'>Tidak ada data pengguna</td></tr>";
    }

    // Bebaskan hasil query
    mysqli_free_result($result);

    // Tutup koneksi database
    mysqli_close($koneksi);
    ?>
  </tbody>
</table>
</div>
<a href="tambah_user.php" class="btn btn-success">Tambah User</a>
</div>
  <?php include 'includes/footer.php' ?>
  <?php include 'script.php' ?>
</body>
</html>