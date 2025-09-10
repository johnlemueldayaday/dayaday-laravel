<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHS Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="min-h-screen flex flex-col">
<!-- White navbar -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-3">

            <!-- School Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/school_logo.png') }}" alt="School Logo" class="h-14 w-auto object-contain">
                </a>
            </div>

            <!-- Navigation -->
            <div class="flex-1 flex justify-center">
                <div class="flex gap-12 text-lg font-medium">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-600">Dashboard</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Faculty</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Student</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Reports</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Settings</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Profile</a>
                </div>
            </div>
            <div class="w-14"></div>
        </div>
    </div>
</nav>


    <!-- Hero -->
    <main class="relative flex-1">
        <div class="relative hero-wrap overflow-hidden">
            <!-- background -->
            <img src="{{ asset('images/background.png') }}" alt="" class="hero-bg-img">

            <!-- Carousel -->
            <div class="relative z-10 h-full flex items-center">
                <div class="w-full max-w-6xl mx-auto px-4">
                    <div class="relative rounded-lg overflow-hidden shadow-lg">
                        <div id="carousel" class="relative w-full h-[56vh] md:h-[64vh] lg:h-[72vh]">
                            <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-20" data-index="0">
                                <img src="{{ asset('images/image-1.png') }}" alt="Slide 1" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/30"></div>
                            </div>
                            <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="1">
                                <img src="{{ asset('images/image-2.png') }}" alt="Slide 2" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/30"></div>
                            </div>
                            <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="2">
                                <img src="{{ asset('images/image-3.png') }}" alt="Slide 3" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/30"></div>
                            </div>
                            <div class="carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10" data-index="3">
                                <img src="{{ asset('images/image-4.png') }}" alt="Slide 4" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/30"></div>
                            </div>
                        </div>

                        <!-- Arrows -->
                        <button id="carousel-prev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button id="carousel-next" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-2 rounded-full shadow z-30">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>

                        <!-- Dots -->
                        <div id="carousel-dots" class="absolute left-1/2 -translate-x-1/2 bottom-6 z-30 flex gap-3">
                            <button class="dot w-3 h-3 rounded-full bg-white/60" data-dot="0"></button>
                            <button class="dot w-3 h-3 rounded-full bg-white/40" data-dot="1"></button>
                            <button class="dot w-3 h-3 rounded-full bg-white/40" data-dot="2"></button>
                            <button class="dot w-3 h-3 rounded-full bg-white/40" data-dot="3"></button>
                        </div>
                    </div>
                </div>
</div>

            <!-- Desktop login/signup card (top-right) -->
            @guest
            <div class="hidden sm:block absolute z-30 right-6 top-24 w-72 sm:w-80 bg-white/95 backdrop-blur-sm shadow-xl rounded-xl border border-gray-100 p-5">
                <h4 class="text-lg font-semibold text-gray-800">Get started</h4>
                <p class="text-sm text-gray-500 mt-1">Create an account or sign in to access the registrar tools.</p>

                <div class="mt-4 flex flex-col gap-3">
                    <a href="{{ route('register') }}" class="block text-center py-2 px-3 rounded-md bg-[#243b80] text-white font-medium hover:bg-[#21346a] transition">Sign up</a>
                    <a href="{{ route('login') }}" class="block text-center py-2 px-3 rounded-md border border-gray-200 text-gray-700 bg-white hover:bg-gray-50 transition">Log in</a>
                </div>

                <div class="mt-3 text-xs text-gray-400">
                    By signing up you agree to our <a href="#" class="underline">terms</a>.
                </div>
            </div>

            <!-- Mobile login/signup card (below navbar, top-left) -->
            <div class="sm:hidden fixed left-4 top-[72px] z-30 w-[85%] max-w-sm bg-white/95 backdrop-blur-sm shadow-lg rounded-lg border border-gray-100 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-medium text-gray-800">Get started</div>
                        <div class="text-xs text-gray-500">Sign up or log in to continue</div>
                    </div>
                    <div class="ml-2">
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Log in</a>
                    </div>
                </div>
                <div class="mt-3 flex gap-2">
                    <a href="{{ route('register') }}" class="flex-1 text-center py-2 rounded-md bg-[#243b80] text-white font-medium">Sign up</a>
                    <a href="{{ route('login') }}" class="flex-1 text-center py-2 rounded-md border border-gray-200 text-gray-700 bg-white">Log in</a>
                </div>
            </div>
            @endguest

            <!-- overlay vignette -->
        <div class="pointer-events-none absolute inset-0 z-20"
                style="background: linear-gradient(180deg, rgba(0,0,0,0.00) 0%, rgba(0,0,0,0.08) 60%, rgba(0,0,0,0.18) 100%);"></div>
    </div>
</main>
<!------------- Sliding Image ----------------->
<script>
        (function () {
            const root = document.getElementById('carousel');
            if (!root) return;

            const slides = Array.from(root.querySelectorAll('.carousel-item'));
            const nextBtn = document.getElementById('carousel-next');
            const prevBtn = document.getElementById('carousel-prev');
            const dots = Array.from(document.querySelectorAll('#carousel-dots .dot'));

            let current = 0;
            const total = slides.length;
            const intervalMs = 6000;
            let timer = null;

            function show(index) {
                slides.forEach((s, i) => {
                    if (i === index) {
                        s.classList.remove('opacity-0'); s.classList.add('opacity-100'); s.style.zIndex = 20;
                    } else {
                        s.classList.remove('opacity-100'); s.classList.add('opacity-0'); s.style.zIndex = 10;
                    }
                });
                dots.forEach((d, i) => d.classList.toggle('bg-white/60', i === index));
                current = index;
            }

            function next() { show((current + 1) % total); }
            function prev() { show((current - 1 + total) % total); }

            function start() { stop(); timer = setInterval(next, intervalMs); }
            function stop() { if (timer) { clearInterval(timer); timer = null; } }

            nextBtn?.addEventListener('click', () => { next(); stop(); start(); });
            prevBtn?.addEventListener('click', () => { prev(); stop(); start(); });
            dots.forEach(d => d.addEventListener('click', () => { show(+d.dataset.dot); stop(); start(); }));

            root.addEventListener('mouseenter', stop);
            root.addEventListener('mouseleave', start);

            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') { next(); stop(); start(); }
                if (e.key === 'ArrowLeft') { prev(); stop(); start(); }
            });

            show(0);
            start();
        })();
</script>
</body>
</html>




<style>
    body {
        opacity: 0;
        transition: opacity 1.4s ease-in-out;
    }
    body.fade-in {
        opacity: 1;
    }

        :root { --nav-h: 64px; }
        .hero-wrap { height: calc(100vh - var(--nav-h)); }
        html,body { height:100%; }
        body {
            font-family: 'Roboto', sans-serif;
            background: #f3f4f6;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
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


<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.body.classList.add("fade-in");
        document.querySelectorAll("a").forEach(link => {
            if (link.hostname === window.location.hostname) {
                link.addEventListener("click", e => {
                    e.preventDefault();
                    document.body.style.opacity = "0";
                    setTimeout(() => {
                        window.location.href = link.href;
                    }, 400); 
                });
            }
        });
    });
</script>

