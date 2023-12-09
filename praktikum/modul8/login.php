<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password_input = md5($_POST['password']); 

    $koneksi = mysqli_connect("localhost", "root", "", "penjualan",'3308');
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Bandingkan dengan kata sandi yang di-hash
        if ($password_input == $row['password']) {
            $_SESSION['login'] = "sukses";
            $_SESSION['nama'] = $row['nama'];

            // Pemilihan level
            if ($row['level'] == 1) {
                $_SESSION['level'] = 1;
                header("Location: admin/beranda_admin.php");
            } elseif ($row['level'] == 2) {
                $_SESSION['level'] = 2;
                header("Location: user/beranda_user.php");
            } else {
                echo 'Level tidak valid';
            }
        } else {
            header("Location: login.php");
        }
    } else {
        echo 'Gagal';
    }
} else {
    echo 'Email dan password harus diisi';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center bg-primary">Form Login</h1>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
