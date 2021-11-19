<?php

namespace App\Services\Reservation;

use App\Contracts\Dao\Reservation\ReservationDaoInterface;
use App\Contracts\Services\Reservation\ReservationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for Reservation.
 */
class ReservationService implements ReservationServiceInterface
{
    /**
     * reservation dao
     */
    private $ReservationDao;
    /**
     * Class Constructor
     * @param ReservationDaoInterface
     * @return
     */
    public function __construct(ReservationDaoInterface $ReservationDao)
    {
        $this->ReservationDao = $ReservationDao;
    }

    /**
     * To get Reservation list
     * @return ReservationList
     */
    public function getReservation() {
        return $this->ReservationDao->getReservation();
    }
    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id) {
        return $this->ReservationDao->getReservationById($id);
    }
    /**
     * To save Reservation
     * @param object $request request value to validate
     * @return Object created Reservation object
     */
    public function addReservation($request) {
        return $this->ReservationDao->addReservation($request);
    }
    /**
     * To save online booking
     * @param object $booking 
     * @return Object created Reservation object
     */
    public function addBooking($request) {
        return $this->ReservationDao->addBooking($request);
    }
       /**
     * To update Reservation
     * @param object $request request value to validate
     * @return Object created Reservation object
     */
    public function updateReservation($request,$id) {
        return $this->ReservationDao->updateReservation($request,$id);
    }

    /**
     * To delete Reservation
     * @param string $id Reservation id
     * @return 
     */
    public function deleteReservation($id) {
        $this->ReservationDao->deleteReservation($id);
    }

    /**
     * To search reservation
     * @return reservationList
     */
    public function searchReservationbyRID($request){
        return $this->ReservationDao->searchReservationbyRID($request);
    }

    /**
     * To To search reservation by customer name
     * @return reservation
     */
    public function searchByCustomer($request) {
        return $this->ReservationDao->searchByCustomer($request);
    }

    /**
     * To To search reservation by phone number
     * @return reservation
     */
    public function searchByPhNo($request) {
        return $this->ReservationDao->searchByPhNo($request);
    }

    /**
     * To To search reservation by number of guest
     * @return reservation
     */
    public function searchByGuestNo($request) {
        return $this->ReservationDao->searchByGuestNo($request);
    }

    /**
     * To To search reservation by check_in time
     * @return reservation
     */
    public function searchByCheckIn($request) {
        return $this->ReservationDao->searchByCheckIn($request);
    }

    /**
     * To To search reservation by check_out time
     * @return reservation
     */
    public function searchByCheckOut($request) {
        return $this->ReservationDao->searchByCheckOut($request);
    }

    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return reservation
     */
    public function searchByStartEnd($start, $end) {
        return $this->ReservationDao->searchByStartEnd($start, $end);
    }
}