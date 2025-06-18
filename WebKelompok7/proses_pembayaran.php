<?php
include "koneksi.php";

$metode = $_POST['metode'];
$catatan = $_POST['catatan'];

$nama_file = $_FILES['bukti']['name'];
$tmp_file = $_FILES['bukti']['tmp_name'];
$target = "bukti_pembayaran/" . $nama_file;

if (move_uploaded_file($tmp_file, $target)) {
    $query = "INSERT INTO t_pembayaran (metode, bukti, catatan) VALUES ('$metode', '$nama_file', '$catatan')";
    if (mysqli_query($conn, $query)) {
        header("Location: sukses.html");
    } else {
        echo "Gagal menyimpan pembayaran: " . mysqli_error($conn);
    }
} else {
    echo "Upload bukti gagal.";
}
?>
