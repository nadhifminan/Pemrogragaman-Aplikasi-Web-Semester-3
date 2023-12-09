<?php
$koneksi=mysqli_connect("localhost","root","","penjualan");

$query= "SELECT * FROM barang INNER JOIN supplier ON barang.supplier_id = supplier.id";
$data=mysqli_query($koneksi,$query);

$query2 ="SELECT * FROM supplier order by nama asc";
$datasupplier =mysqli_query($koneksi,$query2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action='' method='POST'>
    Kode barang <input type='text' name='kodebarang'><br><br>
    Nama barang <input type='text' name='namabarang'><br><br>
    Harga barang <input type='text' name='hargabarang'><br><br>
    Stock barang <input type='text' name='stockbarang'><br><br>
    Supplier id <select name='supplier'>
    <?php
        while($rowsupplier = mysqli_fetch_array($datasupplier)){
            echo "<option value='$rowsupplier[id]'>$rowsupplier[nama]</option>";
        };
    ?>
    </select>
    <button type="Submit">Submit</button>
</form>

    
</body>
</html>