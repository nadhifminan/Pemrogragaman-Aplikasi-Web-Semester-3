<!DOCTYPE html>
<html>
<head>
    <title>Master-Detail Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Daftar Transaksi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Waktu Transaksi</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>ID Pelanggan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                // Query INNER JOIN untuk mengambil data dari kedua tabel
                $query = "SELECT transaksi.id, transaksi.waktu_transaksi, transaksi.keterangan, transaksi.total, transaksi.pelanggan_id
                          FROM transaksi
                          INNER JOIN transaksi_detail ON transaksi.id = transaksi_detail.transaksi_id";

                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['waktu_transaksi'] . '</td>';
                    echo '<td>' . $row['keterangan'] . '</td>';
                    echo '<td>' . $row['total'] . '</td>';
                    echo '<td>' . $row['pelanggan_id'] . '</td>';
                    echo '<td><a href="hapusBarang.php?id=' . $row['id'] . '" class="btn btn-danger">Hapus</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
