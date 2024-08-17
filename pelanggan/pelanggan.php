<?php 
$multiuser = new Multiuser($conn); 
?>

<div class="main-content">
    
<?php
if(isset($_POST['tambahPelanggan'])){
    $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
    $telepon_pelanggan = htmlspecialchars($_POST['telepon_pelanggan']);
    $alamat_pelanggan = htmlspecialchars($_POST['alamat_pelanggan']);

    $tambahkat = mysqli_query($conn,"INSERT INTO pelanggan (nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
    values ('$nama_pelanggan','$telepon_pelanggan','$alamat_pelanggan')");
    if ($tambahkat){
        echo '<script>window.location="index.php?page=pelanggan&alert=success1"</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
    }            
};

if(isset($_POST['updatePelanggan'])){
    $idpelanggan = htmlspecialchars($_POST['idpelanggan']);
    $nama_pelanggan = htmlspecialchars($_POST['nama_pelanggan']);
    $telepon_pelanggan = htmlspecialchars($_POST['telepon_pelanggan']);
    $alamat_pelanggan = htmlspecialchars($_POST['alamat_pelanggan']);

    mysqli_query($conn,"UPDATE pelanggan SET
    nama_pelanggan='$nama_pelanggan',telepon_pelanggan='$telepon_pelanggan',alamat_pelanggan='$alamat_pelanggan'
    WHERE idpelanggan='$idpelanggan' ");
    echo '<script>window.location="index.php?page=pelanggan&alert=success2"</script>';
};
?>

<div class="section">
    <div class="section-header">
        <h1>Data Pelanggan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel pelanggan</h4>
                        <?php if ($userData['level'] != 3) { ?>
                        <button type="button" class="btn btn-primary btn-xs p-2 float-right" style="margin-left: 630px;" data-toggle="modal" data-target="#addpelanggan">
                        <i class="fa fa-plus fa-xs mr-1"></i> Tambah Data</button>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <?php if ($userData['level'] != 3) { ?>
                                    <th>Opsi</th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                        $data_produk=mysqli_query($conn,"SELECT * FROM pelanggan order by idpelanggan ASC");
                                        while($d=mysqli_fetch_array($data_produk)){
                                            $idpelanggan = $d['idpelanggan'];
                                            ?>
                                            
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $d['nama_pelanggan'] ?></td>
                                                <td><?= $d['telepon_pelanggan'] ?></td>
                                                <td><?= $d['alamat_pelanggan'] ?></td>
                                                <?php if ($userData['level'] != 3) { ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs"
                                                    data-toggle="modal" data-target="#editP<?= $idpelanggan ?>">
                                                    <i class="fa fa-pen fa-xs mr-1"></i>Edit</button>
                                                    <a class="btn btn-danger btn-xs text-light" onclick="hapus_pelanggan(<?= $idpelanggan ?>)">
                                                        <i class="fa fa-trash fa--xs mr-1"></i> Hapus
                                                    </a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
                                        $no=1;
                                        $data_produk=mysqli_query($conn,"SELECT * FROM pelanggan order by idpelanggan ASC");
                                        while($d=mysqli_fetch_array($data_produk)){
                                            $idpelanggan = $d['idpelanggan'];
                                            ?>
                                            
                                            <!-- modal edit -->
                                            <div class="modal" style="z-index: 1050;" id="editP<?= $idpelanggan ?>" tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <form method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ModalTittle2"><i class="fa fa-user mr-1 text-muted"></i> Edit Pelanggan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group mb-2">
                                                            <label>Nama Pelanggan :</label>
                                                            <input type="hidden" name="idpelanggan" class="form-control" value="<?= $d['idpelanggan'] ?>">
                                                            <input type="text" name="nama_pelanggan" class="form-control" value="<?= $d['nama_pelanggan'] ?>" required>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label>Telepon :</label>
                                                            <input type="number" name="telepon_pelanggan" class="form-control" value="<?= $d['telepon_pelanggan'] ?>" required>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label>Alamat :</label>
                                                            <input type="text" name="alamat_pelanggan" class="form-control" value="<?= $d['alamat_pelanggan'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light btn-xs p-2" data-dismiss="modal">
                                                        <i class="fa fa-times mr-1"></i> Batal</button>
                                                        <button type="submit" class="btn btn-primary btn-xs p-2" name="updatePelanggan">
                                                        <i class="fa fa-plus-circle mr-1"></i> Simpan</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal edit -->
                                    <?php }?>

<script>
    function hapus_pelanggan(hapus_id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary mx-4',
                cancelButton: 'btn btn-danger mx-4'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Hapus Data Pelanggan',
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
                window.location=("pelanggan/hapus-pelanggan.php?id="+hapus_id)
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

<!-- Modal -->
<div class="modal fade" id="addpelanggan" tabindex="-1" role="dialog" aria-labelledby="ModalTittle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTittle"><i class="fa fa-shopping-bag mr-1 text-muted"></i> Tambah Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group mb-2">
                <label>Nama Pelanggan :</label>
                <input type="text" name="nama_pelanggan" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Telepon :</label>
                <input type="number" name="telepon_pelanggan" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Alamat :</label>
                <input type="text" name="alamat_pelanggan" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light btn-xs p-2" data-dismiss="modal">
            <i class="fa fa-times mr-1"></i> Batal</button>
        <button type="reset" class="btn btn-danger btn-xs p-2">
        <i class="fa fa-trash-restore-alt mr-1"></i> Reset</button>
        <button type="submit" class="btn btn-primary btn-xs p-2" name="tambahPelanggan">
        <i class="fa fa-plus-circle mr-1"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>