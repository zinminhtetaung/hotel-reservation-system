<?php

namespace App\Dao\Reservations;

use App\Models\Reservation;
use App\Contracts\Dao\Reservation\ReservationDaoInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Data accessing object for reservation
 */
class ReservationDao implements ReservationDaoInterface
{
    /**
     * To get reservation
     * @return reservations
     */
    public function getReservation() {
        $reservations = Reservation::orderBy('created_at', 'asc')->get();
        return $reservations;
    }

    
    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id) {
        $reservation = Reservation::FindorFail($id);
        return $reservation;
    }


    /**
     * To save reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function addReservation($request) {    
        $reservations = new Reservation();
        $reservations->customer_name = $request->customer_name;
        $reservations->phone = $request->phone;
        $reservations->room_id = $request->room_id;
        $reservations->number_of_guest = $request->number_of_guest;
        $reservations->check_in = $request->check_in;
        $reservations->check_out = $request->check_out;
        $reservations->user_id=1;
        $reservations->save();    
        return $reservations;
    }

    /**
     * To save online booking into  reservation
     * @return Object created reservation object
     */
    public function addBooking($request) {    
        $reservations = new Reservation();
        $reservations->customer_name = $request->customer_name;
        $reservations->phone = $request->phone;
        $reservations->room_id = $request->room_id;
        $reservations->number_of_guest = $request->number_of_guest;
        $reservations->check_in = $request->check_in;
        $reservations->check_out = $request->check_out;
        $reservations->user_id=1;
        $reservations->save();
    }
     /**
     * To update reservation
     * @param string $id reservation id
     * @return 
     */
    public function updateReservation($request,$id) {
        $reservations = Reservation::FindorFail($id);
        $reservations->customer_name = $request->customer_name;
        $reservations->phone = $request->phone;
        $reservations->number_of_guest = $request->number_of_guest;
        $reservations->check_in = $request->check_in;
        $reservations->check_out = $request->check_out;
        $reservations->user_id=1;
        $reservations->save();    
        return $reservations;
    }
    /**
     * To delete reservation
     * @param string $id reservation id
     * @return 
     */
    public function deleteReservation($id) {
        Reservation::findOrFail($id)->delete();
    }
}