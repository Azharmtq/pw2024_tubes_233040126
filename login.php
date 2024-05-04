<?php
session_start();

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Buat koneksi ke database
    include 'koneksi.php';

    // Query untuk memeriksa keberadaan pengguna berdasarkan email dan password
    $query = "SELECT * FROM users WHERE email='?' AND password='?'";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            // Jika pengguna ditemukan, buat sesi
            $_SESSION["user_email"] = $email;
            $_SESSION["first_name"] = $row['first_name'];
            
            // Redirect ke halaman yang sesuai
            header("Location: index.php");
            exit;
        } else {
            // Jika pengguna tidak ditemukan, tampilkan pesan kesalahan
            $error = true;
        }
    } else {
        // Jika query gagal, tampilkan pesan kesalahan
        $error = true;
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>
<!doctype html>
<html>
<head>
  <?php include './meta.php'?>
</head>
<body>
<?php include 'includes/navbar.php' ?>
  <div class="login_page container-fluid">
    <form class="login_form" method="post">
      <h4  style="display:flex; place-content: center;" >Sudah register?</h4>
    <div>
      <label for="email" class="form-label">Email address</label>
      <input type="email"  id="email" name="email" required>
    </div>
    <div>
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="login_submit">
    <button type="submit" class="login btn btn-success">login</button>
    <a href="register.php" class="btn btn-success"> register</a></button>
    </div>
    <a href="index.php" style="display:flex; place-content: center;">kembali ke halaman utama</a>
    <a href="admin_login.php" style="display:flex; place-content: center;">admin?</a>
    </form>
  </div>
  <?php include 'includes/footer.php' ?>
  <?php include 'script.php' ?>
</body>
</html>