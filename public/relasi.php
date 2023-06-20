<?php
include "koneksi.php";

try {
    $sql_primary = "SELECT * FROM produk WHERE id_produk='2' ";


    $sql_join = "SELECT produk.*, kategori_produk.id_kategori, kategori_produk.nama_kategori
                    FROM produk
                    JOIN kategori_produk ON produk.kategori = kategori_produk.id_kategori";

    $result = mysqli_query($connection, $sql_primary);
    $kolom = mysqli_fetch_array($result);

    $hasil = mysqli_query($connection, $sql_join);
    echo "<table>";
    while ($row = mysqli_fetch_array($hasil)) {
        echo (" 
                <tr>
                    <td>
                    $row[id_produk]
                    </td>
                
                    <td>
                    $row[nama_produk]
                    </td>
                
                    <td>
                    $row[isi_produk]
                    </td>
                
                
                    <td>
                    $row[harga_produk]
                    </td>
              
                    <td>
                    $row[foto_produk]
                    </td>

                    <td>
                    $row[id_kategori]
                    </td>

                    <td>
                    $row[nama_kategori]
                    </td>
                </tr>
                
        ");
    }
    echo "</table>";
} catch (Exception $error) {
    echo "Terjadi Error Karena, " . $error->getMessage();
}
