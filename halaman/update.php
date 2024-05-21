<?php
// Memasukkan file db.php untuk koneksi ke database
include 'db.php';

// Memeriksa apakah request yang diterima adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari formulir yang dikirimkan melalui metode POST
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

    // Query SQL untuk memperbarui data artikel berdasarkan ID
    $sql = "UPDATE articles SET title='$title', content='$content', image_url='$image_url', category='$category' WHERE id=$id";

    // Menjalankan query dan memeriksa apakah proses pembaruan berhasil
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully"; // Pesan sukses jika pembaruan berhasil
    } else {
        echo "Error updating record: " . $conn->error; // Pesan error jika terjadi kesalahan saat pembaruan
    }

    // Menutup koneksi ke database
    $conn->close();

    // Mengarahkan pengguna kembali ke halaman index.php setelah pembaruan selesai
    header("Location: index.php");
}
?>
