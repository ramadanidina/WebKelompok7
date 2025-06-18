<?php
include "koneksi.php";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $query = "DELETE FROM t_ulasan WHERE id = $id";
    mysqli_query($conn, $query);
}

header("Location: testi.php");
exit;
?>
