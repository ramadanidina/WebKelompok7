<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$katalog = mysqli_query($conn, "SELECT COUNT(*) AS total FROM t_katalog");
$katalog_total = mysqli_fetch_assoc($katalog)['total'];

$portofolio = mysqli_query($conn, "SELECT COUNT(*) AS total FROM t_portofolio");
$portofolio_total = mysqli_fetch_assoc($portofolio)['total'];

$member = mysqli_query($conn, "SELECT COUNT(*) AS total FROM t_member");
$member_total = mysqli_fetch_assoc($member)['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - Creative.Wae</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <style>
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
      max-width: 1000px;
      margin: 50px auto;
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

    .dashboard-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .stat-card {
      background-color: #007bff;
      color: white;
      padding: 25px;
      border-radius: 10px;
      text-align: center;
      transition: background 0.3s;
      cursor: pointer;
      text-decoration: none;
    }

    .stat-card:hover {
      background-color: #0056b3;
    }

    .stat-card i {
      font-size: 30px;
      margin-bottom: 10px;
    }

    .stat-title {
      font-size: 18px;
      margin-top: 5px;
    }

    .stat-number {
      font-size: 24px;
      font-weight: bold;
    }

    footer {
      background: linear-gradient(90deg, #003d80, #0056b3);
      color: white;
      padding: 20px;
      text-align: center;
      margin-top: auto;
      font-size: 14px;
      width: 100%;
    }
  </style>
</head>
<body>

  <header>
    Admin - Creative.Wae
  </header>

  <div class="container">
    <h2>Selamat Datang di Dashboard Admin</h2>

    <div class="dashboard-stats">
      <a href="katalog_admin.php" class="stat-card">
        <i class="fas fa-box-open"></i>
        <div class="stat-title">Katalog</div>
        <div class="stat-number"><?php echo $katalog_total; ?></div>
      </a>
      <a href="portofolio_admin.php" class="stat-card">
        <i class="fas fa-briefcase"></i>
        <div class="stat-title">Portofolio</div>
        <div class="stat-number"><?php echo $portofolio_total; ?></div>
      </a>
      <a href="member_admin.php" class="stat-card">
        <i class="fas fa-users"></i>
        <div class="stat-title">Jumlah Member</div>
        <div class="stat-number"><?php echo $member_total; ?></div>
      </a>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Creative.Wae. Semua Hak Dilindungi.</p>
  </footer>

</body>
</html>
