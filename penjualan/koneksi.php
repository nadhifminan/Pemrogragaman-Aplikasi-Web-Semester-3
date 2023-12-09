<?php
$host='localhost';
$db='penjualan';
$user ='root';
$passw='';
$koneksi=mysqli_connect($host,$user,$passw,$db);

if (isset($koneksi)) {
    //echo"koneksi berhasil";
}else{
    echo "Koneksi tidak berhasil ";
}
?>