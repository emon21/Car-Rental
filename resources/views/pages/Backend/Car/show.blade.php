@extends('layouts.backend-page')
@section('title','View Car')
@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->

            <div class="pagetitle">
                <h1>Car List</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Car List</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Car Details :-</h5>
                        <a href="{{ route('car.index') }}" class="btn btn-outline-primary ms-auto"> + Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Car Name</td>
                                    <td>{{ $car->CarName }}</td>
                                </tr>

                                <tr>
                                    <td>Brand</td>
                                    <td>{{ $car->brand }}</td>
                                </tr>

                                <tr>
                                    <td>Model</td>
                                    <td>{{ $car->model }}</td>
                                </tr>

                                <tr>
                                    <td>Year</td>
                                    <td>{{ $car->year }}</td>
                                </tr>

                                <tr>
                                    <td>CarType</td>
                                    <td>{{ $car->CarType }}</td>
                                </tr>

                                <tr>
                                    <td>Daily Rent Price</td>
                                    <td>{{ $car->brand }}</td>
                                </tr>

                                <tr>
                                    <td>status</td>
                                    {{-- <td>{{ $car->status }}</td> --}}
                                    <td>

                                        @if ($car->status == 'Available')
                                            <span class="badge text-success"> Available</span>
                                        @else
                                            <span class="badge text-danger"> Not Available</span>
                                        @endif

                                    </td>
                                </tr>

                                <tr>
                                    <td>CarImage</td>
                                    <td>
                                        <img src="@if ($car->CarImage) {{ asset($car->CarImage) }} @else {{ asset($car->CarImage) }} @endif"
                                            width="250px" height="180px">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
