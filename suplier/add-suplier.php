<?php 
$multiuser = new Multiuser($conn); 
$userData = $multiuser->getUserData();
if ($userData['level'] != 1) { 
  echo "<script>
       window.location = 'index.php?alert=err2';
    </script>";
    exit;
}?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Suplier</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?=$base_url?>index.php?page=suplier">Suplier</a></div>
              <div class="breadcrumb-item"><a href="<?=$base_url?>index.php?page=suplier">Tambah Suplier</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-4 col-md-8 col-lg-12">
                <div class="card">
                  <form action="<?=$base_url?>suplier/proses-suplier.php" method="post">
                  <div class="card-header">
                    <h4>Tambah Data Suplier</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="tel" name="telepon" class="form-control">
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="tambah" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        </section>
    </div>

