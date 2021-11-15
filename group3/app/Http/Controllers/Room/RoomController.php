<?php

namespace App\Http\Controllers\Room;

use App\Contracts\Services\Room\RoomServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * This is Room controller.
 */
class RoomController extends Controller
{
    /**
     * Room interface
     */
    private $RoomServiceInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RoomServiceInterface $RoomServiceInterface)
    {
        $this->RoomServiceInterface = $RoomServiceInterface;
    }
    

    /**
     * To show Room list
     *
     * @return View Room list
     */
    public function searchRoom(Request $request) {
        $room = $this->RoomServiceInterface->searchRoom($request);
        return view('showRoomId', [
            'room' => $room[0]
        ]);
    }
}