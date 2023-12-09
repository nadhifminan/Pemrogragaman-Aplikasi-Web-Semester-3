<?php
function validateForm($formData) {
    $errors = array();

    $nama = $formData["nama"];
    $email = $formData["email"];

    // Validasi nama (contoh: tidak boleh kosong)
    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }

    // Validasi email (contoh: harus sesuai format email)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    return $errors;
}
?>
