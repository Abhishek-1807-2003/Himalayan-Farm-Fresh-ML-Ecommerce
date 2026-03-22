<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Himalayan Farm Fresh</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Inter Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    .role-dropdown {
      display: none;
      flex-direction: column;
      position: absolute;
      right: 0;
      top: 100%;
      margin-top: 0.5rem;
      background-color: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 0.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 12rem;
      z-index: 50;
      overflow: hidden;
    }
    .role-dropdown a {
      padding: 0.5rem 1rem;
      color: #374151;
      text-decoration: none;
      transition: background-color 0.2s, color 0.2s;
    }
    .role-dropdown a:hover {
      background-color: #d1fae5;
      color: #065f46;
    }
    .dropdown-button {
      display: flex;
      align-items: center;
      gap: 0.25rem;
      cursor: pointer;
    }
    .user-name {
      color: #2d3748;
      font-weight: 500;
      margin-right: 10px;
    }
    .logout-button {
      background-color: #ef4444;
      color: #fff;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      font-size: 0.875rem;
      font-weight: 500;
      transition: background-color 0.2s;
      display: block;
      text-align: center;
      margin: 0.25rem 0;
    }
    .logout-button:hover {
      background-color: #dc2626;
    }
    @media (max-width: 768px) {
      .user-name {
        display: none;
      }
    }
  </style>
</head>

<body class="text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-sm py-4 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto px-4 flex justify-between items-center">
      
      <!-- Logo -->
      <a href="home.php" class="text-2xl font-bold text-green-700 rounded-lg p-2">
        🌿 Himalayan Farm Fresh
      </a>

      <!-- Navigation -->
      <nav class="hidden md:flex space-x-6">
        <a href="home.php" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">Home</a>
        <a href="main.php" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">Shop</a>
        <a href="about_us.php" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">About Us</a>
        <a href="contact.php" class="text-gray-700 hover:text-green-600 font-medium transition-colors duration-300">Contact</a>
      </nav>

      <!-- Right side -->
      <div class="flex items-center space-x-4">

        <?php if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true): ?>
          <!-- Login Dropdown -->
          <div class="relative">
            <button onclick="toggleDropdown('loginDropdown')" class="dropdown-button bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-semibold hover:bg-gray-300 transition-all duration-300">
              Login <i class="fas fa-caret-down text-sm"></i>
            </button>
            <div id="loginDropdown" class="role-dropdown">
              <a href="admin_login.php">Login as Admin</a>
              <a href="login_cu.php">Login as Customer</a>
              <a href="login_far.php">Login as Farmer</a>
            </div>
          </div>

          <!-- Signup Dropdown -->
          <div class="relative">
            <button onclick="toggleDropdown('signupDropdown')" class="dropdown-button bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-md transition-all duration-300">
              Signup <i class="fas fa-caret-down text-sm"></i>
            </button>
            <div id="signupDropdown" class="role-dropdown">
              <a href="signup_cu.php">Customer</a>
              <a href="signup_far.php">Farmer</a>
            </div>
          </div>

        <?php else: ?>
          <!-- Logged in: Cart + User Dropdown -->
          <div class="flex items-center space-x-3 relative">
            <span class="user-name">
              Hi, <?php echo htmlspecialchars($_SESSION['first_name'] ?? 'User'); ?>
            </span>

            <!-- Cart -->
            <a href="cart.php" id="cart-icon-link" class="text-gray-700 hover:text-green-600 text-xl transition-colors duration-300 relative">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-count" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">0</span>
            </a>

            <!-- Account Dropdown -->
            <div class="relative">
              <button onclick="toggleDropdown('accountDropdown')" class="dropdown-button text-gray-700 hover:text-green-600 text-xl transition-colors duration-300">
                <i class="fas fa-user-circle"></i>
              </button>
              <div id="accountDropdown" class="role-dropdown">
                <a href="profile.php">Profile</a>
                <a href="orders.php">Orders</a>
                <a href="logout.php" class="logout-button">Logout</a>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <!-- Mobile Menu Icon -->
        <button class="md:hidden text-gray-700 hover:text-green-600 text-xl focus:outline-none">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- Dropdown JS -->
  <script>
    function toggleDropdown(id) {
      const dropdown = document.getElementById(id);
      const isHidden = dropdown.style.display === 'none' || !dropdown.style.display;
      document.querySelectorAll('.role-dropdown').forEach(d => d.style.display = 'none');
      if (isHidden) dropdown.style.display = 'flex';
    }

    window.addEventListener('click', function(e) {
      if (!e.target.closest('.dropdown-button')) {
        document.querySelectorAll('.role-dropdown').forEach(d => d.style.display = 'none');
      }
    });
  </script>

  <!-- WhatsApp Style Chatbot -->
  <div id="chatbot"
       style="position:fixed; bottom:20px; right:20px; width:400px; background:#fff; border:1px solid #ccc; border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.25); font-family:'Inter', sans-serif; z-index:9999;">
    <div id="chat-header" style="background:#28a745; color:#fff; padding:12px 16px; border-radius:12px 12px 0 0; cursor:pointer; font-size:18px; font-weight:600;">
      🌿 FarmBot Assistant
    </div>
    <div id="chat-messages" style="height:350px; overflow-y:auto; padding:15px; font-size:16px; display:none; line-height:1.5; background:#ece5dd;"></div>
    <div id="chat-input-area" style="display:none; border-top:1px solid #ccc; padding:8px; gap:8px; align-items:center; background:#f0f0f0;">
      <input id="chat-input" type="text" placeholder="Type your message..."
             style="flex:1; border:1px solid #ccc; border-radius:20px; padding:10px 15px; font-size:15px; outline:none;">
      <button onclick="sendMessage()"
              style="padding:10px 16px; border:none; background:#28a745; border-radius:50%; font-size:16px; font-weight:500; color:#fff; cursor:pointer;">
        ➤
      </button>
    </div>
  </div>

  <script>
