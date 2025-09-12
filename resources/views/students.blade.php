<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHS Portal - Students</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col">

    <!---------------- Navbar ---------------->
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
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
                <!-- Navigation -->
                <div class="hidden md:flex gap-10 text-lg font-medium">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-600">Dashboard</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Faculty</a>
                    <a href="{{ route('students.index') }}" class="text-blue-600 font-semibold">Students</a>
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
            </div>
        </div>
    </nav>

    <!---------------- Students List ---------------->
    <main class="relative flex-1">
        <img src="{{ asset('images/background.png') }}" alt="" class="hero-bg-img">

        <div class="relative z-15 max-w-7xl mx-auto px-4 py-6">
            <div class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Student Records</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 text-sm text-gray-700">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Profile</th>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">ID Number</th>
                                <th class="px-4 py-2 border">Course</th>
                                <th class="px-4 py-2 border">Year</th>
                                <th class="px-4 py-2 border">Department</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border text-center">
                                        <img src="{{ $student->profile_picture ? asset('storage/'.$student->profile_picture) : asset('images/default-avatar.png') }}" 
                                             class="h-10 w-10 rounded-full mx-auto object-cover">
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
                                    </td>
                                    <td class="px-4 py-2 border">{{ $student->id_number }}</td>
                                    <td class="px-4 py-2 border">{{ $student->course }}</td>
                                    <td class="px-4 py-2 border">{{ $student->year }}</td>
                                    <td class="px-4 py-2 border">{{ $student->department }}</td>
                                    <td class="px-4 py-2 border">{{ $student->email }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <a href="{{ route('students.show', $student->id) }}" 
                                           class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                           View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-3 text-center text-gray-500">No students found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <style>
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
</body>
</html>
