<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$host = 'localhost:3307';
$user = 'root';
$pass = '';
$dbname = 'keuangan_santri';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['wali_id'])) {
        header('Location: login.php');
        exit;
    }
}
?>