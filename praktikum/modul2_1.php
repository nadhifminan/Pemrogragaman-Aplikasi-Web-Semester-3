<?php
function isPrima($bilangan){
    $prima = $bilangan;
    $count = 0;

    for ($i = 1; $i <= $prima; $i++){
        $sisa = $prima % $i;
        if ($sisa == 0) {
            $count++;
        }
    }
    if ($count == 2) {
        return 'prima';
    } else {
        echo ' ';
    }
}

$angka = 10;

if ($angka % 2 == 0) {
    echo "$angka adalah bilangan genap";
} else {
    echo "$angka adalah bilangan ganjil";
    if (isPrima($angka)){
        echo " Prima.";
    }
}
?>