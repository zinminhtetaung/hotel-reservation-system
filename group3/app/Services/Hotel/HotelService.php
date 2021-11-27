<?php

    namespace App\Services\Hotel;

    use App\Contracts\Dao\Hotel\HotelDaoInterface;
    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use Illuminate\Http\Request;

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

        /**
         * To save user that from api request
         * @param Request $request request with inputs
         * @return Object created user object
         */
        public function saveHotel(Request $request)
        {
            return $this->HotelDao->saveHotel($request);
        }

        /**
         * To get hotel list
         * @return array $hotelList list of hotels
         */
        public function getHotelList()
        {
            return $this->HotelDao->getHotelList();
        }

        /**
         * To delete hotel by id
         * @param string $id hotel id
         * @param string $deletedHotelId deleted hotel id
         * @return string $message message for success or not
         */
        public function deleteHotelById($id)
        {
            return $this->HotelDao->deleteHotelById($id);
        }

        /**
         * To download hotel csv file
         * @return File Download CSV file
         */
        public function downloadHotelCSV()
        {
            $hotelList = $this->HotelDao->getHotelList();
            $filename = "hotel.csv";
            //write csv file
            $handle = fopen($filename, 'w+');
            fputcsv($handle, array('hotel_name', 'location', 'description', 'phone'));

            foreach ($hotelList as $row) {
            fputcsv($handle, array(
                $row->hotel_name, $row->location, $row->description,$row->phone,
            ));
            }

            fclose($handle);

            $headers = array(
            'Content-Type' => 'text/csv',
            );

            return response()
            ->download($filename, $filename, $headers)
            ->deleteFileAfterSend();
        }
    }
    
?>
