<?php 
session_start();
include 'components/header.php'; 
?>
<title>Farmer Login</title>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
</style>
</head>
<body class="bg-cover bg-center bg-fixed bg-no-repeat" 
      style="background-image: url('https://cdn.shopify.com/s/files/1/0569/0615/4154/files/organic_vegetables_1024x1024.jpg?v=1673046610'); background-size: cover; background-position: center; background-repeat: no-repeat;">

<main class="min-h-screen flex items-center justify-center bg-black bg-opacity-50 p-4">
    <div class="bg-white bg-opacity-95 backdrop-blur-md p-8 md:p-12 rounded-2xl shadow-2xl w-full max-w-md space-y-6">
        
        <!-- Form Header -->
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-800">Welcome Back</h2>
            <div class="h-1 w-10 bg-green-500 mx-auto my-3 rounded-full"></div>
            <p class="text-gray-500 text-sm">Log in as a farmer</p>
        </div>

        <!-- Error Message -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4 text-sm">
                <?php 
                    echo htmlspecialchars($_SESSION['error']); 
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="action/login_farmer.php" method="POST" id="farmerLoginForm" class="space-y-4" novalidate>
            
            <!-- Email -->
            <div>
                <input type="email" name="email" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="farmerEmail" placeholder="Email address" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="farmerEmailError">Please enter a valid email.</p>
            </div>

            <!-- Password -->
            <div>
                <input type="password" name="password" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="farmerPassword" placeholder="Password" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="farmerPasswordError">Password is required.</p>
            </div>

            <!-- Submit -->
            <button type="submit" 
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-full transition-colors duration-300 mt-6">
                LOGIN
            </button>
        </form>

        <!-- Signup Link -->
        <div class="text-center text-sm text-gray-500 mt-4">
            <span>New farmer?</span>
            <a href="./signup_far.php" class="text-green-500 hover:underline font-semibold ml-1">Register</a>
        </div>
    </div>
</main>

<!-- ✅ SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_GET['registered']) && $_GET['registered'] == 1): ?>
<script>
Swal.fire({
    position: "top",
        icon: "success",
    title: "🎉 Registration Successful!",
    showConfirmButton: false,
    timer: 3000,
    width: "350px",
    padding: "1rem",
    customClass: {
        popup: 'rounded-lg shadow-md',
        title: 'text-base font-semibold text-gray-800',
        htmlContainer: 'text-sm text-gray-600'
    }
});
</script>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('farmerLoginForm');
        const emailInput = document.getElementById('farmerEmail');
        const passwordInput = document.getElementById('farmerPassword');

        const emailError = document.getElementById('farmerEmailError');
        const passwordError = document.getElementById('farmerPasswordError');

        form.addEventListener('submit', function (e) {
            let valid = true;
            emailError.classList.add('hidden');
            passwordError.classList.add('hidden');

            const emailPattern = /\S+@\S+\.\S+/;
            if (!emailInput.value.trim() || !emailPattern.test(emailInput.value.trim())) {
                emailError.classList.remove('hidden');
                valid = false;
            }
            if (!passwordInput.value.trim()) {
                passwordError.classList.remove('hidden');
                valid = false;
            }

            if (!valid) e.preventDefault();
        });

        [emailInput, passwordInput].forEach(input =>
            input.addEventListener('input', () => document.getElementById(input.id + 'Error').classList.add('hidden'))
        );
    });
</script>
</body>
<?php include 'components/footer.php'; ?>  
