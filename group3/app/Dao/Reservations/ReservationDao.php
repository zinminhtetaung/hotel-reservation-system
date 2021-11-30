<?php

namespace App\Dao\Reservations;

use App\Models\Reservation;
use App\Contracts\Dao\Reservation\ReservationDaoInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for reservation
 */
class ReservationDao implements ReservationDaoInterface
{
    /**
     * To get reservation
     * @return reservations
     */
    public function getReservation()
    {
        $reservations = Reservation::orderBy('created_at', 'asc')->get();
        return $reservations;
    }

    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id)
    {
        $reservation = Reservation::FindorFail($id);
        return $reservation;
    }

    /**
     * To save reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function addReservation($request)
    {
        $reservations = new Reservation();
        $reservations->customer_name = $request->customer_name;
        $reservations->phone = $request->phone;
        $reservations->room_id = $request->room_id;
        $reservations->number_of_guest = $request->number_of_guest;
        $reservations->check_in = $request->check_in;
        $reservations->check_out = $request->check_out;
        $reservations->user_id = Auth::user()->id;
        $reservations->save();
        return $reservations;
    }

    /**
     * To save online booking into  reservation
     * @return Object created reservation object
     */
    public function addBooking($request)
    {
        $reservations = new Reservation();
        $reservations->customer_name = $request->customer_name;
        $reservations->phone = $request->phone;
        $reservations->room_id = $request->room_id;
        $reservations->number_of_guest = $request->number_of_guest;
        $reservations->check_in = $request->check_in;
        $reservations->check_out = $request->check_out;
        $reservations->save();
    }

    /**
     * To update reservation
     * @param string $id reservation id
     * @return 
     */
    public function updateReservation($request, $id)
    {
        $reservations = Reservation::FindorFail($id);
        $reservations->customer_name = $request->customer_name;
        $reservations->phone = $request->phone;
        $reservations->number_of_guest = $request->number_of_guest;
        $reservations->check_in = $request->check_in;
        $reservations->check_out = $request->check_out;
        $reservations->user_id = 1;
        $reservations->save();
        return $reservations;
    }

    /**
     * To delete reservation
     * @param string $id reservation id
     * @return 
     */
    public function deleteReservation($id)
    {
        Reservation::findOrFail($id)->delete();
    }

    /**
     * To To search reservation 
     * @return reservation
     */
    public function searchReservationbyRID($request)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE                                      
            deleted_at IS NULL
            AND
            room_id = :room_id"), array(
            'room_id' => $request->room_id,
        ));
        return $reservations;
    }

    /**
     * To To search reservation by customer name
     * @return array $reservation reservation list
     */
    public function searchByCustomer($customer)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE   
        deleted_at IS NULL
            AND                                   
                customer_name = :customer_name"), array(
            'customer_name' => $customer->customer_name,
        ));
        return $reservations;
    }

    /**
     * To To search reservation by phone number
     * @return array $reservation reservation list
     */
    public function searchByPhNo($phone)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE  
        deleted_at IS NULL
            AND                                    
                phone = :phone"), array(
            'phone' => $phone->phone,
        ));
        return $reservations;
    }

    /**
     * To To search reservation by number of guest
     * @return array $reservation reservation list
     */
    public function searchByGuestNo($guest_no)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE  
        deleted_at IS NULL
            AND                                    
                number_of_guest = :number_of_guest"), array(
            'number_of_guest' => $guest_no->number_of_guest,
        ));
        return $reservations;
    }

    /**
     * To To search reservation by check_in time
     * @return array $reservation reservation list
     */
    public function searchByCheckIn($checkin)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE  
        deleted_at IS NULL
            AND                                    
                check_in = :check_in"), array(
            'check_in' => $checkin->check_in,
        ));
        return $reservations;
    }

    /**
     * To To search reservation by check_out time
     * @return array $reservation reservation list
     */
    public function searchByCheckOut($checkout)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE   
        deleted_at IS NULL
            AND                                   
                check_out = :check_out"), array(
            'check_out' => $checkout->check_out,
        ));
        return $reservations;
    }

    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return array $reservation reservation list
     */
    public function searchByStartEnd($start, $end)
    {
        $reservations = DB::select(DB::raw("SELECT * FROM reservations WHERE
        deleted_at IS NULL
            AND
                created_at >= :created_at AND
                created_at < :created_at"), array(
            'created_at' => $start->created_at,
            'created_at' => $end->created_at,
        ));
        return $reservations;
    }
}
