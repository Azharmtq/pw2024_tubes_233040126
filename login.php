<!doctype html>
<html>
<head>
  <?php include './meta.php'?>
</head>
<body>
  <div class="login_page container-fluid">
    <form class="login_form" method="post" action="./login_process.php">
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
  <?php include 'script.php' ?>
</body>
</html>