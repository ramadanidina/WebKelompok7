<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran - Creative.Wae</title>
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
  min-height: 100vh; /* Menjaga body setinggi layar */
}

header {
  background: linear-gradient(90deg, #007bff, #0056b3);
  color: white;
  padding: 30px 20px;
  font-size: 24px;
  font-weight: bold;
  border-bottom-left-radius: 50px;
  border-bottom-right-radius: 50px;
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

.container {
  max-width: 800px;
  margin: 30px auto;
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  text-align: left;
  flex: 1; /* Membuat konten mengambil sisa ruang */
}

input, select, textarea {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
  font-size: 16px;
}

button:hover {
  background-color: #ff9800;
}

footer {
  background: radial-gradient(circle, #0056b3, #003d80);
  color: white;
  padding: 20px;
  margin-top: 20px;
  border-top-left-radius: 50px;
  border-top-right-radius: 50px;
  text-align: center;
}
  </style>
</head>
<body>
  <header>
    Pembayaran - Creative.Wae
  </header>

<nav>
        <a href="menu.html" class="nav-button">Home</a>
        <a href="katalog.php" class="nav-button">Katalog</a>
        <a href="porto1.php" class="nav-button">Portofolio</a>
        <a href="testi.php" class="nav-button">Testimoni</a>
        <a href="ketentuan.html" class="nav-button">Ketentuan</a>
        <a href="tentang_kami.html" class="nav-button">Tentang & Kontak</a>
        <a href="pemesanan.html" class="nav-button">Pesan Sekarang</a>
    </nav>

  <div class="container">
    <h2>Formulir Pembayaran</h2>
    <form action="proses_pembayaran.php" method="POST" enctype="multipart/form-data">

      <label for="metode">Metode Pembayaran:</label>
      <select id="metode" name="metode" required>
        <option value="">-- Pilih Metode --</option>
        <option value="transfer">Transfer Bank</option>
        <option value="ewallet">E-Wallet</option>
        <option value="cod">Bayar di Tempat</option>
      </select>

      <label for="bukti">Upload Bukti Pembayaran:</label>
      <input type="file" id="bukti" name="bukti" accept="image/*" required>

      <label for="catatan">Catatan Tambahan:</label>
      <textarea id="catatan" name="catatan" rows="4"></textarea>

      <button type="submit">Kirim Pembayaran</button>
    </form>
  </div>

  <footer>
    <p>&copy; 2025 Creative.Wae. Semua Hak Dilindungi.</p>
  </footer>

  <script>
    function handleSubmit(event) {
      event.preventDefault(); // Mencegah reload
      // Simulasi sukses kirim, lalu redirect
      window.location.href = "sukses.html";
    }
  </script>  
</body>
</html>
