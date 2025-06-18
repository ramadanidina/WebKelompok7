<?php
include "koneksi.php";

$nama = $_POST['nama'];
$pekerjaan = $_POST['pekerjaan'];
$bintang = $_POST['bintang'];
$ulasan = $_POST['ulasan'];

$query = "INSERT INTO t_ulasan (nama, pekerjaan, bintang, ulasan) 
          VALUES ('$nama', '$pekerjaan', '$bintang', '$ulasan')";

if (mysqli_query($conn, $query)) {
    header("Location: testi.php");
} else {
    echo "Gagal menyimpan ulasan: " . mysqli_error($conn);
}
?>
