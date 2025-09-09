<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Registrar Portal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .hero-bg {
            background: linear-gradient(120deg, #4f8cff 0%, #a6e1fa 100%);
        }
        .card {
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.08);
        }
        .registrar-logo {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);
        }
    </style>
</head>

<body class="antialiased bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo and Title -->
                <div class="flex items-center space-x-4">
                    <div class="registrar-logo">
                        <svg width="36" height="36" fill="none" viewBox="0 0 36 36">
                            <circle cx="18" cy="18" r="18" fill="#4f8cff"/>
                            <path d="M12 26v-2a4 4 0 014-4h4a4 4 0 014 4v2" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="18" cy="14" r="4" stroke="#fff" stroke-width="2"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-extrabold text-blue-700 tracking-wide">Registrar</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-8">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Students</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Courses</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Departments</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium">Faculty</a>
                </div>

                <!-- User Actions -->
                <div class="hidden sm:flex sm:items-center sm:space-x-4">
                    @auth
                        <span class="text-gray-700">Hello, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-bg py-20 text-center text-white">
        <h1 class="text-4xl font-bold">Welcome to the School Registrar Portal</h1>
        <p class="mt-4 text-lg">Manage students, courses, departments, and faculty with ease.</p>
    </div>

</body>
</html>
