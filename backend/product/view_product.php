<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No product ID provided!");
}
$id = intval($_GET['id']);
$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
if (!$product) {
    die("Product not found!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <div class="container bg-white p-4 rounded shadow">
    <h2 class="mb-4">🌱 Product Details</h2>
    <table class="table table-bordered">
      <tr><th>ID</th><td><?= $product['id']; ?></td></tr>
      <tr><th>Name</th><td><?= $product['name']; ?></td></tr>
      <tr><th>Price</th><td>₹<?= $product['price']; ?></td></tr>
    
      <tr><th>Description</th><td><?= $product['description']; ?></td></tr>

    </table>
    <a href="dashboard.php" class="btn btn-secondary">⬅ Back to Dashboard</a>
    <li><a href="smart_comparison.php">🤖 Smart Product Comparison</a></li>
  </div>
</body>
</html>
