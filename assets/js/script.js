function search() {
    var search = document.getElementById("searchInput").value;
    window.location.href = "?search=" + search;
};
var audio = document.getElementById('audioPlayer');

        function playAudio() {
            audio.play();
        }

        function pauseAudio() {
            audio.pause();
        }

        function nextTrack() {
            // Ganti sumber audio dan mainkan
            audio.src = 'nextaudiofile.mp3';
            audio.play();
        };