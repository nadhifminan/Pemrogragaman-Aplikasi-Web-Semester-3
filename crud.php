<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .navbar {
            background-color: green;
            display: flex;
            width: 100%;
        }
        .navbar a {
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            flex-grow: 1;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        table {
            margin-top: 40px;
            border: 1px solid #ccc;
            border-collapse: collapse;
            width: 600px;
            margin-top: 20px;
        }
        th, td {
            border: 2px solid black;
            padding: 10px;
        }
        th {
            background-color: orange;
        }
        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Beranda</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </div>

    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "datapertamaphp";
        $koneksi = mysqli_connect($host, $username, $password, $database);

        if (!$koneksi) {
            die("Koneksi database gagal:" . mysqli_connect_error());
        }
        
    ?>
    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
        </tr>
        <?php 
            $sqli = mysqli_query($koneksi, "SELECT * FROM tugas");
            if (mysqli_num_rows($sqli) > 0) {
                $no = 0;
                while ($row = mysqli_fetch_array($sqli)) {
                    $no++;
                    echo '
                        <tr>
                            <td>' . $no . '</td>
                            <td>' . $row["tanggal"] . '</td>
                            <td>' . $row["deskripsi"] . '</td>
                        </tr>
                    ';
                }
            }
        ?>
    </table>
    <footer>
        <p>&copy; copyright Nadhif2023</p>
    </footer>
</body>
</html>