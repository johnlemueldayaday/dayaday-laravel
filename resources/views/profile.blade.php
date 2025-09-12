<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHS Portal - Profile</title>
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
                    <a href="{{ route('students.index') }}" class="text-gray-800 hover:text-blue-600">Students</a>
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

    <!---------------- Profile Content ---------------->
    <main class="relative flex-1">
        <img src="{{ asset('images/background.png') }}" alt="" class="hero-bg-img">

        <div class="relative z-15 max-w-6xl mx-auto px-2 py-5">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-md border border-gray-200 space-y-4">
                @csrf

                <!-- Profile Picture -->
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ $profile->profile_picture ? asset('storage/'.$profile->profile_picture) : asset('images/default-avatar.png') }}" 
                         class="h-20 w-20 rounded-full object-cover border">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Change Profile Picture</label>
                        <input type="file" name="profile_picture" class="mt-1 block w-full text-sm text-gray-600">
                    </div>
                </div>

                <!-- Name Fields -->
                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name', $profile->first_name) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name', $profile->middle_name) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $profile->last_name) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                </div>

                <!-- Other Details -->
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Sex</label>
                        <select name="sex" class="mt-1 w-full border rounded-md p-2">
                            <option value="Male" {{ $profile->sex === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $profile->sex === 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Nationality</label>
                        <input type="text" name="nationality" value="{{ old('nationality', $profile->nationality) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">ID Number</label>
                        <input type="text" name="id_number" value="{{ old('id_number', $profile->id_number) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Contact Number</label>
                        <input type="text" name="contact_number" value="{{ old('contact_number', $profile->contact_number) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Address</label>
                    <input type="text" name="address" value="{{ old('address', $profile->address) }}" class="mt-1 w-full border rounded-md p-2">
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Religion</label>
                        <input type="text" name="religion" value="{{ old('religion', $profile->religion) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Civil Status</label>
                        <input type="text" name="civil_status" value="{{ old('civil_status', $profile->civil_status) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="mt-1 w-full border rounded-md p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Birthday</label>
                    <input type="date" name="birthday" value="{{ old('birthday', $profile->birthday) }}" class="mt-1 w-full border rounded-md p-2">
                </div>

                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Course</label>
                        <input type="text" name="course" value="{{ old('course', $profile->course) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Year</label>
                        <input type="text" name="year" value="{{ old('year', $profile->year) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Department</label>
                        <input type="text" name="department" value="{{ old('department', $profile->department) }}" class="mt-1 w-full border rounded-md p-2">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Save Profile</button>
                </div>
            </form>
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
