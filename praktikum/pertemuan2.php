<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2</title>
</head>
<body>
    <?php
    //operator dalam php
    $a=5;
    $b=6;
    $jumlah=$a+$b;
    echo $jumlah;


    //if jika mahasiswa umurnya >20 maka tampilkan output dewasa
    $riski=50;
    $mahasiswa=$riski;
    if ($mahasiswa>20){
        echo "Dewasa";
    }elseif($mahasiswa == 20) {
        echo "Remaja";
    }elseif($mahasiswa<20){
        echo "bocil";
    }
    //menggunakan switch
    $riski = 50;
    $mahasiswa = $riski;

    switch(true){
        case $mahasiswa>20:
            echo "dewasa";
            break;
        case $mahasiswa==20:
            echo "remaja";
            break;
        case $mahasiswa<20:
            echo "bocil";
            break;
    }
    
    


    //array
    $barang = ["Buku Tulis", "Penghapus", "Spidol"];
    //for
    for($i=0; $i < count($barang); $i++){
        echo $barang[$i]."<br>";
    }
    //foreeach
    foreach($barang as $item){
        echo $item."<br>";
        echo "<hr>";
    }

    //while
    $i=0;
    while($i<count($barang)){
        echo $barang[$i]."<br>";
        echo "<hr>";
        $i++;
    }
    ?>
</body>
</html>