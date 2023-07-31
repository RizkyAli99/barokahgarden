<?php
// Pastikan koneksi ke database sudah dibuat
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Periksa apakah username ada di tabel pengguna (ganti 'nama_tabel_pengguna' dengan nama tabel Anda)
    $query = "SELECT * FROM tbl_users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // Periksa apakah password cocok dengan password di database
        if (password_verify($password, $row['password'])) {
            // Jika password cocok, maka login berhasil
            session_start();
            $_SESSION['username'] = $username;
            // Lakukan tindakan setelah berhasil login, misalnya arahkan ke halaman beranda.
            header("Location: index.html");
            exit(); // Penting untuk menghentikan eksekusi skrip setelah redirect
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }

    // Tutup koneksi
    mysqli_close($koneksi);
}
?>
