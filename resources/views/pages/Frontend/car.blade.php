@extends('layouts.frontend-page')
@section('title', 'Car Page')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url({{ asset('frontend') }}/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="d-flex no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Choose Your Car</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                @foreach ($car as $item)
                    <div class="col-md-4">
                        <div class="car-wrap rounded ftco-animate">
                            {{-- <div class="img rounded d-flex align-items-end"
                                style="background-image: url({{ asset('frontend') }}/images/car-1.jpg);">
                            </div> --}}

                            {{-- @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="image"
                                                    class="img-fluid" style="width: 100px;">
                                                    @else

                                                <img src="{{ asset('upload/no-image.png') }}" alt="image"
                           @endif --}}


                            @if ($item->CarImage !== null)
                                <img class="img rounded d-flex align-items-end" src="{{ asset($item->CarImage) }}"
                                    alt="">
                                {{-- <div class="img rounded d-flex align-items-end"
                                    style="background-image: url({{ asset($item->CarImage) }}">
                                </div> --}}
                            @else
                                {{-- <img src="{{ asset($item->CarImage) }}" alt=""> --}}
                                {{-- <div class="img rounded d-flex align-items-end"
                                    style="background-image: url({{ asset('uploads/default.jpg') }}">
                                </div> --}}
                                <img class="img rounded d-flex align-items-end" src="{{ asset('uploads/default.jpg') }}"
                                    alt="">
                            @endif

                            {{-- <div class="img rounded d-flex align-items-end"
                                style="background-image: url({{ asset($item->CarImage) }}">
                            </div> --}}
                            <div class="text">
                                <h2 class="mb-0">
                                    <a href="car-single.html">{{ $item->CarName }}</a>
                                </h2>
                                <div class="d-flex mb-3">
                                    <span class="cat">{{ $item->CarType }}</span>
                                    <p class="price ml-auto">${{ $item->daily_rent_price }} <span>/day</span></p>
                                </div>
                                <p class="d-flex mb-0 d-block">
                                    <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                    <a href="{{ route('single.car', $item->id) }}"
                                        class="btn btn-secondary py-2 ml-1">Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

            {{-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> --}}


        </div>
    </section>

@endsection
