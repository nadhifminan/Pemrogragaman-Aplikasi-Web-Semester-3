<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "penjualan";
$connection = mysqli_connect($host, $username, $password, $database);

if ($connection) {
    echo "data berhasil dikoneksikan";
} else {
    echo "tidak terkoneksi";
}
// untuk exel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=exel-modul7.xls");
// 

$tggl_pertama = isset($_GET["tgglAwal"]) ? $_GET["tgglAwal"] : "";
$tggl_terakhir = isset($_GET["tgglAkhir"]) ? $_GET["tgglAkhir"] : "";

$tggl_sql = mysqli_query($connection, "SELECT * FROM transaksi WHERE waktu_transaksi BETWEEN '$tggl_pertama' AND '$tggl_terakhir'");
// check kunci
if (!$tggl_sql) {
    echo "ini Error : " . mysqli_error($connection);
    exit;
}
$total = $tanggal = [];

while ($row = mysqli_fetch_assoc($tggl_sql)) {
    $total[] = $row["total"];
    $tanggal[] = $row["waktu_transaksi"];
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Batang dengan Chart.js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <style>
        .table-all{
		font-size: 13px;
		height:30px;
		border: 1px solid #3c3c3c;
		padding: 2px 8px;

	}
    </style>
</head>

<body>
    <!-- <a href="filter.php"> <button> Kembali</button> </a> -->
    <!-- <button onclick="window.print()">Cetak</button> -->
    <!-- <a href="exel.php?tgglAwal=<?= $tggl_pertama ?>&tgglAkhir=<?= $tggl_terakhir ?>"> <button> Cetak Excel</button> </a> -->
    <h1>Rekap Laporan transaksi</h1>

    <table border="2" cellspacing="0" class="table-all">
        <thead >
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </thead >
        <?php
        $no = 1;
        for ($i = 0; $i < count($tanggal); $i++) {
        ?>
            <tr >
                <td ><?= $no ?></td>
                <td><?= $total[$i] ?></td>
                <td><?= $tanggal[$i] ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </table>

    <table class="table table-striped table-hover" border='1'>
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td>
                <?php
                $sql_pelanggan = mysqli_query($connection, "SELECT DISTINCT pelanggan_id FROM `transaksi` WHERE waktu_transaksi BETWEEN '$tggl_pertama' AND '$tggl_terakhir';");
                $jumlah_data = mysqli_num_rows($sql_pelanggan);
                echo $jumlah_data;
                ?>
            </td>
            <td>
                <?php
                $sql_total = mysqli_query($connection, "SELECT SUM(total) as sql_total FROM transaksi WHERE waktu_transaksi BETWEEN '$tggl_pertama' AND '$tggl_terakhir';");
                $row_total = mysqli_fetch_assoc($sql_total);
                echo $row_total["sql_total"];
                ?>
            </td>
        </tr>
    </table>
</body>

</html>
