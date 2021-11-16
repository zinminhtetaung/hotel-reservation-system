<?php

    namespace App\Providers;

    use App\Contracts\Dao\Hotel\HotelDaoInterface;
    use App\Contracts\Services\Hotel\HotelServiceInterface;
    use App\Contracts\Dao\User\UserDaoInterface;
    use App\Contracts\Services\User\UserServiceInterface;
    use App\Dao\Hotel\HotelDao;
    use App\Dao\User\UserDao;
    use App\Services\Hotel\HotelService;
    use App\Services\User\UserService;
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

            $this->app->bind(UserDaoInterface::class, UserDao::class);

            //Service Registration
            $this->app->bind(HotelServiceInterface::class, HotelService::class);

            $this->app->bind(UserServiceInterface::class, UserService::class);
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