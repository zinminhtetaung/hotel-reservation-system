<?php

namespace App\Contracts\Dao\Reservation;

/**
 * Interface for Data Accessing Object of Post
 */
interface ReservationDaoInterface
{
    /**
     * To get reservationlist
     * @return reservations
     */
    public function getReservation();
    /**
     * To get reservation
     * @return reservations
     */
    public function getCustomerInfo();

    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id);

    /**
     * To get topRoom
     * @return topRooms
     */
    public function getTopRoomList();

    /**
     * To save reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function addReservation($request);

    /**
     * To save online booking
     * @param object $request
     * @return Object created reservation object
     */
    public function addBooking($request);
    
    /**
     * To update reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function updateReservation($request,$id);

    /**
     * To delete reservation
     * @param string $id reservation id
     * @return 
     */
    public function deleteReservation($id);

    /**
     * To To search reservation 
     * @return reservation
     */
    public function searchReservationbyRID($request);

        /**
     * To To search reservation by customer name
     * @return reservation
     */
    public function searchByCustomer($customer);
    /**
     * To To search reservation by phone number
     * @return reservation
     */
    public function searchByPhNo($phone);
    /**
     * To To search reservation by number of guest
     * @return reservation
     */
    public function searchByGuestNo($guest_no);
    /**
     * To To search reservation by check_in time
     * @return reservation
     */
    public function searchByCheckIn($checkin);
    /**
     * To To search reservation by check_out time
     * @return reservation
     */
    public function searchByCheckOut($checkout);
    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return reservation
     */
    public function searchByStartEnd($start, $end);
    
    /**
     * To search from CustomerName
     * @param string $data Input from user
     * @return array $custInfo Customer info from reservation
     */
    public function customerName($data);

    /**
     * To To search reservation by phone number
     * @return array $reservation reservation list
     */
    public function PhoneNo($phone);
    
    /**
     * To To search reservation by check_in time
     * @return array $reservation reservation list
     */
    public function CheckIn($checkin);
    
    /**
     * To To search reservation by check_out time
     * @return array $reservation reservation list
     */
    public function CheckOut($checkout);
    
}