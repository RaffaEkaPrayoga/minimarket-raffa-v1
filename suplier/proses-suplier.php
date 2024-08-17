<?php
session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";

if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    $sql = "INSERT INTO supplier (nama_supplier, alamat_supplier, telepon_supplier) VALUES (:nama, :alamat, :telepon)";
    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':telepon', $telepon);

    if($stmt->execute()) {
        header("Location:../index.php?page=suplier&alert=success1");
    } else {
        echo "Penambahan gagal: " . $stmt->errorInfo();
    }
}

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    $sql = "UPDATE supplier SET nama_supplier = :nama, alamat_supplier = :alamat, telepon_supplier = :telepon WHERE idsupplier = :id";
    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':telepon', $telepon);

    if ($stmt->execute()) {
        header("Location:../index.php?page=suplier&alert=success2");
    } else {
        echo "Update gagal: " . $stmt->errorInfo()[2];
    }
}



?>