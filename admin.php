<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'meta.php'?>
</head>
<body>
  <?php include 'includes/navbar.php' ?>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Judul</th>
      <th scope="col">Konten</th>
      <th scope="col">URL</th>
      <th scope="col">Tanggal Upload</th>
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
      <td>
        <a href="">Ubah</a>
        <a href="">hapus</a>
      </td>
    </tr>
  </tbody>
</table>
  <?php include 'includes/footer.php' ?>
  <?php include 'script.php' ?>
</body>
</html>