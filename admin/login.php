<?php
session_start();
include 'koneksi.php'; // Pastikan ini adalah path yang benar ke file koneksi database Anda
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/');

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
    <div class="form container-fluid" style="min-height: 100vh;">
        <form method="post">
            <div class="form_place">
                <h1>Login Admin</h1>
                <?php if ($error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <div style="display: flex; justify-content: space-evenly; align-items: center; flex-direction: row; width: 60%; margin: 10px auto;">
                <input type="submit" value="Login" class="btn btn-success" style="font-size: larger; width: fit-content;">
                <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-primary" style="font-size: larger; width: fit-content; padding:12px; height: 100%;">Home</a>
                </div>
            </div>
        </form>
    </div>
    <?php include 'script.php';?>
</body>
</html>