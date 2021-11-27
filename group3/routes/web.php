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
    return redirect()->route('home');
  });

Route::post('/addUser', [UserController::class, 'addUser'])
->middleware('preventBackHistory');

Route::post('/users/update/{id}', [UserController::class, 'update'])
->middleware('preventBackHistory');

Route::post('/updateUser/{id}', [UserController::class, 'updateUser'])
->middleware('preventBackHistory');

Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

Route::get('/users', [UserController::class, 'getUser'])
->middleware('preventBackHistory');

Route::get('/loginuser', [LoginController::class, 'create'])->name('login');

Route::post('/loginuserstore', [LoginController::class, 'store']);

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

/**
 * Display All Reservation
 */
Route::get('/reservationlist', [ReservationController::class, 'showReservationList'])->name('reservationList')
->middleware('preventBackHistory');

/**
 * Add A New Reservation
 */
Route::post('/reservation', [ReservationController::class, 'addReservation'])
->middleware('preventBackHistory');

/**
 * Update Reservation Form
 */
Route::post('/update/{id}', [ReservationController::class, 'update'])
->middleware('preventBackHistory');

/**
 * Update Reservation 
 */
Route::post('/updateReservation/{id}', [ReservationController::class, 'updateReservation'])
->middleware('preventBackHistory');
/**
 * Delete An Existing Reservation
 */
Route::delete('/reservation/{id}/{room_id}', [ReservationController::class, 'deleteReservation']);
/**
 * 
 */
Route::post('/show-room', [RoomController::class, 'searchRoom'])
->middleware('preventBackHistory');

/**
 * Display All OnlineBooking
 */
Route::get('/onlineBooking', [OnlineBookingController::class, 'showOnlineBookingList'])
->name('onlineBookingList')->middleware('preventBackHistory');

/**
 * View Online booking
 */
Route::post('/view-booking/{id}', [OnlineBookingController::class, 'getBookingById'])
->middleware('preventBackHistory');

/**
 * Confirm Online booking
 */
Route::post('/confirm-booking', [ReservationController::class, 'addBooking'])
->middleware('preventBackHistory');

/**
 * Delete An Online Booking
 */
Route::delete('/delete-booking/{id}/{room_id}', [OnlineBookingController::class, 'deleteOnlineBooking']);
/**
 * Show Graph
 */
Route::get('/graph', [ChartJsController::class, 'index'])->name('chartjs.index')
->middleware('preventBackHistory');

Route::get('/hotels/list', [HotelController::class, 'showHotelList'])->name('hotelList')
->middleware('preventBackHistory');

Route::get('/hotel/download', [HotelController::class, 'downloadHotelCSV'])
->name('downloadHotelCSV')->middleware('preventBackHistory');

Route::delete('/hotels/list/{id}', [HotelController::class, 'deleteHotelById']);

Route::get('/rooms/list', [RoomController::class, 'showRoomList'])->name('showroomList')
->middleware('preventBackHistory');

Route::post('/rooms/create',  [RoomController::class, 'saveRoom'])->name('create.room')
->middleware('preventBackHistory');

Route::delete('/rooms/delete/{id}', [RoomController::class, 'deleteRoomById']);

Route::post('/rooms/update/{id}', [RoomController::class, 'update'])
->middleware('preventBackHistory');

Route::post('/updateRoom/{id}', [RoomController::class, 'updateRoom'])
->middleware('preventBackHistory');

// Search form 
Route::get('/search', [ReservationController::class, 'searchForm'])
->middleware('preventBackHistory');

/**
 * Search By --
 */
Route::post('/searchRID', [ReservationController::class, 'searchReservationbyRID']);

Route::post('/searchCustomer', [ReservationController::class, 'searchByCustomer']);

Route::post('/searchPhNo', [ReservationController::class, 'searchByPhNo']);

Route::post('/searchGuest', [ReservationController::class, 'searchByGuestNo']);

Route::post('/searchCheckIn', [ReservationController::class, 'searchByCheckIn']);

Route::post('/searchCheckout', [ReservationController::class, 'searchByCheckOut']);

Route::post('/searchStartend', [ReservationController::class, 'searchByStartEnd']);

Route::delete('/search/{id}/{room_id}', [ReservationController::class, 'deleteReservationSearch']);

Route::get('/user/hotel/hotellist',[HotelController::class,'showHotelListUser'])
->name('hotelview')->middleware('preventBackHistory');

Route::get('/user/roomuserview',[RoomController::class,'showRoomUserview'])
->name('roomuserview')->middleware('preventBackHistory');

Route::get('/user/rooms/list', [RoomController::class, 'showRoomListUserView'])
->name('showroomListuserview')->middleware('preventBackHistory');

Route::get('/user/booking/{id}',[OnlineBookingController::class,'createBooking'])
->name('createbooking')->middleware('preventBackHistory');

Route::post('/user/storeBooking',[OnlineBookingController::class,'storeBooking'])
->name('storebooking')->middleware('preventBackHistory');

Route::get('/user/home',[HomeController::class,'index'])->name('home');                                            
