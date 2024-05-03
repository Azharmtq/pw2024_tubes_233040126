<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'meta.php'?>
</head>
<body>
  <div class="login_page container-fluid">
    <form class="login_form">
    <div>
      <label for="email" class="form-label">username</label>
      <input type="email"  id="username" required>
    </div>
    <div>
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" required>
    </div>
    <div class="login_submit">
    <button type="submit" class="login btn btn-success">login</button>
    <a href="register.php" class="btn btn-success"> register</a></button>
    </div>
    <a href="index.php" style="display:flex; place-content: center;">kembali ke halaman utama</a>
    </form>
  </div>
  <?php include 'script.php' ?>
</body>
</html>