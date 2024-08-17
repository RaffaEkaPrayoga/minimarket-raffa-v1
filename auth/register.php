
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Ranz</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../asset/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../asset/stisla/node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../asset/stisla/assets/css/style.css">
  <link rel="stylesheet" href="../asset/stisla/assets/css/components.css">


<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../asset/image/Keranjang.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <div class="card-body">
                <form action="proses-register.php" method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama" autofocus placeholder="nama">
                    </div>
                    <div class="form-group col-6">
                      <label for="alamat">Alamat</label>
                      <input id="alamat" type="text" class="form-control" name="alamat" placeholder="alamat">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="username" class="form-control" name="username" placeholder="username">
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength"  name="password" placeholder="password">
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Konfirmasi Password</label>
                      <input id="password2" type="password" class="form-control" name="passConf" placeholder="konfirmasi password">
                    </div>
                  </div>

                  <div class="form-group">
                      <button type="reset" name="reset" class="btn btn-danger btn-lg btn-block">
                          Reset
                      </button>
                    <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                                                           
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Raffa Eka Prayoga
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
  <!-- Script SweetAlert -->
  <script>
    <?php
  if (isset($_GET['alert']) && $_GET['alert'] == "success") {
  ?>
    Swal.fire({
      icon: 'success',
      title: 'Registrasi Berhasil',
      text: 'Anda telah berhasil terdaftar. Silakan login.'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'login.php';
      }
    });
  <?php
  } elseif (isset($_GET['alert']) && $_GET['alert'] == "err1") {
  ?>
    Swal.fire({
      icon: "warning",
      title: 'Mohon mengisi setiap kolom!',
      showConfirmButton: false,
      timer: 2500
    });
  <?php
  } elseif (isset($_GET['alert']) && $_GET['alert'] == "err2") {
  ?>
    Swal.fire({
      icon: "error",
      title: 'Konfirmasi password tidak cocok!',
      text: ' Silakan coba lagi.',
      showConfirmButton: false,
      timer: 3000
    });
  <?php
  }
  ?>
</script>

<!-- General JS Scripts -->
  <script src="../asset/stisla/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../asset/stisla/node_modules/popper.js/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="../asset/stisla/node_modules/bootstrap/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../asset/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="../asset/stisla/node_modules/moment/dist/min/moment.min.js"></script>
  <script src="../asset/stisla/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../asset/stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../asset/stisla/node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="../asset/stisla/assets/js/scripts.js"></script>
  <script src="../asset/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../asset/stisla/assets/js/page/auth-register.js"></script>
</body>
</html>
