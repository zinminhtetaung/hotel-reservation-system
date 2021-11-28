<?php

namespace App\Dao\OnlineBookings;

use App\Models\OnlineBooking;
use Illuminate\Support\Facades\DB;
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
        return OnlineBooking::orderBy('created_at', 'asc')->get();
    }

    /**
     * To get online booking by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getBookingById($id) {
        return OnlineBooking::FindorFail($id);
    }

    /**
     * To delete OnlineBooking
     * @param string $id OnlineBooking id
     * @return 
     */
    public function deleteOnlineBooking($id) {
        return DB::transaction(function () use ($id){
            $booking = OnlineBooking::find($id);
            if ($booking) {
            $booking->delete();
            return 'Deleted Successfully!';
            }
            return 'Booking Not Found!';
        });
    }

    /**
     * To remove OnlineBooking
     * @param string $id OnlineBooking id
     * @return message
     */
    public function removeOnlineBooking($request) {
        return DB::transaction(function () use ($request){ 
            OnlineBooking::findOrFail($request->id)->delete();
        });
        
    }
    /**
     * To add Booking to reservation when booked
     * @param $request
     * @return $addOnlineBooking onlineBookingList in admin side
     */
    public function storeBooking($request){
        return DB::transaction(function () use ($request){ 
            $addBooking =$this->addData($request);
            return OnlineBooking::create($addBooking); 
        });
    }

    /**
     * add Data to storeBooking
     * @param $request
     */
    private function addData($request){
        return DB::transaction(function () use ($request){ 
            return[
                'room_id' =>$request->input('room_id'),
                'customer_name' =>$request->customername,
                'email'=>$request->email,
                'phone' =>$request->phonenumber,
                'number_of_guest'=>$request->guestno,
                'check_in'=>$request->checkin,
                'check_out'=>$request->checkout,
            ];
        });
    }
}