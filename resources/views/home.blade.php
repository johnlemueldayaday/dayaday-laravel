<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHS Portal - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <div class="flex items-center gap-4">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/school_logo.png') }}" alt="School Logo" class="h-14 w-auto object-contain">
                    </a>
                    <div class="flex flex-col">
                        <span class="text-lg font-semibold text-gray-800">
                            Welcome, {{ Auth::user()->name }}
                        </span>
                        <span class="text-sm text-gray-500">
                            {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
                        </span>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="hidden md:flex gap-10 text-lg font-medium">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-600 transition">Dashboard</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Faculty</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Students</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Reports</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Settings</a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-800 hover:text-blue-600">Profile</a>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-[#243b80] text-white rounded-md hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Background -->
    <main class="relative flex-1">
        <div class="relative hero-wrap overflow-hidden">
            <!-- Background -->
            <img src="{{ asset('images/background.png') }}" alt="Background" class="hero-bg-img">

            <!-- Carousel -->
            <div class="relative z-10 w-full max-w-7xl mx-auto mt-8 px-4">
                <div class="relative rounded-lg overflow-hidden shadow-lg">
                    <div id="carousel" class="relative w-full h-[56vh] md:h-[64vh] lg:h-[72vh]">
                        <!-- Slide 1 -->
                        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-20" data-index="0">
                            <img src="{{ asset('images/image-1.png') }}" alt="Slide 1" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="1">
                            <img src="{{ asset('images/image-2.png') }}" alt="Slide 2" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="2">
                            <img src="{{ asset('images/image-3.png') }}" alt="Slide 3" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="3">
                            <img src="{{ asset('images/image-4.png') }}" alt="Slide 4" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>
                    </div>

                    <!-- Arrows -->
                    <button id="carousel-prev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30">
                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button id="carousel-next" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30">
                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Dots -->
                    <div id="carousel-dots" class="absolute left-1/2 -translate-x-1/2 bottom-6 z-30 flex gap-3">
                        <button class="dot w-3 h-3 rounded-full bg-white/80" data-dot="0"></button>
                        <button class="dot w-3 h-3 rounded-full bg-white/50" data-dot="1"></button>
                        <button class="dot w-3 h-3 rounded-full bg-white/50" data-dot="2"></button>
                        <button class="dot w-3 h-3 rounded-full bg-white/50" data-dot="3"></button>
                    </div>
                </div>
            </div>

            <!-- Vignette Overlay -->
            <div class="pointer-events-none absolute inset-0 z-20"
                style="background: linear-gradient(180deg, rgba(0,0,0,0.00) 0%, rgba(0,0,0,0.08) 60%, rgba(0,0,0,0.18) 100%);">
            </div>
        </div>
    </main>

    <!-- Styles -->
    <style>
        :root { --nav-h: 64px; }
        .hero-wrap { height: calc(100vh - var(--nav-h)); }
        html, body { height:100%; }
        body {
            font-family: 'Roboto', sans-serif;
            background: #f3f4f6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .hero-bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(6px) brightness(0.85);
        }
    </style>

    <!-- Carousel Script -->
    <script>
        const slides = document.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('opacity-100', i === index);
                slide.classList.toggle('opacity-0', i !== index);
                slide.style.zIndex = i === index ? 20 : 10;
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white/80', i === index);
                dot.classList.toggle('bg-white/50', i !== index);
            });

            currentIndex = index;
        }

        document.getElementById('carousel-next').addEventListener('click', () => {
            showSlide((currentIndex + 1) % slides.length);
        });

        document.getElementById('carousel-prev').addEventListener('click', () => {
            showSlide((currentIndex - 1 + slides.length) % slides.length);
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                showSlide(parseInt(dot.dataset.dot));
            });
        });

        // Auto-slide
        setInterval(() => {
            showSlide((currentIndex + 1) % slides.length);
        }, 5000);
    </script>
</body>
</html>
