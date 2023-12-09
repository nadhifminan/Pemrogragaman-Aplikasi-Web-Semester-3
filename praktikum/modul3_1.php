<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modul 3_1</title>
</head>
<body>
<?php 
    //skrip 1
    $fruits = array("Avocado", "Blueberry", "Cherry");  
    echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br>"; 
    //1.menambahkan 5 data baru 
    $fruits[]="Melon";
    $fruits[]="Sirsat";
    $fruits[]="Nangka";
    $fruits[]="Apel";
    $fruits[]="Juet";
    //menampilkan indeks tertinggi
    $tertinggi=count($fruits)-1;
    echo "data yang berada di indeks paling tinggi = $fruits[$tertinggi]<br>";
    //berapa indeks tertinggi
    echo "indeks tertinggi array = ".$tertinggi."<br>";

    //2.Hapus data tertentu dari array
    unset($fruits[2]);

    //indeks tertinggi setelah dihapus
    echo "indeks tertinggi setelah dihapus = ".count($fruits)-1 ."<br>";

    //3.Buat array baru dengan nama Vegies
    $vegies=array("bayem","Gambas","Terong");
    //tampilkan seluruh data dari vegies
    for ($i=0;$i<count($vegies);$i++){
        echo $vegies[$i]."<br>";
    }
    echo"<hr>";//garis batas
    // skrip 2
     
    $fruits = array("Avocado", "Blueberry", "Cherry"); 
    // menambah 5 data
    $fruits[]="nangka";
    $fruits[]="manggis";
    $fruits[]="Delima";
    $fruits[]="Jambu Klutuk";
    $fruits[]="matoa";
    
    $arrlength = count($fruits);
    
    
    for($x = 0; $x < $arrlength; $x++) { 
    echo $fruits[$x];
    echo "<br>"; 
    } 
    $jumlah=count($fruits)-1;
    echo "total data : $jumlah";
    echo"<hr>";//garis batas
    //skrip 3
    $height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170"); 
    echo "Andy is " . $height['Andy'] . " cm tall.";

    echo"<hr>";//garis batas
    // skrip 4
    $height =array("Andy"=>"176","barry"=>"165","Charlie"=>"170");
    foreach($height as $x =>$x_value){
        echo "Key=".$x."Value=".$x_value;
        echo "<br>";
    }

    echo"<hr>";//garis batas
    // skrip 5
    $students = array ( 
        array("Alex","220401","0812345678"), 
        array("Bianca","220402","0812345687"), 
        array("Candice","220403","0812345665"), 
    );
    for ($row = 0; $row < 3; $row++) { 
        echo "<p><b>Row number $row</b></p>"; 
        echo "<ul>"; 
        for ($col = 0; $col < 3; $col++) { 
            echo "<li>".$students[$row][$col]."</li>"; 
        } 
        echo "</ul>"; 
     } 
 ?> 

</body>
</html>