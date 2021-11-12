<?php

namespace App\Services\Room;

use App\Contracts\Dao\Room\RoomDaoInterface;
use App\Contracts\Services\Room\RoomServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
}