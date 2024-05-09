<?php
session_start();
include 'koneksi.php'; // Pastikan ini adalah path yang benar ke file koneksi database Anda
define('BASE_URL', 'http://localhost/ujicoba/');

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database untuk mencari admin dengan username yang diberikan
    $query = "SELECT admin_id, admin_username, admin_password FROM admin WHERE admin_username = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $admin_id, $admin_username, $admin_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Verifikasi password
    if (password_verify($password, $admin_password)) {
        // Setel sesi sebagai admin
        $_SESSION['user_logged_in'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $admin_username;

        header("Location: admin.php");
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
</head>
<body>
    <div class="form container-fluid">
        <form method="post">
            <div class="form_place">
                <h1>Login Admin</h1>
                <?php if ($error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login" class="btn btn-success" style="font-size: larger;">
                <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-primary" style="font-size: larger;">kembali ke home</a>
            </div>
        </form>
    </div>
    <?php include 'script.php';?>
</body>
</html>