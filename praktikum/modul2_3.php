<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modul 2_3</title>
</head>
<body>
    <?php
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>Nama Komputer</th>";
    echo "<th>RAM</th>";
    echo "<th>OS</th>";
    echo "<th>Prosesor</th>";
    echo "<th>Storage</th>";
    echo "<th>Kondisi</th>";
    echo "</tr>";

    for ($i = 1, $namaKomputer = 2; $i <= 10; $i++, $namaKomputer += 2) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>Client " . $namaKomputer . "</td>";
        
        if ($namaKomputer==10){
            echo "<td>4GB</td>";
        }else{
            echo "<td>8GB</td>";
        }
        if ($namaKomputer == 10) {
            echo "<td>Windows 7 Home Basic 64 Bit ISO</td>";
            echo "<td>Core 2 Duo</td>";
            echo "<td>HDD 256GB</td>";
            echo "<td>Tidak Layak</td>";
        } else {
            echo "<td>Windows 10 Home Single Language</td>";
            echo "<td>8th Generation Intel Core i5</td>";
            // echo "<td>HDD 1TB</td>";
            if ($namaKomputer == 4 || $namaKomputer == 8) {
                echo "<td>Failure</td>";
            } else {
                echo "<td>HDD 1TB</td>";
            }

            if ($namaKomputer == 4 || $namaKomputer == 8) {
                echo "<td>Tidak Aktif</td>";
            } else {
                echo "<td>Aktif</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>