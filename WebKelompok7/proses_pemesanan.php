<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
    $perusahaan = $_POST['perusahaan'];
    $alamat = $_POST['alamat'];
    $paket = $_POST['paket'];
    $sub_paket = $_POST['sub-paket'];
    $catatan = $_POST['message'];

    $query = "INSERT INTO t_pemesanan (nama, nomor, email, perusahaan, alamat, paket, sub_paket, catatan)
              VALUES ('$nama', '$nomor', '$email', '$perusahaan', '$alamat', '$paket', '$sub_paket', '$catatan')";

    if (mysqli_query($conn, $query)) {
        echo "Pemesanan berhasil disimpan!";
        // Atau redirect:
        // header("Location: pembayaran.php");
    } else {
        echo "Gagal menyimpan: " . mysqli_error($conn);
    }
}
?>
