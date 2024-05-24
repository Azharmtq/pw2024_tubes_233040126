<?php
session_start();
// Definisikan basis URL
include 'koneksi.php';
$username = "Guest"; // Default jika tidak ada yang login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

if (isset($userId)) {
    $checkUser = mysqli_prepare($koneksi, "SELECT user_id FROM users WHERE user_id = ?");
    mysqli_stmt_bind_param($checkUser, "i", $userId);
    mysqli_stmt_execute($checkUser);
    mysqli_stmt_store_result($checkUser);

    if (mysqli_stmt_num_rows($checkUser) == 0) {
        echo "<script>alert('User ID tidak valid!');</script>";
        mysqli_stmt_close($checkUser);
        return; // Hentikan eksekusi lebih lanjut jika user_id tidak valid
    }
    mysqli_stmt_close($checkUser);
}

if (isset($_POST['uploadMusik'])) {
    $musikFile = $_FILES['musikFile'];
    $thumbnailFile = $_FILES['thumbnailFile'];

    // Proses file musik
    $musikFileName = $musikFile['name'];
    $musikFileTmpName = $musikFile['tmp_name'];
    $musikDestination = './assets/audio/' . $musikFileName;

    // Proses file thumbnail
    $thumbnailFileName = $thumbnailFile['name'];
    $thumbnailFileTmpName = $thumbnailFile['tmp_name'];
    $thumbnailDestination = './assets/audio/thumbnail/' . $thumbnailFileName;

    // Periksa apakah file musik atau thumbnail sudah ada
    if (file_exists($musikDestination) || file_exists($thumbnailDestination)) {
        echo "<script>alert('File musik atau thumbnail sudah ada. Silakan coba lagi dengan file yang berbeda.')</script>";
    } else {
        // Pindahkan file musik
        move_uploaded_file($musikFileTmpName, $musikDestination);
        // Pindahkan file thumbnail
        move_uploaded_file($thumbnailFileTmpName, $thumbnailDestination);

        // Simpan informasi file ke database
        $query = "INSERT INTO musik (nama_file, thumbnail_name, upload_date) VALUES (?, ?, CURDATE())";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "ss", $musikFileName, $thumbnailFileName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "<script>alert('Musik dan thumbnail berhasil diupload!')</script>";
    }
}

$query = "SELECT nama_file FROM musik";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'meta.php';?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        body {
            min-height: 100vh;
            background: rgb(33, 37, 41);
            background-image: linear-gradient(to right, #333 2px, transparent 2px), linear-gradient(to bottom, #333 2px, transparent 2px);
            background-size: 30px 30px;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
            text-align: justify;
            line-height: normal;
        }

        .wrapper {
            height: max-content;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            backdrop-filter: blur(1px);
        }
        .music-player {
            width: 100%;
        }

        .song-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border: 10px solid rgba(0, 0, 0, 0.5);
            margin-bottom: 50px;
        }

        #progress {
           width: 100%;
           height: 5px;
           -webkit-appearance: none;
           appearance: none;
           background-color: red; /* Warna hijau */
       }
       #progress::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px; /* Menghilangkan thumb */
        height: 20px;
        border-radius: 50%;
        border: 2px solid white;
        background-color: red;
        }
       #progress::-webkit-progress-bar {
           background-color: #eee;
       }
       #progress::-webkit-progress-value {
           background-color: #4CAF50;
       }
       #progress::-moz-progress-bar {
           background-color: #4CAF50;
       }
       .controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        margin: auto;
       }
       .controls div {
        cursor: pointer;
       }

       .controls .circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
       }
    </style>
   
