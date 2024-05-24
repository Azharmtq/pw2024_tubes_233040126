<?php
include 'koneksi.php';
include 'users.php';
require_once '../vendor/autoload.php';

$query = "SELECT * FROM users";
$users = mysqli_query($koneksi, $query);

$mpdf = new \Mpdf\Mpdf();
$html = '
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="user_table table-responsive"> 
    <h1>DATA USER</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>';
        $i = 1;
if (mysqli_num_rows($users) > 0) {
    while ($row = mysqli_fetch_assoc($users)) {
        $html .= '
            <tr>
                <td>' . $i++. '</td>
                <td>' . $row['username_user'] . '</td>
                <td>' . $row['email_user'] . '</td>
            </tr>';
    }
} else {
    $html .= '
        <tr>
            <td colspan="3">Data tidak ditemukan.</td>
        </tr>';
}

$html .= '
        </tbody>
    </table>
</div>
<script src="../assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-user.pdf', 'I');