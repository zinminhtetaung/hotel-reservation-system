<?php

    namespace App\Dao\Hotel;

    use App\Models\Hotels;
    use App\Contracts\Dao\Hotel\HotelDaoInterface;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    /**
     * Data accessing object for hotel
     */
    class HotelDao implements HotelDaoInterface
    {
        /**
         * To save hotel
         * @param Request $request request with inputs
         * @return Object $hotel saved hotel
         */

        public function saveHotel(Request $request)
        {
            return DB::transaction(function () use ($request){
                $hotel = new Hotels();
                $hotel->hotel_name = $request['hotel_name'];
                $hotel->description = $request['description'];
                $hotel->phone = $request['phone'];
                $hotel->location = $request['location'];
                $hotel->save();
            });
        }

        /**
         * To get hotel list
         * @return array $hotelList Hotel list
         */
        public function getHotelList()
        {
            $hotelList = Hotels::all();
            return $hotelList;
        }

        /**
         * To delete hotel by id
         * @param string $id hotel id
         * @param string $deletedUserId deleted user id
         * @return string $message message success or not
         */
        public function deleteHotelById($id)
        {
            return DB::transaction(function () use ($id){
                $hotel = Hotels::find($id);
                if ($hotel) {
                $hotel->delete();
                return 'Deleted Successfully!';
                }
                return 'Hotel Not Found!';
            });
        }

    }