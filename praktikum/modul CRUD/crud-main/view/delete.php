<?php

require_once('../config.php');

$id = $_GET['id'];
$delete = mysqli_query($mysqli, "DELETE  FROM `pasien` WHERE id_pasien = '$id'");


if ($delete) {
    header('Location: data.php');
}
