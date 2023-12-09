<?php 
$host = "localhost";
$db = "penjualan";
$user = "root";
$passw = "";
$koneksi = mysqli_connect($host, $user, $passw, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])){
    $kode_barang = $_POST['kodebarang'];
    $nama_barang = $_POST['namabarang'];
    $harga = $_POST['hargabarang'];
    $stok = $_POST['stokbarang'];
    $supplier_id = $_POST['idsupplier'];

    $query = "INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) 
              VALUES ('$kode_barang', '$nama_barang', '$harga', '$stok', '$supplier_id')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FORM TAMBAH DATA</h1>
    <form action="" method="post">
        kode barang: <input type="text" name="kodebarang"><br><br>
        nama barang: <input type="text" name="namabarang"><br><br>
        harga barang: <input type="text" name="hargabarang"><br><br>
        stok barang: <input type="text" name="stokbarang"><br><br>
        id supplier: <input type="text" name="idsupplier"><br><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>