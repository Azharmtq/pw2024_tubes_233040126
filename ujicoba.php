<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemutar Musik Sederhana</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .music-player {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
        }

        .thumbnail {
            width: 100%;
            height: 180px;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .controls button {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .controls button:hover {
            background-color: #0056b3;
        }

        .controls input[type="range"] {
            width: 100%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="music-player">
        <div class="thumbnail" style="background-image: url('your-thumbnail-image.jpg');"></div>
        <audio id="audioPlayer" src="your-music-file.mp3"></audio>
        <div class="controls">
            <button onclick="playAudio()" id="playBtn">Play</button>
            <button onclick="pauseAudio()">Pause</button>
            <input type="range" id="seekBar" value="0" max="100">
        </div>
    </div>
    <script>
        const audioPlayer = document.getElementById('audioPlayer');
        const seekBar = document.getElementById('seekBar');
        const playBtn = document.getElementById('playBtn');

        function playAudio() {
            audioPlayer.play();
            playBtn.disabled = true;
        }

        function pauseAudio() {
            audioPlayer.pause();
            playBtn.disabled = false;
        }

        audioPlayer.ontimeupdate = function() {
            let percentage = (audioPlayer.currentTime / audioPlayer.duration) * 100;
            seekBar.value = percentage;
        };

        seekBar.oninput = function() {
            let time = (seekBar.value * audioPlayer.duration) / 100;
            audioPlayer.currentTime = time;
        };
    </script>
</body>
</html>