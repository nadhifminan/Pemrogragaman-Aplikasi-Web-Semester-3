<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $date = $_POST['date'];
    $keterangan = $_POST['keterangan'];
    $total = $_POST['total'];
    $id_pelanggan = $_POST['id_pelanggan'];

    $query = "INSERT INTO transaksi (id, waktu_transaksi, keterangan, total, pelanggan_id) VALUES ('$id_transaksi','$date', '$keterangan','$total','$id_pelanggan')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data Berhasil disimpan');</script>";
    } else {
        echo "Gagal Menambahkan data";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        .container {
            border-radius: 5px;
            padding: 10px;
            /* background-color: #89CFF3; */
            margin-top: 20px;
            height: auto;
        }
        select, input, textarea {
            border-radius: 7px;
            margin-bottom: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Tambahkan Data Transaksi</h1>
        <form method="POST">
            <div class="form-group">
                <label for="id_transaksi">Id Transaksi:</label>
                <input type="text" name="id_transaksi" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">Waktu Transaksi:</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea name="keterangan" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" name="total" class="form-control">
            </div>
            <div class="form-group">
                <label for="id_pelanggan">Id Pelanggan:</label>
                <select name="id_pelanggan" class="form-control">
                    <option value="">Pilih Id Pelanggan</option>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM `pelanggan`");
                    while ($row = mysqli_fetch_array($sql)) {
                        echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</body>
</html>
