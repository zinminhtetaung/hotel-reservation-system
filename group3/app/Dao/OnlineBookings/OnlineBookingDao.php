<?php

namespace App\Dao\OnlineBookings;

use App\Models\OnlineBooking;
use App\Contracts\Dao\OnlineBooking\OnlineBookingDaoInterface;
use Illuminate\Http\Request;

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

}