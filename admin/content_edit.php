<?php
// Include file koneksi ke database
include 'koneksi.php';
// Cek apakah ID konten telah diberikan melalui URL
if (!isset($_GET['id'])) {
    echo "ID konten tidak ditemukan.";
    exit();
}
// Ambil ID konten dari URL
$content_id = $_GET['id'];
// Ambil data konten berdasarkan ID
$query = "SELECT * FROM content WHERE content_id = $content_id";
$result = mysqli_query($koneksi, $query);
// Cek apakah konten dengan ID yang diberikan ada dalam database
if (mysqli_num_rows($result) == 0) {
    echo "Konten dengan ID $content_id tidak ditemukan.";
    exit();
}
$row = mysqli_fetch_assoc($result);
// Inisialisasi variabel dengan nilai awal dari database
$content_title = $row['content_title'];
$content_musik = $row['content_musik'];
$content_url = $row['content_url'];
$content_picture = $row['content_picture'];
$content_upload = $row['content_upload'];
$content_release = $row['content_release'];
// Proses jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang diinput dari formulir dan lakukan escape karakter khusus
    $content_title = mysqli_real_escape_string($koneksi, $_POST['content_title']);
    $content_musik = mysqli_real_escape_string($koneksi, $_POST['content_musik']);
    $content_url = mysqli_real_escape_string($koneksi, $_POST['content_url']);
    $content_picture = mysqli_real_escape_string($koneksi, $_POST['content_picture']);
    $content_upload = mysqli_real_escape_string($koneksi, $_POST['content_upload']);
    $content_release = mysqli_real_escape_string($koneksi, $_POST['content_release']);

    // Query untuk mengupdate data konten ke database
    $query_update = "UPDATE content SET 
                     content_title = '$content_title',
                     content_musik = '$content_musik',
                     content_url = '$content_url',
                     content_picture = '$content_picture',
                     content_upload = '$content_upload',
                     content_release = '$content_release'
                     WHERE content_id = $content_id";

    // Eksekusi query update
    if (mysqli_query($koneksi, $query_update)) {
        echo "Data konten berhasil diperbarui.";
        echo"<script> window.location.href = 'content.php';</script>";
    } else {
        echo "Error: " . $query_update . "" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'meta.php';?>

    <title>Edit Konten</title>
</head>
<body>
<div class="form container-fluid">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $content_id; ?>">
        <div class="form_place container-lg">
            <h2>Edit Konten</h2>
        <div>
        <label for="content_title">Judul Konten:</label>
        <input type="text" id="content_title" name="content_title" value="<?php echo $content_title; ?>">
        </div>
        <div>
        <label for="content_musik">Sinopsis Konten:</label>
        <textarea id="content_musik" name="content_musik"><?php echo $content_musik; ?></textarea>
        </div>
        <div>
        <label for="content_url">URL Sumber:</label>
        <input type="text" id="content_url" name="content_url" value="<?php echo $content_url; ?>">
        </div>
        <div>
        <label for="content_picture">Gambar:</label>
        <input type="text" id="content_picture" name="content_picture" value="<?php echo $content_picture; ?>">
        </div>
        <div>
        <label for="content_upload">Tanggal Upload:</label>
        <input type="date" id="content_upload" name="content_upload" value="<?php echo $content_upload; ?>">
        </div>
        <div>
        <label for="content_release">Tanggal Rilis:</label>
        <input type="date" id="content_release" name="content_release" value="<?php echo $content_release; ?>">
        </div>
        <button type="submit" class="btn btn-success" style="margin:10px auto;">Edit Konten</button>
        <a class="btn btn-success" style="margin:10px auto;" href="content.php">Kembali</a>
        </div>
    </form>
    </div>   
    <?php include 'script.php';?>
</body>
</html>