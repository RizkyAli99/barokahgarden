

<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "data_saya"; 
// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}
?>