</head>
<body>

    <?php include './include/navbar.php';?>
    <div class="container-sm">
        <div class="wrapper">
            <div class="music-player">
                <div class="song-image" style="overflow: hidden; position: relative; margin: 0 auto;">
                    <img src="./assets/audio/thumbnail/masha.jpg" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                </div>
                <div class="song-info">
                    <h2>Masha</h2>
                </div>
                <div class="audio-player">
                    <audio id="song">
                        <source src="./assets/audio/masha.mp3" type="audio/mp3">
                        Your browser does not support the audio tag.
                    </audio>
            </div>
                <div class="controls">
                    <div class="circle" onclick="previousTrack()"><i class='fas fa-backward' style='font-size:30px;color:red'></i></div>
                    <div class="circle" onclick="playPause()" style="background-color:red; scale: 1.2;"><i class='far fa-play-circle' style='font-size:48px;color:white' id="play"></i></div>
                    <div class="circle" onclick="nextTrack()"><i class='fas fa-forward' style='font-size:30px;color:red'></i></div>
                </div>
                <input type="range" id="progress" value="0" style="width: 20%;">
            </div>
        </div>
    </div>

    <div class="container-sm">
    <h1>Konstribusi Anda Kami Terima</h1>
    <div class="container-fluid" style="padding: 10px; ;">
    <p>
        Kontribusi Anda dalam mengunggah file musik ke platform ini memiliki beberapa manfaat penting. Pertama, membantu melestarikan budaya musik. Dengan mengunggah file musik yang langka atau sulit ditemukan, saya membantu memastikan bahwa musik tersebut tetap dapat diakses dan dinikmati oleh generasi mendatang. <br>

        Kedua, mendukung musisi lokal. Dengan mengunggah file musik dari musisi lokal, anda membantu meningkatkan visibilitas mereka dan menjangkau audiens yang lebih luas. Hal ini dapat membantu mereka mendapatkan lebih banyak pengikut dan dukungan untuk karir mereka.
        Selain itu, mengunggah file musik juga dapat membantu untuk:
        <li>Meningkatkan keragaman musik yang tersedia di platform ini.</li>
        <li>Membuat komunitas musik yang lebih kuat dan terhubung.</li>
        <li>Memberikan kesempatan bagi orang untuk belajar tentang budaya musik yang berbeda.</li>
        Secara keseluruhan, kontribusi anda dalam mengunggah file musik adalah untuk membantu menciptakan platform musik yang lebih kaya, lebih beragam, dan lebih bermanfaat bagi semua orang.</p>
    </div>
    
    <form action="musik.php" method="post" enctype="multipart/form-data">
    <label for="musikFile">Musik</label>
        <input type="file" name="musikFile" id="musikFile" class="form-control" style="width: 40%;" accept=".mp3,.wav" required>
        <label for="thumbnailFile">Thumbnail</label>
        <input type="file" name="thumbnailFile" id="thumbnailFile" class="form-control" style="width: 40%;" accept="image/png, image/jpeg" required>
        <button type="submit" name="uploadMusik" class="btn btn-success">Upload Musik</button>
        <?php if (isset($message)): ?>
        <?php endif; ?>
    </form>
    </div>
    <?php include './include/footer.php';?>
    <?php include 'script.php';?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var playButton = document.querySelector('.circle'); // Pastikan selector ini unik dan mengarah ke elemen yang benar
            playButton.addEventListener('click', playPause);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var song = document.getElementById('song');
            var progressBar = document.getElementById('progress');

            song.addEventListener('timeupdate', function() {
                var value = (this.currentTime / this.duration) * 100;
                progressBar.value = value;
            });

            progressBar.addEventListener('input', function() {
                var time = (this.value / 100) * song.duration;
                song.currentTime = time;
            });
        });
        let body = document.querySelector('body');
        document.addEventListener('mousemove', function(e) {
            body.style.backgroundPositionX = e.pageX / -4 + 'px';
            body.style.backgroundPositionY = e.pageY / -4 + 'px';
        });

        song.addEventListener('play', function() {
            requestAnimationFrame(updateProgress);
        });
        document.querySelector('.next').addEventListener('click', nextTrack);
        document.querySelector('.previous').addEventListener('click', previousTrack);
        var songs = ['./assets/audio/masha.mp3', './assets/audio/masha.mp3'];
        var currentSongIndex = 0;

        var progressBar = document.getElementById('progress'); // Pastikan elemen ini ada di HTML

        function updateProgress() {
            if (!song.paused) {
                var value = (song.currentTime / song.duration) * 100;
                progressBar.value = value;
                requestAnimationFrame(updateProgress);
            }
        }

        
        function nextTrack() {
            currentSongIndex = (currentSongIndex + 1) % songs.length;
            song.src = songs[currentSongIndex];
            song.play();
        }

        function previousTrack() {
            currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
            song.src = songs[currentSongIndex];
            song.play();
        }

        function playPause() {
            let song = document.getElementById('song');
            let playIcon = document.getElementById('play');

            if (song.paused) {
                song.play();
                playIcon.classList.remove('fa-play-circle');
                playIcon.classList.add('fa-pause-circle');
            } else {
                song.pause();
                playIcon.classList.add('fa-play-circle');
                playIcon.classList.remove('fa-pause-circle');
            }
        }
    </script>
    </body>
</html>