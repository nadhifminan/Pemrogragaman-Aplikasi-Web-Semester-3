
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  table, th, td {
    border: 1px solid black;
  }

  th, td {
    padding: 8px;
    text-align: left;
  }

  select, input[type="text"], input[type="date"] {
    width: 100%;
    padding: 6px;
    box-sizing: border-box;
  }

  #add_item, #simpan {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
  }

  #add_item:hover, #simpan:hover {
    background-color: #45a049;
  }
</style>


<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan";
$koneksi = mysqli_connect($host, $username, $password, $database);

if (isset($_POST['submit'])) {
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $totalpinjam = $_POST['totalpinjam'];
    $keterangan = $_POST['keterangan'];
    $id_anggota = $_POST['id_anggota'];

    // Simpan data peminjaman
    $queryPeminjaman = "INSERT INTO peminjaman (tgl_pinjam, totalpinjam, keterangan, id_anggota) VALUES ('$tanggal_peminjaman', '$totalpinjam', '$keterangan', '$id_anggota')";
    $resultPeminjaman = mysqli_query($koneksi, $queryPeminjaman);

    if ($resultPeminjaman) {;

        // Dapatkan ID peminjaman yang baru saja dibuat
        $id_pinjaman = mysqli_insert_id($koneksi);

        // Simpan data detail_pinjam
        $item_codes = $_POST['item_code'];
        $item_prices = $_POST['item_price'];

        for ($i = 0; $i < count($item_codes); $i++) {
            $id_buku = $item_codes[$i];
            $harga_sewa = $item_prices[$i];

            $queryDetilPinjam = "INSERT INTO detail_pinjam (id_pinjam, id_buku, hargasewa) VALUES ('$id_pinjaman', '$id_buku', '$harga_sewa')";
            $resultDetilPinjam = mysqli_query($koneksi, $queryDetilPinjam);

            if (!$resultDetilPinjam) {
                echo "Gagal menyimpan data detail_pinjam: " . mysqli_error($koneksi);
            }
        }
    } else {
        echo "Gagal menyimpan data peminjaman: " . mysqli_error($koneksi);
    }
}
?>



<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <table>
    <tr>
      <td>Tanggal Peminjaman</td>
      <td>: <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"></td>
    </tr>
    <tr>
      <td>Total Pinjaman</td>
      <td>: <input type="text" name="totalpinjam" id="totalpinjam"></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>: <input type="text" name="keterangan" id="keterangan"></td>
    </tr>
    <tr>
      <td>ID Anggota</td>
      <td>:
        <select name="id_anggota" id="id_anggota">
          <option value="1">1. John Doe</option>
          <option value="2">2. Jane Smith</option>
          <option value="3">3. Alice Johnson</option>
          <option value="4">4. Bob Anderson</option>
          <option value="5">5. Eva Wilson</option>
        </select>
      </td>
    </tr>
  </table>
  <table id="item_table">
    <tr>
      <th>ID Buku</th>
      <th>Harga Sewa</th>
    </tr>
    <tr>
      <td>
        <select name="item_code[]" id="item_code">
          <option value="1">1. To Kill a Mockingbird</option>
          <option value="2">2. 1984</option>
          <option value="3">3. Pride and Prejudice</option>
          <option value="4">4. The Great Gatsby</option>
          <option value="5">5. Moby-Dick</option>
        </select>
      </td>
      <td><input type="text" name="item_price[]" id="item_price"></td>
    </tr>
  </table>
  <button type="button" id="add_item">Tambah Item</button>
  <input type="submit" name="submit" value="Simpan" id="simpan">
</form>
<script>
  document.getElementById("add_item").addEventListener("click", function () {
    var table = document.getElementById("item_table");
    var newRow = table.insertRow(table.rows.length - 1);

    var idBukuCell = newRow.insertCell(0);
    var hargaSewaCell = newRow.insertCell(1);

    idBukuCell.innerHTML = '<select name="item_code[]" id="item_code"> ' +
      '<option value="1">1. To Kill a Mockingbird</option> ' +
      '<option value="2">2. 1984</option> ' +
      '<option value="3">3. Pride and Prejudice</option> ' +
      '<option value="4">4. The Great Gatsby</option> ' +
      '<option value="5">5. Moby-Dick</option> ' +
      '</select>';
    hargaSewaCell.innerHTML = '<input type="text" name="item_price[]" id="item_price">';
  });
</script>