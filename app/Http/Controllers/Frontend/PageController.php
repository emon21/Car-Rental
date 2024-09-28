<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function Page()
    {
        return view('pages.frontend.home');
    }

    public function About()
    {
        return view('pages.frontend.about');
    }

    public function carFilter(Request $request)
    {

        return view('pages.frontend.carfilter');
    }

    public function filter(Request $request)
    {


        // $carPrice = $car->daily_rent_price;
        $car_type = $request->car_type;
        $car = Car::where('CarType', '=', $car_type)->get();
        // $price = $car->daily_rent_price;


        // return $car;


        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);

        $days = $start_date->diffInDays($end_date);

        // $price = 250;

        $totalPrice = 0;



        return view('pages.frontend.filterCar', compact('car', 'totalPrice', 'days'));
    }
   

    function CarBooking(Request $request, $CarID)
    {

        // return $request->('total');

        // return $request->input('total');

        $car = Car::where('id', '=', $CarID)->first();
        // return $price;

        $price = $car->daily_rent_price;

         $start_date = $request->start_date;
         $end_date = $request->end_date;


        $days = $request->end_date->diffInDays($request->start_date);

        // $totalPrice = $days * $car->price_per_day;


        $totalPrice = $days * $price;



        // $total = $request->total;
        // $car->update('staatus' 'not avavlea');

        //if check condition
        if ($car->status == 'Not Available') {
            // return back()->with('fail','Car Not Available');
            return abort(404, 'Car Not Available');
        } else {
        }
        Rental::create([
            'user_id' => 1,
            'car_id' => $CarID,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total_cost' => $totalPrice,
            // 'status' => 'Ongoing',
        ]);

        // car Status change

        $car->update([
            'status' => 'Not Available',
        ]);

        return redirect()->route('car')->with('success', 'Car Booked Successfully');
    }
    public function AllCar()
    {
        $car = Car::all();
        return view('pages.frontend.car', compact('car'));
    }
    public function SingleCar(Car $car)
    {
        // return $car;
        $Allcar = Car::all();
        return view('pages.frontend.singleCar', compact('car', 'Allcar'));
    }

    public function Rental()
    {
        return view('pages.frontend.rental');
    }
    public function Contact()
    {
        return view('pages.frontend.contact');
    }
    public function Login()
    {
        return view('pages.frontend.login');
    }
    public function Signup()
    {
        return view('pages.frontend.signup');
    }
}
