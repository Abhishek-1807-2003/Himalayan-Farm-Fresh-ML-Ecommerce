<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';
    $cpassword = $_POST['cpassword'] ?? '';


    // Split full name into first and last
    $parts = explode(" ", trim($name));
    $first_name = $parts[0] ?? '';
    $last_name = $parts[1] ?? ''; // If name has no space, last_name stays blank

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL insert
    $sql = "INSERT INTO users (first_name, last_name, phone, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "❌ SQL error: " . $conn->error;
        exit;
    }

    $stmt->bind_param("sssss", $first_name, $last_name, $phone, $email, $hashed_password);

    if ($stmt->execute()) {
    session_start();
    $_SESSION['success'] = "Registration successful!";
    header("Location: ../login_cu.php");
    exit();
}
    $stmt->close();
    $conn->close();
}

?>
