<?php
$koneksi=mysqli_connect("localhost","root","","penjualan");

$query= "SELECT * FROM barang INNER JOIN supplier ON barang.supplier_id = supplier.id where barang.id=3";
$data=mysqli_query($koneksi,$query);

$query2 ="SELECT * FROM supplier";
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
    <?php
    while($row = mysqli_fetch_array($data)){
        echo "
        Kode barang <input type='text' name='kodebarang' value='$row[kode_barang]'><br><br>
        Nama barang <input type='text' name='namabarang'value='$row[nama_barang]'><br><br>
        Harga barang <input type='text' name='hargabarang' value='$row[harga]'><br><br>
        Stock barang <input type='text' name='stockbarang' value='$row[stok]'><br><br>";

        echo "Supplier id <select name='supplier'>";
        while($rowsupplier = mysqli_fetch_array($datasupplier)){
            if($row['supplier_id'] == $rowsupplier['id']){
                echo "<option selected value='$rowsupplier[id]'>$rowsupplier[nama]</option>";
            }else{
                echo "<option value='$rowsupplier[id]'>$rowsupplier[nama]</option>";
            };
        };
        echo "</select>";
    };
    ?>
    <button type="Submit">Submit</button>
</form>

    
</body>
</html>