<?php
$koneksi = mysqli_connect("localhost", "root", "", "penjualan",'3308');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses update
    $id_pelanggan = $_POST['id_pelanggan'];
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];

    $query_update = "UPDATE transaksi SET waktu_transaksi='$waktu_transaksi', keterangan='$keterangan', total='$total' WHERE id=$id_pelanggan";
    mysqli_query($koneksi, $query_update);

    header("Location: data.php");
    exit();
}

$id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : die('Error: ID Pelanggan tidak ditemukan.');

$query_select = "SELECT * FROM transaksi WHERE id=$id_pelanggan";
$hasil_select = mysqli_query($koneksi, $query_select);
$data = mysqli_fetch_assoc($hasil_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Data Transaksi</h1>

        <form action="" method="POST">
            <input type="hidden" name="id_pelanggan" value="<?= $data['id']; ?>">

            <div class="form-group">
                <label for="waktu_transaksi">Tanggal Pembelian:</label>
                <input type="text" class="form-control" id="waktu_transaksi" name="waktu_transaksi" value="<?= $data['waktu_transaksi']; ?>" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan Nama Barang:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan']; ?>" required>
            </div>

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" class="form-control" id="total" name="total" value="<?= $data['total']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
