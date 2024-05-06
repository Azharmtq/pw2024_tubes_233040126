<?php
// session_start();

// if (isset($_POST["submit"])) {
//     $email = $_POST["email"];
//     $password = $_POST["password"];

//     // Buat koneksi ke database
//     include './koneksi.php';

//     // Query untuk memeriksa keberadaan pengguna berdasarkan email dan password
//     $query = "SELECT * FROM users WHERE email=? AND password=?";
//     $stmt = mysqli_prepare($koneksi, $query);

//     if ($stmt) {
//         mysqli_stmt_bind_param($stmt, "ss", $email, $password);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);
        
//         if ($row = mysqli_fetch_assoc($result)) {
//             // Jika pengguna ditemukan, buat sesi
//             $_SESSION["email"] = $email;
//             $_SESSION["first_name"] = $row['first_name'];
            
//             // Redirect ke halaman yang sesuai
//             header("Location: index.php");
//             exit;
//         } else {
//             // Jika pengguna tidak ditemukan, set flag error untuk ditampilkan kepada pengguna
//             $error = true;
//         }
//     } else {
//         // Jika query gagal, set flag error untuk ditampilkan kepada pengguna
//         $error1 = true;
//     }

//     // Tutup koneksi database
//     mysqli_close($koneksi);
// }
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Buat koneksi ke database
    include './koneksi.php';

    // Query untuk memeriksa keberadaan pengguna berdasarkan email dan password
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Jika pengguna ditemukan, buat sesi
            $_SESSION["email"] = $email;
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
      <h4 style="display:flex; place-content: center;">Sudah register?</h4>
      <?php if (isset($error)) : ?>
            <p style="display:flex; place-content: center;">Email atau password Anda salah.</p>
        <?php endif; ?>
    <div>
      <label for="email" class="form-label">Email address</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div>
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="login_submit">
    <button type="submit" name="submit" class="login btn btn-success">Login</button>
    <a href="register.php" class="btn btn-success">Register</a>
    </div>
    <a href="index.php" style="display:flex; place-content: center;">Kembali ke halaman utama</a>
    <a href="admin_login.php" style="display:flex; place-content: center;">Admin?</a>
    </form>
  </div>
  <?php include 'includes/footer.php' ?>
  <?php include 'script.php' ?>
</body>
</html>