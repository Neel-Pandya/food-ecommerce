@extends('blueprint.masterlayout')

@section('title')

Purchased Items

@endsection

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-light table-striped table-hover">
            <thead class="table table-dark">
                <th>id</th>
                <th>Email</th>
                <th>product id</th>
                <th>product name</th>
                <th>product price</th>
                <th>Quantity</th>
                <th>Total</th>

            </thead>
            <tbody>
                @foreach ($getPurchasedData as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->product_id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->product_price }}</td>
                    <td>{{ $item->product_quantity }}</td>
                    <td>{{ $item->total }}</td>

                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection