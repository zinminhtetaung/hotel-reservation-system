<?php

    namespace App\Contracts\Dao\Hotel;

    use Illuminate\Http\Request;

    /**
     * Interface for Data Accessing Object of Hotel
     */
    interface HotelDaoInterface
    {

        /**
         * To save hotel
         * @param Request $request request with inputs
         * @return Object $hotel saved hotel
         */
        public function saveHotel(Request $request);

        /**
         * To get hotel list
         * @return array $hotelList Hotel list
         */
        public function getHotelList();

        /**
         * To delete hotel by id
         * @param string $id hotel id
         * @param string $deletedUserId deleted user id
         * @return string $message message success or not
         */
        public function deleteHotelById($id);
    }
?>