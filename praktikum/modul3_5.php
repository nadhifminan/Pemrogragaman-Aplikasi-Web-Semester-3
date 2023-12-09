<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $students = array ( 
            array("Alex","220401","0812345678"), 
            array("Bianca","220402","0812345687"), 
            array("Candice","220403","0812345665"), 
        );
        // menambahkan 5 data baru
        $students[] = array("Nadhif","22040311", "0812345005");
        $students[] = array("roni", "22040322", "0812345111");
        $students[] = array("rino", "22040333", "0812345222");
        $students[] = array("rena", "22040344", "0812345333");
        $students[] = array("dika", "22040355", "0812345444");

        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>';

        for ($row = 0; $row < count($students); $row++) {
            echo "<tr>";
            for ($col = 0; $col < 3; $col++) {
                echo "<td>" . $students[$row][$col] . "</td>";
            }
            echo "</tr>";
}

echo '</table>';
    ?>
</body>
</html>