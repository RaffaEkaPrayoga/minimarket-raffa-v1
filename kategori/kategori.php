<?php 
$multiuser = new Multiuser($conn); 
?>
 
<div class="main-content">
<?php
            if(isset($_POST['addkategori']))
            {
                $namakategori = htmlspecialchars($_POST['nama_kategori']);    
                $tambahkat = mysqli_query($conn,"INSERT INTO kategori (nama_kategori) values ('$namakategori')");
                if ($tambahkat){
                    echo '<script>window.location="index.php?page=kategori&alert=success1"</script>';
                } else {
                    echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
                }
                
            };
            ?>
<div class="section">
    <div class="section-header">
        <h1>Data Kategori </h1>
    </div>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Kategori</h4>
                    <div style="margin-left: 50%; ">
                        <?php
                        if ($userData['level'] != 3) { 
                            if(!empty($_GET['edit'])){
                                $idkategori = $_GET['edit'];
                                $edit = mysqli_query($conn,"SELECT * FROM kategori WHERE idkategori='$idkategori'");
                                while($e=mysqli_fetch_array($edit)){
                                    $namo= $e['nama_kategori'];
                                    echo '<form method="POST" class="float-right">
                                    <div class="input-group">
                                        <input type="text" name="nama_kategori" class="form-control form-control-sm bg-white"
                                        style="border-radius:0.428rem 0px 0px 0.428rem; margin-top: 2px;"
                                        placeholder="Masukan Kategori" value="'.$namo.'" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" name="update"
                                            style="border-radius: 0px 0.428rem 0.428rem 0px; margin-bottom: 10px;" type="submit">
                                                <i class="fas fa-check"></i><span class="d-none d-sm-inline-block d-md-inline-block ml-1">Update</span>
                                            </button>
                                            <a href="index.php?page=kategori" class="btn btn-danger btn-xs py-1 px-2 ml-1" style="margin-bottom: 10px;"><i class="fas fa-times"></i>
                                            <span class="d-none d-sm-inline-block d-md-inline-block ml-1" >Batal</span></a>
                                        </div>
                                    </div>
                                </form>';
                                }
                                if(isset($_POST['update'])){
                                    $namakategori = htmlspecialchars($_POST['nama_kategori']);
                                    $editup = mysqli_query($conn,"UPDATE kategori SET nama_kategori='$namakategori' WHERE idkategori='$idkategori'");
                                    echo '<script>window.location="index.php?page=kategori&alert=success2"</script>';
                                    }
                            } else { ?>
                                <form method="POST" class="float-right">
                                <div class="input-group">
                                    <input type="text" name="nama_kategori" class="form-control form-control-sm bg-white"
                                    style="border-radius:0.428rem 0px 0px 0.428rem; margin-top: 2px;"
                                    placeholder="Masukan Kategori" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-xl" name="addkategori"
                                        style="border-radius: 0px 0.428rem 0.428rem 0px;" type="submit">
                                            <i class="fa fa-plus"></i><span class="d-none d-sm-inline-block d-md-inline-block ml-1">Tambah</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Qty</th>
                            <th>Tanggal</th>
                            <?php if ($userData['level'] != 3) { ?>
                            <th>Opsi</th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                                $data_produk=mysqli_query($conn,"SELECT * FROM kategori ORDER BY idkategori ASC");
                                while($d=mysqli_fetch_array($data_produk)){
                                    $idkategori = $d['idkategori'];
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $d['nama_kategori'] ?></td>
                                        <td><?php 
                                            $result1 = mysqli_query($conn,"SELECT Count(idproduk) AS count FROM produk p, kategori k WHERE p.idkategori=k.idkategori and k.idkategori='$idkategori' ORDER BY idproduk ASC");
                                            $cekrow = mysqli_num_rows($result1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                            $count = $row1['count'];
                                            if($cekrow > 0){
                                            echo ribuan($count);
                                            }
                                        ?></td>
                                        <td><?php echo $d['tgl_dibuat'] ?></td>
                                        <?php if ($userData['level'] != 3) { ?>
                                        <td>
                                        <a href="index.php?page=kategori&edit=<?php echo $idkategori ?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pen fa-xs mr-1"></i>Edit
                                        </a>
                                            <a class="btn btn-danger btn-xs text-light" onclick="hapus_kategori(<?= $idkategori ?>)">
                                            <i class="fa fa-trash fa-xs mr-1"></i>Hapus</a>
                                        </td>
                                        <?php } ?>
                                    </tr>		
                        <?php }?>
					</tbody>
                </table>
        </div>
</div>

<script>
    function hapus_kategori(hapus_id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary mx-4',
                cancelButton: 'btn btn-danger mx-4'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Hapus Data Kategori',
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
                window.location=("kategori/hapus-kategori.php?id="+hapus_id)
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