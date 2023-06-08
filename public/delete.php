<?php 
    include "koneksi.php";
    $id_produk = $_GET["id"];

    try{
        $sql_delete = "DELETE FROM produk WHERE id_produk='$id_produk' ";
        $hasil = mysqli_query($connection, $sql_delete);
        if ($hasil) {
            echo '<script>window.location.href = "notif.html?page=hapus";</script>';
        }
    }catch(Exception $err){
        echo "Gagal Delete Produk karena, ".$err->getMessage();
    }
?>