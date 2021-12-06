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
            $reservationList = $this->reservationInterface->getReservation();
            return view('reservations')->with('reservations' ,$reservationList);

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
        $this->reservationInterface->addReservation($request);
        $this->roomInterface->setStatus($request);
        return redirect()->route('reservationList');
    }

    /**
     * To add online booking into reservation
     * @param $booking
     * @return View Online Booking
     */
    public function addBooking(Request $request) {
        $this->mailInterface->sendMail($request);
        $this->reservationInterface->addBooking($request);
        $this->onlineBookingInterface->removeOnlineBooking($request);
        $this->onlineBookingInterface->getOnlineBooking();
        return redirect()->route('onlineBookingList')->with('success','Email sent successfully!');
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation 
     */
    public function update($id) {
        $reservation = $this->reservationInterface->getReservationById($id);
        return view('update')->with('reservation',$reservation);
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function updateReservation(Request $request,$id) {
        $this->reservationInterface->updateReservation($request,$id);
        return redirect()->route('reservationList');
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservation($id,$room_id) {
        $this->reservationInterface->deleteReservation($id);
        $this->roomInterface->unsetStatus($room_id);
        return redirect()->route('reservationList');
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservationSearch($id,$room_id) {
        $this->reservationInterface->deleteReservation($id);
        $this->roomInterface->unsetStatus($room_id);
        return redirect('/search');
    }

    /**
     * To display search form
     * @return View Reservation
     */
    public function searchForm() {
        if(Auth::check()){
            $reservations = $this->reservationInterface->getReservation();
            return view('search')->with('reservations',$reservations);
        } else{
            return redirect()->route('login');
        }
    }

    /**
     * To search Reservation
     * @return View Reservation
     */
    public function searchReservationbyRID(Request $request) {
        $reservations = $this->reservationInterface->searchReservationbyRID($request);
        return view('search')->with('reservations',$reservations);
    }

    /**
     * To To search reservation by customer name
     * @return view $reservations
     */
    public function searchByCustomer(Request $request) {
        $reservations = $this->reservationInterface->searchByCustomer($request);
        return view('search')->with('reservations',$reservations);
    }

   /**
     * To To search reservation by phone number
     * @return view $reservations
     */
    public function searchByPhNo(Request $request) {
        $reservations = $this->reservationInterface->searchByPhNo($request);
        return view('search')->with('reservations', $reservations) ;
    }

    /**
     * To To search reservation by number of guest
     * @return view $reservations
     */
    public function searchByGuestNo(Request $request) {
        $reservations = $this->reservationInterface->searchByGuestNo($request);
        return view('search')->with('reservations', $reservations); 
    }

    /**
     * To To search reservation by check_in time
     * @return view $reservations
     */
    public function searchByCheckIn(Request $request) {
        $reservations = $this->reservationInterface->searchByCheckIn($request);
        return view('search')->with('reservations', $reservations);
    }

    /**
     * To To search reservation by check_out time
     * @return view $reservations
     */
    public function searchByCheckOut(Request $request) {
        $reservations = $this->reservationInterface->searchByCheckOut($request);
        return view('search')->with('reservations', $reservations);
    }

    /**
     * To search reservation by created time
     * @param date $start Input from user
     * @param date $end Input from user
     * @return view $reservations
     */
    public function searchByStartEnd(Request $start, Request $end) {
        $reservations = $this->reservationInterface->searchByStartEnd($start, $end);
        return view('search')->with('reservations', $reservations);
    }

    /**
     * To display search form
     * @return View Reservation
     */
    public function searchCustomerInfo() {
        if(Auth::check()){
            $custInfo = $this->reservationInterface->getCustomerInfo();
            return view('customers.list')->with('custInfo',$custInfo);
        } else{
            return redirect()->route('login');
        }
    }
    
    /**
     * To search from CustomerName
     * @param string $data Input from user
     * @return array $custInfo Customer info from reservation
     */
    public function customerName(Request $data) {
        $custInfo = $this->reservationInterface->customerName($data);
        return view('customers.list')->with('custInfo', $custInfo); 
    }
    /**
     * To To search reservation by phone number
     * @return array $reservation reservation list
     */
    public function PhoneNo(Request $phone) {
        $custInfo = $this->reservationInterface->PhoneNo($phone);
        return view('customers.list')->with('custInfo', $custInfo); 
    }
    /**
     * To To search reservation by check_in time
     * @return array $reservation reservation list
     */
    public function CheckIn(Request $checkin) {
        $custInfo = $this->reservationInterface->CheckIn($checkin);
        return view('customers.list')->with('custInfo', $custInfo); 
    }
    /**
     * To To search reservation by check_out time
     * @return array $reservation reservation list
     */
    public function CheckOut(Request $checkout) {
        $custInfo = $this->reservationInterface->CheckOut($checkout);
        return view('customers.list')->with('custInfo', $custInfo); 
    }
}