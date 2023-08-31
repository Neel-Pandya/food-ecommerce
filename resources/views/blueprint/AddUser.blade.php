@extends('blueprint.masterlayout')

@section('title')

Add user

@endsection

@section('content')
<div class="container">

    <div class="card">
        <center>
            <div class="card-title col-12 text-primary ">
                Add User
            </div>
        </center>
        <div class="card-body">
            <form action="{{ route('users.add.post') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                        <span class="text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput" class="form-label"></label>Email
                        <input type="email" name="email" class="form-control mt-2">
                        <span class="text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput" class="form-label"></label>mobile
                        <input type="tel" name="mobile" class="form-control mt-2">
                        <span class="text-danger">
                            @error('mobile')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="exampleFormControlInput" class="form-label"></label>password
                        <input type="password" name="password" class="form-control mt-2">
                        <span class="text-danger">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3 col-md-6 col-lg-6 col-sm-12">
                        <label for="">Enter address</label>
                        <textarea name="address" id="" class="form-control"></textarea>
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mt-3 col-md-6 col-sm-12 col-lg-6">
                        <label for="exampleFormControlInput" class="form-label"></label>Upload File
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