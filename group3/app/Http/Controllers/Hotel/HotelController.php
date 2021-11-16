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
    }
?>
