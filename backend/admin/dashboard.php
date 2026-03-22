<?php
include './action/connection.php'; 

// Fetch Users
$users = mysqli_query($conn, "SELECT * FROM users");
$farmers = mysqli_query($conn, "SELECT * FROM farmers");
$products = mysqli_query($conn, "SELECT * FROM products");

// Counts
$totalUsers = mysqli_num_rows($users);
$totalFarmers = mysqli_num_rows($farmers);
$totalProducts = mysqli_num_rows($products);

// Reset pointers
mysqli_data_seek($users, 0);
mysqli_data_seek($farmers, 0);
mysqli_data_seek($products, 0);

// Products per Farmer count
$productsPerFarmer = [];
while ($row = mysqli_fetch_assoc($products)) {
    $productsPerFarmer[$row['farmer_id']] = ($productsPerFarmer[$row['farmer_id']] ?? 0) + 1;
}
mysqli_data_seek($products, 0);

// Users registered by date
$userRegistrations = [];
while ($row = mysqli_fetch_assoc($users)) {
    $date = date("Y-m", strtotime($row['created_at']));
    $userRegistrations[$date] = ($userRegistrations[$date] ?? 0) + 1;
}
mysqli_data_seek($users, 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Himalayan Farm Fresh</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  
  <style>
    .chart-container { height: 350px; }
    /* Banner */
    .banner {
      background: url('https://wallpaper-house.com/data/out/10/wallpaper2you_440850.jpg') no-repeat center center/cover;
      height: 250px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
    }
    .banner h1 {
      font-size: 2.5rem;
      font-weight: 700;
    }
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: #15803d !important; /* green */
    }
    .nav-link {
      font-weight: 500;
      color: #374151 !important;
    }
    .nav-link:hover {
      color: #15803d !important;
    }
    .card, .table {
  background-color: #fff !important;
  border-radius: 10px;
}

  </style>
</head>
<body style="background: linear-gradient(to right, #e2f4e7ff, #d7e9f4ff); min-height:100vh; display:flex; flex-direction:column;">


<!-- ✅ HEADER NAVBAR -->
<header class="shadow-sm bg-white">
  <nav class="navbar navbar-expand-lg navbar-light bg-white container py-2 justify-content-center">
    <a class="navbar-brand mx-auto" href="home.php">🌿 Himalayan Farm Fresh</a>
  </nav>
</header>

<!-- ✅ BANNER -->
<section class="banner">
  <div class="text-center">
    <h1>Admin Dashboard</h1>
    <p class="lead">Manage Users, Farmers & Products</p>
  </div>
</section>

<!-- ✅ MAIN DASHBOARD -->
<div class="container py-4">
  <h2 class="mb-4 text-center">Welcome, Admin</h2>

  <!-- Dashboard Summary -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card text-bg-black shadow-sm">
        <div class="card-body text-center">
          <h5>Total Users</h5>
          <h3><?= $totalUsers; ?></h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-bg-black shadow-sm">
        <div class="card-body text-center ">
          <h5>Total Farmers</h5>
          <h3><?= $totalFarmers; ?></h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-bg-warning shadow-sm">
        <div class="card-body text-center">
          <h5>Total Products</h5>
          <h3><?= $totalProducts; ?></h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="text-center">Users vs Farmers</h6>
          <div class="chart-container">
            <canvas id="userFarmerChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="text-center">Products per Farmer</h6>
          <div class="chart-container">
            <canvas id="productsFarmerChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="text-center">User Registrations Over Time</h6>
          <div class="chart-container">
            <canvas id="userRegChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabs -->
  <ul class="nav nav-tabs" id="adminTabs" role="tablist">
    <li class="nav-item">
      <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button">Users</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="farmers-tab" data-bs-toggle="tab" data-bs-target="#farmers" type="button">Farmers</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button">Products</button>
    </li>
  </ul>

  <div class="tab-content mt-3">
    <!-- Users Table -->
    <div class="tab-pane fade show active" id="users">
      <div class="table-responsive">
        <table class="table table-bordered table-striped datatable">
          <thead class="table-dark">
            <tr>
              <th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Created At</th><th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($users)) { ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['first_name']." ".$row['last_name']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                  <a href="view_user.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                  <a href="edit_user.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete_user.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Farmers Table -->
    <div class="tab-pane fade" id="farmers">
      <div class="table-responsive">
        <table class="table table-bordered table-striped datatable">
          <thead class="table-dark">
            <tr>
              <th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Role</th><th>Created At</th><th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($farmers)) { ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['first_name']." ".$row['last_name']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><span class="badge bg-primary"><?= $row['role']; ?></span></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                  <a href="view_farmer.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                  <a href="edit_farmer.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete_farmer.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Products Table -->
    <div class="tab-pane fade" id="products">
      <div class="table-responsive">
        <table class="table table-bordered table-striped datatable">
          <thead class="table-dark">
            <tr>
              <th>ID</th><th>Farmer ID</th><th>Name</th><th>Description</th><th>Price</th><th>Unit</th><th>Image</th><th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($products)) { ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['farmer_id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>$<?= number_format($row['price'], 2); ?></td>
                <td><?= $row['unit']; ?></td>
                <td><?php if($row['image']) { ?><img src="<?= $row['image']; ?>" width="50" class="rounded"><?php } ?></td>
                <td>
                  <a href="view_product.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                  <a href="edit_product.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete_product.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<!-- ✅ FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
  <small>&copy; <?= date("Y"); ?> Himalayan Farm Fresh. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(document).ready(function () {
    $('.datatable').DataTable();
  });

  // Users vs Farmers Pie Chart
  new Chart(document.getElementById('userFarmerChart'), {
    type: 'pie',
    data: {
      labels: ['Users', 'Farmers'],
      datasets: [{
        data: [<?= $totalUsers; ?>, <?= $totalFarmers; ?>],
        backgroundColor: ['#0d6efd','#198754']
      }]
    }
  });

  // Products per Farmer Bar Chart
  new Chart(document.getElementById('productsFarmerChart'), {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_keys($productsPerFarmer)); ?>,
      datasets: [{
        label: 'Products',
        data: <?= json_encode(array_values($productsPerFarmer)); ?>,
        backgroundColor: '#ffc107'
      }]
    },
    options: { scales: { y: { beginAtZero: true } } }
  });

  // User Registrations Over Time Line Chart
  new Chart(document.getElementById('userRegChart'), {
    type: 'line',
    data: {
      labels: <?= json_encode(array_keys($userRegistrations)); ?>,
      datasets: [{
        label: 'Registrations',
        data: <?= json_encode(array_values($userRegistrations)); ?>,
        borderColor: '#0dcaf0',
        backgroundColor: 'rgba(13,202,240,0.3)',
        fill: true,
        tension: 0.3
      }]
    }
  });
</script>
</body>
</html>
