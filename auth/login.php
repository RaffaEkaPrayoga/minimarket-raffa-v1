<?php
    session_start();

    if (isset($_SESSION['ssLogin'])) {
      header("location : ../index.php");
      exit();
    }
    require_once "../config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Ranz</title>
    <link rel="shortcut icon" href="<?=$base_url?>asset/image/Keranjang.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../asset/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../asset/stisla/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../asset/stisla/assets/css/style.css">
  <link rel="stylesheet" href="../asset/stisla/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="../asset/image/Keranjang.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form method="POST" action="proses-login.php" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus placeholder="Username">
                    <div class="invalid-feedback">
                      Username
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Password">
                    <div class="invalid-feedback">
                      Password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="mt-5 text-muted text-center">
                Belum Punya Akun? <a href="register.php">Klik disini !!</a>
                </div>
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

  <script>
  <?php
  if (isset($_GET['alert']) && $_GET['alert'] == "err1") {
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
    title: "Username atau Password salah",
    showConfirmButton: false,
    timer: 2500
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
  <script src="../asset/stisla/node_modules/sweetalert/sweetalert.min.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../asset/stisla/assets/js/scripts.js"></script>
  <script src="../asset/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
