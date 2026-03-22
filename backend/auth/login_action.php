<?php
session_start();
include 'connection.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    echo "❌ All fields are required.";
    exit;
}

// Query the database
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        // ✅ Save login info in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['user_logged_in'] = true;   // ✅ Added this line
        $_SESSION['user_type'] = $user['role'] ?? 'customer'; // optional (if you have a role column in DB)

        // Redirect to main page
        header("Location: ../main.php");
        exit;
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ Email not registered.";
}

$stmt->close();
$conn->close();
?>
