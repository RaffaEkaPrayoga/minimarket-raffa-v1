<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:auth/login.php");
    exit();
}

require_once "config.php";

require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";

    if (isset($_GET["page"])) {
        if ($_GET["page"]=="dashboard") {
            include ("template/dashboard.php");
        }
        else if ($_GET["page"]=="suplier") {
            include ("suplier/suplier.php");
        }
        else if ($_GET["page"]=="add-suplier") {
            include ("suplier/add-suplier.php");
        }
        else if ($_GET["page"]=="edit-suplier") {
            include ("suplier/edit-suplier.php");
        }
        else if ($_GET["page"]=="pembelian") {
            include ("pembelian/pembelian.php");
        }
        else if ($_GET["page"]=="add-pembelian") {
            include ("pembelian/add-pembelian.php");
        }
        else if ($_GET["page"]=="edit-pembelian") {
            include ("pembelian/edit-pembelian.php");
        }
        else if ($_GET["page"]=="kategori") {
            include ("kategori/kategori.php");
        }
        else if ($_GET["page"]=="pelanggan") {
            include ("pelanggan/pelanggan.php");
        }
        else if ($_GET["page"]=="produk") {
            include ("produk/produk.php");
        }
        else if ($_GET["page"]=="transaksi") {
            include ("transaksi/transaksi.php");
        }
        else if ($_GET["page"]=="detail") {
            include ("laporan/detail.php");
        }
        else if ($_GET["page"]=="laporan") {
            include ("laporan/laporan.php");
        }
        else {
            include ("error/404.php");
        }
    }
    else {
        include ("template/dashboard.php");
    }

require_once "template/footer.php";

?>