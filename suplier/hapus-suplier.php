<?php

    session_start();

    if (!isset($_SESSION["ssLogin"])) {
        header("location:../auth/login.php");
        exit();
    }

    require_once "../config.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM supplier WHERE idsupplier = :id";
    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?page=suplier");
    } else {
        echo "Hapus gagal: " . $stmt->errorInfo();
    }
