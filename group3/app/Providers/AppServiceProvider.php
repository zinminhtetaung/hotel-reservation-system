<?php

    namespace App\Providers;

    use App\Contracts\Dao\Hotel\HotelDaoInterface;
    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use App\Dao\Hotel\HotelDao;
    use App\Services\Hotel\HotelService;
    
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

            //Service Registration
            $this->app->bind(HotelServiceInterface::class, HotelService::class);
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