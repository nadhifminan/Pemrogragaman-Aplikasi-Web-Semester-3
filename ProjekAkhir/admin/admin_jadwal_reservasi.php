<?php
    session_start();
    include "action/act_cek_admin.php";
    include 'action/koneksi.php';

    $from_date = $to_date = $status = "";
    $where_clause = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $from_date = $_POST["from_date"];
        $to_date = $_POST["to_date"];
        $status = $_POST["status"];

        // Membuat klausa WHERE berdasarkan filter
        if ($status != "") {
            $where_clause = "WHERE status='$status'";
        }

        if ($from_date != "" && $to_date != "") {
            $where_clause .= ($where_clause == "") ? "WHERE" : " AND";
            $where_clause .= " tanggal BETWEEN '$from_date' AND '$to_date'";
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bengkel.css">
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <title>Bengkel Ku</title>
</head>

<body>

<nav class="uk-navbar-container" style="background-color:rgb(30,135,240);" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="admin_index.php" style="color:white; padding:30px; font-size: 40px;font-family:rockwell;">Bengkel Ku</a></li>
            <?php
                if(empty($_SESSION["username_adm"])){
                } elseif(isset($_SESSION["username_adm"])){
                    echo "<li><a href='admin_jadwal_reservasi.php' style='color:white'>Jadwal Reservasi</a></li>";
                    echo "<li><a href='admin_block_user.php' style='color:white;'>Block User</a></li>";
                    echo "<li><a href='admin_jumlah.php' style='color:white;'>Lihat Rekapan Jumlah</a></li>";
                }
            ?>
        </ul>
    </div>
    
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li>
                <?php 
                    if(empty($_SESSION["username_adm"])){
                        echo "<a href='#'' class='uk-icon-link uk-margin-small-left' uk-icon='user' style='color:white; padding-right:80px;'>Login</a>";
                    } elseif(isset($_SESSION["username_adm"])){
                        $akun = $_SESSION["username_adm"];
                        echo "<a href='#' class='uk-icon-link uk-margin-small-left' uk-icon='user' style='color:white; padding-right:80px;'>Hai, $akun</a>";
                    }
                ?>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <?php
                            if(empty($_SESSION["username_adm"])){
                            } elseif(isset($_SESSION["username_adm"])){
                                echo "<li class='uk-active'><a href='action/act_logout_admin.php'>Keluar</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="uk-container" style="padding-top:25px;">
    <?php
        include "action/act_alert_admin.php";
    ?>
    <h2>Status Reservasi</h2>
    <div class="uk-container">
        <form class="uk-form-stacked" action="#" method="POST" autocomplete="off">
            <div class="uk-grid uk-margin">
                <div class="uk-width-1-2">
                    <label class="uk-form-label" for="from_date">Dari Tanggal:</label>
                    <input class="uk-input" type="date" name="from_date" id="from_date" value="<?php echo $from_date; ?>" required>
                </div>
                <div class="uk-width-1-2">
                    <label class="uk-form-label" for="to_date">Hingga Tanggal:</label>
                    <input class="uk-input" type="date" name="to_date" id="to_date" value="<?php echo $to_date; ?>" required>
                </div>
            </div>
            <div class="uk-form-controls uk-margin">
                Status Reservasi:
                <select class="uk-select uk-form-width-small" id="form-stacked-select" name="status" required>
                    <option></option>
                    <option <?php echo ($status == 'Belum') ? 'selected' : ''; ?>>Belum</option>
                    <option <?php echo ($status == 'Proses') ? 'selected' : ''; ?>>Proses</option>
                    <option <?php echo ($status == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                    <option <?php echo ($status == 'Batal') ? 'selected' : ''; ?>>Batal</option>
                </select>
                <button class="uk-button uk-button-primary" type="submit" name="button">Cari</button>
                <button href="#" onclick="printChart()" class="uk-button uk-button-primary">Print Data</button>
            </div>
        </form>

        <table class="uk-table uk-table-responsive uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th><center>Kode Transaksi</center></th>
                    <th><center>Tanggal</center></th>
                    <th><center>Waktu</center></th>
                    <th><center>Username</center></th>
                    <th><center>Nomor Polisi</center></th>
                    <th><center>Status</center></th>
                    <th><center>Aksi</center></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Query untuk menampilkan data dari tabel
                    $query = "SELECT * FROM transaksi
                              INNER JOIN jadwal ON transaksi.kode_jadwal = jadwal.kode_jadwal
                              $where_clause
                              ORDER BY tanggal, waktu, kode_transaksi ASC";
                    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

                    foreach ($data as $baris) { ?>
                        <tr>
                            <td><center><a href="admin_transaksi_page.php?kode_transaksi=<?php echo $baris['kode_transaksi']?>"><?php echo $baris['kode_transaksi']?></center></td>
                            <td><center><?php echo $baris['tanggal']?></center></td>
                            <td><center><?php echo $baris['waktu']?></center></td>
                            <td><center><?php echo $baris['username']?></center></td>
                            <td><center><?php echo $baris['no_polisi']?></center></td>
                            <td><center><?php echo $baris['status']?></center></td>
                            <td><center>
                                <a class="uk-button uk-button-danger" href="action/act_delete_status_reservasi_admin.php?kode_transaksi=<?php echo $baris['kode_transaksi']?>">Hapus</a>
                            </center></td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<script>
        function printChart() {
            window.print();
        }
    </script>
</body>
</html>
