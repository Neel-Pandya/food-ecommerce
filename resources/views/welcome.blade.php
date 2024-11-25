@extends('master')
<!-- ======= Hero Section ======= -->

@section('content')
<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
        <div class="row justify-content-between gy-5">
            <div
                class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                <h2 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h2>
                <p data-aos="fade-up" data-aos-delay="100">Sed autem laudantium dolores. Voluptatem itaque ea
                    consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="#menu" class="btn-book-a-table">Order Now</a>

                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box">
                        <h3>Why Choose Yummy?</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                            optio ad corporis.
                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->

                <div class="col-lg-8 d-flex align-items-center">
                    <div class="row gy-4">

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-clipboard-data"></i>
                                <h4>Corporis voluptates officia eiusmod</h4>
                                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                    aliquip</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-gem"></i>
                                <h4>Ullamco laboris ladore pan</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                </p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-inboxes"></i>
                                <h4>Labore consequatur incidid dolore</h4>
                                <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="zoom-out">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countUsers }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total Customers</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countItems }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Items</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Workers</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Menu</h2>
                <p>Check Our <span>Yummy Menu</span></p>
            </div>

            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                        <h4>Fast Foods</h4>
                    </a>
                </li><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                        <h4>Cold Drinks</h4>
                    </a><!-- End tab nav item -->

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                        <h4>Sweets</h4>
                    </a>
                </li><!-- End tab nav item -->


            </ul>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <div class="tab-pane fade active show" id="menu-starters">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Fast Foods</h3>
                    </div>

                    <div class="row gy-5 fast-menu">

                    </div>
                </div><!-- End Starter Menu Content -->

                <div class="tab-pane fade" id="menu-breakfast">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Cold Drinks</h3>
                    </div>

                    <div class="row gy-5 cold">


                    </div>
                </div><!-- End Breakfast Menu Content -->
                <div class="tab-pane fade" id="menu-lunch">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Sweets</h3>
                    </div>

                    <div class="row gy-5 sweet-menu">


                    </div>
                </div><!-- End Breakfast Menu Content -->




            </div>

        </div>
    </section><!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
    @if (session()->has('user_email') and session()->has('user_password'))
    @else
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>
                <p>What Are They <span>Saying About Us</span></p>
            </div>

            <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Proin iaculis purus consequat sem cure digni ssim donec porttitora
                                            entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget
                                            nibh
                                            et. Maecen aliquam, risus at semper.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Saul Goodman</h3>
                                        <h4>Ceo &amp; Founder</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="assets/img/testimonials/testimonials-1.jpg"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua
                                            noster fugiat irure amet legam anim culpa.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Sara Wilsson</h3>
                                        <h4>Designer</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="assets/img/testimonials/testimonials-2.jpg"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Enim nisi quem export duis labore cillum quae magna enim sint quorum
                                            nulla
                                            quem veniam duis minim tempor labore quem eram duis noster aute amet
                                            eram
                                            fore quis sint minim.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Jena Karlis</h3>
                                        <h4>Store Owner</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="assets/img/testimonials/testimonials-3.jpg"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam
                                            tempor noster veniam enim culpa labore duis sunt culpa nulla illum
                                            cillum
                                            fugiat legam esse veniam culpa fore nisi cillum quid.
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>John Larson</h3>
                                        <h4>Entrepreneur</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="assets/img/testimonials/testimonials-4.jpg"
                                        class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->
    @endif
    <!-- ======= Events Section ======= -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Chefs</h2>
                <p>Our <span>Proffesional</span> Chefs</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="chef-member">
                        <div class="member-img">
                            <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Master Chef</span>
                            <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut.
                                Ipsum exercitationem iure minima enim corporis et voluptate.</p>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="chef-member">
                        <div class="member-img">
                            <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Patissier</span>
                            <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima
                                suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="chef-member">
                        <div class="member-img">
                            <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>Cook</span>
                            <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt.
                                Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->

            </div>

        </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>gallery</h2>
                <p>Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @foreach ($galleryData as $gallery)
                    <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery"
                            href="{{ URL::to('/') }}/Images/gallery/{{ $gallery->image }}"><img
                                src="{{ URL::to('/') }}/Images/gallery/{{ $gallery->image }}" class="img-fluid"
                                alt=""></a></div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact</h2>
                <p>Need Help? <span>Contact Us</span></p>
            </div>

            <div class="mb-3">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4">

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-map flex-shrink-0"></i>
                        <div>
                            <h3>Our Address</h3>
                            <p>nana mava,Rk prime,1st floor zara Rajkot, india 360005</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>contact@example.com</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+91 9081065019</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-md-6">
                    <div class="info-item  d-flex align-items-center">
                        <i class="icon bi bi-share flex-shrink-0"></i>
                        <div>
                            <h3>Opening Hours</h3>
                            <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                                <strong>Sunday:</strong> Closed
                            </div>
                        </div>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
                <div class="row">
                    <div class="col-xl-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-xl-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
            <!--End Contact Form -->

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(function () {
            function getAllMenus() {
                $.ajax({
                    type: "GET",
                    url: "getMenu",
                    success: function (response) {
                        // Clear existing content in category containers
                        $(".fast-menu").html("");
                        $(".cold").html("");
                        $(".sweet-menu").html("");

                        console.log(response.i);
                        $.each(response.i, function (indexInArray, valueOfElement) {
                            let appendCategory;
                            if (valueOfElement.item_category == 'Fast Food') {
                                appendCategory = '.fast-menu';
                            } else if (valueOfElement.item_category == 'Cold Drinks') {
                                appendCategory = '.cold';
                            } else if (valueOfElement.item_category == 'Sweets') {
                                appendCategory = '.sweet-menu';
                            }

                            // Create a unique ID for each menu item
                            let itemId = 'product_' + valueOfElement.id;

                            // Append the menu item to the selected category container
                            $(appendCategory).append(`
                        <div class="col-lg-4 menu-item">
                            <a href="{{ URL::to('/') }}/Images/Profiles/${valueOfElement.item_image}" class="glightbox">
                                <img src="{{ URL::to('/') }}/Images/Profiles/${valueOfElement.item_image}" class="menu-img img-fluid" alt="">
                            </a>
                            <h4>${valueOfElement.item_name}</h4>
                            <p class="price">${valueOfElement.item_price} Rs.</p>

                            @if (session()->has('user_email') and session()->has('user_password'))
                            <button class='btn btn-primary add-cart' style='background-color: #ce1212; color: white; border-style:none;' data-product-id='${valueOfElement.id}'>Add to Cart </button> 
                            <input type='hidden' class='product_imgs' id='${itemId}_imgs' value='${valueOfElement.item_image}'> 
                            <input type='hidden' class='product_names' id='${itemId}_names' value='${valueOfElement.item_name}'> 
                            <input type='hidden' class='product_price' id='${itemId}_price' value='${valueOfElement.item_price}'> 
                            <input type='hidden' class='product_categories' id='${itemId}_categories' value='${valueOfElement.item_category}'>
                            <input type='hidden' class='product_quantity' id='${itemId}_quantity' value='1'>
                            @endif
                        </div>
                    `);
                        });
                    }

                });

            }

            getAllMenus();

            $(document).on('click', '.add-cart', function () {
                let buttonId = $(this).data('product-id'); // Get the product ID dynamically
                let menuItem = $(this).closest('.menu-item'); // Find the closest menu item container

                // Create unique IDs for each hidden input field
                let itemId = 'product_' + buttonId;

                // Retrieve product details using the unique IDs
                let productImage = $('#' + itemId + '_imgs').val();
                let productName = $('#' + itemId + '_names').val();
                let productPrice = $('#' + itemId + '_price').val();
                let productCategory = $('#' + itemId + '_categories').val();
                let productQuantity = $('#' + itemId + '_quantity').val();

                // Create a FormData object to send the data via AJAX
                let formdata = new FormData();
                formdata.append('product_id', buttonId);
                formdata.append('user_email', '{{ session('user_email') }}');
                formdata.append('product_name', productName);
                formdata.append('product_price', productPrice);
                formdata.append('product_categories', productCategory);
                formdata.append('product_quantity', productQuantity);
                formdata.append('product_imgs', productImage);

                // ... rest of your AJAX code ...
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "add-to-cart",
                    data: formdata,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.status == 'success') {
                            sweetAlert('success', response.message)
                        } else {
                            sweetAlert('error', response.message)
                        }
                    }, 
                    error: function (err){
                        console.log(err)
                    }
                });
            });
        });

    
</script>
@endsection