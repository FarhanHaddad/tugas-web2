<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "db_rental";

    try {
        $connection = mysqli_connect($host,$user,$pw,$db);
        if($connection->connect_error){
            throw new Exception("Koneksi Gagal: ". $connection->connect_error);
        }
            // echo "Koneksi Berhasil";
        
    } catch (Exception $err) {
        echo "Terjadi Error karena".$err->getMessage();
    }
?>
