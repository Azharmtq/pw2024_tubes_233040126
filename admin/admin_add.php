<?php
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar
define('BASE_URL', 'http://localhost/PW2024_TUBES_233040126/');
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['role'] !== 'admin') {
    header("Location: ./login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin (admin_username, admin_password) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password); // Perbaikan pada parameter bind, dari "sss" menjadi "ss"

    if (mysqli_stmt_execute($stmt)) {
        echo "Admin baru berhasil ditambahkan.";
        header("Location: admin.php"); // Sesuaikan dengan halaman dashboard admin
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
    <title>Tambah Admin</title>
    <?php include 'meta.php'; ?>
    <style>
        input {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form container-fluid" style="min-height:100vh;">
        <form method="post">
            <div class="form_place">
                <h1>Tambah Admin</h1>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <div class="container-fluid mt-3" style="display: flex; flex-direction: row; justify-content: space-evenly;">
                    <button type="submit" class="btn btn-success" style="width: fit-content; font-size:larger;">Tambah</button>
                    <a href="<?php echo BASE_URL; ?>admin/admin.php" class="btn btn-primary" style="font-size: larger;">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <?php include 'script.php'; ?>
</body>
</html>