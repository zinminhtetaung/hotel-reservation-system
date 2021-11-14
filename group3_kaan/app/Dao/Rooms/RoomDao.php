<?php

namespace App\Dao\Rooms;

use App\Contracts\Dao\Room\RoomDaoInterface;
use App\Models\Rooms;
use App\Models\Hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Data Access Object for Room
 */
class RoomDao implements RoomDaoInterface
{
    /**
     * To save room 
     * @param array $request Validated values form request
     * @return Object created room object
     */
    public function saveRoom($request)
    {
        // $image = time() . '.' . $request['image']->extension();
        $room = new Rooms();
        $room->hotel_id = $request->hotel_id;  
        $room->room_number = $request->room_number;   
        $room->room_type = $request->room_type;
        $room->service = $request->service;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->image = $request->image->getClientOriginalName();
        // $room->hotel_id = $request['hotel_id']-> id;  
        // $room->room_number = $request['room_number'];   
        // $room->room_type = $request['room_type'];
        // $room->service = $request['service'];
        // $room->price = $request['price'];
        // $room->status = $request['status'];
        // $room->image = $request['image']->getClientOriginalName();
        // $room->user_id = Auth::user()->id ?? 1;
        $room->user_id = 1;
        $room->save();
        return $room;
    }

    /**
     * To get room by id
     * @param string $id room id
     * @return Object $room room object
     */
    public function getRoomById($id)
    {
        $room = Rooms::find($id);
        return $room;
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomList()
    {
        $roomList = Rooms::orderBy('created_at', 'asc')->get();
        return $roomList;
    }

    /**
     * To Update Room with values from request
     * @param Request $request request including inputs
     * @return Object updated room object
     */
    public function updateRoomByID(Request $request, $id)
    {
        // $room = Rooms::find(Auth::room()->id);
        $room = Rooms::find($id);
        $room->hotel_id = $request->hotel_id;  
        $room->room_number = $request->room_number;   
        $room->room_type = $request->room_type;
        $room->service = $request->service;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->image = $request->image;
        // $room->hotel_id = $request['hotel_id'];
        // $room->room_number = $request['room_number'];   
        // $room->room_type = $request['room_type'];
        // $room->service = $request['service'];
        // $room->price = $request['price'];
        // $room->status = $request['status'];
        // $room->image = $request['image'];
        // $room->user_id = Auth::user()->id ?? 1;
        $room->user_id = 1;
        $room->save();
        return $room;
    }

    /**
     * To delete room by id
     * @param string $id room id
     * @return string $message message for success or not
     */
    public function deleteRoomById($id)
    {
        Rooms::findOrFail($id)->delete();
    }
    // /**
    //  * To update room that from api request
    //  * @param array $validated Validated values form request
    //  * @return Object created room object
    //  */
    // public function updateRoomViaAPI($validated)
    // {
    //     $room = Rooms::find(Auth::guard('api')->user()->id);
    //     $room->name = $validated['name'];
    //     $room->email = $validated['email'];
    //     if (array_key_exists("profile", $validated)) {
    //         $profileName = time() . '.' . $validated['profile']->extension();
    //         $room->profile = $profileName;
    //     }
    //     $room->type = $validated['type'];
    //     $room->phone = $validated['phone'];
    //     $room->dob = $validated['dob'];
    //     $room->address = $validated['address'];
    //     $room->updated_room_id = Auth::guard('api')->user()->id;
    //     $room->save();
    //     return $room;
    // }

    // /**
    //  * To change room password API
    //  * @param array $validated Validated values from request
    //  * @return Object $room room object
    //  */
    // public function changeRoomPasswordAPI($validated)
    // {
    //     $room = Rooms::find(Auth::guard('api')->room()->id)
    //         ->update([
    //             'password' => Hash::make($validated['new_password']),
    //             'updated_room_id' => Auth::guard('api')->room()->id
    //         ]);
    //     return $room;
    // }
}
