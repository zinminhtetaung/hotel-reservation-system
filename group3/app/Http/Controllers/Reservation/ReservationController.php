<?php

namespace App\Http\Controllers\Reservation;

use App\Contracts\Services\ConfirmMail\MailServiceInterface;
use App\Contracts\Services\Reservation\ReservationServiceInterface;
use App\Contracts\Services\Room\RoomServiceInterface;
use App\Contracts\Services\OnlineBooking\OnlineBookingServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

/**
 * This is Reservation controller.
 */
class ReservationController extends Controller
{
    /**
     * Reservation interface
     */
    private $ReservationInterface;
    /**
     * Room interface
     */
    private $RoomInterface;

    /**
     * OnlineBooking interface
     */
    private $OnlineBookingInterface;

    /**
     * Mail interface
     */
    private $MailInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ReservationServiceInterface $ReservationServiceInterface, RoomServiceInterface $RoomServiceInterface ,OnlineBookingServiceInterface $OnlineBookingServiceInterface,MailServiceInterface $MailServiceInterface)
    {
        $this->ReservationInterface = $ReservationServiceInterface;
        $this->RoomInterface = $RoomServiceInterface;
        $this->OnlineBookingInterface=$OnlineBookingServiceInterface;
        $this->MailInterface=$MailServiceInterface;
    }
    

    /**
     * To show Reservation list
     *
     * @return View Reservation list
     */
    public function showReservationList()
    {
        $ReservationList = $this->ReservationInterface->getReservation();
        return view('reservations', [
            'reservations' => $ReservationList
        ]);
    }
    /**
     * To add Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function addReservation(ReservationRequest $request) {
        $validated = $request->validated();
        $Reservation = $this->ReservationInterface->addReservation($request);
        $Room = $this->RoomInterface->setStatus($request);
        return redirect('/');
    }

    /**
     * To add online booking into reservation
     * @param $booking
     * @return View Online Booking
     */
    public function addBooking(Request $request) {
        $this->MailInterface->sendMail($request);
        $Reservation = $this->ReservationInterface->addBooking($request);
        $OnlineBooking = $this->OnlineBookingInterface->removeOnlineBooking($request);
        $OnlineBookingList = $this->OnlineBookingInterface->getOnlineBooking();
        return view('onlineBooking', [
            'bookings' => $OnlineBookingList
        ]);
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation 
     */
    public function update($id) {
        $reservation = $this->ReservationInterface->getReservationById($id);
        return view('update',[
            'reservation'=> $reservation
        ]);
    }

    /**
     * To update Reservation
     * @param ReservationRequest $request
     * @return View Reservation list
     */
    public function updateReservation(Request $request,$id) {
        $Reservation = $this->ReservationInterface->updateReservation($request,$id);
        return redirect('/');
    }

    /**
     * To delete Reservation
     * @param sting $id
     * @return View Reservation list
     */
    public function deleteReservation($id,$room_id) {
        $this->ReservationInterface->deleteReservation($id);
        $Room = $this->RoomInterface->unsetStatus($room_id);

        return redirect('/');
    }

    
}