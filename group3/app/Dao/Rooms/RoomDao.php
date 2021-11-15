<?php

namespace App\Dao\Rooms;

use App\Models\Room;
use App\Contracts\Dao\Room\RoomDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for room
 */
class RoomDao implements RoomDaoInterface
{
     /**
     * To To search room datas
     * @param object $request Validated values from request
     * @return room
     */
    public function searchRoom($request) {

        $room = DB::select( DB::raw("SELECT * FROM rooms WHERE 
                                    room_number = :room_number" ), array(
                                    'room_number' => $request->room_number
                ));
        return $room;
    }


    public function setStatus($request) {
        $room = Room::FindorFail($request->room_id);
        $room->status = "not available";
        $room->save();    
    }
    /**
     * To Change room status
     * @param string $room_number
     * @return 
     */
    public function unsetStatus($room_id) {
        $room = Room::FindorFail($room_id);
        $room->status = "available";
        $room->save();    
    }
}