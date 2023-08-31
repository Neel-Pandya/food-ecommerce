@extends('blueprint.masterlayout')

@section('title')

Purchased Service 

@endsection

@section('content')
<div class="container mt-4">
    <div class="table-responsive table-hover">
        <table class="table table-dark table-striped">
            <thead>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Number</th>
                <th>Service Id</th>
                <th>Service name</th>
                <th>Service price</th>
                <th>Service Image</th>
                <th>Service purchased date</th>
                <th>Service expire date</th>
                
            </thead>
            <tbody class="table table-light table-hover table-striped">
                <td>1</td>
                <td>Neel Pandya</td>
                <td>neel@gmail.com</td>
                <td>8866163085</td>
                <td>2</td>
                <td>1 Month Free Food</td>
                <td>3000 Rs</td>
                <td>abc.jpg</td>
                <td>22-08-23</td>
                <td>22-09-23</td>
            </tbody>
        </table>
    </div>
</div>
@endsection