<?php

namespace App\Contracts\Services\ConfirmMail;

/**
 * Interface for Mail service
 */
interface MailServiceInterface
{
    /**
     * To get OnlineBooking list
     * @return OnlineBookingList
     */
    public function sendMail($request);

}