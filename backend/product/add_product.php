<?php
session_start();
include './action/connection.php';

header("Content-Type: application/json");

if (!isset($_SESSION['farmer_id'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized"]);
    exit;
}

$farmer_id = $_SESSION['farmer_id'];

// Form fields
$name = $_POST['name'] ?? '';
$unit = $_POST['unit'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? ''; // ✅ this will be a URL
$description = $_POST['description'] ?? '';

if (empty($name) || empty($unit) || empty($price) || empty($image)) {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit;
}

$sql = "INSERT INTO products (name, unit, price, image, description, farmer_id) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdssi", $name, $unit, $price, $image, $description, $farmer_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Product added successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Database error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
