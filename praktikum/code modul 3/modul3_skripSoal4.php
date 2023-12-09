<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // skrip 4
        $height =array("Andy"=>"176","barry"=>"165","Charlie"=>"170");
        // 9.menambahkan 5 data baru
        $height["nadhif"]="170";
        $height["ronggo"]="175";
        $height["agus"]="180";
        $height["febri"]="185";
        $height["alivian"]="190";
        
    
        foreach($height as $x =>$x_value){
            echo "Key=".$x."Value= ".$x_value;
            echo "<br>";
        }
echo "<hr>";
        // 10.membuat array baru weight
        $weight=array(
            "dino"=>"150",
            "dani"=>"155",
            "dina"=>"160"
        );
        $keys = array_keys($weight);

        for ($i = 0; $i < count($weight); $i++) {
            $x = $keys[$i];
            $x_value = $weight[$x];
            echo "Key= " . $x . " Value= " . $x_value;
            echo "<br>";
        }
    ?>
</body>
</html>