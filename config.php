<?php
// pdo
$dbs = "mysql:host=localhost;dbname=dbs_kasir";
$username = "root";
$password = "";

try {
    $koneksi = new PDO($dbs, $username, $password);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
};

// mysql
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbs_kasir";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
}

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);

// url induk
$base_url = "http://localhost/market-raffa/";

function ribuan($nilai)
{
    return number_format($nilai, 0, ',', '.');
}


class Multiuser
{
    private $conn;
    private $userLogin;
    private $dataUser;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->userLogin = $_SESSION['ssUser'];
        $this->fetchUserData();
    }

    private function fetchUserData()
    {
        $cekUser = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$this->userLogin'");
        $this->dataUser = mysqli_fetch_assoc($cekUser);
    }

    // Metode untuk mendapatkan data pengguna
    public function getUserData()
    {
        return $this->dataUser;
    }
}
