<?php
session_start();
include 'koneksi.php'; // Pastikan ini adalah path yang benar ke file koneksi database Anda
define('BASE_URL', 'http://localhost/ujicoba/');
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query ke database untuk mencari user dengan username yang diberikan
    $query = "SELECT username_user, password_user FROM users WHERE username_user = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $username_user, $password_user);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Verifikasi password
    if (password_verify($password, $password_user)) {
        // Setel sesi sebagai user
        $_SESSION['user_logged_in'] = true;
        $_SESSION['role'] = 'user';
        $_SESSION['username'] = $username_user;

        header("Location: index.php"); // Asumsikan ada halaman dashboard untuk user
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
            <div class="form_place container-lg" style="margin: 1% auto; width: 90%; padding: 1%;">
                <h1>Login User</h1>
                <?php if ($error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" style="text-align: center; width: 60%; margin: 0 auto;" required>
                <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap; flex-direction: row; margin-top: 10px;">
                <input type="submit" value="Login" class="btn btn-success" style="font-size: larger; width: fit-content;">
                <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">Home</a>
                </div>
                
            </div>
        </form>
    </div>
    <?php include 'script.php';?>
</body>
</html>