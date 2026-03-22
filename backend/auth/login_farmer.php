<?php
// action/login_farmer.php
session_start();
require_once './connection.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $_SESSION['error'] = 'Please enter email and password.';
        header('Location: ../login_far.php');
        exit;
    }

    // Fetch farmer by email
    $sql  = "SELECT id, first_name, password FROM farmers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        $_SESSION['error'] = 'Server error. Please try again.';
        header('Location: ../login_far.php');
        exit;
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify hashed password (your signup uses password_hash)
        if (password_verify($password, $row['password'])) {
            // ✅ Set the exact session keys your header.php expects
            $_SESSION['user_logged_in'] = true;
            $_SESSION['first_name']     = $row['first_name']; // this powers "Hi, ..."
            $_SESSION['farmer_id']      = $row['id'];         // optional but useful

            // Go to farmer dashboard
            header('Location: ../farmer_dashboard.php');
            exit;
        } else {
            $_SESSION['error'] = 'Incorrect password.';
            header('Location: ../login_far.php');
            exit;
        }
    } else {
        $_SESSION['error'] = 'No farmer found with that email.';
        header('Location: ../login_far.php');
        exit;
    }
}
