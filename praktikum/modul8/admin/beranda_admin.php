<?php
session_start();
if ($_SESSION['level'] != 1 && $_SESSION['login'] != "sukses") {
    header("Location: ../login.php");
}
$koneksi = mysqli_connect("localhost", "root", "", "penjualan",'3308');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Penjualan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mt-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <?php if ($_SESSION['level'] == 1): ?>
                        <div class="mb-3">
                            <!-- <label for="userDropdown" class="form-label">Pilih User</label> -->
                            <select name="userDropdown" id="userDropdown" class="form-control bg-primary mt-1" >
                                <option value="">Data Master </option>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT id_user, nama FROM user");
                                while ($row = mysqli_fetch_array($sql)) {
                                    echo '<option value="' . $row['id_user'] . '">' . $row['nama'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laporan</a>
                    </li>
                </ul>
            </div>
        </div>
        <a><?= $_SESSION['nama'] ?></a>
    </nav>

    <main>
        <p>Tekan untuk Keluar <a href="../logout.php">logout</a></p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
