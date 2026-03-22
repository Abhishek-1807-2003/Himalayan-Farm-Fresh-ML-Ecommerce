<?php
require_once "./action/connection.php";

header("Content-Type: application/json");

$response = ["success" => false, "message" => "Something went wrong"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);
    $name = trim($_POST["name"]);
    $unit = trim($_POST["unit"]);
    $price = floatval($_POST["price"]);
    $description = trim($_POST["description"]);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $query = "UPDATE products SET name=?, unit=?, price=?, description=?, image=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssdssi", $name, $unit, $price, $description, $targetFilePath, $id);
        } else {
            echo json_encode(["success" => false, "message" => "Image upload failed"]);
            exit;
        }
    } else {
        $query = "UPDATE products SET name=?, unit=?, price=?, description=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdsi", $name, $unit, $price, $description, $id);
    }

    if ($stmt->execute()) {
        $response = ["success" => true, "message" => "Product updated successfully"];
    } else {
        $response = ["success" => false, "message" => "Database update failed: " . $conn->error];
    }
}

echo json_encode($response);
