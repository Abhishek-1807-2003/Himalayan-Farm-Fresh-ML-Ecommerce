<?php
include './action/connection.php';

if (!isset($_GET['id'])) {
    die("No user ID provided!");
}
$id = intval($_GET['id']);

// Delete user
if (mysqli_query($conn, "DELETE FROM farmers WHERE id=$id")) {
    header("Location: dashboard.php?msg=User deleted successfully");
    exit;
} else {
    die("Error deleting user: " . mysqli_error($conn));
}
?>
