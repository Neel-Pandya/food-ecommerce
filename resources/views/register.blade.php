@extends('master')
<!-- ======= Hero Section ======= -->

@section('content')
    <main id="main">

        <!-- ======= About Section ======= -->

        <!-- ======= Testimonials Section ======= -->
        <!-- ======= Book A Table Section ======= -->
        <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <p><span>Register</span></p>
                </div>

                <div class="row g-0">

                    <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"
                        data-aos="zoom-out" data-aos-delay="200"></div>

                    <div class="col-lg-8 d-flex  reservation-form-bg align-items-center">
                        <form action="{{ route('guest.register.validate') }}" method="post" data-aos="fade-up"
                            data-aos-delay="100" enctype="multipart/form-data">
                            @csrf
                            <div class="row mx-4">
                                <div class="col-lg-6 col-md-6  mt-4">
                                    <label for="" class="form-label"><span>Enter name</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-msg="Please enter at least 4 chars" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>
                                <div class="col-lg-6 col-sm-12 col-md-6 mt-4">
                                    <label for="" class="form-label"><span>Enter email</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                                    <label for="" class="form-label">Enter Mobile</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control"
                                        placeholder="Enter Mobile" value="{{ old('mobile') }}">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                                    <label for="" class="form-label">Enter Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter Password" value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="" class="form-control"
                                        placeholder="Confirm Your Password" value="{{ old('password_confirmation') }}">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                                    <label for="" class="form-label">Enter Address</label>
                                    <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                    <label for="" class="form-label">Choose Profile</label>
                                    <input type="file" name="profile" id="profile" class="form-control">
                                    @if ($errors->has('profile'))
                                        <span class="text-danger">{{ $errors->first('profile') }}</span>
                                    @endif
                                </div>
                                <div class="text-end mt-4"><button type="submit" id="register" class="btn  rounded-pill"
                                        style="background-color: #ce1212; color:white;">Register</button></div>
                                <div class="mt-3 d-flex justify-content-end" style="color:transparent;">
                                    Not Have an Account ? <a href="" class="mx-1"
                                        style="cursor: default; color: transparent;"> Register </a>
                                </div>

                        </form>

                    </div><!-- End Reservation Form -->


                </div>

            </div>
        </section><!-- End Book A Table Section -->


        <!-- ======= Contact Section ======= -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
@endsection
