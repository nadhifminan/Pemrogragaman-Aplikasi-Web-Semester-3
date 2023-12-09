<?php 
$koneksi = mysqli_connect("localhost", "root", "", "supermarket");

// Menghandle penghapusan item barang
if(isset($_GET['id_barang'])) {
    $id_pemasok = $_GET['id_barang'];
    $query = "DELETE FROM barang WHERE id = $id_pemasok";
    $hasil = mysqli_query($koneksi, $query);
    
    if ($hasil) {
        header("Location: data.php");
    } else {
        echo "Data gagal dihapus";
    }
}

// Menampilkan daftar barang
$query = "SELECT * FROM barang";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Data Master Supplier</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>kode Barang</th>
                    <th>Nama Barang</th>
                    <th>harga</th>
                    <th>stok</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                    <a href="hapusBarang.php?id_barang=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data dengan nama <?= $row['nama_barang']; ?>?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
