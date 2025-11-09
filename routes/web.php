<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Define application routes here.
|
*/

// -------------------- AUTH ROUTES --------------------

// Login (controller-based)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Form
Route::get('/register', function () {
    return view('welcome');
})->name('register');

// Handle Register
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    Auth::login($user);

    // Redirect to home page after registration
    return redirect()->route('home');
});

// -------------------- PROFILE ROUTES --------------------
Route::middleware('auth')->group(function () {
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// -------------------- API ROUTES (for React to fetch data) --------------------
Route::middleware('auth')->prefix('api')->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
});

// -------------------- SPA ROUTES (All return welcome.blade.php for React Router) --------------------
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/students', function () {
        return view('welcome');
    })->name('students.index');

    Route::get('/students/{id}', function () {
        return view('welcome');
    })->name('students.show');

    Route::get('/faculty', function () {
        return view('welcome');
    })->name('faculty');

    Route::get('/profile', function () {
        return view('welcome');
    })->name('profile.edit');
});

// Root route - redirect based on auth
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
