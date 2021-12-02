<?php

namespace App\Services\Reservation;

use App\Contracts\Dao\Reservation\ReservationDaoInterface;
use App\Contracts\Services\Reservation\ReservationServiceInterface;

/**
 * Service class for Reservation.
 */
class ReservationService implements ReservationServiceInterface
{
    /**
     * reservation dao
     */
    private $reservationDao;
    /**
     * Class Constructor
     * @param ReservationDaoInterface
     * @return
     */
    public function __construct(ReservationDaoInterface $ReservationDao)
    {
        $this->reservationDao = $ReservationDao;
    }

    /**
     * To get Reservation list
     * @return ReservationList
     */
    public function getReservation() {
        return $this->reservationDao->getReservation();
    }
    /**
     * To get reservation
     * @return reservations
     */
    public function getCustomerInfo() {
        return $this->reservationDao->getCustomerInfo();
    }
    
    /**
     * To get Reservation list
     * @return ReservationList
     */
    public function getTopRoomList() {
        return $this->reservationDao->getTopRoomList();
    }

    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id) {
        return $this->reservationDao->getReservationById($id);
    }
    
    /**
     * To save Reservation
     * @param object $request request value to validate
     * @return Object created Reservation object
     */
    public function addReservation($request) {
        return $this->reservationDao->addReservation($request);
    }
    
    /**
     * To save online booking
     * @param object $booking 
     * @return Object created Reservation object
     */
    public function addBooking($request) {
        return $this->reservationDao->addBooking($request);
    }
    
       /**
     * To update Reservation
     * @param object $request request value to validate
     * @return Object created Reservation object
     */
    public function updateReservation($request,$id) {
        return $this->reservationDao->updateReservation($request,$id);
    }

    /**
     * To delete Reservation
     * @param string $id Reservation id
     * @return 
     */
    public function deleteReservation($id) {
        $this->reservationDao->deleteReservation($id);
    }

    /**
     * To search reservation
     * @return reservationList
     */
    public function searchReservationbyRID($request){
        return $this->reservationDao->searchReservationbyRID($request);
    }

    /**
     * To To search reservation by customer name
     * @return reservation
     */
    public function searchByCustomer($request) {
        return $this->reservationDao->searchByCustomer($request);
    }

    /**
     * To To search reservation by phone number
     * @return reservation
     */
    public function searchByPhNo($request) {
        return $this->reservationDao->searchByPhNo($request);
    }

    /**
     * To To search reservation by number of guest
     * @return reservation
     */
    public function searchByGuestNo($request) {
        return $this->reservationDao->searchByGuestNo($request);
    }

    /**
     * To To search reservation by check_in time
     * @return reservation
     */
    public function searchByCheckIn($request) {
        return $this->reservationDao->searchByCheckIn($request);
    }

    /**
     * To To search reservation by check_out time
     * @return reservation
     */
    public function searchByCheckOut($request) {
        return $this->reservationDao->searchByCheckOut($request);
    }

    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return reservation
     */
    public function searchByStartEnd($start, $end) {
        return $this->reservationDao->searchByStartEnd($start, $end);
    }
    
    /**
     * To search from CustomerName
     * @param string $data Input from user
     * @return array $custInfo Customer info from reservation
     */
    public function customerName($data) {
        return $this->reservationDao->customerName($data);
    }

    /**
     * To To search reservation by phone number
     * @return array $reservation reservation list
     */
    public function PhoneNo($phone) {
        
        return $this->reservationDao->PhoneNo($phone);
    }
    /**
     * To To search reservation by check_in time
     * @return array $reservation reservation list
     */
    public function CheckIn($checkin) {
        
        return $this->reservationDao->CheckIn($checkin);
    }
    /**
     * To To search reservation by check_out time
     * @return array $reservation reservation list
     */
    public function CheckOut($checkout) {
        
        return $this->reservationDao->CheckOut($checkout);
    }
}