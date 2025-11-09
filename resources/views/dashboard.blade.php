<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHS Portal - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">

    <!---------------------- Navbar ------------------>
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">

                <!-- Left: Logo + User -->
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/school_logo.png') }}" alt="School Logo" class="h-14 w-auto object-contain">
                    <div class="flex flex-col">
                        <span class="text-lg font-semibold text-gray-800">
                            Welcome, {{ Auth::user()->name }}
                        </span>
                        <span class="text-sm text-gray-500">
                            {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
                        </span>
                    </div>
                </div>

                <!-- Center: Navigation -->
                <div class="hidden md:flex gap-10 text-lg font-medium">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-600 transition">Dashboard</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Faculty</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Students</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Reports</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600 transition">Settings</a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-800 hover:text-blue-600 transition">Profile</a>
                </div>

                <!-- Right: Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-[#243b80] text-white rounded-md hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!---------------- Dashboard ------------------------>
    <main class="relative flex-1">
        <!-- Background -->
        <img src="{{ asset('images/background.png') }}" alt="" class="hero-bg-img">

        <!---------------- Content -------------------------->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Faculty</h2>
                    <p class="text-sm text-gray-500 mt-2">Manage faculty records, assignments, and schedules.</p>
                    <a href="#" class="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">Go to Faculty</a>
                </div>

                <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Students</h2>
                    <p class="text-sm text-gray-500 mt-2">View, enroll, and update student information.</p>
                    <a href="#" class="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">Go to Students</a>
                </div>

                <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Reports</h2>
                    <p class="text-sm text-gray-500 mt-2">Generate academic and administrative reports.</p>
                    <a href="#" class="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">Go to Reports</a>
                </div>

                <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Registrar Tools</h2>
                    <p class="text-sm text-gray-500 mt-2">Access core registrar management functions.</p>
                    <a href="#" class="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">Open Tools</a>
                </div>

                <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Settings</h2>
                    <p class="text-sm text-gray-500 mt-2">Update portal configurations and preferences.</p>
                    <a href="#" class="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">Go to Settings</a>
                </div>

                <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700">Profile</h2>
                    <p class="text-sm text-gray-500 mt-2">Manage your account and profile details.</p>
                    <a href="#" class="mt-4 inline-block text-sm px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">Go to Profile</a>
                </div>

            </div>
        </div>
    </main>

    <!---------------- Styles ------------------------>
    <style>
        body {
            opacity: 0;
            transition: opacity 1.4s ease-in-out;
        }
        body.fade-in {
            opacity: 1;
        }

        :root { --nav-h: 64px; }
        .hero-bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(6px) brightness(0.85);
        }
    </style>

    <!---------------- Fade Transition Script ---------------->
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

        // Fix white screen on back/forward navigation
        window.addEventListener("pageshow", (event) => {
            if (event.persisted) {
                document.body.classList.add("fade-in");
            }
        });
    </script>
</body>
</html>
