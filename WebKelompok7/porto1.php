<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio & Tim - Creative.Wae</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f8fb;
      color: #333;
      text-align: center;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: linear-gradient(90deg, #007bff, #0056b3);
      color: white;
      padding: 40px 20px;
      font-size: 24px;
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

    nav .nav-button {
      background-color: #0056b3;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      transition: background 0.3s;
    }

    nav .nav-button:hover {
      background-color: #ff9800;
    }

    .portfolio-container {
      padding: 20px;
      max-width: 1200px;
      margin: auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      flex-grow: 1;
    }

    .portfolio-item {
      background: white;
      border-radius: 10px;
      padding: 20px;
      display: flex;
      align-items: center;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      text-decoration: none;
      color: inherit;
    }

    .portfolio-item img {
      width: 200px;
      height: auto;
      border-radius: 10px;
      margin-right: 20px;
    }

    .portfolio-description {
      text-align: left;
    }

    .container {
      max-width: 1200px;
      margin: 30px auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .team {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .member-card {
      background-color: #e3f2fd;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .member-card img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .member-card h3 {
      margin: 10px 0 5px;
      font-size: 18px;
    }

    .member-card p {
      margin: 0;
      font-size: 14px;
      color: #555;
    }

    footer {
      background: linear-gradient(90deg, #0056b3, #003d80);
      color: white;
      padding: 20px 20px;
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
      margin-top: auto;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>Portofolio & Tim Kami</header>
<nav>
        <a href="menu.html" class="nav-button">Home</a>
        <a href="katalog.php" class="nav-button">Katalog</a>
        <a href="porto1.php" class="nav-button">Portofolio</a>
        <a href="testi.php" class="nav-button">Testimoni</a>
        <a href="ketentuan.html" class="nav-button">Ketentuan</a>
        <a href="tentang_kami.html" class="nav-button">Tentang & Kontak</a>
        <a href="pemesanan.php" class="nav-button">Pesan Sekarang</a>
    </nav>

  <div class="portfolio-container">
    <?php
    $data = mysqli_query($conn, "SELECT * FROM t_portofolio");
    while ($row = mysqli_fetch_assoc($data)) {
        echo '<a href="porto2.html" class="portfolio-item">';
        echo "<img src='img_porto/{$row['gambar']}' alt='{$row['judul']}'>";
        echo '<div class="portfolio-description">';
        echo "<h3>{$row['kategori']}</h3>";
        echo "<p>{$row['deskripsi']}</p>";
        echo '</div></a>';
    }
    ?>
  </div>

  <!-- MEMBER SECTION -->
  <div class="container" id="member">
    <h2>Tim Kami</h2>
    <p>Berikut adalah para anggota tim kreatif di balik setiap proyek Creative.Wae.</p>
    <div class="team">
      <?php
      $data = mysqli_query($conn, "SELECT * FROM t_member ORDER BY id DESC");
      while ($row = mysqli_fetch_assoc($data)) {
          echo '<div class="member-card">';
          echo '<img src="gambar/' . $row['foto'] . '" alt="' . $row['nama'] . '">';
          echo '<h3>' . $row['nama'] . '</h3>';
          echo '<p>' . $row['peran'] . '</p>';
          echo '</div>';
      }
      ?>
    </div>
    <div style="margin-top: 30px; text-align: center; font-size: 16px; color: #444;">
      <p>
        Tim kami terdiri dari para profesional muda yang ahli di bidangnya masing-masing.
        Dalam setiap proyek, kami bekerja secara kolaboratif dengan menggabungkan ide kreatif, strategi pemasaran, dan teknologi terkini.
        Kami berkomitmen memberikan hasil terbaik dan tepat waktu, demi kepuasan klien dan kesuksesan proyek.
        Bersama Creative.Wae, Anda tidak hanya mendapatkan layanan—Anda mendapatkan solusi yang berdampak.
      </p>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Creative.Wae. Semua Hak Dilindungi.</p>
  </footer>
</body>
</html>