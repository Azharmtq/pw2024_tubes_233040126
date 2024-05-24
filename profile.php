<?php
// Mulai sesi
session_start();
// Contoh, asumsikan username disimpan dalam sesi saat pengguna login
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Tamu';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <?php include 'meta.php'; ?>
</head>
<body style="background-image: url('./assets/img/logo.jpg'); background-size: cover; background-position: center;">
    <?php include './include/navbar.php'; ?>
    <div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.7); min-height: 100vh; max-width:70vw; backdrop-filter: blur(5px);">
        <div class="content" style="display:flex; flex-direction:column; align-items:center; justify-content:center; padding:2vh 2vh;">
            <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
            <h1>Profil Pengguna</h1>
            <h2>Role anda: <?php echo htmlspecialchars($role); ?></h2>
            <h6>Ada Kritik? Kirim ke sini</h6>
            <form action="https://formspree.io/f/xqkrkbaa" method="POST" class="container-sm" style="position:relative; top:10vh;">
            <div>
                <label for="email" class="form-label"> Your email: </label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div>
                <label for="message" class="form-label"> Your message:</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>
            <!-- your other form fields go here -->
            <button type="submit" class="btn btn-primary">kirim</button>
            </form>
        </div>
    </div>
    <?php include './include/footer.php'; ?>
    <?php include 'script.php'; ?>
</body>
</html>

