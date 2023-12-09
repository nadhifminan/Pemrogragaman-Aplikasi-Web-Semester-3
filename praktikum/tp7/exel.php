<?php
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan.xls");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Excel</title>
</head>
<body>
    <h1>Data Laporan</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Usia</th>
                <th>Kabupaten</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nadhif</td>
                <td>19</td>
                <td>Pati,Jawa Tengah</td>
            </tr>
            <tr>
                <td>Wildan</td>
                <td>28</td>
                <td>Lamongan,Jawa Timur</td>
            </tr>
            <tr>
                <td>Pian</td>
                <td>40</td>
                <td>Jombang</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
