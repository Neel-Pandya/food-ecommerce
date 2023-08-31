@extends('blueprint.masterlayout')

@section('title')

Add Services

@endsection

@section('content')
<div class="container">
    
        <div class="card">
            <center>
                <div class="card-title col-12 text-primary ">
                    Add Services
                </div>
            </center>
            <div class="card-body">
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                            <label for="exampleFormControlInput1" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="service_name">
                            <span class="text-danger">
                                @error('service_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                            <label for="exampleFormControlInput" class="form-label"></label>Service Price
                            <input type="number" name="service_price" class="form-control mt-2">
                            <span class="text-danger">
                                @error('service_price')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                            <label for="exampleFormControlInput" class="form-label"></label>Service Includes
                            <input type="text" name="service_includes" class="form-control mt-2">
                            <span class="text-danger">
                                @error('service_includes')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                            <label for="exampleFormControlInput" class="form-label"></label>Choose Image


                            <input type="file" class="form-control mt-2" name="service_image" id="" placeholder="">

                            <span class="text-danger">
                                @error('service_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mt-4 col-md-12 col-lg-12 col-sm-12 text-center">
                        <input type="submit" value="submit" class="btn btn-info rounded-pill ">
                    </div>
            </div>
    </form>
</div>




@endsection