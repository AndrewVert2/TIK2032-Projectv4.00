<?php
// Memasukkan file db.php untuk koneksi ke database
include 'db.php';

// Memeriksa apakah request yang diterima adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari formulir yang dikirimkan melalui metode POST
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

    // Query SQL untuk memasukkan data artikel baru ke dalam database
    $sql = "INSERT INTO articles (title, content, image_url, category) VALUES ('$title', '$content', '$image_url', '$category')";

    // Menjalankan query dan memeriksa apakah proses penambahan berhasil
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully"; // Pesan sukses jika penambahan berhasil
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Pesan error jika terjadi kesalahan saat penambahan
    }

    // Menutup koneksi ke database
    $conn->close();

    // Mengarahkan pengguna kembali ke halaman index.php setelah penambahan selesai
    header("Location: index.php");
}
?>

