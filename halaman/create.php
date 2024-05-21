<?php
// Memasukkan file header.php
include 'header.php';

// Memasukkan file db.php untuk koneksi ke database
include 'db.php';
?>

<h2>Create New Article</h2>
<form action="insert.php" method="POST">
    <label>Title:</label><br>
    <input type="text" name="title" required><br>
    <label>Content:</label><br>
    <textarea name="content" required></textarea><br>
    <label>Image URL:</label><br>
    <input type="text" name="image_url" required><br>
    <label>Category:</label><br>
    <input type="text" name="category" required><br>
    <button type="submit">Submit</button>
</form>

<?php
// Memasukkan file footer.php
include 'footer.php';
?>
