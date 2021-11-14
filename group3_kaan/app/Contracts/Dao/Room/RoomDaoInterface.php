<?php

namespace App\Contracts\Dao\Room;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for room
 */
interface RoomDaoInterface
{
    /**
     * To save room that from api request
     * @param array $request Validated values form request
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

    // /**
    //  * To change room password
    //  * @param array $validated Validated values from request
    //  * @return Object $room room object
    //  */
    // public function changeRoomPassword($validated);

    /**
     * To delete room by id
     * @param string $id room id
     * @return string $message message for success or not
     */
    public function deleteRoomById($id);


    // /**
    //  * To update room that from api request
    //  * @param array $validated Validated values form request
    //  * @return Object created room object
    //  */
    // public function updateRoomViaAPI($validated);

    // /**
    //  * To change room password API
    //  * @param array $validated Validated values from request
    //  * @return Object $room room object
    //  */
    // public function changeRoomPasswordAPI($validated);
}
