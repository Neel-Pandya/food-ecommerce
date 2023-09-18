@extends('blueprint.masterlayout')

@section('title')

Edit Gallery

@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
                <img src="{{ URL::to('/') }}/Images/gallery/{{ $data->image }}" alt="" width="100%; ">
            </div>
            <div class="col-lg-8 col-sm-12 col-md-8 mt-4">
                <form action="{{ route('gallery.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="" class="form-label">Choose File</label>
                    <input type="file" name="profile" id="" class="form-control">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="submit" value="Submit" class="btn btn-primary mt-4">
                </form>
            </div>
        </div>
    </div>
@endsection