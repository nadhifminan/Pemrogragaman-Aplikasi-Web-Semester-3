<?php 
$koneksi = mysqli_connect("localhost", "root", "", "toko");

if (isset($_POST['submit'])){
    $nama_pemasok = $_POST['nama_supplier'];
    $harga_pemasok = $_POST['telp_supplier'];
    $stok_pemasok = $_POST['alamat_supplier'];

    // query memasukkan data ke dalam database
    $sql = "INSERT INTO supplier 
    VALUES(null, '$nama_pemasok', '$harga_pemasok', '$stok_pemasok')";

    // eksekusi query
    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil){
        header ("Location: data.php");
    } else {
        echo "Data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Data Master Supplier Baru</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_supplier">Nama</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier">
            </div>
            <div class="form-group">
                <label for="telp_supplier">Telp</label>
                <input type="text" class="form-control" name="telp_supplier" id="telp_supplier">
            </div>
            <div class="form-group">
                <label for="alamat_supplier">Alamat</label>
                <input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
            <a href="data.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
