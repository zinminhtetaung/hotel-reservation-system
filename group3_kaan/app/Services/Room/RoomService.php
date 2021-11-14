<?php

namespace App\Services\Room;

use App\Contracts\Dao\Room\RoomDaoInterface;
use App\Contracts\Services\Room\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Room Service class
 */
class RoomService implements RoomServiceInterface
{
    /**
     * room Dao
     */
    private $roomDao;

    /**
     * Class Constructor
     * @param RoomDaoInterface
     * @return
     */
    public function __construct(RoomDaoInterface $roomDao)
    {
        $this->roomDao = $roomDao;
    }

    /**
     * To get room by id
     * @param string $id room id
     * @return Object $room room object
     */
    public function getRoomById($id)
    {
        return $this->roomDao->getRoomById($id);
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomList()
    {
        return $this->roomDao->getRoomList();
    }


    /**
     * To Update Room with values from request
     * @param Request $request request including inputs
     * @return Object updated room object
     */
    public function updateRoom(Request $request, $id)
    {
        return $this->roomDao->updateRoomByID($request, $id);
    }
    
    /**
     * To delete room by id
     * @param string $id room id
     * @return string $message message for success or not
     */
    public function deleteRoomById($id)
    {
      return $this->roomDao->deleteRoomById($id);
    }

    /**
     * To save room that from api request
     * @param array $validated Validated values form request
     * @return Object created room object
     */
    public function saveRoom($validated)
    {
      $room = $this->roomDao->saveRoom($validated);
      return $room;
    }

}
