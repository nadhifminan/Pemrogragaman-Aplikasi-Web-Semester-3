<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 1</title>
</head>
<body>
    <h1>Manipulasi String</h1>
    <?php
    $nama = "nadhif fajrul minan";
    echo "Nama : $nama <br>";
    $kapital = strtoupper($nama);
    echo "Nama Kapital: $kapital <br>";
    $besar = ucwords($nama);
    echo "Nama Besar: $besar <br>";
    ?>    
</body>
</html>