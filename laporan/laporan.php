<?php 
$multiuser = new Multiuser($conn); 
$userData = $multiuser->getUserData();
if ($userData['level'] == 3) { 
  echo "<script>
       window.location = 'index.php?alert=err2';
    </script>";
    exit;
}?>

<div class="main-content">
<div class="section">
    <div class="section-header">
        <h1>Data Laporan </h1>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa fa-table me-2"></i> Data Laporan 
            </div>
            
        </div>
            <div class="card-body">
                <table class="table table-striped table-sm table-bordered dt-responsive nowrap" id="table" width="100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Nota</th>
                                <th>Pelanggan</th>
                                <th>Qty</th>
                                <th>Catatan</th>
                                <th>SubTotal</th>
                                <th>Pembayaran</th>
                                <th>Kembalian</th>
                                <th>Tanggal</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $data_produk=mysqli_query($conn,"SELECT * FROM laporan l, pelanggan e
                                    WHERE  e.idpelanggan=l.idpelanggan ORDER BY idlaporan ASC");
                                    while($d=mysqli_fetch_array($data_produk)){
                                        $idlaporan= $d['idlaporan'];
                                        $nota= $d['no_nota'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $d['no_nota'] ?></td>
                                            <td><?php echo $d['nama_pelanggan'] ?></td>
                                            <td><?php 
                                                $itungtrans = mysqli_query($conn,"SELECT SUM(quantity) as jumlahtrans
                                                FROM nota where no_nota='$nota'");
                                                $itungtrans2 = mysqli_fetch_assoc($itungtrans);
                                                $itungtrans3 = $itungtrans2['jumlahtrans'];
                                                echo $itungtrans3;
                                            ?></td>
                                            <td class="catatan"><?php echo $d['catatan'] ?></td>
                                            <td>Rp.<?php echo ribuan($d['totalbeli']) ?></td>
                                            <td>Rp.<?php echo ribuan($d['pembayaran']) ?></td>
                                            <td>Rp.<?php echo ribuan($d['kembalian']) ?></td>
                                            <td><?php echo $d['tgl_sub'] ?></td>
                                            <td>
                                            <a class="btn btn-info btn-xs" href="index.php?page=detail&invoice=<?php echo $nota ?>">
                                                <i class="fa fa-eye fa-xs"></i> Lihat</a>
                                            </td>
                                        </tr>		
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>