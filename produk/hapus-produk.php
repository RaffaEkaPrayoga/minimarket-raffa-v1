<?php 
        session_start();

        if (!isset($_SESSION["ssLogin"])) {
            header("location:../auth/login.php");
            exit();
        }

        require_once "../config.php";
        
		$idproduk = $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM produk WHERE idproduk='$idproduk'");
        if($hapus_data){
            echo '<script>window.location="../index.php?page=produk"</script>';
        } else {
            echo '<script>alert("gagal Hapus produk");history.go(-1);</script>';
        }
?>