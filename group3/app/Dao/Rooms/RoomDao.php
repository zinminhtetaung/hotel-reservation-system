<?php

namespace App\Dao\Rooms;

use App\Models\Room;
use App\Contracts\Dao\Room\RoomDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return DB::select( DB::raw("SELECT * FROM rooms WHERE
                deleted_at IS NULL
                AND
                room_number = :room_number"), array(
                'room_number' => $request->room_number                                   
            ));
    }

    /**
     * To Change room status
     * @param Request $request
     * @return 
     */
    public function setStatus($request) {
        return DB::transaction(function () use ($request){
            $room = Room::FindorFail($request->room_id);
            $room->status = "Not Available";
            $room->save(); 
        });   
    }
    /**
     * To Change room status
     * @param string $room_number
     * @return 
     */
    public function unsetStatus($room_id) {
        return DB::transaction(function () use ($room_id){
            $room = Room::FindorFail($room_id);
            $room->status = "Available";
            $room->save();
        });    
    }

    /**
     * To save room 
     * @param $request Validated values form request
     * @return Object created room object
     */
    public function saveRoom($request)
    {
        return DB::transaction(function () use ($request){
            $room = new Room();
            $room->hotel_id = $request->hotel_id;  
            $room->room_number = $request->room_number;   
            $room->room_type = $request->room_type;
            $room->service = $request->service;
            $room->price = $request->price;
            $room->status = $request->status;
            $room->image = $request->image->getClientOriginalName();
            $room->user_id = Auth::user()->id;
            $room->save();
        });   
    }

    /**
     * To get room by id
     * @param string $id room id
     * @return Object $room room object
     */
    public function getRoomById($id)
    {
        return Room::find($id);
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomList()
    {
        return Room::orderBy('created_at', 'asc')->get();

    }

    /**
     * To Update Room with values from request
     * @param Request $request request including inputs
     * @return Object updated room object
     */
    public function updateRoomByID(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id){
            $room = Room::find($id);
            $room->hotel_id = $request->hotel_id;  
            $room->room_number = $request->room_number;   
            $room->room_type = $request->room_type;
            $room->service = $request->service;
            $room->price = $request->price;
            $room->status = $request->status;
            if ($request->image != NULL) {
                $room->image = $request->image->getClientOriginalName();
            } 
            $room->user_id = Auth::user()->id;
            $room->save();
        });
    }

    /**
     * To delete room by id
     * @param string $id room id
     * @return string $message message for success or not
     */
    public function deleteRoomById($id)
    {
        return DB::transaction(function () use ($id){
            $room = Room::find($id);
            if ($room) {
            $room->delete();
            return 'Deleted Successfully!';
            }
            return 'Room Not Found!';
        });
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomListUserView()
    {
        return DB::table('rooms')
            ->join('hotels', 'hotels.id', '=', 'rooms.hotel_id')
            ->select('rooms.*', 'hotels.hotel_name')
            ->whereNull('rooms.deleted_at')
            ->paginate(5);
    }
}