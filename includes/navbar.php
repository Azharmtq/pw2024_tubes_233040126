<?php
// Periksa apakah pengguna sudah login
if(isset($_SESSION['user_email'])) {
    // Jika sudah login, simpan username pengguna dalam variabel
    $email = $_SESSION['user_email'];
}
?>
<nav class="navbar navbar-expand-lg">
<div class="container-fluid">
    <a class="navbar-brand" href="#">MUSIKCO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="">Features</a>
        <a class="nav-link" href="">Layanan</a>
        <?php
        // Tambahkan logika untuk menampilkan link Logout jika pengguna sudah login
        if(isset($email)) {
            echo '<a class="nav-link disabled" href="#">'.$email.'</a>
                  <a class="nav-link" href="logout.php">Logout</a>';
        } else { // Jika belum login, tampilkan link Register dan Login
            echo '<a class="nav-link" href="login.php">Login</a>';
        }
        ?>
      </div>
      <form class="indexer d-flex" role="search">
          <input class="form-control me-2 bg-white" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Cari</button>
        </form>
    </div>
  </div>
</nav>