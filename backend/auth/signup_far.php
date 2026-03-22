<?php include 'components/header.php'; ?>
<title>Create Account</title>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f7f7f7;
    }
</style>
</head>
<body class="bg-cover bg-center bg-fixed bg-no-repeat" 
      style="background-image: url('https://wallpapercave.com/wp/wp3708743.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

<main class="min-h-screen flex items-center justify-center bg-black bg-opacity-50 p-4">
    <div class="bg-white p-8 md:p-12 rounded-2xl shadow-2xl w-full max-w-lg space-y-6">
        
        <!-- Form Header -->
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-800">Create Account</h2>
            <div class="h-1 w-10 bg-green-500 mx-auto my-3 rounded-full"></div>
            <p class="text-gray-500 text-sm">Sign up as a farmer</p>
        </div>

        <!-- Signup Form -->
        <form action="action/signupfar.php" method="POST" id="farmerSignupForm" class="space-y-4" novalidate>
            
            <!-- Full Name -->
            <div>
                <input type="text" name="name" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="name" placeholder="Full Name" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="nameError">Name is required.</p>
            </div>
            
            <!-- Email Address -->
            <div>
                <input type="email" name="email" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="email" placeholder="Email address" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="emailError">Please enter a valid email.</p>
            </div>

            <!-- Phone Number -->
            <div>
                <input type="tel" name="phone" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="phone" placeholder="Phone number" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="phoneError">Please enter a valid phone number (10 digits starting with 6-9).</p>
            </div>

            <!-- Password --> 
            <div>
                <input type="password" name="password" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="password" placeholder="Password" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="passwordError">Password is required.</p>
            </div>

            <!-- Confirm Password -->
            <div>
                <input type="password" name="confirm_password" 
                       class="w-full px-4 py-3 rounded-lg border border-green-500 focus:outline-none focus:ring-2 focus:ring-green-500" 
                       id="confirmPassword" placeholder="Confirm Password" required />
                <p class="text-red-500 text-sm mt-1 hidden" id="confirmPasswordError">Passwords do not match.</p>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-full transition-colors duration-300 mt-6">
                SIGN UP
            </button>
        </form>

        <!-- Login Link -->
        <div class="text-center text-sm text-gray-500 mt-4">
            <span>Already have an account?</span>
            <a href="./login_far.php" class="text-green-500 hover:underline font-semibold ml-1">Login</a>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('farmerSignupForm');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');

        const nameError = document.getElementById('nameError');
        const emailError = document.getElementById('emailError');
        const phoneError = document.getElementById('phoneError');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');

        form.addEventListener('submit', function (e) {
            let valid = true;
            nameError.classList.add('hidden');
            emailError.classList.add('hidden');
            phoneError.classList.add('hidden');
            passwordError.classList.add('hidden');
            confirmPasswordError.classList.add('hidden');

            if (!nameInput.value.trim()) { nameError.classList.remove('hidden'); valid = false; }
            const emailPattern = /\S+@\S+\.\S+/;
            if (!emailInput.value.trim() || !emailPattern.test(emailInput.value.trim())) { emailError.classList.remove('hidden'); valid = false; }
            const phonePattern = /^[6-9]\d{9}$/;
            if (!phoneInput.value.trim() || !phonePattern.test(phoneInput.value.trim())) { phoneError.classList.remove('hidden'); valid = false; }
            if (!passwordInput.value.trim()) { passwordError.classList.remove('hidden'); valid = false; }
            if (confirmPasswordInput.value.trim() !== passwordInput.value.trim()) { confirmPasswordError.classList.remove('hidden'); valid = false; }

            if (!valid) e.preventDefault();
        });

        [nameInput, emailInput, phoneInput, passwordInput, confirmPasswordInput].forEach(input =>
            input.addEventListener('input', () => document.getElementById(input.id + 'Error').classList.add('hidden'))
        );
    });
</script>
</body>
<?php include 'components/footer.php'; ?>
