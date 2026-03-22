<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'components/header.php';

if (!isset($_SESSION['farmer_id'])) {
    header("Location: login.php");
    exit;
}
$farmer_id = $_SESSION['farmer_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farmer Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Header -->
  <header class="bg-green-600 text-white p-5 text-center text-2xl font-bold shadow-md">
    Farmer Dashboard
  </header>

  <!-- Products Section -->
  <main class="max-w-7xl mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">My Products</h2>

    <!-- ✅ Products aur Form ek hi grid me -->
    <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

      <!-- Products list dynamically insert honge -->
      <div id="product-list" class="contents"></div>

      <!-- ✅ Add Product Form -->
      <div class="bg-white p-6 rounded-xl shadow-md">
        <h3 class="text-lg font-semibold mb-4">Add New Product</h3>
        <form id="addProductForm" class="grid gap-3" enctype="multipart/form-data">
          <input type="text" name="name" placeholder="Product Name" required class="border p-2 rounded">
          <input type="text" name="unit" placeholder="Unit (e.g. kg, litre)" required class="border p-2 rounded">
          <input type="number" name="price" placeholder="Price" required class="border p-2 rounded">
          
          <!-- ✅ File upload instead of URL -->
          <input type="url" name="image" placeholder="Image URL" required class="border p-2 rounded">

          <textarea name="description" placeholder="Description" required class="border p-2 rounded"></textarea>
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">
            Add Product
          </button>
        </form>
      </div>

    </div>
  </main>

  <!-- Edit Modal -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h3 class="text-lg font-semibold mb-4">Edit Product</h3>
      <form id="editProductForm" class="grid gap-3" enctype="multipart/form-data">
        <input type="hidden" name="id" id="edit-id">
        <input type="text" name="name" id="edit-name" required class="border p-2 rounded">
        <input type="text" name="unit" id="edit-unit" required class="border p-2 rounded">
        <input type="number" name="price" id="edit-price" required class="border p-2 rounded">

        <!-- ✅ File input (optional for update) -->
        <input type="file" name="image" accept="image/*" class="border p-2 rounded">

        <textarea name="description" id="edit-description" required class="border p-2 rounded"></textarea>
        <div class="flex justify-between mt-2">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Update</button>
          <button type="button" onclick="closeEditModal()" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        </div>
      </form>
    </div>
  </div>

<script>
async function fetchProducts() {
  try {
    const res = await fetch("get_products.php");
    const result = await res.json();

    if (!result.success) {
      console.error("Fetch error:", result.message);
      return;
    }

    const products = result.data;  // ✅ use the 'data' array
    const list = document.getElementById("product-list");
    list.innerHTML = "";

    products.forEach(p => {
      list.innerHTML += `
        <div class="bg-white p-4 rounded-xl shadow-md">
          <img src="${p.image}" class="h-40 w-full object-cover rounded-lg mb-3">
          <h3 class="text-lg font-bold">${p.name}</h3>
          <p class="text-gray-600 text-sm">${p.description}</p>
          <div class="mt-2 font-semibold text-green-700">₹${p.price}/${p.unit}</div>
          <div class="flex justify-between mt-3">
            <button onclick='openEditModal(${JSON.stringify(p)})' class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</button>
            <button onclick="deleteProduct(${p.id})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
          </div>
        </div>`;
    });
  } catch (err) {
    console.error("Fetch error:", err);
  }
}

// ✅ Add Product
document.getElementById("addProductForm").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);

  try {
    const res = await fetch("add_product.php", { method: "POST", body: formData });
    const data = await res.json();

    if (data.success) {
      alert(data.message);
      e.target.reset();
      fetchProducts();
    } else {
      alert(data.message || "Error adding product");
    }
  } catch (err) {
    console.error("Add error:", err);
    alert("Something went wrong. Please try again.");
  }
});

// ✅ Edit Product
document.getElementById("editProductForm").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);

  try {
    const res = await fetch("edit_product_farmer.php", { method: "POST", body: formData });
    const data = await res.json();

    if (data.success) {
      alert(data.message || "Product updated successfully");
      closeEditModal();
      fetchProducts();
    } else {
      alert(data.message || "Error updating product");
    }
  } catch (err) {
    console.error("Update error:", err);
    alert("Something went wrong while updating. Please try again.");
  }
});

// ✅ Delete Product
async function deleteProduct(id) {
  if (!confirm("Are you sure you want to delete this product?")) return;

  const formData = new FormData();
  formData.append("id", id);

  try {
    const res = await fetch("delete_product_farmer.php", { method: "POST", body: formData });
    const text = await res.text();
    console.log("Delete response:", text);

    let data;
    try {
      data = JSON.parse(text);
    } catch (e) {
      alert("Invalid response from server: " + text);
      return;
    }

    if (data.success) {
      alert(data.message || "Product deleted successfully");
      fetchProducts();
    } else {
      alert(data.message || "Error deleting product");
    }
  } catch (err) {
    console.error("Delete error:", err);
    alert("Something went wrong while deleting. Please try again.");
  }
}

function openEditModal(product) {
  document.getElementById("edit-id").value = product.id;
  document.getElementById("edit-name").value = product.name;
  document.getElementById("edit-unit").value = product.unit;
  document.getElementById("edit-price").value = product.price;
  document.getElementById("edit-description").value = product.description;
  document.getElementById("editModal").classList.remove("hidden");
}

function closeEditModal() {
  document.getElementById("editModal").classList.add("hidden");
}

// Load products on page load
fetchProducts();
</script>
<a href="crop_prediction.php"
   style="position:fixed; bottom:120px; right:30px; background:#28a745; color:white;
          border-radius:50%; width:60px; height:60px; text-align:center;
          line-height:60px; font-size:24px; box-shadow:0 4px 10px rgba(0,0,0,0.2);
          text-decoration:none; z-index:9999;">
   🌾
</a>
</body>
</html>
