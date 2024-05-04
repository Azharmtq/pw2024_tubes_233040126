<?php
session_start();
if (isset($_POST["submit"])) {
  if ($_POST["username"] == "Azhar" && $_POST["password"] == "126") {
      $_SESSION["username"] = $_POST["username"];
      $_SESSION['role'] = 'admin';
      echo "<script>window.location.href = 'admin.php';</script>";
      exit;
  } else {
      $error = true;
  }
}
?>
<!doctype html>
<html>
<head>
  <?php include 'meta.php'?>
</head>
<?php include 'meta.php'?>
<body>
<?php include 'includes/navbar.php' ?>

  
<div class="login_page container-fluid">
    <form class="login_form" method="post">
        <?php if (isset($error)) : ?>
            <p>Username atau password Anda salah</p>
        <?php endif; ?>
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" required> <!-- Tambahkan atribut name -->
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" required> <!-- Tambahkan atribut name -->
        </div>
        <div class="login_submit">
            <button type="submit" name="submit" class="login btn btn-success">Login</button> <!-- Tambahkan atribut name dan submit -->
            <a href="register.php" class="btn btn-success">Register</a>
        </div>
        <a href="index.php" style="display:flex; place-content: center;">Kembali ke halaman utama</a>
    </form>
</div>
<?php include 'includes/footer.php' ?>
  <?php include 'script.php' ?>
</body>
</html>