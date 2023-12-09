<?php 
	include 'koneksi.php';

	if (isset($_POST['submit'])) {
		$id_transaksi = $_POST['id_transaksi'];
		$id_barang = $_POST['id_barang'];
		$harga = $_POST['harga'];
		$qty = $_POST['qty'];
		$total_harga = $harga * $qty;
		$sql_check = "SELECT * FROM transaksi_detail WHERE transaksi_id = '$id_transaksi'";
		$result = mysqli_query($koneksi, $sql_check);

		if (mysqli_num_rows($result) > 0) {
			$sql_update = "UPDATE transaksi_detail SET harga = '$harga', qty = '$qty' WHERE transaksi_id = '$id_transaksi'";
			if (mysqli_query($koneksi, $sql_update)) {
				$sql_update_total = "UPDATE transaksi SET total = (SELECT SUM(harga * qty) FROM transaksi_detail WHERE transaksi_id = '$id_transaksi') WHERE id = '$id_transaksi'";
				if (mysqli_query($koneksi, $sql_update_total)) {
					echo "<script>alert('Data berhasil diupdate dan total diperbarui');</script>";
				} else {
					echo "Error saat mengupdate";
				}
			} else {
				echo "Error saat mengupdate data transaksi_detail";
			}
		} else {
			$sql_insert = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ('$id_transaksi', '$id_barang','$harga', '$qty')";
			if (mysqli_query($koneksi, $sql_insert)) {
				$sql_update_total = "UPDATE transaksi SET total = (SELECT SUM(harga * qty) FROM transaksi_detail WHERE transaksi_id = '$id_transaksi') WHERE id = '$id_transaksi'";
				if (mysqli_query($koneksi, $sql_update_total)) {
					echo "<script>alert('Data berhasil disimpan dan total diperbarui');</script>";
				} else {
					echo "Error saat mengupdate total";
				}
			} else {
				echo "Error saat menyimpan data transaksi_detail";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tugas Pratikum 6</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style type="text/css">
		.container {
			margin-top: 20px;
		}
		.form-group {
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Menambahkan Transaksi Detail</h1>
		<form method="POST">
		<div class="form-group">
    <label for="id_transaksi">Id Transaksi :</label>
    <select name="id_transaksi" class="form-control">
        <option>Pilih id transaksi</option>
        <?php
        	$sel = mysqli_query($koneksi, "SELECT * FROM `transaksi`");
        	while ($row = mysqli_fetch_array($sel)) {
        	    $id_transaksi = $row['id'];
        	    $waktu_transaksi = $row['waktu_transaksi'];
        	    echo '<option value="' . $id_transaksi . '">' . $id_transaksi . '</option>';
        	}
        ?>
    </select>
	</div>
	<div class="form-group">
    	<label for="id_barang">Id Barang :</label>
    	<select name="id_barang" class="form-control">
    	    <option>Pilih id barang</option>
    	    <?php
    	    $sel = mysqli_query($koneksi, "SELECT * FROM `barang`");
    	    while ($row = mysqli_fetch_array($sel)) {
    	        $id_barang = $row['id'];
    	        $nama_barang = $row['nama_barang'];
    	        echo '<option value="' . $id_barang . '">' . $id_barang . ' - ' . $nama_barang . '</option>';
    		}
    	?>
    </select>
		</div>
			<div class="form-group">
				<label for="harga">Harga :</label>
				<input type="text" name="harga" class="form-control">
			</div>
			<div class="form-group">
				<label for="qty">Qty :</label>
				<input type="text" name="qty" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="submit">Submit</button>
				<button class="btn btn-danger" type="reset" name="reset">Reset</button>
			</div>
		</form>
	</div>
</body>
</html>
