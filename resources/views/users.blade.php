@extends('blueprint.masterlayout')
@section('title')

Users

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

    <div class="table-responsive-lg table-responsive-md ">
        <table class="table table-striped table-hover ">
            <caption>
                <!-- Button trigger modal -->
                <a href="{{ route('users.add') }}"> <button type="button" class="btn btn-info">
                        Add user
                    </button>
                </a>

                <!-- Modal -->
            </caption>
            <thead>
                <tr class="text-center table-dark">
                    <th>Name</th>
                    <th>email</th>
                    <th>Mobile</th>
                    <th>password</th>
                    <th>status</th>
                    <th>profile</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersData as $data )

                <tr class="text-center">
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['email'] }}</td>
                    <td>{{ $data['mobile'] }}</td>
                    <td>{{ $data['password'] }}</td>
                    <td>
                        @if ($data['status'] == "Active")
                        <a href="{{ route('users.deactive',['email' => $data['email']]) }}"><button
                                class="btn btn-danger btn-sm">Deactivate</button></a>
                        @elseif ($data['status'] == 'Inactive')
                        <a href="{{ route('users.activate', ['email' => $data['email']]) }}"><button
                                class="btn btn-success btn-sm">Activate</button></a>
                        @elseif($data['status'] == 'Deleted')
                        <a href="{{ route('users.reactive', ['email' => $data['email']]) }}"><button
                                class="btn btn-danger btn-sm">Reactivate</button></a>

                        @endif

                    </td>
                    <td>


                        <div class="nav-profile-image">
                            <img src="{{ URL::to('/') }}/Images/Profiles/{{ $data['profile'] }}" alt="profile">
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>


                    </td>

                    <td><a href="{{ route('users.edit',['email' => $data['email']]) }}"><button
                                class="btn btn-info btn-sm">Edit</button></a></td>
                    @if ($data['status'] == 'Deleted')

                    @else
                    <td><a href="{{ route('users.delete',['email' => $data['email']]) }}"><button type="button"
                                class="btn btn-danger btn-sm">Delete</button></a></td>

                    @endif


                </tr>

                @endforeach

            </tbody>
            <tfoot>
                {{ $usersData->links() }}
            </tfoot>
        </table>
    </div>
</div>




@endsection

@push('scripts')

@endpush