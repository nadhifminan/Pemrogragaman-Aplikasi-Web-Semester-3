<?php 
$koneksi = mysqli_connect("localhost","root","","penjualan");

if (isset($_POST['submit'])){
    $kode_barang = $_POST['kodebarang'];
    $nama_barang = $_POST['namabarang'];
    $harga_barang = $_POST['hargabarang'];
    $stok_barang = $_POST['stokbarang'];
    $id_supplier = $_POST['idsupplier'];

    // query memasukkan data ke dalam database
    $sql = "INSERT INTO barang 
    VALUES(null,'$kode_barang','$nama_barang',
    '$harga_barang','$stok_barang','$id_supplier')";

    //eksekusi query
    $hasil = mysqli_query($koneksi,$sql);
    if ($hasil){
        header ("Location: data.php");
    }else {
        echo "data gagal ditambahkan";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah Data</title>
</head>
<body>
    <h1>Form Tambah Data</h1>
    <form action="" method="post">
        kode barang     : <input type="text" name="kodebarang"><br><br>
        nama barang     : <input type="text" name="namabarang"><br><br>
        harga barang    : <input type="text" name="hargabarang"><br><br>
        stok barang     : <input type="text" name="stokbarang"><br><br>
        id supplier     : <input type="text" name="idsupplier"><br><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>