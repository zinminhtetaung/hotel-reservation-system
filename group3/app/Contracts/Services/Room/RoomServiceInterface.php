<?php

namespace App\Contracts\Services\Room;
use Illuminate\Http\Request;

/**
 * Interface for Room service
 */
interface RoomServiceInterface
{
    /**
     * To return Room data
     * @param string $id Room id
     * @return Object Room object
     */
    public function searchRoom($request);
    /**
     * To change status
     * @param string $request
     */
    public function setStatus($request);


    /**
     * To change status
     * @param string $request
     */
    public function unsetStatus($room_id);

}