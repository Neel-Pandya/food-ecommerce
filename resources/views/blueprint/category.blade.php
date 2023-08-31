@extends('blueprint.masterlayout')
@section('title')

Category

@endsection

@section('content')
<div class="container">
    @if (session()->has('Success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('Success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <script>
            setTimeout(() => {
                $('.alert').alert('close');
            }, 5000);
        
            
        </script>
    </div>
    @elseif(session()->has('Error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('Error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <script>
            setTimeout(() => {
                $('.alert').alert('close');
            }, 5000);
        </script>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <caption>
                <a href="{{ route('category.add') }}"><button class="btn btn-info  rounded-pill">Add
                        Category</button></a>
            </caption>
            <thead class="text-center table-dark table">
                <tr>
                    <th>Category id</th>
                    <th>Category name</th>
                    <th>Status</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody class="  text-center table-hover">
                @foreach ($category_data as $d)
                <tr>
                    <td>{{ $d->id }}</td>

                    <td>{{ $d->category_name }}</td>
                    @if ($d->category_status == "Inactive")
                    <td><a href="{{ route('category.activate', ['name' => $d->category_name]) }}"><button
                                class="btn btn-success btn-sm">Activate</button></a></td>
                    @elseif($d->category_status == 'Active')
                    <td><a href="{{ route('category.deactivate',['name' => $d->category_name]) }}"><button
                                class="btn btn-danger btn-sm">Deactivate</button></a></td>
                    @elseif($d->category_status == 'Deleted')
                    <td><a href="{{ route('category.reactivate', ['name' => $d->category_name]) }}"><button
                                class="btn btn-danger btn-sm">Reactivate</button></a></td>
                    @endif
                    <td><a href="{{ route('category.edit',['name' => $d->category_name]) }}"><button
                                class="btn btn-info btn-sm">Edit</button></a></td>
                    <td><a href="{{ route('category.delete',['name' => $d->category_name]) }}"><button
                                class="btn btn-danger btn-sm">Delete</button></a></td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection