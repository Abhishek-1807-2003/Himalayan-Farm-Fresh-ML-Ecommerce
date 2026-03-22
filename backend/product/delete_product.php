<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No product ID provided!");
}
$id = intval($_GET['id']);

// Delete product
if (mysqli_query($conn, "DELETE FROM products WHERE id=$id")) {
    header("Location: dashboard.php?msg=Product deleted successfully");
    exit;
} else {
    die("Error deleting product: " . mysqli_error($conn));
}
?>
