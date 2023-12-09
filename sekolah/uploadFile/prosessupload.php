<?php
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    include "koneksi.php";
    $namafile=$_FILES['berkas']['name'];
    $namatemp=$_FILES['berkas']['tmp_name'];
    // seleksi dengan php
    $typefile=$_FILES['berkas']['type'];
    $ukuran=$_FILES['berkas']['size'];
    if ($ukuran<2000000){
        if($typefile=='image/jpg' or $typefile=='image/png'){
            $folder="files/";
            $tersimpan=move_uploaded_file($namatemp,$folder.$namafile);
            mysqli_query($koneksi,"insert into berkas values('','$namafile');");
            if($tersimpan){
                echo "upload Berhasil";
            }else{
                echo "upload gagal";
            }
        }else{
            echo "file harus image";
        }
    }else{
        echo "file harus kurang dari 2 MB";
    }
    
    
?>