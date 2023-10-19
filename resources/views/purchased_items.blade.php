@extends('master')

@section('content')
<section id="cart" class="cart">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <p>Purchased<span> Items</span></p>
        </div>

        {{-- Main --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-light table-hover table-striped table-bordered">
                        <thead class="bg-dark text-light table-dark text-sm text-center">
                            <th>id</th>
                            <th><span>Item Id</span></th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </thead>

                        <tbody class="text-center">

                        </tbody>
                    </table>

                </div>
            </div>


        </div>
</section><!-- End Contact Section -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function () {
        const loadAllPurchasedItems = () => {
            $.ajax({
                type: "GET",
                url: "{{ URL::to('/') }}/get-purchased-items",
                success: (response) => {
                    console.log(response.data)
                    $("tbody").html("")
                    $.each(response.data, function (indexInArray, valueOfElement) { 
                        const {id, product_id, product_name, product_price , product_quantity, total} = valueOfElement;
                         $("tbody").append(`
                            <tr>
                                <td>${id}</td>
                                <td>${product_id}</td>
                                <td>${product_name}</td>
                                <td>${product_price} Rs</td>
                                <td>${product_quantity}</td>
                                <td>${total} Rs</td>
                            </tr>

                         `)
                    });
                }, 
                error: (errors) => {
                    console.log(errors)
                }
            });
        }

        loadAllPurchasedItems()
    });
</script>
@endsection