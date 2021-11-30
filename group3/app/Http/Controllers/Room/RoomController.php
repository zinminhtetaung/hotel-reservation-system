<?php

namespace App\Http\Controllers\Room;

use App\Contracts\Services\Room\RoomServiceInterface;
use App\Contracts\Services\Hotel\HotelServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * This is Room Controller.
 * This will handle room CRUD processing.
 */
class RoomController extends Controller
{
    /**
     * room interface
     */
    private $roomServiceInterface;
    private $hotelServiceInterface;
    /**
     * Create a new controller instance.
     * @param RoomServiceInterface $roomServiceInterface
     * @param HotelServiceInterface $hotelServiceInterface
     * @return void
     */
    public function __construct(RoomServiceInterface $roomServiceInterface,
     HotelServiceInterface $hotelServiceInterface)
    {
        // $this->middleware('auth');
        $this->roomServiceInterface = $roomServiceInterface;
        $this->hotelServiceInterface = $hotelServiceInterface;
    }

    /**
     * To show Room list
     *
     * @return View Room list
     */
    public function searchRoom(Request $request)
    {
        $room = $this->roomServiceInterface->searchRoom($request);
        return view('showRoomId')->with('room', $room);
    }

    /**
     * To add Room
     * @param RoomRequest $request
     * @return View Room list
     */
    public function saveRoom(RoomRequest $request)
    {
        if ($request->hasFile('image')) {
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
        $room = $this->roomServiceInterface->saveRoom($request);
        return redirect()->route('showroomList');
    }

    /**
     * To update Room
     * @param RoomRequest $request
     * @return View Room 
     */
    public function update($id)
    {
        $room = $this->roomServiceInterface->getRoomById($id);
        $hotels = $this->hotelServiceInterface->getHotelList();
        return view('rooms/update')->with(['hotels'=>$hotels,'roomList'=>$room]);
    }

    /**
     * To update Room
     * @param RoomRequest $request
     * @return View Room list
     */
    public function updateRoom(RoomRequest $request, $id)
    {
        if ($request->hasFile('image')) {
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
         $this->roomServiceInterface->updateRoom($request, $id);
        return redirect()->route('showroomList');
    }

    /**
     * To show room list
     *
     * @return View Room list
     */
    public function showRoomList()
    {
        if (Auth::check()) {
            $roomList = $this->roomServiceInterface->getRoomList();
            $hotels = $this->hotelServiceInterface->getHotelList();
            return view('rooms.list')->with(['hotels'=>$hotels,'roomList'=>$roomList]);
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * To delete room by id
     * @param string $roomid room id
     * @return View room list
     */
    public function deleteRoomById($id)
    {
        $this->roomServiceInterface->deleteRoomById($id);
        return redirect()->route('showroomList');
    }

    /**
     * To show room list
     *
     * @return View Room user view
     */
    public function showRoomUserview()
    {
        $roomList = $this->roomServiceInterface->getRoomListUserView();
        return view('user.roomlist')->with('roomList', $roomList);
    }
}
