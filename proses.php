<?php
// Mengimpor file koneksi
require_once 'koneksi.php';

// Memeriksa apakah data telah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari formulir
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Menyimpan data ke database
    $query = "INSERT INTO tbl_users (username, email, password) VALUES ('$username', '$email', '$password')";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil disimpan ke database.";
        header("Location: login.html");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }

    // Menutup koneksi
    mysqli_close($koneksi);
}
?>
