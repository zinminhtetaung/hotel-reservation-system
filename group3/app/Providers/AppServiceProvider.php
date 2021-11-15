<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Reservation\ReservationDaoInterface', 'App\Dao\Reservations\ReservationDao');
        $this->app->bind('App\Contracts\Dao\Room\RoomDaoInterface', 'App\Dao\Rooms\RoomDao');
        $this->app->bind('App\Contracts\Dao\OnlineBooking\OnlineBookingDaoInterface', 'App\Dao\OnlineBookings\OnlineBookingDao');
        // Business logic registration
        $this->app->bind('App\Contracts\Services\Reservation\ReservationServiceInterface', 'App\Services\Reservation\ReservationService');
        $this->app->bind('App\Contracts\Services\Room\RoomServiceInterface', 'App\Services\Room\RoomService');
        $this->app->bind('App\Contracts\Services\OnlineBooking\OnlineBookingServiceInterface', 'App\Services\OnlineBooking\OnlineBookingService');
        $this->app->bind('App\Contracts\Services\ConfirmMail\MailServiceInterface', 'App\Services\ConfirmMail\ConfirmMailService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
