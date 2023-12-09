<?php
include 'validate.inc';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST["surname"];

    // Validasi surname 
    $errors = array();
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $surname)) {
        $errors[] = "Data surname harus berupa alfabet atau mengandung spasi, tanda hubung, atau apostrof.";
    }

    if (empty($errors)) {
        echo "surname yang dimasukkan sesuai dengan alfabet: $surname";
    } else {
        echo "Terjadi kesalahan:";
        foreach ($errors as $error) {
            echo "<br>$error";
        }
    }
}
?>
