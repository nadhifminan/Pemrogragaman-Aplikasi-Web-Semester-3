<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pertemuan 1</title>
</head>
<body>
    <?php 
        $nama =  "Nadhif";
        $nama2 =  " Jum'at";

        // perbedaan titik dua dan satu
        $angka=100;
        echo "ini angka $angka<br>";
        echo 'ini angka $angka<br>';

        // Function
        function penjumlahan($angka1,$angka2){
            $jumlah=$angka1+$angka2;
            echo $jumlah;
        }
        echo penjumlahan(10,3);echo"<br>";

        // butalah fungsi menghitung rumus segitiga alas 6 tinggi 10

        function luasSegitiga($alas,$tinggi){
            $total= ($alas*$tinggi)/2;
            return $total;
        }
        echo luasSegitiga(6,10);echo "<br>";

        // fungsi bawaan php
        $kata = "pengembangan Aplikasi web";
        echo strlen($kata);echo "<br>";
        echo str_word_count($kata); echo " <br>";

        // soal2
        $kata1 = "pengembangan";
        $kata2 = "aplikasi";
        $kata3 = "web";

        echo "$kata1$kata2$kata3 <br>";
        echo "pengembanganaplikasiweb";

    ?>
    <h1>Selamat datang <?php echo $nama ;echo $nama2 ?></h1>
</body>
</html>