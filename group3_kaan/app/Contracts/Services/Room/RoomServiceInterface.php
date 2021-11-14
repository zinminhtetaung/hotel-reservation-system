<?php

namespace App\Contracts\Services\Room;

use Illuminate\Http\Request;

/**
 * Interface for room service
 */
interface RoomServiceInterface
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
    public function updateRoom(Request $request, $id);

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
    //  * To store profile picture under temp folder.
    //  * @param  array $validated Validated from request
    //  * @return array profile name and profile path
    //  */
    // public function storeProfileUnderTemp($validated);


    // /**
    //  * To update room that from api request
    //  * @param array $validated Validated values form request
    //  * @return Object created room object
    //  */
    // public function updateRoomViaAPI($validated);
}
