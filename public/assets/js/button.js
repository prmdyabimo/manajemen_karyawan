const btnCreate = document.getElementById("btnCreate");
const formCreate = document.getElementById("formCreate");

if (formCreate) {
  btnCreate.addEventListener("click", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Apakah anda yakin ingin menambahkan data karyawan?",
      text: "Data karyawan akan tersimpan",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Simpan!",
    }).then((result) => {
      if (result.isConfirmed) {
        formCreate.submit();
      }
    });
  });
}

const btnEdit = document.getElementById("btnEdit");
const formEdit = document.getElementById("formEdit");

if (formEdit) {
  btnEdit.addEventListener("click", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Apakah anda yakin ingin mengubah data karyawan?",
      text: "Data karyawan akan diubah",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Simpan!",
    }).then((result) => {
      if (result.isConfirmed) {
        formEdit.submit();
      }
    });
  });
}

$(document).on("click", ".btnDelete", function (e) {
  e.preventDefault();
  var link = $(this).attr("href");
  Swal.fire({
    title: "Apakah anda yakin ingin menghapus data karyawan?",
    text: "Data karyawan akan terhapus secara permanent!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = link;
    }
  });
});
