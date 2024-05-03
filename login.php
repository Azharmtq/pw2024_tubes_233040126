<?php
include 'koneksi.php'; // Sertakan file koneksi.php untuk menghubungkan ke database

function verify_credentials($email, $password) {
    global $koneksi; // Gunakan variabel koneksi di luar fungsi

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                return true;
            }
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (verify_credentials($email, $password)) {
        $_SESSION['user_email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('EMAIL ATAU PASSWORD SALAH')</script>";
    }
}
?>
<!doctype html>
<html>
<head>
  <?php include './meta.php'?>
</head>
<body>
  <div class="login_page container-fluid">
    <form class="login_form" method="post">
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
  <?php include 'script.php' ?>
</body>
</html>