const chatHeader = document.getElementById("chat-header");
const chatMessages = document.getElementById("chat-messages");
const chatInputArea = document.getElementById("chat-input-area");

// Toggle chatbot open/close
chatHeader.addEventListener("click", () => {
  const visible = chatMessages.style.display === "block";
  chatMessages.style.display = visible ? "none" : "block";
  chatInputArea.style.display = visible ? "none" : "flex";
});

// Core responses (expanded)
const responses = {
  "hi": "Hello! 👋 Welcome to Himalayan Farm Fresh. How can I assist you today?",
  "hello": "Hi there! 🌿 How are you?",
  "how are you": "I’m just a bot 🤖 but I’m doing great! Thanks for asking.",
  "shop": "You can explore fresh fruits, vegetables, dairy, and more in the Shop page 🛒.",
  "products": "We sell Himalayan apples, kiwi, plums, broccoli, dairy, herbs, and handmade items.",
  "price": "Our prices are listed on the Shop page. Would you like me to guide you there?",
  "order": "To place an order, add items to your cart and proceed to checkout ✅.",
  "delivery": "We deliver across India 🚚 within 3–5 business days.",
  "payment": "We support UPI, Credit/Debit cards, and Cash on Delivery 💳.",
  "farmer": "Our farmers are from the Himalayas, growing organic and fresh produce 👨‍🌾.",
  "about": "Check out the About Us page to learn our story 🌱.",
  "contact": "You can reach us at support@example.com 📧 or use the Contact page.",
  "signup": "You can sign up as a Customer or Farmer using the Signup options in the menu.",
  "login": "Login options are available for Admin, Customer, and Farmer.",
  "thanks": "You're most welcome! 🙏",
  "thank you": "Happy to help 🌸",
  "bye": "Goodbye! 👋 Have a great day ahead!",
  "goodbye": "See you soon! 🌿"
};

// Fallback replies (random pick)
const fallbackReplies = [
  "Hmm 🤔 I’m not sure, but you can check our Shop or Contact page.",
  "That’s interesting! 🌱 Could you rephrase your question?",
  "I may not know this exactly, but I can guide you about products, prices, farmers, or orders.",
  "Sorry, I didn’t fully get that. Want me to connect you to support@example.com? 📧",
  "I’m still learning 🌿 but I’ll try my best to help you!"
];

// Helper: get best reply
function getReply(message) {
  const lower = message.toLowerCase();

  // Loop through all keywords
  for (let key in responses) {
    if (lower.includes(key)) {
      return responses[key]; // first keyword match
    }
  }

  // If no keyword matches → random fallback
  return fallbackReplies[Math.floor(Math.random() * fallbackReplies.length)];
}

function sendMessage() {
  const input = document.getElementById("chat-input");
  const message = input.value.trim();
  if (!message) return;

  // User bubble
  chatMessages.innerHTML += `<div style="margin:8px 0; text-align:right;">
    <span style="display:inline-block; background:#dcf8c6; padding:10px 14px; border-radius:16px; max-width:75%; font-size:15px;">${message}</span>
  </div>`;

  // Bot “typing” indicator
  chatMessages.innerHTML += `<div id="typing" style="margin:8px 0; text-align:left; font-size:13px; color:#555;">FarmBot is typing...</div>`;
  chatMessages.scrollTop = chatMessages.scrollHeight;

  // Delay for realism
  setTimeout(() => {
    document.getElementById("typing").remove();

    const reply = getReply(message);

    // Bot bubble
    chatMessages.innerHTML += `<div style="margin:8px 0; text-align:left;">
      <span style="display:inline-block; background:#fff; padding:10px 14px; border-radius:16px; max-width:75%; font-size:15px; border:1px solid #ccc;">${reply}</span>
    </div>`;
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }, 800);

  input.value = "";
}
</script>
 
</body>
</html>
