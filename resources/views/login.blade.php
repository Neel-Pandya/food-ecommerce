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

                      <p>Log <span>In</span></p>
                  </div>

                  <div class="row g-0">

                      <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"
                          data-aos="zoom-out" data-aos-delay="200"></div>

                      <div class="col-lg-8 d-flex  reservation-form-bg align-items-center">
                          <form action="{{ route('guest.login.validate') }}" method="post" role="form" class="mx-4"
                              data-aos="fade-up" data-aos-delay="100">
                              @csrf
                              <div class="row">
                                  @if (session()->has('loginError'))
                                      <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                          <div class="alert alert-danger  alert-dismissible fade show" id="loginError">

                                              <span class="text-danger">{{ session('loginError') }}</span>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                  aria-label="Close"></button>


                                          </div>
                                      </div>
                                  @endif
                                  @if (session()->has('Success'))
                                      <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                          <div class="alert alert-success alert-dismissible fade show">

                                              <span class="text-success">{{ session('Success') }}</span>
                                              <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                  aria-label="Close"></button>



                                          </div>
                                      </div>
                                  @elseif(session()->has('Error'))
                                      <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                          <div class="alert alert-danger alert-dismissible fade show">

                                              <span class="text-danger">{{ session('Error') }}</span>

                                              <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                  aria-label="Close"></button>


                                          </div>
                                      </div>
                                  @endif

                                  <div class="col-lg-12 col-md-12 mt-4">
                                      <label for="" class="form-label"><span>Enter Email</span></label>
                                      <input type="email" name="email" class="form-control" id="name"
                                          placeholder="Your Email" data-rule="minlen:4"
                                          data-msg="Please enter at least 4 chars">
                                      @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif

                                  </div>
                                  <div class="col-lg-12 col-md-12 mt-4">
                                      <label for="" class="form-label"><span>Enter Password</span></label>
                                      <input type="password" class="form-control" name="password" id="password"
                                          placeholder="Your Password" data-rule="email"
                                          data-msg="Please enter a valid email">
                                      @if ($errors->has('password'))
                                          <span class="text-danger">{{ $errors->first('password') }}</span>
                                      @endif

                                  </div>

                                  <div class="text-end mt-4"><button type="submit" class="btn rounded-pill"
                                          style="background-color: #ce1212; color:white;">Log In</button></div>

                                  <div class="mt-3 d-flex justify-content-end">
                                      Not Have an Account ? <a class="mx-1" href="{{ route('guest.register') }}">
                                          Register
                                      </a>

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

      <!-- Vendor JS Files -->
  @endsection
