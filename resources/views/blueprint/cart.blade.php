@extends('master')

@section('content')
<section id="cart" class="cart">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <p>User<span> Cart</span></p>
        </div>

        {{-- Main --}}
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-light table-hover table-striped table-bordered">
                        <thead class="bg-dark text-light table-dark text-sm text-center">
                            <th>id</th>
                            <th>Pro id</th>
                            <th><span>Item Name</span></th>
                            <th>Item Price</th>
                            <th>Item Category</th>
                            <th>Quantity</th>
                            <th>Total</th>

                            <th>Action</th>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="col-lg-4 col-sm-12 col-md-4 border bg-dark text-light rounded p-4">
                <h3>Total: </h3>
                <h5 id="grandTotal" style="float: right;"></h5>

                <form method="post" id="makePurchaseForm">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-12 mt-4">
                            <label for="" class="form-label">Email</label>
                            <input type="email" value="{{ session('user_email') }}" class="form-control" readonly>
                        </div>

                        <div class="col-12 mt-4">
                            <input type="submit" value="Make Purchase" class="btn btn-primary col-12">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section><!-- End Contact Section -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function () {
        function fetchCartDetails() {
            $.ajax({
                type: "GET",
                url: "get-cart-data",
                success: function (response) {
                    // Clear the table body before appending new data
                    $("tbody").html("");
                    let grandTotal = 0

                    $.each(response.cart, function (index, item) {
                        let product_price = item.product_price;
                        let quantity = item.product_quantity;
                        let total = product_price * parseInt(quantity);
                        grandTotal += total;

                        let $row = $(`
                        <tr class='text-center'>
                            <input type='hidden' class='prod_id' value='${item.product_id}'>
                            <td>${item.id}</td>
                            <td>${item.product_id}</td>
                            <td>${item.product_name}</td>
                            <td>${product_price}</td>
                            <td>${item.product_categories}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <button class="btn btn-secondary decrement" data-product-id="${item.product_id}">-</button>
                                    </div>
                                    <div class="col-auto">
                                        <input type="number" class="form-control text-center quantity" min="1" max="10" step="1" value="${quantity}">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-secondary increment" data-product-id="${item.product_id}">+</button>
                                    </div>
                                </div>
                            </td>
                            <td>${total}</td>
                            <td>
                                <button class='btn btn-danger button-delete' data-item-id="${item.id}">Delete</button>
                            </td>
                        </tr>
                    `);

                        // Append the row to the table body
                        $("tbody").append($row);
                    });

                    $("#grandTotal").text(grandTotal)
                }
            });
        }


        fetchCartDetails();

        // Function to increment the quantity
        $(document).on('click', '.increment', function () {
            let $button = $(this);
            let productId = $button.data('product-id');
            let $quantityInput = $button.closest('tr').find('.quantity');
            let currentQuantity = parseInt($quantityInput.val());

            if (currentQuantity < 10) {
                let newQuantity = currentQuantity + 1;
                $quantityInput.val(newQuantity);
                updateQuantity(productId, newQuantity);
            }
        });

        // Function to decrement the quantity
        $(document).on('click', '.decrement', function () {
            let $button = $(this);
            let productId = $button.data('product-id');
            let $quantityInput = $button.closest('tr').find('.quantity');
            let currentQuantity = parseInt($quantityInput.val());

            if (currentQuantity > 1) {
                let newQuantity = currentQuantity - 1;
                $quantityInput.val(newQuantity);
                updateQuantity(productId, newQuantity);
            }
        });

        // Function to send an AJAX request to update the quantity on the server
        function updateQuantity(productId, newQuantity) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'updateQuantityEndpoint',
                data: {
                    id: productId,
                    quantity: newQuantity
                },
                success: function (response) {

                    if (response.status == 'error') {
                        console.log('Error updating quantity.');
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }

        // Function to handle item deletion
        $(document).on('click', '.button-delete', function () {
            let itemId = $(this).data('item-id');

            $.ajax({
                type: "GET",
                url: `delete/${itemId}`,
                success: function (response) {
                    if (response.status == 'success') {
                        sweetAlert('success', response.message);
                        fetchCartDetails(); // Refresh cart after deletion
                    } else {
                        sweetAlert('error', response.message);
                    }
                }
            });
        });

        $(document).on('submit', '#makePurchaseForm', function (event) {
            event.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "make-purchase",
                success: function (response) {
                    if (response.status == 'success') {
                        sweetAlert('success', response.message)
                        fetchCartDetails()
                    }
                    else {
                        sweetAlert('error', response.message)
                    }
                }
            });
        });
        // Function to refresh the cart every 5 seconds
        setInterval(function () {
            fetchCartDetails();
        }, 2000);
    });
</script>
@endsection