<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Sistem Aspirasi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login Sistem Aspirasi</h2>
    <?php
    // Menampilkan pesan error jika ada dari URL
    if (isset($_GET['error'])) {
        echo '<p style="color:red; text-align:center; background-color: #ffdddd; padding: 10px; border-radius: 5px;">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>
    <form action="proses_login.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>