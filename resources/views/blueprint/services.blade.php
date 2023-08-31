@extends('blueprint.masterlayout')

@section('title')

Services

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
        }, 5000);
    </script>

    @endif

    <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered table-striped rounded-pill text-center">
            <caption><a href="{{ route('services.add') }}"><button class="btn btn-info rounded-pill">Add
                        Services</button></a></caption>
            <thead>

                <tr>
                    <th>Id</th>
                    <th>Service name</th>
                    <th>Service price</th>
                    <th>Service includes</th>
                    <th>Service Status</th>
                    <th>Service Image</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody class="table-light">
                @foreach ($service_record as $service )

                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->Service_name }}</td>
                    <td>{{ $service->Service_price }} Rs</td>
                    <td>{{ $service->Service_includes }}</td>
                    @if ($service->Service_status == 'Active')
                    <td><a href="{{ route('service.deactivate',['service_name' => $service->Service_name]) }}"><button
                                class="btn btn-danger btn-sm">Deactivate</button></a></td>
                    @elseif($service->Service_status == "Inactive")
                    <td><a href="{{ route('service.activate',['service_name' => $service->Service_name]) }}"><button
                                class="btn btn-success btn-sm">Activate</button></a></td>
                    @elseif($service->Service_status == "Deleted")
                    <td><a href="{{ route('service.reactivate',['service_name' => $service->Service_name]) }}"><button
                                class="btn btn-success btn-sm">Reactivate</button></a></td>
                    @endif
                    <td><img src="{{ URL::to('/') }}/Images/Profiles/{{ $service->Service_image }}" class="img-fluid"
                            alt="" ></td>
                    <td><a href="{{ route('services.edit', ['service_name' => $service->Service_name]) }}"><button
                                class="btn btn-info btn-sm">Edit</button></a></td>
                    <td><a href="{{ route('service.delete',['service_name'  => $service->Service_name]) }}"><button
                                class="btn btn-danger btn-sm">Delete</button></a></td>

                </tr>
                @endforeach

            </tbody>
            <tfoot>
                {{ $service_record->links() }}
            </tfoot>
        </table>
    </div>

</div>
@endsection