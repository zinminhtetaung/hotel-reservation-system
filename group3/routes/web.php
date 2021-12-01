<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\OnlineBooking\OnlineBookingController;
use App\Http\Controllers\Hotel\HotelController;
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

Route::get('/', function () {
  return redirect()->route('home');
});

/**
 * User view routes
 */
Route::get('/user/home',[HomeController::class,'index'])->name('home'); 
Route::get('/user/hotel/hotellist',[HotelController::class,'showHotelListUser'])->name('hotelview');
Route::get('/user/roomuserview',[RoomController::class,'showRoomUserview'])->name('roomuserview');
Route::get('/user/rooms/list', [RoomController::class, 'showRoomListUserView'])->name('userview.roomlist');
Route::get('/user/booking/{id}',[OnlineBookingController::class,'createBooking'])->name('booking.create');
Route::post('/user/storeBooking',[OnlineBookingController::class,'storeBooking'])->name('booking.store');


/**
 * User routes
 */
Route::get('/users', [UserController::class, 'getUser'])
  ->name('userlist')->middleware('preventBackHistory');
Route::post('/addUser', [UserController::class, 'addUser'])
  ->name('user.create')->middleware('preventBackHistory');
Route::get('/users/{id}/update', [UserController::class, 'update'])
  ->name('user.update')->middleware('preventBackHistory');
Route::post('/users/{id}/update', [UserController::class, 'updateUser'])
  ->name('user.update')->middleware('preventBackHistory');
Route::delete('/user/{id}/delete', [UserController::class, 'deleteUser']);


/**
 * Login routes
 */
Route::get('/loginuser', [LoginController::class, 'create'])->name('login');
Route::post('/loginuser', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

/**
 * Reservation routes
 **/
Route::get('/reservationlist', [ReservationController::class, 'showReservationList'])
  ->middleware('preventBackHistory')->name('reservationList');
Route::post('/reservation', [ReservationController::class, 'addReservation'])
  ->middleware('preventBackHistory')->name('reservation.add');
Route::get('/reservation/{id}/edit', [ReservationController::class, 'update'])
  ->middleware('preventBackHistory')->name('reservation.update');
Route::post('/reservation/{id}/edit', [ReservationController::class, 'updateReservation'])
  ->name('reservation.update')->middleware('preventBackHistory');
Route::delete('/reservation/{id}/{room_id}', [ReservationController::class, 'deleteReservation']);

/**
 *room search in reservation
 */
Route::post('/show-room', [RoomController::class, 'searchRoom'])->name('room.search');

/**
 * Online Booking admin view routes
 */
Route::get('/onlineBooking', [OnlineBookingController::class, 'showOnlineBookingList'])
  ->name('onlineBookingList')->middleware('preventBackHistory');
Route::get('/booking/{id}', [OnlineBookingController::class, 'getBookingById'])
  ->name('booking.add')->middleware('preventBackHistory');
Route::post('/booking/{id}', [ReservationController::class, 'addBooking'])
  ->name('booking.add')->middleware('preventBackHistory');
Route::delete('/booking/{id}/{room_id}', [OnlineBookingController::class, 'deleteOnlineBooking']);

/**
 * Show Graph
 */
Route::get('/graph', [ChartController::class, 'index'])
  ->name('chart.index')->middleware('preventBackHistory');

/**
 * Hotel routes
 */
Route::get('/hotels/list', [HotelController::class, 'showHotelList'])
  ->name('hotelList')->middleware('preventBackHistory');
Route::get('/hotel/download', [HotelController::class, 'downloadHotelCSV'])->name('downloadHotelCSV');
Route::delete('/hotels/list/{id}', [HotelController::class, 'deleteHotelById']);

/**
 * Room routes
 */
Route::get('/rooms/list', [RoomController::class, 'showRoomList'])
  ->name('roomList')->middleware('preventBackHistory');
Route::post('/rooms/create',  [RoomController::class, 'saveRoom'])
  ->name('create.room')->middleware('preventBackHistory');
Route::delete('/rooms/{id}/delete', [RoomController::class, 'deleteRoomById']);
Route::get('/rooms/{id}/update', [RoomController::class, 'update'])
  ->name('room.update')->middleware('preventBackHistory');
Route::post('/rooms/{id}/update', [RoomController::class, 'updateRoom'])
  ->name('room.update')->middleware('preventBackHistory');

/**
 * Search routes
 * Search By --
 */
Route::get('/search', [ReservationController::class, 'searchForm'])
  ->name('search')->middleware('preventBackHistory');
Route::post('/searchRID', [ReservationController::class, 'searchReservationbyRID'])
  ->name('searchRID')->middleware('preventBackHistory');
Route::post('/searchCustomer', [ReservationController::class, 'searchByCustomer'])
  ->name('searchCusNm')->middleware('preventBackHistory');
Route::post('/searchPhNo', [ReservationController::class, 'searchByPhNo'])
  ->name('searchPhNo')->middleware('preventBackHistory');
Route::post('/searchGuest', [ReservationController::class, 'searchByGuestNo'])
  ->name('searchGNo')->middleware('preventBackHistory');
Route::post('/searchCheckIn', [ReservationController::class, 'searchByCheckIn'])
  ->name('searchCheckIn')->middleware('preventBackHistory');
Route::post('/searchCheckout', [ReservationController::class, 'searchByCheckOut'])
  ->name('searchCheckOut')->middleware('preventBackHistory');
Route::post('/searchStartend', [ReservationController::class, 'searchByStartEnd'])
  ->name('searchStartEnd')->middleware('preventBackHistory');
Route::delete('/search/{id}/{room_id}', [ReservationController::class, 'deleteReservationSearch']);

/**
 * customer Info routes
 */
Route::get('/customerInfo', [ReservationController::class, 'searchCustomerInfo'])
  ->name('custInfo')->middleware('preventBackHistory');
Route::post('/customerNm', [ReservationController::class, 'customerName'])
  ->name('custName')->middleware('preventBackHistory');
Route::post('/phoneNo', [ReservationController::class, 'PhoneNo'])
  ->name('phNo')->middleware('preventBackHistory');
Route::post('/checkIn', [ReservationController::class, 'CheckIn'])
  ->name('checkIn')->middleware('preventBackHistory');
  Route::post('/checkOut', [ReservationController::class, 'CheckOut'])
  ->name('checkOut')->middleware('preventBackHistory');