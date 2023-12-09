<?php
    //koneksi ke database
    $conn=mysqli_connect("localhost","root","","phpdasar");
    //ambil data dari tabel mahasiswa /query data mahasiswa
    $result=mysqli_query($conn,"SELECT * FROM mahasiswa");
    //ambil data dari objek result(fetch)=>4
    //1.mysqli_fetch_row =>mengembalikkan array numerik
    //2.mysqli_fetch_assoc =>mengembalikkan array assosiatif
    //3.mysqli_fetch_array =>mengembalikan keduanya 1/2
    //4.mysqli_fetch_object =>
    

    // $mhs =mysqli_fetch_row($result);
    // var_dump($mhs[3]); =>to email
    // $mhs =mysqli_fetch_assoc($result);
    // var_dump($mhs["jurusan"]); =>to jurusan
    // $mhs =mysqli_fetch_array($result);
    // var_dump($mhs[3]) ||var_dump($mhs["jurusan"]); //bisa utk dua duanya =>to email
    // $mhs =mysqli_fetch_object($result);
    // var_dump($mhs->email);

    //yg dipakai associate karrena lebih efektif
    // while($mhs =mysqli_fetch_array($result)){
    //     var_dump($mhs);
    // };
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0" >
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while ( $row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td> <img src="img/<?= $row["gambar"];?> " width="50px"></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
            
        </tr>
        <?php $i++; ?>
        <?php endwhile;?>
    </table>
</body>
</html>