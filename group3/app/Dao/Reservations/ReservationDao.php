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
        return Reservation::orderBy('created_at', 'asc')->get();
    }
    /**
     * To get reservation
     * @return reservations
     */
    public function getCustomerInfo()
    {
        return Reservation::orderBy('created_at', 'asc')->withTrashed()->get();
    }

    /**
     * To get reservation by id
     * @param string $id reservation id
     * @return reservation
     */
    public function getReservationById($id)
    {
        return Reservation::FindorFail($id);
    }

    /**
     * To save reservation
     * @param object $request Validated values from request
     * @return Object created reservation object
     */
    public function addReservation($request)
    {
        return DB::transaction(function () use ($request){
            $reservations = new Reservation();
            $reservations->customer_name = $request->customer_name;
            $reservations->phone = $request->phone;
            $reservations->room_id = $request->room_id;
            $reservations->number_of_guest = $request->number_of_guest;
            $reservations->check_in = $request->check_in;
            $reservations->check_out = $request->check_out;
            $reservations->user_id = Auth::user()->id;
            $reservations->save();
        });
    }

    /**
     * To save online booking into  reservation
     * @return Object created reservation object
     */
    public function addBooking($request)
    {
        return DB::transaction(function () use ($request){
            $reservations = new Reservation();
            $reservations->customer_name = $request->customer_name;
            $reservations->phone = $request->phone;
            $reservations->room_id = $request->room_id;
            $reservations->number_of_guest = $request->number_of_guest;
            $reservations->check_in = $request->check_in;
            $reservations->check_out = $request->check_out;
            $reservations->user_id = Auth::user()->id;
            $reservations->save();
        });
    }

    /**
     * To update reservation
     * @param string $id reservation id
     * @return 
     */
    public function updateReservation($request, $id)
    {
        return DB::transaction(function () use ($request, $id){
            $reservations = Reservation::FindorFail($id);
            $reservations->customer_name = $request->customer_name;
            $reservations->phone = $request->phone;
            $reservations->number_of_guest = $request->number_of_guest;
            $reservations->check_in = $request->check_in;
            $reservations->check_out = $request->check_out;
            $reservations->user_id = Auth::user()->id;
            $reservations->save();
        });
    }

    /**
     * To delete reservation
     * @param string $id reservation id
     * @return 
     */
    public function deleteReservation($id)
    {
        return DB::transaction(function () use ($id){
            $reservation = Reservation::find($id);
            if ($reservation) {
            $reservation->delete();
            return 'Deleted Successfully!';
            }
            return 'Reservation Not Found!';
        });
    }

    /**
     * To To search reservation 
     * @return reservation
     */
    public function searchReservationbyRID($request)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE                                      
            deleted_at IS NULL
            AND
            room_id = :room_id"), array(
            'room_id' => $request->room_id,
        ));
    }

    /**
     * To To search reservation by customer name
     * @return array $reservation reservation list
     */
    public function searchByCustomer($customer)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE   
        deleted_at IS NULL
            AND                                   
                customer_name = :customer_name"), array(
            'customer_name' => $customer->customer_name,
        ));
    }

    /**
     * To To search reservation by phone number
     * @return array $reservation reservation list
     */
    public function searchByPhNo($phone)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE  
        deleted_at IS NULL
            AND                                    
                phone = :phone"), array(
            'phone' => $phone->phone,
        ));
    }

    /**
     * To To search reservation by number of guest
     * @return array $reservation reservation list
     */
    public function searchByGuestNo($guest_no)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE  
        deleted_at IS NULL
            AND                                    
                number_of_guest = :number_of_guest"), array(
            'number_of_guest' => $guest_no->number_of_guest,
        ));
    }

    /**
     * To To search reservation by check_in time
     * @return array $reservation reservation list
     */
    public function searchByCheckIn($checkin)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE  
        deleted_at IS NULL
            AND                                    
                check_in = :check_in"), array(
            'check_in' => $checkin->check_in,
        ));
    }

    /**
     * To To search reservation by check_out time
     * @return array $reservation reservation list
     */
    public function searchByCheckOut($checkout)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE   
        deleted_at IS NULL
            AND                                   
                check_out = :check_out"), array(
            'check_out' => $checkout->check_out,
        ));
    }

    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return array $reservation reservation list
     */
    public function searchByStartEnd($start, $end)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE
        deleted_at IS NULL
            AND
                created_at >= :created_at AND
                created_at < :created_at"), array(
            'created_at' => $start->created_at,
            'created_at' => $end->created_at,
        ));
    }

    /**
     * To get top 10 room list
     * @return array $roomList list of rooms
     */
    public function getTopRoomList()
    {
        return DB::select(DB::raw("SELECT rooms.*
        FROM reservations,rooms
        WHERE rooms.deleted_at IS NULL AND reservations.room_id=rooms.id
        Group By reservations.room_id
        Order By COUNT(reservations.id) DESC
        LIMIT 8 "
        ));  
    }
    
    /**
     * To search from CustomerName
     * @param data $data Input from user
     * @return array $custInfo Customer info from reservation
     */
    public function customerName($data)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE                         
            customer_name = :customer_name"), array(
            'customer_name' => $data->customer_name,
        ));
    }

    /**
     * To To search reservation by phone number
     * @return array $reservation reservation list
     */
    public function PhoneNo($phone)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE                                  
            phone = :phone"), array(
            'phone' => $phone->phone,
        ));
    }
    /**
     * To To search reservation by check_in time
     * @return array $reservation reservation list
     */
    public function CheckIn($checkin)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE                               
            check_in = :check_in"), array(
            'check_in' => $checkin->check_in,
        ));
    }

    /**
     * To To search reservation by check_out time
     * @return array $reservation reservation list
     */
    public function CheckOut($checkout)
    {
        return DB::select(DB::raw("SELECT * FROM reservations WHERE                     
            check_out = :check_out"), array(
            'check_out' => $checkout->check_out,
        ));
    }
}
