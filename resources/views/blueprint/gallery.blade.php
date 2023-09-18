@extends('blueprint.masterlayout')
@section('title')
    Gallery
@endsection

@section('content')
    <div class="container">
        @if (session()->has('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                <strong>{{ session('Success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <script>
                    setTimeout(() => {
                        $('.alert').alert('close');
                        @php session()->forget('Success');  @endphp 
                    }, 5000);
                </script>
            </div>
        @elseif (session()->has('Error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                <strong>{{ session('Error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(() => {
                    $('.alert').alert('close');
                    @php
                        session()->forget('Error'); 
                    @endphp
                }, 5000);
            </script>
        @endif

        <div class="table-responsive">
            <table class="table table-light table-striped table-bordered table-hover">
                <caption>
                    <a href="{{ route('gallery.add') }}"><button class="btn btn-info">Add New Image</button></a>
                </caption>
                <thead class="bg-light text-dark text-center">
                    <th>Id</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th colspan="2">Actions</th>
                    

                </thead>
                <tbody class="text-dark bg-light text-center">
                    @foreach ($activeImage as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td><img src="{{ URL::to('/') }}/Images/gallery/{{ $image->image }}" alt=""></td>
                            <td>
                                @if ($image->status == 'Active')
                                    <a href="{{ route('gallery.deactivate', ['id' => $image->id]) }}"><button class="btn btn-danger btn-sm">Deactivate</button></a>
                                @elseif($image->status == 'Inactive')
                                    <a href="{{ route('gallery.activate', ['id' => $image->id]) }}"><button class="btn btn-success btn-sm">Activate</button></a>
                                @elseif($image->status == 'Deleted')
                                    <a href="{{ route('gallery.reactivate', ['id' => $image->id]) }}"><button class="btn btn-danger btn-sm">Reactivate</button></a>
                                @endif
                            </td>
                            <td><a href="{{ route('gallery.edit', ['id' => $image->id]) }}"><button class="btn btn-info btn-sm">Edit</button></a></td>

                            <td> <a href="{{ route('gallery.delete', ['id' => $image->id]) }}"><button class="btn btn-danger btn-sm">Delete</button></a></td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endsection
