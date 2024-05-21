<?php
// Nama server database
$servername = "localhost";

// Nama pengguna MySQL
$username = "root"; // Nama pengguna MySQL Anda

// Kata sandi MySQL
$password = ""; // Kata sandi MySQL Anda

// Nama database yang akan digunakan
$dbname = "blog";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    // Jika koneksi gagal, menampilkan pesan error dan menghentikan eksekusi script
    die("Connection failed: " . $conn->connect_error);
}
?>
