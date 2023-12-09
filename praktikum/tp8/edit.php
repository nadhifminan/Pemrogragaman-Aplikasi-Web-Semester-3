<?php
$koneksi = mysqli_connect("localhost", "root", "", "penjualan");

$id_user = $_GET['id_user'];
$query = "SELECT * FROM user WHERE id_user = $id_user";
$hasil = mysqli_query($koneksi, $query);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $raw_password = $_POST['password'];
    $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT); // Hash password
    $nama_user = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level_user = $_POST['level'];

    // Query pembaruan data
    $sql = "UPDATE user SET 
    username = '$username',
    password = '$hashed_password', -- Gunakan password terenkripsi
    nama    = '$nama_user',
    alamat = '$alamat',
    hp = '$hp',
    level = '$level_user'
    WHERE id_user = $id_user";

    // Eksekusi query
    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil) {
        header("Location: data.php");
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Data Master User</h1>
        <?php while ($baris = mysqli_fetch_assoc($hasil)) : ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= $baris['username'] ?>">
            </div>
        
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password baru jika ingin mengganti">
            </div>
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $baris['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $baris['alamat'] ?>">
            </div>
            <div class="form-group">
                <label for="hp">HP</label>
                <input type="text" class="form-control" name="hp" id="hp" value="<?= $baris['hp'] ?>">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select class="form-control" name="level" id="level">
                    <option value="">--Pilih Jenis User--</option>
                    <option value="1" <?php echo ($baris['level'] == 1) ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo ($baris['level'] == 2) ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
            <a href="data.php" class="btn btn-danger">Batal</a>
        </form>
        <?php endwhile; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
