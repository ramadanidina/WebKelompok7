<?php
include "koneksi.php";

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$folder = "img_katalog/";

move_uploaded_file($tmp, $folder . $gambar);

$sql = "INSERT INTO t_katalog (judul, kategori, deskripsi, harga, gambar)
        VALUES ('$judul', '$kategori', '$deskripsi', '$harga', '$gambar')";

if (mysqli_query($conn, $sql)) {
    header("Location: katalog_admin.php");
} else {
    echo "Gagal menambahkan katalog.";
}
?>
