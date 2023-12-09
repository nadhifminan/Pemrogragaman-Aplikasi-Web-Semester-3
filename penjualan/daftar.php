<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Penjualan</h1>
    <a href="tambah.php">(+)Tambah Baru</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Tanggal Order</th>
            <th>Deskripsi</th>
            <th>Nama Pemesan</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $row=mysqli_query($koneksi,"SELECT * FROM `order`");
        while($data = mysqli_fetch_array($row)){
            echo "<tr>";
            echo "<td>";
            echo $data['id_'];
            echo "</td>";
            echo "<td>";
            echo $data['nama'];
            echo "</td>";
            echo "<td>";
            echo $data['jenis_kelamin'];
            echo "</td>";
            echo "<td>";
            echo $data['alamat'];
            echo "</td>";
            echo "<td>";
            echo "<a href='edit.php?id_=".$data['id_']."'>Edit</a> ";
            echo "<a href='delete.php?id_=".$data['id_']."'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }   
        ?>
    </table>
</body>
</html>