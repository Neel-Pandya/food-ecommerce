@extends('blueprint.masterlayout')

@section('title')

Available Product

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

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <caption>
                <a href="{{ route('products.add') }}"><button class="btn btn-info rounded-pill">Add new
                        Item</button></a>
            </caption>
            <thead class="table-dark text-center">
                <th>Item id</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Item Category</th>
                <th>Item Type</th>
                <th>Item status</th>
                <th>Item Image</th>
                <th colspan="2">Actions</th>

            </thead>
            <tbody class="text-center ">
                @foreach ($dataOfItemsTable as $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->item_price }} Rs</td>
                    <td>{{ $item->item_category }}</td>
                    <td>{{ $item->item_type }}</td>
                    @if($item->item_status == "Active")
                    <td><a href="{{ route('products.deactivate', ['item_name' => $item->item_name]) }}"><button
                                class="btn btn-danger btn-sm">Deactivate</button></a></td>

                    @elseif($item->item_status == 'Inactive')
                    <td><a href="{{ route('products.activate', ['item_name' => $item->item_name]) }}"><button
                                class="btn btn-success btn-sm">Activate</button></a></td>

                    @elseif ($item->item_status == 'Deleted')
                    <td><a href="{{ route('products.reactivate', ['item_name' => $item->item_name]) }}"><button
                                class="btn btn-danger btn-sm">Reactivate</button></a></td>

                    @endif
                    <td><img src="{{ URL::to('/') }}/Images/Profiles/{{ $item->item_image }}" alt=""></td>
                    <td><a href="{{ route('products.edit',['item_name' => $item->item_name]) }}"><button
                                class="btn btn-info btn-sm">Edit</button></a></td>
                    @if($item->item_status == 'Deleted'){

                    }
                    @else
                    <td><a href="{{ route('products.delete', ['item_name' => $item->item_name]) }}"><button
                                class="btn btn-danger btn-sm">Delete</button></a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td>{{ $dataOfItemsTable->links() }}</td>
            </tfoot>
        </table>
    </div>
</div>

@endsection