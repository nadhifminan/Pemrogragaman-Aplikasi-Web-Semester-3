<?php
function isPrima($bilangan){
    if ($bilangan <= 1) {
        return false;
    }
    if ($bilangan == 2) {
        return true;
    }
    if ($bilangan % 2 == 0) {
        return false;
    }
    for ($i = 3; $i * $i <= $bilangan; $i += 2) {
        if ($bilangan % $i == 0) {
            return false;
        }
    }
    return true;
}

$angka = 10;

if ($angka % 2 == 0) {
    echo "$angka adalah bilangan genap";
} else {
    echo "$angka adalah bilangan ganjil";
    if (isPrima($angka)) {
        echo " Prima";
    }
}
?>
