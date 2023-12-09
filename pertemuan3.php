<?php
    // membuat mendeklarasikan array
    // print array
    // mendapatkan array sesuai indeksnya
    // mengecek arrray pada indeks tertentu
    // menghitung jumlah array
    // menambahkan data baru diarray terakhir
    // menunda data array yg terakhir
    // menambahkan data array di yg pertama
    // membuang data array yg pertama
    // membuat asosiate arrray 
    // mengeprint asosiate array


    $buku = array( "Penjelajah Antariksa", "Dilan1991", "ensiklopedia","Laskar pelangi" );
    //7./  fungsi array_pop() digunakan untuk menghapus elemen terakhir dari array $buku. 
    // Fungsi ini menghapus elemen terakhir dari array dan mengembalikan nilai elemen yang dihapus.
    //  Dalam kasus ini, elemen terakhir dari array $buku adalah "Laskar pelangi", dan nilai ini disimpan dalam variabel $array_keluaran.
    
    // Array
    // (
    // [0] => Penjelajah Antariksa
    // [1] => Dilan1991
    // [2] => ensiklopedia
    // )

    $array_keluaran = array_pop( $buku);
    print_r( $buku );
    echo array_pop( $buku);

    // 10.membuat assosiate array
    // jenis array di mana setiap elemen memiliki kunci (key) yang digunakan untuk 
    // mengidentifikasi dan mengakses nilai yang terkait. 
    $siswa = array(
        "nama" => "Nadhif",
        "umur" => 18,
        "kelas" => "PAW",
        "nilai" => 95
    );

    echo "Nama: " . $siswa["nama"] . "\n";
    echo "Umur: " . $siswa["umur"] . " tahun\n";
    echo "Kelas: " . $siswa["kelas"] . "\n";
    echo "Nilai: " . $siswa["nilai"] . "\n";
    echo "<br>";
    foreach ($siswa as $kunci => $nilai) {
        echo "$kunci: $nilai\n";
    }
?>