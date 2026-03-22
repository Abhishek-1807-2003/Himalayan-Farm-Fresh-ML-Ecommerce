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

// Update product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = floatval($_POST['price']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "UPDATE products 
              SET name='$name', price=$price, unit='$unit', description='$description' 
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?msg=Product updated successfully");
        exit;
    } else {
        $error = "Error updating product: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <div class="container bg-white p-4 rounded shadow">
    <h2 class="mb-4">✏️ Edit Product</h2>
    <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" value="<?= $product['name']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Price (₹)</label>
        <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Unit (e.g. kg, litre, dozen)</label>
        <input type="text" name="unit" class="form-control" value="<?= $product['unit']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"><?= $product['description']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-success">Save Changes</button>
      <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
