@extends('blueprint.masterlayout')

@section('title')
Edit Service
@endsection


@section('content')
<div class="container">
    <div class="card">
        <div class="card-title text-primary text-center mt-4">
            Edit Service
        </div>
        <div class="card-body">
            <form action="{{ route('services.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">


                    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                        <label for="" class="form-label">Service name</label>
                        <input type="text" name="service_name" id="" class="form-control"
                            value="{{ $services->Service_name }}" readonly>
                        <span class="text-danger">
                            @error('service_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                        <label for="" class="form-label">Service price</label>
                        <input type="number" name="service_price" id="" class="form-control"
                            value="{{ $services->Service_price }}">
                        <span class="text-danger">

                            @error('item_price')
                            {{ $message }}
                            @enderror
                        </span>


                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                        <label for="" class="form-label">Service Includes</label>
                        @php
                        $service_includes = explode(',', $services->Service_includes);
                        $implodeWIth= implode(' ', $service_includes);
                        @endphp
                        <input type="text" name="service_includes" id="" class="form-control" value="{{ $implodeWIth }}">


                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                        <img src="{{ URL::to('/') }}/Images/Profiles/{{ $services->Service_image }}"
                            class="img-fluid img-thumbnail" alt="" style="width: 20%;">
                        <br>
                        <label for="" class="form-label mt-3">Choose Image</label>
                        <input type="file" name="service_image" id="" class="form-control
                        <span class="text-danger">
                      
                            @error('service_image')
                            {{ $message }}
                            @enderror
                        </span>

                    </div>

                    <div class="col-sm-12 col-lg-12 col-md-12 text-center mt-5">
                        <input type="submit" value="Submit" class="btn btn-info rounded-pill">
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

@endsection