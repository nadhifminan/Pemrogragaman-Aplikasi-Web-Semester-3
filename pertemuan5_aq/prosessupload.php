<?php
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    
    $namaFile=$_FILES['berkas']['name'];
    $namatemp=$_FILES['berkas']['tmp_name'];
    $tersimpan=move_uploaded_file($namatemp,$folder.$namafile);
    if($tersimpan){
        echo "upload Berhasil";
    }else{
        echo "upload gagal";
    }
?>