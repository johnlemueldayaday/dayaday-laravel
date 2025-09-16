<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

// API routes for data management
Route::post('/api/save-data', [DataController::class, 'store']);        // save new record
Route::get('/fetch-data', [DataController::class, 'fetchData']);        // fetch all records
Route::put('/api/update-data/{id}', [DataController::class, 'update']); // update record by ID
Route::delete('/api/delete-data/{id}', [DataController::class, 'destroy']); // delete record by ID
