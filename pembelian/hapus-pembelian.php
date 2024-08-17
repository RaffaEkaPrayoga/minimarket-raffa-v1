<?php 
        session_start();

        if (!isset($_SESSION["ssLogin"])) {
            header("location:../auth/login.php");
            exit();
        }

        require_once "../config.php";
        
		$idpembelian = $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM pembelian WHERE idpembelian='$idpembelian'");
        if($hapus_data){
            echo '<script>window.location="../index.php?page=pembelian"</script>';
        } else {
            echo '<script>alert("gagal Hapus pembelian");history.go(-1);</script>';
        }
?>