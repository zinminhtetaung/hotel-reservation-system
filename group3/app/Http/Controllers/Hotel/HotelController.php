<?php

    namespace App\Http\Controllers\Hotel;

    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;

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
            if(Auth::check()){
                $hotelList = $this->hotelInterface->getHotelList();
                return view('hotels.list')->with('hotelList',$hotelList);
            } else{
                return redirect()->route('login');
            }
        }

        /**
         * To delete hotel by id
         * @param string $hotelid hotel id
         * @return View hotel list
         */
        public function deleteHotelById($hotelId)
        {
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
            $hotel = $this->hotelInterface->getHotelList();
            return view('user.hotellist')->with('hotelList',$hotel);
        }
    }
