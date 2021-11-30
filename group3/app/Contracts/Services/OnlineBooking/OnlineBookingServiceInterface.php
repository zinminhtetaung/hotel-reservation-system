<?php

namespace App\Contracts\Services\OnlineBooking;


/**
 * Interface for OnlineBooking service
 */
interface OnlineBookingServiceInterface
{
    /**
     * To get OnlineBooking list
     * @return OnlineBookingList
     */
    public function getOnlineBooking();

    /**
     * To get booking by id
     * @param string $id bookingid
     * @return booking
     */
    public function getBookingById($id);
    
    /**
     * To delete OnlineBooking
     * @param string $id OnlineBooking id
     * @return 
     */
    public function deleteOnlineBooking($id);

    /**
     * To remove OnlineBooking
     * @param string $id OnlineBooking
     * @return 
     */
    public function removeOnlineBooking($request);

    /**
     * To add OnlineBooking
     * @param string $request
     * @return
     */
    public function storeBooking($request);

}