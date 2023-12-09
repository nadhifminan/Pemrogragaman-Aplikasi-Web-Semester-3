<?php 
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

if (isset($_POST['submit'])) {
    $id_rm = $_POST['id_rm'];
    $id_pasien = isset($_POST['id_pasien']) ? $_POST['id_pasien'] : null;
    $keluhan = isset($_POST['keluhan']) ? $_POST['keluhan'] : null;
    $id_dokter = isset($_POST['id_dokter']) ? $_POST['id_dokter'] : null;
    $diagnosa = isset($_POST['diagnosa']) ? $_POST['diagnosa'] : null;
    $id_poli = isset($_POST['id_poli']) ? $_POST['id_poli'] : null;
    $tgl_periksa = isset($_POST['tgl_periksa']) ? $_POST['tgl_periksa'] : null;

    // Query untuk mengupdate data
    $sql = "UPDATE rekammedis SET id_pasien = '$id_pasien', keluhan = '$keluhan', id_dokter = '$id_dokter', diagnosa = '$diagnosa', id_poli = '$id_poli', tgl_periksa = '$tgl_periksa' WHERE id_rm = $id_rm";

    // eksekusi query
    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil) {
        header("Location: data.php");
    } else {
        echo "Data gagal diupdate";
    }
}

$data = null;  // Inisialisasi variabel $data

if (isset($_GET['id_rm'])){
    $id_rm = $_GET['id_rm'];
    
    if (!is_numeric($id_rm)) {
        echo "ID Rekammedis tidak valid";
    } else {
        // Query untuk mendapatkan data rekam medis berdasarkan ID
        $query = "SELECT * FROM rekammedis WHERE id_rm = $id_rm";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $data = mysqli_fetch_assoc($result);
        } else {
            echo "Gagal mengambil data rekam medis";
        }
    }
} else {
    header("Location: data.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Rekammedis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Rekammedis</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="id_rm">ID Rekammedis</label>
                <input type="text" class="form-control" name="id_rm" id="id_rm" value="<?= isset($data['id_rm']) ? $data['id_rm'] : ''; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="id_pasien">Pasien</label>
                <select class="form-control" name="id_pasien" id="id_pasien">
                    <?php
                    $queryPasien = "SELECT id_pasien, nama_pasien FROM pasien";
                    $resultPasien = mysqli_query($koneksi, $queryPasien);
                    while ($rowPasien = mysqli_fetch_assoc($resultPasien)) {
                        $selected = (isset($data['id_pasien']) && $rowPasien['id_pasien'] == $data['id_pasien']) ? 'selected' : '';
                        echo "<option value='" . $rowPasien['id_pasien'] . "' $selected>" . $rowPasien['nama_pasien'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <input type="text" class="form-control" name="keluhan" id="keluhan" value="<?= isset($data['keluhan']) ? $data['keluhan'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="id_dokter">Dokter</label>
                <select class="form-control" name="id_dokter" id="id_dokter">
                    <?php
                    $queryDokter = "SELECT id_dokter, nama_dokter FROM dokter";
                    $resultDokter = mysqli_query($koneksi, $queryDokter);
                    while ($rowDokter = mysqli_fetch_assoc($resultDokter)) {
                        $selected = (isset($data['id_dokter']) && $rowDokter['id_dokter'] == $data['id_dokter']) ? 'selected' : '';
                        echo "<option value='" . $rowDokter['id_dokter'] . "' $selected>" . $rowDokter['nama_dokter'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="diagnosa">Diagnosa</label>
                <input type="text" class="form-control" name="diagnosa" id="diagnosa" value="<?= isset($data['diagnosa']) ? $data['diagnosa'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="id_poli">Poliklinik</label>
                <select class="form-control" name="id_poli" id="id_poli">
                    <?php
                    $queryPoli = "SELECT id_poli, nama_poli FROM poliklinik";
                    $resultPoli = mysqli_query($koneksi, $queryPoli);
                    while ($rowPoli = mysqli_fetch_assoc($resultPoli)) {
                        $selected = (isset($data['id_poli']) && $rowPoli['id_poli'] == $data['id_poli']) ? 'selected' : '';
                        echo "<option value='" . $rowPoli['id_poli'] . "' $selected>" . $rowPoli['nama_poli'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_periksa">Tanggal Periksa</label>
                <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" value="<?= isset($data['tgl_periksa']) ? $data['tgl_periksa'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <a href="data.php" class="btn btn-danger">Batal</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
