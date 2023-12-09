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
    
 ?> 

</body>
</html>