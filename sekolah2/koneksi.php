<?php
    $host='localhost';
    $db='sekolah2';
    $user='root';
    $passw='';
    $koneksi=mysqli_connect($host,$user,$passw,$db);

    if(isset($koneksi)){
        echo 'koneksi berhasil';
    }else{
        echo'koneksi belum berhasil';
    }
?>