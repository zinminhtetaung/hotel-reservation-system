<?php

namespace App\Http\Controllers\Reservation;

use App\Contracts\Services\ConfirmMail\MailServiceInterface;
use App\Contracts\Services\Reservation\ReservationServiceInterface;
use App\Contracts\Services\Room\RoomServiceInterface;
use App\Contracts\Services\OnlineBooking\OnlineBookingServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * This is Reservation controller.
 */
class ReservationController extends Controller
{
    /**
     * Reservation interface
     */
    private $reservationInterface;
    /**
     * Room interface
     */
    private $roomInterface;

    /**
     * OnlineBooking interface
     */
    private $onlineBookingInterface;

    /**
     * Mail interface
     */
    private $mailInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReservationServiceInterface $reservationServiceInterface,
     RoomServiceInterface $roomServiceInterface ,
     OnlineBookingServiceInterface $onlineBookingServiceInterface,
     MailServiceInterface $mailServiceInterface)
    {
        $this->reservationInterface = $reservationServiceInterface;
        $this->roomInterface = $roomServiceInterface;
        $this->onlineBookingInterface=$onlineBookingServiceInterface;
        $this->mailInterface=$mailServiceInterface;
    }
    
    /**
     * To show Reservation list
     *
     * @return View Reservation list
     */
    public function showReservationList()
    {
        if(Auth::check()){
<<<<<<< HEAD
            $ReservationList = $this->reservationInterface->getReservation();
            return view('reservations')->with(['reservations'=>$ReservationList]);
=======
            $ReservationList = $this->ReservationInterface->getReservation();
            return view('reservations')->with('reservations' ,$ReservationList);

>>>>>>> origin/develop
        } else{
            return redirect()->route('login');
        }
        
    }

    /**
     * To add Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function addReservation(ReservationRequest $request) {
        $this->ReservationInterface->addReservation($request);
        $this->RoomInterface->setStatus($request);
        return redirect()->route('reservationList');
    }

    /**
     * To add online booking into reservation
     * @param $booking
     * @return View Online Booking
     */
    public function addBooking(Request $request) {
        $this->MailInterface->sendMail($request);
        $this->ReservationInterface->addBooking($request);
        $this->OnlineBookingInterface->removeOnlineBooking($request);
        $this->OnlineBookingInterface->getOnlineBooking();
        return redirect()->route('onlineBookingList')->with('success','Email sent successfully!');
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation 
     */
    public function update($id) {
<<<<<<< HEAD
        $reservation = $this->reservationInterface->getReservationById($id);
        return view('update')->with(['reservation'=>$reservation]);
=======
        $reservation = $this->ReservationInterface->getReservationById($id);
        return view('update')->with('reservation',$reservation);
>>>>>>> origin/develop
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function updateReservation(Request $request,$id) {
        $this->ReservationInterface->updateReservation($request,$id);
        return redirect()->route('reservationList');
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservation($id,$room_id) {
        $this->ReservationInterface->deleteReservation($id);
        $this->RoomInterface->unsetStatus($room_id);
        return redirect()->route('reservationList');
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservationSearch($id,$room_id) {
        $this->ReservationInterface->deleteReservation($id);
        $this->RoomInterface->unsetStatus($room_id);
        return redirect('/search');
    }

    /**
     * To display search form
     * @return View Reservation
     */
    public function searchForm() {
        if(Auth::check()){
<<<<<<< HEAD
            $reservations = $this->reservationInterface->getReservation();
            return view('search')->with(['reservations'=>$reservations]);
=======
            $reservations = $this->ReservationInterface->getReservation();
            return view('search')->with('reservations',$reservations);
>>>>>>> origin/develop
        } else{
            return redirect()->route('login');
        }
        
    }

    /**
     * To search Reservation
     * @return View Reservation
     */
    public function searchReservationbyRID(Request $request) {
        $reservations = $this->ReservationInterface->searchReservationbyRID($request);
        return view('search')->with('reservations',$reservations);
    }

    /**
     * To To search reservation by customer name
     * @return view $reservations
     */
    public function searchByCustomer(Request $request) {
        $reservations = $this->ReservationInterface->searchByCustomer($request);
        return view('search')->with('reservations',$reservations);
    }

   /**
     * To To search reservation by phone number
     * @return view $reservations
     */
    public function searchByPhNo(Request $request) {
        $reservations = $this->ReservationInterface->searchByPhNo($request);
        return view('search')->with('reservations', $reservations) ;
    }

    /**
     * To To search reservation by number of guest
     * @return view $reservations
     */
    public function searchByGuestNo(Request $request) {
        $reservations = $this->ReservationInterface->searchByGuestNo($request);
        return view('search')->with('reservations', $reservations); 
    }

    /**
     * To To search reservation by check_in time
     * @return view $reservations
     */
    public function searchByCheckIn(Request $request) {
        $reservations = $this->ReservationInterface->searchByCheckIn($request);
        return view('search')->with('reservations', $reservations);
    }

    /**
     * To To search reservation by check_out time
     * @return view $reservations
     */
    public function searchByCheckOut(Request $request) {
        $reservations = $this->ReservationInterface->searchByCheckOut($request);
        return view('search')->with('reservations', $reservations);
    }

    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return view $reservations
     */
    public function searchByStartEnd(Request $start, Request $end) {
        $reservations = $this->ReservationInterface->searchByStartEnd($start, $end);
        return view('search')->with('reservations', $reservations);
    }
}