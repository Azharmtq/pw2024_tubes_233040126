<?php
session_start();
include 'koneksi.php';
// Fungsi untuk mendapatkan jumlah total data konten
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
    <style>
        body {
            min-height: 100vh;
            background: rgb(33, 37, 41);
            background-image: linear-gradient(to right, #333 5px, transparent 5px), linear-gradient(to bottom, #333 5px, transparent 5px);
            background-size: 30px 30px;
        }

        * {
            color: white;
        }
    </style>
</head>
<body>
<?php include './include/navbar.php';?>
<form action="https://formspree.io/f/xqkrkbaa" method="POST" class="container-sm" style="min-height: 80vh;">
    <h1>Contact Us</h1>
    <p style="text-align: center;">Silahkan kirim pesan untuk menghubungi</p>

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
<?php include './include/footer.php';?>
    <?php include 'script.php';?>
    <!-- <script>
 function changeLimit() {
    var limit = document.getElementById("limitSelect").value;
    window.location.href = "?limit=" + limit;
    }
    </script> -->
    <script>
        window.addEventListener('load', function() {
            var preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
        });

        let body = document.querySelector('body');
        document.addEventListener('mousemove', function(e) {
            body.style.backgroundPositionX = e.pageX / -4 + 'px';
            body.style.backgroundPositionY = e.pageY / -4 + 'px';
        });
    </script>
</body>
</html>
