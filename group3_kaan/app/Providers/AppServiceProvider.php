<?php

    namespace App\Providers;

    use App\Contracts\Dao\Hotel\HotelDaoInterface;
    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use App\Dao\Hotel\HotelDao;
    use App\Services\Hotel\HotelService;
    use App\Contracts\Dao\Room\RoomDaoInterface;
    use App\Contracts\Services\Room\RoomServiceInterface;
    use App\Dao\Rooms\RoomDao;
    use App\Services\Room\RoomService;
    
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
            //Dao Registration
            $this->app->bind(HotelDaoInterface::class, HotelDao::class);
            $this->app->bind(RoomDaoInterface::class, RoomDao::class);

            //Service Registration
            $this->app->bind(HotelServiceInterface::class, HotelService::class);
            $this->app->bind(RoomServiceInterface::class, RoomService::class);
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
?>