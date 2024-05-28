<?php
session_start();
include 'koneksi.php'; // Pastikan ini adalah path yang benar ke file koneksi database Anda
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/');
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database untuk mencari user dengan username yang diberikan
    $query = "SELECT password_user FROM users WHERE username_user = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $password_user);
    $result = mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($result) {
        // Verifikasi password
        if (password_verify($password, $password_user)) {
            // Setel sesi sebagai user
            $_SESSION['user_logged_in'] = true;
            $_SESSION['role'] = 'user';
            $_SESSION['username'] = $username;

            header("Location: index.php");
            exit();
        } else {
            $error = 'Username atau password salah!';
        }
    } else {
        $error = 'Anda belum terdaftar!';
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
            <div class="form_place container-lg" style="margin: 1% auto; width: 90%; padding: 1%;">
                <h1>Login User</h1>
                <?php if ($error): ?>
                    <p style="color: red; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap; flex-direction: row; margin: 10px auto; gap: 10px;">
                <input type="submit" value="Login" class="btn btn-success" style="font-size: larger; width: fit-content;">
                <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">Home</a>
                <a href="<?php echo BASE_URL; ?>register.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">Daftar</a>
                <a href="<?php echo BASE_URL; ?>admin/admin.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">admin</a>
                </div>
                
            </div>
        </form>
    </div>
    <?php include 'script.php';?>
</body>
</html>