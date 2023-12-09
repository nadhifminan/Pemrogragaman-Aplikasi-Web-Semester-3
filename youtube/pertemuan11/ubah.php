<?php
require 'function.php';
//ambildata di url
$id = $_GET["id"];
//query data mahasiswa
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// Koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Cek tombol submit sudah ditekan apa belum
if(isset($_POST["submit"])) {
    //cek apakah data berhasil ditambahkan 
    if (ubah($_POST) > 0) {
        echo "
            <script>
                confirm('data berhasil diedit');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "data gagal diedit";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data mahasiswa</title>
</head>
<body>
    <h1>Edit data mahasiswa</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"];?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
            </li>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" value="<?=$mhs["nim"];?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" value="<?=$mhs["email"];?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan"value="<?=$mhs["jurusan"];?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" value="<?=$mhs["gambar"];?>">
            </li>
            <li>
                <button type="submit" name="submit">Edit Data!</button>
            </li>
        </ul>
    </form>

    <a href="index.php">kembali ke halaman utama</a>
</body>
</html>
