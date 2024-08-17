<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if(isset($_POST['tambah'])) {
  $supplier = $_POST["supplier"];
  $produk = $_POST["produk"];
  $jumlah = $_POST["jumlah"];

  // Query untuk menambah data pembelian ke database
  $query_insert = "INSERT INTO pembelian (idsupplier, idproduk, jumlah_pembelian) VALUES ('$supplier', '$produk', '$jumlah')";
  $result_insert = mysqli_query($conn, $query_insert);

  if ($result_insert) {
    // Redirect ke halaman tampil data pembelian jika sukses
    header("Location: ../index.php?page=pembelian&alert=success1");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

if(isset($_POST['update-pembelian'])) {
    $idpembelian = $_POST['id'];
    $supplier = $_POST["supplier"];
    $produk = $_POST["produk"];
    $jumlah = $_POST["jumlah"];

    // Query untuk mengupdate data pembelian di database
    $query_update = "UPDATE pembelian SET idsupplier='$supplier', idproduk='$produk', jumlah_pembelian='$jumlah' WHERE idpembelian='$idpembelian'";
    $result_update = mysqli_query($conn, $query_update);

    if ($result_update) {
        // Redirect ke halaman tampil data pembelian jika sukses
        header("Location: ../index.php?page=pembelian&alert=success2");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}



mysqli_close($conn);
?>