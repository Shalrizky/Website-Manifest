function dataClientSyaksiah() {
  $.ajax({
    url: "SyaksiahController/ambilDataClient",
    dataType: "json",
    success: function (response) {
      $(".viewDataClient").html(response.data);
      // Initialize DataTables here
      $("#dataTable").DataTable({
        order: [[0, "desc"]],
      });
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}

$(document).ready(function () {
  "use strict";
  dataClientSyaksiah();

  $(".formTambahClient").submit(function (e) {
    e.preventDefault();
    console.log("Form submitted");
    $.ajax({
      type: "post",
      url: $(this).attr("action"),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        console.log("Before Send is executed.");
        $("#submitButton").prop("disabled", true);
        $("#submitButton").html(
          '<i class="fas fa-spinner fa-spin"></i> Menyimpan...'
        );
      },
      complete: function () {
        $("#submitButton").prop("disabled", false);
        $("#submitButton").html('<i class="fas fa-paper-plane"></i> Save');
      },
      success: function (response) {
        if (response.error) {
          // Handle validation errors
          let data = response.error;

          if (data.nama_client_syaksiah) {
            $("#nama_client_syaksiah").addClass("is-invalid");
            $(".error_nama_client_syaksiah").html(data.nama_client_syaksiah);
          } else {
            $("#nama_client_syaksiah").removeClass("is-invalid");
            $("#nama_client_syaksiah").addClass("is-valid");
          }
        } else if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Data berhasil ditambahkan.",
            timer: 1500,
            timerProgressBar: true,
          }).then(() => {
            // Reload DataTables
            $("#nama_client_syaksiah").val("").removeClass("is-valid");
            $("#viewModalClient").modal("hide");
            dataClientSyaksiah();
          });
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.responseText);
        if (xhr.responseJSON && xhr.responseJSON.errorDatabase) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: xhr.responseJSON.errorDatabase,
            footer: "Kode Kesalahan: " + thrownError,
            showConfirmButton: true,
          }).then(() => {
            window.location.href = xhr.responseJSON.redirectUrl;
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Terjadi Kesalahan Dalam Permintaan AJAX. Silakan coba lagi nanti atau hubungi dukungan.",
            footer: "Kode Kesalahan:" + thrownError,
            showConfirmButton: true,
          });
        }
      },
    });
  });
});

$("#nama_client_syaksiah").on("input", function () {
  var nama_client_syaksiah = $(this).val();
  var errorClass = ".error_nama_client_syaksiah";
  var errorMessage = "";

  if (!nama_client_syaksiah) {
    errorMessage = "Nama client tidak boleh kosong";
    $(this).removeClass("is-valid").addClass("is-invalid");
  } else {
    $(this).removeClass("is-invalid").addClass("is-valid");
  }

  $(errorClass).text(errorMessage);
});

