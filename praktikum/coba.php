<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

// Menambahkan lima data baru ke dalam array menggunakan perulangan for
for ($i = 0; $i < 5; $i++) {
    $fruits[] = "New Fruit " . ($i + 1);
}

// Menampilkan isi array setelah penambahan data baru
print_r($fruits);

echo "<hr>";
for ($i = 0; $i < 5; $i++) {
    echo $fruits[$i];
    echo "<br>";
}
?>
