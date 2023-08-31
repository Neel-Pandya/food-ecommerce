@extends('blueprint.masterlayout')

@section('title')

Add new Category

@endsection

@section('content')
<div class="container">
    <div class="card">
        <center>
            <div class="card-title col-12 text-primary ">
                Add Category
            </div>
        </center>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <label for="" class="form-label">Enter category name</label>
                        <input type="text" name="category_name" id="" class="form-control">
                        <span class="text-danger">
                            @error('category_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <center>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            <input type="submit" value="Submit" class="btn btn-info rounded-pill">
                        </div>
                    </center>


                </div>
            </form>
        </div>
    </div>
</div>



@endsection