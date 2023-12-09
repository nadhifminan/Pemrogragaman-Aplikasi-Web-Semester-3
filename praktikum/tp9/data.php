<?php 
$koneksi = mysqli_connect("localhost", "root", "", "penjualan");

// Menentukan jumlah item per halaman
$per_halaman = 5;

// Menghitung jumlah total baris
$total_baris = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi"));

// Menghitung jumlah halaman
$total_halaman = ceil($total_baris / $per_halaman);

// Menentukan halaman aktif
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

// Menghitung offset
$offset = ($halaman_aktif - 1) * $per_halaman;

$query = "SELECT transaksi.*, pelanggan.nama 
          FROM transaksi 
          INNER JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
          LIMIT $offset, $per_halaman";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Data Master Transaksi</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pembelian</th>
                    <th>Keterangan Nama Barang</th>
                    <th>Total</th>
                    <th>Nama Pelanggan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <?php 
            $no = $offset + 1;
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['waktu_transaksi']; ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td><?= $row['total']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>
                    <a href="edit.php?id_pelanggan=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id_pelanggan=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data dengan nama <?= $row['pelanggan_id']; ?>?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- Tampilkan navigasi halaman -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li class="page-item <?= ($i == $halaman_aktif) ? 'active' : ''; ?>">
                        <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
