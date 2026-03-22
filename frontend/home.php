<?php include 'components/header.php'; ?>
<style>
    .hero-area {
        background-image: url('./assets/img/cow.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

    <main class="flex-grow">
        <!-- Hero Section with a Single, Non-Repeating Background -->
        <section id="hero-section" class="hero-area h-screen flex flex-col items-center justify-center text-white text-center px-4">
            <div class="bg-black bg-opacity-40 p-8 rounded-xl shadow-lg transform transition-all duration-500 hover:scale-105">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-4 animate-fade-in" style="text-shadow: 2px 2px 4px #000; letter-spacing: 0.1rem;">Fresh from the Himalayas</h1>
                <p class="text-lg md:text-2xl mb-8 animate-fade-in delay-100">Discover our organic, locally sourced produce.</p>
                <a href="main.php" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110">
                    Shop Now
                </a>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section class="py-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Our Featured Produce</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Product Card 1 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <img src="https://www.nirvanaorganic.in/cdn/shop/articles/matheus-cenali-wXuzS9xR49M-unsplash.jpg?v=1714462540&width=1500" alt="Fresh Apples" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Organic Apples</h3>
                            <p class="text-gray-600">Crisp and sweet apples, hand-picked from our orchards.</p>
                            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Learn More &rarr;</a>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <img src="https://agrithing.com/wp-content/uploads/2023/05/patato-3.png.webp" alt="Fresh Potatoes" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Farm-Fresh Potatoes</h3>
                            <p class="text-gray-600">Grown in the rich soil of the Himalayan foothills.</p>
                            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Learn More &rarr;</a>
                        </div>
                    </div>
                    <!-- Product Card 3 -->
                     <li><a href="inventory_prediction.php">📦 Inventory Prediction</a></li>
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRT3s1H_UtfoBeyQi604JVU799bpZdQRljnQA&s" alt="Fresh Greens" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Seasonal Greens</h3>
                            <p class="text-gray-600">A variety of leafy vegetables, delivered daily.</p>
                            <a href="#" class="mt-4 inline-block text-green-600 hover:text-green-800 font-medium">Learn More &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us / Mission Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <img src="https://static.toiimg.com/photo/msid-87884001,width-96,height-65.cms" alt="A photo of the Himalayan Farm" class="rounded-xl shadow-lg w-full h-auto">
                </div>
                <div class="md:w-1/2 text-center md:text-left">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Mission</h2>
                    <p class="text-gray-600 text-lg mb-4">
                        At Himalayan Farm Fresh, we are committed to sustainable farming practices. We believe in providing our community with the highest quality organic produce, grown with care and respect for nature. Our mission is to connect you directly to the source of your food, ensuring freshness and purity in every bite.
                    </p>
                    <a href="read_story.php" class="inline-block text-white bg-green-600 hover:bg-green-700 font-bold py-2 px-6 rounded-full transition-colors duration-300">
                        Read Our Story
                    </a>
                </div>
            </div>
        </section>

    </main>

<?php include 'components/footer.php'; ?>