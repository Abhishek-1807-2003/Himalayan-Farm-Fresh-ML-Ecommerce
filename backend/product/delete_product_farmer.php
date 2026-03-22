<?php
include './action/connection.php';

header("Content-Type: application/json");

$response = ["success" => false, "message" => "Something went wrong"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['id'])) {
        $response["message"] = "No product ID provided!";
        echo json_encode($response);
        exit;
    }

    $id = intval($_POST['id']);

    if (mysqli_query($conn, "DELETE FROM products WHERE id=$id")) {
        $response = ["success" => true, "message" => "Product deleted successfully"];
    } else {
        $response["message"] = "Error deleting product: " . mysqli_error($conn);
    }
}

echo json_encode($response);
