<?php

namespace App\Contracts\Services\ConfirmMail;
use Illuminate\Http\Request;

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