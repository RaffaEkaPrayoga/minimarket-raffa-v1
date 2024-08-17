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
            <h1>Pembelian</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?=$base_url?>index.php?page=pembelian">pembelian</a></div>
              <div class="breadcrumb-item"><a href="<?=$base_url?>index.php?page=add-pembelian">Tambah pembelian</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-4 col-md-8 col-lg-12">
                <div class="card">
                  <form action="<?=$base_url?>pembelian/proses-pembelian.php" method="post">
                  <div class="card-header">
                    <h4>Tambah Data Pembelian</h4>
                  </div>
                  <div class="card-body">
                    <form action="proses-pembelian.php" method="post">
                      <div class="form-group">
                        <label for="supplier">Supplier:</label>
                        <select class="form-control" id="supplier" name="supplier">
                          <?php
                            $query_supplier = "SELECT * FROM supplier";
                            $result_supplier = mysqli_query($conn, $query_supplier);
                            while ($row_supplier = mysqli_fetch_assoc($result_supplier)) {
                              echo "<option value='{$row_supplier['idsupplier']}'>{$row_supplier['nama_supplier']}</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="produk">Produk:</label>
                        <select class="form-control" id="produk" name="produk">
                          <?php
                            $query_produk = "SELECT * FROM produk";
                            $result_produk = mysqli_query($conn, $query_produk);
                            while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                              echo "<option value='{$row_produk['idproduk']}'>{$row_produk['nama_produk']}</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah">Jumlah Pembelian:</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                      </div>
                      <button type="submit" name="tambah" class="btn btn-primary">Tambah Pembelian</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>