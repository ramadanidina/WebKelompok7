<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Pelanggan - Creative.Wae</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, #007bff, #003d80);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .register-box {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      max-width: 400px;
      width: 100%;
    }

    .register-box h2 {
      color: #0056b3;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #ff9800;
    }

    .message {
      color: red;
      text-align: center;
      margin-top: 10px;
    }

    .login-link {
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
    }

    .login-link a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2>Daftar Pelanggan</h2>

    <form action="proses_daftar.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" required />
      </div>
      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" name="password" required />
      </div>
      <button type="submit">Daftar</button>
    </form>

    <?php if (isset($_GET['msg'])) : ?>
      <div class="message"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <div class="login-link">
      Sudah punya akun? <a href="login.php">Login di sini</a>
    </div>
  </div>
</body>
</html>
