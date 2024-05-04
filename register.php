<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'meta.php'?>
</head>
<body>
  <div class="login_page container-fluid">
    <form class="login_form" method="post" action="./register_process.php">
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