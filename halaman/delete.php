<?php
// Memasukkan file db.php untuk koneksi ke database
include 'db.php';

// Memeriksa apakah parameter ID telah diterima melalui URL
if (isset($_GET['id'])) {
    // Mengambil nilai ID dari parameter URL
    $id = $_GET['id'];

    // Query SQL untuk menghapus data dari tabel berdasarkan ID
    $sql = "DELETE FROM articles WHERE id=$id";

    // Menjalankan query dan memeriksa apakah proses penghapusan berhasil
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully"; // Pesan sukses jika penghapusan berhasil
    } else {
        echo "Error deleting record: " . $conn->error; // Pesan error jika terjadi kesalahan saat penghapusan
    }

    // Menutup koneksi ke database
    $conn->close();

    // Mengarahkan pengguna kembali ke halaman index.php setelah penghapusan selesai
    header("Location: index.php");
}
?>
