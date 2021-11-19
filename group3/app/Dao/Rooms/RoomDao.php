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

    /**
     * To Change room status
     * @param Request $request
     * @return 
     */
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

    /**
     * To save room 
     * @param array $request Validated values form request
     * @return Object created room object
     */
    public function saveRoom($request)
    {
        $room = new Room();
        $room->hotel_id = $request->hotel_id;  
        $room->room_number = $request->room_number;   
        $room->room_type = $request->room_type;
        $room->service = $request->service;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->image = $request->image->getClientOriginalName();
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
        $room = Room::find($id);
        return $room;
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomList()
    {
        $roomList = Room::orderBy('created_at', 'asc')->get();
        return $roomList;
    }

    /**
     * To Update Room with values from request
     * @param Request $request request including inputs
     * @return Object updated room object
     */
    public function updateRoomByID(Request $request, $id)
    {
        // $room = Room::find(Auth::room()->id);
        $room = Room::find($id);
        $room->hotel_id = $request->hotel_id;  
        $room->room_number = $request->room_number;   
        $room->room_type = $request->room_type;
        $room->service = $request->service;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->image = $request->image;
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
        Room::findOrFail($id)->delete();
    }

    /**
         * To upload csv file for student
         * @param array $validated Validated values
         * @param string $uploadedUserId uploaded user id
         * @return array $content Message and Status of CSV Uploaded or not
         */
        public function uploadRoomCSV($validated)
        {
            $path =  $validated['csv_file']->getRealPath();
            $csv_data = array_map('str_getcsv', file($path));
            // save student to Database accoding to csv row
            foreach ($csv_data as $index => $row) {
            if (count($row) >= 2) {
                try {
                $student = new Room();
                $student->name = $row[0];
                $student->roll_Number = $row[1];
                $student->class = $row[2];
                $student->dob = $row[3];
                $student->save();
                } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                //error handling for duplicated student
                if ($errorCode == '1062') {
                    $content = array(
                    'isUploaded' => false,
                    'message' => 'Row number (' . ($index + 1) . ') is duplicated roll-number.'
                    );
                    return $content;
                }
                }
            } else {
                // error handling for invalid row.
                $content = array(
                'isUploaded' => false,
                'message' => 'Row number (' . ($index + 1) . ') is invalid format.'
                );
                return $content;
            }
            }
            $content = array(
            'isUploaded' => true,
            'message' => 'Uploaded Successfully!'
            );
            return $content;
        }
}