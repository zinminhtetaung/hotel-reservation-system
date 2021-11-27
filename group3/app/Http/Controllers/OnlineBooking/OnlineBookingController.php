<?php

namespace App\Http\Controllers\OnlineBooking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Room\RoomServiceInterface;
use App\Contracts\Services\OnlineBooking\OnlineBookingServiceInterface;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;

/**
 * This is OnlineBooking controller.
 */
class OnlineBookingController extends Controller
{
    /**
     * OnlineBooking interface
     */
    private $onlineBookingInterface;
    /**
     * Room interface
     */
    private $roomInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OnlineBookingServiceInterface $onlineBookingServiceInterface,
     RoomServiceInterface $roomServiceInterface)
    {
        $this->onlineBookingInterface = $onlineBookingServiceInterface;
        $this->roomInterface = $roomServiceInterface;
    }
    

    /**
     * To show OnlineBooking list
     *
     * @return View OnlineBooking list
     */
    public function showOnlineBookingList()
    {
        if(Auth::check()){
            $onlineBookingList = $this->onlineBookingInterface->getOnlineBooking();
            return view('onlineBooking', [
                'bookings' => $onlineBookingList
            ]);
        }
        else{
            return redirect()->route('login');
        }
        
    }
    /**
     * To show online booking data
     * @param $request
     * @return View confirm
     */
    public function getBookingById($id) {
        $booking = $this->onlineBookingInterface->getBookingById($id);
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
        $this->onlineBookingInterface->deleteOnlineBooking($id);
        $Room = $this->roomInterface->unsetStatus($room_id);
        return redirect("onlineBooking");
    }

    public function createBooking($id){
        $roomid =$this->roomInterface->getRoomById($id);
        return view('user.booking',['rooms'=> $roomid]);
    }
    /**
     * To add Booking
     * @param  $request
     * @return View Reservation list
     */
    public function storeBooking(BookingRequest $request)
    {
        $this->onlineBookingInterface->storeBooking($request);
        $this->roomInterface->setStatus($request);
        return redirect('user/roomuserview');
    }


}