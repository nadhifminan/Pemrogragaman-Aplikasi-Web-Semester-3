<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan";
$conn = mysqli_connect($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username =$_POST['username'];
    $password =$_POST['password'];

    $username = mysqli_real_escape_string($conn,$username);

    $query=("SELECT password FROM pengguna WHERE username ='$username");
    $result=$conn->query('query');

    if ($result -> num_rows>0) {
        $row=$result->fetch_assoc();
        $stored_password = $row['password'];

        if (password_verify($stored_password,$stored_password)) {
            echo'Login Berhasil.Redirect ke halaman berikutnya';
        }else{
            echo 'Login Gagal.Silahkan coba lagi.';
        }
        
    }else{
        echo "Login gagal.username tidak ditemukan ";
    }
}
$conn->close();
?>