<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 2 1</title>
</head>
<body>
    <?php
    $saldoRekA=100000;
    $saldoRekB=15000;
    
    function dibelikan($saldo){
        echo "<h2>Total Saldo saya zadalah $saldo</h2>";
        $harga_melon=5000;
        if (($saldo-$harga_melon)>=$harga_melon){
            echo "Saya membeli 1 melon dengan harga $harga_melon sisa saldo saya adalah ";echo $saldo=$saldo-$harga_melon;echo"<br>";
        }else{
            echo "Saldo tidak cukup,saldo Anda adalah :".abs($saldo=$saldo-$harga_melon)."<br>";
        }
        
        $harga_jeruk=10000;
        if (($saldo-$harga_jeruk)>=0){//10000-10000
            echo "Saya membeli 1 jeruk dengan harga $harga_jeruk sisa saldo saya adalah ";echo $saldo=$saldo-$harga_jeruk;echo"<br>";
        }else{
            echo "Saldo tidak cukup,saldo Anda adalah :".abs($saldo=$saldo-$harga_jeruk)."<br>";
        }
        
        $harga_semangkah=15000;
        if (($saldo-$harga_semangkah)>=$harga_semangkah=15000){
            echo "Saya membeli 1 semangkah dengan harga $harga_semangkah sisa saldo saya adalah ";echo $saldo=$saldo-$harga_semangkah;echo"<br>";
        }else{
            echo "Saldo tidak cukup,saldo Anda adalah :".abs($saldo=$saldo-$harga_semangkah)."<br>";
        }
        echo "<br>";
        $total=($harga_melon+$harga_jeruk+$harga_semangkah);
        if ($saldo>0){
            echo "<b>Jumlah total buah yang sudah terbeli yaitu = $total dan uang sisa adalah = $saldo</b>";
        } 
    }
    echo dibelikan($saldoRekA);
    ?>
</body>
</html>