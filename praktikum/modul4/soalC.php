<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi</title>
</head>
<body>
    <form method="GET" action="">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="text" id="tanggal" name="tanggal" required><br>

        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $nama = $_GET["nama"];
        $email = $_GET["email"];
        $tanggal = $_GET["tanggal"];

        // Validasi  nama
        if (!empty($nama) && is_string($nama)) {
            $nama = strtoupper($nama);
            echo $nama ;
        } else {
            echo "Nama Lengkap harus diisi dengan string.<br>";
        }
        
        // Validasi email
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Email berarti valid
        } else {
            echo "Email harus diisi dengan format yang benar.<br>";
        }

        // Validasi tanggal
        if (!empty($tanggal)) {
            $tanggalFormat = DateTime::createFromFormat('Y-m-d', $tanggal);
            if ($tanggalFormat && $tanggalFormat->format('Y-m-d') == $tanggal) {
                // Tanggal valid
            } else {
                echo "isi dengan format (YYYY-MM-DD).<br>";
            }
        } else {
            echo "Tanggal harus diisi.<br>";
        }
    }
?>

</body>
</html>
