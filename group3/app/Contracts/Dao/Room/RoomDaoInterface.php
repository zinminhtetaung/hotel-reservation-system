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


}