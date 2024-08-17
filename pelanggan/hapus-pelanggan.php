<?php 
        session_start();

        if (!isset($_SESSION["ssLogin"])) {
            header("location:../auth/login.php");
            exit();
        }

        require_once "../config.php";
        
		$idpelanggan = $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM pelanggan WHERE idpelanggan='$idpelanggan'");
        if($hapus_data){
            echo '<script>window.location="../index.php?page=pelanggan"</script>';
        } else {
            echo '<script>alert("gagal Hapus pelanggan");history.go(-1);</script>';
        }
?>