
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
        tggl order <input type="date" name="tgl_order" ><br>
        Deskripsi<br>
        <input type="text" name="deskripsi"><br>

        nama pemesan <br>
        <textarea name="nama_pemesan"></textarea><br>

        <input type="submit" name="submit" value="submit">
        <input type="reset" value="Batal">
    </form>
</body>
</html>