<?php
session_start();

require_once "../config.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        // Pesan kesalahan jika ada kolom yang kosong
        header("Location: login.php?alert=err1");
    } else {
        $sql = "SELECT id, password FROM user WHERE username=?";
        $query = $koneksi->prepare($sql);
        $query->execute(array($username));
        $fetch = $query->fetch();

        if ($fetch && password_verify($password, $fetch['password'])) {
            $_SESSION['ssLogin'] = $fetch['id'];
            $_SESSION["ssUser"] = $username;
            header("location: ../index.php");
        } else {
            // Pesan kesalahan jika username atau password salah
            header("Location: login.php?alert=err2");
        }
    }
}
?>
