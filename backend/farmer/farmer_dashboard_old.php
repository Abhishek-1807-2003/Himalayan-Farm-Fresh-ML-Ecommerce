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
<body class="bg-gray-50 font-sans">

  <!-- Header -->
  <header class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-5 flex justify-between items-center shadow-md">
    <h1 class="text-2xl font-bold tracking-wide">🌱 Farmer Dashboard</h1>
    <span class="text-lg">
      👋 Hi, 
      <span class="font-semibold">
        <?= $_SESSION['farmer_name'] ?? ($_SESSION['customer_name'] ?? "Guest") ?>
      </span>
    </span>
  </header>

  <!-- Products Section -->
  <main class="max-w-7xl mx-auto p-8">
    <h2 class="text-2xl font-semibold mb-6 flex items-center gap-2">📦 My Products</h2>
    <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
    <p id="loadingText" class="text-center text-gray-500 mt-6 hidden">⏳ Loading products...</p>
  </main>

  <!-- Edit Modal -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-96">
      <h3 class="text-xl font-semibold mb-6 text-center">✏️ Edit Product</h3>
      <form id="editProductForm" class="grid gap-4" enctype="multipart/form-data">
        <input type="hidden" name="id" id="edit-id">

        <input type="text" name="name" id="edit-name" placeholder="Enter product name" required 
          class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-green-400">

        <input type="text" name="unit" id="edit-unit" placeholder="Enter unit (e.g. kg, litre)" required 
          class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-green-400">

        <input type="number" name="price" id="edit-price" placeholder="Enter price" required 
          class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-green-400">

        <input type="file" name="image" id="edit-image" accept="image/*"
          class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-green-400">

        <textarea name="description" id="edit-description" placeholder="Enter product description" required 
          class="border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-green-400"></textarea>

        <div class="flex justify-between mt-4">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow-md">
            ✅ Update
          </button>
          <button type="button" onclick="closeEditModal()" 
            class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg shadow-md">
            ❌ Cancel
          </button>
        </div>
      </form>
    </div>
  </div>

<script>
async function fetchProducts() {
  document.getElementById("loadingText").classList.remove("hidden");
  try {
    const res = await fetch("get_products.php");
    const products = await res.json();
    const list = document.getElementById("product-list");
    list.innerHTML = "";

    products.forEach(p => {
      list.innerHTML += `
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-xl transition border border-gray-200 flex flex-col">
          <img src="${p.image}" class="h-40 w-full object-cover rounded-lg mb-4">
          <h3 class="text-lg font-bold text-gray-800">${p.name}</h3>
          <p class="text-gray-600 text-sm line-clamp-2 flex-1">${p.description}</p>
          <div class="mt-3 font-semibold text-green-700 text-lg">₹${p.price}/${p.unit}</div>
          <div class="flex justify-between mt-4">
            <button onclick='openEditModal(${JSON.stringify(p)})' 
              class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow">✏️ Edit</button>
            <button onclick="deleteProduct(${p.id})" 
              class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">🗑 Delete</button>
          </div>
        </div>`;
    });

    // Add Product card
    list.innerHTML += `
      <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-xl transition border border-gray-200 flex flex-col">
        <h3 class="text-lg font-semibold mb-4 text-center">➕ Add New Product</h3>
        <form id="addProductForm" class="grid gap-3 flex-1" enctype="multipart/form-data">
          <input type="text" name="name" placeholder="Product Name" required class="border p-2 rounded-lg">
          <input type="text" name="unit" placeholder="Unit (e.g. kg, litre)" required class="border p-2 rounded-lg">
          <input type="number" name="price" placeholder="Price" required class="border p-2 rounded-lg">
          <input type="file" name="image" accept="image/*" required class="border p-2 rounded-lg">
          <textarea name="description" placeholder="Description" required class="border p-2 rounded-lg"></textarea>
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg shadow-md">
            ➕ Add Product
          </button>
        </form>
      </div>`;
    
    attachAddProductHandler();
  } catch (err) {
    console.error("Fetch error:", err);
    alert("⚠️ Failed to load products. Please try again.");
  } finally {
    document.getElementById("loadingText").classList.add("hidden");
  }
}

// Add Product
function attachAddProductHandler() {
  const form = document.getElementById("addProductForm");
  if (!form) return;
  form.addEventListener("submit", async e => {
    e.preventDefault();
    const formData = new FormData(e.target);
    try {
      const res = await fetch("add_product.php", { method: "POST", body: formData });
      const data = await res.json();
      if (data.success) {
        alert("✅ " + data.message);
        fetchProducts();
      } else {
        alert("❌ " + (data.message || "Error adding product"));
      }
    } catch (err) {
      console.error("Error:", err);
      alert("Something went wrong. Please try again.");
    }
  });
}

// Edit Product
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
document.getElementById("editProductForm").addEventListener("submit", async e => {
  e.preventDefault();
  const formData = new FormData(e.target);
  try {
    const res = await fetch("edit_product.php", { method: "POST", body: formData });
    const data = await res.json();
    if (data.success) {
      alert("✅ " + data.message);
      closeEditModal();
      fetchProducts();
    } else {
      alert("❌ " + (data.message || "Error updating product"));
    }
  } catch (err) {
    console.error("Error:", err);
    alert("Something went wrong while updating.");
  }
});

// Delete Product
async function deleteProduct(id) {
  if (!confirm("🗑 Are you sure you want to delete this product?")) return;
  const formData = new FormData();
  formData.append("id", id);
  try {
    const res = await fetch("delete_product.php", { method: "POST", body: formData });
    const data = await res.json();
    if (data.success) {
      alert("✅ " + data.message);
      fetchProducts();
    } else {
      alert("❌ " + (data.message || "Error deleting product"));
    }
  } catch (err) {
    console.error("Error:", err);
    alert("Something went wrong while deleting.");
  }
}

// Load products
fetchProducts();
</script>
</body>
</html>
