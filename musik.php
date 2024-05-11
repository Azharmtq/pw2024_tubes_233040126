<?php
// Definisikan basis URL
define('BASE_URL', 'http://localhost/PW_TUBES_233040126/'); // Sesuaikan dengan URL aplikasi Anda
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php';?>
</head>
<body>
    <?php include './include/navbar.php';?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Player</title>
    <style>
        .audio-player {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .thumbnail {
            width: 100px;
            height: 100px;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="audio-player">
        <div class="thumbnail" style="background-image: url('thumbnail.jpg');"></div>
        <audio id="audioPlayer" controls>
            <source src="../assets/audio/musik.mp3" type="audio/mp3">
            Browser Anda tidak mendukung tag audio.
        </audio>
    </div>
    <button onclick="playAudio()">Play</button>
    <button onclick="pauseAudio()">Stop</button>
    <button onclick="nextTrack()">Next</button>
    <?php include './include/footer.php';?>
    <?php include 'script.php';?>
</body>
</html>
</html>


