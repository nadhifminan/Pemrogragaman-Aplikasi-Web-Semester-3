<?php
require_once('../config.php');

if (isset($_POST['submit'])) {
  $id_rm = $_POST['id_rm'];
  $id_pasien = $_POST['id_pasien'];
  $keluhan = $_POST['keluhan'];
  $id_dokter = $_POST['id_dokter'];
  $diagnosa = $_POST['diagnosa'];
  $id_poli = $_POST['id_poli'];
  $tgl_periksa = $_POST['tgl_periksa'];

  $query = "INSERT INTO rekammedis VALUES ('$id_rm','$id_pasien','$keluhan','$id_dokter','$diagnosa','$id_poli','$tgl_periksa')";
  $result = mysqli_query($mysqli, $query);
} else {
  $id_rm = "";
  $id_pasien = "";
  $keluhan = "";
  $id_dokter = "";
  $diagnosa = "";
  $id_poli = "";
  $tgl_periksa = "";
}


?>






<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Tambah Data</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include_once('component/sidebar.php') ?>

      <!-- Layout container -->
      <div class="layout-page">
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tambah/</span> Data Rekammedis</h4>

            <!-- Basic Layout & Basic with Icons -->
            <form action="tambahdata.php" method="post">

              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Data Rekammedis</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="id_rm">Id rekammedis</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_rm" name="id_rm" />
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="id_pasien">Pasien</label>
                            <div class="col-sm-10">
                                <select name="id_pasien" id="id_pasien" class="form-select">
                                    <?php
                                    $query = "SELECT id_pasien, nama_pasien FROM pasien";
                                    $result = mysqli_query($mysqli, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['id_pasien'] . '">' . $row['nama_pasien'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="keluhan">Keluhan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="keluhan" name="keluhan" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="id_dokter">Dokter</label>
                          <div class="col-sm-10">
                            <select name="id_dokter" id="id_dokter" class="form-select">
                            <?php
                              $query = "SELECT id_dokter, nama_dokter FROM dokter";
                              $result = mysqli_query($mysqli, $query);

                              if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                      echo '<option value="' . $row['id_dokter'] . '">' . $row['nama_dokter'] . '</option>';
                                  }
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="diagnosa">diagnosa</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="diagnosa" name="diagnosa" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="id_poli">Nama Poli</label>
                          <div class="col-sm-10">
                              <select name="id_poli" id="id_poli" class="form-select">
                                  <?php
                                  $query = "SELECT id_poli, nama_poli FROM poliklinik";
                                  $result = mysqli_query($mysqli, $query);

                                  if (mysqli_num_rows($result) > 0) {
                                      while ($row = mysqli_fetch_assoc($result)) {
                                          echo '<option value="' . $row['id_poli'] . '">' . $row['nama_poli'] . '</option>';
                                      }
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="tgl_periksa">tanggal periksa</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_periksa" name="tgl_periksa" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </form>
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>