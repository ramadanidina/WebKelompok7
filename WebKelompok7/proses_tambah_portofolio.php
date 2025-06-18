<?php
include "koneksi.php";

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$folder = "img_porto/";

// Buat folder jika belum ada
if (!is_dir($folder)) {
    mkdir($folder);
}

move_uploaded_file($tmp, $folder . $gambar);

$sql = "INSERT INTO t_portofolio (judul, deskripsi, kategori, gambar)
        VALUES ('$judul', '$deskripsi', '$kategori', '$gambar')";

if (mysqli_query($conn, $sql)) {
    header("Location: portofolio_admin.php");
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>
