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

// Welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Home page 
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// -------------------- AUTH ROUTES --------------------

// Login (controller-based)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Form
Route::get('/register', function () {
    return view('register');
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// -------------------- STUDENT ROUTES --------------------
Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index'); // list
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show'); // single view
});
