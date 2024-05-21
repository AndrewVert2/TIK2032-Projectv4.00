document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('comment-form');
    const commentInput = document.getElementById('comment-input');
    const commentList = document.getElementById('comment-list');

    function loadComments() {
        const comments = JSON.parse(localStorage.getItem('comments')) || [];
        commentList.innerHTML = ''; // Kosongkan daftar komentar sebelum memuat ulang
        comments.forEach((comment) => {
            const commentElement = document.createElement('div');
            commentElement.className = 'comment';
            commentElement.textContent = comment.text;

            // Tambahkan tombol hapus
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Hapus';
            deleteButton.addEventListener('click', () => {
                deleteComment(comment.id); // Hapus komentar saat tombol diklik
            });

            commentElement.appendChild(deleteButton); // Tambahkan tombol hapus ke elemen komentar
            commentList.appendChild(commentElement); // Tambahkan komentar ke daftar
        });
    }

    function addComment(text) {
        const comments = JSON.parse(localStorage.getItem('comments')) || [];
        const newComment = {
            id: Date.now(), // Menggunakan timestamp sebagai ID unik
            text: text,
        };
        comments.push(newComment); // Tambahkan komentar baru
        localStorage.setItem('comments', JSON.stringify(comments)); // Simpan ke local storage
        loadComments(); // Perbarui daftar komentar
    }

    function deleteComment(id) {
        let comments = JSON.parse(localStorage.getItem('comments')) || [];
        comments = comments.filter((comment) => comment.id !== id); // Hapus komentar dengan ID yang sesuai
        localStorage.setItem('comments', JSON.stringify(comments)); // Simpan kembali ke local storage
        loadComments(); // Perbarui daftar komentar
    }

    commentForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const newComment = commentInput.value.trim();

        if (newComment) {
            addComment(newComment); // Tambahkan komentar baru
            commentInput.value = ''; // Kosongkan input
        }
    });

    loadComments(); // Muat semua komentar saat halaman dibuka
});


const images = [
    { src: "https://i.pinimg.com/564x/38/9a/58/389a58b0435537a10ca6903be3a5994c.jpg", caption: "Destiny" },
    { src: "https://i.pinimg.com/564x/73/85/75/738575263644635d7a54a58f9bf4822c.jpg", caption: "Street Fighter II: Special Champion Edition" },
    { src: "https://i.pinimg.com/564x/e0/39/d0/e039d015273bad9728cc95e5952fee79.jpg", caption: "Persona 5 Magazine" },
    { src: "https://i.pinimg.com/564x/e3/cf/a6/e3cfa636a51f8c44418db0e327247357.jpg", caption: "Persona 3 Reload" },
    { src: "https://i.pinimg.com/564x/cb/61/a2/cb61a27be0a69d469f9c0438ad40dd9e.jpg", caption: "Persona 4 golden" },
    { src: "https://i.pinimg.com/564x/79/c3/98/79c398699d43e3bc1658d04dece9ffcc.jpg", caption: "Final Fantasy XII: International Zodiac Job System (2007)" },
    { src: "https://i.pinimg.com/564x/ae/84/5c/ae845ca6f7cf79136c97f8763c1d028d.jpg", caption: "Final Fantasy" },
    { src: "https://i.pinimg.com/564x/d3/56/8a/d3568aebc6152daa0a9be0f31edb5456.jpg", caption: "Final Fantasy VII: Advent Children" },
    { src: "https://i.pinimg.com/564x/26/36/77/26367784fb85d7fa51cbc2522cdec170.jpg", caption: "Resident Evil 3 (2020)" },
    { src: "https://i.pinimg.com/564x/36/5f/04/365f04db8785a443a6804a3b997885c3.jpg", caption: "Resident Evil 2" },
    { src: "https://i.pinimg.com/564x/db/8b/f3/db8bf35302e78ed444833fbf95de8e9a.jpg", caption: "Resident Evil 5" },
];

let currentIndex = -1;

function openLightbox(index) {
    currentIndex = index;
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');

    lightboxImg.src = images[index].src;
    lightboxCaption.textContent = images[index].caption;

    lightbox.style.display = 'block'; // Menampilkan lightbox
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none'; // Menyembunyikan lightbox
}

function prevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    openLightbox(currentIndex); // Membuka gambar sebelumnya
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    openLightbox(currentIndex); // Membuka gambar berikutnya
}

// Mendengar saat halaman akan ditutup
window.addEventListener('beforeunload', function() {
    // Tambahkan kelas fade out ke seluruh halaman
    document.body.className = 'fade-out';
});  