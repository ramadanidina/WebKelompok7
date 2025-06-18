<?php
include "koneksi.php";

$nama = $_POST['nama'];
$peran = $_POST['peran'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "gambar/" . $foto);

$sql = "INSERT INTO t_member (nama, peran, foto)
        VALUES ('$nama', '$peran', '$foto')";
mysqli_query($conn, $sql);

header("Location: member_admin.php");
?>