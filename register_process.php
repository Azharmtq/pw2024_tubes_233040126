<?php
include 'koneksi.php';
// cek data kiriman
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // terima form yang dikirim
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Query untuk memasukkan data ke dalam database
    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
    // Jalankan query
    if(mysqli_query($koneksi, $query)){
      // Jika registrasi berhasil, tampilkan pesan alert
      echo "<script>alert('Registrasi berhasil di MUSIKCO | NIKMATI MUSIK SESUKAMU');</script>";
      // Arahkan pengguna ke halaman login
      echo "<script>window.location.href = 'login.php';</script>";
      } else{
      // Jika terjadi kesalahan, tampilkan pesan error dan tampilkan pesan alert
      echo "<script>alert('ERROR: Could not execute query. " . mysqli_error($koneksi) . "');</script>";
      }
}
?>