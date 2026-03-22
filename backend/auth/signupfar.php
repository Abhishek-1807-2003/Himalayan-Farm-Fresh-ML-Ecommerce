<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect inputs safely
    $name      = trim($_POST['name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $password  = $_POST['password'] ?? '';
    $cpassword = $_POST['confirm_password'] ?? ''; // ✅ matches your form

    // ✅ Check required fields
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($cpassword)) {
        echo "❌ All fields are required.";
        exit;
    }

    // ✅ Confirm password check
    if ($password !== $cpassword) {
        echo "❌ Passwords do not match.";
        exit;
    }

    // ✅ Split full name into first and last
    $parts      = explode(" ", $name, 2);
    $first_name = $parts[0] ?? '';
    $last_name  = $parts[1] ?? '';

    // ✅ Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Prevent duplicate email
    $check = $conn->prepare("SELECT id FROM farmers WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "❌ Email already registered.";
        $check->close();
        $conn->close();
        exit;
    }
    $check->close();

    // ✅ Insert into database
    $sql = "INSERT INTO farmers (first_name, last_name, phone, email, password, role) 
            VALUES (?, ?, ?, ?, ?, 'farmer')";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "❌ SQL error: " . $conn->error;
        $conn->close();
        exit;
    }

    $stmt->bind_param("sssss", $first_name, $last_name, $phone, $email, $hashed_password);

    if ($stmt->execute()) {
        // ✅ Redirect to login page after signup
        header("Location: ../login_far.php?registered=1");
        exit;
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
