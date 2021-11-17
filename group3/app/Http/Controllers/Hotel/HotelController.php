<?php

    namespace App\Http\Controllers\Hotel;

    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use App\Http\Controllers\Controller;

    class HotelController extends Controller
    {
        /**
         * hotel interface
         */
        private $hotelInterface;
        /**
         * Create a new controller instance.
         * @param HotelServiceInterface $hotelServiceInterface
         * @return void
         */
        public function __construct(HotelServiceInterface $hotelServiceInterface)
        {
            $this->hotelInterface = $hotelServiceInterface;
        }
        /**
         * To show hotel list
         *
         * @return View Hotel list
         */
        public function showHotelList()
        {
            $hotelList = $this->hotelInterface->getHotelList();
            return view('hotels.list', compact('hotelList'));
        }

        /**
         * To delete hotel by id
         * @param string $hotelid hotel id
         * @return View hotel list
         */
        public function deleteHotelById($hotelId)
        {
            // $msg = $this->hotelInterface->deleteHotelById($hotelId);
            // return response($msg, 204);
            $this->hotelInterface->deleteHotelById($hotelId);
            return redirect()->route('hotelList');
        }


        /**
         * To download hotel csv file
         * @return File Download CSV file
         */
        public function downloadHotelCSV()
        {
            return $this->hotelInterface->downloadHotelCSV();
        }

        /**
         * To show user hotel list
         *
         * @return View Hotel list
         */
        public function showHotelListUser()
        {
            $hotelList = $this->hotelInterface->getHotelList();
            return view('user.hotelview', compact('hotelList'));
        }


    }
?>
