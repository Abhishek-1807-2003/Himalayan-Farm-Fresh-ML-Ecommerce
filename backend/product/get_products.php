<?php
declare(strict_types=1);
header('Content-Type: application/json');

require_once __DIR__ . '/action/connection.php'; // adjust if your connection path differs

$sql = "SELECT id, name, unit, price, image, description 
        FROM products 
        ORDER BY id DESC";

$res = $conn->query($sql);

if (!$res) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'DB error',
        'error'   => $conn->error
    ]);
    exit;
}

$data = [];
while ($row = $res->fetch_assoc()) {
    $row['image'] = (string)($row['image'] ?? '');
    $row['price'] = (float)$row['price'];
    $row['name']  = (string)$row['name'];
    $row['unit']  = (string)$row['unit'];
    $row['description'] = (string)($row['description'] ?? '');
    $data[] = $row;
}

echo json_encode(['success' => true, 'data' => $data]);
