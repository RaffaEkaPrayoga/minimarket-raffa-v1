<?php 
        session_start();

        if (!isset($_SESSION["ssLogin"])) {
            header("location:../auth/login.php");
            exit();
        }

        require_once "../config.php";

if(isset($_POST['simpan'])){
    $nonota = $_POST['no_nota'];
    $idpell = $_POST['idpelanggan'];
    $totalbeli = $_POST['totalbeli'];
    $pembayaran= $_POST['pembayaran'];
    $kembalian = $_POST['kembalian'];
    $catatan = htmlspecialchars($_POST['catatan']);

    $updatetkeranjang = mysqli_query($conn,"UPDATE keranjang SET
      no_nota='$nonota'") 
     or die (mysqli_connect_error()); 

     $ambildatacart = mysqli_query($conn,"INSERT INTO nota
     (no_nota,idproduk,quantity)
    SELECT no_nota,idproduk,quantity FROM keranjang") 
     or die (mysqli_connect_error()); 

     $insertlaporan = mysqli_query($conn, "INSERT INTO laporan (no_nota,idpelanggan,catatan, totalbeli, pembayaran,kembalian)
      VALUES ('$nonota', $idpell,'$catatan', $totalbeli, $pembayaran,$kembalian)");

    $hapusdatacart = mysqli_query($conn,"DELETE FROM keranjang");
    
    if($updatetkeranjang&&$ambildatacart&&$insertlaporan ){
        echo '<script>window.location="../index.php?page=detail&alert=success1&invoice='.$nonota.'"</script>';
    } else {
        echo '<script>history.go(-1);</script>';
    }
}
?>