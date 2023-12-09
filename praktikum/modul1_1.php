<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 1 Kerucut</title>
</head>
<body>
    <h1>Hitung Volume Kerucut</h1>
    <img src="kerucut.png"><br>
    <?php
        $r = 7;
        $t = 18;
        $phi = 22/7;
        $volume = 1/3 *$phi * $r * $r * $t ;

        echo "Jari -jari Kerucut(r) : $r cm<br>";
        echo "Tinggi Kerucut (t) : $t cm<br>";
        echo "Volume Kerucut : $volume cm<sup>3</sup><br>";
    ?>
</body>
</html>