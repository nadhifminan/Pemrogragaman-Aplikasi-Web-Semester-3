<?php 
$host = "localhost";
$db = "penjualan";
$user = "root";
$passw = "";
$koneksi = mysqli_connect($host, $user, $passw, $db);

if ($koneksi) {
    // echo "Koneksi berhasil";
} else {
    // echo "Koneksi tidak berhasil";
}

$query = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <a href="tambah.php">+</a>
            <th>no</th>
            <th>kode barang</th>
            <th>nama barang</th>
            <th>harga barang</th>
            <th>stok barang</th>
            <th>id supplier</th>
        </tr>
     
        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td><?= $row['supplier_id']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>