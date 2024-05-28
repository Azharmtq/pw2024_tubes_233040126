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
        echo "User baru berhasil ditambahkan.";
        header("Location: admin.php");
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
    <title>Tambah User</title>
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
            <h1>Tambah user</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" class="btn btn-success" value="Tambah User">
            <div class="container-fluid" style="display: flex;flex-direction: row; gap:20px;">
                <a href="<?php echo BASE_URL; ?>admin/admin.php" class="btn btn-primary mt-3" style="font-size: larger;">Dashboard</a>
                <a href="<?php echo BASE_URL; ?>admin/admin_add.php" class="btn btn-primary mt-3" style="font-size: larger;">Superuser</a>
            </div>
            </div>
        </form>
    </div>
    <?php include 'script.php';?>
</body>
</html>