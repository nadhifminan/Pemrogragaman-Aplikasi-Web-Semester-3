<?php

$koneksi = mysqli_connect("localhost", "root", "", "penjualan",'3308');

if (isset($_GET['nama'])) {
    $nama = urldecode($_GET['nama']);

    $query_detail = "SELECT * FROM pelanggan";

    $result_detail = mysqli_query($koneksi, $query_detail);

    if ($result_detail && mysqli_num_rows($result_detail) > 0) {
        $data_detail = mysqli_fetch_assoc($result_detail);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Detail Transaksi</h2>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>nama:</strong> <?= $data_detail['nama']; ?></p>
                <p class="card-text"><strong>jenis kelamin :</strong> <?= $data_detail['jenis_kelamin']; ?></p>
                <p class="card-text"><strong>telpon :</strong> <?= $data_detail['telp']; ?></p>
                <p class="card-text"><strong>Alamat :</strong> <?= $data_detail['alamat']; ?></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "Data transaksi tidak ditemukan.";
    }
} else {
    echo "nama tidak valid.";
}
?>
