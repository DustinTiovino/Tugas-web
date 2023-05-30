<?php
    $user = "root";
    $server = "localhost";
    $password = "";
    $db = "sun_atk";

    $conn = mysqli_connect($server, $user, $password, $db);
    if(!$conn) {
        die("gagal koneksi ke database");

        // echo "koneksi kedatabase berhasil";

        //mysqli_close($conn);
    }

?>