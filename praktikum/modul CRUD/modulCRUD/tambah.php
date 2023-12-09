<?php 
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

if (isset($_POST['submit'])){
    $id_rm = $_POST['id_rm'];
    $id_pasien = $_POST['id_pasien'];
    $keluhan = $_POST['keluhan'];
    $id_dokter = $_POST['id_dokter'];
    $diagnosa = $_POST['diagnosa'];
    $id_poli = $_POST['id_poli'];
    $tgl_periksa = $_POST['tgl_periksa'];

    // query memasukkan data ke dalam database tanpa menyertakan kolom 'id_rm'
    $sql = "INSERT INTO rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa)
            VALUES ('$id_rm','$id_pasien', '$keluhan', '$id_dokter', '$diagnosa', '$id_poli', '$tgl_periksa')";

    // eksekusi query
    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil){
        header("Location: data.php");
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
    <title>Tambah Data Rekammedis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Rekammedis</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_rm">ID Rekammedis</label>
                <input type="text" class="form-control" name="id_rm" id="id_rm">
            </div>
            <div class="form-group">
                <label for="id_pasien">Pasien</label>
                <select class="form-control" name="id_pasien" id="id_pasien">
                    <option value="">Pilih Pasien</option>
                    <?php
                    $queryPasien = "SELECT id_pasien, nama_pasien FROM pasien"; // Gantilah sesuai dengan tabel Anda
                    $resultPasien = mysqli_query($koneksi, $queryPasien);
                    while ($rowPasien = mysqli_fetch_assoc($resultPasien)) {
                        echo "<option value='" . $rowPasien['id_pasien'] . "'>" . $rowPasien['nama_pasien'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <input type="text" class="form-control" name="keluhan" id="keluhan">
            </div>
            <div class="form-group">
                <label for="id_dokter">Dokter</label>
                <select class="form-control" name="id_dokter" id="id_dokter">
                    <option value="">Pilih Dokter</option>
                    <?php
                    $querydokter = "SELECT id_dokter, nama_dokter FROM dokter"; // Gantilah sesuai dengan tabel Anda
                    $hasil = mysqli_query($koneksi, $querydokter);
                    while ($baris = mysqli_fetch_assoc($hasil)) {
                        echo "<option value='" . $baris['id_dokter'] . "'>" . $baris['nama_dokter'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="diagnosa">Diagnosa</label>
                <input type="text" class="form-control" name="diagnosa" id="diagnosa">
            </div>
            <div class="form-group">
                <label for="id_poli">Poliklinik</label>
                <select class="form-control" name="id_poli" id="id_poli">
                    <option value="">Pilih Poliklinik</option>
                    <?php
                    $querydokter = "SELECT id_poli, nama_poli FROM poliklinik"; // Gantilah sesuai dengan tabel Anda
                    $hasil = mysqli_query($koneksi, $querydokter);
                    while ($baris = mysqli_fetch_assoc($hasil)) {
                        echo "<option value='" . $baris['id_poli'] . "'>" . $baris['nama_poli'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_periksa">Tanggal Periksa</label>
                <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa">
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
