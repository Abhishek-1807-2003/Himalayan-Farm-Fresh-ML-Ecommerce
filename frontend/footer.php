    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-10 mt-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About Us -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Himalayan Farm Fresh</h3>
                <p class="text-sm">Bringing you the finest organic produce and handmade goods directly from the pristine Himalayas.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Shop All</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Gifting</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Bulk Orders</a></li>
                    <li><a href="./faq.php" class="hover:text-white transition-colors duration-300">FAQs</a></li>
                </ul>
            </div>

            <!-- Information -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Information</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Terms & Conditions</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Shipping & Returns</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Contact Us</h3>
                <p class="text-sm">Email: <a href="mailto:info@farmfreshfoods.in" class="hover:text-white transition-colors duration-300">info@farmfreshfoods.in</a></p>
                <p class="text-sm">Phone: <a href="tel:+917006305700" class="hover:text-white transition-colors duration-300">+91 70063 05700</a></p>
                <p class="text-sm">Address: shimla, Himachal Pradesh India</p>
            </div>
        </div>
        <div class="text-center text-gray-500 text-sm mt-8 pt-4 border-t border-gray-700">
            &copy; 2025 Himalayan Farm Fresh. All rights reserved.
        </div>
    </footer>
<!-- Footer -->


<!-- Scroll to Top Button -->
<button id="scrollTopBtn" 
        class="hidden fixed bottom-6 right-6 bg-green-600 text-white p-3 rounded-full shadow-lg hover:bg-green-700 transition duration-300">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- All JavaScript for the entire page, including the header script, goes here -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginBtn = document.getElementById('loginBtn');
        const signupBtn = document.getElementById('signupBtn');
        const loginDropdown = document.getElementById('loginDropdown');
        const signupDropdown = document.getElementById('signupDropdown');
        const cartCountSpan = document.getElementById('cart-count');
        const scrollBtn = document.getElementById("scrollTopBtn");

        // Initialize cart count
        let currentCartCount = 0;
        if (cartCountSpan) {
            cartCountSpan.textContent = currentCartCount;
        }

        // Toggle login dropdown
        if (loginBtn) {
            loginBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (loginDropdown) loginDropdown.classList.toggle('show');
                if (signupDropdown) signupDropdown.classList.remove('show');
            });
        }

        // Toggle signup dropdown
        if (signupBtn) {
            signupBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (signupDropdown) signupDropdown.classList.toggle('show');
                if (loginDropdown) loginDropdown.classList.remove('show');
            });
        }

        // Close dropdowns when clicking outside
        window.addEventListener('click', function(e) {
            if (loginDropdown && !loginDropdown.contains(e.target) && loginBtn && !loginBtn.contains(e.target)) {
                loginDropdown.classList.remove('show');
            }
            if (signupDropdown && !signupDropdown.contains(e.target) && signupBtn && !signupBtn.contains(e.target)) {
                signupDropdown.classList.remove('show');
            }
        });

        // Function to update cart count
        window.updateHeaderCartCount = function(newCount) {
            if (cartCountSpan) {
                cartCountSpan.textContent = newCount;
            }
        };

        // Show/Hide scroll-to-top button
        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                scrollBtn.classList.remove("hidden");
            } else {
                scrollBtn.classList.add("hidden");
            }
        });

        // Scroll to top smoothly
        scrollBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    });
</script>
</body>
</html>
