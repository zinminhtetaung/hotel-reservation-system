<?php

use App\Http\Controllers\Hotel\HotelController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('hotelList');
});
Route::get('/hotels/list', [HotelController::class, 'showHotelList'])->name('hotelList');

Route::get('/hotel/download', [HotelController::class, 'downloadHotelCSV'])->name('downloadHotelCSV');

Route::delete('/hotels/list/{id}', [HotelController::class, 'deleteHotelById']);
