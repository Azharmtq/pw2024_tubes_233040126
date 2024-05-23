<?php
include 'koneksi.php'; // Pastikan path ini sesuai dengan lokasi file koneksi Anda

// Mendapatkan user_id dari URL
$user_id = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Pastikan melakukan hashing password sebelum menyimpan

    // Query untuk update data user
    $query = "UPDATE users SET username_user=?, email_user=?, password_user=? WHERE user_id=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $password, $user_id);

    // Menjalankan statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Data user berhasil diperbarui.";
        header("Location: admin.php"); // Redirect ke halaman admin
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    // Jika metode bukan POST, tampilkan form dengan data user saat ini
    $query = "SELECT username_user, email_user, password_user FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $username, $email, $password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
        <div class="form_place container-lg">
        <h1>Edit User</h1>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="" required><br>
        <button type="submit" class="btn btn-success" style="font-size: 20px; font-weight: bold;">Update</button>
        <a href="<?php echo BASE_URL; ?>admin/admin.php" class="btn btn-primary" style="font-size: larger;">kembali</a>
        </div>
    </form>
    </div>
    <?php include 'script.php';?>
</body>
</body>
</html>
<?php
}
?>