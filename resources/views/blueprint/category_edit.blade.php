@extends('blueprint.masterlayout')

@section('title')

Edit Category

@endsection

@section('content')
<div class="container">

    <div class="card">
        <center>
            <div class="card-title col-12 text-primary ">
                Edit category
            </div>
        </center>
        <div class="card-body">
            <form action="{{ route('category.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-label">Enter Category_name</label>
                        <input type="text" name="category_name" class="form-control" id="" value="{{ $category->category_name }}">
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        @error('category_name')
                            {{ $message }}
                        @enderror
                    </div>
                    <center>
                    <div class="col-12 mt-5">
                        <a href=""><button class="btn btn-info rounded-pill">Submit</button></a>
                    </div>
                </center>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection