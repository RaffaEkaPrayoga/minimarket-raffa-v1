      <footer class="main-footer">
              <div class="footer-left">
                Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://instagram.com/raffaekaprayoga">Raffa Eka Prayoga</a>
              </div>
              <div class="footer-right">
                1.0.0
              </div>
      </footer>
    </div>
  </div>
  
  <script>
    function hapus(hapus_id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary mx-4',
                cancelButton: 'btn btn-danger mx-4'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin?',
            text: "Data kamu nggak bisa kembali lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, menghapus !',
            cancelButtonText: 'Tidak, batal !',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Hapus!',
                    'File kamu telah dihapus.',
                    'success'
                )
                window.location=("suplier/hapus-suplier.php?id="+hapus_id)
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Batal',
                    'File kamu masih aman :)',
                    'error'
                )
            }
        })
    }
</script>


 <script>
  <?php
    if (isset($_GET['alert']) & $_GET['alert'] == "success1") {
    ?>
      Swal.fire({
        icon: 'success',
        title: 'Penambahan Berhasil',
        text: 'Anda telah berhasil menambahkan data'
      });
    <?php }
    elseif (isset($_GET['alert']) & $_GET['alert'] == "success2") {
    ?>
      Swal.fire({
        icon: 'success',
        title: 'Update Berhasil',
        text: 'Anda telah berhasil mengupdate data'
      });
  <?php
  } elseif (isset($_GET['alert']) & $_GET['alert'] == "err1") {
  ?>
    Swal.fire({
      icon: "warning",
      title: 'Mohon mengisi setiap kolom!',
      showConfirmButton: false,
      timer: 2500
    });
  <?php
  } elseif (isset($_GET['alert']) & $_GET['alert'] == "err2") {
  ?>
    Swal.fire({
      icon: "error",
      title: 'Tidak Ada Izin',
      text: 'Anda Tidak Memiliki Izin Untuk Halaman Ini!',
      showConfirmButton: false,
      timer: 3000
    });
  <?php
 } elseif (isset($_GET['alert']) & $_GET['alert'] == "hapus") {
  ?>
    Swal.fire({
      icon: "success",
      title: 'Items telah dihapus.!',
      showConfirmButton: false,
      timer: 1500
    });
  <?php
  }
  ?>
  </script>

  <script src="<?=$base_url?>asset/stisla/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/moment/dist/min/moment.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/assets/js/stisla.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

  <!-- JS Libraies -->
  <script src="<?=$base_url?>asset/stisla/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <!-- Datatable JS -->
  <script src="<?=$base_url?>asset/stisla/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=$base_url?>asset/stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

  <!-- Template JS File -->
  <script src="<?=$base_url?>asset/stisla/assets/js/scripts.js"></script>
  <script src="<?=$base_url?>asset/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?=$base_url?>asset/stisla/assets/js/page/index.js"></script>
  <script src="<?=$base_url?>asset/stisla/assets/js/page/modules-datatables.js"></script>
  <script src="<?=$base_url?>asset/stisla/assets/js/page/modules-chartjs.js"></script>
</body>
</html>
 