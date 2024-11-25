@extends('blueprint.masterlayout')

@section('title')
    Items edit
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title text-primary text-center mt-4">
                Edit Item
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 mt-4">   
                    <img src="{{ URL::to('/') }}/Images/Profiles/{{ $item->item_image }}" class="img-fluid img-thumbnail"
                        alt="" style="width: 100%">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card-body">
                        <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Enter Item name</label>
                                    <input type="text" name="item_name" id="" class="form-control"
                                        value="{{ $item->item_name }}" readonly>
                                    <span class="text-danger">
                                        @error('item_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Enter Item Price</label>
                                    <input type="number" name="item_price" id="" class="form-control"
                                        value="{{ $item->item_price }}">
                                    <span class="text-danger">

                                        @error('item_price')
                                            {{ $message }}
                                        @enderror
                                    </span>


                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                                    <label for="" class="form-label">Select Item category</label>
                                    <select name="item_category" id="" class="form-control form-select">
                                        <option value="{{ $item->item_category }}">{{ $item->item_category }}</option>
                                        @foreach ($item_category as $c)
                                            <option value="{{ $c->category_name }}"
                                                @if (old('item_category') == $c->category_name) selected @endif>{{ $c->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('item_category')
                                            {{ $message }}
                                        @enderror
                                    </span>


                                </div>



                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <br>
                                    <label for="" class="form-label mt-3">Choose Image</label>
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

        </div>

    </div>
@endsection
