<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No user ID provided!");
}
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM farmers WHERE id=$id"));
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
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="mb-4">✏️ Edit Farmer</h2>
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
      <button type="submit" class="btn btn-success">Save Changes</button>
      <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
