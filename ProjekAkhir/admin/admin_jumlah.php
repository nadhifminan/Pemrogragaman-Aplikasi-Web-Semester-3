<?php
    session_start();
    include "action/act_cek_admin.php";    
    include "./action/koneksi.php";
    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    
    // Query untuk menghitung jumlah total user
    $query = "SELECT COUNT(nama) as total_pengguna FROM user";
    $result = $koneksi->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $totaluser = $row["total_pengguna"];
    } else {
        $totaluser = 0;
    }

    // Query untuk menghitung jumlah total motor
    $query = "SELECT COUNT(merk_motor) as total_motor FROM motor";
    $result = $koneksi->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $totalmotor = $row["total_motor"];
    } else {
        $totalmotor = 0;
    }

    // Query untuk menghitung jumlah total transaksi
    $query = "SELECT COUNT(kode_transaksi) as total_transaksi FROM transaksi";
    $result = $koneksi->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $totaltransaksi = $row["total_transaksi"]; // Menggunakan nama kolom yang benar
    } else {
        $totaltransaksi = 0;
    }


    // Tutup koneksi database
    $koneksi->close();   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bengkel.css">
	<script src="../js/uikit.min.js"></script>
	<script src="../js/uikit-icons.min.js"></script>
	<title>Bengkel Ku</title>
</head>
<style>
        body {
           
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }
    </style>

<body>

<nav class="uk-navbar-container" style="background-color:rgb(30,135,240);" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="admin_index.php" style="color:white; padding:30px; font-size: 40px;font-family:rockwell;">Bengkel Ku</a></li></li>
            <?php
                if(empty($_SESSION["username_adm"])){
                }elseif(isset($_SESSION["username_adm"])){
                    echo "<li><a href='admin_jadwal_reservasi.php' style='color:white'>Jadwal Reservasi</a></li>";
                    echo "<li><a href='admin_block_user.php' style='color:white;'>Block User</a></li>";
                    echo "<li><a href='admin_tambahantabel.php' style='color:white;'>lihat rekapan jumlah</a></li>";
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
                    }elseif(isset($_SESSION["username_adm"])){
                        $akun = $_SESSION["username_adm"];
                        echo "<a href='#' class='uk-icon-link uk-margin-small-left' uk-icon='user' style='color:white; padding-right:80px;'>Hai, $akun</a>";
                    }
                ?>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <?php
                            if(empty($_SESSION["username_adm"])){
                            }elseif(isset($_SESSION["username_adm"])){
                                echo "<li class='uk-active'><a href='action/act_logout_admin.php'>Keluar</a></li>";

                            }
                        ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
</table>
<div class="uk-container uk-margin-top">
<table class="table table-bordered table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Jumlah Motor</th>
            <th>Jumlah Transaksi</th>
            <th>Jumlah User</th>
        </tr>
    </thead>
        <tbody>
            <tr>
                <td><?php echo $totalmotor; ?></td>
                <td><?php echo $totaltransaksi; ?></td>
                <td><?php echo $totaluser; ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>