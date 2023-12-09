<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan";
$conn = mysqli_connect($host, $username, $password, $database);

if ($conn) {
    // echo "tersambung";
} else {
    // echo "tidak tersambung";
}

if ($conn->connect_error){
    die ("koneksi data base gagal:".$conn -> connect_error);
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $username =$_POST['username'];
    $password =$_POST['password'];

    $username = mysqli_real_escape_string($conn,$username);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query="INSERT INTO pengguna (username,password) VALUES ('$username','$hashed_password')";

    if ($conn -> query($query) === TRUE){
        header ("location: data.php");
        die();
    }else{
        echo "EROR: ".$query. "<br>" . $conn->error;

    }
}
$conn->close();
?>