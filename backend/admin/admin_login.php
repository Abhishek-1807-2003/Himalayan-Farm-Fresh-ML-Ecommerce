<?php
session_start();

// Hardcoded single admin credentials
$admin_email = "Bhavikadmin@gmail.com";
$admin_password = "admin123"; // you can change this

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: #15803d !important; /* green */
    }
    .nav-link {
      font-weight: 500;
      color: #374151 !important;
    }
    .nav-link:hover {
      color: #15803d !important;
    }
    .btn-login {
      background-color: #e5e7eb;
      color: #374151;
      font-weight: 500;
      border-radius: 50px;
      padding: 6px 18px;
    }
    .btn-login:hover {
      background-color: #d1d5db;
    }
    .btn-signup {
      background-color: #15803d;
      color: #fff;
      font-weight: 600;
      border-radius: 50px;
      padding: 6px 18px;
    }
    .btn-signup:hover {
      background-color: #166534;
      color: #fff;
    }
  </style>
</head>
<body style="background: url('https://wallpaper-house.com/data/out/10/wallpaper2you_440850.jpg') no-repeat center center/cover; min-height:100vh; display:flex; flex-direction:column;">

 <!-- ✅ Header -->
<header class="shadow-sm bg-white">
  <nav class="navbar navbar-expand-lg navbar-light bg-white container py-2 justify-content-center">
    <a class="navbar-brand mx-auto" href="index.php">🌿 Himalayan Farm Fresh</a>
  </nav>
</header>


  <!-- ✅ Main Login Section -->
  <main class="flex-grow-1 d-flex justify-content-center align-items-center">
    <div class="card shadow p-4" style="max-width:400px; width:100%; background-color: rgba(255,255,255,0.9);">
      <h3 class="text-center mb-3">Admin Login</h3>
      <?php if (!empty($error)) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php } ?>
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </main>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <small>&copy; <?= date("Y"); ?> Himalayan Farm Fresh. All rights reserved.</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
