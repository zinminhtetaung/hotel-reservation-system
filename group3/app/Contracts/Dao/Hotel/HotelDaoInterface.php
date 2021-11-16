<?php

    namespace App\Contracts\Dao\Hotel;

    use Illuminate\Http\Request;

    /**
     * Interface for Data Accessing Object of Hotel
     */
    interface HotelDaoInterface
    {
        /**
             * To get hotel list
             * @return array $hotelList Hotel list
             */
            public function getHotelList();
    }
?>