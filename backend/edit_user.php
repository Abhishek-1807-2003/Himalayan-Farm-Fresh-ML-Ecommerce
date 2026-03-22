<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No user ID provided!");
}
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
if (!$user) {
    die("User not found!");
}

// Update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "UPDATE users SET first_name='$first', last_name='$last', email='$email', phone='$phone' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?msg=User updated successfully");
        exit;
    } else {
        $error = "Error updating user: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .edit-card {
      background: #fff;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 600px;
      animation: fadeIn 0.5s ease-in-out;
    }
    h2 {
      font-weight: 700;
      color: #333;
      text-align: center;
      margin-bottom: 25px;
    }
    .form-label {
      font-weight: 600;
      color: #555;
    }
    .form-control {
      border-radius: 10px;
      padding: 10px;
    }
    .btn {
      border-radius: 50px;
      padding: 10px 25px;
      font-weight: 600;
    }
    .btn-success {
      background: #28a745;
      border: none;
    }
    .btn-success:hover {
      background: #218838;
    }
    .btn-secondary {
      background: #6c757d;
      border: none;
    }
    .btn-secondary:hover {
      background: #5a6268;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="edit-card">
    <h2>✏️ Edit Customer</h2>
    <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" value="<?= $user['first_name']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" value="<?= $user['last_name']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= $user['phone']; ?>">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-success">💾 Save Changes</button>
        <a href="dashboard.php" class="btn btn-secondary">❌ Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
