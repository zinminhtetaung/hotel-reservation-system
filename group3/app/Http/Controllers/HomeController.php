<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Room\RoomServiceInterface;

class HomeController extends Controller
{
    /**
     * room interface
     */
    private $roomServiceInterface;
    /**
     * Create a new controller instance.
     * @param RoomServiceInterface $roomServiceInterface
     * @param HotelServiceInterface $hotelServiceInterface
     * @return void
     */
    public function __construct(RoomServiceInterface $roomServiceInterface)
    {
        // $this->middleware('auth');
        $this->roomServiceInterface = $roomServiceInterface;
    }
    /*
     *get room list 
     */
    public function index()
    {
        $roomList = $this->roomServiceInterface->getRoomList();
        return view('user.home')->with('roomList', $roomList);
    }
}
