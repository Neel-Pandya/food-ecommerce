@extends('blueprint.masterlayout')

@section('title')
    Change Password
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('admin.change.password.validate') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label for="" class="form-label">Enter your Current Password</label>
                    <input type="password" name="old_pass" id="" class="form-control" placeholder="Enter old password">
                    <span class="text-danger"></span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label for="" class="form-label">Enter new Password</label>
                    <input type="password" name="new_pass" id="" class="form-control" placeholder="Enter new password">
                    <span class="text-danger"></span>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                    <label for="" class="form-label">Retype new Password</label>
                    <input type="password" name="new_pass_confirmation" id="" class="form-control" placeholder="Retype new password">
                    <span class="text-danger"></span>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-4">
                    <input type="submit" value="Submit" class="btn btn-primary rounded-pill">
                </div>
            </div>
        </form>
    </div>
@endsection
