@extends('blueprint.masterlayout')

@section('title')
    Add new Image
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 col-sm-12 col-md-12">
                <label for="" class="form-label">Choose Image</label>
                <input type="file" name="profile" id="" class="form-control">
                
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 mt-4">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
