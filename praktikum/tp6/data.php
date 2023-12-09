<?php 
$koneksi = mysqli_connect("localhost", "root", "", "supermarket");
$query = "SELECT s.id AS supplier_id, s.nama AS nama_supplier, s.telp AS telp_supplier, s.alamat AS alamat_supplier, 
                 b.id AS barang_id, b.kode_barang, b.nama_barang, b.harga, b.stok
          FROM supplier s
          INNER JOIN barang b ON s.id = b.supplier_id";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier dan Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Data Master Supplier dan Barang</h1>
        <a href="supplier.php" class="btn btn-primary mb-3">Tambah Data Supplier</a>
        <a href="barang.php" class="btn btn-primary mb-3">Tambah Data Barang</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Telp Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_supplier']; ?></td>
                <td><?= $row['telp_supplier']; ?></td>
                <td><?= $row['alamat_supplier']; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tindakan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="edit_supplier.php?id_supplier=<?= $row['supplier_id']; ?>">Edit Supplier</a>
                            <a class="dropdown-item" href="edit_barang.php?id_barang=<?= $row['barang_id']; ?>">Edit Barang</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="hapus_supplier.php?id_supplier=<?= $row['supplier_id']; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data supplier dengan nama <?= $row['nama_supplier']; ?>?">Hapus Supplier</a>
                            <a class="dropdown-item" href="hapus_barang.php?id_barang=<?= $row['barang_id']; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data barang dengan kode <?= $row['kode_barang']; ?>?">Hapus Barang</a>
                        </div>
                    </div>
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
