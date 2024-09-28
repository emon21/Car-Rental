@extends('layouts.frontend-page')
@section('title', 'Car Details')
@section('content')

    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url({{ asset('frontend') }}/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="d-flex no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Car <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Car Details</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row">
                        <div class="col-md-12">
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
                                                <input type="text" class="form-control" name="start_date"
                                                    id="book_pick_date" placeholder="Start Date...">
                                            </div>

                                            <div class="form-group ml-2 col-sm-4">
                                                <label for="" class="label text-light">End Date</label>
                                                <input type="text" class="form-control" name="end_date"
                                                    id="book_off_date" placeholder="End Date...">
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

            </div>
    </section>


@endsection
