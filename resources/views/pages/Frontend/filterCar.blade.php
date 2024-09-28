@extends('layouts.frontend-page')
@section('title', 'Filter Car')
@section('content')

    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url({{ asset('frontend') }}/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="d-flex no-gutters slider-text js-fullheight align-items-end justify-content-start">
                {{-- <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Car <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Car Details</h1>
                </div> --}}
                <div class="col-md-12 mb-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <form action="{{ route('filter') }}" method="POST">
                                @csrf
                                <h2>Make your trip</h2>
                                <div class="d-flex">
                                    <div class="form-group mr-2 col-sm-4">
                                        <label class="label text-light">Car Type</label>
                                        <select name="car_type" class="form-control">
                                            <option> >> Select Car Type << </option>
                                            <option value="suv">SUV</option>
                                            <option value="sedan">Sedan</option>
                                        </select>
                                    </div>

                                    <div class="form-group mr-2 col-sm-4">
                                        <label for="" class="label text-light">Start Date</label>
                                        <input type="text" class="form-control" name="start_date" id="book_pick_date"
                                            placeholder="Start Date...">
                                    </div>

                                    <div class="form-group ml-2 col-sm-4">
                                        <label for="" class="label text-light">End Date</label>
                                        <input type="text" class="form-control" name="end_date" id="book_off_date"
                                            placeholder="End Date...">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Search a Car" class="btn btn-secondary py-3 px-4">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-cart ftco-no-pt bg-light">
        <div class="container">
            <div class="d-flex flex-wrap">
                @if (count($car) > 0)

                    @foreach ($car as $item)
                        <div class="col-md-4 mt-4">
                            <form action="{{ route('car.booking', $item->id) }}" method="POST">
                                @csrf
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($item->CarImage) }}" style="height:200px"
                                        alt="">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $item->CarName }}</h4>

                                        <hr>
                                        <div class="">

                                            <div class="card-text">
                                                <span class="float-start">Brand</span>
                                                <span class=" float-right">{{ $item->brand }}</span>
                                            </div>
                                            <div>
                                                <span class="float-start">Model</span>
                                                <span class=" float-right">{{ $item->model }}</span>
                                            </div>
                                            <div>
                                                <span class="float-start">Year</span>
                                                <span class=" float-right">{{ $item->year }}</span>
                                            </div>
                                            <div>
                                                <span class="float-start">CarType</span>
                                                <span class=" float-right">{{ $item->CarType }}</span>
                                            </div>
                                            <div>
                                                <span class="float-start">Daily Rent Price</span>
                                                <span class=" float-right">TK {{ $item->daily_rent_price }} -/</span>
                                            </div>
                                            <div>
                                                <span class="float-start">status</span>

                                                <span class=" float-right">
                                                    @if ($item->status == 'Available')
                                                        <span class="badge text-success text-lg"> Available</span>
                                                    @else
                                                        <span class="badge text-danger "> Not Available</span>
                                                    @endif

                                                    {{-- {{ $item->status == 'Available' ? 'Available' : 'Not Available' }} --}}
                                                </span>
                                            </div>


                                        </div>

                                    </div>
                                    <hr>

                                    @php

                                        $price = $item->daily_rent_price;
                                        $totalPrice = $days * $price;

                                    @endphp

                                    <div class="card-text px-3">
                                        <div>
                                            <span class="float-start">Price/day</span>
                                            <span class=" float-right">{{ $item->daily_rent_price }}</span>
                                        </div>

                                        <div>
                                            <span class="float-start">Day Of Rent</span>
                                            <span class=" float-right">{{ $days }}</span>
                                        </div>

                                        <div>
                                            <span class="float-start">Total</span>
                                            <span class=" float-right" name="total">{{ $totalPrice }}-/</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary ms-auto">Rent a Car</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    @endforeach
                @else
                    <h3>No Car Found</h3>
                @endif






            </div>


        </div>
    </section>
@endsection
