<?php 
$koneksi = mysqli_connect("localhost", "root", "", "penjualan",'3308');

// Menentukan jumlah item per halaman
$per_halaman = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 5;

// Menghitung jumlah total baris
$total_baris = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi"));

// Menghitung jumlah halaman
$total_halaman = ceil($total_baris / $per_halaman);

// Menentukan halaman aktif
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

// offset
$offset = ($halaman_aktif - 1) * $per_halaman;

$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';

// Periksa apakah input tanggal mulai dan selesai diisi
$tgl_mulai = isset($_GET['tgl_mulai']) ? $_GET['tgl_mulai'] : '';
$tgl_selesai = isset($_GET['tgl_selesai']) ? $_GET['tgl_selesai'] : '';

// Membuat kondisi tanggal untuk ditambahkan pada query
$tgl_condition = '';
if ($tgl_mulai && $tgl_selesai) {
    $tgl_condition = " AND transaksi.waktu_transaksi BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
}

$query = "SELECT transaksi.*, pelanggan.nama 
          FROM transaksi 
          INNER JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id
          WHERE 
            (transaksi.waktu_transaksi LIKE '%$keyword%' OR
            transaksi.keterangan LIKE '%$keyword%' OR
            transaksi.total LIKE '%$keyword%' OR
            pelanggan.nama LIKE '%$keyword%') $tgl_condition
          LIMIT $offset, $per_halaman";

$hasil = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Data Transaksi</h1>

        <!-- Form Dropdown -->
        <form action="" method="GET" class="mb-3">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="sr-only" for="per_page">Jumlah Baris Per Halaman</label>
                    <select class="custom-select mb-2" id="per_page" name="per_page">
                        <option value="5" <?= ($per_halaman == 5) ? 'selected' : ''; ?>>5</option>
                        <option value="10" <?= ($per_halaman == 10) ? 'selected' : ''; ?>>10</option>
                        <option value="20" <?= ($per_halaman == 20) ? 'selected' : ''; ?>>20</option>
                        <option value="25" <?= ($per_halaman == 25) ? 'selected' : ''; ?>>25</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="hidden" name="keyword" value="<?= $keyword; ?>">
                    <input type="hidden" name="halaman" value="<?= $halaman_aktif; ?>">
                    <button type="submit" class="btn btn-primary mb-2">Pagination</button>
                </div>
            </div>
        </form>

       <!-- Form Pencarian -->
        <form action="" method="GET" class="mb-3">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="sr-only" for="keyword">Kata Kunci</label>
                    <input type="text" class="form-control mb-2" id="keyword" name="keyword" placeholder="Cari...">
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="tgl_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control mb-2" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai">
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="tgl_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control mb-2" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai">
                </div>
                <input type="hidden" name="per_page" value="<?= $per_halaman; ?>">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Cari</button>
                </div>
            </div>
        </form>

        <!-- <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a> -->
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
                <td><a href="detail.php?keterangan=<?= urlencode($row['keterangan']); ?>"><?= $row['keterangan']; ?></a></td>
                <td><?= $row['total']; ?></td>
                <td><a href="detail_pelanggan.php?nama=<?= urlencode($row['nama']); ?>"><?= $row['nama']; ?></a></td>
                <td>
                    <a href="edit.php?id_pelanggan=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id_pelanggan=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data dengan nama <?= $row['nama']; ?>?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- navigasi halaman -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li class="page-item <?= ($i == $halaman_aktif) ? 'active' : ''; ?>">
                        <a class="page-link" href="?halaman=<?= $i; ?>&keyword=<?= $keyword; ?>&per_page=<?= $per_halaman; ?>"><?= $i; ?></a>
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
