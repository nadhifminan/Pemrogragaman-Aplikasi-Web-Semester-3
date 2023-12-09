<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "penjualan";
$conn = mysqli_connect($host, $username, $password, $database);

if ($conn) {
    echo "koneksi berhasil";
} else {
    echo "tidak koneksi berhasil";
}

$tgglPertama = isset($_GET["tgglAwal"]) ? $_GET["tgglAwal"] : "";
$tgglTerakhir = isset($_GET["tgglAkhir"]) ? $_GET["tgglAkhir"] : "";
$tggl_sql = mysqli_query($conn, "SELECT * FROM transaksi WHERE waktu_transaksi BETWEEN '$tgglPertama' AND '$tgglTerakhir'");

if (!$tggl_sql) {
    echo "Error: " . mysqli_error($conn);
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
    <title>Modul 7 Grafik chart.js,exel,print</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <form action="" method="get" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input type="date" name="tgglAwal" class="form-control" value="<?= $tgglPertama ?>">
                </div>
                <div class="col-md-3">
                    <input type="date" name="tgglAkhir" class="form-control" value="<?= $tgglTerakhir ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Kalkulasi</button>
                </div>
            </div>
        </form>

        <a href="filter.php" class="btn btn-secondary mb-3">back</a>
        <button onclick="window.print()" class="btn btn-success mb-3">Print</button>
        <a href="exel.php?tgglAwal=<?= $tgglPertama ?>&tgglAkhir=<?= $tgglTerakhir ?>" class="btn btn-info mb-3">Cetak Excel</a>

        <div style="width: 600px;">
            <canvas id="myChart"></canvas>
        </div>

        <script>
            var ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php
                        for ($i = 0; $i < count($tanggal); $i++) {
                            echo "'";
                            echo $tanggal[$i];
                            echo "'";
                            if ($i == count($tanggal) - 1) {
                                break;
                            }
                            echo ",";
                        }
                        ?>
                    ],
                    datasets: [{
                        label: 'Penjualan',
                        data: [
                            <?php
                            for ($i = 0; $i < count($total); $i++) {
                                echo $total[$i];
                                if ($i == count($total) - 1) {
                                    break;
                                }
                                echo ",";
                            }
                            ?>
                        ],
                        backgroundColor: ["#1ec00a", "#ff6384", "#360a4b", "#645a14"],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <table class="table table-striped table-hover">
            <thead  class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                for ($i = 0; $i < count($tanggal); $i++) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $total[$i] ?></td>
                        <td><?= $tanggal[$i] ?></td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Jumlah</th>
                    <th>Jumlah Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql_pelanggan = mysqli_query($conn, "SELECT DISTINCT pelanggan_id FROM `transaksi` WHERE waktu_transaksi BETWEEN '$tgglPertama' AND '$tgglTerakhir';");
                        $jumlah_data = mysqli_num_rows($sql_pelanggan);
                        echo $jumlah_data;
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql_total = mysqli_query($conn, "SELECT SUM(total) as sql_total FROM transaksi WHERE waktu_transaksi BETWEEN '$tgglPertama' AND '$tgglTerakhir';");
                        $baris_total = mysqli_fetch_assoc($sql_total);
                        echo $baris_total["sql_total"];
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
