<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartJsController;
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
Route::get('/users', [UserController::class, 'getUser'])->name('userlist');
Route::post('/addUser', [UserController::class, 'addUser'])->name('user.create');
Route::get('/users/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::post('/users/{id}/update', [UserController::class, 'updateUser'])->name('user.update');
Route::delete('/user/{id}/delete', [UserController::class, 'deleteUser']);

/**
 * Login routes
 */
Route::get('/loginuser', [LoginController::class, 'create'])->name('login');
Route::post('/loginuserstore', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

/**
 * Reservation routes
 */
Route::get('/reservationlist', [ReservationController::class, 'showReservationList'])->name('reservationList');
Route::post('/reservation', [ReservationController::class, 'addReservation'])->name('reservation.add');
Route::get('/reservation/{id}/edit', [ReservationController::class, 'update'])->name('reservation.update');
Route::post('/reservation/{id}/edit', [ReservationController::class, 'updateReservation'])
->name('reservation.update');
Route::delete('/reservation/{id}/{room_id}', [ReservationController::class, 'deleteReservation']);

/**
 *room search in reservation
 */
Route::post('/show-room', [RoomController::class, 'searchRoom'])->name('room.search');

/**
 * Online Booking admin view routes
 */
Route::get('/onlineBooking', [OnlineBookingController::class, 'showOnlineBookingList'])
->name('onlineBookingList');
Route::get('/booking/{id}', [OnlineBookingController::class, 'getBookingById'])->name('booking.add');
Route::post('/booking/{id}', [ReservationController::class, 'addBooking'])->name('booking.add');
Route::delete('/booking/{id}/{room_id}', [OnlineBookingController::class, 'deleteOnlineBooking']);

/**
 * Show Graph
 */
Route::get('/graph', [ChartJsController::class, 'index'])->name('chartjs');

/**
 * Hotel routes
 */
Route::get('/hotels/list', [HotelController::class, 'showHotelList'])->name('hotelList');
Route::get('/hotel/download', [HotelController::class, 'downloadHotelCSV'])->name('downloadHotelCSV');

/**
 * Room routes
 */
Route::get('/rooms/list', [RoomController::class, 'showRoomList'])->name('roomList');
Route::post('/rooms/create',  [RoomController::class, 'saveRoom'])->name('create.room');
Route::delete('/rooms/{id}/delete', [RoomController::class, 'deleteRoomById']);
Route::get('/rooms/{id}/update', [RoomController::class, 'update'])->name('room.update');
Route::post('/rooms/{id}/update', [RoomController::class, 'updateRoom'])->name('room.update');

/**
 * Search routes
 * Search By --
 */
Route::get('/search', [ReservationController::class, 'searchForm'])->name('search');
Route::post('/searchRID', [ReservationController::class, 'searchReservationbyRID'])->name('searchRID');
Route::post('/searchCustomer', [ReservationController::class, 'searchByCustomer'])->name('searchCusNm');
Route::post('/searchPhNo', [ReservationController::class, 'searchByPhNo'])->name('searchPhNo');
Route::post('/searchGuest', [ReservationController::class, 'searchByGuestNo'])->name('searchGNo');
Route::post('/searchCheckIn', [ReservationController::class, 'searchByCheckIn'])->name('searchCheckIn');
Route::post('/searchCheckout', [ReservationController::class, 'searchByCheckOut'])->name('searchCheckOut');
Route::post('/searchStartend', [ReservationController::class, 'searchByStartEnd'])->name('searchStartEnd');
Route::delete('/search/{id}/{room_id}', [ReservationController::class, 'deleteReservationSearch']);
