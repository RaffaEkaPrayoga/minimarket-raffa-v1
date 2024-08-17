<?php

$multiuser = new Multiuser($conn); 
$userData = $multiuser->getUserData();
if ($userData['level'] != 1) { 
  echo "<script>
       window.location = 'index.php?alert=err2';
    </script>";
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    // Handle the case when 'id' is not present in $_GET
    echo "Supplier ID is not provide.";
    exit;
}

$query = "SELECT * FROM supplier WHERE idsupplier = :id";
$stmt = $koneksi->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$sup = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Suplier</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?=$base_url?>index.php?page=suplier">Suplier</a></div>
              <div class="breadcrumb-item"><a href="<?=$base_url?>index.php?page=suplier">Update Suplier</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-4 col-md-8 col-lg-12">
                <div class="card">
                  <form action="<?=$base_url?>suplier/proses-suplier.php" method="post">
                  <div class="card-header">
                    <h4>Update Data Suplier</h4>
                  </div>
                  <div class="card-body">
                    <input type="hidden" value="<?=$id?>" name="id" required>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" value="<?=$sup["nama_supplier"]?>" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" required><?=$sup["alamat_supplier"]?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="tel" name="telepon" class="form-control" value="<?=$sup["telepon_supplier"]?>" required>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" name="update" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        </section>
    </div>

