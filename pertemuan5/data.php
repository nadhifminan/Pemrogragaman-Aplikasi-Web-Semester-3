<?php 
$koneksi = mysqli_connect("localhost","root","","penjualan");
// if ($koneksi){
//     echo "koneksi berhasil";
// }else{
//     echo "koneksi gagal";
// }
$query = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <a href="tambah.php"><button>Tambah Data</button></a>
    <table border="1">
        <tr>
            <th>no</th>
            <th>kode barang</th>
            <th>nama barang</th>
            <th>harga barang</th>
            <th>stok barang</th>
            <th>id supplier</th>
            <th>action</th>
        </tr>
            <?php while($row = mysqli_fetch_assoc($hasil)) 
            {
            ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td><?= $row['supplier_id']; ?></td>
            <td>
                <a href="edit.php?id_barang=<?= $row['id']; ?>">edit</a>
                <a href="hapus.php?id_barang=<?= $row['id']; ?>">delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>