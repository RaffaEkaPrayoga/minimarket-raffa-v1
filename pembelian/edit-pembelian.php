<?php
$multiuser = new Multiuser($conn); 
$userData = $multiuser->getUserData();
if ($userData['level'] != 1) { 
  echo "<script>
       window.location = 'index.php?alert=err2';
    </script>";
    exit;
}

$idpembelian = $_GET['id'];
$query_pembelian = "SELECT * FROM pembelian WHERE idpembelian = $idpembelian";
$result_pembelian = mysqli_query($conn, $query_pembelian);
$row_pembelian = mysqli_fetch_assoc($result_pembelian);
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pembelian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?=$base_url?>index.php?page=pembelian">pembelian</a></div>
                <div class="breadcrumb-item"><a href="<?=$base_url?>index.php?page=edit-pembelian">Update pembelian</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-4 col-md-8 col-lg-12">
                    <div class="card">
                        <form action="<?=$base_url?>pembelian/proses-pembelian.php" method="post">
                            <div class="card-header">
                                <h4>Update Data Pembelian</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $idpembelian?>">
                                <div class="form-group">
                                    <label for="supplier">Supplier:</label>
                                    <select class="form-control" id="supplier" name="supplier">
                                        <?php
                                        $query_supplier = "SELECT * FROM supplier";
                                        $result_supplier = mysqli_query($conn, $query_supplier);
                                        while ($row_supplier = mysqli_fetch_assoc($result_supplier)) {
                                            $selected = ($row_supplier['idsupplier'] == $row_pembelian['idsupplier']) ? 'selected' : '';
                                            echo "<option value='{$row_supplier['idsupplier']}' $selected>{$row_supplier['nama_supplier']}</option>";
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
                                            $selected = ($row_produk['idproduk'] == $row_pembelian['idproduk']) ? 'selected' : '';
                                            echo "<option value='{$row_produk['idproduk']}' $selected>{$row_produk['nama_produk']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Pembelian:</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $row_pembelian['jumlah_pembelian'] ?>" required>
                                </div>
                                <button type="submit" name="update-pembelian" class="btn btn-primary">Update Pembelian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
