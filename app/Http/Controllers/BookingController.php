<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{


    public function index()
    {
        $cars = Car::all();
        return view('book_car', compact('cars'));
    }


    function book(Request $request)
    { {


            $CarID = $request->car_id;
            $car = Car::findOrFail($CarID);

            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);

            $days = $start_date->diffInDays($end_date);
            $totalPrice = $days * $car->daily_rent_price;

            // Rental::create([
            //     'user_id' => auth()->id(),
            //     'car_id' => $car->id,
            //     'start_date' => $request->start_date,
            //     'end_date' => $request->end_date,
            //     'total_price' => $totalPrice,
            // ]);

            //if check condition
            if ($car->status == 'Not Available') {
                // return back()->with('fail','Car Not Available');
                return abort(404, 'Car Not Available');
            } else {

                Rental::create([
                    'user_id' => 1,
                    'car_id' => $CarID,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'total_cost' => $totalPrice,
                    // 'status' => 'Ongoing',
                ]);
            }

            // car Status change

            $car->update([
                'status' => 'Not Available',
            ]);

           
            return redirect()->back()->with('message', 'Car booked successfully!');
        }
    }
    //
}
