<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username sudah ada
$cek = mysqli_query($conn, "SELECT * FROM t_pelanggan WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    header("Location: daftar.php?msg=Username sudah digunakan");
    exit();
}

// Simpan ke database
$query = "INSERT INTO t_pelanggan (username, password) VALUES ('$username', '$password')";
$simpan = mysqli_query($conn, $query);

if ($simpan) {
    header("Location: login.php?error=Akun berhasil dibuat, silakan login");
} else {
    header("Location: daftar.php?msg=Gagal mendaftar, coba lagi");
}
?>
