<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Pelanggan - Creative.Wae</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom right, #007bff, #003d80);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
    }

    .login-box {
      background-color: #ffffff;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      box-sizing: border-box;
    }

    .login-box h2 {
      text-align: center;
      color: #0056b3;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      font-size: 15px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      font-size: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #ff9800;
    }

    .error-message {
      margin-top: 15px;
      color: red;
      text-align: center;
      font-size: 14px;
    }

    .footer-login {
      margin-top: 25px;
      text-align: center;
      font-size: 14px;
      color: #666;
    }

    .footer-login a {
      color: #007bff;
      text-decoration: none;
    }

    .footer-login a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Pelanggan</h2>

    <form action="proses_login.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Masukkan username anda" required />
      </div>
      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" name="password" placeholder="Masukkan kata sandi anda" required />
      </div>
      <button type="submit">Masuk</button>
    </form>

    <?php if (isset($_GET['error'])) : ?>
      <div class="error-message"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <div class="footer-login">
      Belum punya akun? <a href="daftar.php">Daftar di sini</a>
    </div>

  </div>
</body>
</html>