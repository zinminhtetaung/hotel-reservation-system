<?php

namespace App\Contracts\Dao\OnlineBooking;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface OnlineBookingDaoInterface
{
    /**
     * To get OnlineBookinglist
     * @return bookings
     */
    public function getOnlineBooking();

    
    /**
     * To get Booking by id
     * @param string $id Booking id
     * @return Booking
     */
    public function getBookingById($id);
    
    /**
     * To delete OnlineBooking
     * @param string $id OnlineBooking 
     * @return 
     */
    public function deleteOnlineBooking($id);

    /**
     * To remove OnlineBooking
     * @param string $booking
     * @return 
     */
    public function removeOnlineBooking($request);
}