<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 1</title>
</head>
<body>
    <h1>Hitung Jumlah Huruf dan Kata</h1>
    <?php 
    $kalimat = "Teknik Informatika itu prodi paling santuy";
    $kata = str_word_count($kalimat);
    $huruf = strlen($kalimat);
    // echo $huruf;
    $jumlah = $kata * $huruf;
    echo "Hasil perkalian jumlah huruf dan jumlah kata : $jumlah"
    ?>
</body>
</html>