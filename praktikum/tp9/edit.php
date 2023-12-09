<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

$id_supplier = $_GET['id_supplier'];
$query = "SELECT * FROM supplier WHERE id = $id_supplier";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])) {
    $nama_supplier = $_POST['nama_supplier'];
    $telp_supplier = $_POST['telp_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];

    // Query pembaruan data
    $sql = "UPDATE supplier SET 
    nama = '$nama_supplier',
    telp = '$telp_supplier',
    alamat = '$alamat_supplier'
    WHERE id = $id_supplier";

    // Eksekusi query
    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        header("Location: data.php");
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Data Master Supplier</h1>
        <?php while ($baris = mysqli_fetch_assoc($hasil)) : ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_supplier">Nama</label>
                <input type="text" class="form-control" name="nama_supplier" value="<?= $baris['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="telp_supplier">Telp</label>
                <input type="text" class="form-control" name="telp_supplier" value="<?= $baris['telp'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat_supplier">Alamat</label>
                <input type="text" class="form-control" name="alamat_supplier" value="<?= $baris['alamat'] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
            <a href="data.php" class="btn btn-danger">Batal</a>
        </form>
        <?php endwhile; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
