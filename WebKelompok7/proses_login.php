<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM t_pelanggan WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['pelanggan'] = $username;
    header("Location: menu.html");
    exit();
} else {
    header("Location: login.php?error=Username atau password salah!");
    exit();
}
?>
