<?php
// Membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "galeri");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Mengambil data dari tabel "foto"
$query_foto = "SELECT * FROM foto";
$result_foto = mysqli_query($koneksi, $query_foto);

// Memeriksa apakah query foto berhasil dieksekusi
if (!$result_foto) {
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

// Menampilkan data foto di dalam halaman web
echo "<h1>Data Foto</h1>";
echo "<ul>";
$displayed_ids = array(); // Array untuk menyimpan ID yang sudah ditampilkan
while ($row_foto = mysqli_fetch_assoc($result_foto)) {
    // Memeriksa apakah ID sudah ditampilkan sebelumnya
    if (!in_array($row_foto['id'], $displayed_ids)) {
        echo "<li>Nama File: " . $row_foto['file'] . "</li>";
        echo "<img src='../galeri/uploads/" . $row_foto['file'] . "' alt='Gambar' width='100' height='100'>";
        // Tambahkan informasi lain yang ingin ditampilkan dari tabel "foto"
        
        // Menambahkan ID ke array displayed_ids
        $displayed_ids[] = $row_foto['id'];
    }
}
echo "</ul>";

// Mengambil data dari tabel "posts"
$query_posts = "SELECT * FROM posts";
$result_posts = mysqli_query($koneksi, $query_posts);

// Memeriksa apakah query posts berhasil dieksekusi
if (!$result_posts) {
    echo "Error: " . mysqli_error($koneksi);
    exit();
}

// Menampilkan data posts di dalam halaman web
echo "<h1>Data Posts</h1>";
echo "<ul>";
$displayed_ids = array(); // Mengosongkan kembali array displayed_ids
while ($row_posts = mysqli_fetch_assoc($result_posts)) {
    // Memeriksa apakah ID sudah ditampilkan sebelumnya
    if (!in_array($row_posts['id'], $displayed_ids)) {
        echo "<p>Isi: " . $row_posts['isi'] . "</p>";
        // Tambahkan informasi lain yang ingin ditampilkan dari tabel "posts"
        
        // Menambahkan ID ke array displayed_ids
        $displayed_ids[] = $row_posts['id'];
    }
}
echo "</ul>";

// Menutup koneksi ke database
mysqli_close($koneksi);
?>
