<?php 
$koneksi = mysqli_connect("localhost","root","","penjualan");

$id_barang = $_GET['id_barang'];
$query = "SELECT * FROM barang WHERE id = $id_barang";
$hasil = mysqli_query($koneksi,$query);
// $row = mysqli_fetch_assoc($hasil);
// var_dump($row);
if (isset($_POST['submit'])){
    $kode_barang = $_POST['kodebarang'];
    $nama_barang = $_POST['namabarang'];
    $harga_barang = $_POST['hargabarang'];
    $stok_barang = $_POST['stokbarang'];
    $id_supplier = $_POST['idsupplier'];

    // query memasukkan data ke dalam database
    $sql = "UPDATE barang SET 
    kode_barang = '$kode_barang',nama_barang = '$nama_barang',
    harga = '$harga_barang',stok = '$stok_barang',
    supplier_id = '$id_supplier' WHERE id = $id_barang";

    //eksekusi query
    $hasil = mysqli_query($koneksi,$sql);
    if ($hasil){
        header ("Location: data.php");
    }else {
        echo "data gagal diubah";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Data</title>
</head>
<body>
    <h1>Form Edit Data</h1>
    <?php 
        while($baris = mysqli_fetch_assoc($hasil)):
    ?>
    <form action="" method="post">
        kode barang     : <input type="text" name="kodebarang" value="<?= $baris['kode_barang'] ?>"><br><br>
        nama barang     : <input type="text" name="namabarang" value="<?= $baris['nama_barang'] ?>"><br><br>
        harga barang    : <input type="text" name="hargabarang" value="<?= $baris['harga'] ?>"><br><br>
        stok barang     : <input type="text" name="stokbarang" value="<?= $baris['stok'] ?>"><br><br>
        id supplier     : <input type="text" name="idsupplier" value="<?= $baris['supplier_id'] ?>"><br><br>
        <button type="submit" name="submit">Ubah</button>
    </form>
    <?php endwhile; ?>
</body>
</html>