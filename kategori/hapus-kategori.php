<?php 
        session_start();

        if (!isset($_SESSION["ssLogin"])) {
            header("location:../auth/login.php");
            exit();
        }

        require_once "../config.php";
        
		$idkategori = $_GET['id'];
		$hapus_data = mysqli_query($conn, "DELETE FROM kategori WHERE idkategori='$idkategori'");
        if($hapus_data){
            echo '<script>window.location="../index.php?page=kategori"</script>';
        } else {
            echo '<script>alert("gagal Hapus kategori");history.go(-1);</script>';
        }
?>