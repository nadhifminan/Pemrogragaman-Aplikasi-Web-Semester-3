<?php
// Inisialisasi variabel error
$errors = array();
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah tombol submit ditekan
    if (isset($_POST["submit"])) {
        // Periksa apakah form diisi
        if (empty($_POST["nama"]) || empty($_POST["email"])) {
            $errors[] = "Apakah mengisi form?";
        } else {
            // Validasi form
            $errors = validateForm($_POST);

            if (count($errors) == 0) {
                // Tidak ada kesalahan, tampilkan pesan sukses
                $successMessage = "Form submitted successfully with no errors.";
            }
        }
    }
}

function validateForm($formData) {
    $errors = array();

    $nama = $formData["nama"];
    $email = $formData["email"];

    // Validasi nama 
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>
</head>
<body>
    <?php
    if (!empty($errors)) {
        // Jika terdapat kesalahan, tampilkan pesan error dan formulir kosong
        echo "<p>" . implode("<br>", $errors) . "</p>";
    }
    
    if (!empty($successMessage)) {
        // Jika sukses, tampilkan pesan sukses
        echo "<p>$successMessage</p>";
    }
    ?>

    <form method="POST" action="form.php">
        <!-- Isi formulir -->
        <label for="nama">Nama:</label>
        <input type="text" name="nama" placeholder="Nama">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email">
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
