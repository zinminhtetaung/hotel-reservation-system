<?php

namespace App\Services\ConfirmMail;

use App\Contracts\Services\ConfirmMail\MailServiceInterface;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;

/**
 * Service class for OnlineBookingService.
 */
class ConfirmMailService implements MailServiceInterface
{
    /**
     * To send mail with online booking information
     * @return View 
     */
    public function sendMail($request) {
        Mail::to($request->email)->send(new ConfirmMail($request));
    }
}