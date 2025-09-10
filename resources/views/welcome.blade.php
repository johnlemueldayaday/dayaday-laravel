<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHS Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">

    <!---------------- Navbar ---------------->
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/school_logo.png') }}" alt="School Logo" class="h-14 w-auto object-contain">
                </div>

                @auth
                <div class="flex items-center gap-10 text-lg font-medium">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-600">Dashboard</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Faculty</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Students</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Reports</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Settings</a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-800 hover:text-blue-600">Profile</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-[#243b80] text-white rounded-md hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!---------------- Hero Section ---------------->
    <!-- NOTE: removed flex-1 so main does not expand to fill viewport -->
    <main class="relative">
        <div class="relative hero-wrap overflow-hidden">
            <!-- Background -->
            <img src="{{ asset('images/welcomebackground.png') }}" alt="" class="hero-bg-img">

            @guest
            <!-- Full-width responsive layout -->
            <div class="relative z-30 w-full px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col lg:flex-row gap-6 items-start">
                    
                    <!-- Carousel + Thumbnails (take up full width on large screens) -->
                    <div class="flex-1 flex flex-col md:flex-row gap-6">
                        
                        <!-- Left-side Thumbnails -->
                        <div class="hidden md:flex flex-col gap-4">
                            <img src="{{ asset('images/thumb-1.png') }}" alt="Thumbnail 1" class="max-w-full object-contain rounded-lg shadow-md cursor-pointer hover:opacity-80 transition">
                            <img src="{{ asset('images/thumb-2.png') }}" alt="Thumbnail 2" class="max-w-full object-contain rounded-lg shadow-md cursor-pointer hover:opacity-80 transition">
                            <img src="{{ asset('images/thumb-3.png') }}" alt="Thumbnail 3" class="max-w-full object-contain rounded-lg shadow-md cursor-pointer hover:opacity-80 transition">
                            <img src="{{ asset('images/thumb-4.png') }}" alt="Thumbnail 4" class="max-w-full object-contain rounded-lg shadow-md cursor-pointer hover:opacity-80 transition">
                            <img src="{{ asset('images/thumb-5.png') }}" alt="Thumbnail 5" class="max-w-full object-contain rounded-lg shadow-md cursor-pointer hover:opacity-80 transition">
                        </div>

                        <!-- Main Carousel -->
                        <div class="flex-1 relative">
                            <div id="carousel" class="relative w-full h-[350px] sm:h-[450px] md:h-[550px] lg:h-[600px] overflow-hidden rounded-xl shadow-xl z-10">
                                <!-- Slides -->
                                <div class="carousel-item absolute inset-0 opacity-100 transition-opacity duration-700 ease-in-out z-20">
                                    <img src="{{ asset('images/image-1.png') }}" class="w-full h-full object-cover" alt="Slide 1">
                                </div>
                                <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out z-10">
                                    <img src="{{ asset('images/image-2.png') }}" class="w-full h-full object-cover" alt="Slide 2">
                                </div>
                                <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-700 ease-in-out z-10">
                                    <img src="{{ asset('images/image-3.png') }}" class="w-full h-full object-cover" alt="Slide 3">
                                </div>
                            </div>

                            <!-- Dots -->
                            <div id="carousel-dots" class="absolute left-1/2 -translate-x-1/2 bottom-4 flex gap-2 z-30">
                                <button class="dot w-3 h-3 rounded-full bg-white/70" data-dot="0" aria-label="Slide 1"></button>
                                <button class="dot w-3 h-3 rounded-full bg-white/40" data-dot="1" aria-label="Slide 2"></button>
                                <button class="dot w-3 h-3 rounded-full bg-white/40" data-dot="2" aria-label="Slide 3"></button>
                            </div>
                        </div>
                    </div>

                    <!-- Right-side Cards -->
                    <div class="w-full lg:w-80 flex-shrink-0 space-y-4">
                        <!-- Sign up / Login Card -->
                        <div class="bg-white/95 backdrop-blur-sm shadow-xl rounded-xl border border-gray-100 p-5">
                            <h4 class="text-lg font-semibold text-gray-800">Get started</h4>
                            <p class="text-sm text-gray-500 mt-1">Create an account or sign in to access the registrar tools.</p>
                            <div class="mt-4 flex flex-col gap-3">
                                <a href="{{ route('register') }}" class="block text-center py-2 px-3 rounded-md bg-[#243b80] text-white font-medium hover:bg-[#21346a] transition">Sign up</a>
                                <a href="{{ route('login') }}" 
                                    class="block text-center py-2 px-3 rounded-md border border-gray-200 text-gray-700 bg-white 
                                            hover:bg-yellow-500 hover:text-white hover:border-yellow-500 
                                            transition duration-300 ease-in-out">
                                    Log in
                                    </a>

                        </div>
                    <!-- Right-side Cards -->

                        </div>

                        <!-- News & Events Section -->
                        <div class="bg-gray-100 rounded-lg border border-gray-200 shadow-sm">
                            <div class="px-4 py-2 border-b border-gray-300 bg-gray-200 rounded-t-lg">
                                <h5 class="text-sm font-bold text-gray-700 tracking-wide">NEWS / EVENTS</h5>
                            </div>
                            <div class="p-4 bg-white rounded-b-lg">
                                <h6 class="text-sm font-semibold text-gray-800">
                                    Proposed Change in Tuition and Other School Fees for Academic Year 2025-2026 in the Basic Education Department
                                </h6>
                                <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                                    FSUU’s mission is to provide access to quality and relevant education. The university remains committed
                                    to keeping education affordable while ensuring that students receive the best possible learning experience.
                                    To maintain academic excellence, attract and retain qualified faculty, and improve learning resources,
                                    FSUU proposed to implement a reasonable change...
                                </p>
                                <a href="#" class="block mt-2 text-xs text-blue-600 hover:underline">Read more</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endguest
        </div>
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-[#243b80] text-white mt-0">
        <div class="max-w-9xl mx-auto px-6 lg:px-34 py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                
                <!-- About -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">About IHS Portal</h3>
                    <p class="text-sm text-gray-200 leading-relaxed">
                        The IHS Portal provides students, faculty, and administrators with easy access 
                        to registrar tools, resources, and announcements. Our mission is to deliver efficiency and transparency in academic services.
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                        <li><a href="#" class="hover:underline">Faculty</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-3">Contact Us</h3>
                    <p class="text-sm text-gray-200">935 University of IHS, Cebu, Canada</p>
                    <p class="text-sm text-gray-200 mt-1">Email: greatestloveofall.ihs.edu</p>
                    <p class="text-sm text-gray-200">Phone: (+63) 923-69693</p>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-white/20 mt-8 pt-4 text-center text-xs text-gray-300">
                © {{ date('Y') }} IHS Portal. All rights reserved.
            </div>
        </div>
    </footer>
    <!---------------- Carousel Script ---------------->
    @guest
    <script>
        (function () {
            const root = document.getElementById('carousel');
            if (!root) return;

            const slides = Array.from(root.querySelectorAll('.carousel-item'));
            const dots = Array.from(document.querySelectorAll('#carousel-dots .dot'));

            let current = 0;
            const total = slides.length;
            const intervalMs = 5000;
            let timer = null;

            function show(index) {
                slides.forEach((s, i) => {
                    if (i === index) {
                        s.classList.remove('opacity-0');
                        s.classList.add('opacity-100');
                        s.style.zIndex = 20;
                    } else {
                        s.classList.remove('opacity-100');
                        s.classList.add('opacity-0');
                        s.style.zIndex = 10;
                    }
                });
                dots.forEach((d, i) => d.classList.toggle('bg-white/70', i === index));
                current = index;
            }

            function next() { show((current + 1) % total); }
            function start() { stop(); timer = setInterval(next, intervalMs); }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }

            dots.forEach(d => d.addEventListener('click', () => { show(+d.dataset.dot); stop(); start(); }));

            root.addEventListener('mouseenter', stop);
            root.addEventListener('mouseleave', start);

            show(0);
            start();
        })();
    </script>
    @endguest

</body>
</html>


    <style>
        :root { --nav-h: 64px; }

        /* IMPORTANT: don't force hero to full viewport height any more.
           Let the hero/container size itself based on content so footer
           sits directly below. */
        .hero-wrap {
            /* no fixed height here — content defines height */
        }

        .hero-bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(6px) brightness(0.85);
            z-index: 0; /* background below content */
        }
    </style>