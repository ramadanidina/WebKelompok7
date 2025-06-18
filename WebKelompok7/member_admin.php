<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Member - Creative.Wae</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f8fb;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: linear-gradient(90deg, #007bff, #0056b3);
      color: white;
      padding: 30px 20px;
      font-size: 30px;
      font-weight: bold;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      padding: 20px 0;
      background-color: #ffffff;
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
      max-width: 900px;
      margin: 30px auto;
      background: #ffffff;
      color: #333;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      flex: 1;
    }

    h2 {
      text-align: center;
      color: #0056b3;
      font-size: 28px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-size: 16px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .form-group button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      font-size: 16px;
    }

    .form-group button:hover {
      background-color: #ff9800;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table th, table td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }

    table th {
      background-color: #e3f2fd;
    }

    footer {
      background: linear-gradient(90deg, #003d80, #0056b3);
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 14px;
      margin-top: auto;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>Admin - Creative.Wae</header>
  <nav>
    <a href="dashboard_admin.php" class="nav-button">Dashboard</a>
    <a href="katalog_admin.php" class="nav-button">Katalog</a>
    <a href="portofolio_admin.php" class="nav-button">Portofolio</a>
    <a href="member_admin.php" class="nav-button">Member</a>
  </nav>

  <div class="container">
    <h2>Manajemen Member</h2>

    <form action="proses_tambah_member.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Member</label>
        <input type="text" name="nama" required />
      </div>
      <div class="form-group">
        <label>Peran Member</label>
        <input type="text" name="peran" required />
      </div>
      <div class="form-group">
        <label>Foto Member</label>
        <input type="file" name="foto" required />
      </div>
      <div class="form-group">
        <button type="submit">Tambah Member</button>
      </div>
    </form>

    <h3>Daftar Member</h3>
    <table>
      <tr>
        <th>Nama</th>
        <th>Peran</th>
        <th>Aksi</th>
      </tr>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM t_member ORDER BY id DESC");
      while ($row = mysqli_fetch_assoc($data)) {
          echo "<tr>
                  <td>{$row['nama']}</td>
                  <td>{$row['peran']}</td>
                  <td><a href='hapus_member.php?id={$row['id']}' onclick=\"return confirm('Hapus?')\">Hapus</a></td>
                </tr>";
      }
      ?>
    </table>
  </div>

  <footer>
    <p>&copy; 2025 Creative.Wae. Semua Hak Dilindungi.</p>
  </footer>
</body>
</html>
