<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Produk </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
      <?php
        include "koneksi.php";
        $id_pro = $_GET['id_produk'];
        
        try {
          $sql = "SELECT * FROM produk WHERE id_produk='$id_pro' ";
          $hasil = mysqli_query($connection, $sql);
          $row = mysqli_fetch_array($hasil);
        } catch (Exception $err) {
          echo "Terjadi Error karena, ". $err->getMessage();
        }
      ?>
          <h2 class="mt-4 font-serif font-semibold text-center text-3xl text-ketiga">Edit Produk</h2>
          <div class="container px-5 py-3 mx-auto flex justify-center">
            <div class="flex flex-col w-1/2 relative rounded-xl shadow-lg shadow-ketiga bg-gray-200">
                <div class="w-full">
                    <form class="px-8 pt-6 pb-8 mb-4" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_produk" value='<?php echo "$row[id_produk]"?>'>
                        <div class="mb-4">
                          <label class="label-form " for="nama_produk">
                                Nama Produk
                          </label>
                          <input value='<?php echo "$row[nama_produk]" ?>' id="nama_produk" name="nama_produk" type="text" placeholder="Nama Produk" class="kolom-input" >
                        </div>
                        <div class="mb-4">
                          <label class="label-form " for="isi_produk">
                                Isi Produk
                          </label>
                          <textarea id="isi_produk" name="isi_produk" placeholder="Isi Produk" class="kolom-input h-32"><?php echo "$row[isi_produk]" ?></textarea>
                        </div>
                        <div class="mb-4">
                          <label class="label-form " for="harga_produk">
                                Harga Produk
                          </label>
                          <input value='<?php echo "$row[harga_produk]" ?>' id="harga_produk" name="harga_produk" type="text" pattern="[0-9]+(\.[0-9]{1,2})?" placeholder="Harga Produk" class="kolom-input" >
                        </div>
                        <div class="mb-6">
                          <label class="label-form " for="foto_produk">
                                Foto Produk
                          </label>
                          <div class="flex justify-between">
                            <input id="foto_produk" name="foto_produk" type="file" accept=".jpg, .jpeg, .png" 
                            class="px-3 py-2 border shadow-md rounded-md w-[40%] h-14 cursor-pointer" >
                            <img src='<?php echo "$row[foto_produk]" ?>' alt="foto produk" class="w-1/2 rounded-md">
                          </div>
                          </div>
                        <div class="flex items-center justify-start">
                          <input class="tombol-submit cursor-pointer" type="submit" name="update_produk" value="Edit Produk">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
        if (isset($_POST['update_produk'])) {
          $id_produk = $_POST['id_produk'];
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
            try {
              $cari_foto = "SELECT foto_produk FROM produk WHERE id_produk='$id_produk' ";
              //cek apakah ada foto baru
              if(!empty($nama_foto)){
                $result = mysqli_query($connection, $cari_foto);
                if($result->num_rows > 0 ){
                  $row = $result->fetch_assoc();
                  $foto_lama = $row['foto_produk'];
                  //mengecek file gambar dan menghapusnya
                  if (file_exists($foto_lama)) {
                      unlink($foto_lama);
                      // echo "Gambar berhasil di update";
                    }
                  }
                }
            
              $perintah_update = "UPDATE produk 
              SET nama_produk='$nama_produk', isi_produk='$isi_produk', harga_produk='$harga_produk', foto_produk='$file_foto' 
              WHERE id_produk='$id_produk' ";

              $perintah_update2 = "UPDATE produk 
              SET nama_produk='$nama_produk', isi_produk='$isi_produk', harga_produk='$harga_produk', 
              WHERE id_produk='$id_produk' ";

              if(!empty($nama_foto)){
                move_uploaded_file($tmpname_foto, $file_foto);
                $hasil = mysqli_query($connection, $perintah_update);
                if ($hasil) {
                  echo ("<script>window.location.href = 'notif.html?page=edit'</script>");
                }else{
                  echo "gagal 1";
                } 

              }
                $hasil = mysqli_query($connection, $perintah_update2);
                if($hasil){
                  echo ("<script>window.location.href = 'notif.html?page=edit'</script>");
                }else{
                  echo"gagal 2";
                }
              
            } catch (Exception $err) {
              echo "Gagal Update Produk, ".$err->getMessage();
            }

        }
        ?>
</body>
</html>