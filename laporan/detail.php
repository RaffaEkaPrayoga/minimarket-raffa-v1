<?php 
$multiuser = new Multiuser($conn); 
$userData = $multiuser->getUserData();
if ($userData['level'] == 3) { 
  echo "<script>
       window.location = 'index.php?alert=err2';
    </script>";
    exit;
}

?>

<div class="main-content">
<div class="section">
    <div class="section-header">
        <h1>Detail Laporan </h1>
    </div>
    <div class="card">
            <div class="card-body">
                    <a href="<?= $base_url?>index.php?page=laporan" class="btn btn-light btn-xs mt-3" style="font-weight:500; margin-left: 50rem;"><i class="fa fa-chevron-left fa-xs"></i> Kembali</a>
                    <?php
                    $nota = $_GET['invoice'];
                    if(!isset($_GET['invoice'])){
                        echo '<script>alert("Data Tidak Di Temukan");history.go(-1);</script>';
                    }
                    $liatcust = mysqli_query($conn,"SELECT * FROM pelanggan e, laporan c WHERE no_nota='$nota' and e.idpelanggan=c.idpelanggan");
                    $checkdb = mysqli_fetch_array($liatcust);
                    ?>
                    <a href="laporan/print-laporan.php?invoice=<?= $nota ?>" target="_BLANK" class="btn btn-xs btn-info" style="font-weight:500; margin-left: 51rem; margin-top: 1rem;"> PDF</a>
                <br>
                <div class="row">
                <div class="col-sm-6">
                    <h5 class="mb-4" style="margin-top: -5rem;">Invoice : <?= $nota ?></h5>
                    <br><br>
                    <p class="small mb-0">Kasir : <?= $_SESSION ['ssUser'] ?></p>
                    <p class="small mb-0">Tanggal : <?= $checkdb['tgl_sub'] ?></p>
                </div>
                <div class="col-sm-6 mb-4">
                    <p class="small mb-0">Nama : <?= $checkdb['nama_pelanggan'] ?></p>
                    <p class="small mb-0">Telepon : <?= $checkdb['telepon_pelanggan'] ?></p>
                    <p class="small mb-0">Alamat : <?= $checkdb['alamat_pelanggan'] ?></p>
                </div>
            </div>
            <table class="table table-sm" id="cart" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                 $no=1;
                                 $data_produk=mysqli_query($conn,"SELECT * FROM nota t, produk p
                                 WHERE no_nota='$nota' and t.idproduk=p.idproduk ORDER BY t.idproduk ASC");
                                 while($d=mysqli_fetch_array($data_produk)){
                                    $total = $d['quantity']*$d['harga_jual'];
                                    ?>
                                    
                                    <tr>
                                        <td style="border: 1px solid #dee2e6;"><?= $no++ ?></td>
                                        <td style="border: 1px solid #dee2e6;"><?= $d['nama_produk'] ?></td>
                                        <td style="border: 1px solid #dee2e6;"><?= $d['quantity'] ?></td>
                                        <td style="border: 1px solid #dee2e6;">Rp.<?= ribuan($d['harga_jual']) ?></td>
                                        <td style="border: 1px solid #dee2e6;">Rp.<?= ribuan($total) ?></td>
                                    </tr>		
                        <?php }?>
					</tbody>
                    <tr>
                        <th class="d-none d-sm-block d-md-block border-0 bg-white"></th>
                        <th class="border-0 bg-white"></th>
                        <th class="border-0 bg-white"></th>
                        <th class="text-right bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Total :</th>
                        <th class="bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Rp.<?= ribuan($checkdb['totalbeli']) ?></th>
                    </tr>
                    <tr>
                        <th class="d-none d-sm-block d-md-block border-0 bg-white"></th>
                        <th class="border-0 bg-white"></th>
                        <th class="border-0 bg-white"></th>
                        <th class="text-right bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Bayar :</th>
                        <th class="bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Rp.<?= ribuan($checkdb['pembayaran']) ?></th>
                    </tr>
                    <tr>
                        <th class="d-none d-sm-block d-md-block border-0 bg-white"></th>
                        <th class="border-0 bg-white"></th>
                        <th class="border-0 bg-white"></th>
                        <th class="text-right bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Kembali :</th>
                        <th class="bg-light" style="border: 1px solid #dee2e6;font-weight:600;">Rp.<?= ribuan($checkdb['kembalian']) ?></th>
                    </tr>
                </table>
                <p class="small mb-0" style="font-weight:600;">Catatan :</p>
                <p class="small text-muted"><?= $checkdb['catatan'] ?></p>
            </div>
        </div>