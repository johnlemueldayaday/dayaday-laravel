<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IHS Admin Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 relative">

    <!-- ================= LOGO ================= -->
    <a href="{{ route('welcome') }}" class="absolute top-4 left-4 sm:top-6 sm:left-6 z-20">
        <img src="{{ asset('images/ihs-logo.png') }}" alt="IHS Logo"
             class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 object-contain">
    </a>

    <!-- ================= REGISTER CARD ================= -->
    <div class="w-full max-w-6xl bg-white card-radius shadow-lg overflow-hidden flex flex-col lg:flex-row">

        <!-- ===== LEFT PANEL (Info Section) ===== -->
        <div class="hidden lg:flex lg:w-2/3 brand-blue text-white p-8 xl:p-12 flex-col gap-6">
            <h2 class="text-3xl xl:text-4xl font-bold tracking-tight font-heading italic">IHS Admin</h2>

            <div class="mt-2 text-sm leading-relaxed font-body">
                <p class="mb-4">
                    Create your account to access the IHS Admin system. Make sure to use a valid University email or ID.
                </p>

                <p class="mb-3">
                    <strong>Password Policy:</strong><br>
                    Minimum of 6 characters. Use a mix of letters and numbers for security.
                </p>

                <p class="mt-6 text-xs opacity-90">
                    Access IHS for Graduate degree programs: opisv2025.ihs.edu.ph.
                </p>
            </div>
        </div>

        <!-- ===== RIGHT PANEL (Register Form) ===== -->
        <div class="w-full lg:w-1/3 p-6 sm:p-8 xl:p-10 bg-white font-ui">
            <!-- Register Header -->
            <div class="mb-6">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800">Create an Account</h3>
                <p class="text-sm text-gray-500 mt-1">Fill in your details below to register</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4" novalidate>
                @csrf

                <!-- Name -->
                <div>
                    <label class="sr-only" for="name">Full Name</label>
                    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                        <img src="{{ asset('images/admin-icon.png') }}" alt="Name Icon" class="w-5 h-5 object-contain">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required
                               class="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                               placeholder="Full Name">
                    </div>
                    @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="sr-only" for="email">Email</label>
                    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                        <img src="{{ asset('images/admin-icon.png') }}" alt="Email Icon" class="w-5 h-5 object-contain">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                               class="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                               placeholder="Email">
                    </div>
                    @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="sr-only" for="password">Password</label>
                    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                        <img src="{{ asset('images/password-icon.png') }}" alt="Password Icon" class="w-5 h-5 object-contain">
                        <input id="password" name="password" type="password" required
                               class="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                               placeholder="Password">
                    </div>
                    @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit" class="w-full py-3 bg-[#243b80] text-white font-semibold rounded-md hover:opacity-95 transition">
                        Register
                    </button>
                </div>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="text-sm text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>

            <!-- Link to login -->
            <div class="mt-4 text-sm text-gray-600 text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a>
            </div>
        </div>
    </div>

    <!-- ================= MOBILE INFO CARD ================= -->
    <div class="lg:hidden max-w-6xl w-full mt-6">
        <div class="bg-[#243b80] text-white rounded-xl p-6">
            <h3 class="text-lg sm:text-xl font-bold mb-3">IHS Admin</h3>
            <p class="text-sm sm:text-base">
                Register with your University email or ID to access the Admin portal.
            </p>
        </div>
    </div>

</body>
</html>

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: #fbfbfe;
    }

    /* Brand Color */
    .brand-blue {
        background: #243b80;
    }

    /* Card Radius */
    .card-radius {
        border-radius: 1rem;
    }

    /* Font Groups */
    .font-heading {
        font-family: 'Work Sans', 'Roboto', sans-serif;
    }

    .font-body {
        font-family: 'Roboto', 'Nunito', sans-serif;
    }

    .font-ui {
        font-family: 'Nunito', sans-serif;
    }

    /* Responsive Logo */
    .ihs-logo {
        display: block;
        width: 96px;
        height: auto;
        transition: width .18s ease, transform .18s ease;
    }
    @media (min-width: 640px) { .ihs-logo { width: 120px; } }
    @media (min-width: 768px) { .ihs-logo { width: 160px; } }
    @media (min-width: 1024px) { .ihs-logo { width: 192px; } }
    @media (min-width: 1280px) { .ihs-logo { width: 220px; } }
    .ihs-logo:hover { transform: scale(1.02); }
</style>
