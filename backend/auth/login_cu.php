<?php 
session_start();
include 'components/header.php'; 
?>
<script src="https://cdn.tailwindcss.com"></script>
<body class="font-sans bg-no-repeat bg-cover bg-center" 
      style="background-image: url('https://i.redd.it/zgwd8svr2bd61.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">

<main class="min-h-screen flex items-center justify-center bg-black bg-opacity-40">
    <div class="bg-white p-10 rounded-lg shadow-lg w-full max-w-md">
        
        <!-- Title -->
        <h2 class="text-3xl font-semibold text-center mb-2">Welcome Back</h2>
        <div class="text-center text-gray-400 text-sm mb-6">LOGIN WITH EMAIL</div>

        <!-- Login Form -->
        <form action="action/login_action.php" method="POST" id="loginForm" class="space-y-5">
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium mb-1" for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium mb-1" for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded">
                Log in
            </button>
        </form>

        <!-- Divider -->
        <div class="border-t border-gray-200 my-6"></div>

        <!-- Register Link -->
        <p class="text-center text-sm text-gray-500">
            Don’t have an account? 
            <a href="./signup_cu.php" class="text-blue-600 hover:underline">Sign up here</a>
        </p>
    </div>
</main>

<!-- ✅ SweetAlert2 for popup -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($_SESSION['success'])): ?>
<script>
Swal.fire({
    position: "top", // 👈 popup at top center
    title: "🎉 Registration Successful!", 
    icon: "success",
    showConfirmButton: false, // no button
    timer: 3000, // auto close after 3 seconds
    width: "350px",
    padding: "1rem",
    customClass: {
        popup: 'rounded-lg shadow-md',
        title: 'text-base font-semibold text-gray-800',
        htmlContainer: 'text-sm text-gray-600'
    }
});
</script>
<?php unset($_SESSION['success']); endif; ?>

</body>
<?php include 'components/footer.php'; ?>
