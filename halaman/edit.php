<?php
// Memasukkan file header.php
include 'header.php';

// Memasukkan file db.php untuk koneksi ke database
include 'db.php';

// Memeriksa apakah parameter ID telah diterima melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data artikel berdasarkan ID dari database
    $sql = "SELECT * FROM articles WHERE id=$id";
    $result = $conn->query($sql);

    // Memeriksa apakah data ditemukan berdasarkan ID
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Mengambil data artikel ke dalam array $row
?>
        <h2>Edit Article</h2>
        <form action="update.php" method="POST">
            <!-- Menambahkan input hidden untuk menyimpan ID artikel yang akan diupdate -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Title:</label><br>
            <!-- Menampilkan nilai judul artikel dalam input text -->
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
            <label>Content:</label><br>
            <!-- Menampilkan isi artikel dalam textarea -->
            <textarea name="content" required><?php echo $row['content']; ?></textarea><br>
            <label>Image URL:</label><br>
            <!-- Menampilkan URL gambar dalam input text -->
            <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>" required><br>
            <label>Category:</label><br>
            <!-- Menampilkan kategori artikel dalam input text -->
            <input type="text" name="category" value="<?php echo $row['category']; ?>" required><br>
            <button type="submit">Update</button>
        </form>
<?php
    } else {
        echo "No record found"; // Menampilkan pesan jika data tidak ditemukan
    }
}

// Memasukkan file footer.php
include 'footer.php';
?>
