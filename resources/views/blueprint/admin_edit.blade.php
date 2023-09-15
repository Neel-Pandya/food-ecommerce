@extends('blueprint.masterlayout')

@section('title')
    Admin Profile
@endsection

@section('content')
    <div class="container">

        @if (session()->has('Success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                <strong>{{ session('Success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 5000);
            </script>
        @elseif(session()->has('Error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('Error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <script>
                    setTimeout(function() {
                        $('.alert').alert('close');

                    }, 5000);
                </script>
            </div>
        @endif

        <div class="row">
            @foreach ($adminData as $data)
            @endforeach
            <h4 class="text-primary text-center">Edit Profile</h3>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <img src="{{ URL::to('/') }}/Images/admin/{{ $data->admin_profile }}" style="width: 100%; ">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 mt-3">
                    <form action="{{ route('admin.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control"
                                    placeholder="Enter admin name" value="{{ $data->admin_name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" id="" class="form-control"
                                    value="{{ $data->admin_email }}" placeholder="Enter admin email" readonly>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                <label for="" class="form-label">Mobile</label>
                                <input type="tel" name="phone" id="" class="form-control"
                                    value="{{ $data->admin_number }}" placeholder="Enter admin number">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                <label for="" class="form-label">Choose Profile</label>
                                <input type="file" name="pic" id="" class="form-control">
                                <span class="text-dan">
                                    @error('pic')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 mt-4 text-center">
                                <input type="submit" value="Submit" class="btn btn-primary rounded-pill">
                            </div>

                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection
