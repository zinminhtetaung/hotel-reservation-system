<?php

namespace App\Dao\OnlineBookings;

use App\Models\OnlineBooking;
use App\Contracts\Dao\OnlineBooking\OnlineBookingDaoInterface;

/**
 * Data accessing object for OnlineBooking
 */
class OnlineBookingDao implements OnlineBookingDaoInterface
{
    /**
     * To get OnlineBooking
     * @return OnlineBookings
     */
    public function getOnlineBooking() {
        $bookings = OnlineBooking::orderBy('created_at', 'asc')->get();
        return $bookings;
    }

    /**
     * To get online booking by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getBookingById($id) {
        $booking = OnlineBooking::FindorFail($id);
        return $booking;
    }

    /**
     * To delete OnlineBooking
     * @param string $id OnlineBooking id
     * @return 
     */
    public function deleteOnlineBooking($id) {
        OnlineBooking::findOrFail($id)->delete();
    }

    /**
     * To remove OnlineBooking
     * @param string $id OnlineBooking id
     * @return message
     */
    public function removeOnlineBooking($request) {
        OnlineBooking::findOrFail($request->id)->delete();
        
    }
    /**
     * To add Booking to reservation when booked
     * @param $request
     * @return $addOnlineBooking onlineBookingList in admin side
     */
    public function storeBooking($request){
        $addBooking =$this->addData($request);
        $addOnlineBooking=OnlineBooking::create($addBooking);
        return $addOnlineBooking;   
    }

    /**
     * add Data to storeBooking
     * @param $request
     */
    private function addData($request){
        return[
            'room_id' =>$request->input('room_id'),
            'customer_name' =>$request->customername,
            'email'=>$request->email,
            'phone' =>$request->phonenumber,
            'number_of_guest'=>$request->guestno,
            'check_in'=>$request->checkin,
            'check_out'=>$request->checkout,
        ];
    }
}