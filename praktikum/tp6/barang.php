<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "supermarket";
$koneksi = mysqli_connect($host, $username, $password, $database);

if ($koneksi) {
    // echo "Koneksi berhasil";
} else {
    // echo "Koneksi tidak berhasil";
}
if (isset($_POST["submit"])) {
    $kode_barang = $_POST["kode_barang"];
    $nama_barang = $_POST["nama_barang"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $supplier_id = $_POST["supplier_id"];

    $sql = "INSERT INTO barang VALUES(NULL, '$kode_barang', '$nama_barang', '$harga', '$stok', '$supplier_id')";
    if (mysqli_query($koneksi, $sql)) {
        echo "Berhasil";
        // header("Location: crud.php");
    } else {
        echo "ERROR: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tabel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Tambah Data Barang</h1>
        <div class="form-container">
            <form action="data.php" method="POST">
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" name="kode_barang">
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok">
                </div>
                <div class="form-group">
                    <label for="supplier_id">Supplier ID</label>
                    <select class="form-control" id="supplier_id" name="supplier_id">
                        <?php
                        $sql_supplier = "SELECT id FROM supplier";
                        $sql_result = mysqli_query($koneksi, $sql_supplier);

                        while ($row = mysqli_fetch_assoc($sql_result)) {
                            echo "<option value='{$row['id']}'>{$row['id']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <input type="reset" class="btn btn-danger" value="Batal">
            </form>
        </div>
    </div>
</body>
</html>
