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



Route::post('/addUser', [UserController::class, 'addUser']);

Route::post('/users/update/{id}', [UserController::class, 'update']);

Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);

Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

Route::get('/users', [UserController::class, 'getUser']);

Route::get('/login', function () {
    return view('login');
});  

Route::get('/loginuser', [LoginController::class, 'create']);
Route::post('/loginuser', [LoginController::class, 'store']);

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

// Route::post('/login', function () {
//     return redirect()->route('hotelList');
// });  

// Route::get('/', function () {
//     return redirect()->route('hotelList');
// });
// Route::get('/hotels/list', [HotelController::class, 'showHotelList'])->name('hotelList');


/**
 * Display All Reservation
 */
Route::get('/', [ReservationController::class, 'showReservationList'])->name('reservationList');

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
/**
 * Show Graph
 */
Route::get('Graph/graph', [ChartJsController::class, 'index'])->name('chartjs.index');

Route::get('/hotels/list', [HotelController::class, 'showHotelList'])->name('hotelList');

Route::get('/hotel/download', [HotelController::class, 'downloadHotelCSV'])->name('downloadHotelCSV');

Route::delete('/hotels/list/{id}', [HotelController::class, 'deleteHotelById']);

Route::get('/rooms/list', [RoomController::class, 'showRoomList'])->name('showroomList');

Route::post('/rooms/create',  [RoomController::class, 'saveRoom'])->name('create.room');

Route::delete('/rooms/delete/{id}', [RoomController::class, 'deleteRoomById']);

Route::post('rooms/update/{id}', [RoomController::class, 'update']);

Route::post('/updateRoom/{id}', [RoomController::class, 'updateRoom']);

// Search form 
Route::get('/search', [ReservationController::class, 'searchForm']);

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
Route::get('user/hotel/hotellist',[HotelController::class,'showHotelListUser'])->name('hotelview');

Route::get('user/roomuserview',[RoomController::class,'showRoomUserview'])->name('roomuserview');

Route::get('user/rooms/list', [RoomController::class, 'showRoomListUserView'])->name('showroomListuserview');

Route::get('user/booking/{id}',[OnlineBookingController::class,'createBooking'])->name('createbooking');

Route::post('user/storeBooking',[OnlineBookingController::class,'storeBooking'])->name('storebooking');

Route::get('user/home',[HomeController::class,'index']);                                            
