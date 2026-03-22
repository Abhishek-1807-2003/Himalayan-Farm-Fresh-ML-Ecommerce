<?php include 'components/header.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    /* ---------- Parallax + Animations ---------- */
    .parallax {
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    @keyframes fadeUp { from {opacity: 0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
    .reveal { opacity: 0; transform: translateY(18px); }
    .reveal.show { animation: fadeUp .9s ease forwards; }

    /* Soft float for hero badge */
    @keyframes float { 0%{transform:translateY(0)} 50%{transform:translateY(-6px)} 100%{transform:translateY(0)} }
    .float { animation: float 4s ease-in-out infinite; }
    
    /* Drop cap for the first story paragraph */
    .drop-cap::first-letter {
        font-size: 3.5rem;
        line-height: 1;
        float: left;
        padding-right: .2rem;
        font-weight: 800;
        color: #16a34a; /* green-600 */
    }
</style>

<body class="bg-gray-50 text-gray-800">

<section class="relative min-h-[70vh] flex items-center justify-center text-white overflow-hidden">
    <div class="absolute inset-0 parallax" style="background-image:url('./assets/img/Farmers\ at\ Himalayan\ Terraces.png');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-green-900/80 via-green-800/70 to-green-700/60"></div>

    <div class="relative z-10 container mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm float">
            🌿  Pure Himalayan Goodness
        </span>
        <h1 class="mt-6 text-4xl md:text-6xl font-extrabold drop-shadow-xl reveal">The Story of Himalayan Farm Fresh</h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg md:text-xl text-white/90 reveal">
            From terraced hills kissed by the morning sun to your table — fresh, honest, and grown with love.
        </p>
        <a href="#our-story" class="inline-block mt-8 bg-white text-green-900 font-semibold px-6 py-3 rounded-full hover:bg-gray-100 transition reveal">
            Discover Our Journey
        </a>
    </div>
</section>

<section id="our-story" class="relative py-20">
    <div class="container mx-auto px-6 max-w-6xl grid md:grid-cols-2 gap-16 items-center">
        <div class="relative reveal">
            <div class="absolute -top-6 -left-6 w-40 h-40 bg-green-100 rounded-3xl -z-10"></div>
            <img src="./assets/img/623559d0-8d55-4ed5-a067-0c2aac7ae8c1.png" alt="Farmers tending Himalayan terraces"
                 class="rounded-3xl shadow-2xl border-4 border-white">
        </div>
        <div class="reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700">Rooted in the Mountains</h2>
            <div class="h-1.5 w-20 bg-green-500 rounded-full mt-4 mb-6"></div>
            <p class="drop-cap leading-relaxed text-lg mb-6">
                Our story is not just a business narrative; it is a legacy. It began over a decade ago with a simple, profound idea: to reconnect with the land and the time-honored farming practices passed down through generations in the Himalayan valleys. We are a collective of families who chose to protect our heritage by growing food the right way — patiently, honestly, and in a delicate balance with nature's rhythm.
            </p>
            <p class="leading-relaxed text-lg mb-6">
                Every apple, every herb, every drop of milk from our farms is a testament to this philosophy. We nurture our crops with pure glacial water, rich mountain soil, and the quiet discipline of sunrise-to-sunset care. This is a promise we make to you: no synthetic chemicals, no shortcuts, just the unadulterated goodness of a land as pure as our produce.
            </p>
            <p class="leading-relaxed text-lg">
                Today, Himalayan Farm Fresh bridges the distance between these majestic hills and your home, fostering a sustainable relationship that strengthens local communities while delivering food that truly tastes the way nature intended.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-green-50">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-center reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700">What We Stand For</h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                Every decision we make—from seed to shipment—is guided by these unwavering principles.
            </p>
        </div>
        <div class="mt-12 grid md:grid-cols-3 gap-8">
            <div class="group flex flex-col items-center text-center p-8 rounded-2xl bg-white shadow-lg hover:shadow-2xl transition reveal">
                <div class="w-24 h-24 p-4 rounded-full bg-green-100 flex items-center justify-center transition-all group-hover:bg-green-200">
                    <svg class="h-12 w-12 text-green-600 transition-all group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.24a5.5 5.5 0 00-7.778 0L12 5.618l-1.821 1.821a5.5 5.5 0 00-7.778 7.778l1.82 1.821 7.779 7.778 7.778-7.778 1.821-1.82a5.5 5.5 0 000-7.778z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-green-700">Purity & Quality</h3>
                <p class="mt-3 text-gray-600">Clean, chemical-free produce grown with care and harvested at peak freshness. Food that is truly wholesome.</p>
            </div>
            <div class="group flex flex-col items-center text-center p-8 rounded-2xl bg-white shadow-lg hover:shadow-2xl transition reveal delay-150">
                <div class="w-24 h-24 p-4 rounded-full bg-green-100 flex items-center justify-center transition-all group-hover:bg-green-200">
                    <svg class="h-12 w-12 text-green-600 transition-all group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-5a3 3 0 00-3-3H8a3 3 0 00-3 3v5h5"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9l2 2 4-4m-1.5-1.5V11a2 2 0 01-2 2H9.5a2 2 0 01-2-2V9.5a2 2 0 012-2H11a2 2 0 012 2z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-green-700">Empowering Communities</h3>
                <p class="mt-3 text-gray-600">We forge direct partnerships with our farmers, ensuring fair wages, a stable income, and preserving their traditional way of life.</p>
            </div>
            <div class="group flex flex-col items-center text-center p-8 rounded-2xl bg-white shadow-lg hover:shadow-2xl transition reveal delay-300">
                <div class="w-24 h-24 p-4 rounded-full bg-green-100 flex items-center justify-center transition-all group-hover:bg-green-200">
                    <svg class="h-12 w-12 text-green-600 transition-all group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.136 0-5.753 1.996-6.711 4.545a9.04 9.04 0 00-1.84 5.342c.453 1.838 2.016 3.238 3.86 3.655 1.579.35 3.195.14 4.707-.565a.5.5 0 01.378 0c1.512.705 3.128.915 4.707.565 1.844-.417 3.407-1.817 3.86-3.655a9.04 9.04 0 00-1.84-5.342C17.753 9.996 15.136 8 12 8zM12 12a4 4 0 100 8 4 4 0 000-8z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-green-700">Environmental Stewardship</h3>
                <p class="mt-3 text-gray-600">Our sustainable practices protect the delicate Himalayan ecosystem, ensuring the land remains fertile and the environment pristine for generations to come.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-center reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700">A Glimpse Into Our Himalayan World</h2>
            <p class="mt-3 text-gray-600">Journey through the stunning landscapes and vibrant life that nourish our produce.</p>
        </div>
        <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition reveal">
                <img class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://media.istockphoto.com/id/1432905112/photo/beautiful-rice-terrace-in-himachal-pradesh-india.jpg?s=612x612&w=0&k=20&c=kponwox1_Kz1zZJVZCQJKdsUVRWnGzeYShO9ySzEa6g=" alt="Lush green terraced fields in Shimla">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <p class="text-white text-xl font-semibold">Emerald Terraces of Shimla</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition reveal delay-100">
                <img class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://www.thestatesman.com/wp-content/uploads/2018/05/appel-orcheds.jpg" alt="Blooming apple orchard in Himachal">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <p class="text-white text-xl font-semibold">Blossoms of Our Orchards</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition reveal delay-200">
                <img class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://i.pinimg.com/736x/e3/25/69/e32569b37b259da0c8b6ce3589a14f29.jpg" alt="Local farmers joyfully harvesting fresh crops">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <p class="text-white text-xl font-semibold">The Joy of Harvest</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition reveal delay-300">
                <img class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://i.pinimg.com/736x/56/0e/fa/560efa36c00b3f25ec8fab0fd58a13a9.jpg" alt="A vibrant basket of freshly picked vegetables">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <p class="text-white text-xl font-semibold">Nature's Colorful Bounty</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition reveal delay-400">
                <img class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://i.pinimg.com/1200x/31/d0/c9/31d0c9c1709855da6a307851d86953bd.jpg" alt="Pristine glacial water flowing down the mountains">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <p class="text-white text-xl font-semibold">Nourished by Glacial Waters</p>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition reveal delay-500">
                <img class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500" src="https://i.pinimg.com/736x/77/a9/59/77a959d0af926db99f636778907a7e89.jpg" alt="Traditional farming tools and practices">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <p class="text-white text-xl font-semibold">Our Heritage of Farming</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative py-20 text-white">
    <div class="absolute inset-0 parallax" style="background-image:url('./assets/img/feature-bg.jpg');"></div>
    <div class="absolute inset-0 bg-green-900/80"></div>
    <div class="relative container mx-auto px-6 max-w-5xl text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold reveal">Bring the Himalayas Home</h2>
        <p class="mt-3 text-white/90 max-w-2xl mx-auto reveal">
            Choose produce that’s good for you, fair for farmers, and kind to the earth.
        </p>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4 reveal">
            <a href="./main.php" class="bg-white text-green-900 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">Explore Products</a>
            
        </div>
    </div>
</section>

<script>
    // Reveal on scroll
    const revealEls = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
    }, { threshold: 0.12 });
    revealEls.forEach(el => io.observe(el));
</script>

</body>
<?php include 'components/footer.php'; ?>