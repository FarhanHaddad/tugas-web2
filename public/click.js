// //ambil elemen tombol dan form berdasarkan data-target
//         const buttons = document.querySelectorAll('[data-target]');
//         const forms = document.querySelectorAll('form');

//         //tambahkan event listener untuk setiap tombol
//         buttons.forEach(button =>{
//             button.addEventListener('click', () => {
//                 const target = button.dataset.target;

//                 //sembunyika semua form
//                 forms.forEach(form => {
//                     form.classList.add('hidden');
//                 });

//                 //tampilkan form yang sesuai target
//                 const targetForm = document.getElementById(target);
//                 targetForm.classList.remove('hidden');
//             });
//         });

//ambil elemet button dan form
// const homeBtn = document.getElementById("homeBtn");
// const home = document.getElementById("home");
// const addBtn = document.getElementById("addBtn");
// const updateBtn = document.getElementById("updateBtn");
// const addForm = document.getElementById("addForm");
// const updateForm = document.getElementById("updateForm");
// const contentBtn = document.getElementById("contentBtn");
// const contentForm = document.getElementById("contentForm");

//tambahkan event listener untuk tombol home
homeBtn.addEventListener("click", () => {
  home.classList.remove("hidden");
  addForm.classList.add("hidden");
  updateForm.classList.add("hidden");
  contentForm.classList.add("hidden");
});

//tambahkan event listener untuk tombol add
addBtn.addEventListener("click", () => {
  addForm.classList.remove("hidden");
  home.classList.add("hidden");
  updateForm.classList.add("hidden");
  contentForm.classList.add("hidden");
});

// //tambahkan event listener untuk tombol update
updateBtn.addEventListener("click", () => {
  updateForm.classList.remove("hidden");
  home.classList.add("hidden");
  addForm.classList.add("hidden");
  contentForm.classList.add("hidden");
});

// //tambahkan event listener untuk tombol content
contentBtn.addEventListener("click", () => {
  contentForm.classList.remove("hidden");
  updateForm.classList.add("hidden");
  home.classList.add("hidden");
  addForm.classList.add("hidden");
});

// function halamanEdit(id_produk){
//     window.location.href = "edit.php?id_produk=" + id_produk;
// }
// function konfirmasiHapus(id){
//     var konfir = confirm("Apakah anda yakin ingin menghapus data ini?");
//     if(konfir){
//         window.location.href = "pert12_delete.php? =" + id;
//     }else{
//         return false;
//     }
// }
