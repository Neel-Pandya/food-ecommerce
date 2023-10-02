@extends('master')

@section('content')
<section id="profile" class="profile">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <p>User<span> Profile</span></p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 dynamic-profile mt-4">
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 edit-form ">
                <form method="post" id="editProfileForm" class='profileForm'>


                </form>
            </div>
        </div>

        {{-- Main --}}


    </div>
</section><!-- End Contact Section -->
@endsection

@section('scripts')
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function () {
        const editProfile = () => {
            $.ajax({
                type: "GET",
                url: "{{ URL::to('/') }}/get-edit-data",
                success: function (response) {
                    $(".dynamic-profile").html('')
                    $('.profileForm').html('')
                    $('.dynamic-profile').append(
                        `<img src='{{ URL::to('/') }}/images/Profiles/${response.editData.profile}' width='100%'>`
                    )
                    $('.profileForm').append(

                        `
                            <div class='row'> 
                            <div class='col-12 alert-danger validation-errors'> </div>
                            <div class='col-lg-6 col-md-6 col-sm-12 mt-4'>
                                <label class='form-label'>Name</label>
                                <input type='text' class='edit-name form-control' id='edit_name' value='${response.editData.name}'> 
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12 mt-4'>
                                <label class='form-label'>Email</label>
                                <input type='email' class='edit-email form-control' id='edit_email' value='${response.editData.email}' readonly>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12 mt-4'>
                                <label class='form-label'>Mobile</label>
                                <input type='tel' class='edit-mobile form-control' id='edit_mobile' value='${response.editData.mobile}'>
                            </div>
                            <div class='col-lg-6 col-md-6 col-sm-12 mt-4'>
                                <label class='form-label'>Address</label>
                                <textarea class='form-control edit-address' id='edit_address'> ${response.editData.address} </textarea>
                            </div>

                            <div class='col-lg-12 col-md-12 col-sm-12 mt-4'>
                                <label class='form-label'>Choose Profile</label>
                                <input type='file' class='form-control edit-file' id='edit_file'> 
                            </div>

                            <div class='col-lg-12 col-md-12 col-sm-12 mt-4 text-center'> 
                                <input type='submit' value='submit' class='btn btn-primary rounded-pill ' style='background-color: #ce1212; border: none;'> 

                            </div>  
                                `
                    )

                    $(document).on('submit', '#editProfileForm', function (event) {
                        event.preventDefault()
                        let formData = new FormData(this)
                        formData.append('name', $('#edit_name').val())
                        formData.append('email', $("#edit_email").val())
                        formData.append('mobile', $('#edit_mobile').val())
                        formData.append('address', $('#edit_address').val())
                        let selectedFile = $('#edit_file')[0].files[0]
                        if (selectedFile) {
                            formData.append('profile', $('#edit_file')[0].files[0])
                        }

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                    .attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('/') }}/update",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response.status == 'validation') {
                                    $('.validation-errors').addClass('alert');
                                    $(".validation-errors").html('')
                                    $.each(response.error, function (indexInArray, valueOfElement) {
                                        $('.validation-errors').append(
                                            `<li style='list-style:none;'> ${valueOfElement} </li>`
                                        );
                                    });
                                }
                                else {
                                    $('.validation-errors').html("")
                                    $('.validation-errors').removeClass('alert');
                                }

                                if (response.status == 'success') {
                                    sweetAlert('success', response.message)
                                    editProfile()
                                }

                            },
                            error: function (err) {
                                console.log(err)
                            }
                        });

                    });

                },

                error: function (err) {
                    console.log(err)
                }
            });
        }
        editProfile()
    });

</script>
@endsection