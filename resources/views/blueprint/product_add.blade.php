@extends('blueprint.masterlayout')

@section('title')
Items add
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-title text-primary text-center mt-4">
            Add Item
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                        <label for="" class="form-label">Enter Item name</label>
                        <input type="text" name="item_name" id="" class="form-control" value="{{ old('item_name') }}">
                        <span class="text-danger">
                            @error('item_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                        <label for="" class="form-label">Enter Item Price</label>
                        <input type="number" name="item_price" id="" class="form-control" value="{{ old('item_price') }}">
                        <span class="text-danger">

                            @error('item_price')
                            {{ $message }}
                            @enderror
                        </span>


                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 mt-4">
                        <label for="" class="form-label">Select Item category</label>
                        <select name="item_category" id="" class="form-select">
                            <option value="">Choose Category</option>
                            @foreach ($category as $c)
                            <option value="{{ $c->category_name }}" @if (old('item_category') == $c->category_name)
                                selected
                            @endif>{{ $c->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('item_category')
                            {{ $message }}
                            @enderror
                        </span>


                    </div>

                    <div class="col-sm-12 col-lg-6 col-md-6 mt-4">
                        <label for="" class="form-label">Select Item Type</label>
                        <select name="item_type" id="" class="form-select">
                            <option value="">Choose item type</option>
                            @foreach ($item_type as $item )
                                    <option value="{{ $item->Item_type }}">{{ $item->Item_type }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('item_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                        <label for="" class="form-label">Choose Image</label>
                        <input type="file" name="item_image" id="" class="form-control">
                        <span class="text-danger">
                            @error('item_image')
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