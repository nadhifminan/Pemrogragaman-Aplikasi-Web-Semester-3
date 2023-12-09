<?php 
$koneksi = mysqli_connect("localhost", "root", "", "penjualan");

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $raw_password = $_POST['password'];  // Kata sandi dalam bentuk tidak terenkripsi
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);  // Hash kata sandi

    $nama_user = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level_user = $_POST['level'];

    // query memasukkan data ke dalam database
    $sql = "INSERT INTO user 
    VALUES(null, '$username', '$hashed_password', '$nama_user','$alamat','$hp', '$level_user')";

    // eksekusi query
    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil){
        header ("Location: data.php");
    } else {
        echo "Data gagal ditambahkan";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah User Baru</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat">
            </div>
            <div class="form-group">
                <label for="hp">HP</label>
                <input type="text" class="form-control" name="hp" id="hp">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level">
                    <option >--Pilih Jenis User--</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
            <a href="data.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
