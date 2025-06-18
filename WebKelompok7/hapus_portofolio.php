<?php
include "koneksi.php";
$id = $_GET['id'];

$get = mysqli_query($conn, "SELECT gambar FROM t_portofolio WHERE id=$id");
$data = mysqli_fetch_assoc($get);
$path = "img_porto/" . $data['gambar'];
if (file_exists($path)) {
    unlink($path);
}

mysqli_query($conn, "DELETE FROM t_portofolio WHERE id=$id");
header("Location: portofolio_admin.php");
?>