<?php

namespace App\Contracts\Dao\Room;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Room
 */
interface RoomDaoInterface
{
    public function searchRoom($request);

    public function setStatus($request);

    public function unsetStatus($room_id);

    /**
     * To save room that from api request
     * @param $request Validated values form request
     * @return Object created room object
     */
    public function saveRoom($request);
    
    /**
     * To get room by id
     * @param string $id room id
     * @return Object $room room object
     */
    public function getRoomById($id);

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomList();

    /**
     * To Update Room with values from request
     * @param Request $request request including inputs
     * @return Object updated room object
     */
    public function updateRoomByID(Request $request, $id);

    /**
     * To delete room by id
     * @param string $id room id
     * @return string $message message for success or not
     */
    public function deleteRoomById($id);

     /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomListUserView();
}