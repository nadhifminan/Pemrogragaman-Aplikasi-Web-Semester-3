<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "penjualan");
    $query = "SELECT * FROM pembayaran";
    $hasil = mysqli_query($koneksi, $query);
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
        var labels = [];
        var totalData = [];

        <?php 
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "labels.push('" . $row['waktu_bayar'] . "');";
                echo "totalData.push('" . $row['total'] . "');";
            }
        ?>

        var data = {
            labels: labels,
            datasets: [{
                label: 'Total Pembayaran',
                data: totalData,
                backgroundColor: 'blue'
            }]
        };

        // Konfigurasi opsi grafik
        var options = {
            scales: {
                x: {
                    type: 'linear', // Gunakan skala linear untuk sumbu x (tanggal)
                    position: 'bottom'
                },
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
        <a href="#" onclick="printChart()" class="btn btn-primary mb-3">Print Data</a>
        <a href="exel.php" class="btn btn-primary mb-3">Exel Data</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Total</th>
                    <th>waktu</th>
                </tr>
            </thead>
            <?php 
                $no = 1;
                $hasil = mysqli_query($koneksi, $query); // Reset hasil query
                while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['total']; ?></td>
                    <td><?= $row['waktu_bayar']; ?></td>
                </tr>
            
            <?php } ?>
        </table>
    </div>
    <script>
        function printChart() {
            window.print();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
