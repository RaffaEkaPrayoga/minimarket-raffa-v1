<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
require __DIR__ . "/../asset/vendor/autoload.php";

$nota = $_GET['invoice'];
if (!isset($_GET['invoice'])) {
    echo '<script>alert("Data Tidak Di Temukan fdv");history.go(-1);</script>';
    exit();
}

$liatcust = mysqli_query($conn, "SELECT * FROM pelanggan e, laporan c WHERE no_nota='$nota' and e.idpelanggan=c.idpelanggan");
$checkdb = mysqli_fetch_array($liatcust);

$toko = 'Minimarket Raffa';
$alamat = 'Jalan Pattimura No.115 Kec. Sail Kota. Pekanbaru - Riau';
$telp = '08127723443';

$content = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .main-content {
            padding: 20px;
        }

        .section-header {
            text-align: center;
        }

        .card {
            border: 1px solid #dee2e6;
            margin-top: 20px;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .bg-light {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1 align="center">'.$toko.'</h1>
                    <p align="center">'.$alamat.'</p>
                    <p align="center">Telepon : '.$telp.'</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <br>
                        <br>
                        <br>
                        <div style="display: flex;">
                            <div>
                                <h3 style="margin-top: -2rem;">Invoice : ' . $nota . '</h3>
                                <p>Kasir : ' . $_SESSION['ssUser'] . '</p>
                                <p>Tanggal : ' . $checkdb['tgl_sub'] . '</p>
                            </div>
                            <div>
                                <p>Nama : ' . $checkdb['nama_pelanggan'] . '</p>
                                <p>Telepon : ' . $checkdb['telepon_pelanggan'] . '</p>
                                <p>Alamat : ' . $checkdb['alamat_pelanggan'] . '</p>
                            </div>
                        </div>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>';

$no = 1;
$data_produk = mysqli_query($conn, "SELECT * FROM nota t, produk p WHERE no_nota='$nota' and t.idproduk=p.idproduk ORDER BY t.idproduk ASC");
while ($d = mysqli_fetch_array($data_produk)) {
    $total = $d['quantity'] * $d['harga_jual'];
    $content .= '
        <tr>
            <td>' . $no++ . '</td>
            <td>' . $d['nama_produk'] . '</td>
            <hr>
            <td>' . $d['quantity'] . '</td>
            <hr>
            <td>Rp.' . ribuan($d['harga_jual']) . '</td>
            <hr>
            <td>Rp.' . ribuan($total) . '</td>
            <hr>
        </tr>';
}

$content .= '

                            </tbody>
                            <tr>
                                <th></th>
                                <th style="font-weight:600;">Total :</th>
                                <th></th>
                                <th></th>
                                <th style="font-weight:600;">Rp.' . ribuan($checkdb['totalbeli']) . '</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th style="font-weight:600;">Bayar :</th>
                                <th></th>
                                <th></th>
                                <th style="font-weight:600;">Rp.' . ribuan($checkdb['pembayaran']) . '</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th style="font-weight:600;">Kembali :</th>
                                <th></th>
                                <th></th>
                                <th style="font-weight:600;">Rp.' . ribuan($checkdb['kembalian']) . '</th>
                            </tr>
                        </table>
                        <hr>
                        <p style="font-weight:600;">Catatan : ' . $checkdb['catatan'] . '</p>
                    </div>
                </div>
            </div>
            <h3 align="center">* Terima Kasih Telah Berbelanja Di Toko Kami *</h3>
        </div>
    </div>
</body>
</html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($content);

$mpdf->Output();

?>
