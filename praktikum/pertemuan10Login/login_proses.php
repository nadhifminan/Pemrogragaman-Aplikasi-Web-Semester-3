<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $koneksi = mysqli_connect('localhost', 'root', '', 'penjualan');
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    
    if ($row = mysqli_fetch_assoc($result)){
        if($password == $row['password']){
            $_SESSION['login'] = "sukses";
            $_SESSION['level'] = 1;
            header("Location: admin/beranda_admin.php");
        } else {
            header("Location: login.php");
        }
    }
    else {
        echo 'gagal';
    }
?>

