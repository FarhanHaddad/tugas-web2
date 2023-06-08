<?php 
    include "koneksi.php";

    if (isset($_POST['add_produk'])) {
        $nama_produk = $_POST['nama_produk'];
        $isi_produk = $_POST['isi_produk'];
        $harga_produk = $_POST['harga_produk'];

        //input gambar
        $nama_foto = $_FILES['foto_produk']['name'];
        $tmpname_foto = $_FILES['foto_produk']['tmp_name'];
        $fileError = $_FILES['foto_produk']['error'];

        //folder gambar
        $folder_foto = 'foto/';
        $file_foto = $folder_foto . $nama_foto;

        //mengonversi karakter baris baru menjadi tag <br>
        $teks_baru = str_replace("\r\n", "<br>", $isi_produk);
        if($fileError === 0){
            try {
                $perintah_insert = "INSERT INTO produk (nama_produk, isi_produk, harga_produk, foto_produk)
                                    VALUES ('$nama_produk','$teks_baru','$harga_produk','$file_foto') ";
                
                //pindah file foto kedalam folder server
                move_uploaded_file($tmpname_foto, $file_foto);
                
                $hasil = mysqli_query($connection, $perintah_insert);
                if ($hasil) {
                    echo ("<script>window.location.href = 'notif.html?page=add'</script>");
                }
            } catch (Exception $err) {
                echo "Terjadi Error karena, ". $err->getMessage();
            }
        }else {
            echo "File foto Error";
        }

        
    }
?>