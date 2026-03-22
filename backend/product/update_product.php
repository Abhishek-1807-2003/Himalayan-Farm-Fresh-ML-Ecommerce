<?php
require_once "./action/connection.php";

$response = ["success" => false, "message" => "Something went wrong"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST["id"]);
    $name = trim($_POST["name"]);
    $price = floatval($_POST["price"]);
    $quantity = intval($_POST["quantity"]);
    $description = trim($_POST["description"]);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $query = "UPDATE products 
                      SET name=?, price=?, quantity=?, description=?, image=? 
                      WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sdsssi", $name, $price, $quantity, $description, $targetFilePath, $id);
        } else {
            $response["message"] = "Failed to upload image.";
            echo json_encode($response);
            exit;
        }
    } else {
        $query = "UPDATE products 
                  SET name=?, price=?, quantity=?, description=? 
                  WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sdssi", $name, $price, $quantity, $description, $id);
    }

    if ($stmt->execute()) {
        $response = ["success" => true, "message" => "Product updated successfully"];
    } else {
        $response["message"] = "Database update failed.";
    }
}

echo json_encode($response);
