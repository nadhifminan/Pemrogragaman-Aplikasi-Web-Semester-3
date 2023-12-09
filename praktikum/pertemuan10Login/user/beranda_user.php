<?php
    session_start();
    if($_SESSION['level'] != 2 && $_SESSION['login'] = "sukses"){
        header("Location: ../login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda User</title>
</head>
<body>
    <h1>Beranda User</h1>
    <a href="../logout.php">logout</a>
</body>
</html>