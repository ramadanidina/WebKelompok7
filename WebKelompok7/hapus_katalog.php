<?php
include "koneksi.php";

$id = $_GET['id'];

// Hapus gambar dari folder juga (opsional)
$get = mysqli_query($conn, "SELECT gambar FROM t_katalog WHERE id=$id");
$data = mysqli_fetch_assoc($get);
$path = "img_katalog/" . $data['gambar'];
if (file_exists($path)) {
    unlink($path);
}

// Hapus data dari database
mysqli_query($conn, "DELETE FROM t_katalog WHERE id=$id");

header("Location: katalog_admin.php");
?>
