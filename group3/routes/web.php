<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/user', function () {
    return view('users');
});

Route::post('/addUser', [UserController::class, 'addUser']);

Route::post('/update/{id}', [UserController::class, 'update']);

Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);

Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

Route::get('/users', [UserController::class, 'getUser']);

// Route::get('/login', function () {
//     return view('login');
// });  

// Route::post('/login', function () {
//     return redirect()->route('hotelList');
// });  

// Route::get('/', function () {
//     return redirect()->route('hotelList');
// });
// Route::get('/hotels/list', [HotelController::class, 'showHotelList'])->name('hotelList');

