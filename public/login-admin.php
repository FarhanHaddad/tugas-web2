<?php
    include "koneksi.php";

    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $pass = $_POST["password"];

        /* 
        $perintah = 'select * from akun where id=admin'
        $sql = 'select... pelanggan' 
        $hasil = ...($koneksi, $perintah);
        $row_admin =mysqli_fetch_assoc($hasil);
        $email_admin = $row[email];
        $pass_admin = $row[pass];

        if($email === $email_admin && $pass === $pass_admin){
            header...admin...
        }
        */
        $cari_akun = "SELECT * FROM akun WHERE email = '$email' ";
        try {
            $hasil = mysqli_query($connection, $cari_akun);
            if ($hasil->num_rows > 0) {
                $row = mysqli_fetch_assoc($hasil);
                $kumpulan_password = $row["password"];

                // Memeriksa kecocokan password yang diinputkan dengan password di database
                if ($pass == $kumpulan_password) {
                    // Login berhasil, set session dan arahkan ke halaman admin.php
                    $_SESSION["id_akun"] = $row["id_akun"];
                    // header("Location: admin.php");
                    echo "<script>alert('Berhasil Login'); window.location='admin.php';</script>"; 
                    exit();
                } else {
                    echo "<script>alert('Gagal Login'); window.location='login.html';</script>"; 
                    // header("Location: login.html");
                }
            }else {
                echo "<script>alert('Email Tidak ditemukan!'); window.location='login.html';</script>"; 
                // header("Location: login.html");
            }

        } catch (Exception $eror) {
            echo "Terjadi error karena, ". $eror->getMessage() ;
            echo "<a href='login.html'>Kembali Login</a>";
        }      
    }

?>