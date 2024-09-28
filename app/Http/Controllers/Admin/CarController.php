<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

use function App\Helpers\deleteImage;
use function App\Helpers\uploadImage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function CarList() {
         
         $car = Car::all();
         return view('pages.frontend.carList', compact('car'));
     }
    public function index()
    {
        //
        $car = Car::all();
        return view('pages.backend.car.index', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $url = uploadImage($request->file('image'), 'car');

        // deleteImage($cms->login_page_image);
        //     $url = uploadImage($request->login_page_image, 'login');
        //     $cms->login_page_image = $url;

        $car = new Car();

        if ($request->hasFile('image')) {

            # Image upload
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // $url = $file->move(public_path('uploads/car'), $filename);
            $url = $file->move('uploads/car', $filename);
            // $file->move('uploads/car', $filename);

            $car->CarName = $request->CarName;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->CarType = $request->CarType;
            $car->daily_rent_price = $request->daily_rent_price;
            $car->status = $request->status;
            $car->CarImage = $url;
            $car->save();
        } else {

            $car->CarName = $request->CarName;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->CarType = $request->CarType;
            $car->daily_rent_price = $request->daily_rent_price;
            $car->status = $request->status;
            $car->CarImage = 'uploads/default.jpg';
            $car->save();
        }


        # redirect route

        return Redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = Car::find($id);
        return view('pages.backend.car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car): object|string
    {
        //
        // $car = Car::all();
        return view('pages.backend.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $car = Car::find($id);


        #with img update

        if ($request->hasFile('image')) {
            #img upload and old img delete
            if ($request->hasFile('image')) {
                if (File::exists($car->CarImage)) {
                    File::delete($car->CarImage);
                }

                # Image upload
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                // $url = $file->move(public_path('uploads/car'), $filename);
                $url = $file->move('uploads/car', $filename);
                // $file->move('uploads/car', $filename);
                // $url = uploadImage($request->file('image'), 'car');

                $car->CarName = $request->CarName;
                $car->brand = $request->brand;
                $car->model = $request->model;
                $car->year = $request->year;
                $car->CarType = $request->CarType;
                $car->daily_rent_price = $request->daily_rent_price;
                $car->status = $request->status;
                $car->CarImage = $url;
                $car->save();
            }
        } else {
            $car->CarName = $request->CarName;
            $car->brand = $request->brand;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->CarType = $request->CarType;
            $car->daily_rent_price = $request->daily_rent_price;
            $car->status = $request->status;
            $car->save();
        }

        return Redirect()->route('car.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {

        if (File::exists($car->CarImage)) {
            File::delete($car->CarImage);
        }
        $car->delete();
        return Redirect()->route('car.index');
    }
}
