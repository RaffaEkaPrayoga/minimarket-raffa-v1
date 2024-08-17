<?php 
$multiuser = new Multiuser($conn); 
$userData = $multiuser->getUserData();
if ($userData['level'] != 1) { 
  echo "<script>
       window.location = 'index.php?alert=err2';
    </script>";
    exit;
}?>

<body>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Suplier</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Suplier</h4>
                    <a class="btn btn-primary" style="margin-left: 630px;" href="<?=$base_url?>index.php?page=add-suplier"><i class="fa fa-plus"></i> Tambah Suplier</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Telepon</th>
                              <th>Alamat</th>
                              <th style="padding: 10px -30px">Operasi</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query = "SELECT * FROM supplier";
                          $stmt = $koneksi->prepare($query);
                          $stmt->execute();

                          // Ambil hasil query sebagai array asosiatif
                          $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);

                          $no = 1;
                          foreach ($suppliers as $sup) {
                          ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $sup['nama_supplier']; ?></td>
                              <td><?= $sup['telepon_supplier']; ?></td>
                              <td><?= $sup['alamat_supplier']; ?></td>
                              <td style="padding: 10px -30px;">
                                <a class="btn btn-sm btn-warning" href="<?= $base_url ?>index.php?page=edit-suplier&id=<?= $sup['idsupplier']; ?>" name="update">
                                  <i class="fa fa-pen"></i> Edit
                                </a>
                                <a onclick="hapus(<?= $sup['idsupplier'] ?>)" class="btn btn-sm btn-danger text-light" name="hapus">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      