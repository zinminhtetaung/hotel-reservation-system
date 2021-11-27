<?php

namespace App\Services\OnlineBooking;

use App\Contracts\Dao\OnlineBooking\OnlineBookingDaoInterface;
use App\Contracts\Services\OnlineBooking\OnlineBookingServiceInterface;

/**
 * Service class for OnlineBookingService.
 */
class OnlineBookingService implements OnlineBookingServiceInterface
{
    /**
     * onlinebooking dao
     */
    private $OnlineBookingDao;
    /**
     * Class Constructor
     * @param OnlineBookingDaoInterface
     * @return
     */
    public function __construct(OnlineBookingDaoInterface $OnlineBookingDaoInterface)
    {
        $this->OnlineBookingDao = $OnlineBookingDaoInterface;
    }

    /**
     * To get OnlineBooking  list
     * @return OnlineBookingList
     */
    public function getOnlineBooking() {
        return $this->OnlineBookingDao->getOnlineBooking();
    }

    /**
     * To delete OnlineBooking
     * @param string $id OnlineBooking id
     * @return 
     */
    public function deleteOnlineBooking($id) {
        $this->OnlineBookingDao->deleteOnlineBooking($id);
    }

    /**
     * To remove OnlineBooking
     * @param sting $id
     * @return 
     */
    public function removeOnlineBooking($request) {
        $this->OnlineBookingDao->removeOnlineBooking($request);
    }

    /**
     * To get booking by id
     * @param string $id booking id
     * @return booking
     */
    public function getBookingById($id) {
        return $this->OnlineBookingDao->getBookingById($id);
    }

    /**
     * To add OnlineBooking
     * @param string $request
     * @return
     */
    public function storeBooking($request){
        return $this->OnlineBookingDao->storeBooking($request);
    } 
}