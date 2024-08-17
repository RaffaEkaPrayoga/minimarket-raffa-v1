<?php
require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passConf = $_POST["passConf"];
    $level = 3;

    // Validasi data yang masuk
    if (empty($nama) || empty($alamat) || empty($username) || empty($password) || empty($passConf)) {
        header("Location: register.php?alert=err1");
    } elseif ($password !== $passConf) {
        header("Location: register.php?alert=err2");
    } else {
        // Hash password sebelum menyimpannya ke database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO user (nama, alamat, username, password, level) VALUES (:nama, :alamat, :username, :password, :level)";
        $stmt = $koneksi->prepare($sql);

        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':level', $level);
        
         if ($stmt->execute()) {
        header("Location: register.php?alert=success");
        } else {
            echo "Registrasi gagal: " . $stmt->errorInfo();
        }
    }
}
?>