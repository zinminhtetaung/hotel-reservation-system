<?php

    namespace App\Contracts\Services\Hotel;

    use Illuminate\Http\Request;

    /**
     * Interface for hotel service
     */
    interface HotelServiceInterface
    {
        /**
         * To save user that from api request
         * @param Request $request request with inputs
         * @return Object created user object
         */
        public function saveHotel(Request $request);

        /**
         * To get hotel list
         * @return array $hotelList list of hotels
         */
        public function getHotelList();
        /**
         * To delete hotel by id
         * @param string $id hotel id
         * @param string $deletedHotelId deleted hotel id
         * @return string $message message for success or not
         */
        public function deleteHotelById($id);

        /**
         * To download hotel csv file
         * @return File Download CSV file
         */
        public function downloadHotelCSV();
    }
?>
