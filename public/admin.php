<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PartyTentRentals</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- side bar Start -->
    <div class="flex min-h-screen">
    <aside id="side" class="w-1/5 bg-keempat">
      <ul class="py-4">
        <li class="side-bar">
          <button id="homeBtn" class="side-style">Home</button>
        </li>
        <li class="side-bar">
          <button id="addBtn" class="side-style">Add</button>
        </li>
        <li class="side-bar">
          <button id="updateBtn" class="side-style">Update</button>
        </li>
        <li class="side-bar">
          <button id="contentBtn" class="side-style">Content</button>
        </li>
        <li class="side-bar">
          <button onclick="konfirmasiLogout()" class="font-semibold text-base focus:text-orange-400 hover:text-orange-400 text-kedua">Logout</button>
        </li>
      </ul>
    </aside>
    <!-- side bar end -->
    <!--  Halaman Utama Start-->
    <main class="w-full bg-slate-300">
      <!-- halaman search -->
      <section>
        <div class="w-full h-20 bg-ketiga border-l-2 border-slate-300">
          <form action="" method="post">   
              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
              <div class="flex justify-center items-center pt-3">
                <div class="relative w-1/2">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <img src="icons/magnifying-glass-solid.svg" alt="search" class="w-5 h-5">
                  </div>
                  <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Cari Produk, Content..." required>
                  <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
              </div>
          </form>
        </div>
      </section>
      <!-- home page admin start -->
      <section id="home" class=" ">
        <div class="container">
          <h1 class="mt-28 mb-2 fond-bold text-4xl text-ketiga text-center">Selamat Datang Admin!</h1>
          <p class="px-7 text-medium text-kedua">Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Doloremque sed ad consequuntur consequatur. 
            Est asperiores fugiat, labore vero facere soluta.
          </p>
        </div>
      </section>
      <!-- home page admin end -->
      <!-- page add produk start -->
      <section id="addForm" class="hidden">
        <div class="relative">
          <h2 class="mt-4 font-mono font-semibold text-center text-3xl text-ketiga">Add Produk</h2>
          <div class="container px-5 py-3 mx-auto flex justify-center">
            <div class="flex flex-col w-1/2 relative rounded-b-xl shadow-md shadow-ketiga">
                <div class="w-full">
                    <form class="px-8 pt-6 pb-8 mb-4" action="add.php" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                          <label class="text-ketiga text-base font-bold mr-2" for="kategori">
                                Kategori
                          </label>
                          <select name="kategori" id="kategori" class="cursor-pointer px-3 py-2 text-sm font-semibold text-ketiga border ml-4 border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-biru focus:border-biru">
                            <option value="1001">Tenda</option>
                            <option value="1002">Gedung</option>
                            <option value="1003">Panggung</option>
                            <option value="1004">Alat-alat</option>
                          </select>
                        </div>
                        <div class="mb-4">
                          <label class="label-form " for="nama_produk">
                                Nama Produk
                          </label>
                          <input id="nama_produk" name="nama_produk" type="text" placeholder="Nama Produk" class="kolom-input" >
                        </div>
                        <div class="mb-4">
                          <label class="label-form " for="isi_produk">
                                Isi Produk
                          </label>
                          <textarea id="isi_produk" name="isi_produk" placeholder="Isi Produk" class="kolom-input h-32"></textarea>
                        </div>
                        <div class="mb-4">
                          <label class="label-form " for="harga_produk">
                                Harga Produk
                          </label>
                          <input id="harga_produk" name="harga_produk" type="text" pattern="[0-9]+(\.[0-9]{1,2})?" placeholder="Harga Produk" class="kolom-input" >
                        </div>
                        <div class="mb-6">
                          <label class="label-form " for="foto_produk">
                                Foto Produk
                          </label>
                          <input id="foto_produk" name="foto_produk" type="file" accept=".jpg, .jpeg, .png" class="kolom-input cursor-pointer" >
                        </div>
                        <div class="flex items-center justify-end">
                          <input class="tombol-submit cursor-pointer" type="submit" name="add_produk" value="Add Produk">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
      </section>
      <!-- page add produk end -->
      <!-- page update start -->
        <?php 
          include "koneksi.php";
          $perintah_select = "SELECT * FROM produk ORDER BY id_produk DESC ";
        ?>
      <section id="updateForm" class="hidden">
        <div class="container">
          <div class="flex justify-center">
            <table class="w-3/4 mt-16 table-auto border border-slate-400 shadow-md bg-white ">
              <caption class="caption-top font-semibold text-lg text-gray-600 ">
              Table List Produk
              </caption>
              <thead>
                <tr>
                  <th class="tabel-judul">Nama Produk</th>
                  <th class="tabel-judul">Isi Produk</th>
                  <th class="tabel-judul">Harga</th>
                  <th class="bg-slate-600">&nbsp;</th>
                  <th class="bg-slate-600">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <td class="tabel-isi">premium</td>
                  <td class="tabel-isi ">deskripsi</td>
                  <td class="tabel-isi ">Rp25.700.000</th>
                  <td class="border-l border-slate-400 pl-4">
                    <button class="tombol-submit">Edit</button>
                  </td>
                  <td class="border-r border-slate-400 pl-5">
                    <button class="tombol-submit">Hapus</button>
                  </td>
                </tr> -->
                <?php
                try {
                    $hasil = mysqli_query($connection, $perintah_select);
                    while ( $row = mysqli_fetch_array($hasil)) {
                      echo("
                          <tr>
                            <td class='tabel-isi'>$row[nama_produk]</td>
                            <td class='tabel-isi '>$row[isi_produk]</td>
                            <td class='tabel-isi '>$row[harga_produk]</th>
                            <td class='border-b border-slate-400 px-4'>
                              <button onclick=\"halamanEdit($row[id_produk])\" class='tombol-edit'>Edit</button>
                            </td>
                            <td class='border-b border-slate-400 px-5'>
                              <button onclick='konfirmasiHapus($row[id_produk])' class='tombol-hapus'>Hapus</button>
                            </td>
                          </tr>
                          
                      ");
                  }
                } catch (Exception $err) {
                  echo "Terjadi Error karena, ". $err->getMessage();
                } 
                ?>
              </tbody>
            </table>
            </div>
        </div>
      </section>
      <!-- page content start -->
      <section id="contentForm" class="hidden">
        <!-- Tabs Halaman content -->
        <div class="flex justify-center items-center mt-10 mb-10">
            <ul class="hidden w-3/4 text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
              <li id="Cadd" class="w-full">
                <a href="admin.php?page=content&tabs=add" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">Add Content</a>
              </li>
              <li id="Cup" class="w-full">
                <a href="admin.php?page=content&tabs=update" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Edit Content</a>
              </li>
              <li id="Clist" class="w-full">
                <a href="admin.php?page=content&tabs=list" class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">List Content</a>
              </li>
            </ul>
        </div>
        <!-- Halaman tabs yang dipilih -->
        <div id="tambahContent" class="relative ">
            <h2 class="mt-4 font-mono font-semibold text-center text-3xl text-ketiga">Add Content</h2>
            <div class="container px-5 py-3 mx-auto flex justify-center">
              <div class="flex flex-col w-1/2 relative rounded-b-xl shadow-md shadow-ketiga">
                  <div class="w-full">
                      <form class="px-8 pt-6 pb-8 mb-4" action="add.php" method="post" enctype="multipart/form-data">
                          <div class="mb-4">
                            <label class="text-ketiga text-base font-bold mr-2" for="tema">
                                  Tema
                            </label>
                            <select name="tema" id="tema" class="cursor-pointer px-3 py-2 text-sm font-semibold text-ketiga border ml-4 border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-biru focus:border-biru">
                              <option value="3001">Pernikahan</option>
                              <option value="3002">Musik</option>
                              <option value="3003">Acara Formal</option>
                              <option value="3004">Makanan</option>
                              <option value="3005">Minuman</option>
                              <option value="3006">Kitanan</option>
                            </select>
                          </div>
                          <div class="mb-4">
                            <label class="label-form " for="judul_content">
                                  Judul Content
                            </label>
                            <input id="judul_content" name="judul_content" type="text" placeholder="Judul Content..." class="kolom-input" >
                          </div>
                          <div class="mb-4">
                            <label class="label-form " for="isi_content">
                                  Isi Content
                            </label>
                            <textarea id="isi_content" name="isi_content" placeholder="Isi Content..." class="kolom-input h-32"></textarea>
                          </div>
                          <div class="mb-6">
                            <label class="label-form " for="foto_content">
                                  Foto Content
                            </label>
                            <input id="foto_content" name="foto_content" type="file" accept=".jpg, .jpeg, .png" class="kolom-input cursor-pointer" >
                          </div>
                          <div class="flex items-center justify-end">
                            <input class="tombol-submit cursor-pointer" type="submit" name="tambah_content" value="Tambah Content">
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        <div id="editContent" class="hidden ">Halaman Edit</div>
        <div id="listContent" class="hidden ">Halaman List</div>
      </section>
      <!-- page content end -->
    </main>
    <!-- Halaman utama end -->
  </div>
  <script>
  //ambil id elemen button dan form
  const homeBtn = document.getElementById("homeBtn");
  const home = document.getElementById("home");
  const addBtn = document.getElementById("addBtn");
  const updateBtn = document.getElementById("updateBtn");
  const addForm = document.getElementById("addForm");
  const updateForm = document.getElementById("updateForm");
  const contentBtn = document.getElementById("contentBtn");
  const contentForm = document.getElementById("contentForm");
  
    //klik sidebar halaman home
    homeBtn.addEventListener('click', () => {
      window.location.href = "admin.php?page=home"; 
    });

    //klik sidebar halaman add
    addBtn.addEventListener("click", () => {
      window.location.href = "admin.php?page=add";
    });


    //klik sidebar halaman update
    updateBtn.addEventListener("click", () => {
      window.location.href = "admin.php?page=update";
    });

    //klik sidebar halaman content
    contentBtn.addEventListener("click", () => {
      window.location.href = "admin.php?page=content";
    });

    //klik sidebar
    var urlParam = new URLSearchParams(window.location.search);
    var lastPage = urlParam.get('page');
      if (lastPage === 'home') {
        home.classList.remove('hidden');
        addForm.classList.add('hidden');
        updateForm.classList.add('hidden');
        contentForm.classList.add('hidden');
      } else if(lastPage === 'add'){
        addForm.classList.remove("hidden");
        home.classList.add("hidden");
        updateForm.classList.add("hidden");
        contentForm.classList.add("hidden");
      } else if(lastPage === 'update'){
        updateForm.classList.remove("hidden");
        home.classList.add("hidden");
        addForm.classList.add("hidden");
        contentForm.classList.add("hidden");
      } else if(lastPage === 'content'){
        contentForm.classList.remove("hidden");
        updateForm.classList.add("hidden");
        home.classList.add("hidden");
        addForm.classList.add("hidden");
      }


    //klik tabs di halaman content
    const tabAdd= document.getElementById('Cadd');
    const tabUp= document.getElementById('Cup');
    const tabList= document.getElementById('Clist');
    const halTambah = document.getElementById('tambahContent');
    const halEdit = document.getElementById('tambahContent');
    const halList = document.getElementById('tambahContent');

    var urlTabs = new URLSearchParams(window.location.search);
    var lastTabs = urlTabs.get('tabs');
    if (lastTabs === 'add') {
      halTambah.classList.remove('hidden');
      halEdit.classList.add('hidden');
      halList.classList.add('hidden');

    } else if (lastTabs === 'update') {
      halTambah.classList.add('hidden');
      halEdit.classList.remove('hidden');
      halList.classList.add('hidden');

    } else if(lastTabs === 'list') {
      halTambah.classList.add('hidden');
      halEdit.classList.add('hidden');
      halList.classList.remove('hidden');
    }

    //menuju halaman form edit
    function halamanEdit(edit){
        window.location.href = "edit.php?id_produk="+edit;
    }

    //konfirmasi hapus produk
    function konfirmasiHapus(id){
        var konfir = confirm("Apakah anda yakin ingin menghapus data ini?");
        if(konfir){
            window.location.href = "delete.php?id=" + id;
        }else{
            return false;
        }
    }

    //konfirmasi logout
    function konfirmasiLogout() {
      const keluar = confirm("Yakin anda ingin Logout?");
      if (keluar) {
        window.location.href = "login.html";
      } else {
        return false;
      }
    }
    </script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>