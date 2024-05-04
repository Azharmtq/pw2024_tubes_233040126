<?php
// Inisialisasi variabel teks pengguna
$user_text = '';
// Periksa apakah ada sesi yang aktif
if(isset($_SESSION['user_email'])) {
    // Jika pengguna biasa, tampilkan first_name
    $user_text = $_SESSION['first_name'];
} elseif(isset($_SESSION['username'])) {
    // Jika admin, tampilkan username
    $user_text = $_SESSION['username'];
} else {
    // Jika tidak ada sesi, tampilkan opsi login
    $user_text = 'Login';
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
                <?php if(!empty($user_text) && $user_text !== 'Login') : ?>
                    <a class="nav-link" href="profile.php"><?= $user_text ?></a>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else : ?>
                    <a class="nav-link" href="login.php"><?= $user_text ?></a>
                <?php endif; ?>
            </div>
            <form class="indexer" role="search">
                <input class="form-control me-2 bg-white" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>
