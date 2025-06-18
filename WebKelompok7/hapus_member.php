<?php
include "koneksi.php";
$id = $_GET['id'];

$get = mysqli_query($conn, "SELECT foto FROM t_member WHERE id=$id");
$data = mysqli_fetch_assoc($get);
if (file_exists("gambar/" . $data['foto'])) {
    unlink("gambar/" . $data['foto']);
}

mysqli_query($conn, "DELETE FROM t_member WHERE id=$id");
header("Location: member_admin.php");
?>