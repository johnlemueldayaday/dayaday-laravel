<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IHS Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Work+Sans:ital,wght@0,100..900;1,100..900&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 relative">
    <a href="{{ route('welcome') }}" class="absolute top-4 left-4 sm:top-6 sm:left-6 z-20">
        <img src="{{ asset('images/ihs-logo.png') }}" alt="IHS Logo"
             class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 object-contain">
    </a>
<!-- ================= LOGIN CARD ================= -->
    <div class="w-full max-w-6xl bg-white card-radius shadow-lg overflow-hidden flex flex-col lg:flex-row">

<!-- ===== LEFT PANEL (Info Section) ===== -->
        <div class="hidden lg:flex lg:w-2/3 brand-blue text-white p-8 xl:p-12 flex-col gap-6">
            <h2 class="text-3xl xl:text-4xl font-bold tracking-tight font-heading italic">IHS Admin</h2>

            <div class="mt-2 text-sm leading-relaxed font-body">
                <p class="mb-4">
                    Is this your first time here? Your username is your University ID and your default password is a
                    combination of your Last Name, in capital letters, and the last four (4) digits of your University ID number.
                </p>

                <p class="mb-3">
                    <strong>Example using University ID:</strong><br>
                    username: 2013001934<br>
                    password: LEE1934
                </p>

                <p class="mb-3">
                    <strong>Example using University email:</strong><br>
                    username: 2013001934@my.ihs.edu.ph<br>
                    password: LEE1934
                </p>

                <p class="mt-6 text-xs opacity-90">
                    Access IHS for Graduate degree programs: opisv2025.ihs.edu.ph.
                </p>
            </div>
        </div>

<!-- ===== RIGHT PANEL (Login Form) ===== -->
        <div class="w-full lg:w-1/3 p-6 sm:p-8 xl:p-10 bg-white font-ui">
            <!-- Login Header -->
            <div class="mb-6">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800">Already have an account?</h3>
                <p class="text-sm text-gray-500 mt-1">Sign in with your University ID or email</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="/login" class="space-y-4" novalidate>
                @csrf

                <!-- Email / Admin ID Input -->
                <div>
                    <label class="sr-only" for="email">Admin ID / Email</label>
                    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                        <!-- Custom Icon (replace file in /public/images) -->
                        <img src="{{ asset('images/admin-icon.png') }}" alt="Admin Icon" class="w-5 h-5 object-contain">
                        <!-- Input -->
                        <input id="email" name="email" type="text" value="{{ old('email') }}" required
                               class="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                               placeholder="Admin ID">
                    </div>
                    @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label class="sr-only" for="password">Password</label>
                    <div class="flex items-center bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                        <!-- Custom Icon (replace file in /public/images) -->
                        <img src="{{ asset('images/password-icon.png') }}" alt="Password Icon" class="w-5 h-5 object-contain">
                        <!-- Input -->
                        <input id="password" name="password" type="password" required
                               class="w-full bg-transparent outline-none ml-3 text-sm sm:text-base"
                               placeholder="Password">
                    </div>
                    @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Options Row -->
                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center gap-2 text-gray-600">
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-blue-600 rounded">
                        Remember username
                    </label>
                    <a href="#" class="text-blue-600 hover:underline">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="w-full py-3 bg-[#243b80] text-white font-semibold rounded-md hover:opacity-95 transition">
                        Log in
                    </button>
                </div>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="text-sm text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- ================= MOBILE INFO CARD ================= -->
    <div class="lg:hidden max-w-6xl w-full mt-6">
        <div class="bg-[#243b80] text-white rounded-xl p-6">
            <h3 class="text-lg sm:text-xl font-bold mb-3">IHS Admin</h3>
            <p class="text-sm sm:text-base">
                Your username is your University ID or email. Default password: LASTNAME + last 4 digits of your ID.
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

                /* Responsive, professional logo sizing */
                .ihs-logo {
                    display: block;
                    width: 96px;        /* base (mobile) */
                    height: auto;
                    transition: width .18s ease, transform .18s ease;
                }
                @media (min-width: 640px) { /* sm */
                    .ihs-logo { width: 120px; }
                }
                @media (min-width: 768px) { /* md */
                    .ihs-logo { width: 160px; }
                }
                @media (min-width: 1024px) { /* lg */
                    .ihs-logo { width: 192px; }
                }
                @media (min-width: 1280px) { /* xl */
                    .ihs-logo { width: 220px; }
                }
                /* Optional micro scale on hover for a polished feel */
                .ihs-logo:hover { transform: scale(1.02); }
            </style>

            