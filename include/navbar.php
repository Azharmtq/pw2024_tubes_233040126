<?php
// Cek apakah user sudah login dan role apa yang dimiliki
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
define('BASE_URL', 'http://localhost/pw2024_tubes_233040126/');
?>

<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="light">
  <div class="container-fluid">
    <a class="musikco nav-brand" href="<?php echo BASE_URL; ?>index.php" style="font-weight: 600;">MUSIKCO</a>
    <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>musik.php">Musik</a>
        </li>
        <?php if ($isLoggedIn): ?>
            <?php if ($role === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>admin/admin.php">Dashboard</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>profile.php"><?php echo htmlspecialchars($username); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        <?php endif; ?>
      </ul>
      <form class="search_bar d-flex" role="search">
        <input type="text" class="form-control" id="searchInput" placeholder="Cari Aja Dulu" value="<?php echo isset($search) ? $search : ''; ?>">
        <button type="button" class="btn btn-success" onclick="search()">Cari</button>
      </form>
    </div>
  </div>
</nav>