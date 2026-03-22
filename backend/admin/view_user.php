<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No user ID provided!");
}
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
if (!$user) {
    die("User not found!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1e3c72, #d7e6ffff); 
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }
    .profile-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      overflow: hidden;
      max-width: 600px;
      width: 100%;
      animation: fadeInUp 0.6s ease-in-out;
    }
    .profile-header {
      background: #2a5298;
      color: #fff;
      text-align: center;
      padding: 40px 20px;
    }
    .profile-header h2 {
      margin: 0;
      font-weight: 700;
    }
    .profile-header p {
      margin: 5px 0 0;
      font-size: 14px;
      opacity: 0.9;
    }
    .profile-body {
      padding: 30px;
    }
    .profile-table th {
      width: 30%;
      background: #f8f9fa;
      text-align: left;
    }
    .btn-back {
      margin-top: 20px;
      border-radius: 50px;
      padding: 10px 25px;
      font-weight: 600;
      background: #2a5298;
      border: none;
      color: #fff;
      transition: 0.3s;
    }
    .btn-back:hover {
      background: #1e3c72;
    }
    @keyframes fadeInUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
  </style>
</head>
<body>
  <div class="profile-card">
    <div class="profile-header">
      <h2>👤 <?= $user['first_name']." ".$user['last_name']; ?></h2>
      <p>Customer ID: #<?= $user['id']; ?></p>
    </div>
    <div class="profile-body">
      <h4 class="mb-3">📋 Customer Details</h4>
      <table class="table profile-table table-bordered align-middle">
        <tr><th>Email</th><td><?= $user['email']; ?></td></tr>
        <tr><th>Phone</th><td><?= $user['phone']; ?></td></tr>
        <tr><th>Joined</th><td><?= date("F j, Y, g:i a", strtotime($user['created_at'])); ?></td></tr>
      </table>
      <div class="text-center">
        <a href="dashboard.php" class="btn btn-back">⬅ Back to Dashboard</a>
      </div>
    </div>
  </div>
</body>
</html>
