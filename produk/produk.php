<?php 
$multiuser = new Multiuser($conn); 
?>

<div class="main-content">
<?php
            if(isset($_POST['tambahProduk']))
            {
                $idkategori = htmlspecialchars($_POST['idkategori']);
                $kodeproduk = htmlspecialchars($_POST['kode_produk']);
                $namaproduk = htmlspecialchars($_POST['nama_produk']);
                $stock = htmlspecialchars($_POST['stock']);
                $harga_modal = htmlspecialchars($_POST['harga_modal']);
                $harga_jual = htmlspecialchars($_POST['harga_jual']);

                $tambahkat = mysqli_query($conn,"INSERT INTO produk (idkategori,kode_produk,nama_produk,stock,harga_modal,harga_jual)
                 values ('$idkategori','$kodeproduk','$namaproduk','$stock','$harga_modal','$harga_jual')");
                if ($tambahkat){
                    echo '<script>window.location="index.php?page=produk&alert=success1"</script>';
                } else {
                    echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
                }
                
            };

            if(isset($_POST['updateProduk'])){
                $idproduk = htmlspecialchars($_POST['idproduk']);
                $idkategori = htmlspecialchars($_POST['idkategori']);
                $kodeproduk = htmlspecialchars($_POST['kode_produk']);
                $namaproduk = htmlspecialchars($_POST['nama_produk']);
                $stock = htmlspecialchars($_POST['stock']);
                $harga_modal = htmlspecialchars($_POST['harga_modal']);
                $harga_jual = htmlspecialchars($_POST['harga_jual']);

                mysqli_query($conn,"UPDATE produk SET
                idkategori='$idkategori',nama_produk='$namaproduk',kode_produk='$kodeproduk',
                stock='$stock',harga_modal='$harga_modal',harga_jual='$harga_jual' WHERE idproduk='$idproduk' ");
                echo '<script>window.location="index.php?page=produk&alert=success2"</script>';
            };
            ?>
<div class="section">
    <div class="section-header">
        <h1><i class="fa fa-table me-2"></i> Data Produk </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Produk</h4>
                        <?php if ($userData['level'] != 3) {  ?>
                        <button type="button" class="btn btn-primary btn-xs p-2" style="margin-left: 70%; margin-top: 20px;" data-toggle="modal" data-target="#addproduk">
                            <i class="fa fa-plus fa-xs mr-1"></i> Tambah Produk</button>
                        <?php }?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Stock</th>
                                        <th>Harga Modal</th>
                                        <th>Harga Jual</th>
                                        <th>Tanggal Input</th>
                                        <?php if ($userData['level'] != 3) {  ?>
                                        <th>Opsi</th>
                                        <?php }?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $data_produk=mysqli_query($conn,"SELECT * FROM kategori k, produk p WHERE k.idkategori=p.idkategori order by idproduk ASC");
                                            while($d=mysqli_fetch_array($data_produk)){
                                                $idproduk = $d['idproduk'];
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $d['kode_produk'] ?></td>
                                                    <td><?php echo $d['nama_produk'] ?></td>
                                                    <td><?php echo $d['nama_kategori'] ?></td>
                                                    <td><?php echo $d['stock'] ?></td>
                                                    <td>Rp.<?php echo ribuan($d['harga_modal']) ?></td>
                                                    <td>Rp.<?php echo ribuan($d['harga_jual']) ?></td>
                                                    <td><?php echo $d['tgl_input'] ?></td>
                                                    <?php if ($userData['level'] != 3) {  ?>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal" data-target="#editP<?php echo $idproduk ?>">
                                                        <i class="fa fa-pen"></i></button>
                                                        <a class="btn btn-danger btn-sm text-light" 
                                                        onclick="hapus_produk(<?= $idproduk ?>)">
                                                        <i class="fa fa-trash"></i></a>
                                                    </td>
                                                    <?php }?>
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
                                            $data_produk=mysqli_query($conn,"SELECT * FROM kategori k, produk p WHERE k.idkategori=p.idkategori order by idproduk ASC");
                                            while($d=mysqli_fetch_array($data_produk)){
                                                $idproduk = $d['idproduk'];
                                                ?>
                                                
                                                
                                                <!-- modal edit -->
                                                <div class="modal fade" id="editP<?php echo $idproduk ?>" tabindex="-1" role="dialog" aria-labelledby="ModalTittle2" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="post">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalTittle2"><i class="fa fa-shopping-bag mr-1 text-muted"></i> Edit Produk</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-2">
                                                                <label>Kode Produk :</label>
                                                                <input type="hidden" name="idproduk" class="form-control" value="<?php echo $d['idproduk'] ?>">
                                                                <input type="text" name="kode_produk" class="form-control" value="<?php echo $d['kode_produk'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                            <label>Nama Produk :</label>
                                                                <input type="text" name="nama_produk" class="form-control" value="<?php echo $d['nama_produk'] ?>" required>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label>Kategori Produk :</label>
                                                                    <select name="idkategori" class="form-control" required>
                                                                        <option value="<?php echo $d['idkategori'] ?>" class="small"><?php echo $d['nama_kategori'] ?></option>
                                                                    <?php
                                                                    $dataK=mysqli_query($conn,"SELECT * FROM kategori ORDER BY nama_kategori ASC")or die(mysqli_error($conn));
                                                                    while($dk=mysqli_fetch_array($dataK)){
                                                                    ?>
                                                                    <option value="<?php echo $dk['idkategori'] ?>" class="small"><?php echo $dk['nama_kategori'] ?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-2 col-md-2 pr-0">
                                                                    <label>Stock :</label>
                                                                    <input type="number" name="stock" class="form-control" value="<?php echo $d['stock'] ?>" required>
                                                                </div>
                                                                <div class="col-5 col-md-5 pr-0">
                                                                    <label>Harga Modal :</label>
                                                                    <input type="number" name="harga_modal" value="<?php echo $d['harga_modal'] ?>" class="form-control" required>
                                                                </div>
                                                                <div class="col-5 col-md-5">
                                                                    <label>Harga Jual :</label>
                                                                    <input type="number" name="harga_jual" value="<?php echo $d['harga_jual'] ?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light btn-xs p-2" data-dismiss="modal">
                                                                <i class="fa fa-times mr-1"></i> Batal</button>
                                                            <button type="submit" class="btn btn-primary btn-xs p-2" name="updateProduk">
                                                            <i class="fa fa-plus-circle mr-1"></i> Simpan</button>
                                                        </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <!-- end modal edit -->
                                    <?php }?>


<script>
    function hapus_produk(hapus_id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary mx-4',
                cancelButton: 'btn btn-danger mx-4'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Hapus Data Produk',
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
                window.location=("produk/hapus-produk.php?id="+hapus_id)
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
<div class="modal fade" id="addproduk" tabindex="-1" role="dialog" aria-labelledby="ModalTittle" aria-hidden="true">
<?php 
$query = mysqli_query($conn, "SELECT max(kode_produk) as kodeTerbesar FROM produk");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTittle"><i class="fa fa-shopping-bag mr-1 text-muted"></i> Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group mb-2">
              <label>Kode Produk :</label>
              <input type="text" name="kode_produk" class="form-control" value="<?php echo $kodeBarang;?>" readonly>
          </div>
          <div class="form-group mb-2">
              <label>Nama Produk :</label>
              <input type="text" name="nama_produk" class="form-control" required>
          </div>
          <div class="form-group mb-2">
              <label>Kategori Produk :</label>
                <select name="idkategori" class="form-control" required>
                <?php
                $dataK=mysqli_query($conn,"SELECT * FROM kategori ORDER BY nama_kategori ASC")or die(mysqli_error($conn));
                while($dk=mysqli_fetch_array($dataK)){
                ?>
                    <option value="<?php echo $dk['idkategori'] ?>" class="small"><?php echo $dk['nama_kategori'] ?></option>
                    <?php } ?>
                </select>
          </div>
          <div class="row mb-2">
              <div class="col-2 col-md-2 pr-0">
                <label>Stock :</label>
                <input type="number" name="stock" class="form-control" required>
              </div>
              <div class="col-5 col-md-5 pr-0">
                <label>Harga Modal :</label>
                <input type="number" name="harga_modal" class="form-control" required>
              </div>
              <div class="col-5 col-md-5">
                <label>Harga Jual :</label>
                <input type="number" name="harga_jual" class="form-control" required>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light btn-xs p-2" data-dismiss="modal">
            <i class="fa fa-times mr-1"></i> Batal</button>
        <button type="reset" class="btn btn-danger btn-xs p-2">
        <i class="fa fa-trash-restore-alt mr-1"></i> Reset</button>
        <button type="submit" class="btn btn-primary btn-xs p-2" name="tambahProduk">
        <i class="fa fa-plus-circle mr-1"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
