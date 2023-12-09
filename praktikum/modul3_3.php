<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modul 3</title>
</head>
<body>
    <?php
        //skrip 3
        $height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170"); 
        echo "Andy is " . $height['Andy'] . " cm tall.<br>";

        // 6.menambahkan 5 data baru array $height
        $height["nadhif"]="170";
        $height["ronggo"]="175";
        $height["agus"]="180";
        $height["febri"]="185";
        $height["alivian"]="190";

        // indeks terakhir dari array height
        $indeksTerakhir=end($height);
        echo "Nilai indeks Terakhir = $indeksTerakhir <br>";
        // 7.menghapus satu data dari height
        unset($height["alivian"]);

        // menampilkan indeks terakhir setelah penghapusan
        $indeksTerakhir=end($height);
        echo "Nilai indeks terakhir stlh dihapus dari height= $indeksTerakhir <br>";
        
        // 8.membuat array weight
        $weight=array(
            "budi"=>"150",
            "gading"=>"155",
            "steven"=>"160"
        );

        // menampilkan data kedua dari weight
        $kedua=array_values($weight)[1];
        echo "Tampilkan data kedua array weight = ".$kedua;
        echo"<hr>";//garis batas
    
    ?>
</body>
</html>