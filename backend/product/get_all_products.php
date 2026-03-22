<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json; charset=UTF-8");

include './action/connection.php';

$products = [];

$sql = "SELECT p.id, p.name, p.unit, p.price, p.image, p.description
        FROM products p
        ORDER BY p.id DESC 
        LIMIT 20";

if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row['image'] = (string) $row['image']; // ensure image is string
        $products[] = $row;
    }

    echo json_encode([
        "success" => true,
        "data" => $products
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => $conn->error
    ]);
}

exit;
