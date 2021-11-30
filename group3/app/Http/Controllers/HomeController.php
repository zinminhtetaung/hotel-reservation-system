<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Reservation\ReservationServiceInterface;

class HomeController extends Controller
{
    /**
     * room interface
     */
    private $reservationInterface;
    /**
     * Create a new controller instance.
     * @param ReservationServiceInterface $reservationServiceInterface
     * @return void
     */
    public function __construct(ReservationServiceInterface $reservationServiceInterface)
    {
        // $this->middleware('auth');

        $this->reservationInterface = $reservationServiceInterface;
    }
    /*
     *get room list 
     */
    public function index()
    {
        $topRoomList = $this->reservationInterface->getTopRoomList();
        return view('user.home')->with('topRoomList', $topRoomList);
    }
}
