<?php
// Lokasi penyimpanan file gambar
$uploadDirectory = '../assets/img/';

// Ukuran maksimum file (dalam byte)
$maxFileSize = 20 * 1024 * 1024; // 20MB

// Pesan kesalahan default
$errorMsg = '';

// Jika ada unggahan file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    // Mendapatkan informasi file
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $fileError = $_FILES['image']['error'];

    // Mendapatkan ekstensi file
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Ekstensi yang diperbolehkan
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    // Memeriksa apakah ekstensi file diperbolehkan
    if (!in_array($fileExt, $allowedExtensions)) {
        $errorMsg = 'Hanya file gambar JPG, JPEG, PNG, GIF, dan WebP yang diperbolehkan.';
        echo $errorMsg;
    } elseif ($fileSize > $maxFileSize) {
        $errorMsg = 'Ukuran file gambar melebihi batas maksimum (20MB).';
        echo $errorMsg;
    } elseif ($fileError !== UPLOAD_ERR_OK) {
        $errorMsg = 'Terjadi kesalahan saat mengunggah file.';
        echo $errorMsg;
    } else {
        // Memindahkan file ke direktori tujuan
        $destination = $uploadDirectory . $fileName;
        if (!move_uploaded_file($fileTmpName, $destination)) {
            $errorMsg = 'Gagal menyimpan file gambar.';
        } else {
            // File berhasil diunggah
            // Lakukan operasi INSERT INTO ke dalam database untuk menyimpan informasi konten beserta nama file gambar
            // Contoh:
            include 'koneksi.php'; // Sertakan file koneksi.php
            $contentTitle = $_POST['content_title'];
            $contentMusik = $_POST['content_musik'];
            $contentUrl = $_POST['content_url'];
            $contentUpload = date('Y-m-d H:i:s'); // Tanggal unggah saat ini
            $contentRelease = $_POST['content_release'];
            $contentPicture = $fileName; // Nama file gambar yang diunggah
            
            // Query untuk menambah data konten ke database
            $query = "INSERT INTO `content` (`content_title`, `content_musik`, `content_url`, `content_picture`, `content_upload`, `content_release`) VALUES ('$contentTitle', '$contentMusik', '$contentUrl', '$contentPicture', '$contentUpload', '$contentRelease')";
                    
            // Eksekusi query insert
            if (mysqli_query($koneksi, $query)) {
                echo "Data konten berhasil ditambahkan.";
            } else {
                echo "Error: " . $query . "" . mysqli_error($koneksi);
            }
            
            echo 'File gambar berhasil diunggah dan konten berhasil ditambahkan.';
            echo "<script> window.location.href = 'content.php';</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'meta.php';?>
<head>
    <title>Tambah Berita</title>
    <style>
        #imagePreview {
            max-width: 300px;
            max-height: 300px;
        }
    </style>
</head>

<body>
    <div class="form container-fluid">
        <form action="" method="post" enctype="multipart/form-data" class="container-sm">
            <div class="form_place container-lg">
            <h2>Tambah Konten</h2>
        <div>
            <label for="contentTitle">Judul Konten:</label>
            <input type="text" id="contentTitle" name="content_title">
        </div>
        <div>
            <label for="contentMusik">Sinopsis Musik:</label>
            <textarea id="contentMusik" name="content_musik" ></textarea>
        </div>
        <div>
            <label for="contentUrl">URL Sumber:</label>
            <input type="text" id="contentUrl" name="content_url">
        </div>
        <div>
            <label for="contentRelease" style="place-content:start ;">Tanggal Rilis:</label>
            <input type="date" id="contentRelease" name="content_release" style="width: fit-content;">
        </div>
        <div>
            <label for="image">Unggah Gambar:</label>
            <input type="file" id="imageInput" name="image" accept="image/jpeg, image/png, image/gif, image/webp">
            <img id="imagePreview" src="#" alt="Preview" style="display: Block;">
        </div>
        <button type="submit" class="btn btn-success">Tambah Konten</button>
        <?php if (!empty($errorMsg)) : ?>
            <p style="color: red;"><?php echo $errorMsg; ?></p>
        <?php endif; ?>
        </div>
    </form>
    </div>
    <script>
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
    <?php include 'script.php';?>
</body>
</html>

