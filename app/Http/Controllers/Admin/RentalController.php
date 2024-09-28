<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rental = Rental::all();
        return view('pages.backend.rental.index',compact('rental'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.backend.rental.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rental = new Rental();
        // $rental->name = $request->name;
        // $rental->email = $request->email;
        // $rental->phone = $request->phone;

        $rental->user_id = $request->input('user_id');
        $rental->car_id = $request->input('car_id');
        $rental->start_date = $request->input('start_date');
        $rental->end_date = $request->input('end_date');
        $rental->total_cost = $request->input('total_cost');
        $rental->status = $request->input('status');
       

        // $rental->user_id = '1';
        // $rental->car_id = 1;
        // $rental->start_date = date('Y-m-d');
        // $rental->end_date = date('Y-m-d');
        // $rental->total_cost = 250;
        // $rental->status = 'pending';

        $rental->save();
        // return redirect()->route('rental.index');
        return response()->json('success',200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
