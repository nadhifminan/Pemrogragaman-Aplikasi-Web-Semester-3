
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah siswa</h1>
    <!-- get keluar alamat yg diinputkan diatas web dan post tidak -->
    <form method="get" action='simpansiswa.php'>
        Nama <input type="text" name="nama" ><br>
        Jenis Kelamin <br>
        <input type="radio" name="jk" value="Laki-laki">Laki-Laki <br>
        <input type="radio" name="jk" value="Perempuan" >Perempuan <br>

        Alamat <br>
        <textarea name="alamat"></textarea><br>

        <input type="submit" name="submit" value="submit">
        <input type="reset" value="Batal">
    </form>
</body>
</html>