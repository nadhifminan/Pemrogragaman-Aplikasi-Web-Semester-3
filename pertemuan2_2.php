<?php
    $a=5;
    $b=4;
    $c=1.2;
    echo ($a+$b) * $c ,"<br>";
    echo ($a-$b) ,"<br>";
    echo ($a*$b) ,"<br>";
    echo ($a/$b) ,"<br>";
    echo ($a%$b) ,"<br>";
    echo ($a++) ,"<br>";
    echo ($a--) ,"<br>";
    echo "pembatas <br>";
    echo $a ,"<br>";
    echo ++$a ,"<br>";// menambahkan angka satu
    echo $a, "<br>";

    // merubah tipe data atau mengkonversi dari string ke numerik atau sebaliknya

    // string
    $strAngka = "32";
    // integer
    $angka = (int) $strAngka;
    
    // float
    $floatAngka = (float) $strAngka;
    echo $strAngka;
?>