<?php
$koneksi=mysqli_connect("localhost","root","","penjualan");

// if($koneksi){
//     echo "berhasil";
// }

$query= "SELECT * FROM barang INNER JOIN supplier ON barang.supplier_id = supplier.id";
$data=mysqli_query($koneksi,$query);



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
        <th>ID</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
    </tr>

    <?php 
        while($row = mysqli_fetch_array($data)){
            echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[kode_barang]</td>
                    <td>$row[nama_barang]</td>
                    <td>$row[harga]</td>
                    <td>$row[stok]</td>
                    <td>$row[nama]</td>
                    <td>$row[alamat]</td>
                </tr>
            ";
        }
    ?>

</table>
    
</body>
</html>