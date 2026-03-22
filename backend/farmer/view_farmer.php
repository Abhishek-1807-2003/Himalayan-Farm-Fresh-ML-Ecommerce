<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No user ID provided!");
}
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM farmers WHERE id=$id"));
if (!$user) {
    die("User not found!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Farmer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="mb-4">👤 Farmers Details</h2>
    <table class="table table-bordered">
      <tr><th>ID</th><td><?= $user['id']; ?></td></tr>
      <tr><th>Name</th><td><?= $user['first_name']." ".$user['last_name']; ?></td></tr>
      <tr><th>Email</th><td><?= $user['email']; ?></td></tr>
      <tr><th>Phone</th><td><?= $user['phone']; ?></td></tr>
      <tr><th>Joined</th><td><?= $user['created_at']; ?></td></tr>
    </table>
    <a href="dashboard.php" class="btn btn-secondary">⬅ Back to Dashboard</a>
  </div>
</body>
</html>
