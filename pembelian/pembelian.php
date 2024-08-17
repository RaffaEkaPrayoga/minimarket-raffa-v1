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
    <div class="section">
        <div class="section-header">
            <h1>Data Pembelian</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel pembelian</h4>
                            <a href="<?=$base_url?>index.php?page=add-pembelian" class="btn btn-primary btn-xs p-2 float-right" style="margin-left: 70%;">
                                <i class="fa fa-plus fa-xs mr-1"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Supplier</th>
                                            <th>Produk</th>
                                            <th>Jumlah Pembelian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Query to fetch data from the database
                                        $query_select = "SELECT pembelian.*, supplier.nama_supplier, produk.nama_produk FROM pembelian
                                                        JOIN supplier ON pembelian.idsupplier = supplier.idsupplier
                                                        JOIN produk ON pembelian.idproduk = produk.idproduk";
                                        $result_select = mysqli_query($conn, $query_select);

                                        if (!$result_select) {
                                            die("Query failed: " . mysqli_error($conn));
                                        }

                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result_select)) { ?>
                                            <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row['nama_supplier']?></td>
                                            <td><?=$row['nama_produk']?></td>
                                            <td><?=$row['jumlah_pembelian']?></td>
                                            <td>
                                                <a href='<?= $base_url?>index.php?page=edit-pembelian&id=<?= $row["idpembelian"] ?>' class='btn btn-primary btn-xs'>
                                                    <i class='fa fa-pen fa-xs mr-1'></i>Edit
                                                </a>
                                                <a class='btn btn-danger btn-xs text-light' onclick='hapus_pembelian(<?= $row["idpembelian"] ?>)'>
                                                <i class='fa fa-trash fa-xs mr-1'></i>Hapus</a>
                                            </td>
                                        </tr>
                                        <?php    
                                        $no++;
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus_pembelian(hapus_id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary mx-4',
                cancelButton: 'btn btn-danger mx-4'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Hapus Data Pembelian',
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
                window.location=("pembelian/hapus-pembelian.php?id="+hapus_id)
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