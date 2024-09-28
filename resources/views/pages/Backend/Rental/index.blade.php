@extends('layouts.backend-page')
@section('title', 'Rental Page')
@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->

            <div class="pagetitle">
                <h1>Rental List</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Rental List</li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Rental List</h5>
                        {{-- <a href="#" class="btn btn-outline-primary ms-auto"> + Create</a> --}}
                        <button type="button" class="btn btn-outline-primary ms-auto" data-bs-toggle="modal"
                            data-bs-target="#basicModal">
                            + Create
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#Sl No</th>
                                    <th>Car ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rental as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->car_id  }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->end_date }}</td>
                                        <td>{{ $item->total_cost }}</td>
                                       
                                        <td>

                                            @if ($item->status == 'Ongoing')
                                                <span class="badge text-info">Ongoing</span>
                                            @elseif($item->status == 'Completed')
                                                <span class="badge text-danger">Completed</span>
                                                @else
                                                 <span class="badge text-danger">Cancelled </span>
                                            @endif

                                        </td>
                                       
                                        <td class="d-flex ms-auto gap-2">
                                           
                                            <a href="{{ route('rental.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('rental.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                           
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Car</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <!-- General Form Elements -->
                    <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="CarName" class="col-sm-2 col-form-label">Car Name</label>
                            <div class="form-group col-sm-12">
                                <input type="text" name="CarName" placeholder="Car Name..."
                                    class="form-control  @error('CarName') is-invalid @enderror" id="CarName">
                                @error('CarName')
                                    <span class="text-danger my-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                                <div class="form-group">
                                    <input type="text" name="brand" placeholder="Brand Name..." class="form-control"
                                        id="brand">
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="model" class=" col-form-label">Model Name</label>
                                <div class="form-group">
                                    <input type="text" name="model" placeholder="Model Name..." class="form-control"
                                        id="model">
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="year" class="col-sm-2 col-form-label">Year</label>
                                <div class="form-group">
                                    <input type="text" name="year" placeholder="Year..." class="form-control"
                                        id="year">
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
                                        <option value="SUV">SUV</option>
                                        <option value="Sedan">Sedan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-7 mb-3">
                                <label for="daily_rent_price" class="col-sm-6 col-form-label">Daily Rent Price</label>
                                <div class="form-group">
                                    <input type="number" name="daily_rent_price" placeholder="Daily Rent Price..."
                                        class="form-control" id="daily_rent_price">
                                </div>
                            </div>
                        </div>


                        <div class="d-flex justify-contet-between align-item-center gap-3">
                            <div class="col-sm-4">
                                <label for="Status" class="col-form-label">Status</label>
                                <div class="form-group">
                                    <select class="form-select" name="status" id="Status">
                                        <option selected>Choose Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <label for="file-upload" class="col-form-label">CarImage</label>
                                {{-- <div class="form-group">
                                    <input type="file" name="image" class="form-control" id="file-upload"
                                        onchange="previewImage(event);">
                                </div> --}}
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control" id="file-upload"
                                        onchange="previewImage(event);">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-2">
                            <label for="">Preview Image</label>
                            <img src="https://cdn.vectorstock.com/i/500p/65/30/default-image-icon-missing-picture-page-vector-40546530.jpg"
                                alt="" width="120px" height="150px" class="form-control mt-2" id="previewImg">
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-item-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success">Create</button>
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>

                    <!-- End General Form Elements -->
                </div>

            </div>
        </div>
    </div>
    <!-- End Basic Modal-->

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
