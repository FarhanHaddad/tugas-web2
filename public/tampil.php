<?php
    include "koneksi.php";

    $perintah_select = "SELECT * FROM produk ORDER BY id_produk DESC ";

    echo "<table>";
    echo "<tr>";
    echo "<td>Nama Produk</td>";
    echo "<td>Isi Produk</td>";
    echo "<td>Harga Produk</td>";
    echo "<td>Foto Produk</td>";
    echo "<td>&nbsp;</td>";
    echo "</tr>";

    try {
        $hasil = mysqli_query($connection, $perintah_select);
        while ( $row = mysqli_fetch_array($hasil)) {
            echo("
                <tr>
                  <td class='tabel-isi'>premium</td>
                  <td class='tabel-isi '>deskripsi</td>
                  <td class='tabel-isi '>Rp25.700.000</th>
                  <td class=''>
                    <button oclick='' class='tombol-submit flex justify-center items-center'>Edit</button>
                  </td>
                  <td class='border-r border-slate-400'>
                    <button onclick='' class='tombol-submit flex justify-center items-center'>Hapus</button>
                  </td>
                </tr>
                
            ");
        }
                
    } catch (Exception $err) {
        echo "Terjadi Error karena, ". $err->getMessage();
    }

                // <tr>
                //     <td>$row[nama_produk]</td>
                //     <td>$row[isi_produk]</td>
                //     <td>$row[harga_produk]</td>
                //     <td>
                //         <img src='$row[foto_produk]' width='200'>
                //     </td>
                //     <td>
                //         <button>Edit</button>
                //     </td>
                // </tr>
    echo "</table>";
?>