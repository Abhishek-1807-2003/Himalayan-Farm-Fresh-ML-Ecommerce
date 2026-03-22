<?php include 'components/header.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    .parallax {
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    @keyframes fadeUp { from {opacity: 0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
    .reveal { opacity: 0; transform: translateY(18px); }
    .reveal.show { animation: fadeUp .9s ease forwards; }
    @keyframes float { 0%{transform:translateY(0)} 50%{transform:translateY(-6px)} 100%{transform:translateY(0)} }
    .float { animation: float 4s ease-in-out infinite; }
    .drop-cap::first-letter {
        font-size: 3.5rem;
        line-height: 1;
        float: left;
        padding-right: .2rem;
        font-weight: 800;
        color: #16a34a;
    }
    .glass {
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(6px);
    }
    .pull-quote {
        font-size: 1.5rem;
        font-weight: 600;
        color: #14532d;
        border-left: 4px solid #16a34a;
        padding-left: 1rem;
        margin: 2rem 0;
        font-style: italic;
    }
</style>

<body class="bg-gray-50 text-gray-800">

<!-- Hero -->
<section class="relative min-h-[70vh] flex items-center justify-center text-white overflow-hidden">
    <div class="absolute inset-0 parallax" style="background-image:url('https://i.pinimg.com/1200x/6a/44/bc/6a44bc1a397cc2496f12f993f5064548.jpg');"></div>

    <div class="relative z-10 container mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-white/15 px-4 py-2 rounded-full text-sm float">
            🌿Pure Himalayan Goodness
        </span>
        <h1 class="mt-6 text-4xl md:text-6xl font-extrabold drop-shadow-xl reveal">Our Story</h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg md:text-xl text-white/90 reveal">
            From terraced hills kissed by the morning sun to your table — fresh, honest, and grown with love.
        </p>
    </div>
</section>

<!-- Section: Origins -->
<section class="relative py-20">
    <div class="container mx-auto px-6 max-w-6xl grid md:grid-cols-2 gap-12 items-center">
        <div class="relative reveal">
            <img src="https://i.pinimg.com/1200x/25/4f/f1/254ff1db7128864fe8f4da0993bd23c2.jpg" 
                 alt="Himalayan farmers working on terraces"
                 class="rounded-3xl shadow-2xl border-4 border-white">
        </div>
        <div class="reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700">Rooted in the Mountains</h2>
            <div class="h-1.5 w-20 bg-green-500 rounded-full mt-4 mb-6"></div>
            <p class="drop-cap leading-relaxed mb-5">
                Our journey began in dew-laced fields where the wind smells of pine and the soil holds the stories of generations. 
                A handful of farming families, bound by the rhythm of seasons, decided to preserve their heritage by cultivating food the right way — with patience, honesty, and harmony with nature.
            </p>
            <p class="leading-relaxed mb-5">
                Here, in the lap of the Himalayas, farming is more than a livelihood. It’s a covenant with the land. Every seed is a promise; every harvest, a celebration of life and legacy.
            </p>
        </div>
    </div>
</section>

<!-- Full-width Image -->
<div class="h-[400px] parallax" style="background-image:url('https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1920&q=80');"></div>

<!-- Section: Traditions & Challenges -->
<section class="py-20 bg-green-50">
    <div class="container mx-auto px-6 max-w-5xl">
        <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center reveal">Tradition Meets Tenacity</h2>
        <p class="mt-6 text-lg leading-relaxed text-gray-700 reveal">
            Our farming practices are steeped in age-old wisdom passed down like treasured heirlooms. From planting according to lunar cycles to hand-weeding terraces carved into mountainsides, every act is done with care.
        </p>
        <div class="pull-quote reveal">
            “We don’t just grow crops — we grow trust, one harvest at a time.”
        </div>
        <p class="text-lg leading-relaxed text-gray-700 reveal">
            Yet, life at altitude is never easy. Harsh winters, unpredictable monsoons, and the isolation of mountain villages have tested our resolve. But each challenge has made our roots stronger, our methods purer, and our commitment unshakable.
        </p>
    </div>
</section>

<!-- Full-width Image -->
<div class="h-[400px] parallax" style="background-image:url('https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1920&q=80');"></div>

<!-- Section: Today & Beyond -->
<section class="py-20">
    <div class="container mx-auto px-6 max-w-6xl grid md:grid-cols-2 gap-12 items-center">
        <div class="reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700">From Hills to Homes</h2>
            <div class="h-1.5 w-20 bg-green-500 rounded-full mt-4 mb-6"></div>
            <p class="leading-relaxed mb-5">
                Today, Himalayan Farm Fresh connects pristine mountain fields to kitchens across the country. 
                Our network empowers small farmers, ensures fair trade, and brings nutrient-rich produce to families who care about where their food comes from.
            </p>
            <p class="leading-relaxed">
                Tomorrow, our mission continues — to expand our circle of sustainable farms, protect the fragile ecosystems of the Himalayas, and inspire more people to choose food that’s good for them and the planet.
            </p>
        </div>
        <div class="relative reveal">
            <img src="./assets/img/feature-bg.jpg" 
                 alt="Fresh produce from Himalayan farms"
                 class="rounded-3xl shadow-2xl border-4 border-white">
        </div>
    </div>
</section>

<!-- CTA -->
<section class="relative py-20 text-white">
    <div class="absolute inset-0 parallax" style="background-image:url('https://images.unsplash.com/photo-1600180758890-6b9452da4e36?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-green-900/80"></div>
    <div class="relative container mx-auto px-6 max-w-5xl text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold reveal">Bring the Himalayas Home</h2>
        <p class="mt-3 text-white/90 max-w-2xl mx-auto reveal">
            Choose produce that’s good for you, fair for farmers, and kind to the earth.
        </p>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4 reveal">
            <a href="main.php" class="bg-white text-green-900 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition">Explore Products</a>
        </div>
    </div>
</section>

<script>
    const revealEls = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('show'); });
    }, { threshold: 0.12 });
    revealEls.forEach(el => io.observe(el));
</script>

</body>
<?php include 'components/footer.php'; ?>
