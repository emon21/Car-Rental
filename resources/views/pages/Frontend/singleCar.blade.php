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


    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">

                        <div class="">
                            <img class="img rounded" src="{{ asset($car->CarImage) }}" alt="">
                        </div>
                        <div class="col-sm-12">
                            <h2>Car Details Info :</h2>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Car Name : {{ $car->CarName }}</h5>
                                    <h5 class="card-title">Car Model : {{ $car->model }}</h5>
                                    <h5 class="card-title">Car Year : {{ $car->year }}</h5>
                                    <h5 class="card-title">Daily Rent Price : {{ $car->daily_rent_price }}</h5>
                                </div>
                            </div>

                            {{-- <div class="img rounded" style="background-image: url({{ asset($car->CarImage) }});"></div> --}}
                            {{-- <div class="text text-center">
                                <span class="subheading">{{ $car->CarName }}</span>
                                <h2>{{ $car->CarName }}</h2>
                            </div> --}}
                        </div>
                    </div>
                </div>





            </div>
    </section>


    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Choose Car</span>
                    <h2 class="mb-2">Related Cars</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($Allcar as $item)
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            {{-- <div class="img rounded d-flex align-items-end"
                            style="background-image: url({{ asset($item->CarImage) }}">
                        </div> --}}
                            @if ($item->CarImage)
                                <img class="img rounded d-flex align-items-end" src="{{ asset($item->CarImage) }}"
                                    alt="">
                            @else
                                <img class="img rounded d-flex align-items-end" src="{{ asset('uploads/default.jpg') }}"
                                    alt="">
                            @endif
                            <div class="text">
                                <h2 class="mb-0"><a href="car-single.html">{{ $item->CarName }}</a></h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">Cheverolet</span>
                                    <p class="price ml-auto">$500 <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="#" class="btn btn-primary py-2 mr-1">Book
                                        now</a>
                                    <a href="{{ route('single.car', $item->id) }}"
                                        class="btn btn-secondary py-2 ml-1">Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

@endsection
