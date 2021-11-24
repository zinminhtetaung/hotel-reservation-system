<?php

namespace App\Http\Controllers\OnlineBooking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Room\RoomServiceInterface;
use App\Contracts\Services\OnlineBooking\OnlineBookingServiceInterface;
use App\Http\Requests\BookingRequest;

/**
 * This is OnlineBooking controller.
 */
class OnlineBookingController extends Controller
{
    /**
     * OnlineBooking interface
     */
    private $OnlineBookingInterface;
    /**
     * Room interface
     */
    private $RoomInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OnlineBookingServiceInterface $OnlineBookingServiceInterface, RoomServiceInterface $RoomServiceInterface)
    {
        $this->OnlineBookingInterface = $OnlineBookingServiceInterface;
        $this->RoomInterface = $RoomServiceInterface;
    }
    

    /**
     * To show OnlineBooking list
     *
     * @return View OnlineBooking list
     */
    public function showOnlineBookingList()
    {
        $OnlineBookingList = $this->OnlineBookingInterface->getOnlineBooking();
        return view('onlineBooking', [
            'bookings' => $OnlineBookingList
        ]);
    }
    /**
     * To show online booking data
     * @param $request
     * @return View confirm
     */
    public function getBookingById($id) {
        $booking = $this->OnlineBookingInterface->getBookingById($id);
        return view('confirm',[
            'booking'=> $booking
        ]);
    }
    /**
     * To delete OnlineBooking
     * @param sting $id
     * @return View OnlineBooking list
     */
    public function deleteOnlineBooking($id,$room_id) {
        $this->OnlineBookingInterface->deleteOnlineBooking($id);
        $Room = $this->RoomInterface->unsetStatus($room_id);
        return redirect("onlineBooking");
    }

    public function createBooking($id){
        $roomid =$this->RoomInterface->getRoomById($id);
        return view('user.booking',['rooms'=> $roomid]);
    }
    /**
     * To add Booking
     * @param  $request
     * @return View Reservation list
     */
    public function storeBooking(BookingRequest $request)
    {
        $this->OnlineBookingInterface->storeBooking($request);
        $this->RoomInterface->setStatus($request);
        return redirect('user/roomuserview');
    }


}