<?php 
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");
$query = "SELECT * FROM rekammedis";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data rekammedis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Data Rekap Rekammedis</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Keluhan</th>
                    <th>Dokter</th>
                    <th>Diagnosa</th>
                    <th>Poliklinik</th>
                    <th>tggl periksa</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['id_pasien'] ?></td>
            <td><?= $row['keluhan'] ?></td>
            <td><?= $row['id_dokter'] ?></td>
            <td><?= $row['diagnosa'] ?></td>
            <td><?= $row['id_poli'] ?></td>
            <td><?= $row['tgl_periksa'] ?></td>
            
            <td>
                <a href="edit.php?id_rm=<?= $row['id_rm']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id_rm=<?= $row['id_rm']; ?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin ingin menghapus data dengan ID pasien <?= $row['id_pasien']; ?>?')">Hapus</a>
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
