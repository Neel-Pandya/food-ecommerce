@extends('blueprint.masterlayout')

@section('title')

Edit user

@endsection

@section('content')
<div class="container">

    <div class="card">
        <center>
            <div class="card-title col-12 text-primary ">
                Edit User
            </div>
        </center>
        <div class="card-body">
            <form action="{{ route('users.edit.post') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    
                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ $user_email->name }}" >
                        <span class="text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput" class="form-label"></label>Email
                        <input type="email" name="email" class="form-control mt-2" value="{{ $user_email->email }}" readonly>
                        <span class="text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput" class="form-label"></label>mobile
                        <input type="tel" name="mobile" class="form-control mt-2" value="{{ $user_email->mobile }}">
                        <span class="text-danger">
                            @error('mobile')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput" class="form-label"></label>password
                        <input type="text" name="password" class="form-control mt-2" value="{{ $user_email->password }}" >
                        <span class="text-danger">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3 col-md-12 col-lg-12 col-sm-12">
                        <label for="">Enter address</label>
                        <textarea name="address" id="" class="form-control">{{ $user_email->address }}</textarea>
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mt-3 col-md-6 col-sm-12 col-lg-12">
                        <img src="{{ URL::to('/') }}/Images/Profiles/{{ $user_email->profile }}" alt="" class="img-thumbnail img-fluid" style="width: 15%">
                        <br>
                        <label for="exampleFormControlInput" class="form-label mt-3"></label>Upload File
                        <input type="file" class="form-control mt-2" id="exampleInputFile" name="profile">
                        <span class="text-danger">
                            @error('profile')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection