<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // skrip 2
        $fruits = array("Avocado", "Blueberry", "Cherry"); 
         // menambah 5 data
         for ($i=0 ; $i<1;$i++){
            $fruits[]="nangka";
            $fruits[]="manggis";
            $fruits[]="Delima";
            $fruits[]="Jambu Klutuk";
            $fruits[]="matoa";
        }
        $arrlength = count($fruits);
        
        
        for($x = 0; $x < $arrlength; $x++) { 
            echo $fruits[$x];
            echo "<br>"; 
        } 
        

        // 5.buat array vegies
        $vegies=array("tomat","cambah","cabe");
        $arrlength=count($vegies);
        // tampilkan menggunakan for modifikasi
        for($x = 0; $x < $arrlength; $x++) { 
            echo $vegies[$x];
            echo "<br>"; 
        } 

        echo"<hr>";//garis batas
        
    ?>
</body>
</html>