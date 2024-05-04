<!doctype html>
<html>
<head>
  <?php require_once 'meta.php'?>
</head> 
<body>
  <?php include 'includes/navbar.php' ?>
  <div class="container-fluid">
  <h3>KONTEN</h3>
  <table class="test table">
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
<h3>DATA USER</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">AKSI</th>
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
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>";
            echo "<a href='edit_user.php?id=" . $row['id'] . "'>Ubah| </a>";
            echo "<a href='hapus_user.php?id=" . $row['id'] . "'> |Hapus</a>";
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
<a href="tambah_user.php" class="btn btn-success">Tambah User</a>
</div>
  <?php include 'includes/footer.php' ?>
  <?php include 'script.php' ?>
</body>
</html>