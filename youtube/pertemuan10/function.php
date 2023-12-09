<?php 
    //koneksi ke database
    $conn = mysqli_connect("localhost","root","","phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;

    }

    //function tambah
    function tambah($data) {
        global $conn;
        // Ambil data dari tiap elemen dalam form
        $nama = htmlspecialchars($data["nama"]);
        $nim = $data["nim"];
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);
        
        // Query insert data
        $query = "INSERT INTO mahasiswa 
                    VALUES
                    ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')
            ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

?>