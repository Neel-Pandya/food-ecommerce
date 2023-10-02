@extends('master')

@section('content')
<section id="profile" class="profile">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <p>Change<span> Password</span></p>
        </div>
        <form method="post" id="changePasswordForm">
            @csrf
            <div class="row">
                <div class="col-12 change-errors"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label for="" class="form-label">Old Password</label>
                    <input type="password" id="old_pass" class="form-control" placeholder="Enter the old password">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                    <label for="" class="form-label">New Password</label>
                    <input type="password" id="new_pass" class="form-control" placeholder="Enter the new password">
                </div>
                <div class="col-12 mt-4">
                    <label for="" class="form-label">Retype new Password</label>
                    <input type="password" id="new_pass_confirmation" class="form-control"
                        placeholder="Retype the new Password">
                </div>
                <div class="col-12 text-center mt-4">
                    <input type="submit" value="Submit" class='btn' style="background-color: #ce1212; color:white;">
                </div>
            </div>
        </form>
        {{-- Main --}}


    </div>
</section><!-- End Contact Section -->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function () {
        $(document).on('submit', '#changePasswordForm', function (event) {
            event.preventDefault()
            let formData = new FormData(this)
            formData.append('old_pass', $('#old_pass').val())
            formData.append('new_pass', $('#new_pass').val())
            formData.append('new_pass_confirmation', $('#new_pass_confirmation').val())

            $.ajax({
                type: "POST",
                url: "{{ URL::to('/') }}/update-password",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == 'validation') {
                        $('.change-errors').html('')

                        $.each(response.error, function (indexInArray, valueOfElement) {
                            $('.change-errors').addClass('alert alert-danger')
                            $('.change-errors').append(`
                                    <li style='list-style:none;'> ${valueOfElement} </li>
                                `)

                        });
                    }
                    else {
                        $('.change-errors').removeClass('alert alert-danger')
                        $('.change-errors').html('')
                    }

                    if (response.status == 'success') {
                        sweetAlert('success', response.message)
                        $("#old_pass").val('')
                        $("#new_pass").val('')
                        $("#new_pass_confirmation").val('')
                    }
                    else {
                        sweetAlert('error', response.message)
                        $("#old_pass").val('')
                        $("#new_pass").val('')
                        $("#new_pass_confirmation").val('')

                    }

                },
                error: function (err) {
                    console.log(err)
                }
            });
        });
    });
</script>
@endsection