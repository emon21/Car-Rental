@extends('layouts.backend-page')
@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->

            <div class="pagetitle">
                <h1>Car Edit</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Car Edit</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Car Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <form action="{{ route('car.update', $car->id) }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="CarName" class="col-sm-2 col-form-label">Car Name</label>
                                <div class="form-group col-sm-12">
                                    <input type="text" name="CarName" placeholder="Car Name..."
                                        class="form-control  @error('CarName') is-invalid @enderror" id="CarName"
                                        value="{{ $car->CarName }}">
                                    @error('CarName')
                                        <span class="text-danger my-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                                    <div class="form-group">
                                        <input type="text" name="brand" placeholder="Brand Name..."
                                            class="form-control" id="brand" value="{{ $car->brand }}">
                                    </div>
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="model" class=" col-form-label">Model Name</label>
                                    <div class="form-group">
                                        <input type="text" name="model" placeholder="Model Name..."
                                            class="form-control" id="model" value="{{ $car->model }}">
                                    </div>
                                </div>

                                <div class="col-sm-4 mb-3">
                                    <label for="year" class="col-sm-2 col-form-label">Year</label>
                                    <div class="form-group">
                                        <input type="text" name="year" placeholder="Year..." class="form-control"
                                            id="year" value="{{ $car->year }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-sm-5">
                                    <label for="CarType" class="col-sm-2 col-form-label">CarType</label>
                                    <div class="form-group">
                                        <select class="form-select" name="CarType" aria-label="Default select example"
                                            id="CarType">
                                            <option selected>Choose status</option>
                                            <option value="SUV" @if ($car->CarType == 'SUV') selected @endif>SUV
                                            </option>
                                            <option value="Sedan" @if ($car->CarType == 'Sedan') selected @endif>Sedan
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-7 mb-3">
                                    <label for="daily_rent_price" class="col-sm-6 col-form-label">Daily Rent Price</label>
                                    <div class="form-group">
                                        <input type="number" name="daily_rent_price" placeholder="Daily Rent Price..."
                                            class="form-control" id="daily_rent_price" value="{{ $car->daily_rent_price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-item-center">
                                <div class="col-sm-4 form-group">
                                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select example"
                                        id="Status">
                                        <option selected>Choose Status</option>
                                        <option value="Available" @if ($car->status == 'Available') selected @endif>
                                            Available</option>
                                        <option value="Not Available" @if ($car->status == 'Not Available') selected @endif>Not
                                            Available</option>
                                    </select>
                                </div>

                                <div class="col-sm-5">
                                    <label for="CarImage" class="col-sm-4 col-form-label">CarImage</label>
                                    <div class="form-group">
                                        <input class="form-control" name="image" type="file" id="CarImage"
                                            onchange="previewImage(event);">
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between align-item-center">

                                <div class="col-sm-4">
                                    <label for="image" class="col-sm-4 col-form-label">OLD Image</label>
                                    <div class="form-group">
                                        {{-- <img src="{{ asset($car->CarImage) }}" alt="" width="180px"
                                            height="150px"> --}}

                                        <img @if ($car->CarImage) src="{{ asset($car->CarImage) }}"
                                           @else
                                                src="{{ asset('upload/no-image.png') }}" @endif
                                            alt="" height="380px" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <label for="" class="col-sm-4 col-form-label">Preview Image</label>
                                    <div class="form-group">
                                        <img src="https://cdn.vectorstock.com/i/500p/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg"
                                            alt="" height="350px" class="form-control" id="previewImg">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-outline-success">Upade</button>
                                </div>
                            </div>

                        </form>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('previewImg');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
