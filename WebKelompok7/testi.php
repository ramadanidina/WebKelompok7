<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni - Creative.Wae</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f8fb;
            color: #333;
            text-align: center;
        }
        header {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
            padding: 40px 20px;
            font-size: 40px;
            font-weight: bold;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            width: 80%;
            margin: auto;
        }
        nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0;
        }
        a.nav-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        a.nav-button:hover {
            background-color: #ff9800;
        }
        .container {
            width: 80%;
            max-width: 900px;
            margin: 20px auto;
            text-align: center;
        }
        .testimoni-box {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 20px;
            text-align: left;
        }
        .testimoni-box img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .testimoni-content {
            flex: 1;
        }
        .testimoni-box h3 {
            color: #0052D4;
            margin: 5px 0;
        }
        .testimoni-box p {
            font-size: 16px;
            color: #333;
            line-height: 1.5;
        }
        .stars {
            color: #FFD700;
            font-size: 20px;
            margin-bottom: 5px;
        }
        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }
        form button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        form button:hover {
            background-color: #ff9800;
        }
        footer {
            background: radial-gradient(circle, #0056b3, #003d80);
            color: white;
            padding: 20px;
            margin-top: 20px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            width: 80%;
            margin: auto;
        }
        .footer-list {
            list-style-type: none;
            padding: 0;
        }
        .footer-list li {
            margin: 5px 0;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header>
        Creative.Wae
    </header>
<nav>
        <a href="menu.html" class="nav-button">Home</a>
        <a href="katalog.php" class="nav-button">Katalog</a>
        <a href="porto1.php" class="nav-button">Portofolio</a>
        <a href="testi.php" class="nav-button">Testimoni</a>
        <a href="ketentuan.html" class="nav-button">Ketentuan</a>
        <a href="tentang_kami.html" class="nav-button">Tentang & Kontak</a>
        <a href="pemesanan.php" class="nav-button">Pesan Sekarang</a>
    </nav>

    <div class="container">

        <?php
        include "koneksi.php";
        $result = mysqli_query($conn, "SELECT * FROM t_ulasan ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="testimoni-box">
                <img src="gambar/avatar2.png" alt="' . htmlspecialchars($row['nama']) . '">
                <div class="testimoni-content">
                    <h3>' . htmlspecialchars($row['nama']) . ' – ' . htmlspecialchars($row['pekerjaan']) . '</h3>
                    <div class="stars">' . htmlspecialchars($row['bintang']) . '</div>
                    <p>"' . htmlspecialchars($row['ulasan']) . '"</p>

                    <form action="hapus_ulasan.php" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus ulasan ini?\')">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                <button type="submit" style="
                    margin-top:10px;
                    background:red;
                    color:white;
                    border:none;
                    padding:6px 12px;
                    border-radius:5px;
                    cursor:pointer;
                ">Hapus</button>
            </form>
                </div>
            </div>';
        }
        ?>

        <!-- Form Ulasan -->
        <div class="testimoni-box">
            <div class="testimoni-content">
                <h3 style="color:#0052D4; text-align:center;">Tinggalkan Ulasan Anda</h3>
                <form action="proses_ulasan.php" method="POST">
                    <input type="text" name="nama" placeholder="Nama Anda" required>
                    <input type="text" name="pekerjaan" placeholder="Pekerjaan atau Perusahaan" required>
                    <select name="bintang" required>
                        <option value="">Pilih Rating</option>
                        <option value="★★★★★">★★★★★</option>
                        <option value="★★★★">★★★★</option>
                        <option value="★★★">★★★</option>
                        <option value="★★">★★</option>
                        <option value="★">★</option>
                    </select>
                    <textarea name="ulasan" placeholder="Tulis ulasan Anda..." rows="4" required style="resize: none;"></textarea>
                    <button type="submit">Kirim Ulasan</button>
                </form>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2025 Creative.Wae. Semua Hak Dilindungi.
    </footer>

    <script>
        function kirimUlasan(event) {
            event.preventDefault();
            alert("Terima kasih atas ulasan Anda!");
            document.getElementById("ulasanForm").reset();
        }
    </script>
</body>
</html>
