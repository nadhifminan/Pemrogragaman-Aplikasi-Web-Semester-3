<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <a href="tambah.php">(+)Tambah Baru</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';
        $row=mysqli_query($koneksi,"SELECT * FROM `siswa`");
        while($data = mysqli_fetch_array($row)){
            echo "<tr>";
            echo "<td>";
            echo $data['id'];
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
            echo "<a href='edit.php?id_=".$data['id']."'>Edit</a> ";
            echo "<a href='delete.php?id_=".$data['id']."'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }        
        ?>
    </table>
</body>
</html>