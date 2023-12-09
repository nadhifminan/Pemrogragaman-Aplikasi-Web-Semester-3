<?php 
    $conn = mysqli_connect("localhost", "root", "", "penjualan");
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query = "SELECT * FROM user WHERE username ='$email'";
    $data=mysqli_query($conn,$query);
    $hasil = mysqli_fetch_assoc($data);

    if ($hasil != 0){
        if($password == $hasil["password"]){
            echo "berhasil";
        }else{
            echo "password salah";
        }
    }
    else{
        echo "gagal";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html>