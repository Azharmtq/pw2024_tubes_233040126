<?php
include 'koneksi.php';

// cek data kiriman
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // terima form yang dikirim
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Query untuk memasukkan data ke dalam database
    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

    // Jalankan query
    if(mysqli_query($koneksi, $query)){
      // Jika registrasi berhasil, tampilkan pesan alert
      echo "<script>alert('Registrasi berhasil di MUSIKCO | NIKMATI MUSIK SESUKAMU');</script>";
      // Arahkan pengguna ke halaman login
      echo "<script>window.location.href = 'login.php';</script>";
      } else{
      // Jika terjadi kesalahan, tampilkan pesan error dan tampilkan pesan alert
      echo "<script>alert('ERROR: Could not execute query. " . mysqli_error($koneksi) . "');</script>";
      }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'meta.php'?>
</head>
<body>
  <div class="login_page container-fluid">
    <form class="login_form" method="post">
    <div>
      <label for="first_name" class="form-label">First Name</label>
      <input type="text"  id="first_name" name="first_name" required>
    </div>
    <div>
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text"  id="last_name" name="last_name" required>
    </div>
    <div>
      <label for="email" class="form-label">Email address</label>
      <input type="email"  id="email" name="email" required>
    </div>
    <div>
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="login_submit">
    <button type="submit" class="login btn btn-success">Register</button>
    <a href="login.php" class="btn btn-success">kembali</a></button>
    </div>
    <a href="index.php" style="display:flex; place-content: center;">kembali ke halaman utama</a>
    </form>
  </div>
  <?php include 'script.php' ?>
</body>
</html>