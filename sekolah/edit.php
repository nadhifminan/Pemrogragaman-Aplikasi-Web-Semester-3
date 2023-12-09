<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>
<body>
    <h1>Edit Siswa</h1>
    <?php
    include 'koneksi.php';

    // Periksa apakah parameter 'id_' sudah diterima melalui URL
    if(isset($_GET['id_'])){
        $id = $_GET['id_'];
        
        // Query untuk mengambil data siswa berdasarkan id_
        $query = "SELECT * FROM `siswa` WHERE `id_` = $id";
        $result = mysqli_query($koneksi, $query);
        
        // Periksa apakah data ditemukan
        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
    ?>
    <form method="post" action="update.php">
        <input type="hidden" name="id_" value="<?php echo $data['id_']; ?>">
        Nama <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>
        Jenis Kelamin <br>
        <input type="radio" name="jk" value="Laki-laki" <?php if($data['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>Laki-Laki <br>
        <input type="radio" name="jk" value="Perempuan" <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>Perempuan <br>

        Alamat <br>
        <textarea name="alamat"><?php echo $data['alamat']; ?></textarea><br>

        <input type="submit" name="submit" value="Simpan Perubahan">
        <a href="daftar.php">Batal</a>
    </form>
    <?php
        } else {
            echo "Data siswa tidak ditemukan.";
        }
    } else {
        echo "Parameter id_ tidak ditemukan.";
    }
    ?>
</body>
</html>
