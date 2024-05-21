<?php
// Memasukkan file header.php
include 'header.php';

// Memasukkan file db.php untuk koneksi ke database
include 'db.php';
?>

<a href="create.php">Create New Article</a>

<div class="article fade-in">
    <?php
    // Query SQL untuk mengambil semua data artikel dari database
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);

    // Memeriksa apakah terdapat hasil dari query
    if ($result->num_rows > 0) {
        // Menggunakan loop while untuk menampilkan setiap artikel
        while($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<li>";
            echo "<h2 id='". strtolower(str_replace(' ', '', $row['title'])) ."'>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<a href='" . $row['image_url'] . "'><img src='" . $row['image_url'] . "' alt='" . $row['title'] . "' width='720' title='" . $row['title'] . "'></a>";
            echo "<br>";
            echo "<p>Sumber dan info lebih lanjut di <a href='https://en.wikipedia.org/wiki/" . urlencode($row['title']) . "'>Wikipedia</a></p>";
            // Tautan untuk mengedit artikel dengan mengirimkan ID artikel ke halaman edit.php
            echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
            // Tautan untuk menghapus artikel dengan mengirimkan ID artikel ke halaman delete.php, dengan konfirmasi
            echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
            echo "</li>";
            echo "</article>";
            echo "<br><br><br><br><br>";
        }
    } else {
        echo "0 results"; // Menampilkan pesan jika tidak ada artikel yang ditemukan
    }

    // Menutup koneksi ke database
    $conn->close();
    ?>
</div>

<?php
// Memasukkan file footer.php
include 'footer.php';
?>

