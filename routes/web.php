

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Dashboard (protected + named)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Show Login Form
Route::get('/login', function () {
    return view('login');
})->name('login');

// Handle Login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
});
// Show Register Form
Route::get('/register', function () {
    return view('register');
})->name('register');

// Handle Register Form Submission
Route::post('/register', function (Request $request) {
    // Basic validation (for demonstration)
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    // Create user (if User model exists)
    $user = App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    // Log the user in
    Auth::login($user);

    return redirect()->route('dashboard');
});