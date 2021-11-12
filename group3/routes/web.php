<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\OnlineBooking\OnlineBookingController;


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



/**
 * Display All Reservation
 */
Route::get('/', [ReservationController::class, 'showReservationList']);

/**
 * Add A New Reservation
 */
Route::post('/reservation', [ReservationController::class, 'addReservation']);

/**
 * Update Reservation Form
 */
Route::post('/update/{id}', [ReservationController::class, 'update']);

/**
 * Update Reservation 
 */
Route::post('/updateReservation/{id}', [ReservationController::class, 'updateReservation']);
/**
 * Delete An Existing Reservation
 */
Route::delete('/reservation/{id}/{room_id}', [ReservationController::class, 'deleteReservation']);
/**
 * 
 */
Route::post('/show-room', [RoomController::class, 'searchRoom']);

/**
 * Display All OnlineBooking
 */
Route::get('/onlineBooking', [OnlineBookingController::class, 'showOnlineBookingList']);

/**
 * View Online booking
 */
Route::post('/view-booking/{id}', [OnlineBookingController::class, 'getBookingById']);

/**
 * Confirm Online booking
 */
Route::post('/confirm-booking', [ReservationController::class, 'addBooking']);

/**
 * Delete An Online Booking
 */
Route::delete('/delete-booking/{id}/{room_id}', [OnlineBookingController::class, 'deleteOnlineBooking']);





