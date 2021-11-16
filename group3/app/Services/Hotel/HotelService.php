<?php

    namespace App\Services\Hotel;

    use App\Contracts\Dao\Hotel\HotelDaoInterface;
    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    /**
     * Service class for service.
     */
    class HotelService implements HotelServiceInterface
    {
        /**
         * service dao
         */
        private $HotelDao;
        /**
         * Class Constructor
         * @param HotelDaoInterface
         * @return
         */
        public function __construct(HotelDaoInterface $HotelDao)
        {
            $this->HotelDao = $HotelDao;
        }

        // /**
        //  * To save user that from api request
        //  * @param Request $request request with inputs
        //  * @return Object created user object
        //  */
        // public function saveHotel(Request $request)
        // {
        //     return $this->HotelDao->saveHotel($request);
        // }

        /**
         * To get hotel list
         * @return array $hotelList list of hotels
         */
        public function getHotelList()
        {
            return $this->HotelDao->getHotelList();
        }
    }
    
?>
