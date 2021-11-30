<?php

namespace App\Services\Room;

use App\Contracts\Dao\Room\RoomDaoInterface;
use App\Contracts\Services\Room\RoomServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for Room.
 */
class RoomService implements RoomServiceInterface
{
    /**
     * post dao
     */
    private $RoomDao;
    /**
     * Class Constructor
     * @param RoomDaoInterface
     * @return
     */
    public function __construct(RoomDaoInterface $RoomDao)
    {
        $this->RoomDao = $RoomDao;
    }


    public function searchRoom($request) {

        return $this->RoomDao->searchRoom($request);
    }
    /**
     * To change room status
     * @param string $id room id
     */
    public function setStatus($request) {
        return $this->RoomDao->setStatus($request);
    }

    /**
     * To change room status
     * @param string $id room id
     */
    public function unsetStatus($room_id) {
        return $this->RoomDao->unsetStatus($room_id);
    }

    /**
     * To get room by id
     * @param string $id room id
     * @return Object $room room object
     */
    public function getRoomById($id)
    {
        return $this->RoomDao->getRoomById($id);
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomList()
    {
        return $this->RoomDao->getRoomList();
    }


    /**
     * To Update Room with values from request
     * @param Request $request request including inputs
     * @return Object updated room object
     */
    public function updateRoom(Request $request, $id)
    {
        if($request->hasFile('image')){
            $des_path = 'public/images';
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($des_path, $img_name);
        }
        if ($request->hotel_name == "Lotte Hotel") {
            $request->hotel_id = "1";
        } elseif ($request->hotel_name == "Novotel Hotel") {
            $request->hotel_id = "2";
        } elseif ($request->hotel_name == "Sedona Hotel") {
            $request->hotel_id = "3";
        }
        return $this->RoomDao->updateRoomByID($request, $id);
    }
    
    /**
     * To delete room by id
     * @param string $id room id
     * @return string $message message for success or not
     */
    public function deleteRoomById($id)
    {
      return $this->RoomDao->deleteRoomById($id);
    }

    /**
     * To save room that from api request
     * @param array $validated Validated values form request
     * @return Object created room object
     */
    public function saveRoom($request)
    {
        if($request->hasFile('image')){
            $des_path = 'public/images';
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($des_path, $img_name);
        }
        if ($request->hotel_name == "Lotte Hotel") {
            $request->hotel_id = "1";
        } elseif ($request->hotel_name == "Novotel Hotel") {
            $request->hotel_id = "2";
        } elseif ($request->hotel_name == "Sedona Hotel") {
            $request->hotel_id = "3";
        }
      $room = $this->RoomDao->saveRoom($request);
      return $room;
    }

    /**
     * To get room list
     * @return array $roomList list of rooms
     */
    public function getRoomListUserView()
    {
        return $this->RoomDao->getRoomListUserView();
    }


}