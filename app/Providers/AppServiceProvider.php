<?php

namespace App\Providers;

use App\Models\Car;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Total Car
        $totalCar = Car::count();
        view()->share('totalCar', $totalCar);
        
        //Total available Car
        $totalAvailableCar = Car::where('status', '=', 'Available')->count();
        view()->share('totalAvailableCar', $totalAvailableCar);

        //Total number of rentals
        $totalRental = Car::where('status', '=', 'Rented')->count();
        view()->share('totalRental', $totalRental);

        //Total earnings from rentals
        $totalEarning = Car::where('status', '=', 'Rented')->sum('daily_rent_price');
        view()->share('totalEarning', $totalEarning);


    }
}
