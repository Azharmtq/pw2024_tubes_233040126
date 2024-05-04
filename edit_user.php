<?php
include 'koneksi.php';

// Periksa apakah ID pengguna telah disediakan dalam URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data pengguna berdasarkan ID
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
        } else {
            echo "User not found.";
            exit();
        }
    } else {
        echo "Failed to prepare statement.";
        exit();
    }
} else {
    echo "ID not provided.";
    exit();
}

// Proses formulir jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari formulir
    $new_email = $_POST['email'];
    $new_first_name = $_POST['first_name'];
    $new_last_name = $_POST['last_name'];
    $new_password = $_POST['password']; // Password baru

    // Hash password baru sebelum disimpan ke database
    // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Query untuk memperbarui data pengguna berdasarkan ID
    $query = "UPDATE users SET email=?, first_name=?, last_name=?, password=? WHERE id=?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $new_email, $new_first_name, $new_last_name, $new_password, $id);
        $success = mysqli_stmt_execute($stmt);
        
        if ($success) {
            echo "<script>alert('Data pengguna berhasil diperbarui.'); window.location.href = 'admin.php';</script>";
            exit();
        } else {
            echo "Failed to update user data.";
        }
    } else {
        echo "Failed to prepare statement.";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
        
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required><br>
        
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
