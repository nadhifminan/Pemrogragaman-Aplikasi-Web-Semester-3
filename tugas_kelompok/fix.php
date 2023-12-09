<?php 

$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
$tanggal = date("Y-m-d");

if(isset($_POST["simpan"])) {
    $total_pinjam = $_POST["total"];
    $keterangan = $_POST["keterangan"];
    $id_anggota = 1;
    $id_buku = $_POST["buku"];
    $harga = $_POST["harga"];

    $query_pinjaman = "INSERT INTO peminjaman VALUES (NULL, '$tanggal', $total_pinjam, '$keterangan', $id_anggota)";
    mysqli_query($koneksi, $query_pinjaman);
    
    $query_id_pinjam = mysqli_query($koneksi, "SELECT id_pinjam FROM peminjaman WHERE id_anggota = $id_anggota");
    $id_pinjam = mysqli_fetch_assoc($query_id_pinjam)["id_pinjam"];
    $query_detil = "INSERT INTO detail_pinjam VALUES ($id_pinjam, $id_buku, $harga)";
    mysqli_query($koneksi, $query_detil);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: fix.php");
    exit();
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: <?= $tanggal; ?></td>
            </tr>
        </table>
        <button type="submit" name="anggota">Simpan</button>
    </form>

    <hr>

    <form method="post">
        <table>
            <tr>
                <td>Buku</td>
                <td>Total</td>
                <td>Harga</td>
                <td>Keterangan</td>
            </tr>
            <?php
                // $query = mysqli_query($koneksi, "SELECT * FROM detail_pinjam JOIN peminjaman ON detail_pinjam.id_pinjam = peminjaman.id_pinjam JOIN buku WHERE detail_pinjam.id_buku = buku.id_buku");
                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN detail_pinjam ON peminjaman.id_pinjam = detail_pinjam.id_pinjam INNER JOIN buku ON detail_pinjam.id_buku = buku.id_buku");
                while($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                <td><?= $data['judul'];?></td>
                <td><?= $data['total_pinjam'];?></td>
                <td><?= $data['harga_sewa'];?></td>
                <td><?= $data['keterangan'];?></td>
                </tr>
            <?php } ?>
                <td>
                    <select name="buku">
                        <option>Pilih Buku</option>
                        <?php 
                            $query_buku = mysqli_query($koneksi, "SELECT * FROM buku");
                            while($books = mysqli_fetch_array($query_buku)) {
                        ?>
                        <option value="<?= $books['id_buku']; ?>"><?= $books['judul']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="number" name="total">
                </td>
                <td>
                    <input type="number" name="harga">
                </td>
                <td>
                    <input type="text" name="keterangan">
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>

</body>
</html>