<?php
include 'koneksi.php';
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username_user, email_user, password_user) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        echo "$username berhasil registrasi.";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <?php include 'meta.php';?>
    <style>
        input{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form container-fluid">
        <form method="post">
            <div class="form_place">
            <h1>Daftar</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <div style="display: flex; justify-content: space-evenly; flex-direction:row;">
            <input type="submit" value="register" class="btn btn-success" style="font-size: larger; width: fit-content;">
                <a href="<?php echo BASE_URL; ?>login.php" class="btn btn-primary" style="font-size: larger; width: fit-content; place-content: center;">kembali</a>
            </div>
            </div>
        </form>
    </div>
    <?php include 'script.php';?>
</body>
</html>