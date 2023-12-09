<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "penjualan");
    $query = "SELECT * FROM pelanggan";
    $hasil = mysqli_query($koneksi, $query);
    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=laporan_pelanggan.xls");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="myChart" width="400" height="400"></canvas>
    <script>
        // Membuat data grafik
        var data = {
            labels: ["Product A", "Product B"],
            datasets: [{
                label: "Pelanggan",
                data: [12, 19],
                backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(255, 99, 132, 0.2)"],
                borderColor: ["rgba(75, 192, 192, 1)", "rgba(255, 99, 132, 1)"],
                borderWidth: 1
            }]
        };

        // Konfigurasi opsi grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Membuat grafik
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
    <div class="container mt-4">
    <a href="tambah.php" class="btn btn-primary mb-3">Print Data</a>
    <a href="tambah.php" class="btn btn-primary mb-3">Exel Data</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis kelamin</th>
                </tr>
            </thead>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
