<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Katalog Jasa - Creative.Wae</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #E8F0FE;
      text-align: center;
      margin: 0;
      padding: 0;
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
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
      gap: 20px;
      padding: 20px;
    }
    .card {
      background: white;
      width: 260px;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: left;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }
    .service-item {
      margin-bottom: 10px;
      padding: 10px;
      background: #f4f4f4;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .service-item:hover {
      background: #dbe9ff;
    }
    .service-item h4 {
      margin: 0;
      color: #0056b3;
      font-size: 16px;
    }
    .service-item p {
      margin: 4px 0 0;
      font-size: 14px;
      color: #333;
    }
    .service-item .price {
      font-weight: bold;
      color: #007bff;
      font-size: 16px;
      margin-top: 5px;
    }
    .order-button {
      display: block;
      text-align: center;
      margin-top: 10px;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
      text-decoration: none;
      color: white;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
    }
    .modal-content {
      background: white;
      margin: 10% auto;
      padding: 20px;
      width: 50%;
      border-radius: 10px;
    }
    .close {
      float: right;
      font-size: 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>Katalog - Creative.Wae</header>
  <nav>
        <a href="menu.html" class="nav-button">Home</a>
        <a href="katalog.php" class="nav-button">Katalog</a>
        <a href="porto1.php" class="nav-button">Portofolio</a>
        <a href="testi.php" class="nav-button">Testimoni</a>
        <a href="ketentuan.html" class="nav-button">Ketentuan</a>
        <a href="tentang_kami.html" class="nav-button">Tentang & Kontak</a>
        <a href="pemesanan.php" class="nav-button">Pesan Sekarang</a>
    </nav>

   <?php include 'koneksi.php'; ?>
  <div class="container">
  <?php
  $data = mysqli_query($conn, "SELECT * FROM t_katalog ORDER BY kategori, id DESC");
  while ($row = mysqli_fetch_assoc($data)) {
      echo '<div class="card">';
      echo "<h3>{$row['kategori']}</h3>";
      echo '<ul>';
      echo "<li class='service-item' onclick=\"showModal('{$row['judul']}', '{$row['deskripsi']}')\">";
      echo "<h4>{$row['judul']}</h4>";
      echo "<p>{$row['deskripsi']}</p>";
      echo "<p class='price'>Rp " . number_format($row['harga'], 0, ',', '.') . "</p>";
      echo "</li></ul>";
      echo '<a href="pemesanan.html" class="order-button" style="background-color: blue;">Pesan Sekarang</a>';
      echo "</div>";
  }
  ?>
    <div class="card">
      <h3>Desain Web</h3>
      <ul>
        <li class="service-item" onclick="showModal('Website Statis', 'Website statis adalah situs yang memiliki konten tetap dan tidak berubah kecuali diperbarui secara manual oleh pengembang.')">
          <h4>Website Statis</h4>
          <p>Tampilan sederhana, cepat diakses, dan cocok untuk profil perusahaan.</p>
          <p class="price">Rp 5.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Website Dinamis', 'Website dinamis adalah situs yang kontennya dapat berubah secara otomatis berdasarkan interaksi pengguna.')">
          <h4>Website Dinamis</h4>
          <p>Konten interaktif dan bisa diperbarui dengan sistem backend.</p>
          <p class="price">Rp 7.500.000</p>
        </li>
        <li class="service-item" onclick="showModal('E-commerce', 'E-commerce adalah website yang digunakan untuk transaksi jual beli barang atau jasa secara online.')">
          <h4>E-commerce</h4>
          <p>Solusi toko online lengkap dengan sistem checkout dan pembayaran.</p>
          <p class="price">Rp 10.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Landing Page', 'Landing page adalah halaman web tunggal yang dirancang untuk kampanye pemasaran atau periklanan.')">
          <h4>Landing Page</h4>
          <p>Halaman promosi khusus untuk produk, acara, atau kampanye tertentu.</p>
          <p class="price">Rp 3.000.000</p>
        </li>
      </ul>
      <a href="pemesanan.php" class="order-button" style="background-color: blue;">Pesan Sekarang</a>
    </div>

    <div class="card">
      <h3>Desain Grafis</h3>
      <ul>
        <li class="service-item" onclick="showModal('Logo', 'Kami menawarkan layanan desain logo yang mencerminkan identitas brand Anda.')">
          <h4>Logo</h4>
          <p>Identitas visual utama yang unik dan mudah diingat.</p>
          <p class="price">Rp 2.500.000</p>
        </li>
        <li class="service-item" onclick="showModal('Brosur', 'Desain brosur yang menarik untuk promosi bisnis Anda.')">
          <h4>Brosur</h4>
          <p>Materi cetak promosi yang informatif dan menarik.</p>
          <p class="price">Rp 1.500.000</p>
        </li>
        <li class="service-item" onclick="showModal('Poster', 'Poster profesional yang menarik perhatian.')">
          <h4>Poster</h4>
          <p>Desain visual untuk publikasi acara atau promosi produk.</p>
          <p class="price">Rp 1.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Kartu Nama', 'Desain kartu nama unik untuk keperluan bisnis Anda.')">
          <h4>Kartu Nama</h4>
          <p>Desain profesional untuk memperkuat branding pribadi/bisnis.</p>
          <p class="price">Rp 500.000</p>
        </li>
      </ul>
      <a href="pemesanan.php" class="order-button" style="background-color: green;">Pesan Sekarang</a>
    </div>

    <div class="card">
      <h3>Fotografi & Videografi</h3>
      <ul>
        <li class="service-item" onclick="showModal('Fotografi Profesional', 'Kami mengambil foto dengan konsentrasi tinggi dan menghasilkan gambar berkualitas bagus.')">
          <h4>Fotografi Profesional</h4>
          <p>Menangkap momen penting dengan sentuhan artistik dan teknis.</p>
          <p class="price">Rp 3.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Videografi Profesional', 'Merekam dan mengedit video dengan kamera profesional untuk berbagai kebutuhan dengan keahlian teknis yang ahli.')">
          <h4>Videografi Profesional</h4>
          <p>Video berkualitas tinggi untuk dokumentasi, promosi, atau acara.</p>
          <p class="price">Rp 5.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Liputan Acara', 'Menyediakan rekaman audio dan visual untuk mengabadikan momen dalam sebuah acara.')">
          <h4>Liputan Acara</h4>
          <p>Merekam kegiatan dan suasana dalam berbagai jenis event.</p>
          <p class="price">Rp 2.500.000</p>
        </li>
      </ul>
      <a href="pemesanan.php" class="order-button" style="background-color: purple;">Pesan Sekarang</a>
    </div>

    <div class="card">
      <h3>Foto & Video Produk</h3>
      <ul>
        <li class="service-item" onclick="showModal('Foto Produk', 'Jasa fotografi profesional untuk produk Anda.')">
          <h4>Foto Produk</h4>
          <p>Menonjolkan keunggulan produk Anda dengan visual yang tajam.</p>
          <p class="price">Rp 1.500.000</p>
        </li>
        <li class="service-item" onclick="showModal('Video Produk', 'Pembuatan video berkualitas tinggi untuk promosi produk.')">
          <h4>Video Produk</h4>
          <p>Visual dinamis yang memikat calon pembeli di media sosial.</p>
          <p class="price">Rp 2.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Foto Katalog', 'Foto katalog untuk kebutuhan e-commerce.')">
          <h4>Foto Katalog</h4>
          <p>Foto produk berseri untuk katalog digital atau marketplace.</p>
          <p class="price">Rp 2.500.000</p>
        </li>
        <li class="service-item" onclick="showModal('360° Product View', 'Tampilan produk dari segala sudut.')">
          <h4>360° Product View</h4>
          <p>Solusi interaktif untuk menjelajahi produk lebih detail.</p>
          <p class="price">Rp 3.000.000</p>
        </li>
      </ul>
      <a href="pemesanan.php" class="order-button" style="background-color: orangered;">Pesan Sekarang</a>
    </div>

    <div class="card">
      <h3>Editing Video</h3>
      <ul>
        <li class="service-item" onclick="showModal('Video Promosi', 'Video singkat untuk iklan dan kampanye.')">
          <h4>Video Promosi</h4>
          <p>Edit menarik untuk tingkatkan engagement produk Anda.</p>
          <p class="price">Rp 3.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Reels/Shorts', 'Konten vertikal untuk Instagram atau TikTok.')">
          <h4>Reels / Shorts</h4>
          <p>Gaya cepat dan menarik, cocok untuk social media masa kini.</p>
          <p class="price">Rp 1.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Video Testimoni', 'Kompilasi testimoni pelanggan.')">
          <h4>Video Testimoni</h4>
          <p>Bangun kepercayaan dengan cuplikan pengalaman nyata pelanggan.</p>
          <p class="price">Rp 2.000.000</p>
        </li>
        <li class="service-item" onclick="showModal('Highlight Event', 'Cuplikan momen terbaik dari sebuah acara.')">
          <h4>Highlight Event</h4>
          <p>Video pendek dari dokumentasi acara dengan editing sinematik.</p>
          <p class="price">Rp 2.500.000</p>
        </li>
      </ul>
      <a href="pemesanan.php" class="order-button" style="background-color: darkred;">Pesan Sekarang</a>
    </div>
  </div>

  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2 id="modal-title"></h2>
      <p id="modal-text"></p>
    </div>
  </div>

  <script>
    function showModal(title, text) {
      document.getElementById('modal-title').innerText = title;
      document.getElementById('modal-text').innerText = text;
      document.getElementById('modal').style.display = 'block';
    }
    function closeModal() {
      document.getElementById('modal').style.display = 'none';
    }
  </script>

  <footer>
    <p>&copy; 2025 Creative.Wae. Semua Hak Dilindungi.</p>
  </footer>
</body>
</html>
